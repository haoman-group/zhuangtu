<?php
namespace Wap\Model;

use Common\Model\Model;

class MbSpecialModel extends Model {

    //专题项目不可用状态
    const SPECIAL_ITEM_UNUSABLE = 0;
    //专题项目可用状态
    const SPECIAL_ITEM_USABLE = 1;
    //首页特殊专题编号
    const INDEX_SPECIAL_ID = 0;

  /*
   * 更新专题
   * @param array $update
   * @param array $condition
   * @return bool
     *
   */
    public function editMbSpecial($update, $special_id) {
        $special_id = intval($special_id);
        if($special_id <= 0) {
            return false;
        }

        $condition = array();
        $condition['special_id'] = $special_id;
        $result = $this->where($condition)->data($update)->save();
        if($result) {
            return $special_id;
        } else {
            return false;
        }
    }

  /*
   * 删除专题
   * @param int $special_id
   * @return bool
     *
   */
    public function delMbSpecialByID($special_id) {
        $special_id = intval($special_id);
        if($special_id <= 0) {
            return false;
        }

        $condition = array();
        $condition['special_id'] = $special_id;

        $this->delMbSpecialItem($condition, $special_id);

        return $this->where($condition)->delete();
    }

    /**
     * 专题项目列表（用于后台编辑显示所有项目）
   * @param int $special_id
     *
     */
    public function getMbSpecialItemListByID($special_id) {
        $condition = array();
        $condition['special_id'] = $special_id;
        return $this->_getMbSpecialItemList($condition);
    }

    /**
     * 专题可用项目列表（用于前台显示仅显示可用项目）
   * @param int $special_id
     *
     */
    public function getMbSpecialItemUsableListByID($special_id) {
        $condition = array();
        $condition['special_id'] = $special_id;
        $condition['item_usable'] = self::SPECIAL_ITEM_USABLE;

        $item_list = $this->_getMbSpecialItemList($condition);
        if(!empty($item_list)) {
            $new_item_list = array();
            foreach ($item_list as $value) {
                //处理图片
                // $item_data = $this->_formatMbSpecialData($value['item_data'], $value['item_type']);
                $item_data = $value['item_data'];
                $new_item_list[] = array($value['item_type'] => $item_data);
            }
            $item_list = $new_item_list;
        }
        return $item_list;
    }

    /**
     * 查询专题项目列表
     */
    private function _getMbSpecialItemList($condition, $order = 'item_sort asc') {
        $item_list = M('MbSpecialItem')->where($condition)->order($order)->select();
        foreach ($item_list as $key => $value) {
            $item_list[$key]['item_data'] = $this->_initMbSpecialItemData($value['item_data'], $value['item_type']);
            if($value['item_usable'] == self::SPECIAL_ITEM_USABLE) {
                $item_list[$key]['usable_class'] = 'usable';
                $item_list[$key]['usable_text'] = '禁用';
            } else {
                $item_list[$key]['usable_class'] = 'unusable';
                $item_list[$key]['usable_text'] = '启用';
            }
        }
        return $item_list;
    }

    /**
     * 检查专题项目是否存在
   * @param array $condition
     *
     */
    public function isMbSpecialItemExist($condition) {
        $item_list = M('MbSpecialItem')->where($condition)->select();
        if($item_list) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 获取项目详细信息
     * @param int $item_id
     *
     */
    public function getMbSpecialItemInfoByID($item_id) {
        $item_id = intval($item_id);
        if($item_id <= 0) {
            return false;
        }

        $condition = array();
        $condition['item_id'] = $item_id;
        $item_info = M('MbSpecialItem')->where($condition)->find();
        $item_info['data'] = $this->_initMbSpecialItemData($item_info['item_data'], $item_info['item_type']);

        return $item_info;
    }

    /**
     * 整理项目内容
     *
     */
    private function _initMbSpecialItemData($item_data, $item_type) {
        if(!empty($item_data)) {
            $item_data = unserialize($item_data);
            if($item_type == 'goods'||$item_type == 'goods1'||$item_type == 'goods2') {
                $item_data = $this->_initMbSpecialItemGoodsData($item_data, $item_type);
            }
        } else {
            $item_data = $this->_initMbSpecialItemNullData($item_type);
        }
        return $item_data;

    }

    /**
     * 处理goods类型内容
     */
    private function _initMbSpecialItemGoodsData($item_data, $item_type) {
        $goods_id_string = '';
        if(!empty($item_data['item'])) {
            foreach ($item_data['item'] as $value) {
                $goods_id_string .= $value . ',';
            }
            $goods_id_string = rtrim($goods_id_string, ',');

            //查询商品信息
            $condition['id'] = array('in', $goods_id_string);
            $goods_list = D('Product')->field('id,title,price,headpic')->where($condition)->select();
            $goods_list = array_under_reset($goods_list, 'id');

            //整理商品数据
            $new_goods_list = array();
            foreach ($item_data['item'] as $value) {
                if(!empty($goods_list[$value])) {
                    $new_goods_list[] = $goods_list[$value];
                }
            }
            $item_data['item'] = $new_goods_list;
        }
        return $item_data;
    }

    /**
     * 初始化空项目内容
     */
    private function _initMbSpecialItemNullData($item_type) {
        $item_data = array();
        switch ($item_type) {
        case 'home1':
            $item_data = array(
                'title' => '',
                'image' => '',
                'type' => '',
                'data' => '',
            );
            break;
        case 'home2':
        case 'home4':
            $item_data= array(
                'title' => '',
                'square_image' => '',
                'square_type' => '',
                'square_data' => '',
                'rectangle1_image' => '',
                'rectangle1_type' => '',
                'rectangle1_data' => '',
                'rectangle2_image' => '',
                'rectangle2_type' => '',
                'rectangle2_data' => '',
            );
            break;
        default:
        }
        return $item_data;
    }

    /*
     * 增加专题项目
     * @param array $param
     * @return array $item_info
     *
     */
    public function addMbSpecialItem($param) {
        $param['item_usable'] = self::SPECIAL_ITEM_UNUSABLE;
        $param['item_sort'] = 255;

        if($param['item_type']=='goods1'){
            $param['item_id']=2015;
        }else if($param['item_type']=='goods2'){
            $param['item_id']=2016;
        }
        $result = M('MbSpecialItem')->data($param)->add();
        
        if($result) {
            $param['item_id'] = $result;
            return $param;
        } else {
            return false;
        }
    }

    /**
     * 编辑专题项目
     * @param array $update
     * @param int $item_id
     * @param int $special_id
     * @return bool
     *
     */
    public function editMbSpecialItemByID($update, $item_id, $special_id) {
        if(isset($update['item_data'])) {
            $update['item_data'] = serialize($update['item_data']);
        }
        $condition = array();
        $condition['item_id'] = $item_id;

        return M("MbSpecialItem")->where($condition)->data($update)->save();
    }

    /**
     * 编辑专题项目启用状态
     * @param string usable-启用/unsable-不启用
     * @param int $item_id
     * @param int $special_id
     *
     */
    public function editMbSpecialItemUsableByID($usable, $item_id, $special_id) {
        $update = array();
        if($usable == 'usable') {
            $update['item_usable'] = self::SPECIAL_ITEM_USABLE;
        } else {
            $update['item_usable'] = self::SPECIAL_ITEM_UNUSABLE;
        }
        return $this->editMbSpecialItemByID($update, $item_id, $special_id);
    }

  /*
   * 删除
   * @param array $condition
   * @return bool
     *
   */
    public function delMbSpecialItem($condition, $special_id) {
        return M('MbSpecialItem')->where($condition)->delete();
    }


    /**
     * 获取专题模块类型列表
     * @return array
     *
     */
    public function getMbSpecialModuleList() {
        $module_list = array();
        $module_list['adv_list'] = array('name' => 'adv_list' , 'desc' => '广告条版块');
        $module_list['home1'] = array('name' => 'home1' , 'desc' => '模型版块布局A');
        $module_list['home2'] = array('name' => 'home2' , 'desc' => '模型版块布局B');
        $module_list['home3'] = array('name' => 'home3' , 'desc' => '模型版块布局C');
        $module_list['home4'] = array('name' => 'home4' , 'desc' => '模型版块布局D');
        $module_list['goods'] = array('name' => 'goods' , 'desc' => '商品版块');
  // haoid.cn v3-10
    if(!$_GET['special_id']) {
      $module_list['goods1'] = array('name' => 'goods1' , 'desc' => '限时商品');
    $module_list['goods2'] = array('name' => 'goods2' , 'desc' => '团购商品');
  }
    
        return $module_list;
    }


}

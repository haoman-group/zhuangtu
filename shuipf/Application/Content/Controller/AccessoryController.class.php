<?php
/**
* @class 辅材
* @author 张一斐
**/
namespace Content\Controller;

use Common\Controller\Base;
use Content\Model\ContentModel;

class AccessoryController extends Base {
    protected $model = NULL;
    protected $type_model = NULL;
    protected $brand_model = NULL;
    protected $norm_model = NULL;
    protected $product = NULL;
    protected $proCate = NULL;
    protected $property = NULL;
    protected $propertyValue = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->model = M('accessory');
        $this->type_model = M('accessory_type');
        $this->brand_model = M('accessory_brand');
        $this->norm_model = M('accessory_norm');

        $this->product = D('Seller/Product');
        $this->proCate = D('Admin/ProductCategory');
        $this->property = D('Seller/ProductProperty');
        $this->propertyValue = M('ProductPropertyValue');
    }
    public function index() {
        $this->display();
    }

    public function lists() {
        $current_category = I('get.category');
        $root_cate = $this->proCate->getCate('21'); // 21是辅材商铺的根分类
        //获取辅材一级分类
        $categories = $this->proCate->childlist($root_cate);

        $hierarchy = array();
        $details = array();
        foreach($categories as $item) {
            if (!$current_category) {
                $current_category = $item['cid'];
            }
            $hierarchy[$item['cid']] = array('cid' => $item['cid'], 'name' => $item['name'], 'item' => array());
            //获取二级分类

            $accessory_types = $this->proCate->childlist($item['cid']);

            foreach($accessory_types as $type) {
                $accessories = $this->product->where(array('isdelete' => 0, 'status' => 10, 'cid' => $type['cid']))->order('id')
                    ->getField('id,title,key_prop,headpic,price_json,min_price,max_price');
                if($accessories) {
                    $hierarchy[$item['cid']]['item'][$type['cid']] = array('cid' => $type['cid'],  'name' => $type['name'], 'item' => array());
                }
                $prop_list = $this->propertyValue->where(array('cid'=>$type['cid']))->getField('pid,vid,prop_name,name');
                $prop_dict = array();
                foreach($prop_list as $prop_item) {
                    $prop_dict[$prop_item['pid'].",".$prop_item['vid'].",".$prop_item['prop_name']] = $prop_item['name'];
                }
                foreach($accessories as $accessory) {
                    $hierarchy[$item['cid']]['item'][$type['cid']]['item'][] = $accessory['id'];
                    // 处理关键属性
                    $key_prop = unserialize($accessory['key_prop']);
                    foreach($key_prop as $pid => $vid) {
                        if (array_key_exists($pid.",".$vid.",规格", $prop_dict)) {
                            $accessory['norm'] = $prop_dict[$pid.",".$vid.",规格"];
                        } else if (array_key_exists($pid.",".$vid.",单位", $prop_dict)) {
                            $accessory['unit_name'] = $prop_dict[$pid.",".$vid.",单位"];
                        }
                    }
                    // 处理价格属性
                    $accessory['brand'] = array();
                    $price_json = json_decode($accessory['price_json'], true);
                    foreach($price_json as $price_item) {
                        if($price_item['品牌']['txt']) {
                            if ($price_item['quantity'] && $price_item['quantity'] > 0) {
                                $accessory['brand'][$price_item['hidden_value']]
                                    = array('name'=>$price_item['品牌']['txt'], 'price'=>$price_item['price'], 'hidden_value'=>$price_item['hidden_value']);
                            }
                        }
                    }

                    $details[$accessory['id']] = $accessory;
                }
            }

        }

        $this->assign('current_category', $current_category);
        $this->assign('hierarchy', $hierarchy);
        $this->assign('details', $details);

        $this->display();
    }
}

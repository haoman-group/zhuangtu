<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 3/21/16
 * Time: 11:08
 */

namespace Admin\Controller;
use Common\Controller\AdminBase;

class AccessoryController extends AdminBase {
    protected $accessoryTypeModel = null;
    protected $accessoryBrandModel = null;
    protected $accessoryNormModel = null;
    protected $accessoryModel = null;

    protected function _initialize() {
        parent::_initialize();
        $this->accessoryTypeModel = D('AccessoryType');
        $this->accessoryBrandModel = D('AccessoryBrand');
        $this->accessoryNormModel = D('AccessoryNorm');
        $this->accessoryModel = D('Accessory');
    }

    /**
     * 辅材库展示列表
     */
    public function index() {
        $search = I('get.search', null);
        $where = array('isdelete'=>0);
        if ($search) {

        }
        $count = $this->accessoryModel->where($where)->order('id desc')->count();
        $page = $this->page($count, 20);
        $data = $this->accessoryModel->where($where)->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
        foreach($data as $key=>$value) {
            $accessory_type = $this->accessoryTypeModel->where(array('id'=>$value['accessory_type']))->getField('name,category');
            $data[$key]['accessory_type'] = $accessory_type[key($accessory_type)].'->'.key($accessory_type);
            $data[$key]['brand'] = $this->accessoryBrandModel->where(array('id'=>$value['brand_id']))->getField('name');
            $data[$key]['norm'] = $this->accessoryNormModel->where(array('id'=>$value['norm_id']))->getField('name');
        }

        $this->assign('Page', $page->show());
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * 添加辅材
     */
    public function add() {
        if(IS_POST) {
            $data = I('post', '', '');
            if($this->accessoryModel->where(array('isdelete'=>0, 'name'=>$data['name']))->count() > 0) {
                $this->error('此辅材名已存在', U('Accessory/add'));
            }
            if(!$this->accessoryModel->create($data)) {
                $this->error($this->accessoryModel->getError(), U('Accessory/add'));
            }
            $this->accessoryModel->add();
            $this->success('添加成功', U('Accessory/index'));
        } else {
            $category_list = $this->accessoryTypeModel->distinct(true)->field('category')->select();
            $this->assign('category_list', $category_list);
            $this->display();
        }
    }

    /**
     * 删除辅材
     */
    public function delete() {
        $accessory_id = I('get.id', '', 'intval');
        if (!$accessory_id) {
            $this->error("请指定需要删除的项目！");
        }
        if (!$this->accessoryModel->find($accessory_id)) {
            $this->error("所选类目不存在");
        }

        if(!$this->accessoryModel->where(array('id'=>$accessory_id))->setField('isdelete',1) ) {
            $this->error("删除失败", U('Accessory/index'));
        }
        $this->success("删除成功", U('Accessory/index'));

    }

    /**
     * get subtype by category name
     */
    public function getSubItems() {
        if(IS_AJAX) {
            $category_name = I('category_name', '', '');
            $subitems = $this->accessoryTypeModel->where(array('category'=>$category_name, 'isdelete'=>'0'))->getField('id,name', true);
            $this->ajaxReturn($subitems);
        }
    }
    /**
     * get brand/norm by accessory_type id
     */
    public function getBrandNorm() {
        if(IS_AJAX) {
            $tid = I('tid', '', '');
            $brand = $this->accessoryBrandModel->where(array('accessory_type'=>$tid, 'isdelete'=>0))->getField('id,name', true);
            $norm = $this->accessoryNormModel->where(array('accessory_type'=>$tid, 'isdelete'=>0))->getField('id,name', true);
            $this->ajaxReturn(array('brand'=>$brand, 'norm'=>$norm));
        }
    }

    /**
     * 辅材类型展示列表
     */
    public function type_index() {
        $search = I('get.search', null);
        $where = array('isdelete'=>0);
        if ($search) {
            /**
             * TBD
             */
        }
        $count = $this->accessoryTypeModel->where($where)->order('id desc')->count();
        $page = $this->page($count, 20);
        $data = $this->accessoryTypeModel->where($where)->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
        foreach($data as $key=>$value) {
            $data[$key]['brand'] = implode(',', $this->accessoryBrandModel->where(array('accessory_type'=>$value['id']))->getField('name', true));
            $data[$key]['norm'] = implode(',', $this->accessoryNormModel->where(array('accessory_type'=>$value['id']))->getField('name', true));
        }

        $this->assign('Page', $page->show());
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * 添加辅材类型
     */
    public function add_type() {
        if(IS_POST) {
            $data = I('post.', '', '');
            if($this->accessoryTypeModel->where(array('isdelete'=>0, 'name'=>$data['name']))->count() > 0) {
                $this->error('此类目已存在');
            }
            // 构建记录到zt_accessory_type 表
            $accessory_type = array();
            $accessory_type['name'] = $data['name'];
            $accessory_type['category'] = $data['category'];
            if(!$this->accessoryTypeModel->create($accessory_type)) {
                $this->error($this->accessoryTypeModel->getError(), U('Accessory/add_type'));
            }
            if (empty($data['brand'])) {
                $this->error('请填写品牌信息', U('Accessory/add_type'));
            }
            if (empty($data['norm'])) {
                $this->error('请填写规格信息', U('Accessory/add_type'));
            }
            $tmp_data = array();
            $tmp_data['accessory_type'] = $this->accessoryTypeModel->add();

            // 创建品牌记录
            $data['brand'] = array_unique($data['brand']);
            foreach ($data['brand'] as $bkey => $bvalue) {
                $tmp_data['name'] = $bvalue;
                $this->accessoryBrandModel->create($tmp_data);
                $this->accessoryBrandModel->add();
            }

            // 创建规格记录
            $data['norm'] = array_unique($data['norm']);
            foreach ($data['norm'] as $nkey => $nvalue) {
                $tmp_data['name'] = $nvalue;
                $this->accessoryNormModel->create($tmp_data);
                $this->accessoryNormModel->add();
            }
            $this->success('添加成功', U('Accessory/type_index'));
        } else {
            $category_list = M('AccessoryCategory')->select();
            $this->assign('category_list', $category_list);
            $this->display();
        }
    }
    /**
     * 删除辅材类型
     */
    public function delete_type() {
        $type_id = I('get.id', '', 'intval');
        if (!$type_id) {
            $this->error("请指定需要删除的项目！");
        }
        if (!$this->accessoryTypeModel->find($type_id)) {
            $this->error("所选类目不存在");
        }

        if (!$this->accessoryBrandModel->where(array('accessory_type'=>$type_id))->setField('isdelete', 1)
            || !$this->accessoryNormModel->where(array('accessory_type'=>$type_id))->setField('isdelete', 1)
            || !$this->accessoryTypeModel->where(array('id'=>$type_id))->setField('isdelete',1) ) {
            $this->error("删除失败", U('Accessory/type_index'));
        }
        $this->success("删除成功", U('Accessory/type_index'));

    }
}

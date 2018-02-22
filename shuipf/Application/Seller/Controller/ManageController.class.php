<?php

// +----------------------------------------------------------------------
// | 会员设置管理
// +----------------------------------------------------------------------
// | Author: 李博凯 <lbk747@163.com>
// +----------------------------------------------------------------------

namespace Seller\Controller;

class ManageController extends SellerbaseController {
    private $model = null;
    protected $moduleModel = NULL;
    protected $designModuleModel = NULL;
    protected $pageModel = NULL;
    protected $memberModel = NULL;
    protected $shopModel = NULL;
    protected $productModel = NULL;
    protected $shopinCategoryModel = NULL;
    protected $shopTemplateModel = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Member/Shop');
        $this->designModuleModel = M('ShopDesignModule');
        $this->pageModel = M('ShopPage');
        $this->memberModel = D("Member/Member");
        $this->moduleModel = M('ShopModule');
        $this->shopModel = D("Shop");
        $this->productModel = D('Product');
        $this->shopinCategoryModel = D('ShopinCategory');
        $this->shopTemplateModel = D('ShopTemplate');
    }
	
	public function decorateo() {

        $this->display();
    }
	
    public function decorate() {
        $pageid = I('pageid');
        if($pageid){
            $page = $this->pageModel->where(array('uid'=>$this->uid,'id'=>$pageid))->find();
            if(!$page) $this->error('页面不存在');
        }else{
            $page = $this->pageModel->where(array('uid'=>$this->uid,'type'=>'home'))->find();
            if(!$page) $this->model->addShopPage($this->uid,$this->shopid,'home');
            elseif(!$page['setting']) $this->model->addShopLayout($this->uid,$page['id']); 
        }
        
        $page['setting'] = unserialize($page['setting']);
        $token = $this->memberModel->saveToken($this->uid);

        $pagelist = $this->pageModel->where(array('uid'=>$this->uid,'type'=>'diy'))->select();
        $user=$this->model->where(array('uid'=>$this->uid))->getField('username');

        $this->assign('user',$user);
        $this->assign('pagelist',$pagelist);
        $this->assign('pageid',$page['id']);
        $this->assign('page',$page);
        $this->assign('token',$token);
        $this->display();
    }
	
	public function declayout() {

        $pageid = I('pageid');
        if($pageid){
            $page = $this->pageModel->where(array('uid'=>$this->uid,'id'=>$pageid))->find();
            if(!$page) $this->error('页面不存在');
        }else{
            $page = $this->pageModel->where(array('uid'=>$this->uid,'type'=>'home'))->find();
            if(!$page) $this->model->addShopPage($this->uid,$this->shopid,'home');
            elseif(!$page['setting']) $this->model->addShopLayout($this->uid,$page['id']); 
        }

        $module = $this->designModuleModel->getField("id,description,wtype,ismove,isdel,isadd,isedit");
        $pagelist = $this->pageModel->where(array('uid'=>$this->uid,'type'=>'diy'))->select();
        $this->assign('pagelist',$pagelist);

        $page['setting'] = unserialize($page['setting']);
        $this->assign('pageid',$page['id']);
        $this->assign('data',$page['setting']['layout']);
        $this->assign('module',$module);
        $this->assign('page',$page);
        $this->assign('pagelist',$pagelist);
        $this->display();
    }

    public function ecplaysave(){
        $this->display();
    }

    public function pagebak(){
        $this->display();
    }

    public function decpreview(){
        $pageid = I('pageid');
        if($pageid){
            $page = $this->pageModel->where(array('uid'=>$this->uid,'id'=>$pageid))->find();
            if(!$page) $this->error('页面不存在');
        }else{
            $page = $this->pageModel->where(array('uid'=>$this->uid,'type'=>'home'))->find();
        }

        // $page = $this->pageModel->where(array('uid'=>$this->uid,'type'=>'home'))->find();
        $page['setting'] = unserialize($page['setting']);
        $shop = $this->shopModel->where(array('uid'=>$this->uid))->find();

        $this->assign('pageid',$page['id']);
        $this->assign('layout',$page['setting']['layout']);
        $this->assign('page',$page);
        $this->assign('shop',$shop);
        $this->display();
    }


    public function pagelist(){
        $pagelist = $this->pageModel->where(array('uid'=>$this->uid,'type'=>'diy'))->select();
        $shop = $this->shopModel->where(array('uid'=>$this->uid))->find();
        $this->assign('pagelist',$pagelist);
        $this->assign('status',array(0=>'未发布',1=>'已发布'));
        $this->assign('shop',$shop);
        $this->display();
    }

    public function pageadd(){
        if(IS_POST){
            $shopid = $this->shopid;
            ($title = I('title')) || $this->error('标题不能为空');
            ($type = I('type')) || $this->error('请选择布局');
            $pageid = $this->pageModel->data(array('uid'=>$this->uid,'type'=>'diy','addtime'=>time(),'updatetime'=>time(),'shopid'=>$this->shopid,'title'=>$title,'status'=>0))->add();
            $blockid = M('ShopBlock')->data(array('uid'=>$this->uid,'shopid'=>$this->shopid,'type'=>'mall','pageid'=>$pageid,'position'=>0,'addtime'=>time(),'updatetime'=>time()))->add();

            $layout = array(
              'bd'=>array(
                array(
                  'blockid'=>$blockid,
                  'classname'=>$type,
                  'maincol'=>array(),
                  'subcol'=>array(),
                ),
              ),
            );
            $homepage = $this->pageModel->where(array('type'=>'home','uid'=>$this->uid))->find();
            $homepage['setting'] = unserialize($homepage['setting']);
            $layout['hd'] = $homepage['setting']['layout']['hd'];

            $this->pageModel->where(array('id'=>$pageid))->data(array('setting'=>serialize(array('layout'=>$layout))))->save();
            $this->success('提交成功');
        }else{
            $this->display();   
        }
    }
    public function pagedel(){
        ($id = I('pageid')) || $this->error('参数不完整');
        $re = $this->pageModel->where(array('id'=>$id,'uid'=>$this->uid,'type'=>'diy'))->delete();
        if(!$re) $this->error('删除失败');
        $this->success('删除成功');
    }

    public function pagechangename() {
        if (IS_AJAX) {
            $pageid = I('pageid', '');
            $pagename = I('v', '');
            if ($pagename != '' && $pageid != '' ) {
                $this->pageModel->where(array('id'=>$pageid))->data(array('title'=>$pagename))->save();
            }
            $this->ajaxReturn(array('status' => 1, 'info' => '修改成功'));
        }
    }

    public function pagepublish(){
        ($id = I('pageid')) || $this->error('参数不完整');
        $re = $this->pageModel->where(array('id'=>$id,'uid'=>$this->uid,'type'=>'diy'))->setField('status',1);
        $this->success('发布成功');
    }

    public function pagedecing(){
        $pageid = I('pageid');
        if($pageid){
            $page = $this->pageModel->where(array('uid'=>$this->uid,'id'=>$pageid))->find();
            if(!$page) $this->error('页面不存在');
        }else{
            $page = $this->pageModel->where(array('uid'=>$this->uid,'type'=>'home'))->find();
        }
        // dump($page);exit;
        $page['setting'] = unserialize($page['setting']);
        $shop = $this->shopModel->where(array('uid'=>$this->uid))->find();

        $this->assign('pageid',$page['id']);
        $this->assign('layout',$page['setting']['layout']);
        $this->assign('page',$page);
        $this->assign('shop',$shop);
        $this->display();
    }

    public function pagedecingbak(){
        $this->display();
    }

    public function shopcategorylist(){
        $where = array('uid'=>$this->userid);
        $order = "listorder asc,id asc";
        $domain = $this->model->where($where)->getField('domain');
        $category = $this->shopinCategoryModel->where(array('userid'=>$this->userid,'pid'=>0))->order($order)->select();
        foreach($category as $k=>$v){
            $category[$k]['son'] = $this->shopinCategoryModel->where(array('pid'=>$v['id']))->order($order)->select();
        }
        $this->assign('category',$category);
        $this->assign('domain',$domain);
        $this->assign('type',array(1=>'自动分类',2=>'手动分类'));
        $this->display();
    }

    public function shopcatemanage(){
        $search = I('get.search', null);
        $where = array('uid'=>$this->userid);
        if ($search) {
            $min_price = I('min_price', '');
            $max_price = I('min_price', '');
            if($min_price != '' || $max_price != '') {
                $where['price'] = array();
                if ($min_price != '') $where['price']['EGT'] = $min_price;
                if ($max_price != '') $where['price']['ELT'] = $max_price;
            }
            $product_name = I('product_name', '');
            if ($product_name != '') {
                $where['title'] = array('like', '%'.$product_name.'%');
            }
            $status = I('status', '');
            if ($status == 'selling') {
                $where['status'] = '10';
            } elseif ($status == 'inhouse'){
                $where['status'] = array('NEQ', '10');
            }
        }
        $where['isdelete'] = "0"; //添加
        $count = $this->productModel->where($where)->count();
        $page = $this->page($count,15);
        $data = $this->productModel->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
        foreach($data as $k=>$v){
            $data[$k]['shopin_category'] = $this->shopinCategoryModel->where(array('id'=>array('in',$v['shopin_category'])))->getField('id,name') ;
        }
        $category = $this->shopinCategoryModel->where(array('userid'=>$this->userid,'pid'=>0))->order('listorder asc,id desc')->select();
        foreach($category as $k=>$v){
            $category[$k]['son'] = $this->shopinCategoryModel->where(array('userid'=>$this->userid,'pid'=>$v['id']))->order('listorder asc,id desc')->select();
        }
        
        $this->assign('data',$data);
        $this->assign('page',$page->show());
        $this->assign('status',\Seller\Controller\Status::$ProStatus);
        $this->assign('category',$category);
        $this->display();
    }

    public function templatelist(){
        $pageid = I('pageId');
        $moduleid = I("moduleId");
        $type = I('type');
        // if($pageid){
        //     $page = $this->pageModel->where(array('id'=>$pageid,'uid'=>$this->userid))->find();
        // }else{
        //     $page = $this->pageModel->where(array('uid'=>$this->userid,'type'=>'home'))->find();
        // }
        // $module = $this->moduleModel->where(array('id'=>$moduleid,'uid'=>$this->userid))->find();
        // if(!$module) $this->error('模块不存在');

        $where = array('status'=>1,'isdelete'=>0);
        if($type=='detail') $where['type'] = 'detail';

        $data = $this->shopTemplateModel->where($where)->select();
        foreach($data as $k=>$v){

        }
        $this->assign('data',$data);
        $this->assign('page',$page);
        $this->assign('pageid',$pageid);
        $this->assign('moduleid',$moduleid);
        $this->assign('type',$type);
        $this->display();
    }
    public function templateuse(){
        $pageid = I("pageid");
        $moduleid = I('moduleid');
        $templateid = I('templateid');
        $type = I('type');
        $id = I('get.id');
        $template = $this->shopTemplateModel->where(array('id'=>$templateid))->find();
        if(!$template) $this->error('模版不存在');
        if($type=='detail'){
            if($template['type']<>'detail') $this->error('此模版不能用于详情页');
            if(!empty($id)){ //编辑动作有ID,直接存储到数据库
                $this->productModel->where(array('id'=>$id))->save(array('showecplay'=>$template['content']));
            }else{
                session('detail_template',$template);
            }
            $this->success('选择成功');
        }else{
            $module = $this->moduleModel->where(array('id'=>$moduleid,'uid'=>$this->userid))->find();
            if(!$module) $this->error('模块不存在');
            $module['setting'] = unserialize($module['setting']);
            $module['setting']['content'] = $template['content'];
            $module['setting']['isecplay'] = 1;
            $module['setting']['isshowtit'] = 0;
            $module['setting']['content_height'] = $template['height']."px";
            $this->moduleModel->where(array('id'=>$moduleid))->setField('setting',serialize($module['setting']));
            redirect(U('decorate',array('pageid'=>$pageid)));
        }

    }
    public function templatehis(){
        $this->display();
    }

    public function setting(){
        if(IS_POST){
            $data = I('post.');
            $data['id'] = $this->shopid;
            $data['logo'] = $data['logo_picture_url'][0];
            $data['headpic'] = $data['head_pic_url'][0];
           
            if(!$this->model->create($data)){
                $this->error('提交失败:'.$this->model->getError());
              return false;
            }
            $proid = $this->model->save();
            if(!$proid) $this->error('提交失败');
            $this->success('提交成功');
        }else{
            $info = $this->model->where(array('id'=>$this->shopid))->find();
            $shop_category = D('Admin/ShopCategory')->getFieldById($info['catid'], 'pid');
            $this->assign('shop_category', $shop_category);
            $this->assign('info',$info);
            $this->display();
        }
    }
    public function module_edit(){
        $pageid = I('pageid');
        $widgetid = I('widgetid');
        $module = $this->moduleModel->where(array('id'=>$widgetid,'uid'=>$this->uid))->find();

        if(!$module) $this->error('模块不存在');
        // $template = "module_edit-".$module['compid'].$module['wtype'];
        // $template = "module_edit-8805b950";
        $template = "module_edit-".$module['compid'];
        $module['setting'] = unserialize($module['setting']);

        $this->assign('module',$module);
        $this->display($template);
    }
//收藏店铺
  public function collshop(){
     echo "收藏成功";
    $this->display();
  } 
}

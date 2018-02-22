<?php
/**
* @class 网购主材
* @author 李博凯
**/
namespace Content\Controller;

use Common\Controller\Base;
use Content\Model\ContentModel;
use Admin\Model\ProductCategoryModel as CATE;
class MaterialController extends Base {
    protected $model = null;
    protected $ProductCateMode = null;
    //分页时，单页数据量
    protected $Page_Size = 30;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Product');
        $this->ProductCateMode = D('Admin/ProductCategory');
    }
    public function index() {
    	$posdata = D('Admin/PositionData')->getDataByPageID("4");
    	$this->assign("posdata",$posdata);
        $this->assign('cate',$this->ProductCateMode->getCateType(CATE::TYPE_MATERIAL));
        $this->display();
    }
	
	public function productlist(){
	    $cid = I('get.cid');
	    if(!empty($cid)){
	    	// if(!$this->ProductCateMode->checkcate($cid,CATE::TYPE_MATERIAL)){
      		//	$this->error("错误的类型!");
    		// }
		 	$pagenum = I('get.page','1','int');
	    	//获取子分类列表
	    	$catelist = $this->ProductCateMode->childlist($cid);
	    	//SQL条件
	    	$where = array();
	    	//类目
	    	$where['proptype'] = $cid;
	    	//分页获取数据
	    	$count = $this->model->where($where)->count();
	    	$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
	    	$list = $this->model->where($where)->page($pagenum.','.$this->Page_Size)->select();
	    	//处理显示数据
	    	foreach($list as $key=>$li){
	    		//填充店铺名称
	        	$list[$key]['shopname'] = M('Shop')->getFieldById($li['shopid'],'name');
	    	}
	    	$this->assign('catename',M('ProductCategory')->getFieldByCid($cid,'name'));
	    	$this->assign('searchOpts',$this->_searchOpts());
	    	$this->assign('page',$page->show());
	    	$this->assign('list',$list);
	    	$this->assign('catelist',$catelist);
	    }
		$this->display();	
	}
	public function show(){
		$this->display();	
	}
	private function _searchOpts(){
		$searchOpts=array();
		//风格
		$searchOpts['style'] = M('OptionField')->where(array('name'=>'attr_style'))->select();
		return $searchOpts;
	}
}

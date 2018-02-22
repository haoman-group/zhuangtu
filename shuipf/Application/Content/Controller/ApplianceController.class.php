<?php
/**
* @class 网购电器
* @author 李博凯
**/
namespace Content\Controller;

use Common\Controller\Base;
use Content\Model\ContentModel;
use Admin\Model\ProductCategoryModel as CATE;
class ApplianceController extends Base {
    protected $model = NULL;
    protected $ProductCateMode = null;
    //分页时，单页数据量
    protected $Page_Size = 30;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Product');
        $this->ProductCateMode = D('Admin/ProductCategory');
    }
      public function index() {
    	$posdata = D('Admin/PositionData')->getDataByPageID("6");
    	$dapeituijian=$posdata['88'];
    	$tv=$posdata['73'];
    	$media=$posdata['74'];
        $heater=$posdata['75'];
        $chudian=$posdata['76'];
        $coway=$posdata['77'];
        $samsung=$posdata['78'];
        $whirlpool=$posdata['79'];
        $hvac=$posdata['80'];
        $fresh=$posdata['81'];
        $electric=$posdata['82'];
        $security=$posdata['83'];
        $intelligent=$posdata['84'];
        $room1=$posdata['86'];//厨房85
         $room2=$posdata['87'];//客厅86
         $room3=$posdata['165'];//卧室87
         $room4=$posdata['85'];//卫生间165
          $this->assign("room4",$room4);
         $this->assign("room3",$room3);
        $this->assign("room1",$room1);
         $this->assign("room2",$room2);
        $this->assign("intelligent",$intelligent);
        $this->assign("security",$security);
        $this->assign("electric",$electric);
    	$this->assign("dapeituijian",$dapeituijian);
    	$this->assign("hvac",$hvac);
    	$this->assign("fresh",$fresh);
    	$this->assign("whirlpool",$whirlpool);
    	$this->assign("samsung",$samsung);
    	$this->assign("coway",$coway);
    	$this->assign("chudian",$chudian);
    	$this->assign("tv",$tv);
    	$this->assign("heater",$heater);
    	$this->assign("media",$media);
    	$this->assign("posdata",$posdata);
    	$Rootcate =  $this->ProductCateMode->getCateType(CATE::TYPE_APPLIANCE);
    	$subcate  = array();
    	//获取子类
    	

    	foreach($Rootcate as $key=>$ca){
    		$subcate[$key]['name'] = $ca;
    		$subcate[$key]['subcate']=$this->ProductCateMode->childlist($key);
    	}
    	// var_dump($subcate);
        $this->assign('cate',$subcate);
        $this->display();
    }
	
	
	public function productlist(){
	    $cid = I('get.cid');
	    if(!empty($cid)){
	    // if(!$this->ProductCateMode->checkcate($cid,CATE::TYPE_APPLIANCE)){
            // $this->error("错误的类型!");
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
	    trace($count,"列表总数","debug");
	    trace($this->Page_Size,"单页最大数","debug");
	    trace($pagenum,"页码","debug");
	    trace($where,"搜索条件","debug");
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
		$this->display("Material/productlist");	
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
	public function getCatid(){
		
	}
}

<?php
/**
* @class 网购设计
* @author 李博凯
**/
namespace Content\Controller;

use Common\Controller\Base;
use Content\Model\ContentModel;

class DesignController extends Base {
    protected $model = NULL;
    //分页时，单页数据量
    protected $Page_Size = 30;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Product');
    }

    public function index() {

    	//风格数据
        $style = M("option_field")->where(array('name'=>'attr_style'))->select();
        $posdata = D('Admin/PositionData')->getDataByPageID("1");
        $tream=$posdata['1'];
        foreach ($tream as $key => $value) {
            $tream[$key]['title'] = explode(",",$value['title']);
            # code...
        }
        $highdesigner=$posdata["234"];
         foreach ($highdesigner as $key => $value) {
            $highdesigner[$key]['title'] = explode(",",$value['title']);
            
        }
        $DesignInspiration=$posdata['235'];
        $design=$posdata['2'];
        $run=$posdata['3'];
        $lower=$posdata['5'];
        $room=$posdata['4'];
        $this->assign("highdesigner",$highdesigner);
        $this->assign("DesignInspiration",$DesignInspiration);
        $this->assign('room',$room);
        $this->assign('lower',$lower);
        $this->assign('run',$run);
        $this->assign('tream',$tream);
        $this->assign('design',$design);
       
      
       // $data = $this->getDataByPageid(1);
        
        //推荐本地设计师数据
      /*  $pos_designer = M('PositionData')->where(array('posid'=>'2'))->select();
        foreach($pos_designer as $key=>$p){
        	$pos_designer[$key]['data'] = unserialize($p['data']);
        }
        //推荐本地设计公司数据
        $pos_design_company = M('PositionData')->where(array('posid'=>'3'))->select();
        foreach($pos_design_company as $key=>$p){
        	$pos_design_company[$key]['data'] = unserialize($p['data']);
        }
        //推荐本地设计工作室数据
        $pos_design_studio = M('PositionData')->where(array('posid'=>'4'))->select();
        foreach($pos_design_studio as $key=>$p){
        	$pos_design_studio[$key]['data'] = unserialize($p['data']);
        }
        //每日低价数据
        $everyday_low_price = M('PositionData')->where(array('posid'=>'5'))->select();
        foreach($everyday_low_price as $key=>$p){
        	$everyday_low_price[$key]['data']  = $temp = unserialize($p['data']);
        	$everyday_low_price[$key]['data']['title'] = implode("/",array_filter(unserialize($temp['title'])));
        	$everyday_low_price[$key]['data']['attr_style'] = implode("/",array_filter(unserialize($temp['attr_style'])));
        }*/
        // var_dump($everyday_low_price);

        // $this->assign('posLowPrice', $everyday_low_price);
        // $this->assign('posCompany',$pos_design_company);
        // $this->assign('posStudio',$pos_design_studio);
        // $this->assign('posDesigner',$pos_designer);
        $this->assign("style",$style);
        $this->assign("posdata",$posdata);
        $this->display();
    }
	
	
	public function shop(){
      redirect(U("Shop/Index/index"));
	}
	
	public function productlist(){
	    $style = I('get.style');
	    $pagenum = I('get.page','1','int');
	    //SQL条件
	    $where = array();
	    //类目
	    $where['attr_style'] = array('LIKE','%'.$style.'%');
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
	        $list[$key]['title'] = implode("/",array_filter(unserialize($li['title'])));
	    }
	   // $this->assign('catename',M('ProductCategory')->getFieldByCid($cid,'name'));
	   // $this->assign('searchOpts',$this->_searchOpts());
	    $this->assign('page',$page->show());
	    $this->assign('list',$list);
	   // var_dump($list);
	   // $this->assign('catelist',$catelist);
		$this->display("Material/productlist");	
	}


	public function designers(){
		redirect(U("Shop/Designer/index"));
	}
	
	public function show(){
    redirect(U("Shop/Product/show"));
	}

    
 
}
  



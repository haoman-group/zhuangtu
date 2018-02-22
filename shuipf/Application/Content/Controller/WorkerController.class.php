<?php
/**
* @class 网购轻工
* @author 李博凯
**/
namespace Content\Controller;

use Common\Controller\Base;
use Content\Model\ContentModel;
use Admin\Model\ProductCategoryModel as Cate;
class WorkerController extends Base {
    protected $model = NULL;
    protected $ProductCateMode = null;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Seller/Product');
        $this->ProductCateMode = D('Admin/ProductCategory');
    }
    public function index() {
        $posdata = D('Admin/PositionData')->getDataByPageID("2");
        foreach ($posdata as $k1 => $pos) {
            if(!empty($pos)){
                foreach ($pos as $k2 => $value) {
                    //获取星级
                    $shop = D('Member/Shop')->getInfoByProductID($value['dataid']);
                    $posdata[$k1][$k2]['star'] = $shop['star'];
                    //获取工种类型名称
                    $posdata[$k1][$k2]['crafttype'] = $this->craftType($value['dataid']);
                    //获取施工案例
                    $posdata[$k1][$k2]['case'] = implode("/",array_filter(unserialize($value['data']['case'])));
                    //获取价格
                    //此处特殊处理
                    $posdata[$k1][$k2]['price'] = $this->getPrice($value['dataid']);
                }
            }
        }
        $this->assign("work",$posdata['124']);
        $this->assign("backman",$posdata['126']);
        $this->assign("recommend",$posdata['127']);
        $this->assign('goodwork',$posdata['125']);
        $this->display();
    }
    public function show(){
        $this->display();
    }
    public function productlist(){
        $catid = I('get.catid');
        if(!$this->ProductCateMode->checkcate($catid,CATE::TYPE_WORKER)){
            $this->error("错误的类型!");
        }
        // 工人分类
        $workerCate = $this->ProductCateMode->getCateType(CATE::TYPE_WORKER);
        
        //类目名称
        $catename = $this->ProductCateMode->getFieldByCid($catid,'name');
        //SQL条件
	    $where = array();
	    //类目
	    $where['crafttype'] = $catid;
        $count = $this->model->where($where)->count();
	    $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
	    $list = $this->model->where($where)->page($pagenum.','.$this->Page_Size)->select();
	    //处理显示数据
	    foreach($list as $key=>$li){
	    	//填充店铺名称
	        $list[$key]['shopname'] = M('Shop')->getFieldById($li['shopid'],'name');
	    }
	    $this->assign('cate',$workerCate);
	    $this->assign('page',$page->show());
        $this->assign('catename',$catename);
        $this->assign('list',$list);
        $this->display();
    }
    //根据产品ID获取工种类型
    public function craftType($dataid){
        if(empty($dataid)){return false;}
        $cid = M('Product')->where(array('id'=>$dataid))->getField('crafttype');
        $crafttype = M('ProductCategory')->where(array('cid'=>$cid))->getField('name');
        return $crafttype;
     }
       //解析价格数组，获取价格最大值和最小值
    private function getPrice($dataid){
      if(empty($dataid)){return false;}
      $priceJson = M('Product')->where(array('id'=>$dataid))->getField('price_json');
      $price_Array = json_decode($priceJson);
      if(empty($price_Array)){return false;}
      $price = '';
      foreach ($price_Array as $key => $value) {
          $price = $value->price_act;
      }
      return (float)$price;
    }
}

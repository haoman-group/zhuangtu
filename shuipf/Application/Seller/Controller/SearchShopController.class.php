<?php

//店铺搜索
namespace Seller\Controller;

class  SearchShopController  extends  SellerbaseController{

	protected $model=NULL;
	protected $productmodel=NULL;
	protected $commentmodel=NULL;
    //protected $datmodel=NULL;
	protected function _initialize() {
        parent::_initialize();
        $this->model =M("Shop"); 
        $this->productmodel=M("Product");
        $this->commentmodel=M("CommentProduct");
        
        
    }

    // public function searchshop(){
    // 	$key=I("key",'null');
    // 	$where['name']=array("LIKE","%".$key."%");
    // 	$where['status']=1;
    //     $where['isdelete']=0;
    // 	$count=$this->model->join('left join zt_member_data on zt_memer_data.userid = zt_shop.uid')->where($where)->count();
    //     $page = $this->page($count,15);
    //     $page_num = I('page','1');
    //     $data = $this->model->field("zt_member_data.business_scope,zt_member_data.agent_brand,zt_shop.*")->join('left join zt_member_data on zt_memer_data.userid = zt_shop.uid')->where($where)->order('addtime desc')->page($page_num.','.'15')->select();
    //     foreach ($data as $key => $value) {
    //         $data[$key]['productinfo']=$this->productmodel->where(array('shopid'=>$value['id'],'status'=>10))->order("count_sold desc")->limit(4)->select(); 
    //      } 

    //     $this->assign("data",$data);
    //      $this->assign('Page',$page->show());
    //      $this->display();
    	
    // }


}





?>
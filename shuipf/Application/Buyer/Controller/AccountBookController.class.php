<?php
// +----------------------------------------------------------------------
// | ShuipFCMS 买家会员中心
// +----------------------------------------------------------------------
// | Action Base: 首页
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@163.com>
// +----------------------------------------------------------------------

namespace Buyer\Controller;
class AccountBookController extends BuyerbaseController {
    //订单状态数组
    protected $model=NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->model=M("DecorationBooks");

    }
    //首页
    public function index(){

    	$userid=$this->userid;
    	$money=$this->model->where(array('userid'=>$userid))->getField("money",true);
      $allmoney=array_sum($money);
      $ordermoney=M("Order")->where(array("buyer_id"=>$userid))->getField("order_amount",true);
      $allordermoney=array_sum($ordermoney);
      $all=$allmoney+$allordermoney;
      $order=M("Order")->where(array("buyer_id"=>$userid))->select();
      $res=M("Order")->field('zt_shop_category.pid,sum(order_amount)')
                       ->join("zt_shop zt_shop on zt_order.shop_id = zt_shop.id",'left')
                       ->join("zt_shop_category on zt_shop.catid = zt_shop_category.id",'left')
                       ->where(array("zt_order.buyer_id"=>$userid))
                       ->group('zt_shop_category.pid')->select();
      $account=$this->model->field('type,sum(money)')->group('type')->where(array('userid'=>$userid))->select();
      foreach ($account as $key => $value) {
        $account[$key]['pid']=$value['type'];
         $account[$key]['sum(order_amount)']=$value['sum(money)'];
         array_shift($account[$key]);
        array_shift($account[$key]);
      }
        if(empty($res)){
           $data=$account;
        }elseif(empty($account)){
              $data=$res;
        }else{
           $data=array_merge($account,$res);
        }
         $num=count($data);
         for($i=0;$i<=$num;$i++){
          for($j = $i + 1; $j <=$num; $j ++) { 
            if($data[$i]['pid'] == $data[$j]['pid']){
              $data[$i]['sum(order_amount)']=$data[$i]['sum(order_amount)']+$data[$j]['sum(order_amount)'];
              unset($data[$j]);
            }
          }
         }
            $mes=array();        
           foreach ($data as $key => $value) {
             $mes['data'][$value['pid']]=$value;
           } 
         $count=$this->model->where(array('userid'=>$userid))->count(); 
         $page = $this->page($count,15);
         $page_num = I('page','1'); 
        $info=$this->model->where(array('userid'=>$userid))->page($page_num.','.'15')->order("id desc")->select();
        foreach ($info as $key => $value) {
          switch ($info[$key]['type']) {
          case '1':
          		$info[$key]['typename']="设计师";break;		
          case '2':
          		$info[$key]['typename']="工人";break;			
          case '23':
          		$info[$key]['typename']="辅材";break;	
          case '3':
          		$info[$key]['typename']="主材";break;	
         case '4':
          		$info[$key]['typename']="家具";break;		
         case '5':
          		$info[$key]['typename']="家电";break;	 		 					
          }
         $info[$key]['picture']=explode(",", $value['picture']);
        }

        $this->assign("mes",$mes);
        $this->assign("data",$info);
        $this->assign("allmoney",$all);
        $this->assign('page',$page->show());
        $this->display();
    }
//买家中心装修账本的添加
    public function add(){
    	$data['addtime']=strtotime(I("addtime"));
    	$data['type']=I("type");
    	$data['userid']=$this->userid;
        $data['description']=I("description");
        $data['money']=I("money");
        $picture=I("picture");
        $where['picture']=implode(",",$picture);
        $data['video']=I("video");
        $data['remarks']=I("remarks");
        $result=$this->model->data($data)->add();
        if($result){
        	$this->ajaxReturn(array("status"=>1,"msg"=>"success"));
        }else{
        	$this->ajaxReturn(array("status"=>0,"msg"=>"error"));
        }
    }
    public function search(){
    	$userid=$this->userid;
      $money=$this->model->where(array('userid'=>$userid))->getField("money",true);
      $allmoney=array_sum($money);
      $ordermoney=M("Order")->where(array("buyer_id"=>$userid))->getField("order_amount",true);
      $allordermoney=array_sum($ordermoney);
      $all=$allmoney+$allordermoney;
      $order=M("Order")->where(array("buyer_id"=>$userid))->select();
      $res=M("Order")->field('zt_shop_category.pid,sum(order_amount)')
                       ->join("zt_shop zt_shop on zt_order.shop_id = zt_shop.id",'left')
                       ->join("zt_shop_category on zt_shop.catid = zt_shop_category.id",'left')
                       ->where(array("zt_order.buyer_id"=>$userid))
                       ->group('zt_shop_category.pid')->select();
      $account=$this->model->field('type,sum(money)')->group('type')->where(array('userid'=>$userid))->select();
      foreach ($account as $key => $value) {
        $account[$key]['pid']=$value['type'];
         $account[$key]['sum(order_amount)']=$value['sum(money)'];
         array_shift($account[$key]);
        array_shift($account[$key]);
      }
       
       if(empty($res)){
           $data=$account;
        }elseif(empty($account)){
              $data=$res;
        }else{
           $data=array_merge($account,$res);
        }
         $num=count($data);
         for($i=1;$i<=$num;$i++){
          for($j = $i + 1; $j < $num; $j ++) { 
            if($data[$i]['pid'] == $data[$j]['pid']){
              $data[$i]['sum(order_amount)']=$data[$i]['sum(order_amount)']+$data[$j]['sum(order_amount)'];
              unset($data[$j]);

            }

          }

         }
          $mes=array();        
           foreach ($data as $key => $value) {
             $mes['data'][$value['pid']]=$value;
           } 
       
       
        $year=I("year");
        $month=I("month");
        $day=I("day");
        $time=$year."-".$month."-".$day;
        $where['addtime']=array("egt",strtotime($time));
        $where['type']=I("type");
        $where['userid']=$this->userid;
        $info=$this->model->where($where)->select();
         foreach ($info as $key => $value) {
          switch ($info[$key]['type']) {
          	case '1':
          		$info[$key]['typename']="设计师";break;
          		
          case '2':
          		$info[$key]['typename']="工人";break;
          				
          case '23':
          		$info[$key]['typename']="辅材";break;
          		
          case '3':
          		$info[$key]['typename']="主材";break;
          		
         case '4':
          		$info[$key]['typename']="家具";break;
          		
         case '5':
          		$info[$key]['typename']="电器";break;
          		 		 					
          }
         $info[$key]['picture']=explode(",", $value['picture']);
        }

        //echo $this->model->getLastsql();exit;
        $this->assign("data",$info);
        $this->assign("allmoney",$all);
         $this->assign("mes",$mes);
        $this->display();

    }
    


   
}

<?php
// +----------------------------------------------------------------------
// | ShuipFCMS 买家会员中心
// +----------------------------------------------------------------------
// | Action Base: 首页
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@163.com>
// +----------------------------------------------------------------------

namespace Buyer\Controller;
class IndexController extends BuyerbaseController {
    protected function _initialize() {
        $this->orderModel = D('Order');
        $this->shopModel = D('Shop');
        $this->model=M("DecorationBooks");
        parent::_initialize();
    }
    //首页
    public function index(){
        $buyid=$this->userid;
        $order_state=I('order_state');
        $where['buyer_id']=$buyid;
        if($order_state) $where['order_state'] = $order_state;
        $evaluation_state=I('evaluation_state');
         $refund_state=I('refund_state');
        if($order_state) $where['order_state'] = $order_state;
        if($evaluation_state) $where['evaluation_state'] = $evaluation_state;
        if($refund_state) $where['refund_state'] = array('neq',$refund_state);;
        //$where['refund_state']=array('neq',$refund_state);
        //$where['order_state']=$order_state;
        $order=M('Order')->where($where)->select();
        foreach($order as $k=>$v){
            $order[$k]['shop'] = $this->shopModel->where(array('id'=>$v['shop_id']))->find();
            $order[$k]['shop']['cat_pid'] = D('Member/ShopCategory')->getPidByShopid($order[$k]['shop']['id']);
            $order[$k]['goods'] = $this->orderModel->getOrderGoodsList(array('order_id'=>$v['order_id']));
        }
       // $money=$this->model->where(array('userid'=>$buyid))->getField("money",true);
       // empty(array_sum($money))?$allmoney='0.00':$allmoney=array_sum($money);
       // $type1=$this->model->where(array("userid"=>$buyid,'type'=>1))->getField("money",true);
       // $type2=$this->model->where(array("userid"=>$buyid,'type'=>2))->getField("money",true);
       // $type3=$this->model->where(array("userid"=>$buyid,'type'=>3))->getField("money",true);
       // $type4=$this->model->where(array("userid"=>$buyid,'type'=>4))->getField("money",true);
       // $type5=$this->model->where(array("userid"=>$buyid,'type'=>5))->getField("money",true); 
       // $type6=$this->model->where(array("userid"=>$buyid,'type'=>6))->getField("money",true);
       //    $type11=array_sum($type1);
       //    $type12=array_sum($type2);
       //    $type13=array_sum($type3);
       //    $type14=array_sum($type4);
       //    $type15=array_sum($type5);
       //    $type16=array_sum($type6);
        $recommend=$this->recommend($buyid);
       $money=$this->model->where(array('userid'=>$buyid))->getField("money",true);
      $allmoney=array_sum($money);
      $ordermoney=M("Order")->where(array("buyer_id"=>$buyid))->getField("order_amount",true);
      $allordermoney=array_sum($ordermoney);
      $all=$allmoney+$allordermoney;
      $order=M("Order")->where(array("buyer_id"=>$buyid))->select();
      $res=M("Order")->field('zt_shop_category.pid,sum(order_amount)')
                       ->join("zt_shop zt_shop on zt_order.shop_id = zt_shop.id",'left')
                       ->join("zt_shop_category on zt_shop.catid = zt_shop_category.id",'left')
                       ->where(array("zt_order.buyer_id"=>$buyid))
                       ->group('zt_shop_category.pid')->select();
      $account=$this->model->field('type,sum(money)')->group('type')->where(array('userid'=>$buyid))->select();
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
       
        $this->assign("mes",$mes);
        $this->assign("all",$all);
        $this->assign("recommend",$recommend);
        $this->assign('order',$order);
        $this->display();
}
   public function recommend($uid){
        $shop_id=array();
        $Url=M("Url")->where(array('uid'=>$uid))->order("addtime desc")->select();
      if(count($Url) == 0){
       $recommend=M("Product")->where(array('status'=>10,'isdelete'=>0))->order("count_sold desc")->limit(4)->select();
      // echo M("Product")->getLastsql();exit;
      }else{
           if(count($Url) == 1){
           $shopid=M("Product")->where(array('id'=>$Url[0]['urlid']))->getField("shopid");
           $recommend=M("Product")->where(array("shopid"=>$shopid))->limit(4)->select();
         }elseif(count($Url) == 2 OR count($Url) == 3){
            foreach ($Url as $key => $value) {
                $shop_id[$key]=M("Product")->where(array('id'=>$value['urlid']))->getField("shopid",true);
                       
            }
             foreach ($shop_id as $k1 => $v1) {
                    $shopId[$k1]=$v1['0'];
                }
            if(count($shopId) == 1){
                      $recommend=M("Product")->where(array('shopid'=>$shopId[0]))->limit(4)->select();
                }else{
                    $productinfo1=M("Product")->where(array('shopid'=>$shopId[0]))->limit(2)->select();
                    $productinfo2=M("Product")->where(array('shopid'=>$shopId[1]))->limit(2)->select();
                    $recommend=array_merge($productinfo1,$productinfo2);
                } 

         }elseif(count($Url) >= 4){

            foreach ($Url as $k => $v) {
               $shop_id[$k]=M("Product")->where(array('id'=>$v['urlid']))->getField("shopid",true);   
                 
            } 
           
                foreach ($shop_id as $k1 => $v1) {
                    $shopId[$k1]=$v1['0'];
                }
                
             if(count($shopId) == 1){
                      $recommend=M("Product")->where(array('shopid'=>$shopId[0]))->limit(4)->select();
                }else{

                    $productinfo1=M("Product")->where(array('shopid'=>$shopId[0]))->limit(2)->select();
                    $productinfo2=M("Product")->where(array('shopid'=>$shopId[1]))->limit(2)->select();
                    $recommend=array_merge($productinfo1,$productinfo2);
                }
         }
          }

         return $recommend;
     }
}
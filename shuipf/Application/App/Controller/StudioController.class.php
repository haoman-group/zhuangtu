<?php
//直播间列表
namespace App\Controller;

class StudioController extends ApibaseController{
        protected $studio=NULL;
        protected $member=NULL;
        protected $studiocomment=NULL;
        protected $order=NULL; 
        protected $shop=NULL;
        protected $ShopinCategory=NULL;  
        protected $ordergood=NULL;
        protected $product=NULL;
        protected function _initialize() {
        parent::_initialize();
        $this->studio=M("Studio");
        $this->member=M("Member");
        $this->studiocomment=M("StudioComment");
        $this->order=M("Order");
        $this->shop=M("Shop");
        $this->shopcategory=M("ShopCategory");
        $this->ordergood=M("OrderGoods");
        $this->product=M("Product");
        }
      public function lists(){
        $userid=I('userid');
        $publishid=I("publishid");
        if(!empty($userid)){
           $where['userid']=$userid;
        }
        if(!empty($publishid)){
         $where['publishid']=$publishid;
        }
       	$studio=$this->studio->where($where)->order("addtime desc")->select();
       
       	foreach ($studio as $key => $value) {
          $mem[$key]=$this->member->where(array('userid'=>$value['userid']))->find();
       		$member[$key]=$this->member->where(array('userid'=>$value['publishid']))->find();
       		$order=$this->order->where(array("order_sn"=>$value['order_sn']))->find();
          $name=$this->getshopcategoryname($order['shop_id']);
          //$realname=$this->getname($order['order_id']);
       		$studiocomment=$this->studiocomment->where(array('studioid'=>$value['id']))->select();
          $studio[$key]['coustomername']=$mem[$key]['username'];
       		$studio[$key]['sellername']=$member[$key]['username'];//发布者
       		$studio[$key]['userppic']=$member[$key]['userpic'];
       		$studio[$key]['about']=$member[$key]['about'];
       		$studio[$key]['craftname']=$name;
           switch ($studio[$key]['step']){
             case "1":$studio[$key]['step'] = "设计阶段";break;
             case "2":$studio[$key]['step'] ="工人施工阶段";break;
             case "3":$studio[$key]['step'] ="验收阶段";break;
             case "4":$studio[$key]['step'] ="安装阶段";break;
           }

            $studio[$key]['studiocomment']=$studiocomment;
           if(empty($studiocomment)){

             $studio[$key]['studiocomment']=array();
           }
       		
       	}
               $this->ajaxReturn(array('status'=>1,'msg'=>'数据获取成功！','data'=>$studio));
       }
       public function getshopcategoryname($shopid){
       	$shopcid=$this->shop->where(array('id'=>$shopid))->getField("catid");
       	$shopcategorypid=$this->shopcategory->where(array('id'=>$shopcid))->getField("pid");
       	$craftname=$this->shopcategory->where(array('id'=>$shopcategorypid))->getField("name");
        return $craftname;

       }
       public function getname($order_id){
        $productid=$this->ordergood->where(array('order_id'=>$order_id))->getField("goods_id");
        $productinfo=$this->product->where(array('id'=>$productid))->find();
        if(!empty($productinfo['workername'])){
          $realname=$productinfo['workername'];

        }else{
          $realname=$productinfo['designer_name'];
        }

        return $realname;
       }
       //添加直播间评论数据

       public function addstudio(){

                $data['studioid']=I("studioid");
                $data['content']=I("content");
                $data['is_buyer']=I("is_buyer");
                $data['addtime']=time();
                if(empty($data['studioid']) || empty($data['content']) || empty($data['is_buyer'])){
                  return false;
                }else{
                  $result=$this->studiocomment->add($data);
                  
                  if($result){
                    $this->ajaxReturn(array('status'=>1,'msg'=>"操作成功",'data'=>$data));

                  }else{
                    $this->ajaxReturn(array('status'=>0,'msg'=>"操作失败"));

                  }
                }
       }
      //删除直播间评论
      public function delstudio(){
          $id=I("id");
          $result=$this->studiocomment->where(array('id'=>$id))->delete();
          if($result){
            $this->ajaxReturn(array('status'=>1,'msg'=>"操作成功"));

          }else{
            $this->ajaxReturn(array('status'=>0,'msg'=>"操作失败"));
          }
        

      } 
      //添加点赞的人
      public function addclicklike(){
         $id=I('id'); 
         $data['id']=$id;      
         $seller_like=I("seller_like");     
         $customer_like=I("customer_like");
         $data['seller_like']=$seller_like;
         $data['customer_like']=$customer_like;
        
         $result=$this->studio->where(array('id'=>$id))->save($data);
         $studioinfo=$this->studio->where(array('id'=>$id))->find();
         $name=$this->member->where(array('userid'=>$studioinfo['userid']))->getField("username");
         $studioinfo['username']=$name;
        if($result){
          $this->ajaxReturn(array('status'=>1,'msg'=>'操作成功','data'=>$studioinfo));

         }else{
          $this->ajaxReturn(array('status'=>0,'msg'=>"操作失败"));
         }

      }
      //PC端买家中心添加评论和回复评论
      public function addstudiocomment(){
        $data['studioid']=I("studioid");
        $data['content']=I("content");
        $data['addtime']=time();
        $data['is_buyer']=I("is_buyer");
        $result=$this->studiocomment->add($data);
        $userid=$this->studio->where(array('id'=>$data['studioid']))->getField("userid");
        $name=$this->member->where(array('userid'=>$userid))->getField("username");

        $data=$this->studiocomment->where($data)->order("addtime desc")->find();
        $data['username']=$name;
        if($result){
          $this->ajaxReturn(array('status'=>1,'msg'=>'添加成功','data'=>$data));

        }else{
          $this->ajaxReturn(array('status'=>0,'msg'=>"添加失败"));
        }

      }
      //添加直播间的数据
      public function addstuidodata(){
        $data['order_sn']=I("order_sn");
        $data['userid']=$this->getBuyer(I("order_sn"));
        $data['publishid']=$this->getSeller(I("order_sn"));
        // $data['order_sn']='8000000000001503';
        // $data['userid']=1040;
        // $data['publishid']=2327;
        $data['struction_content']=I("struction_content");
        $data['alert_release']=I("alert_release");
        $data['comm_release']=I("comm_release");
        $data['picture']=I("picture");
        $data['addtime']=time();
        $data['step']=$this->getstep($data['order_sn']);
        $result=$this->studio->add($data);
         if($result){
          $this->ajaxReturn(array('status'=>1,'msg'=>'添加成功'));

        }else{
          $this->ajaxReturn(array('status'=>0,'msg'=>"添加失败"));
        }

      }
      //获取阶段
      public function getstep($order_sn){
         $shopid=M("Order")->where(array('order_sn'=>$order_sn))->getField("shop_id");
         $catid=M("Shop")->where(array('id'=>$shopid))->getField("catid");
         $stepid=M("ShopCategory")->where(array('id'=>$catid))->getField("pid");
         return $stepid;
      }
      public function sellerlist(){
        if(!empty(I("userid"))){
            $where['userid']=I("userid");
        }
        if(!empty(I('publishid'))){
        $where['publishid']=I('publishid');
      }
        $studio=$this->studio->where($where)->order("addtime desc")->select();
        foreach ($studio as $key => $value) {
          $member[$key]=$this->member->where(array('userid'=>$value['userid']))->find();
          $order=$this->order->where(array("order_sn"=>$value['order_sn']))->find();
          $name=$this->getshopcategoryname($order['shop_id']);
          $realname=$this->getname($order['order_id']);
          $studiocomment=$this->studiocomment->where(array('studioid'=>$value['id']))->select();
          $studio[$key]['realname']=$realname;
          $studio[$key]['username']=$member[$key]['username'];
          $studio[$key]['userppic']=$member[$key]['userpic'];
          $studio[$key]['about']=$member[$key]['about'];
          $studio[$key]['craftname']=$name;
           switch ($studio[$key]['step']){
             case "1":$studio[$key]['step'] = "设计阶段";break;
             case "2":$studio[$key]['step'] ="工人施工阶段";break;
             case "3":$studio[$key]['step'] ="验收阶段";break;
             case "4":$studio[$key]['step'] ="安装阶段";break;
           }
            $studio[$key]['studiocomment']=$studiocomment;
           if(empty($studiocomment)){

             $studio[$key]['studiocomment']=array();
           }
        } 
         // if(empty($studio)){$this->ajaxReturn(array('status'=>0,'msg'=>'数据获取失败'));}
         if(empty($studio)){
            $this->ajaxReturn(array('status'=>1,'msg'=>'数据获取成功！','data'=>array()));
         }else{
        $this->ajaxReturn(array('status'=>1,'msg'=>'数据获取成功！','data'=>$studio));
        }
      }
      //卖家添加数据
      public function  addsellersutdio(){
        $data['userid']=I("userid");
        $data['publishid'] =I("publishid");
        $data['step']=$this->getstep(I("order_sn"));
        $data['struction_content']=I('struction_content');
        $data['alert_release']=I("alert_release");
        $data['comm_release']=I("comm_release");
        $data['picture']=I("picture");
        $data['addtime']=time();
        $data['order_sn']=I("order_sn");
        $result=$this->studio->add($data);
        if($result){
         $this->ajaxReturn(array('status'=>1,'msg'=>"操作成功"));
        }else{
          $this->ajaxReturn(array('status'=>0,'msg'=>'操作失败'));
        }
      } 
    public function getBuyer($order_sn){
      $Buyer=M("Order")->where(array('order_sn'=>$order_sn))->getField("buyer_id");
      return $Buyer;
    }
    public function getSeller($order_sn){
      $shopid=M("Order")->where(array('order_sn'=>$order_sn))->getField("shop_id");
      $Seller=M("Shop")->where(array('id'=>$shopid))->getField("uid");
      return $Seller;
    }
    //发布者的删除
    public function studioinfodelete(){
      $id=I("id");
      $result=$this->studio->where(array('id'=>$id))->delete();
      if($result){
        $result=1;
      }else{
        $result=0;
      }
      $delete=$this->studiocomment->where(array('studioid'=>$id))->delete();
      if($delete){
        $delete=1;
      }else{
        $delete=0;
      }
       $num=$result+$delete;
       if($num  >= 1){
         $this->ajaxReturn(array("status"=>1,'msg'=>"操作成功"));
       }else{
        $this->ajaxReturn(array("status"=>0,'msg'=>'操作失败'));
       }
    }
    public function notestudio(){
      $userid=I("userid");
      $alert_release=$this->studio->where(array('userid'=>$userid))->order("addtime desc")->select();
      foreach ($alert_release as $key => $value) {
        $alert_release[$key]['username']=M("Member")->where(array('userid'=>$userid))->getField("username");
      }
        $this->ajaxReturn(array('status'=>1,'msg'=>"成功",'data'=>$alert_release));
    }
    public function orderinfo(){
      $sellerid=I("sellerid");
      $shopid=M("Shop")->where(array("uid"=>$sellerid))->getField("id",true);
      $starttime=date(strtotime("-3 month"));
      $nowtime=time();
      $order=array();
      foreach ($shopid as $key => $value) {
       $where['_string'] ="`shop_id`=$value AND `order_state` <>0 AND `addtime`>$starttime AND `addtime`<$nowtime";
        //$where['_string'] ='"shop_id"='+$value+' AND "order_state" <>0 AND "addtime">'+$starttime+' AND "addtime"<'+$nowtime+'';
        $order=M("Order")->where($where)->select();
        foreach ($order as $k => $v) {
         $order[$k]['goods']=M("OrderGoods")->where(array("order_id"=>$v['order_id']))->getField("goods_name",true);
          $order[$k]['goods_image']=M("OrderGoods")->where(array("order_id"=>$v['order_id']))->getField(" goods_image",true);
          $order[$k]['provalue']=M("OrderGoods")->where(array("order_id"=>$v['order_id']))->getField("provalue",true);
          foreach ($order[$k]['provalue'] as $k1 => $v1) {
             $order[$k]['provalue'][$k1]=unserialize($order[$k]['provalue'][$k1]);
           } 
       
         $order[$k]['buyermobile']=M("Member")->where(array("userid"=>$v['buyer_id']))->getField("mobile");
        }
      }
        $this->ajaxReturn(array("status"=>1,'msg'=>"success",'data'=>$order));
    }
    
}
?>
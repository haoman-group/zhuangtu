<?php
// +----------------------------------------------------------------------
// | ShuipFCMS 买家会员中心
// +----------------------------------------------------------------------
// | Action Base: 用户数据
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@163.com>
// +----------------------------------------------------------------------

namespace Buyer\Controller;

class UserController extends BuyerbaseController {
    private $model ;
    protected $Page_Size=40;//宝贝收藏的页面容量
    protected $Page_Size_Shop=8;//店铺收藏的页面容量
    protected $Page_Size_Studio=4;
    protected $collectionModel=null;
    protected $productModel=null;
    protected $shopModel=null;
    protected $orderModel=null;
    protected $member=NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->orderModel=M('Order');
        $this->model = D("Buyer/BuyerAddr");
        $this->collectionModel=M('collection');
        $this->productModel=M('Product');
        $this->shopModel=M('Shop');
        $this->member=M("Member");

    }
    //收货地址
    public function shipAddr(){
        $result = $this->model->getAddr($this->userid);
        $num = $this->model->where(array('uid'=>$this->userid))->count();
        $this->assign("num",$num);
        $this->assign("info",$result);
        $this->display();

    }
    //新增收货地址
    public function addAddr(){
        if(IS_POST){
            $data = I('post.');
            $data['uid'] = $this->userid;
            $this->model->addAddr($data);
            $this->success("添加成功!",U("Buyer/User/shipAddr"));
        }else{
            $id = I("id");
            $fnparent = I("fnparent");
            $result = null;
            if(!empty($id)){
                $result= $this->model->where(array('id'=>$id))->find();
            }else{
                $result['area'] = "23,300,";
            }
            $this->assign('addr',$result);
            $this->assign('fnparent',$fnparent);
            $this->display();
        }
    }
    //修改收货地址
    public function editAddr(){
        if(IS_POST){
            $data = I('post.');
            $this->model->editAddr($data);
            $this->success("更新成功!",U("Buyer/User/shipAddr"));
        }else{
            $id = I("id");
            $result = $this->model->where(array('id'=>$id))->find();
            $this->assign('addr',$result);
            $this->display('addAddr');
        }
    }
    //删除收货地址
    public function deleteAddr(){
        $id = I('get.id');
        if($this->model->deleteAddr($id)){
            $this->success("删除成功",U("Buyer/User/shipAddr"));
        }else{
            $this->error("删除失败",U("Buyer/User/shipAddr"));
        }
    }
    //设置默认收货地址
    public function setDefault(){
        $id = I('get.id');
        if($this->model->setDefault($id,$this->userid)){
            $this->success("设置默认地址成功",U("Buyer/User/shipAddr"));
        }else{
            $this->error("设置默认地址成功",U("Buyer/User/shipAddr"));
        }
    }
    //个人信息
    public function profile(){
        if(IS_POST){
            $data = I('post.');
            if(D("Member/Member")->create($data)){
                D("Member/Member")->where(array('userid'=>$this->userid))->save();
            }else{
                $this->error("更新用户信息错误!");
            }
        }
        $result = service("Passport")->getLocalUser((int)$this->userid);
        $this->assign('userinfo',$result);
        $this->display();
    }
    //编辑头像
    public function userpic(){
        if(IS_POST){
            $data = I('post.product_picture_url');
            if(D("Member/Member")->create(array('userpic'=>$data[0]))){
                D("Member/Member")->where(array('userid'=>$this->userid))->save();
                $this->error("设置头像成功！",U("Buyer/User/profile"));
            }else{
                $this->error("更新用户头像错误！");
            }
        }else{
            $result = service("Passport")->getLocalUser((int)$this->userid);
            $user_avatar = service("Passport")->getUploadPhotosHtml($this->userid);
            $this->assign('userinfo',$result);
            $this->assign('user_avatar',$user_avatar);
            $this->display();
        }
    }
    //安全设置
    public function security(){
        $result = service("Passport")->getLocalUser((int)$this->userid);
        $this->assign('userinfo',$result);
        $this->display();
    }
    //我的消息
    public function message(){
        $this->display();
    }
    //我的收藏
    public function collection(){
        $uid=$this->userid;
       $product=$this->getProduct();

       //$proid=array();

      // $this->assign('shops',$shop);
        //$this->assign('products',$shoid['product']);
        //$this->assign('product',$product);

        $this->display();
    }
    public function collshop(){
        $shop=$this->getShopid();

         //$this->assign('shops',$shop);
         $this->display();
    }

    //宝贝收藏以及他的分页
    public function getProduct(){
       $pagenum = I('get.page','1','');
        $uid=$this->userid;
        $order=array('id'=>'desc');
        $productid=$this->collectionModel->where(array('uid'=>$uid,'isdelete'=>0,'type'=>"1"))->getField('itemid',true);
        $productid=array_filter($productid);
        $count=count($productid);
        $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
         $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
          $productdata = $this->collectionModel->where(array('uid'=>$uid,'isdelete'=>0,'itemid'=>array('neq','0'),'type'=>1))->page($pagenum.','.$this->Page_Size)->order($order)->getField('itemid',true);

        //echo $this->collectionModel->getLastSql();
        //$productdata=array_filter($productdata);
       //var_dump($productdata);
          foreach ($productdata as $key => $value) {
           $pro[]=$this->productModel->where(array('id'=>$value))->select();
        }

         foreach ($pro as $k => $v) {

             foreach ($v as $k1 => $v1) {
                 $data[] = $v1;

             }
         }
        //var_dump($data);
        $pageinfo["page"] = $page->show('sellercenter');
      $pageinfo['count'] = $count;
     // $pageinfo['page'] = $this->model->countcase();

      $this->assign('product',$data);
      $this->assign('pageinfo',$pageinfo);
      return;
       /* $productid=array();
        $pro=array();
       $product=array();
        $uid=$this->userid;
    // $this->ajaxReturn(array('status'=>1;'info'=>$uid));
        $productid=$this->collectionModel->where(array('uid'=>$uid,'isdelete'=>1))->getField('productid',true);
        $productid=array_filter($productid);

        foreach ($productid as $key => $value) {
           $pro[]=$this->productModel->where(array('id'=>$value))->select();
        }

        foreach ($pro as $k => $v) {

            foreach ($v as $k1 => $v1) {
                $product[]=$v1;

            }
        }
        return $product;*/

    }
    //店铺收藏以及分页
    public function getShopid(){
        $pagenum = I('get.page','1','');
        $uid=$this->userid;
        $order=array('id'=>'desc');
        $un=array('neq',0);
        $shopid=$this->collectionModel->distinct(true)->where(array('uid'=>$uid,'isdelete'=>0,'type'=>2))->getField('itemid',true);

        $shopid=array_filter($shopid);
        $count=count($shopid);
        $page = new \Libs\Util\Page($count,$this->Page_Size_Shop,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
          $shopdata=$this->collectionModel->distinct(true)->where(array('uid'=>$uid,'isdelete'=>0,'itemid'=>$un,'type'=>2))->page($pagenum.','.$this->Page_Size_Shop)->order($order)->getField('itemid',true);

         foreach ($shopdata as $key => $value) {
            $data[$key]['shopinfo'] = $this->shopModel->where(array('id'=>$value))->find();
            $data[$key]['product'] =  $this->productModel->where(array('shopid'=>$value,'status'=>10))->limit(5)->select();
        }

      $pageinfo["page"] = $page->show('sellercenter');
      $pageinfo['count'] = $count;

      $this->assign('shops',$data);

      $this->assign('pageinfo',$pageinfo);
         return ;
    }
    //购买过的店铺
    public function BuyingShop(){


     $sh=array();
     $uid=$this->userid;
    $shopid=$this->orderModel->where(array('buyer_id'=>$uid,'order_state'=>40))->getField('shop_id',true);
    $shopid=array_filter($shopid);
    foreach ($shopid as $key =>$value){
        $shop=array(
            'uid'=>$uid,
            'shopid'=>$value,
            'addtime'=>time(),
            'isdelete'=>0
        );
        $buystate=M('Buyshop')->where(array('uid'=>$uid,'shopid'=>$value,'isdelete'=>0));
        if(!$buystate){
        $buyshop=M('Buyshop')->data($shop)->add();
        }
        $buy=M('Buyshop')->where(array('uid'=>$uid,'shopid'=>$value))->select();
        if($buy){
            $buy=M('Buyshop')->where(array('uid'=>$uid,'shopid'=>$value))->getField("isdetele",0);
        }else {
            $re = M('Buyshop')->data($shop)->add();
        }
    }

        $buyshop=M('Buyshop')->where(array('uid'=>$uid,'isdetele'=>0))->getField("shopid",true);

  foreach ($buyshop as $k => $v) {
            $sh[$k]['shopinfo'] = $this->shopModel->where(array('id'=>$v))->find();
            $sh[$k]['product'] = $this->productModel->where(array('shopid'=>$v,'status'=>10))->order('updatetime desc' )->limit(5)->select();
        }


        $this->assign('shops',$sh);
        $this->display();
    }
    //直播间
    public function directRoom(){
        $pagenum = I('get.page','1','');
        $userid=$this->userid;

        $studiopay=M("Studio")->where(array('userid'=>$userid))->select();
        $count=count($studiopay);
        $page = new \Libs\Util\Page($count,$this->Page_Size_Studio,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
          //$shopdata=$this->collectionModel->distinct(true)->where(array('uid'=>$uid,'isdelete'=>0,'itemid'=>$un,'type'=>2))->page($pagenum.','.$this->Page_Size_Shop)->order($order)->getField('itemid',true);
        $studio=M("Studio")->where(array('userid'=>$userid))->page($pagenum.','.$this->Page_Size_Studio)->order("addtime desc")->select();
        foreach ($studio as $key => $value) {
          $mem[$key]=$this->member->where(array('userid'=>$value['userid']))->find();
          $member[$key]=$this->member->where(array('userid'=>$value['publishid']))->find();
          $order=M("Order")->where(array("order_sn"=>$value['order_sn']))->find();
          $categoryname=$this->getshopcategoryname($order['shop_id']);
          $crafttypename=$this->crafttypename($order['order_id']);
          $studio[$key]['struction_content']=explode(",",$studio[$key]['struction_content']);
          $studio[$key]['picture']=explode(",",$studio[$key]['picture']);
          $studiocomment=M('StudioComment')->where(array('studioid'=>$value['id']))->select();
          $studio[$key]['coustomername']=$mem[$key]['username'];
          $studio[$key]['sellername']=$member[$key]['username'];//发布者
          $studio[$key]['userppic']=$member[$key]['userpic'];
          $studio[$key]['about']=$member[$key]['about'];
          $studio[$key]['craftname']=$categoryname;
          $studio[$key]['crafttypename']=$crafttypename;
          $studio[$key]['studiocomment']=$studiocomment;
             switch ($studio[$key]['step']){
             case "1":$studio[$key]['step'] = "设计阶段";break;
             case "2":$studio[$key]['step'] ="工人施工阶段";break;
             case "23":$studio[$key]['step'] ="验收阶段";break;
            }



        }

        $this->assign("studio",$studio);
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('pageinfo',$pageinfo);
        $this->display();
    }
    //我的足迹
    public function footprint(){
        $uid=$this->userid;

     $url=M('Url')->where(array('uid'=>$uid))->limit(30)->order('addtime desc')->select();
           //var_dump($url);exit;
         $result = array();
      foreach ($url as $key => $value) {
         $url[$key]['addtime']=date("n.j ", $value['addtime']) ;
          //var_dump($url);
         $datetime = date("n.j ", $value['addtime']);
         // var_dump($datetime);

        if(!array_key_exists($datetime, $result)) {
          $result[$datetime] = array();
         }

         array_push($result[$datetime], M('product')->where(array('id' =>$value['urlid']))->find());

        //$result[$datetime][$key]['time']=$url[$key]['addtime'];
          $result[$datetime][0]['time']= $datetime = date("n.j ", $value['addtime']);
          //var_dump($result);exit;
      }
      //svar_dump($result);exit;
        $this->assign('products',$result);
        $this->display();
    }

    //我的评价
    public function myComment(){
        $userid=$this->userid;
       $comment=M('CommentProduct')->where(array('userid'=>$userid,'state'=>0))->select();
       $this->assign("comment",$comment);
        $this->display();
    }
    public function sellerComment(){
        $this->display();
    }

     public function colladd(){
        $id=I("id");
        if(!$id)$this->error("请选择要添加的店铺");

       $shopid=$this->Model->where(array('id'=>$id))->getField("shopid");
      if(!$shopid)$this->error("没有可添加的店铺");
      $result=$this->collectionModel->data($shopid)->add();
   if(!$result){
        $this->error("收藏店铺失败，请从新收藏");
    }else{
        $this->error("收藏店铺成功");
    }

   }
   public function colldel(){
    $id=I('id');
    $result=$this->collectionModel->where(array('shopid'=>$id))->detele();
    if(!$result){
     $this->error("删除失败");
    }else{
     $this->error("删除成功");
    }
   }
  //店铺收藏中店铺的取消关注
   public function unattention(){
    $shopid=I('shopid');
    $type=I('type');
    $result=$this->collectionModel->where(array('itemid'=>$shopid,'type'=>2))->setField('isdelete',1);
     if($result){
       $this->ajaxReturn(array('status'=>1,'infor'=>'操作成功'));
     }else{
       $this->ajaxReturn(array('status'=>0,'infor'=>'操作失败'));
     }
   }
  //购买过的店铺的删除
  public function delebuyshop(){
    $shopid=I("shopid");
    $result=M("Buyshop")->where(array('shopid'=>$shopid))->setField("isdetele",1);
      if($result){
          $this->ajaxReturn(array('status'=>1,'infor'=>'操作成功'));

      }else{
          $this->ajaxReturn(array('status'=>0,'infor'=>'操作失败'));
      }
  }

 public function  collbuyshop(){
     $shopid=I("shopid");
     $result=M("Buyshop")->where(array('shopid'=>$shopid))->setField("isdetele",1);

     $collection=array(
      'uid'=>$this->userid,
      'addtime'=>date("Y-m-d H:s:i",time()),
      'isdelete'=>0,
      'type'=>2,
       'itemid'=>$shopid
     );
     $re=M('Collection')->data($collection)->add();
     if($result){
         $this->ajaxReturn(array('status'=>1,'infor'=>'操作成功'));

     }else{
         $this->ajaxReturn(array('status'=>0,'infor'=>'操作失败'));
     }

 }
    public function pay_commentedit(){
        $commentid=I("id");
        $order_sn=I("order_sn");
        $orid=M('Order')->where(array('order_sn'=>$order_sn))->find();

        $goods=M('OrderGoods')->where(array('order_id'=>$orid['order_id']))->find();
        $comment=M('CommentProduct')->where(array('id'=>$commentid))->find();
        $product=M('Product')->where(array('id'=>$comment['product_id']))->find();
        $product['content']=$comment['content'];
        $product['scores']=$comment['scores'];
        $product['isanonymous']=$comment['isanonymous'];
        $commshop=M('CommentShop')->where(array('order_sn'=>$order_sn))->find();
        $product['lineshop']=$commshop['lineshop'];
        $product['provalue']=unserialize($goods['provalue']);
        $product['lineservice']=$commshop['lineservice'];
        $product['onlineshop']=$commshop['onlineshop'];
        $product['onlineseveri']=$commshop['onlineseveri'];
        //var_dump($product);exit;

        //var_dump($product);exit;
        //var_dump($goods);exit;
        //$product=M('Product')->where(array('id'=>$goods['goods_id']))->find();
        //$product['provalue']=unserialize($goods['provalue'] );
        $this->assign('product',$product);

        $this->display("Cart/pay_comment");
    }

    public function pay_commentdele(){
        $commentid=I('id');
        $comment=M('CommentProduct')->where(array('id'=>$commentid))->setField('state',1);
        if($comment){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }


     public function getshopcategoryname($shopid){
        $shopcid=M("Shop")->where(array('id'=>$shopid))->getField("catid");

        $shopcategorypid=M('ShopCategory')->where(array('id'=>$shopcid))->getField("pid");
        $craftname=M('ShopCategory')->where(array('id'=>$shopcategorypid))->getField("name");
        return $craftname;

       }


        public function crafttypename($order_id){
        $productid=M("OrderGoods")->where(array('order_id'=>$order_id))->getField("goods_id");
        $productinfo=M("Product")->where(array('id'=>$productid))->find();
        $crafttypename=M('ProductCategory')->where(array('cid'=>$productinfo['cid']))->getField("name");

         // $crafttypename=$productinfo['workername'];
        return $crafttypename;
       }



}

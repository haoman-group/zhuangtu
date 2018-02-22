<?php
// +----------------------------------------------------------------------
// | ShuipFCMS 买家模块
// +----------------------------------------------------------------------
// | Action 购物车
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@163.com>
// +----------------------------------------------------------------------

namespace Buyer\Controller;

use Admin\Model\ProductCategoryModel as Cate;
class CartController extends BuyerbaseController {
    private $model = null;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D("Buyer/Cart");
        $this->productModel = D("Product");
        $this->memberModel=D('Member/Member');
        $this->shopModel = D("Shop");
        $this->addrModel = D("Buyer/BuyerAddr");
        $this->orderModel = D("Buyer/Order");
        $this->orderGoodsModel = D('OrderGoods');
        $this->orderCommonModel = D('OrderCommon');
    }
    //首页
    public function index(){

        $this->redirect('lists');
    }
    //购物车列表
    public function lists(){
        $type=$_GET['type'];
        $where = array();
       switch ($type){
            case "1":$where['catid'] = array("IN",'6,7,8');break;
            case "2":$where['catid']=array("IN",'9,10,11');break;
            case "3":$where['catid']=array("IN",'12,13,14');break;
            case "4":$where['catid']=array("IN",'15,16,17');break;
            case "5":$where['catid']=array("IN",'18,19,20');break;
            case "21":$where['catid']=array("IN", '22');break;
            case "23":$where['catid']=array("IN", '24');break;
            case '':$where['catid']=array("IN",'6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24');

        }
        $where['zt_cart.uid'] = $this->userid;
        $data = $this->getCartLists($where);

        //$count=count($data['cartlist']);
        $date=array();
        foreach ($data['cartlist'] as $k1 =>$v1){

           switch ($type){
               case "$data[cartlist][$k1]['shop']['catid']":
                $date[]=$data[cartlist][$k1];
               break;

           }

        }


        $countall=M('Cart')->where(array('uid'=>$this->userid))->count();
       // $count=$this->catid();
       foreach ($data['cartlist'] as $key =>$value){
          $shopid[]=M('Product')->where(array('id'=>$value['proid']))->getField("shopid");
        }
        foreach ($shopid as $k =>$v){
            $catid[]=M('Shop')->where(array('id'=>$v))->getField("catid");
            $data['cartlist'][$k]["type"]=M('Shop')->where(array('id'=>$v))->getField("catid");
        }
        $cat=array_count_values($catid);

         //var_dump($catid);exit;
        $this->assign("cat",$cat);
        $this->assign("countall",$countall);
        //$this->assign("count",$count);
        $this->assign('data',$data['cartlist']);
        $this->display();
    }

    public function orderconfirm(){
//        if(IS_POST){
//            session('Order_cartID',null);
//            $cartid = I('cartid');
//            session('Order_cartID',$cartid);
//        }else{
//            $cartid = session('Order_cartID');
//        }
//        $cartlist = $this->model->getCartList(array('uid'=>$this->uid,'id'=>array('in',$cartid)));
//        $addrlist = $this->addrModel->getAddr($this->userid);
//        $this->assign('cartlist',$cartlist['cartlist']);
//        $this->assign('total',$cartlist['total']);
//        $this->assign("addrlist",$addrlist);
//        $this->assign('cartid',implode(',',$cartid));
//        $this->display();

        $cartid = I('cartid');

        $cartlist = $this->model->getCartList(array('uid'=>$this->uid,'id'=>array('in',$cartid)));

        $addrlist = $this->addrModel->getAddr($this->userid);
        $this->assign('cartlist',$cartlist['cartlist']);
        $this->assign('total',$cartlist['total']);
        $this->assign("addrlist",$addrlist);
        $this->assign('cartid',implode(',',$cartid));
        $this->display();
    }

    public function orderpay(){


        if(IS_POST){
            $msg = I('msg');//买家留言
            $cartid = I('cartid');
            $addrid = I('addrid');

            // $data['cartlist'] = $this->model->getCartList(array('uid'=>$this->uid,'id'=>array('in',$cartid)));
            // $data['address'] = $this->addrModel->getAddrInfo(array('id'=>$addrid));
            $data = array(
                'cartid'=>$cartid,
                'addrid'=>$addrid,
                'msg'=>$msg
            );
            $cart_list = D('Buyer/Cart')->getCartList(array('id'=>array('in',$cartid),'uid'=>$this->userid));
            foreach ($cart_list['cartlist'] as $key => $value) {
                $res = $this->checkProductlimit($value['cart'][0]['proid'],$value['cart'][0]['num']);
                if(!$res){
                    $title = M('Product')->where(array('id'=>$value['proid']))->getField('title');
                    $this->error(":".$title.':超过限定的数量');
                }
            }
            $order_info = $this->orderModel->addOrder($data,$this->userid);
           if(empty($order_info)){
               $this->error("请添加地址");

           }
            // $this->assign('pay_sn',$order_info[0]);
            // $this->assign('order',$order_info[1]);
            // $this->display();
            redirect(U('orderpay',array('pay_sn'=>$order_info[0])));
        }else{
            $pay_sn = I('pay_sn');
            $order = $this->orderModel->getOrderByPaySn($pay_sn,array('order_common','order_goods'));

            $total_fee = $this->orderModel->getTotalfee($pay_sn);

            $this->assign('order',$order);
            $this->assign('order_common',$order[0]['order_common']);
            $this->assign('total_fee',$total_fee);
            $this->assign('pay_sn',$pay_sn);
            //$pay_sn=I("pay_sn");
            $Seller_mobile=M('Member')->join("zt_shop on zt_shop.uid = zt_member.userid")->where(array('zt_shop.id'=>$order[0]['shop_id']))->getField("zt_member.mobile");
             //var_dump($Seller_mobile);exit;
            if(!empty($Seller_mobile)) {
                if(empty($_SESSION['pay_sn']) || ($_SESSION['pay_sn'] != $pay_sn)) {
                    $send = $this->memberModel->send_user($this->userinfo['mobile'], $Seller_mobile, $order[0]['order_sn']);
                    $_SESSION['pay_sn'] = $pay_sn;
                }

            }

            $this->display();
        }



    }
    public function pay(){
        ($pay_sn = I('pay_sn')) || $this->error('参数不完整');
        $order = $this->orderModel->where(array('pay_sn'=>$pay_sn,'order_state'=>ORDER_STATE_NEW))->select();
        $total_fee = 0;
        foreach($order as $k=>$v){
            $total_fee += $v['order_amount'];
        }
        //保存面对面(线下)支付的值
        $pay_type = I('pay_type',0);
        $this->orderModel->setPayType($pay_sn,$pay_type);
        \beecloud\rest\api::registerApp(C('BEECLOUD.APP_ID'), C('BEECLOUD.APP_SECRET') ,C('BEECLOUD.MASTER_SECRET'), C('BEECLOUD.TEST_SECRET'));
        \beecloud\rest\api::setSandbox(false);
        $data = array();
        $appSecret = C('BEECLOUD.APP_SECRET');
        $data["app_id"] = C('BEECLOUD.APP_ID');


        $data["timestamp"] = time() * 1000;
        $data["app_sign"] = md5($data["app_id"] . $data["timestamp"] . $appSecret);
        $data["total_fee"] = intval($total_fee*100);
        // $data["total_fee"] = 1;
        $data["bill_no"] = $pay_sn;
        $data["title"] = "装途网订单支付";
        $data["return_url"] = U("Buyer/cart/paysuccess");
        //选填 optional
        $data["optional"] = json_decode(json_encode(array("pay_sn"=>$pay_sn)));

        $type = I('payment_code');
        switch($type){
            case 'ALI_WEB' :
                header("Content-type:text/html;charset=utf-8");
                $title = "支付宝及时到账";
                $data["channel"] = "ALI_WEB";
                break;
            case 'ALI_WAP' :
                $title = "支付宝移动网页";
                $data["channel"] = "ALI_WAP";
                break;
            case 'ALI_QRCODE' :
                $title = "支付宝扫码支付";
                $data["channel"] = "ALI_QRCODE";
                //qr_pay_mode必填 二维码类型含义
                //0： 订单码-简约前置模式, 对应 iframe 宽度不能小于 600px, 高度不能小于 300px
                //1： 订单码-前置模式, 对应 iframe 宽度不能小于 300px, 高度不能小于 600px
                //3： 订单码-迷你前置模式, 对应 iframe 宽度不能小于 75px, 高度不能小于 75px
                $data["qr_pay_mode"] = "0";
                break;
            case 'BD_WEB' :
                $data["channel"] = "BD_WEB";
                $title = "百度网页支付";
                break;
            case 'BD_WAP' :
                $data["channel"] = "BD_WAP";
                $title = "百度移动网页";
                break;
            case 'JD_B2B' :
                $data["channel"] = "JD_B2B";
                $title = "京东B2B";
                break;
            case 'JD_WEB' :
                $data["channel"] = "JD_WEB";
                $title = "京东网页";
                break;
            case 'JD_WAP' :
                $data["channel"] = "JD_WAP";
                $title = "京东移动网页";
                break;
            case 'UN_WEB' :
                $data["channel"] = "UN_WEB";
                $title = "银联网页";
                break;
            case 'WX_NATIVE':
                $data["channel"] = "WX_NATIVE";
                $title = "微信扫码";
                $this->assign('data',$data);
                $this->display('wx_native');
                exit();
                break;
            case 'WX_JSAPI':
                $data["channel"] = "WX_JSAPI";
                $data["openid"] = $_SESSION['openid'];
                $title = "微信H5网页";
                $this->assign('data',$data);
                $this->display('wx_jsapi');
                exit();
                break;
            case 'YEE_WEB' :
                $data["channel"] = "YEE_WEB";
                $title = "易宝网页";
                break;
            case 'YEE_WAP' :
                $data["channel"] = "YEE_WAP";
                $data["identity_id"] = "lengthlessthan50useruniqueid";
                $title = "易宝移动网页";
                break;
            case 'KUAIQIAN_WEB' :
                $data["channel"] = "KUAIQIAN_WEB";
                $title = "快钱移动网页";
                break;
            case 'KUAIQIAN_WAP' :
                $data["channel"] = "KUAIQIAN_WEB";
                $title = "快钱移动网页";
                break;
            case 'PAYPAL_PAYPAL' :
                $data["channel"] = "PAYPAL_PAYPAL";
                $data["currency"] = "USD";
                $title = "Paypal网页";
                break;
            case 'PAYPAL_CREDITCARD' :
                $data["channel"] = "PAYPAL_CREDITCARD";
                $data["currency"] = "USD";

                $card_info = array(
                    'card_number' => '',
                    'expire_month' => 1,  //int month
                    'expire_year' => 2016, //int year
                    'cvv' => 0,           //string
                    'first_name' => '', //string
                    'last_name' => '',  //string
                    'card_type' => 'visa' //string
                );
                $data["credit_card_info"] = (object)$card_info;
                $title = "Paypal信用卡";
                break;
            case 'PAYPAL_SAVED_CREDITCARD' :
                $data["channel"] = "PAYPAL_SAVED_CREDITCARD";
                $data["currency"] = "USD";
                $data["credit_card_id"] = '';
                $title = "Paypal快捷";
                break;
            case 'ALI_OFFLINE_QRCODE' :
                $data["channel"] = "ALI_OFFLINE_QRCODE";
                require_once 'ali.offline.qrcode/index.php';
                exit();
                break;
            case 'BC_GATEWAY' :
                $data["channel"] = "BC_GATEWAY";
                /*
                CMB   招商银行    ICBC  工商银行   CCB   建设银行（暂时不支持）
                BOC   中国银行    ABC    农业银行   BOCM    交通银行
                SPDB  浦发银行    GDB   广发银行   CITIC    中信银行
                CEB   光大银行    CIB   兴业银行   SDB  平安银行
                CMBC  民生银行
                */
                $data["bank"] = "ICBC";
                break;
            case 'BC_KUAIJIE' :
                $data["channel"] = "BC_KUAIJIE";
                break;
            default :
                exit("No this type.");
                break;
        }

        // $result = \beecloud\rest\api::bill($data);

        try {
            if(in_array($type, array('PAYPAL_PAYPAL', 'PAYPAL_CREDITCARD', 'PAYPAL_SAVED_CREDITCARD'))){
                $result =  $international->bill($data);
            }else{
                $result =  \beecloud\rest\api::bill($data);
            }
            if ($result->result_code != 0) {
                echo json_encode($result);
                exit();
            }
            if(isset($result->html)) {
                echo $result->html;
            }else if(isset($result->url)){
                header("Location:$result->url");
            }else if(isset($result->credit_card_id)){
                echo '信用卡id(PAYPAL_CREDITCARD): '.$result->credit_card_id;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
    public function order_status(){
        ($pay_sn = I('pay_sn')) || $this->error('参数不完整');
        $pay_state = $this->orderModel->getPayState($pay_sn);
        if($pay_state=='1'){
            $this->api_success('支付成功');
        }else{
            $this->api_error('未支付');
        }
    }
    public function paysuccess(){
        $order_sn=$_GET['order_sn'];
        $order_infor=$this->orderModel->where(array('order_sn'=>$order_sn))->find();
        // if($order_infor['order_state'] == 40) {
        // }else{
        //     $this->error("付款失败");
        // }
        $aliTradeSuccess = ($_GET["trade_status"] == "TRADE_SUCCESS" || $_GET["trade_status"] == "TRADE_FINISHED") ? true : false ;
        if($aliTradeSuccess){
            $order = $this->orderModel->getOrderByPaySn(I('out_trade_no'),array('order_goods','order_common'));
            $total_fee = $this->orderModel->getTotalfee(I('out_trade_no'));
            //$consumertel = M('Member')->where(array('userid' => $order_infor['buyer_id']))->find();
            //$Seller_mobile = M('Member')->join("zt_shop on zt_shop.uid = zt_member.userid")->where(array('zt_shop.id' =>$order_infor['shop_id']))->getField("zt_member.mobile");
               /* if(empty($_SESSION['order_sn']) || ($_SESSION['pay_sn'] != $order_sn)) {
                    //付款后统治买家
                    $send_consumer = $this->memberModel->send_user_pay($consumertel['mobile'], $Seller_mobile, $order_infor['order_sn']);
                    //付款后统治卖家
                    $send_business = $this->memberModel->send_company($Seller_mobile, $consumertel['mobile'], $consumertel['username'], $order_infor['order_sn']);
                    // 付款后统治市场部
                    $telphone = M('Shop')->where(array('id' => $order_infor['shop_id']))->getField('telphone');
                    if (!empty($telphone)) {
                        $telphone = unserialize($telphone);
                        foreach ($telphone as $key => $value) {
                            if (!empty($value["'mobile'"])) {
                                $send_zhuangtu = $this->memberModel->send_zhuangtu($value["'mobile'"], $consumertel['mobile'], $consumertel['username'], $order_infor['order_sn']);
                            }
                        }
                    }
                      $_SESSION['order_sn']=$order_sn;
                }*/
            $this->assign('total_fee',$total_fee);
            $this->assign('order',$order);
            $this->assign('order_common',$order[0]['order_common']);
        }else{
            $this->assign('error','支付失败');
        }
        $this->display();
    }

    public function api_success($data='',$msg='',$type='JSON'){
        $this->ajaxReturn(array('status'=>1,'data'=>$data,'msg'=>$msg),$type);
    }
    public function api_error($msg,$type="JSON"){
        $this->ajaxReturn(array('status'=>0,'msg'=>$msg),$type);
    }

    public function api(){
        $act = I('act');
        switch ($act) {
            case 'add':
                ($objpro = I('objpro')) || $this->api_error('参数不完整');
                $proids = array();
                $this->model->startTrans();
                if (empty($objpro)) {
                    $this->model->rollback();
                    $this->api_error('参数不完整');
                }
                foreach($objpro as $item) {
                    $proid = $item['id'];
                    if (!$proid) {
                        $this->model->rollback();
                        $this->api_error('参数不完整');
                    }
                    $proids[] = $proid;
                    $res = $this->checkProductlimit($proid,$item['num']);
                    if(!$res){
                        $this->api_error(':超过限定的数量');
                    }
                    $num = $item['num'];
                    $proindex = $item['proindex'];
                    $data = array(
                        'proid'=>$proid,
                        'num'=>$num,
                        'uid'=>$this->userid,
                        'proindex'=>html_entity_decode($proindex),
                    );
                    $re = $this->model->addCart($data);
                    if(!$re) {
                        $this->model->rollback();
                        $this->api_error('提交失败');
                    }
                }
                $this->model->commit();
                $this->api_success(implode(",", $proids));
                break;
            case 'del':
                ($id = I('id')) || $this->api_error('参数不完整');
                $re = $this->model->deleteOne($id,$this->userid);
                if(!$re) $this->api_error('删除失败');
                $this->api_success('删除成功');
                break;
            case 'clear':
                $re = $this->model->clear($this->userid);
                if(!$re) $this->api_error('清空失败');
                $this->api_success('清空成功');
                break;
            case 'getnum':
                $cartnum = $this->model->where(array('uid'=>$this->userid))->count();
                $this->api_success($cartnum,'','json');
                break;
            case 'num':
                ($id = I('id')) || $this->api_error('参数不完整');
                ($num = I('num')) || $this->api_error('参数不完整');
                if($num<=0) $this->error('数量错误');
                $prod_id = $this->model->where(array('id'=>$id))->getField('proid');
                $res = $this->checkProductlimit($prod_id,$num);
                if(!$res){
                    $this->api_error(':超过限定的数量');
                }
                $re = $this->model->where(array('id'=>$id))->setField('num',$num);
                $this->api_success('提交成功');
                break;
            default:
                # code...
                break;
        }
    }
    public function pay_comment(){

      /*  if(IS_POST){

        $content=I('content');
        $lineshop=I('star1');
        $lineservice=I('star2');
            $onlineshop=I('star3');
            $onlineservice=I('star4');
        $star=I('star');
        $leve=I("bb");
        $anonymous=I('anonymous');
        $pic=I('pic');
        $pic=implode(",",$pic );
         $comment=array();
        $sn=I('sn');
        var_dump($sn);exit;
        $orid=$this->orderModel->where(array('order_sn'=>$sn))->find();
        $goods=M('OrderGoods')->where(array('order_id'=>$orid['order_id']))->find();
         $comment=array(
            'order_id'=>$orid['order_id'],
            'order_sn'=>$orid['order_sn'],
            'ordergoods_id'=>$goods['rec_id'],
            'product_id'=>$goods['goods_id'],
            'product_name'=>$goods['goods_name'],
            'product_price'=>$goods['goods_price'],
            'product_image'=>$goods['goods_image'],
            'scores'=>$leve,
            'content'=>$content,
            'isanonymous'=> $anonymous,
            'addtime'=>time(),
            'shop_id'=>$orid['shop_id'],
            'shop_name'=>$orid['shop_name'],
            'userid'=>$orid['buyer_id'],
            'username'=>$orid['buyer_name'],
            'state'=>0,
            'remark'=>'',
            'explain'=>'',
            'image'=>$pic

            );
           $shopComment=array(
               'order_id'=>$orid['order_id'],
               'order_sn'=>$orid['order_sn'],
               'addtime'=>time(),
               'shop_id'=>$orid['shop_id'],
               'shop_name'=>$orid['shop_name'],
               'userid'=>$orid['buyer_id'],
               'username'=>$orid['buyer_name'],
               'lineshop'=>$lineshop,
               'lineservice'=>$lineservice,
               'onlineshop'=>$onlineshop,
               'onlineservice'=>$onlineservice

           );
            $commshop=M("CommentShop")->data()->add();
          $re=M('CommentProduct')->where(array('userid'=>$orid['buyer_id'],'product_id'=>$goods['goods_id']) )->select();
            $sta=$this->orderModel->where(array('orser_sn'=>$sn))->setField('evaluation_state','1');
          if(!$re){

         $comm=M('CommentProduct')->data($comment)->add();
         $this->error("提交成功",U("Order/index"));

     }else{

     }
            //$productid=M("CommentProduct")->where(array('order_sn'=>$sn))->getField("product_id");
            //$commentcount=M('Comment')->where(array('product_id'=>$productid,'scores'=>1))->count();

        //
        //$pic=I('pic');
        //$pic=implode(",",$pic );
}*/
        $pay_sn=I("order_sn");
        $id=I('id');
        $orid=$this->orderModel->where(array('order_sn'=>$pay_sn))->find();
        $comment=M('CommentProduct')->where(array('order_sn'=>$pay_sn,'type'=>0))->find();
        $goods=M('OrderGoods')->where(array('order_id'=>$orid['order_id']))->find();
        if($id){
            $product=M('Product')->where(array('id'=>$id))->find();
        }else{
            $product=M('Product')->where(array('id'=>$goods['goods_id']))->find();
        }
        //var_dump($goods);exit;
        //$product=M('Product')->where(array('id'=>$goods['goods_id']))->find();
        $product['provalue']=unserialize($goods['provalue'] );
        $this->assign('comment',$comment);
        $this->assign('product',$product);
        $this->display();

    }


    public function catid(){
        $uid=$this->userid;
        $shopid=M('Cart')->where(array('uid'=>$uid))->getField("shopid",true);
        foreach ($shopid as $key =>$value){
            $catid[]=M('Shop')->where(array('id'=>$value))->getField("catid");

        }
    }
    public function pay_commentProduct(){
        $sn=I('order_sn');

        $where = array(
            'buyer_id'=>$this->userid,
        );

        //$count = $this->orderModel->where($where)->count();

        $data = $this->orderModel->where(array('order_sn'=>$sn))->order('addtime desc')->select();
        foreach($data as $k=>$v){
            $data[$k]['shop'] = $this->shopModel->where(array('id'=>$v['shop_id']))->find();
            $data[$k]['shop']['cat_pid'] = D('Member/ShopCategory')->getPidByShopid($data[$k]['shop']['id']);
            $data[$k]['goods'] = $this->orderModel->getOrderGoodsList(array('order_id'=>$v['order_id']));
        }

        $this->assign('order',$data);
        $this->display();
    }
    public function getCartLists($condition = array()){
        //$Cart=M('Cart');
        $uid = $condition['uid'];
        $data=$this->model->join("zt_shop ON zt_cart.shopid=zt_shop.id ")->distinct(true)->field('shopid')->where($condition)->order('zt_cart.id desc')->select();
        $total = 0;
        foreach($data as $k=>$v){
            $total_fee = 0;
            $data[$k]['shop'] = M('Shop')->where(array('id'=>$v['shopid']))->find();

            $condition['shopid'] = $v['shopid'];
            $data[$k]['cart'] = $this->model->where($condition)->order('id desc')->select();

            foreach($data[$k]['cart'] as $k1=>$v1){
                $product = M('Product')->where(array('id'=>$v1['proid']))->find();
                if($v1['proindex']){
                    $product['price_array'] = object2array(json_decode($product['price_json']));
                    foreach($product['price_array'] as $k2=>$v2){
                        if($v1['proindex']==$v2['hidden_value']){
                            $product['provalue'] = $v2;
                        }
                    }
                    $data[$k]['cart'][$k1]['total'] = $v1['num']*$product['provalue']['price_act'];
                    $total_fee += $data[$k]['cart'][$k1]['total'];
                    $total += $data[$k]['cart'][$k1]['total'];
                }
                $data[$k]['cart'][$k1]['product'] = $product;
                $collection=M("Collection")->where(array('itemid'=>$product['id'],'type'=>1,'uid'=>$this->userid))->count();
                if($collection >0){
                    $data[$k]['cart'][$k1]["collected"]=1;
                }else{
                    $data[$k]['cart'][$k1]["collected"]=0;
                }
            }
            $data[$k]['total_fee'] = $total_fee;
        }

        return array('cartlist'=>$data,'total'=>$total);
    }

    public function pay_commentend(){

        $content=I('content');

        $lineshop=I('star1');
        $lineservice=I('star2');
        $onlineshop=I('star3');
        $onlineservice=I('star4');
        $star=I('star');
        $leve=I("bb");
        $addcom=I("addcom");
        //var_dump($addcom);exit;
        $anonymous=I('anonymous');
        $pic=I('pic');
        $pic=implode(",",$pic );
        $comment=array();
        $sn=I('sn');
        $orid=$this->orderModel->where(array('order_sn'=>$sn))->find();
        $goods=M('OrderGoods')->where(array('order_id'=>$orid['order_id']))->find();
        $comment=array(
            'order_id'=>$orid['order_id'],
            'order_sn'=>$orid['order_sn'],
            'ordergoods_id'=>$goods['rec_id'],
            'product_id'=>$goods['goods_id'],
            'product_name'=>$goods['goods_name'],
            'product_price'=>$goods['goods_price'],
            'product_image'=>$goods['goods_image'],
            'scores'=>$leve,
            'content'=>$content,
            'isanonymous'=> $anonymous,
            'addtime'=>time(),
            'shop_id'=>$orid['shop_id'],
            'shop_name'=>$orid['shop_name'],
            'userid'=>$orid['buyer_id'],
            'username'=>$orid['buyer_name'],
            'state'=>0,
            'remark'=>'',
            'type'=>'0',
            'explain'=>'',
            'image'=>$pic

        );
        $commentadd=array(
            'order_id'=>$orid['order_id'],
            'order_sn'=>$orid['order_sn'],
            'ordergoods_id'=>$goods['rec_id'],
            'product_id'=>$goods['goods_id'],
            'product_name'=>$goods['goods_name'],
            'product_price'=>$goods['goods_price'],
            'product_image'=>$goods['goods_image'],
            'scores'=>$leve,
            'content'=>$content,
            'isanonymous'=> $anonymous,
            'addtime'=>time(),
            'shop_id'=>$orid['shop_id'],
            'shop_name'=>$orid['shop_name'],
            'userid'=>$orid['buyer_id'],
            'username'=>$orid['buyer_name'],
            'state'=>0,
            'remark'=>'',
            'type'=>'1',
            'explain'=>'',
            'image'=>$pic

        );
        $shopComment=array(
            'order_id'=>$orid['order_id'],
            'order_sn'=>$orid['order_sn'],
            'addtime'=>time(),
            'shop_id'=>$orid['shop_id'],
            'shop_name'=>$orid['shop_name'],
            'userid'=>$orid['buyer_id'],
            'username'=>$orid['buyer_name'],
            'lineshop'=>$lineshop,
            'lineservice'=>$lineservice,
            'onlineshop'=>$onlineshop,
            'onlineseveri'=>$onlineservice

        );
        if(!$addcom) {
            $coshop = M('CommentShop')->where(array('order_sn' => $sn))->find();
            if (!$coshop) {

                $commshop = M("CommentShop")->data($shopComment)->add();
            } else {

                $commshop = M("CommentShop")->where(array('order_sn' => $sn))->data($shopComment)->save();
            }
            $re = M('CommentProduct')->where(array('order_sn' => $sn))->find();
            $sta = $this->orderModel->where(array('order_sn' => $sn))->setField('evaluation_state', '1');
            if (!$re) {

                $comm = M('CommentProduct')->data($comment)->add();
                $this->success("提交成功", U("Order/index"));

            } else {

            return ;
            }
        }else{
              $add=M('CommentProduct')->data($commentadd)->add();
              $this->success("提交成功", U("Order/index"));
        }

    }
    //团购页面添加到购物车
   public function addCartByGroupBuy(){
        $prodids = I('productIds');
        $act_id = I('act_id');
        if(empty($prodids) || empty($act_id)){
            $this->error('错误的参数');
        }
        $data = array();
        foreach ($prodids as $key => $value) {
            $price_json = M('Product')->where(array('id'=>$prodids))->getField('price_json');
            $price_json = json_decode($price_json,true);
            $data = array(
                    'proid'=>$prodids,
                    'num'=>"1",
                    'uid'=>$this->userid,
                    'proindex'=>$price_json['0']['hidden_value'],
                    'act_id'=>$act_id
                );
            $re = $this->model->addCart($data);
        }
        $this->success('提交成功!');
   }

    public function hiddencartid(){
        $cartid=I('cartid');
        $uid=$this->userid;
        $productid=M('Cart')->where(array('id'=>$cartid))->getField('proid');
        $actionadd=array(
            'uid'=>$uid,
            'addtime'=>time(),
            'isdelete'=>0,
            'type'=>1,
            'itemid'=>$productid

          );

           $display=M('Collection')->where(array('itemid'=>$productid,'type'=>1,'uid'=>$uid))->find();
         if(!$display) {
             $addcoll = M('Collection')->data($actionadd)->add();
         }
        if($addcoll){
            $this->ajaxReturn(array('status'=>1,'info'=>"操作成功"));

        }else{
            $this->ajaxReturn(array('status'=>0,'info'=>'操作失败'));
        }
    }

    //取消收藏
     public function delecatid(){
        $cartid=I('cartid');
        $uid=$this->userid;
        $productid=M('Cart')->where(array('id'=>$cartid))->getField('proid');
        $result=M("Collection")->where(array('itemid'=>$productid,'type'=>1,'uid'=>$uid))->delete();
        if($result){
            $this->ajaxReturn(array("status"=>1,'msg'=>'操作成功'));

        }else{
           $this->ajaxReturn(array('status'=>0,'info'=>'操作失败'));
        }
     }

    //批量移入收到夹
    public function batchcollection(){
        $uid=$this->userid;
        $id=I("cartid");
        $where['id']=array("in",$id);
        $productids=M('Cart')->where($where)->getField("proid",true);
        $no=count($productids);
        $sum=array();
         foreach ($productids as $key => $value) {
            $count=M("Collection")->where(array('itemid'=>$value,'type'=>1,'uid'=>$uid))->count();
            if($count>0){
                $collinfo=M("Collection")->where(array('itemid'=>$value,'type'=>1,'uid'=>$uid))->find();
                if($collinfo['isdelete'] == 1){
                    $condition=M("Collection")->where(array('itemid'=>$value,'type'=>1,'uid'=>$uid))->setField("isdelete","0");
                     $sum[$key]=1;
                }else{
                    $sum[$key]=0;
                }


            }else{
                 $data['itemid']=$value;
                 $data['uid']=$uid;
                 $data['type']=1;
                 $data['isdelete']=0;
                 $data['addtime']=date("Y-m-d H:i:s",time());
                 $condition=M("Collection")->add($data);
                 $sum[$key]=1;

            }
        }
        $num=array_sum($sum);
        if($num==$no){
          $this->ajaxReturn(array('status'=>1,'msg'=>'操作成功'));
        }else{
             $this->ajaxReturn(array('status'=>0,'msg'=>'操作失败'));
        }

    }
    //检测产品限制
    private function checkProductlimit($productid,$num=1){
        if(empty($productid)){
            return true;
        }else{
            $limitnum =  $this->productModel->where(array('id'=>$productid))->getField('limitnum');
            if(empty($limitnum)){
                return false;
            }else if($limitnum  < 0  ){
                return true;
            }else{
                $num_buyed = $this->orderGoodsModel->join('zt_order on zt_order.order_id = zt_order_goods.order_id','left')
                                  ->where(array('zt_order.order_state'=>array('GT','10'),'zt_order_goods.goods_id'=>$productid,'zt_order_goods.buyer_id'=>$this->userid))
                                  ->Sum('goods_num');
                                  // echo $this->orderGoodsModel->getLastSql();
                if(($num_buyed + $num) >$limitnum){
                    return false;
                }else{
                    return true;
                }
            }
        }
    }
}
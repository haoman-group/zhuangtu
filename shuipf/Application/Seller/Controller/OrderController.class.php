<?php
// +----------------------------------------------------------------------
// | 买家中心--已卖出的宝贝
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Seller\Controller;

class OrderController extends SellerbaseController {
    protected $orderModel = null;
    protected $shopModel = null;
    protected $orderGoodsModel = null;
    protected $orderCommonModel = null;
    protected $memberModel = null;
    private $status = array(
        0=>array(1=>"确认订单，待付款",
            2=>"确认订单，待付款",
            3=>"确认订单，待付款",
            4=>"确认订单，待付款",
            5=>"确认订单，待付款",
            21=>"确认订单，待付款"),
        1=>array(1=>"等待设计师交稿",
            2=>"等待工人施工",
            3=>"等待卖家发货",
            4=>"等待卖家发货",
            5=>"等待卖家发货",
            21=>"等待卖家发货"),
        2=>array(1=>"已交稿、改稿中",
            2=>"施工中",
            3=>"已发货、待安装",
            4=>"已发货、待安装",
            5=>"已发货、待安装",
            21=>"已发货、待安装"),
        3=>array(1=>"终稿待确认",
            2=>"已施工，待验收",
            3=>"已安装、待确认",
            4=>"已安装、待确认",
            5=>"已安装、待确认",
            21=>"已安装、待确认"),
        4=>array(1=>"已确认，交易完成",
            2=>"已验收，交易完成",
            3=>"已确认，交易完成",
            4=>"已确认，交易完成",
            5=>"已确认，交易完成",
            21=>"已确认，交易完成"),
        5=>array(1=>"评价",
            2=>"评价",
            3=>"评价",
            4=>"评价",
            5=>"评价",
            21=>"评价"),
        );
    private $actions = array(
        0=>array(1=>"改价",2=>"改价",3=>"改价",4=>"改价",5=>"改价",21=>"改价"),
        1=>array(1=>"交稿",2=>"施工",3=>"发货",4=>"发货",5=>"发货",21=>"发货"),
        2=>array(1=>"终稿",2=>"验收",3=>"安装",4=>"安装",5=>"安装",21=>"安装"),
        3=>array(1=>"确认",2=>"确认",3=>"确认安装",4=>"确认安装",5=>"确认安装",21=>"确认安装"),
        4=>array(1=>"",2=>"",3=>"",4=>"",5=>"",21=>""),
        5=>array(1=>"",2=>"",3=>"",4=>"",5=>"",21=>""),
        );
    protected function _initialize(){
        parent::_initialize();
        $this->orderModel = D('Buyer/Order');
        $this->orderGoodsModel = D('Buyer/OrderGoods');
        $this->orderCommonModel = M('OrderCommon');
        $this->memberModel = D('Member/Member');
        $this->shopModel = D('Shop');
        $this->assign('status',$this->status);
        $this->assign('actions',$this->actions);
        $cat_pid = D('Member/ShopCategory')->getPidByShopid($this->shopid);
        $this->assign('cat_pid',$cat_pid);
    }
    public function index(){
        $pagenum = I('get.page','1','');
        $order_state = I('order_state');
        $where = array(
            'shop_id'=>$this->shopid,
        );
        if($order_state) $where['order_state'] = $order_state;
        $count = $this->orderModel->where($where)->count();
        $page = $this->page($count,15,$pagenum);
        $data = $this->orderModel->where($where)->order('addtime desc')->page($pagenum.','.$page->listRows)->select();
        foreach($data as $k=>$v){
            $data[$k]['goods'] = $this->orderModel->getOrderGoodsList(array('order_id'=>$v['order_id']));
            $data[$k]['buyer'] = $this->memberModel->where(array('userid'=>$v['buyer_id']))->find();
        }
        $this->assign('order',$data);
        $this->assign('Page',$page->show());
        $this->display();
    }
    //订单详情
    public function detail(){
    	$order_sn = I('order_sn');
    	if(empty($order_sn)){
    		$this->error('未指定订单号！');
    	}
    	//获取订单索引ID
    	// $order_id = $this->orderModel->getFieldByOrderSn($order_sn,'order_id');
    	$order = $this->orderModel->getOrderInfo(array('order_sn'=>$order_sn,'shop_id'=>$this->shopid),array('order_common','shop','member','order_goods'));
    	$this->assign('order',$order);
        $this->display();
    	//根据店铺类型，跳转到不同的详情页
        // $cat_pid = D('Member/ShopCategory')->getPidByShopid($order['shop_id']);
    	// switch($cat_pid){
    	// 	case 1:$this->display("designDetail");break;
    	// 	case 2:$this->display("workerDetail");break;
    	// 	case 3:
    	// 	case 4:
    	// 	case 5:
    	// 	default:$this->display("productDetail");break;
    	// }
    }
    //改价
    public function changePrice(){
    	$recid = I('recid');
        if(empty($recid)){
            $this->error('未指定订单号！');
        }
        $goods = $this->orderGoodsModel->where(array('rec_id'=>$recid))->find();
        $common = $this->orderCommonModel->where(array('order_id'=>$goods['order_id']))->find();
        $common['reciver_info'] = unserialize($common['reciver_info']);
        $this->assign("goods",$goods);
        // var_dump($common);
        $this->assign("common",$common);
        $this->display();
    	// return 	$this->ajaxReturn(array('status'=>1,'msg'=>'取消成功'));
    }
    //发货
    public function send(){
    	$order_sn = I('order_sn');
        if(empty($order_sn)){
            $this->error('未指定订单号！');
        }
        $this->assign("order_sn",$order_sn);
        $this->display();
    }
    //退款流程
    public function refund(){
        if(IS_POST){
            $order_id = I('post.order_id');
            $refund_amount =  I('post.refund_amount');
            $this->orderModel->where(array('order_id'=>$order_id))->setField('refund_amount',$refund_amount);
            echo json_encode(array('msg'=>'succes','status'=>'1'));
            return ;
            // echo $this->orderModel->getLastSql();
            // return $this->success('','javascript:parent.layer.clossAll()');

        }
        $order_sn = I('order_sn');
        if(empty($order_sn)){$this->error('未指定订单号!');}
        //订单信息
        $order = $this->orderModel->getOrderInfo(array('order_sn'=>$order_sn,'shop_id'=>$this->shopid),array('order_common','shop','member','order_goods'));
        //退款信息
        $refund = D('OrderRefund')->where(array('order_id'=>$order['order_id']))->find();
        $this->assign('refund',$refund);
        $this->assign('order',$order);
        $this->display();
    }

    public function search(){
        $pagenum = I('get.page','1','');
            $title=I("title");
           if(!empty($title)){
            $where['goods_name']=array("LIKE","%".$title."%");
            $where['store_id']=$this->userid;
            empty(I("buyername"))?NULL:$where['buyer_name']=array("LIKE","%".I("buyername")."%");
            empty(I("order_sn"))?NULL:$where['order_sn']=I("order_sn");
            empty(I("starttime"))?NULL:$where['addtime']=array('egt',strtotime(I("starttime")));
            empty(I("endtime"))?NULL:$where['addtime']=array('elt',strtotime(I("endtime")));
            $where['_logic']="AND";
            $condition=$where;
              $count=M("OrderGoods")->join('left join zt_order on zt_order.order_id = zt_order_goods.order_id')->where($condition)->count();
              $page = $this->page($count,15,$pagenum);
              $data=M("OrderGoods")->join('left join zt_order on zt_order.order_id = zt_order_goods.order_id')->where($condition)->page($pagenum.','.$page->listRows)->select();
              foreach ($data as $key => $value) {
                  $data[$key]['provalue']=unserialize($data[$key]['provalue']);
              }

           }else{
            $where['store_id']=$this->userid;
            empty(I("buyername"))?NULL:$where['buyer_name']=array("LIKE","%".I("buyername")."%");
            empty(I("order_sn"))?NULL:$where['order_sn']=I("order_sn");
            empty(I("starttime"))?NULL:$where['addtime']=array('egt',strtotime(I("starttime")));
            empty(I("endtime"))?NULL:$where['addtime']=array('elt',strtotime(I("endtime")));
            $where['_logic']="AND";
            $condition=$where;
              $count=M("OrderGoods")->join('left join zt_order on zt_order.order_id = zt_order_goods.order_id')->where($condition)->count();
              $page = $this->page($count,15,$pagenum);
              $data=M("OrderGoods")->join('left join zt_order on zt_order.order_id = zt_order_goods.order_id')->where($condition)->page($pagenum.','.$page->listRows)->select();
               foreach ($data as $key => $value) {
                  $data[$key]['provalue']=unserialize($data[$key]['provalue']);
              }
           }

         $this->assign('order',$data);
         $this->assign('Page',$page);
          $this->display();
         }
    //分期付款流程
    public function installment(){
        if(IS_POST){
            $data = I('post.');
            var_dump($data);
            if(empty($data['order_sn'])){
                // $this->error('未指定订单号!');
                return  $this->ajaxReturn(array('status'=>-1,'msg'=>'未指定订单号'));
            }
            // $this->orderModel->where(array('order_sn'=>$data['order_sn']))->setField('installment','1');
            return  $this->ajaxReturn(array('status'=>1,'msg'=>'分期成功!'));
        }else{
            $order_sn = I('order_sn');
            if(empty($order_sn)){$this->error('未指定订单号!');}
            //订单信息
            $order = $this->orderModel->getOrderInfo(array('order_sn'=>$order_sn,'shop_id'=>$this->shopid),array('order_common','shop','member','order_goods'));
            $this->assign('order',$order);
            $this->display();
        }
    }
}

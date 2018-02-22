<?php
// +----------------------------------------------------------------------
// | ShuipFCMS 买家会员中心
// +----------------------------------------------------------------------
// | Action Base: 首页
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@163.com>
// +----------------------------------------------------------------------

namespace Buyer\Controller;
class OrderController extends BuyerbaseController {
    //订单状态数组
    private $status = array(
        0=>array(1=>"确认订单，待付款",
            2=>"确认订单，待付款",
            3=>"确认订单，待付款",
            4=>"确认订单，待付款",
            5=>"确认订单，待付款",
            21=>"确认订单，代付款"),
        1=>array(1=>"等待设计师交稿",
            2=>"等待工人施工",
            3=>"付款成功，等待服务",
            4=>"付款成功，等待服务",
            5=>"付款成功，等待服务",
            21=>"付款成功，等待辅材直通车服务"),
        2=>array(1=>"已交稿、改稿中",
            2=>"施工中",
            3=>"服务中(测量，定制、配货)",
            4=>"服务中(测量，定制、配货)",
            5=>"服务中(测量，定制、配货)",
            21=>"配货中"),
        3=>array(1=>"终稿待确认",
            2=>"已施工，待验收",
            3=>"已发货，待确认",
            4=>"已发货，待确认",
            5=>"已发货，待确认",
            21=>"已发货，待确认"),
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
        6=>array(1=>"已取消",
            2=>"已取消",
            3=>"已取消",
            4=>"已取消",
            5=>"已取消",
            21=>"已取消"),
        );
    //订单状态操作
    private $actions = array(
        0=>array(1=>"付款",2=>"付款",3=>"付款",4=>"付款",5=>"付款",21=>"付款"),
        1=>array(1=>"交稿",2=>"施工",3=>"发货",4=>"发货",5=>"发货",21=>"发货"),
        2=>array(1=>"终稿",2=>"验收",3=>"安装",4=>"安装",5=>"安装",21=>"安装"),
        3=>array(1=>"确认",2=>"确认",3=>"确认安装",4=>"确认安装",5=>"确认安装",21=>"确认安装"),
        4=>array(1=>"",2=>"",3=>"",4=>"",5=>"",21=>""),
        5=>array(1=>"",2=>"",3=>"",4=>"",5=>"",21=>""),
        );
    //退款文案
    private $refund_state = array(
        0=>"退货退款",
        1=>"退款确认",
        2=>"已退款",
        );
    private $orderRefundModel = null;
    protected function _initialize() {
        parent::_initialize();
        $this->orderModel = D('Order');
        $this->orderRefundModel = D('Buyer/OrderRefund');
        $this->shopModel = D('Shop');
        $this->assign('status',$this->status);
        $this->assign('actions',$this->actions);
        $this->assign('refund',$this->refund_state);
    }
    //首页
    public function index(){
        $order_state = I('order_state');
        $where = array(
            'buyer_id'=>$this->userid,
        );
        $where['refund_state']=0;
        if($order_state) $where['order_state'] = $order_state;
        $where['delete_state']=0;
        $count = $this->orderModel->where($where)->count();
        $page = $this->page($count,15);
        $page_num = I('page','1');
        $data = $this->orderModel->where($where)->order('addtime desc')->page($page_num.','.'15')->select();
        foreach($data as $k=>$v){
            $data[$k]['shop'] = $this->shopModel->where(array('id'=>$v['shop_id']))->find();
            $data[$k]['shop']['cat_pid'] = D('Member/ShopCategory')->getPidByShopid($data[$k]['shop']['id']);
            $data[$k]['goods'] = $this->orderModel->getOrderGoodsList(array('order_id'=>$v['order_id']));
            $data[$k]['commenttype']=M('CommentProduct')->where(array('order_sn'=>$v['order_sn'],'type'=>1))->find();
            if($v['installment'] == '1'){
                $data[$k]['install_info']=M('OrderInstallment')->where(array('order_id'=>$v['order_id']))->select();
            }
        }

        //var_dump(count($data));exit;
        $this->assign('order',$data);
        $this->assign('Page',$page->show());
        $this->display();
    }
    public function detail(){
        $order_sn = I('order_sn');
        if(empty($order_sn)){
            $this->error('未指定订单号！');
        }
        $order = $this->orderModel->getOrderInfo(array('order_sn'=>$order_sn,'buyer_id'=>$this->userid),array('order_common','shop','member','order_goods'));
        $cat_pid = D('Member/ShopCategory')->getPidByShopid($order['shop_id']);
        $commenttype=$this->orderModel->where(array('order_sn'=>$order_sn))->getField('evaluation_state');

        $this->assign("commenttype",$commenttype);
        $this->assign('cat_pid',$cat_pid);
        // var_dump($order);
        $this->assign('order',$order);
        //根据店铺类型，跳转到不同的详情页
        // $cat_pid = D('Member/ShopCategory')->getPidByShopid($order['shop_id']);
        // switch($cat_pid){
        //  case 1:$this->display("designDetail");break;
        //  case 2:$this->display("workerDetail");break;
        //  case 3:
        //  case 4:
        //  case 5:$this->display("productDetail");break;
        //  default:break;
        // }
        $this->display();
    }
    public function order_cancel(){
        $pay_sn = I('pay_sn');
        $order_sn = I('order_sn');
        $condition = array('pay_sn'=>$pay_sn,'order_state'=>ORDER_STATE_NEW,'buyer_id'=>$this->userid,'order_sn'=>$order_sn);
        $data = array('order_state'=>ORDER_STATE_CANCEL);
        $re = $this->orderModel->editOrder($data,$condition);
        if(!$re) $this->error('取消失败');
        $this->success('取消成功');
    }
    public function order_confirm(){
        $pay_sn = I('pay_sn');
        $order_sn = I('order_sn');
        $order['finnshed_time']= time();
        $order['order_state'] = ORDER_STATE_SUCCESS;
        $this->orderModel->where(array('pay_sn'=>$pay_sn,'order_sn'=>$order_sn))->save($order);
        $this->success('确认成功');
    }
    //申请退款
    public function refund(){
        $data = I('request.');
        if(empty($data['order_sn'])){
            $this->error('错误：未指定订单号！');
        }
        $order = $this->orderModel->getOrderInfo(array('order_sn'=>$data['order_sn']),array('order_common','shop','member','order_goods','order_refund'));
        if(IS_POST){
            if($order['refund_state'] == "0"){
                //退款申请发起
                $data['addtime'] = time();
                if(!$this->orderRefundModel->create($data)){
                    $this->error('操作失败:'.$this->model->getError().'！');
                }else{
                    $this->orderRefundModel->add();
                    $this->orderModel->where(array('order_sn'=>$data['order_sn']))->setField('refund_state','1');
                    $order['refund_state'] = '1';
                    $order['extend_order_refund'] = $data;
                }
            }else if($data['type'] == "2" && $order['refund_state'] == "1" && $order['order_state'] != '-1'){//退款确认
                $this->orderModel->where(array('order_sn'=>$data['order_sn']))->data(array('refund_state'=>2,'order_state'=>'-1'))->save();
                $order['refund_state'] = '2';
                $order['order_state'] = '-1';
            }
        }else{
            // if($order['refund_state'] == "1" && $order['order_state'] != '-1'){//退款申请
            //     $this->orderModel->where(array('order_sn'=>$data['order_sn']))->data(array('refund_state'=>2,'order_state'=>'-1'))->save();
            //     $order['refund_state'] = '2';
            //     $order['order_state'] = '-1';
            // }
        }
        $cat_pid = D('Member/ShopCategory')->getPidByShopid($order['shop_id']);
        $this->assign('cat_pid',$cat_pid);
        $this->assign('order',$order);
        $this->display();
    }
   //买家中心的已买到的宝贝中的搜索
    public function ordersearch(){
        $pagenum=I('get.page','1','');
        $where['zt_order.buyer_id']=$this->userid;
        empty(I("order_sn"))?NULL:$where['order_sn']=I("order_sn");
        $where['delete_state']=0;
        empty(I("shop_name"))?NULL:$where['shop_name']=array("LIKE",'%'.I("shop_name").'%');
        empty(I("status"))?NULL: $where['order_state']=I("status");
        empty(I("starttime"))?NULL: $where['addtime']=array("egt",strtotime(I("starttime")));
        empty(I("endtime"))?NULL:  $where['addtime']=array("elt",strtotime(I("endtime")));
        empty(I("refund_state"))?NULL: $where['refund_state']=I("refund_state");
       
        $where['_logic'] = 'AND';
        $count=$this->orderModel->where($where)->count();
        $page = $this->page($count,15,$pagenum);
        $data=$this->orderModel->page($pagenum.','.$page->listRows)->where($where)->select();

        foreach ($data as $key => $value) {
           
            
            $data[$key]['shop'] = $this->shopModel->where(array('id'=>$value['shop_id']))->find();
            $data[$key]['shop']['cat_pid'] = D('Member/ShopCategory')->getPidByShopid($data[$key]['shop']['id']);


            if(I("type") == -1){
               $data[$key]['goods'] = $this->orderModel->getOrderGoodsList(array('order_id'=>$value['order_id']));
            }else{
                $order_id=M("CommentProduct")->where(array("ordser_id"=>$value['order_id'],'type'=>I("type")))->getField("order_id",true);
               
                if(empty($order_id)){
                   $data[$key]['goods'] = $this->orderModel->getOrderGoodsList(array('order_id'=>$value['order_id']));
                }else{
                    foreach ($order_id as $k => $v) {
                        $data[$key]['goods'] = $this->orderModel->getOrderGoodsList(array('order_id'=>$v));
                    }
                }
            }
            }

          
         $this->assign('order',$data);

        $this->assign('Page',$page->show());
        $this->display();
    }



    //回收站的列表
    public function recyclebin(){

        $buyer_id=$this->userid;
        $count=$this->orderModel->where(array('buyer_id'=>$buyer_id,'delete_state'=>1))->count();
        $page = $this->page($count,15);
        $page_num = I('page','1');
         $orderinfo=$this->orderModel->where(array('buyer_id'=>$buyer_id,'delete_state'=>1))->order('addtime desc')->page($page_num.','.'15')->select();

        foreach ($orderinfo as $key => $value) {
            $orderinfo[$key]['product']=M("OrderGoods")->where(array('order_id'=>$value['order_id']))->select();
            $orderinfo[$key]['goods'] = $this->orderModel->getOrderGoodsList(array('order_id'=>$value['order_id']));
           foreach ($orderinfo[$key]['product'] as $k => $v) {
               $orderinfo[$key]['product'][$k]['provalue']=unserialize($v['provalue']);
           }
            $orderinfo[$key]['shopinfo']=M("Shop")->where(array('id'=>$value['shop_id']))->find();
            $orderinfo[$key]['shopinfo']['cat_pid'] = D('Member/ShopCategory')->getPidByShopid($orderinfo[$key]['shopinfo']['id']);
        }


        //var_dump($orderinfo['2']);exit;
        $this->assign("Page",$page->show());
        $this->assign("orderinfo",$orderinfo);
        $this->display();


    }

    public function refundlist(){
        $where['buyer_id']=$this->userid;
        $where['refund_state']=array("neq",0);
        $page = $this->page($count,15);
        $page_num = I('page','1');
        $data = $this->orderModel->where($where)->order('addtime desc')->page($page_num.','.'15')->select();
         foreach($data as $k=>$v){
            $data[$k]['shop'] = $this->shopModel->where(array('id'=>$v['shop_id']))->find();
            $data[$k]['shop']['cat_pid'] = D('Member/ShopCategory')->getPidByShopid($data[$k]['shop']['id']);
            $data[$k]['goods'] = $this->orderModel->getOrderGoodsList(array('order_id'=>$v['order_id']));
            $data[$k]['commenttype']=M('CommentProduct')->where(array('order_sn'=>$v['order_sn'],'type'=>1))->find();
            if($v['installment'] == '1'){
                $data[$k]['install_info']=M('OrderInstallment')->where(array('order_id'=>$v['order_id']))->select();
            }
        }

        
        $this->assign('order',$data);
        $this->assign('Page',$page->show());

        $this->display('index');
    }

    public function refundsearch(){

        $pagenum=I('get.page','1','');
        $where['zt_order.buyer_id']=$this->userid;
        $where['zt_order.refund_state']=array("neq",0);
        empty(I("order_sn"))?NULL:$where['order_sn']=I("order_sn");
        $where['delete_state']=0;
        empty(I("shop_name"))?NULL:$where['shop_name']=array("LIKE",'%'.I("shop_name").'%');
        empty(I("status"))?NULL: $where['order_state']=I("status");
        empty(I("starttime"))?NULL: $where['addtime']=array("egt",strtotime(I("starttime")));
        empty(I("endtime"))?NULL:  $where['addtime']=array("elt",strtotime(I("endtime")));
        empty(I("refund_state"))?NULL: $where['refund_state']=I("refund_state");
       
        $where['_logic'] = 'AND';
        $count=$this->orderModel->where($where)->count();
        $page = $this->page($count,15,$pagenum);
        $data=$this->orderModel->page($pagenum.','.$page->listRows)->where($where)->select();

        foreach ($data as $key => $value) {
           
            
            $data[$key]['shop'] = $this->shopModel->where(array('id'=>$value['shop_id']))->find();
            $data[$key]['shop']['cat_pid'] = D('Member/ShopCategory')->getPidByShopid($data[$key]['shop']['id']);


            if(I("type") == -1){
               $data[$key]['goods'] = $this->orderModel->getOrderGoodsList(array('order_id'=>$value['order_id']));
            }else{
                $order_id=M("CommentProduct")->where(array("ordser_id"=>$value['order_id'],'type'=>I("type")))->getField("order_id",true);
               
                if(empty($order_id)){
                   $data[$key]['goods'] = $this->orderModel->getOrderGoodsList(array('order_id'=>$value['order_id']));
                }else{
                    foreach ($order_id as $k => $v) {
                        $data[$key]['goods'] = $this->orderModel->getOrderGoodsList(array('order_id'=>$v));
                    }
                }
            }
            }
         $this->assign('order',$data);
        $this->assign('Page',$page->show());
        $this->display("ordersearch");
    }
}

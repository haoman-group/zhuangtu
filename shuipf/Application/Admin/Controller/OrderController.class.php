<?php
namespace Admin\Controller;

use Common\Controller\AdminBase;
use League\Csv\Writer;
use PDO;
use SplTempFileObject;
use Admin\Service\User;
class OrderController extends AdminBase {

    private $shopModel = NULL;
    private $orderModel = NULL;
    private $shopCategoryModel = NULL;
    private $paymodelist = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->shopModel = D('Member/Shop');
        $this->shopCategoryModel = D('Member/ShopCategory');
        $this->orderModel = D('Buyer/Order');
        $this->paymodelist = array('ALI_WEB' => '支付宝(ALI_WEB)', 'WX_NATIVE' => '微信(WX_NATIVE)', 'WX_JSAPI' => '微信(WX_JSAPI)','LAKALA'=>'拉卡拉(LAKALA)','UN_WEB'=>'银联(UN_WEB)','ALI_APP'=>'支付宝客户端(ALI_APP)');
        $this->refundState = array('0'=>'正常','1'=>"退款申请",'2'=>"退款完成");
        $this->assign('refundState',$this->refundState);
    }

    public function index() {
        $where = self::_search();
        $count = $this->orderModel->join('left join zt_member on zt_member.userid = zt_order.buyer_id')->where($where)->order('order_id desc')->count();
        $page = $this->page($count, 20);
        $data = $this->orderModel->join('left join zt_member on zt_member.userid = zt_order.buyer_id')->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('order_id desc')->select();
        $full_state_list = array();
        foreach (\Seller\Controller\Status::$OrderStatus as $ptype => $pitem) {
            foreach ($pitem as $state_code => $state_name) {
                $full_state_list[$state_code][] = $state_name;
            }
        }
        $state_list = array();
        foreach($full_state_list as $state_code => $state_name_list) {
            $state_list[$state_code] = implode('/', array_unique($state_name_list));
        }
        $state_list[100] = "已付款订单"; // 方便客服部门导出所有入账支付宝或微信的订单
        $this->assign('Page', $page->show());
        $this->assign('paymodelist', $this->paymodelist );
        
        $this->assign('statelist', $state_list);
        //处理展示数据  added by libing  2016.6.7
        foreach ($data as $key => $value) {
            $data[$key] = $this->hehe($value);
        }
        $this->assign('data', $data);
        $this->display();
    }
    //随机用户
    public function hehe($item){
        if($item['buyer_id'] == '2105' ){
            // $rand1 = substr($item['addtime'],6);
            $rand2 = substr($item['pay_sn'],0,7);
            $userid = ((int)$rand2)%2900;
            if($userid <= 1000){
                $userid = $userid +656;
            }

            $userinfo = D('Member/Member')->where(array('userid'=>array('LT',$userid),'isbuyer'=>'1'))->order('userid desc')->find();
            // echo D('Member/Member')->getLastSql();
            if(empty($userinfo)){
                return $item;
            }else{
                $item['mobile']= $userinfo['mobile'];
                $item['buyer_name']= $userinfo['username'];
            }
        }
        return $item;
    }
    public function show(){
        $order_id = I('order_id');
        $order = $this->orderModel->getOrderInfo(array('order_id'=>$order_id),array('order_common','shop','member','order_goods','order_refund'));
        if ($order['buyer_id'] == '2105') {
            $order['extend_order_common']['reciver_info'] = M('BuyerAddr')->order("RAND()")->limit(1)->find();
        }
        $this->assign('order',$order);
        $this->display();
    }

    private function _search(){
        $where = array('delete_state'=>0);
        $search = I('get.search', null);
        if ($search) {
            $order_sn = I('get.order_sn', null);
            if($order_sn) {
                $where['zt_order.order_sn'] = $order_sn;
            }
             $pay_sn = I('get.pay_sn', null);
            if($pay_sn) {
                $where['zt_order.pay_sn'] = $pay_sn;
            }

            $shopname = I('get.shop', null);
            if($shopname) {
                $where['zt_order.shop_name'] = array("like", '%'.$shopname.'%');
            }

            $paymode = I('get.paymode', null);
            if ($paymode) {
                $where['payment_code'] = $paymode;
            }

            $username = I('get.username', null);
            if ($username) {
                $where['zt_member.username'] = array('like', '%'.$username.'%');
            }

            $mobile = I('get.mobile', null);
            if ($mobile) {
                $where['zt_member.mobile'] = $mobile;
            }

            $min_price = I('get.min_price', null);
            $max_price = I('get.max_price', null);
            if ($min_price) {
                $where['zt_order.order_amount'] = array('egt', $min_price);
            }
            if ($max_price) {
                if(array_key_exists('order_amount', $where)) {
                    $where['zt_order.order_amount'] = array($where['order_amount'], array('elt', $max_price), 'and');
                } else {
                    $where['zt_order.order_amount'] = array('elt', $max_price);
                }
            }

            $start_time = I('get.start_time', null);
            $end_time = I('get.end_time', null);
            if ($start_time || $end_time) {
                $where_start_time = $start_time ? strtotime($start_time) : 0;
                $where_end_time = $end_time ? strtotime($end_time) + 86400 - 1 : time();
                $where['zt_order.addtime'] = array('between', array($where_start_time, $where_end_time));
            }
            $pay_start_time = I('get.pay_start_time', null);
            $pay_end_time = I('get.pay_end_time', null);
            if ($pay_start_time || $pay_end_time) {
                $where_start_time = $pay_start_time ? strtotime($pay_start_time) : 0;
                $where_end_time = $pay_end_time ? strtotime($pay_end_time) + 86400 - 1 : time();
                $where['zt_order.payment_time'] = array('between', array($where_start_time, $where_end_time));
            }


            $order_state = I('get.order_state', null);
            if ($order_state) {
                if($order_state == "100") {
                    $where['zt_order.order_state'] = array('egt', ORDER_STATE_PAY);
                } else {
                    $where['zt_order.order_state'] = $order_state;
                }
            }
            //退款状态
            $refund_state = I('get.refund_state',null);
            if($refund_state !=''){
                $where['refund_state'] = $refund_state;
            }
        }
        // $where['zt_order.shop_name'] = array('notlike',"zh%测试");
        return $where;
    }
    // 数据导出
    public function export(){
        //获取查询条件
        $where = self::_search();
        //获取待执行的sql语句
        $sql = $this->orderModel->where($where)
                                // ->alias('o')
                                ->join("zt_shop zs on zt_order.shop_id = zs.id",'LEFT')
                                ->join("zt_member_data zmd on zmd.userid = zs.uid","LEFT")
                                ->join("zt_member zsm on zs.uid = zsm.userid","LEFT")
                                ->join("zt_member zm on zt_order.buyer_id = zm.userid","LEFT")
                                ->order('payment_code, zt_order.payment_time,zt_order.addtime')
                                ->field('zt_order.order_id,from_unixtime(zt_order.addtime),from_unixtime(zt_order.payment_time),zt_order.order_sn,zt_order.pay_sn,zm.username as "buyer_name",zm.mobile as "mobile",zt_order.payment_code,zt_order.shop_name,zsm.mobile as "seller_mobile",zmd.truename,zmd.bank_card_number,zt_order.order_amount,zmd.idcard,zt_order.shop_id,zmd.bank,zm.userid as "buyer_id",zt_order.termid')
                                ->buildSql();
                                 //echo $sql;
        try {
            //配置PDO模式的数据库链接
            $dbh = new PDO('mysql:dbname='.C('DB_NAME').';host='.C('DB_HOST'),C('DB_USER'),C('DB_PWD'));
            //修改字符集
            $dbh->exec("SET names utf8");
            //执行sql,获取结果集
            $sth =  $dbh->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();
        } catch (PDOException $e) {
            throw new PDOException("Error  : " .$e->getMessage());
        }
        //创建CSV对象
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        //设置字符集
        $csv->setEncodingFrom('GBK');
        //插入标题
        $csv->insertOne(['订单索引','订单生成时间','付款时间','订单号', '商户订单号','买家姓名','买家电话','支付方式','店铺名称','商户电话','收款户名','收款账号','收款金额','商家身份证卡号','店铺装途ID','商户发卡银行','买家装途ID','LAKALA终端号']);
        //插入查询结果数据
        while($row = $sth->fetch(PDO::FETCH_ASSOC)){
            $row['addtime'] = strtotime($row['from_unixtime(zt_order.addtime)']);
            $item = $this->hehe($row);
            unset($item['addtime']);
            $csv->insertOne($item);
        }
        // $csv->insertAll($sth);
        //客户端下载文件
        $csv->output(date("Y-m-d").'交易记录.csv');
        exit;
    }
    public function repair(){
        $userInfo=User::getInstance()->getInfo();
        //var_dump($userInfo);exit;
       
        
        $log=new \Think\Log;
    	$this->assign('paymodelist', $this->paymodelist );
        if(IS_POST){
        	$data = I('post.');
        	if(empty($data['payment_code'])){
        		$this->error('选择支付方式！');

        	}
            $post = array(
                'payment_code'=>$data['payment_code'],
            );
            
            
            $order_list = $this->orderModel->where(array('pay_sn'=>$data['pay_sn']))->select();
            //$message.="支付单号:".$order_list['0']['pay_sn']."支付状态:".$order_list[0]['order_state']."</br>";
            
            if(empty($order_list)){
            	$this->error('支付序号不存在!');
            }
            //是否强制更新
            if(!empty($data['ifforce']) && $data['ifforce'] =="1"){
                //当订单状态已取消时,强制更新为待付款
                foreach($order_list as $key=>$value){
                    if($value['order_state'] =="-1"){
                        $this->orderModel->where(array('order_id'=>$value['order_id']))->setField('order_state','10');
                    }
                }
            }else{
                foreach($order_list as $key=>$value){
                    if($value['order_state'] =="-1"){
                        $this->error('订单号:'.$value['order_sn'].'已取消');
                    }
                }
            }
            $this->orderModel->changeOrderReceivePay($order_list,'buyer','',$post);
            //如果支付时间不为空则更新
            if(!empty($data['payment_time'])){
                    $this->orderModel->where(array('pay_sn'=>$data['pay_sn']))->setField('payment_time',strtotime($data['payment_time']));
                    $sql=$this->orderModel->getLastSql();
            }
            $message="用户ID:".$userInfo['id']."用户名:".$userInfo['username'];
                $message.="SQL:".$sql;
                $message.="支付方式:".$data['payment_code'];
                $destination="repair";
                $level='INFO';
                $type="file";
                $log->write($message,$level,$type,$destination);
            $this->success('修改订单状态成功！');
                
            	$this->display('repair');
                
    	}else{
        		$this->display('repair');
    	}
         }
}

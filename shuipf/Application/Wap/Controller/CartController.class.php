<?php
namespace Wap\Controller;

class CartController extends WapbaseController {
    protected $model =null;
    protected function _initialize() {
        parent::_initialize();
         $this->model = D("Buyer/Cart");
        $this->addrModel = D("Buyer/BuyerAddr");
    }
    public function index(){
        $where = array();
        $where['zt_cart.uid'] = $this->userid;

        $data = $this->getCartLists($where);
        foreach ($data['cartlist'] as $key => $value) {
            $data['cartlist'][$key]['shopinfo']=M("Shop")->where(array('id'=>$value['shopid']))->find();
        }
        $countall=M('Cart')->where(array('uid'=>$this->userid))->count();
        $this->assign("countall",$countall);
        $this->assign('data',$data['cartlist']);
        $this->display();
    }
    public function orderconfirm(){
        $cartid = I('cartid');
        $cartlist = $this->model->getCartList(array('id'=>array('in',$cartid)));
        $addrlist = $this->addrModel->getDefaultAddr($this->userid);
        $this->assign('cartlist',$cartlist['cartlist']);
        $this->assign('total',$cartlist['total']);
        $this->assign("addrlist",$addrlist);
        $this->assign('cartid',implode(',',$cartid));
        $this->display();
    }

    //提交订单
    public function orderpay(){
            $cartid = I('cartid');
            $addrid = I('addrid');
            $data = array(
                'cartid'=>$cartid,
                'addrid'=>$addrid
            );
            $order_info = $this->orderModel->addOrder($data,$this->userid);
           if(empty($order_info)){
               $this->error("请添加地址");

           }
    }
    public function _empty(){
        $this->display();
    }
    public function getCartLists($condition = array()){
        $uid = $condition['uid'];
        $data=$this->model->join("zt_shop ON zt_cart.shopid=zt_shop.id ")->distinct(true)->field("shopid")->where($condition)->order('zt_cart.id desc')->select();
        $total = 0;
        foreach($data as $k=>$v){
            $total_fee = 0;
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
            }
            $data[$k]['total_fee'] = $total_fee;
        }
        return array('cartlist'=>$data,'total'=>$total);
    }
    //二维码下单临时页面
    public function orderconfirmQR(){
        $this->display();
    }
    //二维码链接
    public function QRAddLink(){
        $proid =I('proid');
        if(empty($proid)){
            return $this->success('error proid');
        }
        //商品类型
        $proindex =I('proindex');
        if(empty($proindex)){
            return $this->success('error proindex');
        }
        //商品个数,默认为1
        $num =I('num','1');
        //0- web端访问,则返回H5页面.1-APP扫描访问,则返回订单数据
        $type = I('type','0');
        //如果未登陆则用GET参数
        if(empty($this->userid)){
            $this->userid = I('userid','');
        }
        $data =array(
            'proid'=>$proid,
                  'num'=>$num,
                  'uid'=>$this->userid,
                  'proindex'=>$proindex
                  );
        if($type =='1'){//手机端访问
            $re = $this->model->addCart($data);
            if(!$re) {//失败返回
                $this->model->rollback();
                echo json_encode(array("status"=>'-1','msg'=>'加入购物车错误'.$this->model->getError()));
                die();
            }else{
                $this->model->commit();
                 //获取订单确认接口的数据
                redirect(U("/App/Cart/lists",array('catid'=>$re,'getAddr'=>'1','uid'=>$this->userid)));
            }
        }else{//h5生成临时页面
            if(!empty($this->userid)){//已登陆的情况
                $re = $this->model->addCart($data);
                if(!$re) {//失败返回
                    return $this->error('加入购物车错误');
                }else{
                    $this->redirect("/Wap/Cart/orderconfirm",array("cartid"=>$re,"","from"=>"qrcode"));
                }
            }else{//未登录的状态
                $product = M('Product')->where(array('id'=>$proid))->find();
                $product['price_array'] = object2array(json_decode($product['price_json']));
                foreach($product['price_array'] as $k2=>$v2){
                    if($proindex==$v2['hidden_value']){
                        $product['provalue'] = $v2;
                        $product['provalue']['totel'] = $num*$product['provalue']['price_act'];
                    }
                }
                $shop = M('Shop')->where(array('id'=>$product['shopid']))->find();
                $this->assign('product',$product);
                $this->assign('shop',$shop);
                $this->display("orderconfirmQR");
            }
        }


        //     if($type == '1'){//手机端访问

        //     }else{//wap返回页面
        //         return $this->error('加入购物车错误');
        //     }
        // }

        // if($type == '1'){//手机端访问

        // }else{//wap返回页面
        //     $this->redirect("/Wap/Cart/orderconfirm",array("cartid"=>$re));
        // }
    }
}




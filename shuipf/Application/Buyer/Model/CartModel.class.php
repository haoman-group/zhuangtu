<?php

// +----------------------------------------------------------------------
// | 购物车管理
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@163.com>
// +----------------------------------------------------------------------

namespace Buyer\Model;

use Common\Model\Model;

class CartModel extends Model {
    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
        array('uid', 'require', '用户ID不能为空！'),
        array('proid', 'require', '产品ID不能为空！'),
    );
    //array(填充字段,填充内容,[填充条件,附加规则])
    protected $_auto = array(
        array('add_time', 'time', self::MODEL_INSERT, 'function'),
    );
    //新增内容购物车
    public function addCart($data, $directSet=false){

        $product = M('Product')->where(array('id'=>$data['proid']))->find();
        if(!$product) return false;
        $where = array('proid'=>$data['proid'],'uid'=>$data['uid'],'proindex'=>$data['proindex']);
        $cartid = $this->where($where)->find();
        if($cartid){
            if ($directSet) {
                $this->where($where)->setField('num', $data['num']);
            } else {
                $this->where($where)->setInc('num',$data['num']);
            }
            return $cartid['id'];
        }else{
            $shop = M('Shop')->where(array('uid'=>$product['uid']))->find();
            $cart = $where;
            $cart['num'] = $data['num'];
            $cart['addtime'] = time();
            $cart['shopid'] = $shop['id'];
            return $this->data($cart)->add();
        }
    }

    //删除指定内容
    public function deleteOne($id,$uid){
        if(empty($uid) || empty($id)){return false;}
        return $this->where(array("uid"=>$uid,"id"=>$id))->delete();
    }
    public function deleteCart($ids){
        return $this->where(array('id'=>array('in',$ids)))->delete();
    }
    //清空购物车
    public function clear($uid){
        if(empty($uid)){return;}
        return $this->where(array("uid"=>$uid))->delete();
    }
    //判断当前用户购物车内是否已经含有该商品
    //返回当前购买个数
    public function ishave($data){
        $count = $this->where(array("uid"=>$data['uid'],"product_id"=>$data['product_id']))->getField('count');
        if($count > 0){
            return $count;
        }
        return false;
    }
    public function getCartList($condition = array()){
         $uid = $condition['uid'];
         $data = $this->distinct(true)->field('shopid')->where($condition)->select();
       $total = 0;
        foreach($data as $k=>$v){
            $total_fee = 0;
            $data[$k]['shop'] = M('Shop')->where(array('id'=>$v['shopid']))->find();
            $condition['shopid'] = $v['shopid'];
            $data[$k]['cart'] = $this->where($condition)->order('id desc')->select();
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
    //获取App端需要的购物车列表
    public function getCartListOfApp($uid,$catid_string){
        if(empty($uid)){return false;}
        $where = array();
        $result = array();
        $where['uid'] = $uid;
        if(!empty($catid_string)){
            $where['id'] = array('IN',$catid_string);
        }
        //获取购物车的店铺数据
        $shops = $this->distinct(true)->field('shopid')->where($where)->select();
        foreach ($shops as $key => $value) {
            //店铺ID
            $result[$key]['shopid'] = $value['shopid'];
            //获取店铺信息
            $shopinfo = M('Shop')->where(array('id'=>$value['shopid']))->find();
            //店铺名称
            $result[$key]['shopname'] = $shopinfo['name'];
            //店铺地址信息
            $result[$key]['address'] = D('Seller/SellerAddr')->getAddrList($shopinfo['uid']);
            //产品
            $where['shopid'] = $value['shopid'];
            $products =  $this->where($where)->select();
            foreach ($products as $key1 => $value2) {
                # code...
                //获取产品的相关信息
                $proinfo = D('Seller/Product')->where(array('id'=>$value2['proid']))->find();
                //购物车ID
                $product['catid'] = $value2['id'];
                $product['id'] = $proinfo['id'];
                $product['title'] = $proinfo['title'];
                $product['headpic'] = thumb($proinfo['headpic'],'144','144','0');
                $product['num'] = $value2['num'];
                //获取产品价格
                $price_array = object2array(json_decode($proinfo['price_json']));
                foreach($price_array as $k3=>$v3){
                    if($value2['proindex']==$v3['hidden_value']){
                        $product['price'] = $v3;
                    }
                }
                $result[$key]['products'][$key1] = $product;
            }
            # code...
        }
        return $result;
    }
    public function getCountByUid($userid){
        return $this->where(array('uid'=>$userid))->count();
    }
}
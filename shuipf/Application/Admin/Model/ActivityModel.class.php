<?php

// +----------------------------------------------------------------------
// | shop_category表映射类
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\Model;

class ActivityModel extends Model {
	//活动最大产品数
	protected $max_count = 5;
	protected $_auto = array(
		array('addtime','time',   self::MODEL_INSERT,'function'),
        array('updatetime','time',self::MODEL_UPDATE,'function')
        );
	 //计算价格
	public function chargeCalcByType($prodids,$act_id){
	 	if(empty($prodids)){
	 		$this->error = "错误：活动产品参数为空!";
	 		return false;
	 	}
	 	if(empty($act_id)){
	 		$this->error = "错误：活动ID参数为空!";
	 		return false;
	 	}
	 	//产品总数
	 	if(is_array($prodids)){
	 		$prodids = array_filter($prodids);
	 		$count = sizeof($prodids);	
	 	}else{
	 		$count = sizeof(explode(",",$prodids));	
	 	}
	 	//获取产品列表
	 	$products = D('Admin/ActivityData')->where(array('id'=>array('IN',$prodids)))->select();
	 	//判断活动产品是否属于同一类活动
	 	// if(!($act_id = $this->getActType($products))){
	 	// 	$this->error = "错误：所有产品非共属于一类活动!";
	 	// 	return false;
	 	// }
	 	//当前活动信息
	 	$activity = D('Admin/Activity')->where(array('id'=>$act_id))->find();
	 	//价格数组
	 	$data = array();
	 	//活动价总价
	 	$current_price_totle = 0.00;
	 	//原价总价
	 	$original_price_totle = 0.00;
	 	//获取活动信息
	 	if($activity['type'] == '1'){
	 		foreach ($products as $key => $value) {
	 			// 现价
	 			$data[$value['id']]['current_price'] = $this->calcCurrentPrice($count,$value);
	 			$current_price_totle = $current_price_totle + $data[$value['id']]['current_price'];
	 			// 原价
	 			$data[$value['id']]['original_price'] = (float)($value['max_price']);
	 			$original_price_totle = $original_price_totle + $data[$value['id']]['original_price'];
	 		}
	 	}if($activity['type'] == '2'){

	 	}
	 	$data['current_price_totle'] = $current_price_totle;
	 	$data['original_price_totle'] = $original_price_totle;
	 	return $data;
	}
	//计算订单价格
	public function getList($prodids,$act_id){
		$chargeCalc = self::chargeCalcByType($prodids,$act_id);
		$condition = array();
		$condition['za.id']= array('IN',$prodids);
		$condition['za.act_id'] = $act_id;
		$data = D('Admin/ActivityData')->alias("za")->where($condition)->join('zt_product zp on zp.id = za.dataid','LEFT')->group('zp.shopid')->order('za.id desc')->select();
		$total = 0.00;
		foreach ($data as $k => $v) {
			$total_fee = 0;
            $data[$k]['shop'] = D('Member/Shop')->where(array('id'=>$v['shopid']))->find();
            $condition['zp.shopid'] = $v['shopid'];
            $data[$k]['cart'] = D('Admin/ActivityData')->alias("za")->where($condition)->join('zt_product zp on zp.id = za.dataid','LEFT')->select();
            foreach($data[$k]['cart'] as $k1=>$v1){
            		$product = M('Product')->where(array('id'=>$data[$k]['cart'][$k1]['dataid']))->find();
            		//活动信息
            		$data[$k]['cart'][$k1]['activity'] = $this->where(array('id'=>$act_id))->find();
               		$price_json = json_decode($product['price_json'],true);
               		//商品个数  团购恒为1
                    $data[$k]['cart'][$k1]['num'] = 1;
                    //
                    $aid = D('Admin/ActivityData')->where(array('dataid'=>$v1['id'],'act_id'=>$act_id))->getField('id');
                    //现价
                    $data[$k]['cart'][$k1]['total'] = $chargeCalc[$aid]['current_price'];
                    //原件
                    $price_json['0']['price_act'] = $chargeCalc[$aid]['original_price'];
               		$product['provalue'] = $price_json['0'];
               		//总价
                    $total_fee += $data[$k]['cart'][$k1]['total'];
                    $total += $data[$k]['cart'][$k1]['total'];
                	$data[$k]['cart'][$k1]['product'] = $product;
            }
            $data[$k]['total_fee'] = $total_fee;
        }
        return array('cartlist'=>$data,'total'=>$total);
	}
	//获取活动ID
	public function getActType($products){
		$type = null;
		foreach ($products as $key => $value) {
			# code...
			if($type == null){
				$type = $value['act_id'];
			}else if($type != $value['act_id']){
				return false;
			}else{
				continue;
			}
		}
		return $type;

	}
	//计算活动价
	public function calcCurrentPrice($count,$product){
		if($count >$this->max_count){$count=5;}
		$art = (float)($product['max_price']) - (float)($product['min_price']);
		return (float)($product['max_price']) - ((int)$count - 1)*($art/4);
	}
	//获取团购页显示数据
	public function getProducts(){
		$activity = $this->where(array('status'=>'1'))->limit(1)->find();
		$where =array();
		$where['act_id'] = $activity['id'];
		$where['status'] = "1";
		$result = D('Admin/ActivityData')->where($where)->order('place asc')->select();
		foreach ($result as $key => $value) {
            $result[$key]['data'] = unserialize($value['data']);
            $result[$key]['picture'] =explode(",",$value['picture']);
            # code...
        }
        return array('result'=>$result,'Activity'=>$activity);
	}
}
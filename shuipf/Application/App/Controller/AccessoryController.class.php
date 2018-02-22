<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 买家地址信息操作 app接口
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace App\Controller;

class AccessoryController extends ApibaseController {
	protected $model = NULL;
	protected $type_model = NULL;
	protected $brand_model = NULL;
	protected $norm_model = NULL;
	protected function _initialize(){
		parent::_initialize();
		$this->model = M('accessory');
		$this->type_model = M('accessory_type');
		$this->brand_model = M('accessory_brand');
		$this->norm_model = M('accessory_norm');
	}
	//获取当前用户地址列表
	public function typeList(){
		$result = $this->type_model->where(array('isdelete' => 0))->getField('id,name,category');
		if (empty($result)) {
			$this->ajaxReturn(array('status'=>0, 'msg'=>'获取类型数据失败！'));
		}
		$origin_data = array();
		foreach ($result as $rvalue) {
			if(!array_key_exists($rvalue['category'], $origin_data)) {
				$origin_data[$rvalue['category']] = array();
			}
			array_push($origin_data[$rvalue['category']], array('id' => $rvalue['id'], 'name' => $rvalue['name']));
		}
		$data = array();
		foreach ($origin_data as $category=>$type_item) {
			array_push($data, array('category' => $category, 'type_list' => $type_item));
		}

		$this->ajaxReturn(array('status'=>1,'msg'=>'获取辅材类型成功！','data'=>$data));
	}
	//新增地址
	public function accessoryList(){
		$type_id = I('get.typeid');
		if (empty($type_id)) {
			$this->ajaxReturn(array('status' => 0, 'msg' => '获取辅材列表失败，未给出类型ID'));
		}

		$result = $this->model->where(array('isdelete' => 0, 'accessory_type' => $type_id))->getField('id,name,brand_id,norm_id,unit_name,unit_price,picture');
		if (empty($result)) {
			$this->ajaxReturn(array('status' => 0, 'msg' => '获取辅材列表失败，没有此类型的辅材'));
		}
		$origin_data = array();
		foreach($result as $rvalue){
			if(!array_key_exists($rvalue['name'], $origin_data)) {
				$origin_data[$rvalue['name']] = array();
			}
			$norm = $this->norm_model->where(array('isdelete' => 0, 'id' => $rvalue['norm_id']))->find();
			$brand = $this->brand_model->where(array('isdelete' => 0, 'id' => $rvalue['brand_id']))->find();
			if (!array_key_exists($norm, $origin_data[$rvalue['name']])) {
				$origin_data[$rvalue['name']][$norm] = array();
			}

			$rvalue['unit_price'] = floatval($rvalue['unit_price']);
			if (!array_key_exists('min_price', $origin_data[$rvalue['name']][$norm['name']])
				|| $origin_data[$rvalue['name']][$norm['name']]['min_price'] > $rvalue['unit_price']) {
				$origin_data[$rvalue['name']][$norm['name']]['min_price'] = $rvalue['unit_price'];
			}
			if (!array_key_exists('max_price', $origin_data[$rvalue['name']][$norm['name']])
				|| $origin_data[$rvalue['name']][$norm['name']]['max_price'] < $rvalue['unit_price']) {
				$origin_data[$rvalue['name']][$norm['name']]['max_price'] = $rvalue['unit_price'];
			}
			$origin_data[$rvalue['name']][$norm['name']]['unit_name'] = $rvalue['unit_name'];
			$origin_data[$rvalue['name']][$norm['name']]['picture'] = $rvalue['picture'];

			if (!array_key_exists('brands', $origin_data[$rvalue['name']][$norm['name']])) {
				$origin_data[$rvalue['name']][$norm['name']]['brands'] = array();
			}
			array_push($origin_data[$rvalue['name']][$norm['name']]['brands'],
				array('brand_name' => $brand['name'], 'id' => $rvalue['id'], 'price' => $rvalue['unit_price']));

		}

		$data = array();
		foreach($origin_data as $a_name => $a_item) {
			foreach($a_item as $norm => $n_item) {
				array_push($data, array_merge($n_item, array('name' => $a_name, 'norm' => $norm)));
			}
		}
		$this->ajaxReturn(array('status'=>1,'msg'=>'获取辅材列表成功！','data'=>$data));
	}
}
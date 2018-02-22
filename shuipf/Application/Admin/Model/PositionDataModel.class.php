<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 推荐位
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\Model;

class PositionDataModel extends Model {
	protected $_auto = array(
		array('description','ltrim',self::MODEL_BOTH,'function',));
	//获取推荐位数据
	public function getData($pageid,$posid){
		if(empty($posid)){return false;}
		$where = array();
		$where['posid'] = $posid;
		$where['pageid'] = $pageid;
		$where['status'] = 1; //启用
		$where['starttime'] = array("ELT",date("Y-m-d H:i:s")); //启用时间小于当前时间
		$where['endtime'] = array("EGT",date("Y-m-d H:i:s"));   //结束时间小于当前时间
		$result = $this->where($where)->select();
		foreach ($result as $key => $value) {
			$result[$key]['data'] = unserialize($value['data']);
		}
		return $result;
	}
	//获取页面所有的推荐位
	public function getDataByPageID($pageid){
		if(empty($pageid)){return false;}
		$where = array();
		$posinfo = M('Position')->where(array('pageid'=>$pageid))->select();
		if (empty($posinfo)) {
			return false;
		}
		$data =array();
		foreach ($posinfo as $key => $value) {
			# code...
			for ($i=1; $i <=	(int)($value['maxnum']) ; $i++) { 
				# code...
				$where['posid']= $value['posid'];
				$where['place'] = $i;
				$where['status'] = 1; //启用
				$where['isdelete']=0;//未删除
				$where['starttime'] = array("ELT",date("Y-m-d H:i:s")); //启用时间小于当前时间
				$where['endtime'] = array("EGT",date("Y-m-d H:i:s"));   //结束时间小于当前时间
				$result = $this->where($where)->order('starttime desc')->limit(1)->find();
				// var_dump($this->getLastSql());
				if(empty($result)){
					unset($where['starttime']);
					unset($where['endtime']);
					$result = $this->where($where)->order('starttime desc')->limit(1)->find();
					// var_dump($this->getLastSql());
				}
				$data[$value['posid']][$i] = $result;
				$data[$value['posid']][$i]['picture'] = explode(",",$result['picture']);
				$data[$value['posid']][$i]['data'] = unserialize($result['data']);
				$shopinfo = D("Member/Shop")->getInfoByProductID($result['dataid']);
				$data[$value['posid']][$i]['shopname'] = $shopinfo['name'];
			}
		}
		return $data;
	}

	//获取判断当前内容 是否为推荐位展示的内容
	public function checkDataId($dataId){
		if(empty($dataId)){return false;}
		$where = array();
		$where['dataid'] = $dataId;
		$where['status'] = 1; //启用
		// $where['starttime'] = array("ELT",date("Y-m-d H:i:s")); //启用时间小于当前时间
		// $where['endtime'] = array("EGT",date("Y-m-d H:i:s"));   //结束时间小于当前时间
		$result = $this->where($where)->find();
		return empty($result)?false:true;
	}
	//获取当前推荐位产品 是否可用
	public function checkProduct($dataId){
		if(empty($dataId)){return false;}
		$where = array();
		$where['id'] = $dataId;
		$where['isdelete'] = '0';
		$where['status'] = \Seller\Controller\Status::STATUS_SELLING;
		$result = D("Member/Product")->where($where)->find();
		// echo D("Member/Product")->getLastSql();
		return empty($result)?false:true;	
	}
}
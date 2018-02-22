<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 移动端模块
// +----------------------------------------------------------------------
// | Action 购物车接口
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@163.com>
// +----------------------------------------------------------------------

namespace App\Controller;

class CartController extends ApibaseController {
	private $model = null;
	private $addrmodel = null;
	protected function _initialize(){
		parent::_initialize();
		$this->model = D("Buyer/Cart");
		$this->addrmodel = D("Buyer/BuyerAddr");
	}
	//获取当前用户地址列表
	public function lists(){
		$uid = I('request.uid');
		if(empty($uid)){$this->ajaxReturn(array('status'=>0,'msg'=>'错误：未指定用户！'));}
		$catid_string = I('catid','');
		$lists = $this->model->getCartListOfApp($uid,$catid_string);
		$getAddr = I('getAddr','0');
		$addr = null;
		if($getAddr == '1'){
			$addr = $this->addrmodel->getDefaultAddr($uid);
			// echo $this->addrmodel->getLastSql();
			if(empty($addr)){
				$addr = $this->addrmodel->where(array('uid'=>$uid))->order("updatetime desc")->limit(1)->find();
			}
		}
		$this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=>$lists,'address'=>$addr));
	}
	//修改购物车产品的数量
	public function updateNum(){
		$id = I('request.id');
		$uid = I('request.uid');
		$num = I('request.num');
		if(empty($id)  || empty($uid)){$this->ajaxReturn(array('status'=>0,'msg'=>'错误：未指定产品ID或者用户ID!'));}
		if(empty($num) || !is_numeric($num)){$this->ajaxReturn(array('status'=>0,'msg'=>'错误：数量为空或者格式错误!'));}
		$proid = $this->model->where(array('id'=>$id,'uid'=>$uid))->getField('proid');
		$res = $this->checkProductlimit($proid,$num);
		if(!$res){
			$this->ajaxReturn(array('status'=>-1,'msg'=>'失败:超过购买限制!'));
		}
		$this->model->where(array('id'=>$id,'uid'=>$uid))->setField('num',$num);
		$this->ajaxReturn(array('status'=>1,'msg'=>'更新数量成功！'));
	}
	//删除产品内容
	public function deleteProduct(){
		$id = I('request.id');
		$uid = I('request.uid');
		//检测是否为空
		if(empty($id) || empty($uid)){$this->ajaxReturn(array('status'=>0,'msg'=>'错误：未指定产品ID或者用户ID!'));}
		//检测是否为数组
		if(stristr($id,",")){
			$this->model->where(array('id'=>array("IN",$id),'uid'=>$uid))->delete();
			$this->ajaxReturn(array('status'=>1,'msg'=>'批量删除产品成功!'));
		}else{
			$this->model->where(array('id'=>$id,'uid'=>$uid))->delete();
			$this->ajaxReturn(array('status'=>1,'msg'=>'删除产品成功!'));
		}
	}
	//删除店铺内容
	public function deleteShop(){
		$shopid = I('request.shopid');
		$uid = I('request.uid');
		//检测是否为空
		if(empty($shopid) || empty($uid)){$this->ajaxReturn(array('status'=>0,'msg'=>'错误：未指定店铺ID或者用户ID!'));}
		//检测是否为数组
		if(stristr($shopid,",")){
			$this->model->where(array('shopid'=>array("IN",$shopid),'uid'=>$uid))->delete();
			$this->ajaxReturn(array('status'=>1,'msg'=>'批量删除店铺产品成功!'));
		}else{
			$this->model->where(array('shopid'=>$shopid,'uid'=>$uid))->delete();
			$this->ajaxReturn(array('status'=>1,'msg'=>'删除店铺产品成功!'));
		}
	}
	//添加到购物车
	public function add(){
		$proid =I('proid');
		if(empty($proid)){
			return $this->ajaxReturn(array('status'=>-1,'msg'=>'添加失败：产品ID不能为空！'));
		}
		$proindex =I('proindex');
		if(empty($proindex)){
			return $this->ajaxReturn(array('status'=>-2,'msg'=>'添加失败：产品分类不能为空！'));
		}
		$num =I('num','1');
		$data =array(
			'proid'=>$proid,
                  'num'=>$num,
                  'uid'=>$this->userid,
                  'proindex'=>$proindex
                  );
		$re = $this->model->addCart($data);
		if(!$re) {
			$this->model->rollback();
			return $this->ajaxReturn(array('status'=>-3,'msg'=>'添加到数据库失败！'));
            }
            $this->model->commit();
            return $this->ajaxReturn(array('status'=>1,'msg'=>'添加到购物车成功!'));
	}
	//检测产品限制
    private function checkProductlimit($productid,$num=1){
        if(empty($productid)){
            return true;
        }else{
            $limitnum =  M('Product')->where(array('id'=>$productid))->getField('limitnum');
            if(empty($limitnum)){
                return false;
            }else if($limitnum  < 0  ){
                return true;
            }else{
                $num_buyed = M("OrderGoods")->join('zt_order on zt_order.order_id = zt_order_goods.order_id','left')
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
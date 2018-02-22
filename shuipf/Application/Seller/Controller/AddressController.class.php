<?php
// +----------------------------------------------------------------------
// | 宝贝管理--设计类
// +----------------------------------------------------------------------
// | Author: qinke <270710922@qq.com>
// +----------------------------------------------------------------------
namespace Buyer\Controller;
namespace Seller\Controller;

class AddressController extends SellerbaseController {
	 private $model ;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D("Seller/SellerAddr");
        
    }

	public function address(){
      $result = $this->model->getAddr($this->userid);
      $this->assign("info",$result);
      $this->display();

	}
   
   public function addAddr(){
      
        if(IS_POST){
            $data = I('post.');
            $data['uid'] = $this->userid;
          
            $this->model->add($data);
            $this->success("添加成功!",U("Seller/Address/address"));
        }else{
            $id = I("id");
            $result ='';
            if(!empty($id)){
                $result= $this->model->where(array('id'=>$id))->find();
            }else{
                $result['area'] = "23,300,";
            }
            $this->assign('addr',$result);
            $this->display();
        }

	}
	 public function editAddr(){
        if(IS_POST){
            $data = I('post.');
            $this->model->save($data);
            $this->success("更新成功!",U("Seller/Address/address"));
        }else{
            $id = I("id");
            $result = $this->model->where(array('id'=>$id))->find();
            $this->assign('addr',$result);
            $this->display('addAddr');
        }
    }
     public function deleteAddr(){
        $id = I('get.id');
        if($this->model->delete($id)){
            $this->success("删除成功",U("Seller/Address/address"));
        }else{
            $this->error("删除失败",U("Seller/Address/address"));
        }
    }   
    //设置默认收货地址
    public function setDefault(){
        $id = I('get.id');
        if($this->model->setDefault($id,$this->userid)){
            $this->success("设置默认地址成功",U("Buyer/User/shipAddr"));
        }else{
            $this->error("设置默认地址成功",U("Buyer/User/shipAddr"));
        }
    }
    
 
   

	
}
<?php
namespace Seller\Controller;


class TeamworkerController extends SellerbaseController {

    protected $model = NULL;
    protected function _initialize(){
        parent::_initialize();
        $this->model = D('Seller/Product');   
    }
//合作工长添加已有工长
    public function twAddEx(){
        if(IS_POST){
            $prodId = I('post.prodid',null);
            $worker = $this->model->where(array("id"=>$prodId,'isdelete'=>'0'))->find();
            //
            unset($worker['id']);
            $worker['uid'] = $this->userid;
            $worker['shopid'] = $this->shopid;
            if(!$this->model->create($worker)){
                echo $this->model->getError();
            }else{
                $this->model->add();
                $this->redirect('twLists');
            }
        }else{
            $prodId = I('get.prodid',null);
            if($prodId != null){
                $worker = $this->model->where(array("id"=>$prodId,'isdelete'=>'0'))->find();
                if(!$worker){
                    $this->error('工长信息错误或不存在!');
                }
                if($worker['cid'] !='103'){
                    $this->error('只能添加装修队');
                }
                // var_dump($worker);
                $this->assign('worker',$worker);
            }
        }
        $this->display();
    }
    //合作工长列表
    public function twLists(){
        $where = array();
        $where['status'] = Status::STATUS_SELLING;
        $where['isdelete'] = "0";
        $where['cid'] ="103";
        $this->_prepData($where);
        $this->display();
    }
    public function _special($data){
        return $data;
    }
}
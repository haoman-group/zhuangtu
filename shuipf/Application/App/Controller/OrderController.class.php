<?php
namespace App\Controller;

class OrderController extends ApibaseController{
    private $model = null;
    protected function _initialize(){
        parent::_initialize();

        $this->model = D("Order");
    }
    public  function orderaction(){
        $orderinfo=$this->model->where()->select();
    }

    public  function addorder(){
      $order=array();
      $addaction=$this->model->data($order)->add();
}
    public function updataorder(){
        $order=array();
        $updataaction=$this->model->data($order)->save();
    }
    public function deleorder(){
        $order=array();
        $deleaction=$this->model->data()->delete();
    }

}

?>
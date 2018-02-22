<?php
// +----------------------------------------------------------------------
// | 宝贝管理
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Seller\Controller;

    
class ProductController extends  SellerbaseController{
      
    protected $controller = NULL;
    protected function _initialize() {
        parent::_initialize();
        //根据PID获取不同的Controller
        $this->controller = $this->switchController();
        //跳转到对应的Controller
        $this->redirect('/Seller/'.$this->controller.'/'.ACTION_NAME,I('request.'));
    }
    //选择控制器
    public function switchController(){
      $type = NULL;
      switch ($this->cateType){
        case 1: $type = "Design";break; //设计产品
        case 2: $type = "Worker";break; //工人产品
        case 3: $type = "Material";break;  //建材产品
        case 4: $type = "Material";break;  //家具产品
        case 5: $type = "Material";break;  //家电产品
        case 21: $type = "Accessory"; break; //辅材产品
        case 23: $type = "Yanshou"; break; //验收
        default: $this->error('错误的店铺类型!');break;
      }
      // $type = 'Worker';
      return $type;
    }
    
}
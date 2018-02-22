<?php

namespace Wap\Controller;

class IndexController extends WapbaseController {

    protected function _initialize() {
        $this->model = D('Admin/PositionData');
        parent::_initialize();
    }

    public function keyprods(){
    	$posdata = $this->model->getDataByPageID("15");

        $productweixin=$posdata['236'];
        
        $this->assign("posdata",$posdata);
        $this->assign("productweixin", $productweixin);
        $this->display();
    }


    public function _empty(){

        $this->display();
    }


}

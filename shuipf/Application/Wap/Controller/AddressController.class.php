<?php
namespace Wap\Controller;
use Common\Controller\Base;

class AddressController extends Base {

    protected function _initialize() {
        parent::_initialize();
        
    }

    public function _empty(){
        $this->display();
    }
    
}




<?php
namespace Wap\Controller;
use Common\Controller\Base;

class SearchController extends WapbaseController {

    protected function _initialize() {
        parent::_initialize();

    }

    public function _empty(){
        $this->display();
    }

}




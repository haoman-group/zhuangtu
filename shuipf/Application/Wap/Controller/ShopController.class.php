<?php

namespace Wap\Controller;

class ProductController extends WapbaseController {

    protected function _initialize() {
        parent::_initialize();
    }

    public function index(){
        $this->display();
    }


}

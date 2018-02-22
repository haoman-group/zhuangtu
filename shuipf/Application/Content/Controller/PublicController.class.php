<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 推荐位管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Content\Controller;

use Common\Controller\Base;

class PublicController extends Base {
	public function error_404(){
		$this->display('error_404');
	}
	//装修指南-品质保障
	public function quality(){
		$this->display('quality');
	}
	//联系我们
	public function contact(){
		$this->display('contact');
	}
	//家装必读 
	public function home_decoration(){
		$this->display('home_decoration');
	}
}

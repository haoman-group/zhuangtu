<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 5/30/16
 * Time: 11:48
 */

namespace Api\Controller;

class SearchController extends ApibaseController{
    protected $PageSize = 20;
    protected function _initialize() {
        parent::_initialize();
    }
    public function search() {
        $search_key = I('searchkey', '');
        if ($search_key == '') {
            $this->ajaxReturn(array('status'=>0, 'msg'=>'没有关键字', 'data'=>''));
        }
        $search_filter = array();
        $search_filter['pid'] = I('pid', '');
        $search_filter['vid'] = I('vid', '');
        $search_filter['min_price'] = I('min', '');
        $search_filter['max_price'] = I('max', '');
        $search_filter['catid'] = I('shop_catid', '');
        $search_filter['orderby'] = I('order', '');
        $page_num = I('get.page', '1', 'int');
        $search_tool = new \Libs\Util\ProductSearch();
        $result = $search_tool->search($search_key, $search_filter, $page_num, $this->PageSize);
        $this->ajaxReturn(array('status'=>1,'msg'=>'获取成功','data'=>$result));
    }
}
<?php
namespace Admin\Controller;

use Common\Controller\AdminBase;

class SearchkeysController extends AdminBase {
    private $searchModel = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->searchModel = M('Searchkeys');
    }

    public function index() {
        $where = self::_search();
        $count = count($this->searchModel->field("count(*) as counts, search_key")->where($where)->group("search_key")->order('counts desc')->select());
        $page = $this->page($count, 15);
        $data = $this->searchModel->field("count(*) as counts, search_key")->where($where)->group("search_key")->order('counts desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $dataRange = $this->searchModel->field("min(event_time) as startdate, max(event_time) as enddate")->select();
        $this->assign('startdate', substr($dataRange[0]["startdate"], 0, 10));
        $this->assign('enddate', substr($dataRange[0]["enddate"], 0, 10));
        $this->assign('Page', $page->show());
        $this->assign('rank', $page->firstRow + 1);
        $this->assign('data', $data);
        $this->display();
    }

    private function _search(){
        $where = array();
        $where["search_key"] = array(array("notlike", "%?%"), array("notlike", "-%"), array("neq", ""), "and");
        $search = I('get.search', null);
        if ($search) {
            $search_start_time = I('get.search_start_time', null);
            $search_end_time = I('get.search_end_time', null);
            if ($search_start_time || $search_end_time) {
                $where_start_time = $search_start_time ? $search_start_time : "1970-01-01";
                $where_end_time = $search_end_time ? date("Y-m-d H:i:s", strtotime($search_end_time) + 86400 - 1) : date("Y-m-d H:i:s", time());
                $where['event_time'] = array('between', array($where_start_time, $where_end_time));
            }
        }
        return $where;
    }
}
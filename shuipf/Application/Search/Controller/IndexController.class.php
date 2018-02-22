<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 搜索
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Search\Controller;

use Common\Controller\Base;

class IndexController extends Base {

    //搜索配置
    protected $config;

    //初始化
    protected function _initialize() {
        parent::_initialize();
        $this->config = cache('Search_config');
    }

    //搜索首页
    public function index() {
        C('TOKEN_ON', false);
        $seo = seo();
        $this->assign('seo', $seo);
        $q = I('request.q', '', 'trim');
        if ($q) {
            G('search');
            if (empty($q)) {
                header('Location: ' . U("Search/Index/index"));
                exit;
            }
            if (IS_POST) {
                $data = array("q" => I('request.q', '', 'trim'));
                $data = array_merge($_POST, $data);
                header('Location: ' . U("Search/Index/index", $data));
                exit;
            }
            //关键字
            $q = htmlspecialchars(strip_tags(I('request.q', '', 'trim')));
            if (isMin($q, 25)) {
                $this->error('搜索关键词过长！');
            }
            //时间范围
            $time = I('get.time');
            //模型
            $mid = I('get.modelid', 0, 'intval');
            //栏目
            $catid = I('get.catid', 0, 'intval');
            //排序
            $order = array("adddate" => "DESC", "searchid" => "DESC");
            //搜索历史记录
            $shistory = cookie("shistory");
            if (!$shistory) {
                $shistory = array();
            }
            $model = cache('Model');
            foreach ($model as $k => $rs) {
                if ($rs['type']) {
                    unset($model[$k]);
                }
            }
            array_unshift($shistory, $q);
            $shistory = array_slice(array_unique($shistory), 0, 10);
            //加入搜索历史
            cookie("shistory", $shistory);
            $where = array();
            //搜索条件窜
            $setQuery = '';
            //每页显示条数
            $pagesize = $this->config['pagesize'] ? : 10;
            //可用数据源
            $this->config['modelid'] = $this->config['modelid'] ? : array();
            //按模型搜索
            if ($mid && in_array($mid, $this->config['modelid'])) {
                $setQuery .= " modelid:{$mid} ";
            }
            //按栏目搜索
            if ($catid) {
                //不支持多栏目搜索，和父栏目搜索。
                $setQuery .= " catid:{$catid} ";
            }
            $search = D('Search/Search')->xs()->search;
            //进行分词
            $scws = array();
            if ($this->config['segment']) {
                $tokenizer = new \XSTokenizerScws();
                $words = $tokenizer->getTops($q, 5, 'n,v,vn');
                foreach ($words as $rs) {
                    $scws[] = $rs['word'];
                }
            }
            if (!empty($scws)) {
                $this->assign('words', $scws);
                $q = implode(' OR ', $scws);
            } else {
                $this->assign('words', array($q));
            }
            $setQuery = trim($setQuery);
            $search->setQuery("({$q}) {$setQuery}");
            //按时间搜索
            if ($time == 'day') {//一天
                $search_time = time() - 86400;
                $search->addRange('adddate', $search_time, time());
            } elseif ($time == 'week') {//一周
                $search_time = time() - 604800;
                $search->addRange('adddate', $search_time, time());
            } elseif ($time == 'month') {//一月
                $search_time = time() - 2592000;
                $search->addRange('adddate', $search_time, time());
            } elseif ($time == 'year') {//一年
                $search_time = time() - 31536000;
                $search->addRange('adddate', $search_time, time());
            }
            //获取搜索结果的匹配总数估算值
            $count = $search->count();
            $page = page($count, $pagesize);
            $pageid = I('get.' . C("VAR_PAGE"), 1, 'intval');
            $search->setLimit($pagesize, ($pageid - 1) * $pagesize);
            $result = $search->search();
            $this->assign("Page", $page->show());
            //搜索结果处理
            if ($result && is_array($result)) {
                foreach ($result as $k => $rs) {
                    $result[$k] = \Content\Model\ContentModel::getInstance($rs['modelid'])->where(array('id' => $rs['id']))->find();
                }
            }
            //搜索记录
            if (strlen($q) < 17 && strlen($q) > 1 && $result) {
                $res = M('SearchKeyword')->where(array('keyword' => $q))->count();
                if ($res) {
                    //关键词搜索数+1
                    M('SearchKeyword')->where(array('keyword' => $q))->setInc("searchnums");
                } else {
                    //关键词转换为拼音
                    load('Content/iconvfunc');
                    $pinyin = gbk_to_pinyin(iconv('utf-8', 'gbk//IGNORE', $q));
                    if (is_array($pinyin)) {
                        $pinyin = implode('', $pinyin);
                    }
                    M('SearchKeyword')->add(array('keyword' => $q, 'searchnums' => 1, 'data' => $segment_q, 'pinyin' => $pinyin));
                }
            }
            //相关搜索功能
            if ($this->config['relationenble']) {
                $relation = $search->getRelatedQuery($q, 10);
                if (!empty($relation)) {
                    foreach ($relation as $k => $r) {
                        $relation[$k] = array('keyword' => $r);
                    }
                }
                $this->assign('relation', $relation);
            }
            foreach ($this->config['modelid'] as $modelid) {
                $source[$modelid] = array(
                    "name" => $model[$modelid]['name'],
                    "modelid" => $modelid
                );
            }
            //搜索结果
            $this->assign('result', $result)
                    ->assign('count', (int) $count)
                    ->assign('keyword', I('get.q'))
                    ->assign('source', $source)
                    ->assign('time', $time)
                    ->assign('modelid', $mid)
                    ->assign('shistory', $shistory)
                    ->assign('search_time', G('search', 'end', 6))//运行时间
                    ->display('search');
        } else {
            $this->display();
        }
    }




}

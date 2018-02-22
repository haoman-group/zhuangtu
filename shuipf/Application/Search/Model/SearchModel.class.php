<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 搜索模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Search\Model;

use Common\Model\Model;

class SearchModel extends Model {

    //讯搜对象
    public function xs() {
        static $xs = NULL;
        if (empty($xs)) {
            require_cache(APP_PATH . 'Search/Lib/XS.class.php');
            $xs = new \XS(APP_PATH . 'Search/shuipfcms.ini');
        }
        return $xs;
    }

    /**
     * 生成缓存
     * @return boolean
     */
    public function search_cache() {
        $Search = M('Module')->where(array('module' => 'Search'))->find();
        if (!$Search) {
            return false;
        }
        $Search['setting'] = unserialize($Search['setting']);
        cache('Search_config', $Search['setting']);
        return $Search['setting'];
    }

    /**
     * 更新搜索配置
     * @param type $config 配置数据
     * @return boolean 成功返回true
     */
    public function search_config($config) {
        if (!$config || !is_array($config)) {
            return false;
        }
        $status = M('Module')->where(array('module' => 'Search'))->save(array('setting' => serialize($config)));
        if ($status !== false) {
            $this->search_cache();
            return true;
        }
        return false;
    }

    //清空表
    public function emptyTable() {
        //删除旧的搜索数据
        $DB_PREFIX = C('DB_PREFIX');
        $this->execute("DELETE FROM `{$DB_PREFIX}search`");
        $this->execute("ALTER TABLE `{$DB_PREFIX}search` AUTO_INCREMENT=1");
        $this->xs()->index->clean();
    }

    /**
     * 搜索数据入库处理
     * @param type $data 搜索数据
     * @param type $text 附带数据，例如标题 关键字
     * @return string
     */
    private function dataHandle($data, $text = '') {
        if (!$data) {
            return $data;
        }
        $data = addslashes($text . $data);
        $data = strip_tags($data);
        $data = str_replace(array(" ", "\r\t"), array(""), $data);
        $data = \Input::forSearch($data);
        $data = \Input::deleteHtmlTags($data);
        return $data;
    }

    /**
     * 添加搜索数据
     * @param type $id 信息id
     * @param type $catid 栏目id
     * @param type $modelid 模型id
     * @param type $inputtime 发布时间
     * @param type $data 数据
     * @return boolean
     */
    public function searchAdd($id, $catid, $modelid, $inputtime, $data, $text = '') {
        if (!$id || !$catid || !$modelid || !$data) {
            return false;
        }
        //发布时间
        $inputtime = $inputtime ? (int) $inputtime : time();
        $data = $this->dataHandle($data, $text);
        $addData = array(
            "id" => $id,
            "catid" => $catid,
            "modelid" => $modelid,
            "adddate" => $inputtime,
            "data" => $data,
        );
        $searchid = $this->add($addData);
        if ($searchid !== false) {
            $addData['searchid'] = $searchid;
            require_cache(APP_PATH . 'Search/Lib/XS.class.php');
            $doc = new \XSDocument();
            $doc->setFields($addData);
            $this->xs()->index->add($doc);
            unset($doc);
            return $searchid;
        }
        return false;
    }

    /**
     * 更新搜索数据
     * @param type $id 信息id
     * @param type $catid 栏目id
     * @param type $modelid 模型id
     * @param type $inputtime 发布时间
     * @param type $data 数据
     * @return boolean
     */
    public function searchSave($id, $catid, $modelid, $inputtime, $data, $text = '') {
        if (!$id || !$catid || !$modelid || !$data) {
            return false;
        }
        $info = $this->where(array("id" => $id, "catid" => $catid, "modelid" => $modelid,))->find();
        if (empty($info)) {
            return false;
        }
        //发布时间
        $inputtime = $inputtime ? (int) $inputtime : time();
        $data = $this->dataHandle($data, $text);
        $searchid = $this->where(array(
                    "id" => $id,
                    "catid" => $catid,
                    "modelid" => $modelid,
                ))->save(array(
            'adddate' => $inputtime,
            'data' => $data,
        ));
        if ($searchid !== false) {
            $addData = array(
                "id" => $id,
                "catid" => $catid,
                "modelid" => $modelid,
                "adddate" => $inputtime,
                "data" => $data,
            );
            require_cache(APP_PATH . 'Search/Lib/XS.class.php');
            $doc = new \XSDocument();
            $doc->setFields($this->where(array("id" => $id, "catid" => $catid, "modelid" => $modelid,))->find());
            $this->xs()->index->update($doc);
            unset($doc);
            return true;
        }
        return false;
    }

    /**
     * 删除搜索数据
     * @param type $id 信息id
     * @param type $catid 栏目id 
     * @param type $modelid 模型id
     * @return boolean
     */
    public function searchDelete($id, $catid, $modelid) {
        if (!$id || !$catid || !$modelid) {
            return false;
        }
        $where = array(
            "id" => $id,
            "catid" => $catid,
            "modelid" => $modelid,
        );
        $info = $this->where($where)->find();
        if (empty($info)) {
            return true;
        }
        $this->xs()->index->del($info['searchid']);
        $status = $this->where(array('searchid' => $info['searchid']))->delete();
        return $status !== false ? true : false;
    }

    /**
     * 更新搜索数据 api 接口
     * @param type $id 信息id
     * @param type $data 数据 数据分为 system，和model
     * @param type $modelid 模型id
     * @param type $action 动作
     */
    public function search_api($id = 0, $data = array(), $modelid, $action = 'add') {
        $fulltextcontent = "";
        \Content\Model\ContentModel::getInstance($modelid)->dataMerger($data);
        //更新动作
        if ($action == 'add' || $action == 'updata') {
            //取得模型字段
            $modelField = cache('ModelField');
            $fulltext_array = $modelField[$modelid];
            if (!$fulltext_array) {
                $fulltext_array = array();
            }
            foreach ($fulltext_array AS $key => $value) {
                //作为全站搜索信息
                if ((int) $value['isfulltext']) {
                    $fulltextcontent .= $data[$key];
                }
            }
            $fulltextcontent .= $data['title'] . $data['keywords'];
            //添加到搜索数据表
            $inputtime = (int) $data['inputtime'];
            $catid = (int) $data['catid'];
            if ($action == 'add') {
                $this->searchAdd($id, $catid, $modelid, $inputtime, $fulltextcontent, $data['title'] . $data['keywords']);
            } elseif ($action == 'updata') {
                //判断是否有数据，如果没有，变成add
                if ($this->searchSave($id, $catid, $modelid, $inputtime, $fulltextcontent, $data['title'] . $data['keywords']) !== true) {
                    $this->searchAdd($id, $catid, $modelid, $inputtime, $fulltextcontent, $data['title'] . $data['keywords']);
                }
            }
        } elseif ($action == 'delete') {//删除动作
            $catid = $data['catid'];
            $this->searchDelete($id, $catid, $modelid);
        }
    }

}

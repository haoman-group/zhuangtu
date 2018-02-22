<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员中心模型字段管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Member\Model;

use Content\Model\ModelFieldModel;

class MemberFieldModel extends ModelFieldModel {

    /**
     * 根据模型ID，返回表名
     * @param type $modelid
     * @param type $modelid
     * @return string
     */
    protected function getModelTableName($modelid, $issystem) {
        //读取模型配置 以后优化缓存形式
        $model_cache = cache('Model_Member');
        //表名获取
        $model_table = $model_cache[$modelid]['tablename'];
        return $model_table;
    }

}

<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 搜索模块配置
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------
return array(
    //模块名称
    'modulename' => '表单',
    //图标
    'icon' => 'http://www.shuipfcms.com/d/file/contents/2013/11/527dc54528e9f.png',
    //模块简介
    'introduce' => '自定义信息表单，用于收集个例信息！',
    //模块介绍地址
    'address' => 'http://www.shuipfcms.com',
    //模块作者
    'author' => '水平凡',
    //作者地址
    'authorsite' => 'http://www.shuipfcms.com',
    //作者邮箱
    'authoremail' => 'admin@abc3210.com',
    //版本号，请不要带除数字外的其他字符
    'version' => '1.0.1',
    //适配最低ShuipFCMS版本，
    'adaptation' => '2.0.0',
    //签名
    'sign' => 'b19cc279ed484c13c96c2f7142e2f437',
    //依赖模块
    'depend' => array('Content'),
    //行为注册
    'tags' => array(),
    //缓存，格式：缓存key=>array('module','model','action')
    'cache' => array(
        'Model_form' => array(
            'name' => '自定义表单模型',
            'model' => 'Formguide',
            'action' => 'formguide_cache',
        ),
    ),
);

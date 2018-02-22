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
    'modulename' => '讯搜搜索',
    //图标
    'icon' => 'http://www.shuipfcms.com/d/file/content/2014/07/53b40f1690357.png',
    //模块简介
    'introduce' => '使用讯搜全文检索技术方案进行内容搜索，讯搜安装介绍请进：http://www.xunsearch.com/',
    //模块介绍地址
    'address' => 'http://www.shuipfcms.com',
    //模块作者
    'author' => '水平凡',
    //作者地址
    'authorsite' => 'http://www.shuipfcms.com',
    //作者邮箱
    'authoremail' => 'admin@abc3210.com',
    //版本号，请不要带除数字外的其他字符
    'version' => '1.0.4',
    //适配最低ShuipFCMS版本，
    'adaptation' => '2.0.0',
    //签名
    'sign' => 'b05344b0b2eecaa55327c00aeb5fd361',
    //依赖模块
    'depend' => array('Content'),
    //行为注册
    'tags' => array(
        'content_add_end' => array(
            'title' => '内容添加结束行为标签',
            'type' => 1,
            'phpfile:SearchApi|module:Search',
        ),
        'content_edit_end' => array(
            'title' => '内容编辑结束行为标签',
            'type' => 1,
            'phpfile:SearchApi|module:Search',
        ),
        'content_check_end' => array(
            'title' => '内容审核结束行为标签',
            'type' => 1,
            'phpfile:SearchApi|module:Search',
        ),
        'content_delete_end' => array(
            'title' => '内容删除结束行为标签',
            'type' => 1,
            'phpfile:SearchApi|module:Search',
        ),
    ),
    //缓存，格式：缓存key=>array('module','model','action')
    'cache' => array(
        'Search_config' => array(
            'name' => '讯搜搜索配置',
            'model' => 'Search',
            'action' => 'search_cache',
        ),
    ),
);

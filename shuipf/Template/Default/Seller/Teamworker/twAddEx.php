<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>设计师管理</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>
    <script src="{$config_siteurl}statics/js/common.js?v"></script>
    <script src="{$config_siteurl}statics/js/content_addtop.js"></script>
</head>

<body>
<!--背景容器-->
<template file="Seller/common/_header.php"/>
<!--logo-->
<!--保护容器-->
<!--sellercent_wrap卖家中心通用     scindex卖家中心首页-->
<div class="container sellercenter_wrap scindex">
    <template file="Seller/common/_left.php"/>
    <div class="wraprt">
        <div class="crumbs">
            <a href="http://zhuangtu.local/Seller/Index/index.html" class="cat-ajx">卖家中心</a>
            <a href="#" class="icon-ajx"> &gt; </a>
            <a href="{:U(Order/index)}" class="icon-ajx">合作工长</a>
            <a href="#" class="icon-ajx"> &gt; </a>
            <a href="{:U(Order/index)}" class="icon-ajx">添加工长</a>
            <a href="#" class="icon-ajx"> </a>
        </div>
        <form action="" method="get" class="workerForm">
            <h5>按工人编号添加</h5>
            <label>工长编号：</label>
            <div class="searchNum"><input type="text" value="{$Think.get.prodid}" name="prodid" required="required"><input type="submit" value="搜索"></div>
        </form>
        <div class="workerMessage" <empty name="worker">hidden</empty>>
            <dl>
                <dt>基本信息</dt>
                <dd>工长姓名：{$worker.workername}</dd>
                <dd>年龄：{$worker.age}岁</dd>
                <dd>籍贯：{$worker.hometown}</dd><br />
                <dd>从业年限：{$worker.workyears}年</dd>
                <dd>成功案例：<?php echo implode("/",array_filter(unserialize($worker['case']))); ?></dd>
            </dl>
            <form action="" method="post" <empty name="worker">hidden</empty>>
                <input type="hidden" name="prodid" value="{$worker.id}">
                <input type="submit" value="确定">
                <input type="button" value="取消" onclick="javascript:$('.workerMessage').hide();">
            </form>
        </div>
        <div>
            <h5>手动添加<span>（如果装途网站没有此工人的信息可以手动添加工长）</span></h5>
            <a href="{:U('Seller/Worker/add',array('inpcid'=>'103'))}" class="workerAdd">去添加</a>
        </div>
     </div>
    <div class="clear"></div>
</div>
<!--背景容器-->
<template file="common/_promise.php"/>
<template file="Seller/common/_footer.php"/>
</body>
</html>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>卖家中心</title>
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
</head>
<body>
<!--head-->
<template file="Seller/common/_header.php"/>

<!--保护容器-->
  <div class="container sellercenter_wrap scindex">
<!--左侧菜单栏-->
    <template file="Seller/common/_left.php"/>
    <div class="wraprt">
    	<div class="scenterstatus">
        </div>
        <div class="producttag">
        	我是卖家>宝贝管理>宝贝回收站
            <p><strong>?</strong><a href="">查看帮助</a></p>
        </div>
        <div class="productrecycle_sear">
        	<!--不小心删除宝贝怎么办?选中删除宝贝，点击“恢复到仓库”按钮，淘宝将立刻恢复，删除超过31天的宝贝将无法在此展示以及进行恢复。-->
         <!--   <span class="recycle">宝贝回收站</span>-->
          <form id='searchoptions'  method="get">
            <table>
            	<tr>
                	<td><span>宝贝名称：</span><input type="text" name="title" value="{$Think.get.title}"></td>
                	<td><span>宝贝编码：</span><input type="text" name="id" value="{$Think.get.id}"></td>
                	<td><span>删除时间：</span><input type="text" class="inputs" name='begin_deltime' value="{$Think.get.begin_deltime}"><em>到</em><input type="text" class="inputs" name='end_deltime' value="{$Think.get.end_deltime}"></td>
                    <td class="clear"><input type="submit" value="搜索"></td>  
                </tr>          
            </table>
            </form>
            <p>宝贝恢复后将进入 仓库中。同一宝贝7天内只能恢复一次，删除时请谨慎！</p>
        </div>
        <div class="productsell_record">
            <ul class="head">
            	<li>宝贝名称</li>
                <li>价格</li>
                <li>库存</li>
                <li class="on">总销量</li>
                <li>发布时间</li>
                <li>操作</li>
            </ul>
            <form id="listItems"  method="post">
            <div class="title">
                 <i data-chklistname="prolist" class="bindchk chklist chkall" data-forchkname="chkall1"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></i> <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="chkall1"  name="chkall1"  >
                <span class="chose" onClick="selectall('chkprolist[]');">全选</span>
                <input type="button" value="恢复到仓库" data-action="{:U('recover')}" onclick="submitaction(this)">
                
            </div>
            <volist name="lists" id="vo">
            <ul class="list">
              <li> <i  data-chklistname="prolist" class="bindchk chklist" data-forchkname="chkprolist{$vo.id}"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></i>
               <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="chkprolist{$vo.id}"  name="chkprolist[]" value="{$vo.id}" >{$vo.id}
                <img src="{$vo.headpic}" class="pic">
                <div class="instruction">
                  <p>
                    {$vo.title}
                    </p>
                </div>
              </li>
              <li>￥<if condition="$vo['min_price'] == $vo['max_price']" >{$vo.min_price}<else/>{$vo.min_price} - {$vo.max_price}</if></li>
              <li>{$vo.num}</li>
              <li>0</li>
              <li>
                <p>{$vo.addtime|date="Y-m-d",###}</p>
                <p>{$vo.addtime|date="H:i",###}</p>
              </li>
              <li>
                <p><a href="{:U('edit',array('id' => $vo['id']))}">编辑宝贝</a></p>
                <p><a href="#">复制链接</a></p>
              </li>
            </ul>
          </volist>
          </form>
           <div class="end">
               <if condition="$pageinfo.page !=''">{$pageinfo.page}<a href="#" class="jump">确定</a></if>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<!--end-->
<template file="Seller/common/_footer.php"/>   
</body>
</html>

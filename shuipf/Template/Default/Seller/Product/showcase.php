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
    <!--<script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>-->
</head>
<body>
  <!--背景容器-->
  <template file="Seller/common/_header.php"/>

  <!--sellercent_wrap卖家中心通用     scindex卖家中心首页-->
  <div class="container sellercenter_wrap scindex clearfix">
    <template file="Seller/common/_left.php"/>
    <div class="wraprt">
      <div class="crumbs">
        <a href="{:U('Seller/Index/index')}" class="cat-ajx">卖家中心</a>
        <a href="#" class="icon-ajx"> > </a>
        <a href="{:U('Seller/Index/index')}" class="icon-ajx">宝贝管理</a>
        <a href="#" class="icon-ajx"> > </a>
        <a href="{:U('Seller/Material/showcase')}" class="icon-ajx">橱窗推荐</a>
        <a href="#" class="icon-ajx"> </a>
      </div>
      <div class="productsell_count">
               <!--<div class="head">-->
        <!--  <a href="{:U('lists')}">宝贝管理>></a>-->
        <!--</div>-->
        <div class="metaobao">我的装途网 >> </div>
        <div class="body">
          <h4>橱窗位</h4>
          总数:
          <span class="count">15</span>
          已使用:
          <span class="count">{$pageinfo.countcase}</span>
          <a href="{:U('Seller/Product/showcase')}" class="btn">查看明细</a>
          <a href="" class="btn">一键设置</a>
          <h4>成交达标奖励规则</h4>
          <p>
            本周（2015-09-17至2015-09-23）成交额达
            <span class="cash">￥145.71</span>
            ，可奖励
            <span class="seat">10</span>
            个橱窗位
          </p>
          <p>
            本周（2015-09-17至2015-09-23）成交额达
            <span class="cash">￥291.42</span>
            ，可奖励
            <span class="seat">25</span>
            个橱窗位,
            <span class="seat">0</span>
            个精品橱窗位
          </p>
          <p class="reward">
            奖励每周五更新，您的本周成交额：
            <span class="cash">￥0.00</span>
          </p>
        </div>
      </div>
      <div class="productsell_sear">
        <ul class="head">
          <li><a href="{:U('Seller/Product/lists')}">出售中的宝贝></a></li>
          <li class="on">橱窗推荐宝贝></li>
          <span class="recycle"><a href="{:U('recycle')}">宝贝回收站</a></span>
        </ul>
        <form id='searchoptions'  method="get">
        <table>
          <tr>
            <td>
              <span>宝贝名称：</span>
              <input type="text" name="title" value={$Think.get.title}>
              <input type='submit' class='sear'  value="搜索"></input>
              </td>
          </tr>
        </table>
        </form>
      </div>
      <div class="productsell_record">
        <div class="nav_ul">
          <div <if condition="($Think.get.is_showcase === null) ||($Think.get.is_showcase === '1' ) " >class="li on"<else/>class="li"</if> ><a href="{:U('showcase?is_showcase=1')}">已推荐（{$pageinfo.countcase}/5）</a></div>
          <div <if condition="($Think.get.is_showcase === '0' ) " >class="li on"<else/>class="li"</if> ><a href="{:U('showcase',array('is_showcase' =>'0'))}">未推荐</a></div>
          <span>橱窗位数规则>></span>
        </div>
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
          <input type="button" value="设置推荐" data-action="{:U('setshowcase')}" onclick="submitaction(this)"   <if condition="($Think.get.is_showcase === null) ||($Think.get.is_showcase === '1' ) " >hidden</if>>
          <input type="button" value="取消推荐" data-action="{:U('unsetshowcase')}" onclick="submitaction(this)" <if condition="($Think.get.is_showcase === '0' ) " >hidden</if>>
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
          <div class="pages">
            <ul>
<!--              <li><span>共有1条记录</span></li>-->
<!--              <li><a href="#">1</a></li>-->
<!--              <li>到第<input value="" type="text">页</li>-->
<!--              <li>-->
                <if condition="$pageinfo.page !=''">{$pageinfo.page}<a href="#" class="jump">确定</a></if>
              </li>
            </ul>
          </div>
    </div>
    <div class="clear"></div>
  </div>
</div>

<template file="common/_promise.php"/>
  <template file="Seller/common/_footer.php"/>
</body>
</html>
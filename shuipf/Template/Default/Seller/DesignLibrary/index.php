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
  <script type="text/javascript">
  //全局变量
  var GV = {
      DIMAUB: "/",
    JS_ROOT: "/statics/js/"
  };
  </script>
  <script src="/statics/js/wind.js"></script>
</head>
<body>
  <!--背景容器-->
  <template file="Seller/common/_header.php"/>

  <!--sellercent_wrap卖家中心通用     scindex卖家中心首页-->
  <div class="container sellercenter_wrap scindex">
    <template file="Seller/common/_left.php"/>
    <div class="wraprt">
      <div class="scenterstatus">
      </div>
      <div class="productsell_sear">
        <form id='searchoptions'  method="get">
        <table>
          <tr>
            <td>
              <span>宝贝名称：</span>
              <input type="text"  name="title" value="{$Think.get.title}"></td>
            <td>
              <span>风格类目：</span>
              <Form function="select" parameter="option('attr_style'),'',class='' name='style'"/>
            <td>
              <span>上传时间：</span>
               <input type="text" name="begin_addtime" value="{$Think.get.begin_addtime}" class="J_date  inputs"> <em>到</em>
               <input type="text" name="end_addtime"   value="{$Think.get.end_addtime}"   class="J_date  inputs"></td>
            </td>
          </tr>
          <tr>
            <td>
              <span>宝贝状态：</span>
              <select name='status'>
                  <option value="">--选择--</option>
                  <volist name='proStatus' id='st' >
                    <option value='{$key}' <if condition="null !==$Think.get.status and $Think.get.status == $key">selected</if>>{$st}</option>
                  </volist>
              </select>
            <td>
            <td>
              <!--<input type="reset" class='reset' value="清除条件"></input>-->
              <a href="{:U('index')}">清除条件</a>
              <input type='submit' class='sear' value="搜 索"></input>
             </td>
          </tr>
        </table>
        </form>
      </div>
      <div class="productsell_record">
        <h4>共有宝贝{$pageinfo.count}条记录</h4>
        <ul class="head">
          <li>宝贝名称</li>
          <li>风格分类</li>
          <li>上传时间</li>
          <li class="on">宝贝状态</li>
          <li>操作</li>
        </ul>

        <form id="listItems"  method="post">
        <div class="title">
          <i data-chklistname="prolist" class="bindchk chklist chkall" data-forchkname="chkall1"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></i> <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="chkall1"  name="chkall1"  >
          <span class="chose"  onClick="selectall('chkprolist[]');">全选</span>
          <input type="button" value="删除"  data-action="{:U('delete')}" onclick="submitaction(this)">
          <volist name="lists" id="vo">
            <ul class="list">
              <li> <i  data-chklistname="prolist" class="bindchk chklist" data-forchkname="chkprolist{$vo.id}"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></i>
               <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="chkprolist{$vo.id}"  name="chkprolist[]" value="{$vo.id}" >{$vo.id}
                <img src="{$vo.picture}" class="pic">
                <div class="instruction">
                  <p>
                    {$vo.title}
                    </p>
                </div>
              </li>
              <li>{$vo.style}</li>
              <li>{$vo.addtime|date="Y-m-d",###}</li>
              <li>{$proStatus[$vo[proStatus]]}</li>
              <li>
                <p><a href="{:U('delete',array('id' => $vo['id']))}">删除</a></p>
                <p><a href="{:U('Seller/Design/edit',array('id' => $vo['proid']))}">修改</a></p>
              </li>
            </ul>
          </volist>
          </form>
           </div>
            <div class="end">
                <if condition="$pageinfo.page !=''">{$pageinfo.page}<a href="#" class="jump">确定</a></if>
            </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
<!--end-->
<template file="Seller/common/_footer.php"/>
<script src="/statics/js/common.js?v"></script>
<script src="/statics/js/content_addtop.js?v"></script>

</body>

</html>
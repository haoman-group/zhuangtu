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
        <div class="scenterstatus">
            <div class="timetip">上午好！愿你度过这美好的一天！</div>
            <div class="timetip noon">下午好！喝杯咖啡放松一下吧！</div>
        </div>
        <div class="productsell_sear">
            <ul class="head">
                <li <if condition="!$Think.get.state || ($Think.get.state == '0' ) " >class="on"</if>><a href="{:U('index?state=0')}">全部></a></li>
                <li <if condition="$Think.get.state && ($Think.get.state == '1' ) " >class="on"</if>><a href="{:U('index?state=1')}">服务中></a></li>
                <li <if condition="$Think.get.state && ($Think.get.state == '-1' ) " >class="on"</if>><a href="{:U('index?state=-1')}">暂停服务></a></li>
            </ul>
            <table>
                <form id="form_manager" class="desiginer_index"  method="get">
                <tr>
                    <td><span>设计师姓名：</span><input id="designer_name" type="text" name="name" value="{$Think.get.name}"></td>
                    <td><span>设计师资历：</span>
                        <Form function="select" parameter="option('designer_qualification'),'',class='' name='qualification'"/>
                    </td>
                </tr>
                <tr>
                    <td><span>设计师编号：</span><input id="designer_member" type="text" name="number" value="{$Think.get.number}"></td>
                    <td><span>设计师状态：{$Think.get.service_status}</span>
                        <select name="status">
                            <option value="0">选择状态</option>
                            <option value="1" <if condition="$Think.get.service_status == '1'">selected</if>>服务中</option>
                            <option value="-1" <if condition="$Think.get.service_status == '-1'">selected</if>>暂停服务</option>
                        </select>
                    </td>
                    <td class="clear"><input type="reset" name="button" value="清除条件" >
                        <input type="button" value="搜索" onclick="javascript:$('#form_manager').submit()">
                    </td>
                </tr>
                    </form>
            </table>
        </div>
        <div class="productsell_record designermanage_record">
            <h4>共有设计师{$pageinfo.count}条记录</h4>
            <ul class="head">
                <li><br></li>
                <li>姓名</li>
                <li>状态</li>
                <li>资历</li>
                <li class="on">编号</li>
                <li>销量</li>
                <li>人气</li>
                <li>操作</li>
            </ul>
            <form id="listItems"  method="post">
            <div class="title">
                <i data-chklistname="prolist" class="bindchk chklist chkall" data-forchkname="chkall1"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></i> <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="chkall1"  name="chkall1"  >
                <span class="chose" onClick="selectall('chkprolist[]');">全选</span>
                <input type="button" value="删除" data-action="{:U('designerAction?action=delete')}" onclick="submitaction(this)">
                <input type="button" value="上架" data-action="{:U('designerAction?action=up')}" onclick="submitaction(this)">
                <input type="button" value="下架" data-action="{:U('designerAction?action=down')}" onclick="submitaction(this)">
                <input type="button" value="橱窗推荐" data-action="{:U('designerAction?action=recommend')}" onclick="submitaction(this)">
                <input type="button" value="取消推荐" data-action="{:U('designerAction?action=unrecommend')}" onclick="submitaction(this)">
                <input type="button" value="暂停服务" data-action="{:U('designerAction?action=service_pause')}" onclick="submitaction(this)">
                <input type="button" value=" 开启服务" data-action="{:U('designerAction?action=service_on')}" onclick="submitaction(this)">
            </div>

            <volist name="list" id="vo">
            <ul class="list" name="{$vo.id}">
                <li> <i  data-chklistname="prolist" class="bindchk chklist" data-forchkname="chkprolist{$vo.id}"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></i>
                    <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="chkprolist{$vo.id}"  name="id[]" value="{$vo.id}">
                    <a href="{:U('Shop/Designer/show',array('id'=>$vo[id]))}" target="_blank"><img src="{$vo.picture}" class="pic"></a>
                </li>
                <li><eq name="vo[is_showcase]" value="1">[橱窗推荐]&nbsp;</eq><a href="{:U('Shop/Designer/show',array('id'=>$vo[id]))}" target="_blank">{$vo.name}</a></li>
                <li><eq name="vo['status']" value="1">上架中<else/>已下架</eq>/<eq name="vo['service_status']" value="1">服务中<else/>暂停服务</eq></eq></li>
                <li>{$vo.qualification}</li>
                <li>{$vo.number}</li>
                <li><if condition="!$vo.sales || ($vo.sales == '0' ) " >1<else/>{$vo.sales}</if></li>
                <li><if condition="!$vo.popularity || ($vo.popularity == '0' ) " >1<else/>{$vo.popularity}</if></li>
                <li><p><a href="{:U('add', array('id'=>$vo['id'],'action'=>'edit') )}">编辑</a></p>
                    <p><a href="">复制链接</a></p>
                </li>
            </ul>
            </volist>
            </form>
            <div class="end">
                {$pageinfo.page}
                <a href="#" class="jump">确定</a>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<!--背景容器-->
<template file="common/_promise.php"/>
<template file="Seller/common/_footer.php"/>
</body>
</html>

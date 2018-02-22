<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>自定义区</title>
<link type="text/css" rel="stylesheet" href="{$config_siteurl}statics/zt/css/decpop.css" />

<!--控制图片上传：-->
<template file="common/_global_js.php"/>
<link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
</head>

<body>
<div class="popmain">
    <form id="focusform" action="/Seller/Api/module_save" class="popform" method="post">
    <div class="tabcon chconul defaultform"  data-tag="popfocustab">
    	<div class="con chconli" style="display:block;">
        	<dl class="dlpopform clear-fix">
            	<dt>显示标题：</dt>
                <dd class="control-group">
                	<input type="radio"  name="isshowtit" id="focshowtit" value="0" <eq name="module[setting][isshowtit]" value="0">checked</eq> class="inpradio"><label for="focshowtit">不显示</label>
                    <input value="1" type="radio" name="isshowtit" id="fochidetit" <eq name="module[setting][isshowtit]" value="1">checked</eq> class="inpradio inpshowtit"><label for="fochidetit">显示</label>
                    <input name="title" type="text" value="{$module['setting'][title]}" data-byradioid="fochidetit"  class="hidetitforradio" <eq name="module[setting][isshowtit]" value="1">style="display:inline-block"</eq> >
                </dd>
                <dd class="ddtextarea">
                    <script type="text/plain" id="content" name="content">{$module['setting']['content']|htmlspecialchars_decode}</script><?php echo Form::editor('content','ztshopdecvip','Content',$catid,1); ?>
                </dd>

            </dl>

        </div>
    </div>

    <input type="hidden" name="compid" value="8805">
    <input type="hidden" name="moduleid" value="{$module[id]}">
    <input type="hidden" name="pageid" value="{$module[pageid]}">

    <div class="btndiv blacklinkbtns">
    	<a href="javascript:void(0)" class="btn btnok">保存</a>
        <a href="javascript:void(0)" class="btn btncancle">取消</a>
    </div>
    
    </form>
    
    
    
    <a href="" class="help">使用帮助</a>
</div>


<script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
<script src="{$config_siteurl}statics/zt/js/base.js"></script>
<script src="{$config_siteurl}statics/js/ajaxForm.js"></script>
<script src="{$config_siteurl}statics/zt/js/decoratepop.js"></script>
</body>
</html>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>自定义区</title>
<link type="text/css" rel="stylesheet" href="{$config_siteurl}statics/zt/css/decpop.css" />

</head>

<body>
<div class="popmain">
    <form id="focusform" action="/Seller/Api/module_save" class="popform" method="post">
    <div class="tabcon chconul defaultform"  data-tag="popfocustab">
    	<div class="con chconli" style="display:block;">
        	<dl class="dlpopform clear-fix">
<!--            	<dt>显示导航：</dt>-->
<!--                <dd class="control-group">-->
<!--                	<input type="radio"  name="isshownav" id="focshowtit" value="0" <eq name="module[setting][isshownav]" value="0">checked</eq> class="inpradio"><label for="focshowtit">不显示</label>-->
<!--                    <input type="radio"  name="isshownav" id="fochidetit" value="1" <eq name="module[setting][isshownav]" value="0"><else/>checked</eq> class="inpradio inpshowtit"><label for="fochidetit">显示</label>-->
<!--                </dd>-->
                <dt>导航高度:</dt>
                <dd>
                    <input type="text" class="inpvalwidth" >px
                </dd>

            </dl>

        </div>
    </div>

    <input type="hidden" name="compid" value="8821">
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

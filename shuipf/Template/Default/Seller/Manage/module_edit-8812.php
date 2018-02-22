<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>宝贝搜索</title>
<link type="text/css" rel="stylesheet" href="{$config_siteurl}statics/zt/css/decpop.css" />
</head>

<body>
<div class="popmain">
    <form id="focusform" class="popform">
    <div class="tabcon chconul defaultform"  data-tag="popfocustab">
    	<div class="con chconli" style="display:block;">
        	<dl class="dlpopform clear-fix search">
            	<dt>显示标题：</dt>
                <dd class="control-group">
                	<input type="radio" name="isshowtit" id="focshowtit" class="inpradio"><label for="focshowtit">不显示</label>  <input type="radio" name="isshowtit" id="fochidetit" class="inpradio inpshowtit"><label for="fochidetit">显示</label>   <input  type="text" data-byradioid="fochidetit" class="hidetitforradio">
                </dd>
                <dt>预置关键字：</dt>
                <dd>
                	<input type="text"><span>预置在搜索框中，最长5个汉字、10个字母</span>
                </dd>
                <dt>推荐关键字：</dt>
                <dd>
                	<input type="text"><input type="text"><input type="text">
                    <br><span>搜索按钮后推荐，最长5个汉字、10个字母</span>
                </dd>
                <dt>是否显示：</dt>
                <dd>
                	<input type="checkbox" id="focshow" class="inpradio"><label for="focshow">价格筛选</label> 
                </dd>
            </dl>
        </div>
    </div>
    
    <div class="btndiv blacklinkbtns">
    	<a href="javascript:void(0)" class="btn btnok">保存</a>
        <a href="javascript:void(0)" class="btn">取消</a>
    </div>
    
    </form>
    
    
    
    <a href="" class="help">使用帮助</a>
</div>



<script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
<script src="{$config_siteurl}statics/js/ajaxForm.js"></script>
<script src="{$config_siteurl}statics/zt/js/decoratepop.js"></script>

</body>
</html>

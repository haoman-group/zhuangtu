<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>图片轮播</title>
<link type="text/css" rel="stylesheet" href="{$config_siteurl}statics/zt/css/decpop.css" />
</head>

<body>
<div class="popmain">
	<div class="tabtit">
    	<ul class="ultit chtitul clear-fix" data-tag="popfocustab">
        	<li class="on chtitli">内容设置</li>
            <li class="chtitli">显示设置</li>
        </ul>
        
    </div>
    <form id="focusform" action="/Seller/Api/module_save" class="popform" method="post">
    <div class="tabcon chconul defaultform"  data-tag="popfocustab">
    	<div class="con chconli" style="display:block;">
        	<ul class="focustb">
            	<li class="tbhead">
                	<div class="td td1">图片地址：</div>
                    <div class="td td2">链接地址：</div>
                    <div class="td td3">操作：</div>
                </li>
                <li>
                	<div class="td td1"><input parttern="/^\d+$/" data-requiretxt="请上传或选择图片" type="text" name="pic[]" required data-minlen="6"> <a href="javascript:void(0)" class="btntoupload" ></a></div>
                    <div class="td td2"><input name="url[]" type="text" required></div>
                    <div class="td td3 btns">
                    	<a href="javascript:void(0)" class="up" title="上移"></a>
                        <a href="javascript:void(0)" class="down" title="下移"></a>
                        <a href="javascript:void(0)" class="del" title="删除"></a>
                    </div>
                </li>
                
            </ul>
            <div class="linebtns btnaddapic">
            	<a href="javascript:void(0)" class="btn">添加</a>
            </div>
        </div>
        <div class="con chconli" style="display:none;">
        	<dl class="dlpopform clear-fix">
            	<dt>显示标题：</dt>
                <dd class="control-group">
                    <input type="radio"  name="isshowtit" id="focshowtit" value="0" <eq name="module[setting][isshowtit]" value="0">checked</eq> class="inpradio"><label for="focshowtit">不显示</label>
                    <input value="1" type="radio" name="isshowtit" id="fochidetit" <eq name="module[setting][isshowtit]" value="1">checked</eq> class="inpradio inpshowtit"><label for="fochidetit">显示</label>
                    <input name="title" type="text" value="{$module['setting'][title]}" data-byradioid="fochidetit"  class="hidetitforradio" <eq name="module[setting][isshowtit]" value="1">style="display:inline-block"</eq> >
                </dd>
                <dt>模块高度：</dt>
                <dd>
                	<input name="height" value="{$module['setting'][height]}" type="text" class="shortinput" maxlength="3"><span>px</span> <span>请设置在100-600px之间</span>
                </dd>
                <dt>切换效果：</dt>
                <dd>
                	<select name="switch"  >
                    	<option value="1" <eq name="module[setting]['switch']" value="1">selected</eq>>上下滚动</option>
                        <option value="2" <eq name="module[setting]['switch']" value="2">selected</eq>>渐变滚动</option>
                    </select>
                </dd>
            </dl>
        </div>
    </div>
    <input type="hidden" name="compid" value="8802">
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

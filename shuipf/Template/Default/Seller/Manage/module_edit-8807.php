<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>友情链接</title>
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
        	<dl class="dlpopform clear-fix">
            	<dt>链接类型：</dt>
                <dd class="control-group">
                	<input type="radio" name="type" value="{$module['setting'][type]}" <eq name="module[setting]['type']" value="1">checked</eq> id="type1" class="inpradio"><label for="type1">文字</label>
                	<input type="radio" name="type" value="{$module['setting'][type]}" <eq name="module[setting]['type']" value="2">checked</eq> id="type2" class="inpradio"><label for="type2">图片</label>
                </dd>
                <div class="linkbox">
                    <div class="link">
                        <dt>链接名称：</dt>
                        <dd>
                            <input type="text" class="link-name">
                            <i class="del">删除</i>
                            <i class="move">
                            	移动
                                <ul>
                                	<li>上移一层</li>
                                    <li>下移一层</li>
                                    <li>置顶</li>
                                    <li>置底</li>
                                </ul>
                            </i>
                        </dd>
                        <dt>链接地址：</dt>
                        <dd>
                            <input type="text">
                        </dd>
                        <dt>链接说明：</dt>
                        <dd>
                            <input type="text">
                        </dd>
                    </div>
                    <div class="link">
                        <dt>图片地址：</dt>
                        <dd>
                            <input type="text" class="link-name"><strong title="插入图片空间图片"></strong><span>仅支持180*30</span>
                            <i class="del">删除</i>
                            <i class="move">
                            	移动
                                <ul>
                                	<li>上移一层</li>
                                    <li>下移一层</li>
                                    <li>置顶</li>
                                    <li>置底</li>
                                </ul>
                            </i>
                        </dd>
                        <dt>链接地址：</dt>
                        <dd>
                            <input type="text">
                        </dd>
                        <dt>链接说明：</dt>
                        <dd>
                            <input type="text">
                        </dd>
                    </div>
                    <a class="add btn">添加</a>
                </div>
            </dl>
        </div>
        <div class="con chconli" style="display:none;">
        	<dl class="dlpopform clear-fix">
            	<dt>显示标题：</dt>
                <dd class="control-group">
                    <input type="radio"  name="isshowtit" id="focshowtit" value="0" <eq name="module[setting][isshowtit]" value="0">checked</eq> class="inpradio"><label for="focshowtit">不显示</label>
                    <input value="1" type="radio" name="isshowtit" id="fochidetit" <eq name="module[setting][isshowtit]" value="1">checked</eq> class="inpradio inpshowtit"><label for="fochidetit">显示</label>
                    <input name="title" type="text" value="{$module['setting'][title]}" data-byradioid="fochidetit"  class="hidetitforradio" <eq name="module[setting][isshowtit]" value="1">style="display:inline-block"</eq> >
                    <span>最多15个汉字，30个字符</span>
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

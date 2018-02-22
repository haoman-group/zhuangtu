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
                <dt>显示标题：</dt>
                <dd class="control-group">
                    <input type="radio"  name="isshowtit" id="focshowtit" value="0" <eq name="module[setting][isshowtit]" value="0">checked</eq> class="inpradio"><label for="focshowtit">不显示</label>
                    <input value="1" type="radio" name="isshowtit" id="fochidetit" <eq name="module[setting][isshowtit]" value="1">checked</eq> class="inpradio inpshowtit"><label for="fochidetit">显示</label>
                    <input name="title" type="text" value="{$module['setting'][title]}" data-byradioid="fochidetit"  class="hidetitforradio" <eq name="module[setting][isshowtit]" value="1">style="display:inline-block"</eq> >
                </dd>

                <dt>宝贝分类：</dt>
                <dd>
                    <select name="category">
                        <option value="1">111</option>
                        <option value="2">222</option>
                    </select>
                </dd>
                <dt>关键字：</dt>
                <dd>
                    <input type="text" name="keywords" value="{$module['setting'][keywords]}">
                </dd>
                <dt>价格范围：</dt>
                <dd>
                    <input class="price" name="price_from" type="text" value="{$module['setting'][price_from]}">－<input class=" price" name="price_to" type="text" value="{$module['setting'][price_to]}">元
                </dd>
                <dt>宝贝数量：</dt>
                <dd>
                    <select name="number">
                        <option value="100">100</option>
                    </select>
                </dd>
                <dt>默认显示：</dt>
                <dd>
                    <input type="radio" name="default" value="1" id="focshow1" <eq name="module[setting]['default']" value="1">checked</eq> class="inpradio"><label for="focshow1">本月热销排行</label>
                    <input type="radio" name="default" value="2" id="focshow2" <eq name="module[setting]['default']" value="2">checked</eq> class="inpradio"><label for="focshow2">热门收藏排行</label>
                    <br><br><input type="checkbox" <eq name="module[setting][is_show_sales]" value="1">checked</eq> value="1" name="is_show_sales" id="focshow3" class="inpradio"><label for="focshow3">显示最近30天销量数据</label>
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

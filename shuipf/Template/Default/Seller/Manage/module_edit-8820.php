<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>宝贝推荐</title>
    <link type="text/css" rel="stylesheet" href="{$config_siteurl}statics/zt/css/decpop.css" />
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <!--控制图片上传：-->
    <template file="common/_global_js.php"/>
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <script src="{$config_siteurl}statics/js/wind.js"></script>
    <script src="{$config_siteurl}statics/js/common.js"></script>
</head>
<body>
<div class="popmain">
	<div class="tabtit">
    	<ul class="ultit chtitul clear-fix" data-tag="popfocustab">
        	<li class="on chtitli">招牌内容</li>
        </ul>
        
    </div>
    <form id="focusform" action="/Seller/Api/module_save" class="popform popbanform" method="post">
    <div class="tabcon chconul defaultform"  data-tag="popfocustab">
    	<div class="con chconli" style="display:block;">
        	<dl class="dlpopform clear-fix ">
            	<dt>招牌类型：</dt>
                <dd>
                    <input type="radio" name="type" value="2" id="logotype2" <eq name="module[setting][type]" value="1"><else/>checked</eq> class="inpradio"><label for="logotype2">高级定制</label>
                	<input type="radio" name="type" value="1" id="logotype1" <eq name="module[setting][type]" value="1">checked</eq> class="inpradio"><label for="logotype1">普通招牌</label>
                    <!--<input type="radio" name="logotype2" id="logotype2" class="inpradio"><label for="logotype2">自定义招牌</label>
                    <input type="radio" name="logotype3" id="logotype3" class="inpradio"><label for="logotype3">BannerMaker</label>-->
                </dd>
                <dt>店铺名称：</dt>
                <dd>
                	<label>{:D('Shop')->getFieldByUid($uid,'name')}</label><a class="set" href="#">修改</a> <input name="is_show_name" id="showname" type="checkbox" value="1" <eq name="module[setting][is_show_name]" value='1'>checked</eq>> <label for="showname">是否显示店铺名称：</label>
                </dd>
                <dt>背景图：</dt>
                <dd>
                	<input type="button" value="选择图片" onclick="upfile('bannerimg')">
                    <input type="hidden" name="background_image" id="bannerimg_hidden" value="{$module['setting']['background_image']}">
                    <div class="popbanimgprebox">
                        <img class="logobg" id="bannerimg" src="{$module['setting']['background_image']}">
                    </div>
                </dd>
                <dt>高度：</dt>
                <dd class="logohei">
                	<input type="text" name='height' value="{$module['setting']['height']|default=150}">px<span>宽度为950像素，高度建议不超过150像素，否则导航显示可能异常</span>
                </dd>
            </dl>
        </div>
    </div>

    <input type="hidden" name="compid" value="8820">
    <input type="hidden" name="moduleid" value="{$module[id]}">
    <input type="hidden" name="pageid" value="{$module[pageid]}">

    <div class="btndiv blacklinkbtns">
    	<a href="javascript:void(0)" class="btn btnok">保存</a>
        <a href="javascript:void(0)" class="btn">取消</a>
    </div>
    
    </form>
    
    
    
    <a href="" class="help">使用帮助</a>
</div>




<script src="{$config_siteurl}statics/js/ajaxForm.js"></script>
<script src="{$config_siteurl}statics/zt/js/decoratepop.js"></script>

<script>
<?php
    $alowexts = "jpg|jpeg|gif|bmp|png";
    $thumb_ext = ",";
    $watermark_setting = 0;
    $module = "Seller";
    $catid = "0";
    $authkey = upload_key("$maxPicNum,$alowexts,1,$thumb_ext,$watermark_setting");
?>

function upfile(id){
    flashupload(id+'_images', '图片上传',id,submit_pic,'{$maxPicNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
}
function submit_pic(uploadid,returnid){
    // console.log(uploadid+"!!"+returnid);

    var d = uploadid.iframe.contentWindow;
    var in_content = d.$("#att-status").html().substring(1);
    var in_content = in_content.split('|');
    $('#'+returnid).attr('src',in_content[0]);
    $('#'+returnid+'_hidden').attr('value',in_content[0]);
}
</script>


</body>
</html>

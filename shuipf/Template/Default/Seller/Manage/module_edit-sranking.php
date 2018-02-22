<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>宝贝排行</title>
<link type="text/css" rel="stylesheet" href="{$config_siteurl}statics/zt/css/decpop.css" />
</head>

<body>
<div class="popmain">
    <form id="focusform" class="popform">
    <div class="tabcon chconul defaultform"  data-tag="popfocustab">
    	<div class="con chconli" style="display:block;">
        	<dl class="dlpopform clear-fix">
            	<dt>显示标题：</dt>
                <dd class="control-group">
                	<input type="radio" name="isshowtit" id="focshowtit" class="inpradio"><label for="focshowtit">不显示</label>  <input type="radio" name="isshowtit" id="fochidetit" class="inpradio inpshowtit"><label for="fochidetit">显示</label>   <input  type="text" data-byradioid="fochidetit" class="hidetitforradio">
                </dd>
                <dt>宝贝分类：</dt>
                <dd>
                	<select>
                    </select>
                </dd>
                <dt>关键字：</dt>
                <dd>
                	<input type="text">
                </dd>
                <dt>价格范围：</dt>
                <dd>
                	<input class=" price" type="text">－<input class=" price" type="text">元
                </dd>
                <dt>宝贝数量：</dt>
                <dd>
                	<select>
                    	<option></option>
                    </select>
                </dd>
                <dt>默认显示：</dt>
                <dd>
                	<input type="radio" name="isshow" id="focshow1" class="inpradio"><label for="focshow1">本月热销排行</label> 
                	<input type="radio" name="isshow" id="focshow2" class="inpradio"><label for="focshow2">热门收藏排行</label> 
                	<br><br><input type="checkbox" id="focshow3" class="inpradio"><label for="focshow3">显示最近30天销量数据</label>
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
<script src="{$config_siteurl}statics/zt/js/decoratepop.js"></script>

</body>
</html>

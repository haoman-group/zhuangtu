<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>备份与还原</title>
<link type="text/css" rel="stylesheet" href="{$config_siteurl}statics/zt/css/decpop.css" />
</head>

<body>
<div class="popmain">
	<div class="tabtit">
    	<ul class="ultit chtitul clear-fix" data-tag="popfocustab">
        	<li class="on chtitli">备份</li>
            <li class="chtitli">还原</li>
        </ul>
        
    </div>
    <form id="focusform" action="/Seller/Api/module_save" class="popform poppagebakform" method="post">
    <div class="tabcon chconul defaultform"  data-tag="popfocustab">
    	<div class="con chconli"  style="display:block;">
        	<dl class="dlpopform clear-fix">
            	<dt>备份名：</dt>
                <dd >
                    <input type="text" name="pagename">
                </dd>

                <dt>备注：</dt>
                <dd>
                	<textarea></textarea>
                </dd>
            </dl>
            <div class="btndiv blacklinkbtns">
                <a href="javascript:void(0)" class="btn btnok">保存</a>
                <a href="javascript:void(0)" class="btn btncancle">取消</a>
            </div>
        </div>
        <div class="con chconli" style="display: none;">
        	<table class="tbpagebaklist">
                <tr>
                    <th>备份名称</th>
                    <th>备份时间</th>
                    <th>备注</th>
                </tr>
                <tr>
                    <td><input type="radio">系统备份</td>
                    <td>2016-03-24 16:43:19</td>
                    <td>系统最多保留最近五次的发布装修备份，应用该备份可以恢复到备份时的装修数据状态。</td>
                </tr>
            </table>
            <div class="btndiv blacklinkbtns">
                <a href="javascript:void(0)" class="btn btnok">应用备份</a>
                <a href="javascript:void(0)" class="btn btnok">删除备份</a>
                <a href="javascript:void(0)" class="btn btncancle">取消</a>
            </div>
        </div>
    </div>

    <input type="hidden" name="compid" value="8801">
    <input type="hidden" name="pageid" value="{$module[pageid]}">


    <input type="hidden" name="moduleid" value="popdecbak">


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

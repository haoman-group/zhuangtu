<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>客服中心</title>
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
			<dl class="dlpopform clear-fix cusser">
            	<dt>工作时间：</dt>
                <dd>
                	<table>
                    	<thead>
                        	<tr>
                            	<th>日期</th>
                                <th></th>
                                <th>时间</th>
                                <th></th>
                                <th>显示</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td><select></select>至</td>
                            	<td><select></select>：</td>
                            	<td><select></select>至</td>
                            	<td><select></select></td>
                                <td><input type="checkbox"></td>
                            </tr>
                        	<tr>
                            	<td><select></select>至</td>
                            	<td><select></select>：</td>
                            	<td><select></select>至</td>
                            	<td><select></select></td>
                                <td><input type="checkbox"></td>
                            </tr>
                        </tbody>
                    </table>
                </dd>
                <dt>在线咨询：</dt>
                <dd>
                	<table>
                    	<thead>
                        	<tr>
                            	<th>旺旺分组</th>
                                <th>显示</th>
                                <th>旺旺分组</th>
                                <th>显示</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </dd>
                <span>设置旺旺分组请使用<a href="" class="set">分流设置</a></span>
                <dt>联系方式：</dt>
                <dd>
                	<table>
                    	<tr>
                        	<td>联系电话：<input type="text"><input type="checkbox"></td>
                        	<td>联系电话：<input type="text"><input type="checkbox"></td>
                        </tr>
                    </table>
                </dd>
            </dl>
        </div>
        <div class="con chconli" style="display:none;">
        	<dl class="dlpopform clear-fix">
            	<dt>显示标题：</dt>
                <dd class="control-group">
                    <input type="radio"  name="isshowtit" id="focshowtit" value="0" <eq name="module[setting][isshowtit]" value="0">checked</eq> class="inpradio"><label for="focshowtit">不显示</label>
                    <input value="1" type="radio" name="isshowtit" id="fochidetit" <eq name="module[setting][isshowtit]" value="1">checked</eq> class="inpradio inpshowtit"><label for="fochidetit">显示</label>
                    <input name="title" type="text" value="<empty name="module['setting'][title]">客服中心<else/>{$module['setting'][title]}</empty>" data-byradioid="fochidetit"  class="hidetitforradio" <eq name="module[setting][isshowtit]" value="1">style="display:inline-block"</eq> >
                </dd>
            </dl>
        </div>
    </div>

    <input type="hidden" name="compid" value="8808">
    <input type="hidden" name="moduleid" value="{$module[id]}">
    <input type="hidden" name="pageid" value="{$module[pageid]}">

    <div class="btndiv blacklinkbtns">
    	<a href="javascript:void(0)" class="btn btnok">保存</a>
        <a href="javascript:void(0)" class="btn">取消</a>
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

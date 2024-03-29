<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>宝贝推荐</title>
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
    <form id="focusform" class="popform">
    <div class="tabcon chconul defaultform"  data-tag="popfocustab">
    	<div class="con chconli" style="display:block;">
        	<dl class="dlpopform clear-fix">
            	<dt>推荐方式：</dt>
                <dd class="control-group">
                	<input type="radio" name="isshowtit" id="focshowtit" class="inpradio"><label for="focshowtit">自动推荐</label>  
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
            </dl>
        </div>
        <div class="con chconli" style="display:none;">
        	<dl class="dlpopform clear-fix">
            	<dt>显示标题：</dt>
                <dd class="control-group">
                	<input type="radio" name="isshowtit" id="focshowtit" class="inpradio"><label for="focshowtit">不显示</label>  <input type="radio" name="isshowtit" id="fochidetit" class="inpradio inpshowtit"><label for="fochidetit">显示</label>   <input  type="text" data-byradioid="fochidetit" class="hidetitforradio">
                </dd>
                <dt>展示方式：</dt>
                <dd>
                	<ul class="explay">
                    	<li class="line1on">
                        	<a href="#"></a><br>
                            一行展示3个宝贝
                        </li>
                    </ul>
                </dd>
                <dt>是否显示：</dt>
                <dd>
                	<input type="checkbox" id="focshowtype1" class="inpradio"><label for="focshowtype1">折扣价</label>
                	<input type="checkbox" id="focshowtype2" class="inpradio"><label for="focshowtype2">最近30天销售数据</label>
                	<input type="checkbox" id="focshowtype3" class="inpradio"><label for="focshowtype3">累计评价数</label>
                	<input type="checkbox" id="focshowtype4" class="inpradio"><label for="focshowtype4">评论</label>
  			    </dd>
                <dt> </dt>
                <dd>
                	<span>宝贝折扣价格显示与主搜索保持一致！</span>
                </dd>
                <dt>自动推荐排序：</dt>
                <dd>
                	<select>
                    	<option></option>
                    </select>
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

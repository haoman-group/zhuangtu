<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>个性分类</title>
<link type="text/css" rel="stylesheet" href="{$config_siteurl}statics/zt/css/decpop.css" />
</head>

<body>
<div class="popmain">
	<div class="tabtit">
    	<ul class="ultit chtitul clear-fix" data-tag="popfocustab">
            <li class="chtitli on">显示设置</li>
        </ul>
        
    </div>
    <form id="focusform" class="popform">
    <div class="tabcon chconul defaultform"  data-tag="popfocustab">
        <div class="con chconli" style="display:block;">
        	<dl class="dlpopform clear-fix">
            	<dt>显示标题：</dt>
                <dd class="control-group">
                	<input type="radio" name="isshowtit" id="focshowtit" class="inpradio"><label for="focshowtit">不显示</label>  <input type="radio" name="isshowtit" id="fochidetit" class="inpradio inpshowtit"><label for="fochidetit">显示</label>   <input  type="text" data-byradioid="fochidetit" class="hidetitforradio">
                </dd>
               <div class="classify">
                    <span>此操作只对当前模块生效，不影响宝贝分类数据。</span>
                    <ul class="menu">
                    	<li>
                        	<i><input type="checkbox">显示</i>
                        	<i></i>
                        	<i>移动子分类</i>
                        	<i></i>
                        	<i><strong class="tip" title="勾选之后，子分类的显示将默认展开">展开子分类</strong></i>
                        </li>
                    </ul>
                    <ul class="classshow">
                    	<li>
                        	<i><input type="checkbox"></i>
                        	<i>111</i>
                        	<i><s></s><s></s><s></s><s></s></i>
                        	<i></i>
                        	<i><input type="checkbox"></i>
                        </li>
                    	<li>
                        	<i><input type="checkbox"></i>
                        	<i><em class="add"></em>111</i>
                        	<i><s></s><s></s><s></s><s></s></i>
                        	<i></i>
                        	<i><input type="checkbox"></i>
                        </li>
                        <li>
                        	<ul>
                            	<li>
                                    <i><input type="checkbox"></i>
                                    <i></i>
                                    <i><s></s><s></s><s></s><s></s></i>
                                    <i></i>
                                    <i><input type="checkbox"></i>
                                </li>
                            	<li>
                                    <i><input type="checkbox"></i>
                                    <i></i>
                                    <i><s></s><s></s><s></s><s></s></i>
                                    <i></i>
                                    <i><input type="checkbox"></i>
                                </li>
                            </ul>
                        </li>
                    	<li>
                        	<i><input type="checkbox"></i>
                        	<i></i>
                        	<i><s></s><s></s><s></s><s></s></i>
                        	<i></i>
                        	<i><input type="checkbox"></i>
                        </li>
                    </ul>
               </div>

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

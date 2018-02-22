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
    <form id="focusform" action="/Seller/Api/module_save" class="popform" method="post">
    <div class="tabcon chconul defaultform"  data-tag="popfocustab">
    	<div class="con chconli"  style="display:none;">
        	<dl class="dlpopform clear-fix">
            	<dt>推荐方式：</dt>
                <dd class="control-group">
                    <input type="radio" name="isauto" value="{$module['setting'][isauto]}" id="isauto" class="inpradio"><label for="isauto">自动推荐</label>
                </dd>
                <dt>宝贝分类：</dt>
                <dd>
                	<select name="category" value="{$module['setting'][category]}">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </dd>
                <dt>关键字：</dt>
                <dd>
                	<input name="keywords" value="{$module['setting'][keywords]}" type="text">
                </dd>
                <dt>价格范围：</dt>
                <dd>
                	<input name="price_from" value="{$module['setting'][price_from]}" class=" price" type="text">－<input name="price_to" value="{$module['setting'][price_to]}" class=" price" type="text">元
                </dd>
                <dt>宝贝数量：</dt>
                <dd>
                	<select name="number" value="{$module['setting'][number]}">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </dd>
            </dl>
        </div>
        <div class="con chconli" style="display: block;">
        	<dl class="dlpopform clear-fix">
            	<dt>显示标题：</dt>
                <dd class="control-group">
                    <input type="radio"  name="isshowtit" id="focshowtit" value="{$module['setting'][isshowtit]}" <eq name="module[setting]['isshowtit']" value="0">checked</eq> class="inpradio"><label for="focshowtit">不显示</label>
                    <input value="1" type="radio" name="isshowtit" value="{$module['setting'][display_type]}" id="fochidetit" <eq name="module[setting]['isshowtit']" value="1">checked</eq> class="inpradio inpshowtit"><label for="fochidetit">显示</label>
                    <input name="title" type="text" value="{$module['setting'][title]}" data-byradioid="fochidetit"  class="hidetitforradio" <eq name="module[setting][isshowtit]" value="1">style="display:inline-block"</eq> >
                </dd>
                <dt>展示方式：</dt>
                <dd>
                	<ul class="explay moniradiobox" data-inpname="display_type">
                    	<li class="line3 radio <eq name="module[setting]['display_type']" value="3in1">on</eq>" data-v="3in1"  >
                        	<a href="#"></a><br>
                            一行展示3个宝贝
                        </li>
                    	<li class="line4 radio <eq name="module[setting]['display_type']" value="4in1">on</eq>"  data-v="4in1">
                        	<a href="#"></a><br>
                            一行展示4个宝贝
                        </li>
                    	<li class="sline3 radio <eq name="module[setting]['display_type']" value="3in11">on</eq>" data-v="3in11" >
                        	<a href="#"></a><br>
                            一行无缝展示3个宝贝
                        </li>
                        <input type="hidden" name="display_type" value="{$module['setting'][display_type]}">
                    </ul>

                </dd>
                <dt>是否显示：</dt>
                <dd>
                	<input type="checkbox" name="is_show_discount" value="1" <eq name="module[setting]['is_show_discount']" value="1">checked</eq> id="focshowtype1" class="inpradio"><label for="focshowtype1">折扣价</label>
                	<input type="checkbox" name="is_show_sales" value="2" <eq name="module[setting]['is_show_sales']" value="2">checked</eq> id="focshowtype2" class="inpradio"><label for="focshowtype2">最近30天销售数据</label>
                	<input type="checkbox" name="is_show_comment_count" value="3" <eq name="module[setting]['is_show_comment_count']" value="3">checked</eq> id="focshowtype3" class="inpradio"><label for="focshowtype3">累计评价数</label>
                	<input type="checkbox" name="is_show_comment" value="4" <eq name="module[setting]['is_show_comment']" value="4">checked</eq> id="focshowtype4" class="inpradio"><label for="focshowtype4">评论</label>
  			    </dd>
                <dt> </dt>
                <dd>
                	<span>宝贝折扣价格显示与主搜索保持一致！</span>
                </dd>
                <dt>自动推荐排序：</dt>
                <dd>
                	<select name="sort" value="{$module['setting'][sort]}">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </dd>
            </dl>
        </div>
    </div>

    <input type="hidden" name="compid" value="8801">
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

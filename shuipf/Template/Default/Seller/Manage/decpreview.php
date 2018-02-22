<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>页面预览</title>
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/ztshop.css" >
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/shopskin/<notempty name="page[setting][color]">{$page[setting][color]}<else/>dark</notempty>.css" >
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/ecplaypreview.css" >
<script src="{$config_siteurl}statics/zt/js/jquery.js"></script>

<script src="http://g.alicdn.com/kissy/k/1.4.8/seed-min.js"></script>
<script src="http://a.tbcdn.cn/p/snsdk/core.js"></script>
<script src="{$config_siteurl}statics/js/ks/easycountdown.js"></script>


</head>

<body style="background-image: url({$page['setting']['container']['background_image']}); background-color:{$page['setting']['container']['background_color']};background-repeat:{$page['setting']['container']['background_repeat']};background-position:{$page['setting']['container']['background_align']} 0;  ">
<div class="page">
	<div class="ztshopcon">
		<div class="layoutmain" data-maxlayout="5" data-maxmods="40">
			<div class="layout-hd <eq name="page[setting][header][isshownav]" value="0">hdhidenav</eq> " style="margin-bottom: <eq name="page[setting][header][margin_bottom_10]" value="0">0px <else/>10px</eq>; <eq name="page[setting][header][isshowhead]" value="0">display:none;</eq>    <notempty name="page[setting][header][background_image]">background-image: url({$page['setting']['header']['background_image']});background-repeat:{$page['setting']['header']['background_repeat']}; background-position:{$page['setting']['header']['background_align']} 0;</notempty> <notempty name="page[setting][header][background_color]">background-color:{$page['setting']['header']['background_color']};</notempty>   ">
				<div class="layout layout-block" data-ltype="ltop" data-widgetid="12346745822" data-componentid="23" data-prototypeid="23" data-id="12346745822" data-max="2">
					<div class="col-main">
						<div class="main-wrap J_TRegion" data-modules="main" data-width="h950" data-max="2">

							<volist name="layout[hd][0][maincol]" id="v">
								{$v['widgetid']|getDesignHtml}
							</volist>
						</div>

					</div>

				</div>

				<div class="hdfttip">以上为页头区域</div>
			</div>

			<div class="layout-bd">
				<volist name="layout[bd]" id="vo">
					<div class="layout-block {$vo.classname} layout" data-ltype="{$vo.classname}" data-widgetid="{$vo.blockid}" data-componentid="0" data-context="bd" data-prototypeid="0" data-id="{$vo.blockid}">
						<div class="col-main">
							<div class="main-wrap J_TRegion" data-modules="main" data-width="b950">
								<volist name="vo[maincol]" id="v">
									{$v['widgetid']|getDesignHtml}
								</volist>
							</div>
						</div>
						<div class="col-sub J_TRegion" data-modules="sub" data-width="b190">
							<volist name="vo[subcol]" id="v">
								{$v['widgetid']|getDesignHtml}
							</volist>
						</div>
					</div>

				</volist>

			</div>


	</div>

    <div class="layout-ft">
        <div class="hdfttip">以下为页尾区域</div>
    
        <div class="layout grid-m layout-block" data-ltype="lft" data-widgetid="12346745825" data-componentid="33" data-prototypeid="33" data-id="12346745825" data-max="1">
    
            <div class="col-main">
                <div class="main-wrap J_TRegion" data-modules="main" data-width="f950" data-max="1">
    
    
                </div>
            </div>
        </div>
    </div>
    
    <div class="system-ft">
        <p>2015 &copy; 装途网 版权所有</p>
    </div>
</div>
</div>


<script>
$(function(){
	/*点击切换的滑动门   chtitli为切换按钮  chtitul为切换按钮的容器
	 chconli为切换内容    chconul为切换内容的容器
	 data-tag属性标记对应关系*/
	$(".chtitli").click(function(){
		var $chtitul= $(this).closest(".chtitul");
		var tag=$chtitul.attr("data-tag");
		var $chconul= $("[data-tag='"+tag+"']").eq(1);

		var index = $chtitul.find(".chtitli").index(this);
		$(this).addClass("on").siblings(".chtitli").removeClass("on");
		$chconul.find(".chconli").eq(index).show().siblings(".chconli").hide();
	})
})
</script>

<script src="{$config_siteurl}statics/js/ks/ks142.js?t="></script>
</body>
</html>

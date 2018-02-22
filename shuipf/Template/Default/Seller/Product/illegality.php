<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>卖家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css" />
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>
</head>
<body>
 <template file="Seller/common/_header.php" />
    <!--sellercent_wrap卖家中心通用     scindex卖家中心首页-->
    <div class="container sellercenter_wrap scindex">
        <template file="Seller/common/_left.php" />
    <div class="wraprt">
    	<div class="scenterstatus"></div>
        <div class="producttag">
        	我是卖家>宝贝管理>违规宝贝
            <p><strong>?</strong><a href="">查看帮助</a></p>
        </div>
        <div class="productillegality_sear">
        	<ul class="head">
            	<li <if condition="!$Think.get.StateType || ($Think.get.illegalityType == 1 && $Think.get.StateType == 10)">class="on"</if> ><a href="{:U('illegality?illegalityType=1&StateType=10')}">违规的宝贝></a></li>
            	<li <if condition="$Think.get.illegalityType == 1 && $Think.get.StateType == 13">class="on"</if> ><a href="{:U('illegality?illegalityType=1&StateType=13')}">下架的宝贝></li>
            </ul>
        </div>
        <div class="productsell_record productillegality_record">
            <ul class="head">
            	<li>宝贝名称</li>
                <li>审核时间</li>
                <li class="on">违规原因</li>
                <li>操作</li>
            </ul>
            <form id="listItems"  method="post">
            <div class="title">
                <i data-chklistname="prolist" class="bindchk chklist chkall" data-forchkname="chkall1"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></i> <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="chkall1"  name="chkall1"  >
                    <span class="chose" onClick="selectall('chkprolist[]');">全选</span>
                <!--<input type="button" value="恢复到仓库" data-action="{:U('recover')}" onclick="submitaction(this)">-->
            </div>
            </form>
            <volist name="lists" id="vo">
            <ul class="list">
            <li> <i  data-chklistname="prolist" class="bindchk chklist" data-forchkname="chkprolist{$vo.id}"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></i>
               <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="chkprolist{$vo.id}"  name="chkprolist[]" value="{$vo.id}" >{$vo.id}
                        <img src="{$vo.headpic}" class="pic">
                        <div class="instruction">
                            <p>
                                {$vo.title}
                            </p>
                        </div>
                    </li>
            	<li>
            	    <p>{$vo.audittime|date="Y-m-d",###}</p>
                    <p>{$vo.audittime|date="H:i",###}</p>
            	</li>
            	<li>
            	       <volist name='vo.ill_reason' id='reason' mod='2'>
                    <eq name="mod" value="0">{$reason}，</eq>
                    <eq name="mod" value="1">备注：{$reason}<br/></eq>
                    </volist>
            	    <!--<p class="look">产品名称出现违反《新广告法》<br><a href="">查看</a></p>-->
            	</li>
            	<li> <p><a href="{:U('edit',  array('id' => $vo['id']))}">编辑宝贝</a></p>
            	     <p><a href="{:U('delete',array('id' => $vo['id']))}">删除宝贝</a></p>
            	</li>
            </ul>
            </volist>
            <div class="end">
               <if condition="$pageinfo.page !=''">{$pageinfo.page}<a href="#" class="jump">确定</a></if>
            </div>
        </div>
        <div class="productcall">如有疑问，请拨打400客服电话进行咨询</div>
    </div>
    <div class="clear"></div>
</div>



 <template file="Seller/common/_footer.php" />   
</body>
</html>

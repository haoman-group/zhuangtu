<!doctype html>
<html>
<head> 
    <meta charset="utf-8">
    <title>装途网-申请开店</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
</head>
<body>
<template file="common/_header.php"/>
<!--中部-->
<div class="seller_reg_process_ul">
    <ul>
        <li >
            <em></em>
            <span>1.商家注册</span>
        </li>
        <li class="on">
            <em></em>
            <span>2.申请开店</span>
        </li>
        <li >
            <em></em>
            <span>3.绑定银行卡</span>
        </li>
        <li>
            <em></em>
            <span>4.资质审核</span>
        </li>
        <li>
            <em></em>
            <span>5.创建店铺</span>
        </li>
        <li>
            <em></em>
            <span>6.店铺上线</span>
        </li>
    </ul>
</div>
<!--内容-->
<!--保护容器-->
<div class="container ">
     <div class="seller_main seller_setshop">
          <div class="rule">
              <p>1. 装途网以满足消费者透明化购买家装产品和服务的需求，和帮助商户适应市场变化的角度出发为商户在装途网建立店铺，与商户共同为消费者提供优质家装商品和服务。</p>
              <p>2. 店铺的种类分为设计师、工人、建材、家居和家电五种类别，每种类别下面有专营店、专卖店和旗舰店三种类型，商户根据自身条件申请店铺的类别和类型。</p>
              <P>3.新招商标准于2016年5月1日开始执行，调整的详细内容，请参见同期更新的《装途网商家FAQ》。</P>
              <p>4.商家经营期间如需添加新店铺或更改店铺类型，新店铺和店铺类型变更的标准按照新招商标准执行。</p>
              <p class="zhu">注: 装途网招商政策会根据消赞者需求和装途网市场各品类的结构在合适的时间里进行更新，更新的内容会在装途网招商频道进行公示，您也可以拨打客服 400-003-3030 咨询。</p>


          </div>
               <ul class="chtitul" data-tag="chshopcate"> 
                   <volist name="category" id="vo">
                       <li class="chtitli" data-v="{$vo.id}">{$vo.name}

                       </li>
                   </volist>
<!--                   <div class="prompt">-->
<!--                       <span>设计师</span>-->
<!--                       <span>工长 水工 电工 瓦工 木工 油工</span>-->
<!--                       <span>大家电 生活电器 厨房电器  智能设备 影音电器</span>-->
<!--                       <span>板式家具  实木家具 欧美家具 沙发  定制衣柜 家纺家饰 摆画</span>-->
<!--                       <span>卫浴  瓷砖  地板 门  橱柜 灯饰 壁纸 油漆 硅藻泥 散热器 五金开关 窗帘 水槽 地漏</span>-->
<!--                   </div>-->
               </ul>

          <div class="content chconul" data-tag="chshopcate">
            <volist name="category" id="vo">
              <div class="content_ul chconli" <neq name="i" value="1">style="display:none;"</neq>>
                <volist name="vo[son]" id="v">
                   <div class="content_li" >
                        <div class="name">
                             {$v.name}
                        </div>
                        <div class="type" data-v="{$v.id}">
                             {$v.shopname}
                        </div>
                        <div class="explain">
                             {$v.introduce}
                        </div>
                   </div>
                </volist>
              </div>
            </volist>
              
          </div>
          <form id="form_cate" action="{:U('shop_cate')}" method="post">
        <input type="hidden" name="shopcate1" value="1">
                <input type="hidden" name="shopcate2" value="6">
          </form>
          <div class="bottom">
               <a href="javascript:$('#form_cate').submit()">继续入驻装途网</a>
               <a href="">取消</a>
          </div>
        <div class="tis">开店过程中如有疑问，请拨打400-003-3030咨询</div>
     </div>
</div>
<template file="common/_footer.php"/>
<script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
<script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
<script src="{$config_siteurl}statics/zt/js/base.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
<script type="text/javascript">
    var seller_setshop_ul=new Array();
    seller_setshop_ul[0]="url({$config_siteurl}statics/zt/images/Seller_MainCon2li11.png)";
    seller_setshop_ul[1]="url({$config_siteurl}statics/zt/images/Seller_MainCon2li12.png)";
    seller_setshop_ul[2]="url({$config_siteurl}statics/zt/images/Seller_MainCon2li13.png)";
    seller_setshop_ul[3]="url({$config_siteurl}statics/zt/images/Seller_MainCon2li14.png)";
    seller_setshop_ul[4]="url({$config_siteurl}statics/zt/images/Seller_MainCon2li15.png)";
    $(document).ready(function(){
      /*店铺类型*/
        $(".chtitli").mouseenter(function(){
            var dadv = ($(this).attr('data-v'));
            $(".prompt span").eq(dadv-1).show().siblings().hide();

        });
        $(".chtitli").mouseleave(function(){
//           var dadv = ($(this).attr('data-v'));
            $(".prompt span").hide()

        });


      $(".seller_setshop .content_li").mouseenter(function(){
        $(this).css("background-color","#ffffff");
        //$(this).find(".explain").height("auto");
        })
      $(".seller_setshop .content_li").mouseleave(function(){
        $(this).css("background-color","#f0f0f0");
        //$(this).find(".explain").height(108);
        })
      /*店铺选择*/
      $(".seller_setshop ul li:eq(0)").css("background-image",seller_setshop_ul[0]);
      $(".seller_setshop ul li").click(function(){
        var seller_setshop_ul_li=$(this).index(".seller_setshop ul li");
        $(".seller_setshop ul li:eq(0)").css("background-image","url({$config_siteurl}statics/zt/images/Seller_register02MainCon2li01.png)");
        $(".seller_setshop ul li:eq(1)").css("background-image","url({$config_siteurl}statics/zt/images/Seller_register02MainCon2li02.png)");
        $(".seller_setshop ul li:eq(2)").css("background-image","url({$config_siteurl}statics/zt/images/Seller_register02MainCon2li03.png)");
        $(".seller_setshop ul li:eq(3)").css("background-image","url({$config_siteurl}statics/zt/images/Seller_register02MainCon2li04.png)");
        $(".seller_setshop ul li:eq(4)").css("background-image","url({$config_siteurl}statics/zt/images/Seller_register02MainCon2li05.png)");
          $(".seller_setshop ul li:eq("+seller_setshop_ul_li+")").css("background-image",seller_setshop_ul[seller_setshop_ul_li]);
        })
      $(".seller_setshop .content_li .type:eq(0)").css("background-color","#c8000b");
      $(".seller_setshop .content_li .type").click(function(){
        $(".seller_setshop .content_li .type").css("background-color","#888");
        $(this).css("background-color","#c8000b");
        })
    
    
    $("[data-tag='chshopcate'] .chtitli").click(function(){
    	$("[name='shopcate1']").val($(this).attr("data-v"));
		var index=$("[data-tag='chshopcate'] .chtitli").index(this);
		$("[data-v='"+$("[name='shopcate2']").val()+"']").css("background-color","#888");
		var $type=$("[data-tag='chshopcate']").eq(1).find(".chconli").eq(index).find(".type").eq(0);
		$type.css("background-color","#c8000b");
		$("[name='shopcate2']").val($type.attr("data-v")); 
    })
    $("[data-tag='chshopcate'] .type").click(function(){
    	$("[name='shopcate2']").val($(this).attr("data-v"));  
    })
    })
</script>               
</body>
</html>
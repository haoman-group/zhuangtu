        <div class="bcentermenu">
        	<dl>
            	<dt><a href="{:U('Buyer/Index/index')}">买家中心</a></dt>
            </dl>
            <dl>
            	<dt><a href="javascript:;">账户管理</a></dt>
                <dd><a href="{:U('Buyer/User/security')}">安全设置</a></dd>
                <dd><a href="{:U('Buyer/User/profile')}">个人资料</a></dd>
                <dd><a href="{:U('Buyer/User/shipAddr')}">收货地址</a></dd>
            </dl>
            <dl>
            	<dt><a href="{:U('Buyer/Cart/index')}" target="_blank">我的购物车</a></dt>
            </dl>
            <dl>
            	<dt><a href="{:U('Buyer/Order/index')}">已买到的宝贝</a></dt>
            </dl>
            <dl>
                <dt><a href="{:U('Buyer/AccountBook/index')}">装修账本</a></dt>
            </dl>
             <dl hidden>
                <dt><a href="{:U('Buyer/User/directRoom')}">直播间</a></dt>
            </dl>
            <dl hidden>
              <dt><a href="{:U('Buyer/User/message')}">我的消息</a></dt>
            </dl>

            <dl>
            	<dt><a href="{:U('Buyer/User/BuyingShop')}">购买过的店铺</a></dt>
            </dl>
            <dl>
            	<dt><a href="{:U('Buyer/User/footprint')}">我的足迹</a></dt>
            </dl>
            <dl>
            	<dt><a href="{:U('Buyer/User/collection')}">我的收藏</a></dt>
            </dl>
            <dl>
            	<dt><a href="{:U('Buyer/User/myComment')}">我的评价</a></dt>
            </dl>
            <dl>
            	<dt><a href="{:U('Buyer/Order/refundlist')}">退款维权</a></dt>
            </dl>
                        <!-- <dl>
              <dt><a href="">我的积分</a></dt>
            </dl> -->
<!--             <dl>
              <dt><a href="">找邻居</a></dt>
            </dl> -->
        </div>


<script>
    $(function(){
       /*左侧目录*/

        $(".bcentermenu dt").click(function(){
            $(".bcentermenu dl").removeClass("on");
            $(this).next("dd").length && $(this).parent().toggleClass("on");

        });
        $(".bcentermenu dl dt a:not([href='javascript:void(0)'])").click(function(){
            var index=$(this).closest("dl").index();
            $.cookie("memnavon",index,{expires:30,path:"/"});
        })
        if(!!$.cookie("memnavon")){
            // console.log($.cookie("memnavon"));
            //$(".bcentermenu dl").eq($.cookie("memnavon")).addClass("on");
            // if($.cookie("memnavon") == 1){
            //     // console.log($(".bcentermenu dl").eq(1).find("dt").children("a").attr("href"));
            //     $(".bcentermenu dl").eq(1).find("dt").children("a").attr("href",$(".bcentermenu dd").eq($.cookie("selected")).find("a").attr("href"));

            // }

        }

        $(".bcentermenu").find("[href='"+window.location.href+"']").closest("dl").addClass("on");
        $(".buyercenter_title").find("[href='"+window.location.href+"']").parent().addClass("on");


        $(".bcentermenu dd").click(function(){
            $(this).find("a").toggleClass("selected");
            var index = $(this).index()-1;
            $.cookie("selected",index,{expires:30,path:"/"});
        })
        if(!!$.cookie("selected")){
            // console.log($.cookie("selected"));
            // if($.cookie("selected") !== 0){
            //     $(".bcentermenu dd").eq(0).find("a").removeClass("selected");
            // }

            $(".bcentermenu dd").find("a").removeClass("selected");
            $(".bcentermenu dd").eq($.cookie("selected")).find("a").addClass("selected");
        }


    })
</script>

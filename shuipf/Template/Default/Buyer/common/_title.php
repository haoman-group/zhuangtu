	<div class="buyercenter_title">
    	<ul>
        	<li><a href="{:U('Buyer/Index/index')}">首页</a></li>
        	<li><a href="{:U('Buyer/User/security')}">账户管理</a></li>
        	<li><a href="{:U('Buyer/Cart/lists')}" target="_blank">购物车</a></li>
        	<li><a href="{:U('Buyer/Order/index')}">已买到宝贝</a></li>
        	<li><a href="">装修账本</a></li>
        	<li><a href="{:U('Buyer/User/directRoom')}">直播间</a></li>
        	<li><a href="">我的信息</a></li>
        </ul>
    </div>
    <script>
        $(function(){
           /*title目录*/
            $(".buyercenter_title li").click(function(){
                //$(this).toggleClass("on");
            });
            $(".buyercenter_title li").click(function(){
                var index=$(this).closest("li").index();
                $.cookie("memnavon",index,{expires:30,path:"/"});
            })
            if(!!$.cookie("memnavon")){
                //$(".buyercenter_title li").eq($.cookie("memnavon")).addClass("on");
            }
        })
    </script>
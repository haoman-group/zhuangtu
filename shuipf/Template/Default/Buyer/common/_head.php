	<div class="buyercenter_title">
    	<ul>
        	<li><a href="{:U('Buyer/Index/index')}">首页</a></li>
        	<li><a href="{:U('Buyer/User/security')}">账户管理</a></li>
        	<li><a href="{:U('Buyer/Cart/lists')}" target="_blank">购物车</a></li>
        	<li><a href="{:U('Buyer/Order/index')}">已买到宝贝</a></li>
        	<li><a href="{:U('Buyer/AccountBook/index')}">装修账本</a></li>
            <li><a href="{:U('Buyer/User/directRoom')}">直播间</a></li>
        	<li><a href="">我的信息</a></li>
        </ul>
    </div>
	<div class="wraplt">
    	<div class="menuexplain">
            <div class="user_area">
                <img src="{:getavatar($uid)}" alt="">
                <p class="name">{$username}</p>
                <p><a href="javascript:void(0)" class="neighbor">找邻居</a></p>
            </div>
        	<!-- <span class="name">{$username}</span> -->
            <!-- <span class="grade"></span> -->
            <!-- <a href="javascript:void(0)" class="neighbor">找邻居</a> -->
            <div class="safe">
            	<span>账户安全等级</span>
                <span class="degree">
                	<p></p>
                </span>
            </div>
        </div>
        <template file="Buyer/common/_left.php"/>
    </div>


    <script>
        $(function(){
           /*title目录*/
            $(".buyercenter_title li").click(function(){
                $(this).toggleClass("on");
            });
            $(".buyercenter_title li").click(function(){
                var index=$(this).closest("li").index();
                $.cookie("memnavon",index,{expires:30,path:"/"});
            })
            if(!!$.cookie("memnavon")){
                // console.log($.cookie("memnavon"));
                //$(".buyercenter_title li").eq($.cookie("memnavon")).addClass("on");
            }
        })
    </script>

<div class="popup popup-dh pubpop" >

    <div class="my-info-dialog"  >
        <h2 class="my-info-hd">我的装途</h2>

        <div class="my-info-bd">
            <p class="mui-flex">

                <a class="cell tmall-app">
                    装途客户端
                </a>
                <a class="cell new-people centera buy-cart chkappact" href="/wap/cart/index/" data-apptag="cart">
                    购物车
                </a>
                <a class="cell  all-order chkappact" href="/wap/order/" data-apptag="orderlist">
                    全部订单
                </a>
            </p>
        </div>
        <a href="#" class="my-info-close close-popup" target="_self">x</a>
    </div>
    <div class="my-info-mask" ></div>
</div>

<div class="popup popuplogin pubpop" id="popuplogin">
<!--    <div class="poploginbox poploginbox">-->
<!--        <div class="boxtit">-->
<!--            用户登录-->
<!--            <span class="close-popup btnclose">x</span>-->
<!--        </div>-->
<!--        <form class="logininput">-->
<!--            <ul class="ulpoplogin">-->
<!--                <li>-->
<!--                    <input type="text" name="loginname" placeholder="邮箱/手机号/用户名"/>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <input type="password" name="password" class="passw" placeholder="密码"/>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <i class="error">登录失败：账号或密码错误！</i>-->
<!--            <button class="login btnlogin">登录</button>-->
<!--            <button class="btnwxlogin" onclick="window.location.href='{:U('Wap/Wechat/login')}'">微信登录(暂无装途账号)</button>-->
<!--            <div class="wxloginout"><a class="external" href="{:U('Wap/Wechat/login')}">微信登录(暂无装途账号)</a></div>-->
<!--            <div class="accounts">-->
<!--                <a href="/wap/buyer/reg">还没有账号?<span  class="dianreg close-popup">点击注册</span></a>-->
<!--                <a href="#">忘记密码?</a>-->
<!--            </div>-->
<!--        </form>-->
<!--    </div>-->


    <div class="log_con newlog_con content-block  ">
        <h1 class="boxtit">用户登录<span class="close-popup btnclose">x</span></h1>
        <form class="logininput">
            <ul class="logininpbox ulpoplogin">
                <li class="txt">
                    <input type="text" name="loginname" placeholder="邮箱/手机号/用户名"/>
                </li>
                <li class="txt">
                    <input type="password" name="password" class="passw" placeholder="密码"/>
                </li>
            </ul>

        <i class="error">登录失败：账号或密码错误！</i>
        <button class="login btnlogin">登录</button>
        <div class="wechat" >
            <p><span>其他方式登陆</span></p>
            <a class="external awxloginout" href="http://www.zhuangtu.net/Wap/Wechat/login.html"></a>
        </div>
        <div class="accounts">
            <a href="/wap/buyer/reg">还没有账号?<span  class="dianreg close-popup">点击注册</span></a>
<!--            <a href="/wap/Buyer/retpassword">忘记密码?</a>-->
        </div>
        </form>
    </div>
</div>

<script>


    var cookieDays = 30;
    var cookieExp = new Date();
    cookieExp.setTime(cookieExp.getTime() + cookieDays*24*60*60*1000)

    if(typeof(JSInterFace) !== "undefined"  ){
        document.cookie = "apptype = android;expires=" + cookieExp.toGMTString();

        window.alert = function(str){
            JSInterFace.appAlert(str);
        }
    }


</script>

<script type="text/javascript" src="//g.alicdn.com/sj/lib/zepto/zepto.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js" charset="utf-8"></script>
<script src="{$config_siteurl}statics/wap/js/sm-extend.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>


<script src="{$config_siteurl}statics/wap/js/common.js"></script>

<script>

    var sharecon = {"title":"装途网","link":window.location.href ,"imgUrl":"/statics/wap/images/shareicon.png","desc":"装家就上装途网"};

    wx.config({
        debug: false,
        appId: '{$sign['appId']}',
        timestamp: '{$sign['timestamp']}',
        nonceStr: '{$sign['nonceStr']}',
        signature: '{$sign['signature']}',
        jsApiList: [
            'onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareQZone'
        ]
    });

    wx.ready(function () {
        reshare();

    });

    wx.error(function(res){
        console.log(res);
// config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
    });


    function reshare(){
        wx.onMenuShareTimeline({
            title: sharecon.title, // 分享标题
            link: sharecon.link, // 分享链接
            imgUrl: sharecon.imgUrl, // 分享图标
            success: function () {

            },
            cancel: function () {

            }
        });
        wx.onMenuShareAppMessage({
            title: sharecon.title, // 分享标题
            link: sharecon.link, // 分享链接
            imgUrl: sharecon.imgUrl, // 分享图标
            desc: sharecon.desc, // 分享描述
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });

        wx.onMenuShareQQ({
            title: sharecon.title, // 分享标题
            link: sharecon.link, // 分享链接
            imgUrl: sharecon.imgUrl, // 分享图标
            desc: sharecon.desc, // 分享描述
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
        wx.onMenuShareQZone({
            title: sharecon.title, // 分享标题
            link: sharecon.link, // 分享链接
            imgUrl: sharecon.imgUrl, // 分享图标
            desc: sharecon.desc, // 分享描述
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
    }
</script>

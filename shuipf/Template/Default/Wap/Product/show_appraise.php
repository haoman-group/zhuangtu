<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>宝贝评价页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/wap/css/appindex.css" >
</head>
<body>


<div class="page-group">
    <div class="page page-current" id="pageappraise" data-domain="{:I('id')}">

        <div class="content">
            <div class="module-con appraisenav">
                <div class="shownav_t">
                    <div class="nav_l"><a href="#" class="category"></a></div>
                    <div class="nav_c">
                        <ul>
                            <li><a href="#">商品</a></li>
                            <li><a href="#">详情</a></li>
                            <li><a href="#" class="on">评价</a></li>
                            <li><a href="#">直播间</a></li>
                        </ul>
                    </div>
                    <div class="nav_r"><a href="#" class="category"><img src="/statics/wap/images/show/shopping.png"><span class="quantity">2</span></a></div>
                </div>
            </div>

            <ul class="appraise">
                <li class="on">
                    <span>全部评价</span>
                    <span class="pingjia">3651</span>
                </li>
                <li>
                    <span>追加</span>
                    <span class="superaddition">365</span>
                </li>
                <li>
                    <span>晒图</span>
                    <span>7</span>
                </li>
            </ul>
            <div class="allevalcon">
                <ul class="allevaluation ">
                    <li>
                        <div class="prod_appraise">
                            <div class="appraiselist">
                                <div class="userinfo">
                                    <div class="allstar_l"><div class="star" style="width:80%"></div></div>
                                    <div class="allstar_r"><span class="username">优雅**男子</span><img src="/statics/wap/images/show/identificationicon.png"><span class="times">2016-03-16</span></div>
                                </div>
                                <div class="evalcon">床垫收到了，质量很好，客服态度也特别好，响应很及时。送的床笠质量也很好。一次满意的购物。感谢017和003的热情服务。</div>
                                <ul class="pics">
                                    <li><img src="/statics/wap/images/show/pagination.jpg"></li>
                                </ul>
                            </div>
                            <div class="sku">
                                <p class="pay-date">颜色分类：标准001</p>
                                <p class="product-type">规格：900mm*1900mm</p>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="cart-concern-btm-fixed five-column four-column" >
                    <div class="concern-cart">
                        <a class="cart-car-icn dong-dong-icn">
                            <em class="btm-act-icn"></em>
                            <span class="focus-info">首页</span>
                        </a>
                        <a class="cart-car-icn  cust-car-icn">
                            <em class="btm-act-icn"></em>
                            <span class="focus-info">联系客服</span>
                        </a>
                        <a class="cart-car-icn">
                            <em class="btm-act-icn"></em>
                            <span class="focus-info">店铺</span>
                        </a>
                    </div>
                    <div class="action-list">
                        <a class="yellow-color"> 加入购物车 </a>
                        <a class="red-color">立即购买</a>
                        <a class="yellow-color" style="display: none;">查看相似</a>
                        <a class="red-color">到货通知</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<script type="text/javascript" src="//g.alicdn.com/sj/lib/zepto/zepto.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js" charset="utf-8"></script>
<script src="{$config_siteurl}statics/wap/js/sm-extend.min.js"></script>
<script>
    $(function(){
        $(document).on("pageInit","#pageappraise",function(e,id,page){
            var proid = $(page).attr("id");
            var $domappraise = $(page).clone();
            var $tempdiv= $("<div></div>");
            var $domappraiseli = $(".allevaluation li").eq(0).clone();

            $.ajax({
                type:"POST",
                url: "/Api/Comment/lists/?id="+proid,
//                url: "/Api/Comment/lists/productid/12067.html",
                dataType:"json",
                data: {},
                timeout:5000,
                success: function(data,status){
                    if(data.status === 1){
                        var res=data["data"];
                        console.log(res);
                        $.each(res,function(i,v){
                            $domappraise.find(".pingjia").html(v["type1"]);
                            $domappraise.find(".superaddition").html(v["type"]);
                            $domappraiseli.find(".username").html(v["username"]);
                            $domappraiseli.find(".pics img").attr("src",v["image"]);
                            $domappraiseli.find(".evalcon").html(v["content"]);
                            $domappraiseli.find(".times").html(v["addtime"]);
                            var star =v["star"];
                            star=2.5;
                            $domappraiseli.find(".star").attr("style","width:"+star*20+"%");

                            $tempdiv.append($domappraiseli.prop("outerHTML"));
                        });

                        $domappraise.find(".allevaluation").html($tempdiv.html());


                        $(page).html($domappraise.html());
                    }
                    else{
                        console.log("失败"+data.msg);
                    }
                }
                ,error:function(XHR, textStatus, errorThrown){
                    console.log(textStatus+"\n"+errorThrown);
                }
            });


        });

        $.init();
    });


    function getprourl(proid){return "/wap/product/show/id/"+proid}

</script>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <!-- <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script> -->
    <script type="text/javascript">
      
      var title = "<?php echo $data['title']; ?>";
      var link = "<?php echo U('Shop/Product/show',array('id'=>$data['id'])) ?>";
      var imgUrl = "<?php echo substr($data['headpic'],0,4)=='http'?$data['headpic']:($config_siteurl.$data['headpic']); ?>";
      var desc = "<?php echo $data['idea']; ?>";

      wx.config({
          debug: false,
          appId: '{$sign['appId']}',
          timestamp: {$sign['timestamp']},
          nonceStr: '{$sign['nonceStr']}',
          signature: '{$sign['signature']}',
          jsApiList: [
            'onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareQZone'
          ]
      });

      wx.ready(function () {
      
        wx.onMenuShareTimeline({
            title: title, // 分享标题
            link: link, // 分享链接
            imgUrl: imgUrl, // 分享图标
            success: function () { 
                
            },
            cancel: function () { 
                
            }
        });
        wx.onMenuShareAppMessage({
            title: title, // 分享标题
            link: link, // 分享链接
            imgUrl: imgUrl, // 分享图标
            desc: desc, // 分享描述
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
            title: title, // 分享标题
            link: link, // 分享链接
            imgUrl: imgUrl, // 分享图标
            desc: desc, // 分享描述
            success: function () { 
               // 用户确认分享后执行的回调函数
            },
            cancel: function () { 
               // 用户取消分享后执行的回调函数
            }
        });
        wx.onMenuShareQZone({
            title: title, // 分享标题
            link: link, // 分享链接
            imgUrl: imgUrl, // 分享图标
            desc: desc, // 分享描述
            success: function () { 
               // 用户确认分享后执行的回调函数
            },
            cancel: function () { 
                // 用户取消分享后执行的回调函数
            }
        });
    });
    </script>

</body>
</html>


















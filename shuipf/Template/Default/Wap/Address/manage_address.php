<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>收货地址-装途网</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{$config_siteurl}statics/wap/images/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/wap/css/address.css" >
</head>
<body>

<div class="page-group">
    <div class="page page-current">
        <header class="bar bar-nav address-bar">
            <a class="button button-link button-nav pull-left address-button" href="" data-transition='slide-out'>
                <span class="icon icon-left address-icon"></span>
                <span>管理收货地址</span>
            </a>            
        </header>

        <div class="content content-address">
          <div class="address-container">
            <div class="wap-address">
              <div class="card card-address">
                  <div class="card-header address-header">
                     <span class="address-name">李丽华</span><span class="address-phone">186****1020</span>
                  </div>
                  <div class="card-content">
                     <div class="card-content-inner address">山西 太原市 万柏林区 长风街道长风桥西万国城长风16号15A04</div>
                  </div>
                 <div class="card-footer address-footer">
                     <label class="label-checkbox item-content label-address">
                           <input type="radio" name="my-radio">
                           <div class="item-media"><i class="icon icon-form-checkbox icon-color"></i></div>
                     </label>
                     <!-- <span class="on"><img src="{$config_siteurl}statics/wap/images/rightbwhite.png"></span> -->
                     <span class="default"><!-- <input type="radio" name="default"> -->设为默认地址</span>
                     <span class="edit-area"><a href="" class="delete">删除</a>|<a href="" class="edit">编辑</a></span>                   
                 </div>
              </div>
            </div>
            <div class="wap-address">
              <div class="card card-address">
                  <div class="card-header address-header">
                     <span class="address-name">李丽华</span><span class="address-phone">186****1020</span>
                  </div>
                  <div class="card-content">
                     <div class="card-content-inner address">山西 太原市 万柏林区 长风街道长风桥西万国城长风16号15A04</div>
                  </div>
                 <div class="card-footer address-footer">
                     <label class="label-checkbox item-content label-address">
                           <input type="radio" name="my-radio">
                           <div class="item-media"><i class="icon icon-form-checkbox icon-color"></i></div>
                     </label>
                     <!-- <span><img src="{$config_siteurl}statics/wap/images/rightbwhite.png"></span> -->
                     <span class="default"><!-- <input type="radio" name="default"> -->设为默认地址</span>
                     <span class="edit-area"><a href="" class="delete">删除</a>|<a href="" class="edit">编辑</a></span>                   
                 </div>
              </div>
            </div>
          </div>

          <div class="add-address">
              <a href="">增加收货地址</a>
          </div>
        </div>

    </div>
</div>

<script type="text/javascript" src="//g.alicdn.com/sj/lib/zepto/zepto.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js" charset="utf-8"></script>
<script src="{$config_siteurl}statics/wap/js/sm-extend.min.js"></script>
<script>
    $(function(){
        $(".wap_cart .list li").each(function(){
            var $li = $(this);
            var $input = $li.find("input");
            var $span = $li.find("td").eq(2).find("span");
            $input.val($input.attr("data-num"));
            $span.click(function(){
                var span = parseInt($(this).attr("data-span"));
                var num = parseInt($input.val())+span;
                if( num < 1){ num = 1;}
                $input.val(num);
            })
        })


        $("tr td:nth-of-type(1) span").click(function(){
            $(this).toggleClass("on");
        })



        var paybottom = parseInt($(".wap_cart .pay").attr("data-fixed"));
        $(".wap_cart .pay").css("bottom",paybottom);
        var contentpadbot = paybottom+$(".wap_cart .pay").height();
        $(".content").css("padding-bottom",contentpadbot);

        $(".openpopup").click(function(){
            var $self = $(this);
            var popup = $self.attr("data-openpopup");
            //console.log(popup);
            $.popup(".popup[data-popup='" + popup + "']");
            var $fixwhitebox = $("[data-popup='" + popup + "']").find(".fixwhitebox");
            var num = 30;
            var height = -$fixwhitebox.height()/2-num;
            $fixwhitebox.css("margin-top",height);
        })



    })
</script>
</body>
<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>确认订单-装途网</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{$config_siteurl}statics/wap/images/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/wap/css/appindex.css" >
</head>
<body>

<div class="page-group">
    <div class="page page-current" id="pageorderconfirm" data-from="{:I('from')}">
        <div class="opcheader headblackbg bar-nav">
            <span class="icon icon-left"></span>
            <h1>确认订单</h1>
            <span class="icon icon-user needlogin openpop"  data-popup=".popup-dh">
               <!--登录-->
            </span>
        </div>


        <div class="content content-address conbttomar">
            <!-- <form action="/Wap/Cart/orderpay" method="post"> -->
            <div class="wap-address confirmaddr">
                <div class="delivsel">
                    <eq name='Think.get.from' value='qrcode'>
                        <a class="isziti on" >自提</a> <a>商家送货</a>
                    <else/>
                        <a class="isziti" >自提</a> <a class="on">商家送货</a>
                    </eq>
                </div>


                <a href="#pageaddrlist" class="atoseladdr"  <eq name='Think.get.from' value='qrcode'>style="display:none"</eq>  >
                    <if condition="$addrlist['default'] eq 1">
                        <div class="card card-address select-address" data-addrid="<empty name='addrlist.id' >0<else/>{$addrlist.id}</empty>">
                            <div class="card-header address-header">
                                <span class="address-name">{$addrlist.name}</span><span class="address-phone">{$addrlist.phone}</span>
                            </div>
                            <div class="card-content select-content">
                                <div class="card-content-inner address select-addres give">{$addrlist.zone}{$addrlist.address}</div>
                            </div>
                            <span class="lefts"></span>
                        </div>
                    <else/>
                        <div class="card card-address select-address" data-addrid="">
                            <div class="linktoaddaddr">选择收货地址</div>
                        </div>
                    </if>
                </a>

            </div>
            <ul class="ulorderconfirm" id="listorderconfirm">
                <volist name="cartlist" id="vo">
                <li class="itemli">

                    <dl>
                        <dt><img src="/statics/wap/images/heart.png"/>{$vo.shop.name}</dt>
                        <volist name="vo['cart']" id="v">
                        <dd data-cartid="{$v.id}">
                            <a href="javascript:void(0)" class="dda">
                                <div class="ltbox">
                                    <div class="square">
                                        <img src="{$v.product.headpic}">
                                    </div>
                                </div>
                                <div class="rtbox">
                                    <div class="price">￥{$v[total]}</div>
                                    <div class="num">x{$v.num}</div>
                                </div>
                                <div class="cenbox">
                                    <div class="tit">{$v.product.title}</div>
                                    <div class="proty">
                                        <volist name="v[product][provalue]" id="provalue">
                                            <?php if($key=='price'|| $key=='price_act') break; ?>
                                            {$key}：{$provalue['txt']}<br/>
                                        </volist>
                                    </div>
                                    <div class="promise">
                                        <!--<span>七天退换</span>-->
                                    </div>

                                </div>

                            </a>
                        </dd>
                        </volist>

                    </dl>

                    <ul class="addons list-block fangshi">
<!--                        <li class="item-content">-->
<!--                            <div class="item-inner fangshib">-->
<!--                                <div class="item-title">标准合同</div>-->
<!--                                <div class="item-after">已签订</div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="item-content">-->
<!--                            <div class="item-inner fangshib">-->
<!--                                <div class="item-title">配送方式</div>-->
<!--                                <div class="item-after">-->
<!--                                    <label class="label-checkbox item-content select">-->
<!--                                        <input type="radio" name="my-radio">-->
<!--                                        <div class="item-media  itmdi"><i class="icon icon-form-checkbox icon-color"></i></div>-->
<!--                                    </label>-->
<!--                                    买家自提-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="item-content">-->
<!--                            <div class="item-inner fangshib">-->
<!--                                <div class="item-title">安装</div>-->
<!--                                <div class="item-after">-->
<!--                                    <label class="label-checkbox item-content select">-->
<!--                                        <input type="radio" name="my-radio">-->
<!--                                        <div class="item-media  itmdi"><i class="icon icon-form-checkbox icon-color"></i></div>-->
<!--                                    </label>-->
<!--                                    卖家安装</div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="item-content">-->
<!--                            <div class="item-inner fangshib">-->
<!--                                <div class="item-title">工人保险</div>-->
<!--                                <div class="item-after">￥0.00</div>-->
<!--                            </div>-->
<!--                        </li>-->
                        <li class="item-content">
                            <p class="words"><input type="text" placeholder="买家留言：选填，可填写您与卖家达成一致的要求"></p>
                        </li>
                    </ul>
                </li>
                </volist>

                <ul class="addons list-block fangshi">
                    <li class="item-amountto">
                        <div class="amount_div">
                            <span class="aleft">合计：￥{$total}</span>
                            <span class="aright">实付款：￥{$total}</span>
                        </div>
                    </li>
                </ul>
            </ul>
        </div>





        <div class="add-address content-block dingdana">
            <!-- <input name="cartid" value="{$cartid}" hidden> -->
            <a   class="create-dingdan needlogin">提交订单</a>
        <!-- </form> -->
        </div>


    </div>

    <div class="page" id="pageaddrlist">
        <header class="bar bar-nav address-bar">
            <a class="button button-link button-nav pull-left address-button back" href="" data-transition='slide-out'>
                <span class="icon icon-left address-icon"></span>
                <span>选择收货地址</span>
            </a>
        </header>
        <div class="content content-address">
            <div class="add-address content-block btntoaddaddr">
                <a class="create-popup open-popup" data-popup=".popup-addressadd">增加收货地址</a>
            </div>
        </div>
    </div>



    <div class="popup popup-addressadd norpopup popunderhead" id="popup-addressadd">
        <div class="content-block">
            <span class="close-popup btnclose">x</span>
            <!-- <header class="bar bar-nav address-bar">
                <a class="button button-link button-nav pull-left address-button" href="" data-transition="slide-out">
                    <span class="icon icon-left address-icon"></span>
                    <span>管理收货地址</span>
                </a>
            </header> -->
            <div class="content address-content">
                <div class="list-block list-address">
                    <form name="" id="form_addr">
                        <ul>
                            <li>
                                <div class="item-content item-address">
                                    <div class="item-media"><i class="icon icon-form-name"></i></div>
                                    <div class="item-inner address-inner">
                                        <div class="item-title label address-label">收货人姓名：</div>
                                        <div class="item-input">
                                            <input type="text" placeholder="" value="" id="name" name="name">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-content item-address">
                                    <div class="item-media"><i class="icon icon-form-email"></i></div>
                                    <div class="item-inner address-inner">
                                        <div class="item-title label address-label">联系方式：</div>
                                        <div class="item-input">
                                            <input type="text" placeholder="" value="" id="phone" name="phone">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-content item-address">
                                    <div class="item-media"><i class="icon icon-form-password"></i></div>
                                    <div class="item-inner address-inner">
                                        <div class="item-title label address-label">所在区域：</div>
                                        <div class="item-input">
                                            <!-- <input type="text" placeholder="" id="area" value="" name="area"> -->
                                            <select name="area" id="area" class="city">
                                                <!-- <option value="尖草坪区"></option>
                                                <option value="杏花岭区"></option>
                                                <option value="迎泽区"></option> -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-content item-address">
                                    <div class="item-media"><i class="icon icon-form-password"></i></div>
                                    <div class="item-inner address-inner">
                                        <div class="item-title label address-label">详细地址：</div>
                                        <div class="item-input">
                                            <input type="text" placeholder="" class="" value="" id="address" name="address">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-content item-address">
                                    <div class="item-media"><i class="icon icon-form-password"></i></div>
                                    <div class="item-inner address-inner">
                                        <div class="item-title label address-label">邮政编码：</div>
                                        <div class="item-input">
                                            <input type="text" placeholder="" class="" value="" id="ems" name="postcode">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
                <p><a class="close-address btnsaveaddr">保存并使用</a></p>
            </div>
        </div>
    </div>


    <div class="popup popup-payway norpopup" style="top:40%;" id="popup-payway" >
        <div class="content-block payallc">
            <p class="ptop_a"><a href="#" class="popx confirm-ok"></a>付款详情</p>
            <div class="paycon">
                <div class="card-content wechat">
                    <div class="list-block media-list fangshi">
                        <ul>
                            <a class="btntoface on" data-href="/wap/order/">
                                <li class="item-content alipay">
                                    <div class="item-media">
                                        <img src="/statics/wap/images/paytoface.png" width="44">
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title">当面付</div>
                                        </div>
                                        <div class="item-subtitle">POS机等当面支付</div>
                                    </div>
                                </li>
                            </a>
                            <a class="btntowxpay external">
                                <li class="item-content">

                                    <div class="item-media">
                                        <img src="/statics/wap/images/wechat.png" width="44">
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title">微信支付</div>
                                        </div>
                                        <div class="item-subtitle">推荐安装微信5.0及以上版本的使用</div>
                                    </div>

                                </li>
                            </a>
                            <a class="btntoalipay external">
                            <li class="item-content alipay">
                                <div class="item-media">
                                    <img src="/statics/wap/images/alipay.png" width="44">
                                </div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-title">支付宝</div>
                                    </div>
                                    <div class="item-subtitle">推荐有支付宝账号的用户使用</div>
                                </div>
                            </li>
                            </a>
                            <a class="btntoyinlian external" href="#" >
                                <li class="item-content alipay">
                                    <div class="item-media">
                                        <img src="/statics/wap/images/yinlian.png" width="44">
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title">银联支付</div>
                                        </div>
                                        <div class="item-subtitle">支持储蓄卡信用卡，无需开通网银</div>
                                    </div>
                                </li>
                            </a>



                        </ul>
                    </div>
                </div>
            </div>


        </div>
        <div class="paycountbox">
            <div class="tariff">
                <strong>需付款</strong><span>￥{$total}</span>
            </div>
            <a  class="btnconfirmpay">确认付款</a>
        </div>
    </div>

</div>
<template file="Wap/common/_public.php"/>


</body>


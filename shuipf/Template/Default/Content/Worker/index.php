<!doctype html>
<html>
<head> 
    <meta charset="utf-8">
    <title>网购轻工</title>
    <!-- <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/zhd_index.css" type="text/css"/> -->
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/worker.js"></script>
    <style type="text/css">
        body{ font-family: "Microsoft YaHei";}
        .scalebox{ width: 100%; min-width: 1190px; position: relative}
        .scale{ left: 0; width: 100%; position: absolute; top: 0;}
        @media screen and (max-width: 1366px) {.scale{
                transform: scale(1, 0.8);
                -moz-transform: scale(1, 0.8);
                -webkit-transform: scale(1, 0.8);
                -o-transform: scale(1, 0.8);
                transform-origin:50% 0%;
                -moz-transform-origin: 50% 0%;
                -webkit-transform-origin:50% 0%;
                -o-transform-origin:50% 0%;
            }
            .scale .container{
                transform: scale(0.8, 1);
                -moz-transform: scale(0.8, 1);
                -webkit-transform: scale(0.8, 1);
                -o-transform: scale(0.8, 1);
                transform-origin:50% 0%;
                -moz-transform-origin: 50% 0%;
                -webkit-transform-origin:50% 0%;
                -o-transform-origin:50% 0%;
            }
            .wk_team_title:nth-of-type(1) .wk_team_title_img{  top: -50px;  }
        }
    </style>
</head>
<body>
<!--背景容器-->
<template file="common/_top.php"/>
<!--背景容器-->
<div class="conwhole wk_navbgout">
    <div class="conwhole navBg wk_navbg">
        <!--保护容器-->
        <div class="container">
            <a href="{:U('/')}"><img class="left" src="{$config_siteurl}statics/zt/images/logo_orange2.png" /></a>
            <div class="nav_searbox">
                <form class="" action="{:U('Content/Search/search')}" method="get">
                    <input  type="text" autocomplete="off" aria-expanded="false" class="inpsear" placeholder="搜索你喜欢的" name="searchkey" value="{$Think.get.searchkey}">
                    <input  type="text" name="shop_catid" value="2" hidden>
                    <input type="submit" class="btnsear btnsear_worker"  value="" >
                    <!-- <div class="float_border"></div> -->
                </form>
            </div>
            <div class="nav_right">
                <a href="#F1"><b>网购轻工</b></a>
                <a href="#F2"><b>金牌工人</b></a>
                <a href="#F3"><b>网友推荐</b></a>
                <a href="#F4"><b>装途推荐</b></a>
            </div>

        </div>
    </div>
</div>
<div class="scalebox">
<div class="scale">

    <!--网购轻工-->
    <!--背景容器-->
    <div class="conwhole wk_ban" id="F1">
         <!--保护容器-->
         <div class="container">
           <img src="{$config_siteurl}statics/zt/images/worker/worker_content1txt.png" class="wk_banimg" />
         </div>
         <ul>
         <div class="container">
          <li>
              <div class="img"></div>
                <strong>轻工购买</strong>
                <p>分类选工人</p>
                <p>工程按工序收工费</p>
            </li>
          <li>
              <div class="img"></div>
                <strong>装途认证</strong>
                <p>家装好工人</p>
                <p>装途网进行等级认证</p>
            </li>
          <li>
              <div class="img"></div>
                <strong>支付保证</strong>
                <p>工程有问题</p>
                <p>网站72小时后先赔付</p>
            </li>
          <li>
              <div class="img"></div>
                <strong>分步验收</strong>
                <p>装修五大步</p>
                <p>验收团队分步验收</p>
            </li>
          <li>
              <div class="img"></div>
                <strong>装修保险</strong>
                <p>验收通过后</p>
                <p>每步工程都能买保险</p>
            </li>
         </div>
         </ul>
    </div>
    <!--装家工人进场流程-->
    <!--背景容器-->
    <div class="conwhole">
         <!--保护容器-->
        <!--保护容器-->
         <div class="container">
              <div class="wk_process">
                   <div class="wk_process_up">
                   装家工人进场流程
                   </div>
                   <div class="wk_process_down jsaddimgbox" data-jsaddimg="png" data-jsaddimgname="{$config_siteurl}statics/zt/images/worker/worker_content2img">
                        <div class="wk_process_ul">
                             <b>
                                拆卸工
                                <div class="wk_process_li">
                                     <div class="wk_process_li_txt">
                                          Demolition Worker
                                     </div>
                                     <div class="wk_process_li_img">
                                          <a href="{:U('Content/Search/search', array('searchkey'=>'拆除'))}" target="_blank">
                                            <img class="jsaddimgli" src="../images/worker/worker_content2img1.png" />
                                            <img class="jsaddimgli red" src="../images/worker/worker_content2img1.png" />


                                          </a>
                                     </div>
                                </div>
                             </b>
                             <b>
                                水电工
                                <div class="wk_process_li">
                                     <div class="wk_process_li_txt">
                                          Plumbers and electricians
                                     </div>
                                     <div class="wk_process_li_img">
                                          <a href="{:U('Content/Search/search', array('searchkey'=>'水电工'))}" target="_blank">
                                            <img class="jsaddimgli" src="../images/worker/worker_content2img1.png" />
                                            <img class="jsaddimgli red" src="../images/worker/worker_content2img1.png" />


                                          </a>
                                     </div>
                                </div>
                             </b>
                             <b>
                                铺地瓦工
                                <div class="wk_process_li">
                                     <div class="wk_process_li_txt">
                                          Flooring worker
                                     </div>
                                     <div class="wk_process_li_img">
                                          <a href="{:U('Content/Search/search', array('searchkey'=>'瓦工'))}" target="_blank">
                                            <img class="jsaddimgli" src="../images/worker/worker_content2img1.png" />
                                            <img class="jsaddimgli red" src="../images/worker/worker_content2img1.png" />


                                          </a>
                                     </div>
                                </div>
                             </b>
                             <b>
                                吊顶木工
                                <div class="wk_process_li">
                                     <div class="wk_process_li_txt">
                                          Ceiling woodworking
                                     </div>
                                     <div class="wk_process_li_img">
                                          <a href="{:U('Content/Search/search', array('searchkey'=>'木工'))}" target="_blank">
                                            <img class="jsaddimgli" src="../images/worker/worker_content2img1.png" />
                                            <img class="jsaddimgli red" src="../images/worker/worker_content2img1.png" />


                                          </a>
                                     </div>
                                </div>
                             </b>
                             <b>
                                刮家油工
                                <div class="wk_process_li">
                                     <div class="wk_process_li_txt">
                                          Scraping home oilers
                                     </div>
                                     <div class="wk_process_li_img">
                                          <a href="{:U('Content/Search/search', array('searchkey'=>'油工'))}" target="_blank">
                                            <img class="jsaddimgli" src="../images/worker/worker_content2img1.png" />
                                            <img class="jsaddimgli red" src="../images/worker/worker_content2img1.png" />


                                          </a>
                                     </div>
                                </div>
                             </b>
                        </div>
                   </div>
              </div>
         </div>
    </div>
    <!--装修队-->
    <!--背景容器-->
    <div class="conwhole">
         <!--上部-->
         <div class="wk_team_title">
         <!--保护容器-->
         <div class="container">
              <div class="wk_team_title_img">
                   <img src="{$config_siteurl}statics/zt/images/worker/worker_contentwt.png" />
              </div>
              <div class="wk_team_title_txt">
                   <strong>工长服务</strong>
                   为您提供最贴心的系统装家服务
              </div>
                <img src="{$config_siteurl}statics/zt/images/worker/worker_contentwtex.png" />
         </div>
         </div>
         <!--下部-->
         <div class="worker_box">
              <!--保护容器-->
              <div class="container">
                   <div class="worker_ul">
                        <!--<div class="worker_li">

                            <div class="img"><img src="{$config_siteurl}statics/zt/images/worker/worker_team1.png"></div>
                                <div class="exhibition">
                                     <span class="name">王秀丰</span>
                                     <dl>
                                      <dt>
                                          从业年限：
                                        </dt>
                                        <dd>
                                          14年
                                        </dd>
                                      <dt>
                                          施工小区：
                                        </dt>
                                        <dd class="choose">
                                          高档<em class="on"><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>中档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>低档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>
                                        </dd>
                                      <dt>
                                          施工质量：
                                        </dt>
                                        <dd class="star">
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:50%"></span></li>
                                        </dd>
                                     </dl>
                                     <span class="abuy">立即预约</span>
                                </div>
                                <div class="explain">
                                      <p class="name">邬宗全</p>
                                      <img src="{$config_siteurl}statics/zt/images/worker/worker_teamhead1.png">
                                      <p class="sever">服务价：<strong>240~270</strong>元/m2</p>
                                      <div star>
                                          施工质量：
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:50%"></span></li>
                                      </div>
                                      <p>从业年限：20年</p>
                                      <br>
                                      <p>合作单位：</p>
                                      <p>丽唐装饰、城市人家、新浪抢工长</p>
                                      <br>
                                      <p>施工小区：</p>
                                      <p>奥林滨河花园、绿地三期、西岸南区</p>
                                      <span class="buy">立即预约</span>
                                 </div>
                        </div>-->
                       <!-- <div class="worker_li">

                            <div class="img"><img src="{$config_siteurl}statics/zt/images/worker/worker_team2.png"></div>
                                <div class="exhibition">
                                     <span class="name">王秀丰</span>
                                     <dl>
                                      <dt>
                                          从业年限：
                                        </dt>
                                        <dd>
                                          14年
                                        </dd>
                                      <dt>
                                          施工小区：
                                        </dt>
                                        <dd class="choose">
                                          高档<em class="on"><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>中档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>低档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>
                                        </dd>
                                      <dt>
                                          施工质量：
                                        </dt>
                                        <dd class="star">
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:50%"></span></li>
                                        </dd>
                                     </dl>
                                     <span class="abuy">立即预约</span>
                                </div>
                                 <div class="explain">
                                      <p class="name">邬宗全</p>
                                      <img src="{$config_siteurl}statics/zt/images/worker/worker_teamhead2.png">
                                      <p class="sever">服务价：<strong>240~270</strong>元/m2</p>
                                      <div star>
                                          施工质量：
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:50%"></span></li>
                                      </div>
                                      <p>从业年限：20年</p>
                                      <br>
                                      <p>合作单位：</p>
                                      <p>丽唐装饰、城市人家、新浪抢工长</p>
                                      <br>
                                      <p>施工小区：</p>
                                      <p>奥林滨河花园、绿地三期、西岸南区</p>
                                      <span class="buy">立即预约</span>
                                 </div>
                        </div>-->
                       <!-- <div class="worker_li">
                            <div class="img"><img src="{$config_siteurl}statics/zt/images/worker/worker_team3.png"></div>
                                <div class="exhibition">
                                     <span class="name">王秀丰</span>
                                     <dl>
                                      <dt>
                                          从业年限：
                                        </dt>
                                        <dd>
                                          14年
                                        </dd>
                                      <dt>
                                          施工小区：
                                        </dt>
                                        <dd class="choose">
                                          高档<em class="on"><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>中档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>低档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>
                                        </dd>
                                      <dt>
                                          施工质量：
                                        </dt>
                                        <dd class="star">
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:50%"></span></li>
                                        </dd>
                                     </dl>
                                     <span class="abuy">立即预约</span>
                                </div>
                                 <div class="explain">
                                      <p class="name">邬宗全</p>
                                      <img src="{$config_siteurl}statics/zt/images/worker/worker_teamhead3.png">
                                      <p class="sever">服务价：<strong>240~270</strong>元/m2</p>
                                      <div star>
                                          施工质量：
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:50%"></span></li>
                                      </div>
                                      <p>从业年限：20年</p>
                                      <br>
                                      <p>合作单位：</p>
                                      <p>丽唐装饰、城市人家、新浪抢工长</p>
                                      <br>
                                      <p>施工小区：</p>
                                      <p>奥林滨河花园、绿地三期、西岸南区</p>
                                      <span class="buy">立即预约</span>
                                 </div>
                        </div>-->
                        <volist name="work" id="vo" >
                        <a  href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                        <div class="worker_li">

                            <div class="img"><img src={$vo.picture.0}></div>
                                <div class="exhibition">
                                     <span class="name">{$vo.data.workername}</span>
                                     <dl>
                                      <dt>
                                          从业年限：
                                        </dt>
                                        <dd>
                                         {$vo.data.workyears}年
                                        </dd>
                                      <dt>
                                          施工小区：
                                        </dt>
                                        <dd class="choose">
                                          高档<em class="on"><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>中档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>低档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>
                                        </dd>
                                      <dt>
                                          施工质量：
                                        </dt>
                                        <dd class="star" data-star="{$vo.star}">
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:50%"></span></li>
                                        </dd>
                                     </dl>
                                     <span class="buy">立即预约</span>
                                </div>
                                 <div class="explain">
                                      <p class="name">{$vo.data.workername}</p>
                                      <img src={$vo.picture.1}>
                                      <p class="sever">服务价：<strong><!-- {$vo.data.min_price}~{$vo.data.max_price} --> {$vo.data.min_price}</strong>元/m2</p>
                                      <div class="star" data-star="{$vo.star}">
                                          施工质量：
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:100%"></span></li>
                                          <li><span style="width:50%"></span></li>
                                      </div>
                                      <p>从业年限：{$vo.data.workyears}年</p>
                                      <br>
                                      <p>合作单位：</p>
                                      <p>丽唐装饰、城市人家、新浪抢工长</p>
                                      <br>
                                      <p>施工小区：</p>
                                      <p>{$vo.case}</p>
                                      <!-- <p>奥林滨河花园、绿地三期、西岸南区</p> -->
                                      <span class="abuy">立即预约</span>

                                 </div>
                        </div>
                        </a>
                      </volist>
                   </div>
              </div>

         </div>
    </div>
    <div class="conwhole wk_team_workerbg">
         <!--下部-->
         <!--保护容器-->
         <div class="container">
               <div class="wk_team_worker">
                   <div class="wk_team_worker_title">
                   网购工人 如此简单
                   </div>
                   <div class="wk_team_worker_ul">
                        <div class="wk_team_worker_li">
                             <a><img src="{$config_siteurl}statics/zt/images/worker/worker_content3img1.png" /></a>
                        </div>
                        <div class="wk_team_worker_li">
                             <a><img src="{$config_siteurl}statics/zt/images/worker/worker_content3img2.png" /></a>
                        </div>
                        <div class="wk_team_worker_li">
                             <a><img src="{$config_siteurl}statics/zt/images/worker/worker_content3img3.png" /></a>
                        </div>
                        <div class="wk_team_worker_li">
                             <a><img src="{$config_siteurl}statics/zt/images/worker/worker_content3img4.png" /></a>
                        </div>
                        <div class="wk_team_worker_li">
                             <a><img src="{$config_siteurl}statics/zt/images/worker/worker_content3img5.png" /></a>
                        </div>
                   </div>
                </div>
         </div>
    </div>
    <!--金牌工人-->
    <!--背景容器-->
    <div class="conwhole wk_goldwk" id="F2">
         <!--上部-->
         <div class="wk_tit_box">
         <!--保护容器-->
         <div class="container wk_tit_boxin">
              <div class="wk_team_title_img">
                   <img src="{$config_siteurl}statics/zt/images/worker/wk_goldwk_head.png" />
              </div>
              <div class="wk_team_title_txt">
                   <strong>装途网工种齐全</strong>
                   丰富的工作经验、一流的技术实力，优秀的施工案例，能为您提供卓越的装家服务。
              </div>
         </div>
         </div>
         <!--下部-->
         <div class="worker_box">
              <!--保护容器-->
              <ul class="container">
                <!--<li>
                  <img class="photo" src="{$config_siteurl}statics/zt/images/worker/wk_goldwkphoto1.png">
                      <div class="top"></div>
                     <div class="explain">
                          <p class="name">邬宗全<img src="{$config_siteurl}statics/zt/images/zt_recicon.png"></p>
                          <p class="year"><span>水电工/</span>从业年限：6年</p>
                          <p class="price">约<span>￥<strong>15~60</strong></span>/m2</p>
                          <p>以上价格供参考，以线下沟通为准</p>
                          <span class="buy">立即预约</span>
                          <div class="gold"></div>
                     </div>
                </li>-->
                <!--<li>
                  <img class="photo" src="{$config_siteurl}statics/zt/images/worker/wk_goldwkphoto2.png">
                      <div class="top"></div>
                     <div class="explain">
                          <p class="name">邬宗全<img src="{$config_siteurl}statics/zt/images/zt_recicon.png"></p>
                          <p class="year"><span>水电工/</span>从业年限：6年</p>
                          <p class="price">约<span>￥<strong>15~60</strong></span>/m2</p>
                          <p>以上价格供参考，以线下沟通为准</p>
                          <span class="buy">立即预约</span>
                     </div>
                </li>-->
               <!-- <li>
                  <img class="photo" src="{$config_siteurl}statics/zt/images/worker/wk_goldwkphoto3.png">
                      <div class="top"></div>
                     <div class="explain">
                          <p class="name">邬宗全<img src="{$config_siteurl}statics/zt/images/zt_recicon.png"></p>
                          <p class="year"><span>水电工/</span>从业年限：6年</p>
                          <p class="price">约<span>￥<strong>15~60</strong></span>/m2</p>
                          <p>以上价格供参考，以线下沟通为准</p>
                          <span class="buy">立即预约</span>
                     </div>
                </li>-->
                <!--<li>
                  <img class="photo" src="{$config_siteurl}statics/zt/images/worker/wk_goldwkphoto4.png">
                     <div class="explain">
                          <p class="name">邬宗全<img src="{$config_siteurl}statics/zt/images/zt_recicon.png"></p>
                          <p class="year"><span>水电工/</span>从业年限：6年</p>
                          <p class="price">约<span>￥<strong>15~60</strong></span>/m2</p>
                          <p>以上价格供参考，以线下沟通为准</p>
                          <span class="buy">立即预约</span>
                     </div>
                </li>-->
                <volist name="goodwork" id="vo">
                <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                <li>
                  <img class="photo" src={$vo.picture.0}>
                     <div class="explain">
                          <p class="name">{$vo.data.workername}<!--<img src="{$config_siteurl}statics/zt/images/zt_recicon.png">--></p>
                          <p class="year"><span>{$vo.crafttype}/</span>从业年限：{$vo.data.workyears}年</p>
                          <p class="price">约<span>￥<strong><!-- {$vo.data.min_price}~{$vo.data.max_price} -->{$vo.data.min_price}</strong></span>/m2</p>
                          <p>以上价格供参考，以线下沟通为准</p>
                          <span class="abuy">立即预约</span>
                     </div>
                </li>
                </a>
              </volist>
              </ul>

         </div>
    </div>
    <!--杂工工人-->
    <!--背景容器-->
    <div class="conwhole wk_mixwk" id="F3">
         <!--上部-->
         <div class="wk_tit_box">
         <!--保护容器-->
         <div class="container wk_tit_boxin">
              <div class="wk_team_title_img">
                   <img src="{$config_siteurl}statics/zt/images/worker/wk_mixwkhead.png" />
              </div>
              <div class="wk_team_title_txt">
                   <strong>装途网工种齐全</strong>
                   工人技能一流，能为您提供更正规的施工服务。您只需看评价，比价格，即可找到您满意的工人。
              </div>
         </div>
         </div>
         <!--下部-->
         <div class="worker_box">
              <!--保护容器-->
              <ul class="container">
                <!--<li>
                  <img class="photo" src="{$config_siteurl}statics/zt/images/worker/wk_mixwkphoto1.png">
                     <div class="explain">
                          <p class="name">邬宗全<img src="{$config_siteurl}statics/zt/images/zt_recicon2.png"></p>
                          <p class="year"><span>水电工/</span>从业年限：6年</p>
                          <p class="price">约<span>￥<strong>15~60</strong></span>/m2</p>
                     </div>
                      <span class="buy">立即预约</span>
                </li>-->
                <!--<li>
                  <img class="photo" src="{$config_siteurl}statics/zt/images/worker/wk_mixwkphoto2.png">
                     <div class="explain">
                          <p class="name">邬宗全<img src="{$config_siteurl}statics/zt/images/zt_recicon2no.png"></p>
                          <p class="year"><span>水电工/</span>从业年限：6年</p>
                          <p class="price">约<span>￥<strong>15~60</strong></span>/m2</p>
                     </div>
                      <span class="buy">立即预约</span>
                </li>
                <li>
                  <img class="photo" src="{$config_siteurl}statics/zt/images/worker/wk_mixwkphoto3.png">
                     <div class="explain">
                          <p class="name">邬宗全<img src="{$config_siteurl}statics/zt/images/zt_recicon2no.png"></p>
                          <p class="year"><span>水电工/</span>从业年限：6年</p>
                          <p class="price">约<span>￥<strong>15~60</strong></span>/m2</p>
                     </div>
                      <span class="buy">立即预约</span>
                </li>-->
                <volist name="backman" id="vo">
                <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                <li>
                  <img class="photo" src={$vo.picture.0}>
                     <div class="explain">
                          <p class="name">{$vo.data.workername}<!--<img src="{$config_siteurl}statics/zt/images/zt_recicon2no.png">--></p>
                          <p class="year"><span>{$vo.crafttype}/</span>从业年限：{$vo.data.workyears}年</p>
                          <p class="price">约<span>￥<strong><!-- {$vo.data.min_price}~{$vo.data.max_price} -->{$vo.data.min_price}</strong></span>/m2</p>
                     </div>
                      <span class="abuy">立即预约</span>
                </li>
                </a>
              </volist>
              </ul>

         </div>
    </div>
    <!--网友推荐-->
    <!--背景容器-->
    <div class="conwhole wk_netrec" id="F4">
         <!--上部-->
         <div class="wk_tit_box">
         <!--保护容器-->
         <div class="container wk_tit_boxin">
              <div class="wk_team_title_img">
                   <img src="{$config_siteurl}statics/zt/images/worker/wk_netrechead.png" />
              </div>
              <div class="wk_team_title_txt">
                   <strong>口碑决定服务</strong>
                   好评价、好口碑，大家觉得好才是好服务。
              </div>
         </div>
         </div>
         <!--下部-->
         <div class="worker_box">
              <!--保护容器-->
              <ul class="container">
               <!-- <li>
                  <img class="photo" src="{$config_siteurl}statics/zt/images/worker/wk_netrecphoto1.png">
                    <div class="exhibition">
                         <span class="name">王秀丰<img src="{$config_siteurl}statics/zt/images/zt_recicon.png"></span>
                         <dl>
                            <dt class="year">
                                水电/从业年限：
                            </dt>
                            <dd class="year">
                                14年
                            </dd>
                            <dt>
                                施工小区：
                            </dt>
                            <dd class="choose">
                                高档<em class="on"><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchooseorange.png"></em>中档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>低档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>
                            </dd>
                            <dt>
                                施工质量：
                            </dt>
                            <dd class="star">
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:50%"></span></li>
                            </dd>
                         </dl>

                    </div>

                     <a href="">
                        约￥<span class="price">15~60</span>/m2
                        <span class="buy">立即预约 ></span>
                     </a>
                     <div class="tip">推荐<br>50%</div>
                </li>-->
                <!--<li>
                  <img class="photo" src="{$config_siteurl}statics/zt/images/worker/wk_netrecphoto2.png">
                    <div class="exhibition">
                         <span class="name">王秀丰<img src="{$config_siteurl}statics/zt/images/zt_recicon.png"></span>
                         <dl>
                            <dt class="year">
                                水电/从业年限：
                            </dt>
                            <dd class="year">
                                14年
                            </dd>
                            <dt>
                                施工小区：
                            </dt>
                            <dd class="choose">
                                高档<em class="on"><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchooseorange.png"></em>中档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>低档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>
                            </dd>
                            <dt>
                                施工质量：
                            </dt>
                            <dd class="star">
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:50%"></span></li>
                            </dd>
                         </dl>

                    </div>

                     <a href="">
                        约￥<span class="price">15~60</span>/m2
                        <span class="buy">立即预约 ></span>
                     </a>
                     <div class="tip">推荐<br>50%</div>
                </li>
                <li>
                  <img class="photo" src="{$config_siteurl}statics/zt/images/worker/wk_netrecphoto3.png">
                    <div class="exhibition">
                         <span class="name">王秀丰<img src="{$config_siteurl}statics/zt/images/zt_recicon.png"></span>
                         <dl>
                            <dt class="year">
                                水电/从业年限：
                            </dt>
                            <dd class="year">
                                14年
                            </dd>
                            <dt>
                                施工小区：
                            </dt>
                            <dd class="choose">
                                高档<em class="on"><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchooseorange.png"></em>中档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>低档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>
                            </dd>
                            <dt>
                                施工质量：
                            </dt>
                            <dd class="star">
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:50%"></span></li>
                            </dd>
                         </dl>

                    </div>

                     <a href="">
                        约￥<span class="price">15~60</span>/m2
                        <span class="buy">立即预约 ></span>
                     </a>
                     <div class="tip">推荐<br>50%</div>
                </li>
                <li>
                  <img class="photo" src="{$config_siteurl}statics/zt/images/worker/wk_netrecphoto4.png">
                    <div class="exhibition">
                         <span class="name">王秀丰<img src="{$config_siteurl}statics/zt/images/zt_recicon.png"></span>
                         <dl>
                            <dt class="year">
                                水电/从业年限：
                            </dt>
                            <dd class="year">
                                14年
                            </dd>
                            <dt>
                                施工小区：
                            </dt>
                            <dd class="choose">
                                高档<em class="on"><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchooseorange.png"></em>中档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>低档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>
                            </dd>
                            <dt>
                                施工质量：
                            </dt>
                            <dd class="star">
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:50%"></span></li>
                            </dd>
                         </dl>

                    </div>

                     <a href="">
                        约￥<span class="price">15~60</span>/m2
                        <span class="buy">立即预约 ></span>
                     </a>
                     <div class="tip">推荐<br>50%</div>
                </li>
                <li>
                  <img class="photo" src="{$config_siteurl}statics/zt/images/worker/wk_netrecphoto5.png">
                    <div class="exhibition">
                         <span class="name">王秀丰<img src="{$config_siteurl}statics/zt/images/zt_recicon.png"></span>
                         <dl>
                            <dt class="year">
                                水电/从业年限：
                            </dt>
                            <dd class="year">
                                14年
                            </dd>
                            <dt>
                                施工小区：
                            </dt>
                            <dd class="choose">
                                高档<em class="on"><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchooseorange.png"></em>中档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>低档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>
                            </dd>
                            <dt>
                                施工质量：
                            </dt>
                            <dd class="star">
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:50%"></span></li>
                            </dd>
                         </dl>

                    </div>

                     <a href="">
                        约￥<span class="price">15~60</span>/m2
                        <span class="buy">立即预约 ></span>
                     </a>
                     <div class="tip">推荐<br>50%</div>
                </li>
                <li>
                  <img class="photo" src="{$config_siteurl}statics/zt/images/worker/wk_netrecphoto6.png">
                    <div class="exhibition">
                         <span class="name">王秀丰<img src="{$config_siteurl}statics/zt/images/zt_recicon.png"></span>
                         <dl>
                            <dt class="year">
                                水电/从业年限：
                            </dt>
                            <dd class="year">
                                14年
                            </dd>
                            <dt>
                                施工小区：
                            </dt>
                            <dd class="choose">
                                高档<em class="on"><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchooseorange.png"></em>中档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>低档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>
                            </dd>
                            <dt>
                                施工质量：
                            </dt>
                            <dd class="star">
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:50%"></span></li>
                            </dd>
                         </dl>

                    </div>

                     <a href="">
                        约￥<span class="price">15~60</span>/m2
                        <span class="buy">立即预约 ></span>
                     </a>
                     <div class="tip">推荐<br>50%</div>
                </li>
                <li>
                  <img class="photo" src="{$config_siteurl}statics/zt/images/worker/wk_netrecphoto7.png">
                    <div class="exhibition">
                         <span class="name">王秀丰<img src="{$config_siteurl}statics/zt/images/zt_recicon.png"></span>
                         <dl>
                            <dt class="year">
                                水电/从业年限：
                            </dt>
                            <dd class="year">
                                14年
                            </dd>
                            <dt>
                                施工小区：
                            </dt>
                            <dd class="choose">
                                高档<em class="on"><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchooseorange.png"></em>中档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>低档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>
                            </dd>
                            <dt>
                                施工质量：
                            </dt>
                            <dd class="star">
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:50%"></span></li>
                            </dd>
                         </dl>

                    </div>

                     <a href="">
                        约￥<span class="price">15~60</span>/m2
                        <span class="buy">立即预约 ></span>
                     </a>
                     <div class="tip">推荐<br>50%</div>
                </li>-->
                <volist name="recommend" id="vo">
                <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                <li>
                  <img class="photo" src={$vo.picture.0}>
                    <div class="exhibition">
                         <span class="name">{$vo.data.workername}<img src="{$config_siteurl}statics/zt/images/zt_recicon.png"></span>
                         <dl>
                            <dt class="year">
                                {$vo.crafttype}/从业年限：
                            </dt>
                            <dd class="year">
                                {$vo.data.workyears} 年
                            </dd>
                            <dt>
                                施工小区：
                            </dt>
                            <dd class="choose">
                                高档<em class="on"><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchooseorange.png"></em>中档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>低档<em><img src="{$config_siteurl}statics/zt/images/worker/worker_boxchoose.png"></em>
                            </dd>
                            <dt>
                                施工质量：
                            </dt>
                            <dd class="star" data-star="{$vo.star}">
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:100%"></span></li>
                                <li><span style="width:50%"></span></li>
                            </dd>
                         </dl>

                    </div>
                     <span class="abuy">
                        约￥<span class="price"><!-- {$vo.data.min_price}~{$vo.data.max_price} -->{$vo.data.min_price}</span>/m2
                        <span class="buy">立即预约 ></span>
                     </span>
                     <div class="tip">推荐<br>50%</div>
                </li>
                </a>
                </volist>
              </ul>

         </div>
    </div>
    <!--保证栏-->
    <!--背景容器-->
    <template file="common/_promise.php"/>
    <!--尾部-->
    <!--背景容器-->
    <template file="common/__footer.php"/>
</div>

</div>
<!--固定导航-->


<!--固定购物车导航-->
<template file="common/_shopcart.php"/>
<script>

    /*星星的填充 data-star标记数值*/
    $(".star").each(function(){
        var num = $(this).attr("data-star");
        var $span = $(this).find("span");
        for(i = 0; i<5; i++){
            if(num >= 1){
                $span.eq(i).css("width","100%");
            }
            else{
                $span.eq(i).css("width",num*100+"%");
            }
            num = num - 1;
        }
    })
    $(".wk_process_li_img").each(function(i,v){
        var $b = $(this).closest(".wk_process_ul").find("b");
        $(this).mouseenter(function(){
            $b.eq(i).css("color","#ef831e");
        })
        $(this).mouseleave(function(){
            $b.eq(i).css("color","#000");
        })
    })

    var mediaw = 1366;
    var mediatimes = 0.8;
    function scalebox(){
        var mediah = mediatimes*$(".scale").height()+19;
        $(".scalebox").height(mediah);
        $(".scalebox").css("overflow","hidden");
    }
    if($(document).width()<mediaw){
        scalebox();
    }





    $(window).resize(function(){
        if($(document).width()<mediaw){
            scalebox();
        }
    })

    $(window).scroll(function(){
        if( $(window).scrollTop() > $(".wk_navbgout").offset().top ){
            $(".wk_navbg").addClass("wkfixnav");
        }
        else{
            $(".wk_navbg").removeClass("wkfixnav");
        }
    })

</script>
</body>
</html>
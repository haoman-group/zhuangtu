<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>卖家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/Chart.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
</head>

<body>
<template file="Seller/common/_header.php"/>

  <!--sellercent_wrap卖家中心通用     scindex卖家中心首页-->

  <div class="container sellercenter_wrap scindex">
    <template file="Seller/common/_left.php"/>
    <div class="wraprt">
      <div class="scenterstatus">
      <if condition="date('H') egt 12"><div class="timetip noon"></div></if>
      </div>
        <div class="crumbs">
          <a href="{:U('Seller/Index/index')}" class="cat-ajx">卖家中心</a>
          <a href="#" class="icon-ajx"> > </a>
          <a href="{:U('Seller/Index/index')}" class="icon-ajx">交易统计 </a>
          <a href="#" class="icon-ajx"></a>
        </div>
      <div class="sellerinfo">
        <div class="mezhungtu">我的装途>></div>
        <div class="zticon"><a href="{:U('Buyer/User/profile')}" target="_blank"><img src="{:getavatar($userinfo['userid'])}"></a></div>
        <div class="infos">
          <h3><span>{$userinfo['username']}</span><a href="" class="agonglve">新卖家攻略</a></h3>

          <p>
            账户安全：
            <a href="">普通</a>
          </p>
          <p>店铺名称：<a href="{:shopurl($shopinfo['domain'])}">{$shopinfo['name']}</a></p>
          <p>
            <a href="{:U('Buyer/User/profile')}">修改个人信息 &gt;</a>
          </p>

        </div>

        <ul class="judge">
          <li> <strong>店铺动态评价</strong>
            与同行业相比
          </li>
          <li>描述相符：暂无评分</li>
          <li>服务质量：暂无评分</li>
          <li>发货速度：暂无评分</li>
        </ul>
        <ul class="cycles">
          <li>
            <p>
              支付金额
              <br>5.03%</p>
            <i class="up"></i>
          </li>
          <li>
            <p>
              浏览量
              <br>5.03%</p>
            <i class="down"></i>
          </li>
          <li>
            <p>
              支付买家数
              <br>5.03%</p>
            <i class="up"></i>
          </li>
          <li>
            <p>
              访客数
              <br>5.03%</p>
            <i class="up"></i>
          </li>
          <li>
            <p>
              支付转化率
              <br>5.03%</p>
            <i class="up"></i>
          </li>
        </ul>
      </div>
      <div class="todo">
        <dl>
          <dt>
            待办事项
          </dt>
          <dd class="tododd">

              <span>待处理的违规：<a href="">1</a></span>
              <span>待处理的投诉：<a href="">1</a></span>
              <span>站内信：<a href="">1</a></span>

          </dd>
        </dl>
      </div>
      <h5>生意参谋</h5>

      <div class="data">
        <span>&lt; 前一天</span>
        <span><strong>2015-12-15</strong></span>
        <span>后一天 &gt;</span>
      </div>
      <div class="table">
        <div class="title">经营状况</div>
        <ul class="daterecord">
          <li>
            <div class="head">访客数</div>
            <div class="num">0</div>
            <p>
              <span class="compare">比前一日</span><span class="ico">－</span><span class="percent">0%</span>
            </p>
            <p>
              <span class="compare">比上周同期</span><img src="{$config_siteurl}statics/zt/images/arrow_dataup.png"><span class="percent">100%</span>
            </p>
          </li>
          <li>
            <div class="head">访客数</div>
            <div class="num">0</div>
            <p>
              <span class="compare">比前一日</span><span class="ico">－</span><span class="percent">0%</span>
            </p>
            <p>
              <span class="compare">比上周同期</span><img src="{$config_siteurl}statics/zt/images/arrow_dataup.png"><span class="percent">100%</span>
            </p>
          </li>
          <li>
            <div class="head">访客数</div>
            <div class="num">0</div>
            <p>
              <span class="compare">比前一日</span><span class="ico">－</span><span class="percent">0%</span>
            </p>
            <p>
              <span class="compare">比上周同期</span><img src="{$config_siteurl}statics/zt/images/arrow_dataup.png"><span class="percent">100%</span>
            </p>
          </li>
          <li>
            <div class="head">访客数</div>
            <div class="num">0</div>
            <p>
              <span class="compare">比前一日</span><span class="ico">－</span><span class="percent">0%</span>
            </p>
            <p>
              <span class="compare">比上周同期</span><img src="{$config_siteurl}statics/zt/images/arrow_dataup.png"><span class="percent">100%</span>
            </p>
          </li>
          <li>
            <div class="head">访客数</div>
            <div class="num">0</div>
            <p>
              <span class="compare">比前一日</span><span class="ico">－</span><span class="percent">0%</span>
            </p>
            <p>
              <span class="compare">比上周同期</span><img src="{$config_siteurl}statics/zt/images/arrow_dataup.png"><span class="percent">100%</span>
            </p>
          </li>
          <li>
            <div class="head">访客数</div>
            <div class="num">0</div>
            <p>
              <span class="compare">比前一日</span><span class="ico">－</span><span class="percent">0%</span>
            </p>
            <p>
              <span class="compare">比上周同期</span><img src="{$config_siteurl}statics/zt/images/arrow_dataup.png"><span class="percent">100%</span>
            </p>
          </li>
          <li>
            <div class="head">访客数</div>
            <div class="num">0</div>
            <p>
              <span class="compare">比前一日</span><span class="ico">－</span><span class="percent">0%</span>
            </p>
            <p>
              <span class="compare">比上周同期</span><img src="{$config_siteurl}statics/zt/images/arrow_dataup.png"><span class="percent">100%</span>
            </p>
          </li>
        </ul>
        <dl>
          <dt>
          <div class="headul">
            <p>最近30天日均访客数：<span>0</span></p>
            <p>最近一年月均访客数：<span>0</span></p>
            <p>近两年月同比访客数：<span>0</span></p>
          </div>
          <canvas id="canvas" height="100" width="600"></canvas>
          </dt>
          <dd>
            <ul>
              <li>
                <div class="head">同行同层优秀</div>
                <div class="num">0</div>
                <p>
                  <span class="compare">比前一日</span><span class="ico">－</span><span class="percent">0%</span>
                </p>
                <span>本店<br>增幅</span><strong>持平</strong><span>同行同层<br>优秀增幅</span>
              </li>
              <li>
                <div class="head">同行同层平均</div>
                <div class="num">0</div>
                <p>
                  <span class="compare">比前一日</span><span class="ico">－</span><span class="percent">0%</span>
                </p>
                <span>本店<br>增幅</span><strong>持平</strong><span>同行同层<br>平均增幅</span>
              </li>
            </ul>
          </dd>
        </dl>
      </div>
      <div class="table">
        <div class="title">流量分析</div>
        <ul class="analysis">
          <li>
            <div class="head">跌失率</div>
            <div class="num">0</div>
            <p>
              <span class="compare">比前一日</span><span class="ico">－</span><span class="percent">0%</span>
            </p>
            <p>
              <span class="compare">比上周同期</span><img src="{$config_siteurl}statics/zt/images/arrow_dataup.png"><span class="percent">100%</span>
            </p>
            <canvas id="canvas1" height="30" width="90"></canvas>
          </li>
          <li>
            <div class="head">人均浏览量</div>
            <div class="num">0</div>
            <p>
              <span class="compare">比前一日</span><span class="ico">－</span><span class="percent">0%</span>
            </p>
            <p>
              <span class="compare">比上周同期</span><img src="{$config_siteurl}statics/zt/images/arrow_dataup.png"><span class="percent">100%</span>
            </p>
            <canvas id="canvas2" height="30" width="90"></canvas>
          </li>
          <li>
            <div class="head">平均停留时长</div>
            <div class="num">0</div>
            <p>
              <span class="compare">比前一日</span><span class="ico">－</span><span class="percent">0%</span>
            </p>
            <p>
              <span class="compare">比上周同期</span><img src="{$config_siteurl}statics/zt/images/arrow_dataup.png"><span class="percent">100%</span>
            </p>
            <canvas id="canvas3" height="30" width="90"></canvas>
          </li>
        </ul>
      </div>
      <div class="table">

        <div class="title">流量来源</div>
        <ul class="source">
          <li>
            <div class="td">
              来源名称
            </div>
            <div class="td">
              访客数（人）
            </div>
            <div class="td">
              下单转化率
            </div>
          </li>
          <li>
            <div class="td">
              店铺收藏
            </div>
            <div class="td">
              <span>100000</span>
              <div class="colorbox"><p></p></div>
              <span>100000</span>
              <div class="colorbox"><p></p></div>
            </div>
            <div class="td">
              <p>0%</p>
              <p>100%</p>
            </div>
          </li>
          <li>
            <div class="td">
              宝贝收藏
            </div>
            <div class="td">
              <span>100000</span>
              <div class="colorbox"><p></p></div>
              <span>100000</span>
              <div class="colorbox"><p></p></div>
            </div>
            <div class="td">
              <p>0%</p>
              <p>100%</p>
            </div>
          </li>
          <li>
            <div class="td">
              我的装途首页
            </div>
            <div class="td">
              <span>100000</span>
              <div class="colorbox"><p></p></div>
              <span>100000</span>
              <div class="colorbox"><p></p></div>
            </div>
            <div class="td">
              <p>0%</p>
              <p>100%</p>
            </div>
          </li>
          <li>
            <div class="td">
              已买到商品
            </div>
            <div class="td">
              <span>100000</span>
              <div class="colorbox"><p></p></div>
              <span>100000</span>
              <div class="colorbox"><p></p></div>
            </div>
            <div class="td">
              <p>0%</p>
              <p>100%</p>
            </div>
          </li>
          <li>
            <div class="td">
              直接访问
            </div>
            <div class="td">
              <span>100000</span>
              <div class="colorbox"><p></p></div>
              <span>100000</span>
              <div class="colorbox"><p></p></div>
            </div>
            <div class="td">
              <p>0%</p>
              <p>100%</p>
            </div>
          </li>
          <li>
            <div class="td">
            </div>
            <div class="td">
              <span>本店</span>
              <div class="colorbox"><p></p></div>
              <span>同行平均率</span>
              <div class="colorbox"><p></p></div>
            </div>
            <div class="td">
            </div>
          </li>
        </ul>
        <ul class="source">
          <li>
            <div class="td">
              来源名称
            </div>
            <div class="td">
              访客数（人）
            </div>
            <div class="td">
              下单转化率
            </div>
          </li>
          <li>
            <div class="td">
              站外搜索
            </div>
            <div class="td">
              <span>100000</span>
              <div class="colorbox"><p></p></div>
              <span>100000</span>
              <div class="colorbox"><p></p></div>
            </div>
            <div class="td">
              <p>0%</p>
              <p>100%</p>
            </div>
          </li>
          <li>
            <div class="td">
              装途足迹
            </div>
            <div class="td">
              <span>100000</span>
              <div class="colorbox"><p></p></div>
              <span>100000</span>
              <div class="colorbox"><p></p></div>
            </div>
            <div class="td">
              <p>0%</p>
              <p>100%</p>
            </div>
          </li>
          <li>
            <div class="td">
              购物车
            </div>
            <div class="td">
              <span>100000</span>
              <div class="colorbox"><p></p></div>
              <span>100000</span>
              <div class="colorbox"><p></p></div>
            </div>
            <div class="td">
              <p>0%</p>
              <p>100%</p>
            </div>
          </li>
          <li>
            <div class="td">
              装途搜索
            </div>
            <div class="td">
              <span>100000</span>
              <div class="colorbox"><p></p></div>
              <span>100000</span>
              <div class="colorbox"><p></p></div>
            </div>
            <div class="td">
              <p>0%</p>
              <p>100%</p>
            </div>
          </li>
          <li>
            <div class="td">
              其他
            </div>
            <div class="td">
              <span>100000</span>
              <div class="colorbox"><p></p></div>
              <span>100000</span>
              <div class="colorbox"><p></p></div>
            </div>
            <div class="td">
              <p>0%</p>
              <p>100%</p>
            </div>
          </li>
          <li>
            <div class="td">
            </div>
            <div class="td">
              <span>本店</span>
              <div class="colorbox"><p></p></div>
              <span>同行平均率</span>
              <div class="colorbox"><p></p></div>
            </div>
            <div class="td">
            </div>
          </li>
        </ul>
      </div>


    </div>
    <div class="clear"></div>
  </div>

  <div id="tong" style="display:none">
    <h3>友情提示</h3>
    <div class="conto">
      <p><span class="icon"></span> 为了资金安全，请绑定银行卡!</p>
      <p class="red">
        进入绑定流程后，店铺暂不可操作，绑定成功后店铺可正常操作
      </p>
      <a href="{:U('Member/Seller/shop_bank_redo')}">绑定银行卡</a>
      <a href="javascript:layer.closeAll();" class="laterb">稍后绑定</a>
    </div>
    <span class="layui-layer-setwin"><a class="layui-layer-ico layui-layer-close layui-layer-close1" href="javascript:;"></a></span>
  </div>

<template file="common/_promise.php"/>
  <template file="Seller/common/_footer.php"/>
  
	<script>
   <?php
     if($hasCard == false){
            echo "layer.open({
              type: 1,
              title: false,
              closeBtn: 0,
              area: '500px',
              shadeClose: true,
              content: $('#tong'),

            });";
        echo '$(".laterb").click(function(){
          layer.closeAll();
        });';
      }
  ?>
    
		<!--var randomScalingFactor = function(){ return Math.round(Math.random()*60)/10+2};-->
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var lineChartData = {
			labels : ["09-12","09-13","09-14","09-15","09-16","09-17","09-18"],
			datasets : [
				
				{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [200,300,100,500,100,400,700]
				}
			]

		}
		var lineChartData1 = {
			labels : ["09-12","09-13","09-14","09-15","09-16","09-17","09-18"],
			datasets : [
				
				{
					label: "My Second dataset",
					fillColor: "rgba(151,187,205,0.2)",
					strokeColor: "rgba(151,187,205,1)",
					pointColor: "rgba(151,187,205,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(151,187,205,1)",
	            data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
				}
			]

		}
		var lineChartData2 = {
			labels : ["09-12","09-13","09-14","09-15","09-16","09-17","09-18"],
			datasets : [
				
				{
					label: "My Second dataset",
					fillColor: "rgba(151,187,205,0.2)",
					strokeColor: "rgba(151,187,205,1)",
					pointColor: "rgba(151,187,205,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(151,187,205,1)",
	            data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
				}
			]

		}
		var lineChartData3 = {
			labels : ["09-12","09-13","09-14","09-15","09-16","09-17","09-18"],
			datasets : [
				
				{
					label: "My Second dataset",
					fillColor: "rgba(151,187,205,0.2)",
					strokeColor: "rgba(151,187,205,1)",
					pointColor: "rgba(151,187,205,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(151,187,205,1)",
	            data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
				}
			]

		}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		var ctx1 = document.getElementById("canvas1").getContext("2d");
		var ctx2 = document.getElementById("canvas2").getContext("2d");
		var ctx3 = document.getElementById("canvas3").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true,
		});
		window.myLine1 = new Chart(ctx1).Line(lineChartData1, {
			responsive: true,
			showScale: false,
        	pointDot :  true
		});
		window.myLine2 = new Chart(ctx2).Line(lineChartData2, {
			responsive: true,
			showScale: false,
        	pointDot :  true
		});
		window.myLine3 = new Chart(ctx3).Line(lineChartData3, {
			responsive: true,
			showScale: false,
        	pointDot : true,
		});
	}


	</script>
  
  
</body>
</html>
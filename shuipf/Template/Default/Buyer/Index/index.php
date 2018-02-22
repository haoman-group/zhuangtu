<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <meta charset="utf-8">
    <title>买家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css"/>
    <script type="text/javascript" src="/statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/buyercenter.js"> </script>
</head>
<body>
<!--背景容器-->
<template file="common/_top.php"/>
<!--导航-->
<!--背景容器-->
<template file="Buyer/common/_search.php"/>
<!--内容-->
<!--buyercent_wrap买家中心通用     scindex买家中心首页-->
<div class="container buyercenter_wrap scindex">
    <template file="Buyer/common/_head.php"/>
    <div class="wraprt">
        <ul class="goodsstatus">
            <li><a href="{:U('index',array('order_state'=>10))}">待付款</a></li>
            <li class="on"><a href="{:U('index',array('order_state'=>20))}">待发货(0)</a></li>
            <li><a href="{:U('index',array('order_state'=>30))}">待安装</a></li>
            <li><a href="{:U('index',array('order_state'=>40))}">待确认</a></li>
            <li class="on"><a href="{:U('index',array('evaluation_state'=>0))}">待评价(0)</a></li>
            <li><a href= "{:U('index',array('refund_state'=>0))}">退款</a></li>
        </ul>
        <h5>生意参谋</h5>
        <div class="border">
        	<ul class="cost"  >
                <li ><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercost.png"><p>¥{$all}</p></li>
                <li class="equal">=</li>
                <li ><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercost1.png"><p>¥<if condition="$mes['data'][1]['sum(order_amount)'] neq ''">{$mes['data'][1]['sum(order_amount)']}<else/>0.00</if></p></li>

                <li><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercost2.png"><p>¥<if condition="$mes['data'][2]['sum(order_amount)'] neq ''">{$mes['data'][2]['sum(order_amount)']}<else/>0.00</if></p></li>
                
                <li><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercost23.png"><p>¥<if condition="$mes['data'][23]['sum(order_amount)'] neq ''">{$mes['data'][23]['sum(order_amount)']}<else/>0.00</if></p></li>
                
                <li><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercost3.png"><p>¥<if condition="$mes['data'][3]['sum(order_amount)'] neq ''">{$mes['data'][3]['sum(order_amount)']}<else/>0.00</if></p></li>
                
                <li><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercost4.png"><p>¥<if condition="$mes['data'][4]['sum(order_amount)'] neq ''">{$mes['data'][4]['sum(order_amount)']}<else/>0.00</if></p></li>
                
                <li><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercost5.png"><p>¥<if condition="$mes['data'][5]['sum(order_amount)'] neq ''">{$mes['data'][5]['sum(order_amount)']}<else/>0.00</if></p></li>
            </ul>
        </div>
        <h5>站内消息</h5>
        <div class="border">
        	<div class="information">

            	<p>您有一则消费信息：网购设计花费2000元，请计入装修账本中，方便您统计总花销</p>

                <a href="">查看订单</a>
                <a href="">计入账单</a>
            </div>

        </div>
        <h5>我的装修日记</h5>
        <div class="border">
                                          <div class="txtbox onlinecomment scindex">
                                              <div class="diary">
                                                  <img class="chtitliimg" src="{$config_siteurl}statics/zt/images/buyercenter/chtitliimg.jpg">
            <!--                                    <div class="person">-->
            <!--                                        <img src="{$config_siteurl}statics/zt/images/buyercenter/person1.png">-->
            <!--                                        <p>-->
            <!--                                            <span class="name">小＊＊＊柴（匿名）</span>-->
            <!--                                            <span>暂无签名</span>-->
            <!--                                        </p>-->
            <!--                                    </div>-->
            <!--                                    <ul class="content">-->
            <!--                                        <li>工作内容(一小时前)</li>-->
            <!--                                        <li>1.父母很喜欢，用起来放心。</li>-->
            <!--                                        <li>2.物流很快</li>-->
            <!--                                    </ul>-->
            <!--                                    <ul class="img">-->
            <!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg11.png"></li>-->
            <!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg12.png"></li>-->
            <!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg13.png"></li>-->
            <!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg14.png"></li>-->
            <!--                                    </ul>-->
            <!--                                    <p class="status">父母很喜欢，用起来放心。</p>-->
            <!--                                    <ul class="opeartion">-->
            <!--                                        <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/praise.png"><span>点赞</span></li>-->
            <!--                                        <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/comment.png"><span>评论</span></li>-->
            <!--                                        <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/list.png"></li>-->
            <!--                                    </ul>-->
            <!--                                </div>-->
            <!--                                <div class="diary">-->
            <!--                                    <div class="person">-->
            <!--                                        <img src="{$config_siteurl}statics/zt/images/buyercenter/person1.png">-->
            <!--                                        <p>-->
            <!--                                            <span class="name">刮家工-张师傅</span>-->
            <!--                                            <span>踏踏实实工作，给你一个完美的家</span>-->
            <!--                                        </p>-->
            <!--                                    </div>-->
            <!--
                <ul class="content">-->
            <!--                                        <li>工作内容(一小时前)</li>-->
            <!--                                        <li>1.水电改造开槽</li>-->
            <!--                                        <li>2.布管定位布管定位布管定位</li>-->
            <!--                                    </ul>-->
            <!--                                    <ul class="img">-->
            <!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg11.png"></li>-->
            <!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg12.png"></li>-->
            <!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg13.png"></li>-->
            <!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg14.png"></li>-->
            <!--                                    </ul>-->
            <!--                                    <p class="status">今天工作比较顺利，任务基本完成。</p>-->
            <!--                                    <ul class="opeartion">-->
            <!--                                        <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/praise.png"><span>点赞</span></li>-->
            <!--                                        <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/comment.png"><span>评论</span></li>-->
            <!--                                        <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/list.png"></li>-->
            <!--                                    </ul>-->

                                            </div>
                                        </div>
        	<!-- <div class="diary">
            	<h4>
                	<img src="{$config_siteurl}statics/zt/images/buyercenter/diarytitle1.png">
                    设计阶段
                </h4>
                <div class="person">
                	<img src="{$config_siteurl}statics/zt/images/buyercenter/person1.png">
                    <p>
                    	<span class="name">刮家工-张师傅</span>
                        <span>踏踏实实工作，给你一个完美的家</span>
                    </p>
                    <div class="time">
                    	2016年03月23日
                        <img src="{$config_siteurl}statics/zt/images/buyercenter/diarytime.png">
                    </div>
                </div>
                <ul class="content">
                    <li>工作内容(一小时前)</li>
                    <li>1.水电改造开槽</li>
                    <li>2.布管定位布管定位布管定位</li>
                    <li><span class="tip">!</span>提示：准备好明天所需材料哦！</li>
                </ul>
                <ul class="img">
                	<li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg11.png"></li>
                	<li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg12.png"></li>
                	<li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg13.png"></li>
                	<li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg14.png"></li>
                </ul>
                <p class="status">今天工作比较顺利，任务基本完成。</p>
                <ul class="opeartion">
                	<li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/praise.png"><span>点赞</span></li>
                	<li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/comment.png"><span>评论</span></li>
                    <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/list.png"></li>
                </ul>
            </div>
        	<div class="diary">
            	<h4>
                	<img src="{$config_siteurl}statics/zt/images/buyercenter/diarytitle1.png">
                    施工阶段
                </h4>
                <div class="person">
                	<img src="{$config_siteurl}statics/zt/images/buyercenter/person1.png">
                    <p>
                    	<span class="name">刮家工-张师傅</span>
                        <span>踏踏实实工作，给你一个完美的家</span>
                    </p>
                    <div class="time">
                    	2016年03月23日
                        <img src="{$config_siteurl}statics/zt/images/buyercenter/diarytime.png">
                    </div>
                </div>
                <ul class="content">
                    <li>工作内容(一小时前)</li>
                    <li>1.水电改造开槽</li>
                    <li>2.布管定位布管定位布管定位</li>
                    <li><span class="tip">!</span>提示：准备好明天所需材料哦！</li>
                </ul>
                <ul class="img">
                	<li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg11.png"></li>
                	<li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg12.png"></li>
                	<li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg13.png"></li>
                	<li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg14.png"></li>
                </ul>
                <p class="status">今天工作比较顺利，任务基本完成。</p>
                <ul class="opeartion">
                	<li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/praise.png"><span>点赞</span></li>
                	<li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/comment.png"><span>评论</span></li>
                    <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/list.png"></li>
                </ul>
            </div> -->
        </div>
        <h5>猜你喜欢的/装途推荐</h5>
        <div class="border">
            <ul class="product">
                <volist name="recommend" id="vo">
                <li>
                    <a href="{:U('Shop/Product/show',array('id'=>$vo['id']))}"><img src="{$vo['headpic']}"></a>
                    <span class="description"><?php echo $vo['title'] ?></span>
                    <p><span>¥{$vo["min_price"]}</span><span class="collect"  data-delete="0" data-type="1" data-productid="{$vo['id']}">收藏</span>
                      <span class="collected" onclick="delcollect()"  data-delete="1" data-type="1" style="color:red;background-image: url({$config_siteurl}statics/zt/images/buyercenter/collectred.png)" >已收藏</span>
                    </p>
                </li>
            </volist>
                <!--<li>
                    <a href=""><img src="{$config_siteurl}statics/zt/images/buyercenter/product.png"></a>
                    <span class="description">热销 多乐士漆致悦无添加抗污18L</span>
                    <p><span>¥749</span><span class="collect on">收藏</span></p>
                </li>
                <li>
                    <a href=""><img src="{$config_siteurl}statics/zt/images/buyercenter/product.png"></a>
                    <span class="description">热销 多乐士漆致悦无添加抗污18L</span>
                    <p><span>¥749</span><span class="collect on">收藏</span></p>
                </li>
                <li>
                    <a href=""><img src="{$config_siteurl}statics/zt/images/buyercenter/product.png"></a>
                    <span class="description">热销 多乐士漆致悦无添加抗污18L</span>
                    <p><span>¥749</span><span class="collect on">收藏</span></p>
                </li>-->
            </ul>
		
        </div>
    </div>
    <div class="clear"></div>
</div>
<!--尾部-->
  <template file="common/_promise.php"/>  
  <template file="common/_footer.php"/>
</body>
<script>


$(function(){
   
    $(".collect").click(function(){
        $this = $(this);
        var productid=$(this).attr("data-productid");
        var type=$(this).attr("data-type");
        var is_delete=$(this).attr("data-delete");
        $.ajax({
             type:'POST',
             url : '{:U("Shop/Product/collecton")}',
             dataType:"json",
             data:{'productid':productid,'type':type,'is_delete':is_delete},
             success:function(data){
                if(data.status == 1){
                   $this.hide();
                   $this.next(".collected").show();
                }

             }

        });

    })
})

</script>
</html>
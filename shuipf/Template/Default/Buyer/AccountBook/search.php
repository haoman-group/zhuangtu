<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<title>买家中心－装修账本</title>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css"/>
    <script type="text/javascript" src="/statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/buyercenter.js"> </script>
<template file="common/_global_js.php"/>
    <script type="text/javascript" src="{$config_siteurl}statics/js/wind.js"></script>
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <script>
        <?php
        $alowexts = "jpg|jpeg|gif|bmp|png";
        $thumb_ext = ",";
        $watermark_setting = 0;
        $module = "Seller";
        $catid = "0";
        $max = 5;
        $authkey = upload_key("$max,$alowexts,1,$thumb_ext,$watermark_setting");
        ?>
        function upfilen(id){
            var $id=$('#' + id).find(".noimg");
            var maxnum= $id.length;
            console.log($id);
            flashupload(id+'_images', '图片上传',id,submit_pic, maxnum+',{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
        }


        function submit_pic(uploadid,returnid){
            // console.log(uploadid+"!!"+returnid);

            var d = uploadid.iframe.contentWindow;
            var in_content = d.$("#att-status").html().substring(1);
            var in_content = in_content.split('|');
            //$('#'+returnid).attr('src',in_content[0]);
            $('#'+returnid).attr('value',in_content[0]);
        }
    </script>
</head>
<body>
<template file="common/_top.php"/>
<template file="Buyer/common/_search.php"/>
<div class="container buyercenter_wrap scindex">
    <template file="Buyer/common/_head.php"/>
    <div class="wraprt">
        <h5>装家花费明细</h5>
        <div class="border">
            <ul class="cost"  >
                <li ><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercost.png"><p>¥{$allmoney}</p></li>
                <li class="equal">=</li>
                <li ><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercost1.png"><p>¥<if condition="$mes['data'][1]['sum(order_amount)'] neq ''">{$mes['data'][1]['sum(order_amount)']}<else/>0.00</if></p></li>

                <li><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercost2.png"><p>¥<if condition="$mes['data'][2]['sum(order_amount)'] neq ''">{$mes['data'][2]['sum(order_amount)']}<else/>0.00</if></p></li>
                
                <li><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercost3.png"><p>¥<if condition="$mes['data'][23]['sum(order_amount)'] neq ''">{$mes['data'][23]['sum(order_amount)']}<else/>0.00</if></p></li>
                
                <li><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercost4.png"><p>¥<if condition="$mes['data'][3]['sum(order_amount)'] neq ''">{$mes['data'][3]['sum(order_amount)']}<else/>0.00</if></p></li>
                
                <li><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercost5.png"><p>¥<if condition="$mes['data'][4]['sum(order_amount)'] neq ''">{$mes['data'][4]['sum(order_amount)']}<else/>0.00</if></p></li>
                
                <li><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercost6.png"><p>¥<if condition="$mes['data'][5]['sum(order_amount)'] neq ''">{$mes['data'][5]['sum(order_amount)']}<else/>0.00</if></p></li>
            </ul>
        </div>
        <h5>记一笔</h5>
        <div class="accborder">
            <form  method="post" id="from">
            <ul class="accul">
                <li>
                    <div class="acctitle">时间设置</div>
                    <div class="allselect">
                        <select class="sel_year" rel="2016" name="year"></select>
                        <select class="sel_month" rel="7"   name="month"></select>
                        <select class="sel_day" rel="30"  name="day"></select>
                    </div>
                </li>
                <li >
                    <div class="acctitle">选择类别</div>
                    <div class="accform">
                       
                            <div class="explaininput"  data-type="1">
                                <img src="{$config_siteurl}statics/zt/images/buyercenter/accountbook-1.png">
                                <p><input type="radio" name="radiobutton" value="1" checked></p>
                            </div>
                            <div class="explaininput" data-type="2">
                                <img src="{$config_siteurl}statics/zt/images/buyercenter/accountbook-2.png">
                                <p><input type="radio" name="radiobutton" value="2"></p>
                            </div>
                            <div class="explaininput" data-type="3">
                                <img src="{$config_siteurl}statics/zt/images/buyercenter/accountbook-3.png">
                                <p><input type="radio" name="radiobutton" value="3"></p>
                            </div>
                            <div class="explaininput" data-type="4">
                                <img src="{$config_siteurl}statics/zt/images/buyercenter/accountbook-4.png">
                                <p><input type="radio" name="radiobutton" value="4"></p>
                            </div>
                            <div class="explaininput" data-type="5">
                                <img src="{$config_siteurl}statics/zt/images/buyercenter/accountbook-5.png">
                                <p><input type="radio" name="radiobutton" value="5"></p>
                            </div>
                            <div class="explaininput" data-type="6">
                                <img src="{$config_siteurl}statics/zt/images/buyercenter/accountbook-6.png">
                                <p><input type="radio" name="radiobutton" value="6"></p>
                            </div>
                            <div class="explaininput textinput">
                                <i>*</i>
                                <input type="text" name="" value="" class="money" placeholder="输入消费金额">
                            </div>
                       
                    </div>

                </li>
                <li>
                    <div class="acctitle">添加类别说明</div>
                    <dl class="addexplain acctitledl">
                        <dt>
                            <textarea rows="" cols="" class="description"></textarea>
                        </dt>
                        <dd>
                            <div class="filediv  yesbor">

                                <input type="button" value="添加图片：" onclick="upfilen('hd_picture')" class="above">
                                <input type="text" size="20" name="upfile[]" id="hd_picture" class="accfile" >

                                <!-- <img src=""> -->
                            </div>
                           <!--  <div class="filediv">
                                <input type="button" value="添加视频：" onclick="abc('hd_picture')" class="above">
                                <input type="text" size="20" name="upfile2" id="upfile2" class="accfile" >
                                <input type="file" id="path2" style="display:none" accept=".mp4,.mp2.ogg" onchange="upfile2.value=this.value">
                            </div> -->


                        </dd>
                    </dl>
                </li>
                <li>
                    <div class="acctitle">备注</div>
                    <dl class="addexplain">
                        <dt>
                            <textarea rows="" cols="" class="remarks"></textarea>
                        </dt>
                        <dd>
                            <button  id="commit">发表</button>
                        </dd>
                    </dl>
                </li>
            </ul>
        </form>
        </div>
        <h5>装家花销流水单</h5>
        <div class="accborder">
            <form action="search" method="post"> 
            <div class="allselect">
                <select class="sel_year" rel="2016" name="year"></select>
                <select class="sel_month" rel="7"   name="month"></select>
                <select class="sel_day" rel="30"    name="day"></select>
                <select id="content" name="type" class="navselect" >
                    <option value="1">设计</option>
                    <option value="2">工人</option>
                    <option value="23">辅材</option>
                    <option value="3">主材</option>
                    <option value="4">家具</option>
                    <option value="5">家电</option>
                </select>
                <button class="searchsingle">搜索</button>
            </div>
        </from>
            <div class="costflowsheet">
                <div class="cfs_in">
                    <volist name="data" id="vo">
                    <dl>
                        <dt>
                            消费金额：<strong>￥{$vo.money}</strong>
                            <span class="time"><?php echo date("Y-m-d",$vo['addtime']); ?></span>
                        </dt>
                        <dd class="yesbor">
                            <div class="comicon icontitel-{$vo.type}">{$vo.typename}</div><!--comicon是共用的class. 根据不同的类别有不同的class来更换图标,，icontitel-1是设计，icontitel-2是工人，3是辅材，4是主材，5是家具，6是家电 -->
                            <div class="spend">
                                <p>花费：￥{$vo.money}</p>
                                <div>{$vo.description}</div>
                                <div class="productdisplay">  
                                    <volist name="vo['picture']" id="pic">
                                    <img src="{$pic}">
                                </volist>
                                    
                                </div>
                            </div>
                        </dd>
                       
                    </dl>
                </volist>
                    <!-- <dl>
                        <dt>
                            消费金额：<strong>￥12000</strong>
                            <span class="time">2015年11月23日</span>
                        </dt>
                        <dd class="yesbor">
                            <div class="comicon icontitel-1">设计</div>
                            <div class="spend">
                                <p>花费：￥10000.00</p>
                                <div>太原点点装饰有限公司，杨厦门设计师   地中海风格</div>
                                <div class="productdisplay">
                                    <a href="#"><img src="{$config_siteurl}statics/zt/images/buyercenter/acctimg.jpg"></a>
                                    <a href="#"><img src="{$config_siteurl}statics/zt/images/buyercenter/acctimg.jpg"></a>
                                    <a href="#"><img src="{$config_siteurl}statics/zt/images/buyercenter/acctimg.jpg"></a>
                                    <a href="#"><img src="{$config_siteurl}statics/zt/images/buyercenter/acctimg.jpg"></a>
                                </div>
                            </div>
                        </dd>
                        <dd>
                            <div class="comicon icontitel-1">设计</div>
                            <div class="spend">
                                <p>花费：￥10000.00</p>
                                <div>太原点点装饰有限公司，杨厦门设计师   地中海风格</div>
                                <div class="productdisplay">
                                    <a href="#"><img src="{$config_siteurl}statics/zt/images/buyercenter/acctimg.jpg"></a>
                                    <a href="#"><img src="{$config_siteurl}statics/zt/images/buyercenter/acctimg.jpg"></a>
                                    <a href="#"><img src="{$config_siteurl}statics/zt/images/buyercenter/acctimg.jpg"></a>
                                    <a href="#"><img src="{$config_siteurl}statics/zt/images/buyercenter/acctimg.jpg"></a>
                                </div>
                            </div>
                            <textarea class="remarks" placeholder="备注："></textarea>
                        </dd>

                    </dl> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{$config_siteurl}statics/zt/js/birthday.js"> </script>
<script>
    $(function () {
        $.ms_DatePicker({
            YearSelector: ".sel_year",
            MonthSelector: ".sel_month",
            DaySelector: ".sel_day"
        });
        $.ms_DatePicker();
    });
</script>

<script>
$("#commit").click(function(){
    var year=$(this).parents(".accul").find(".sel_year").val();
    var month=$(this).parents(".accul").find(".sel_month").val();
    var day=$(this).parents(".accul").find(".sel_day").val();
    var addtime=year+"-"+month+"-"+day;
    var type=$(this).parents(".accul").find(".accform").find("input:checked").parents(".explaininput").attr("data-type");
    var description=$(this).parents(".accul").find(".description").val();
    var money=$(this).parents(".accul").find(".money").val();
    var picture=$(this).parents(".accul").find("#upfile").val();
    var video=$(this).parents(".accul").find("#upfile2").val();
    var remarks=$(this).parents(".accul").find(".remarks").val();
    $.ajax({
            type:"POST",
            url : '{:U("add")}',
            dataType:"json",
            data:{"addtime":addtime,"type":type,"description":description,"money":money,"picture":picture,"video":video,"remarks":remarks},
             success:function (data){
                if(data.status==1){
                   layer.msg('删除成功');
                }else{

                }
             }

    });

});
</script>
</body>
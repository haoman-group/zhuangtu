<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>评价页面</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/pay_page.css">
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script src="{$config_siteurl}statics/zt/js/pay_page.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/seller_reg.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <template file="common/_global_js.php"/>
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
</head>
<body>

<script type="text/javascript" src="http://aw.kejet.net/t?p=Ibb&amp;c=Kz"></script>
<!-- 背景容器 -->
<div class="pay_page_topbg">
    <!-- 保护容器 -->
    <div class="pay_page_top">
        <a href="" class="ppt_img"><img src="{$config_siteurl}statics/zt/images/findpsw/ureglogo.png" alt=""></a>
        <a href="" class="ppt_text"><span class="iphone">400-003-3030</span><span>客服热线</span></a>
    </div>
</div>
<!-- <div class="pay_order_container">
    <div class="pay_order_bg1_b">
        <div class="pay_order_bg1_t"><span>1</span>拍下商品</div>
    </div>
    <div class="pay_order_bg2_b">
        <div class="pay_order_bg2_t"><span>2</span>付款到装途网</div>
    </div>
    <div class="pay_order_bg3_b">
        <div class="pay_order_bg3_t" id="pay_order_bg3_t"><span>3</span>订单完成</div>
    </div>
    <div class="pay_order_bg4_b">
        <div class="pay_order_bg4_t on"><span>4</span>评价</div>
    </div>
</div> -->
<div id="comments" name="product">

  <form action="" method="">
    <div>
      <dl class="shop clearfix" >
        <dt><a href=""><img src="{$product.headpic}" alt=""></a></dt>
        <dd><a href="">{$product.title}</a></dd>
        <dd><span>￥{$product.max_price}</span></dd>
        <dd>
          <ul>
          <volist name="product['provalue']" id="provalue">
              <?php if($key=='price'|| $key=='price_act') break; ?>
              <li>
                {$key}：{$provalue['txt']}
              </li>
          </volist>
          </ul>
        </dd>
      </dl>      
    </div>
  <if condition="$comment eq '' ">
    <div class="left suggest">
        
      <h5>其他买家，需要您的建议哦！</h5>      

      <table class="form_table">
        <tr>
          <td>评价商品</td>
          <td><textarea name="content" id="" cols="30" rows="10" class="content">{$product['content']}</textarea></td>
        </tr>
        <tr>
          <td>评价服务</td>
          <td>
             <input type="hidden" name="action" value="1">
            <input type="radio" value="0" name="bb" id="good" checked><label for="good">好评</label>
            <input type="radio" value="1" name="bb" id="better" <if condition="$product.scores eq 1 "> checked</if>><label for="better">中评</label>
            <input type="radio" value="2" name="bb" id="bad" <if condition="$product.scores eq  2 "> checked</if>><label for="bad">差评</label>
          </td>
        </tr>
        <tr>
          <td>晒图片</td>
            <input type="hidden" value="<?php echo  $_GET['order_sn']?>" name="sn">
          <td>
              <ul class="img jsaddimgul" id="product_picture">

              </ul>
              <input type="button" onclick="javascript:upfile('product_picture')" class="seller_upload_image"value="">
              <span class="imgNum">0/2</span>
          </td>

        </tr>
      </table>
      

    </div>
    <div class="assess_means_box clearfix right">
      <h5>宝贝动态评价</h5>
      <div class="left">
      <dl>
          <dt class="assess_means_title">线下店铺评价</dt>
          <dt class="assess_means_content">店铺评价</dt>
          <dd>
              <ul class="star1 star">
                  <input type="hidden" name="star1" value="{$product.lineshop}">
                  <p style="width:<?php echo $product['lineshop'] *20 ?>%"></p>
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
              </ul>
          </dd>
          <dt class="assess_means_content2">服务评价</dt>
          <dd>
              <ul class="star2 star">
                  <input type="hidden" name="star2" value="{$product.lineservice}">
                  <p style="width:<?php echo $product['lineservice'] *20 ?>%"></p>
                   <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
              </ul>
          </dd>
      </dl>
      <dl>
          <dt class="assess_means_title">线上店铺评价</dt>
          <dt class="assess_means_content">店铺评价</dt>
          <dd>
              <ul class="star3 star">
                  <input type="hidden" name="star3" value="{$product.onlineshop}">
                  <p style="width:<?php echo $product['onlineshop'] *20 ?>%"></p>
                   <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
              </ul>
          </dd>
          <dt class="assess_means_content2">服务评价</dt>
          <dd>
              <ul class="star4 star">
                  <input type="hidden" name="star4" value="{$product.onlineseveri}">
                  <p style="width:<?php echo $product['onlineseveri'] *20 ?>%"></p>
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
              </ul>
          </dd>
      </dl>
      </div>
    </div>
    <div class="subt">
      <input type="radio" value="0"  name="anonymous" id="yes" checked><label for="yes" >匿名评价</label>
      <input type="radio" value="1"  name="anonymous" id="no"<if condition="$product.isanonymous eq 1"> checked </if>><label for="no">评价</label>
      <input type="submit" value="提交评价" class="submits">
    </div>

  <else/>
    <div class="addTo">
      <h4>其他买家，需要您的建议哦！</h4>
      <ul class="append">
        <li>初次评价：系统默认好评！</li>
        <i>03.16</i>
        <li>
            <input type="hidden" name="action" value="1">
            <input type="hidden" name="addcom" value="1">
            <span>追加评价：</span><textarea name="content" id="" cols="30" rows="10"></textarea>
            <input type="hidden" value="<?php echo  $_GET['order_sn']?>" name="sn">
            <div class="add">
                <ul class="img jsaddimgul" id="product_picture">

                </ul>
                <input type="button" onclick="javascript:upfile('product_picture')" class="seller_upload_image"value="">
                <span class="imgNum">0/2</span>
            </div>
        </li>
                    
      </ul>
      <input type="submit" value="提交评价" class="submits">
    </div>
  </if>

  </form>

</div>

<table class="comment_list">
  <tr>
    <th colspan="3">
     <input type="hidden" class="productID" value="{$product.id}">
     <input type="radio"  value="0" name="image" id="all"  data-type="0"  checked><label for="all">全部</label>
     <!-- <input type="radio"  value="0" name="image" id="addTo"  data-type="2"><label for="addTo">追评</label> -->
     <input type="radio" value="1" name="image" id="img"  data-type="1"><label for="img">图片</label>
    </th>
  </tr>
  <!-- <tr>
    <td>
      <ul>
        <li>特别好特别好好极了好得不行不行的！特别好特别好好极了好得不行不行的！</li>
        <li>
          <img src="{$config_siteurl}statics/zt/images/buyercenter/list.jpg" alt="">
          <img src="{$config_siteurl}statics/zt/images/buyercenter/list.jpg" alt="">
        </li>
        <li>今天</li>
      </ul>
    </td>
    <td>颜色分类：天蓝色</td>
    <td>用户0251243</td>
  </tr>
  <tr>
    <td>
      <ul>
        <li>特别好特别好好极了好得不行不行的！特别好特别好好极了好得不行不行的！</li>
        <li>
          <img src="{$config_siteurl}statics/zt/images/buyercenter/list.jpg" alt="">
          <img src="{$config_siteurl}statics/zt/images/buyercenter/list.jpg" alt="">
        </li>
        <li>今天</li>
      </ul>
    </td>
    <td>颜色分类：天蓝色</td>
    <td>用户0251243</td>
  </tr> -->
  
</table>
<!-- <div class="pay_main pm4 clearfix">
    <p class="shop">商品评价</p>
    <form action="{:U('pay_comment')}" class="forms" method="post">                
        <div class="pay_indent">
            <div class="pay_indent_box">
                <ul class="pay_indent_title">
                    <li><input type="radio" value="0" name="bb" id="good" checked><label for="good">好评</label><img src="{$config_siteurl}statics/zt/images/好评.png"></li>
                    <li><input type="radio" value="1" name="bb" id="better"><label for="better">中评</label><img src="{$config_siteurl}statics/zt/images/中评.png"></li>
                    <li><input type="radio" value="2" name="bb" id="bad"><label for="bad">差评</label><img src="{$config_siteurl}statics/zt/images/差评.png"></li>
                </ul>
                <h5>评价描述</h5>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
                <input type="button" onclick="javascript:upfile('product_picture')" class="seller_upload_image"value="上传图片">
              <ul class="img jsaddimgul" id="product_picture">
               <for start="0" end="2">
                <li class='noimg'></li>
            </for>
          </ul> -->
        
                <!-- <ul class="pay_indent_baby">
                    <li><a href=""><img src="{$config_siteurl}statics/zt/images/buyercenter/product.png" alt=""></a><a href="">热销 多乐士漆至悦无添加抗污18L内墙乳胶漆 墙面漆 乳胶漆</a><div class="color_style">￥188.90</div><div>规格：******</div><div>安装服务：******</div></li>
                    <li><input type="radio" value="" name="bb"></li>
                    <li><input type="radio" value="" name="bb"></li>
                    <li><input type="radio" value="" name="bb"></li>
                    <li>
                        <textarea name="" id="" cols="0" rows="0"></textarea>
                        <input type="submit" value="上传图片">
                        <div class="box1"></div>
                        <div class="box2"></div>
                        <div class="box3"></div>
                    </li>
                </ul>
                <ul class="pay_indent_baby">
                    <li><a href=""><img src="{$config_siteurl}statics/zt/images/buyercenter/product.png" alt=""></a><a href="">热销 多乐士漆至悦无添加抗污18L内墙乳胶漆 墙面漆 乳胶漆</a><div class="color_style">￥188.90</div><div>规格：******</div><div>安装服务：******</div></li>
                    <li><input type="radio" value="" name="aa"></li>
                    <li><input type="radio" value="" name="aa"></li>
                    <li><input type="radio" value="" name="aa"></li>
                    <li><textarea name="" id="" cols="0" rows="0"></textarea><input type="submit" value="上传图片"></li>
                </ul> -->
            <!-- </div>
        </div>
        <div class="pay_assess clearfix"> -->
            <!-- <h5>店铺动态评价</h5> -->
            <!-- <div class="assess_means_box">
                <dl>
                    <dt class="assess_means_title">线下店铺评价</dt>
                    <dt class="assess_means_content">店铺评价</dt>
                    <dd>
                        <ul class="star1 star">
                            <input type="hidden" name="star1" value="">
                            <p></p>

                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>

                        </ul>
                    </dd>
                    <dt class="assess_means_content2">服务评价</dt>
                    <dd>
                        <ul class="star2 star">
                            <input type="hidden" name="star2" value="">
                            <p></p>
                             <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt class="assess_means_title">线上店铺评价</dt>
                    <dt class="assess_means_content">店铺评价</dt>
                    <dd>
                        <ul class="star3 star">
                            <input type="hidden" name="star3" value="">
                            <p></p>
                             <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </dd>
                    <dt class="assess_means_content2">服务评价</dt>
                    <dd>
                        <ul class="star4 star">
                            <input type="hidden" name="star4" value="">
                            <p></p>
                          <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </dd>
                    <dd>

                     <li><input type="radio" value="0" name="anonymous" id="yes"><label for="good">匿名评价</label></li>
                    <li><input type="radio" value="1" name="anonymous" id="no"><label for="better">评价</label></li>
                   
                    </dd>
                    <dt><input type="submit" value="提交" class="submits"></dt>
                </dl>
            </div>
        </div>
    </form>
</div> -->


<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
<script type="text/javascript">

    var GV = {
      DIMAUB: "{$config_siteurl}",
      JS_ROOT: "{$config_siteurl}statics/js/"
    };
</script>
<script src="{$config_siteurl}statics/js/wind.js"></script>
<script src="{$config_siteurl}statics/js/common.js"></script>
<script type="text/javascript">
      <?php 
        $alowexts = "jpg|jpeg|gif|bmp|png";
        $thumb_ext = ",";
        $watermark_setting = 0;
        $module = "Seller";
        $catid = "0";
        $authkey = upload_key("2,$alowexts,1,$thumb_ext,$watermark_setting");
      ?>
function upfile(id){
      flashupload(id+'_images', '图片上传',id,submit_pic,'2,{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
}

function submit_pic(uploadid,returnid){
      var d = uploadid.iframe.contentWindow;
      var in_content = d.$("#att-status").html().substring(1);
      var in_filename = d.$("#att-name").html().substring(1);
      //var str = $('#' + returnid).html();
      var contents = in_content.split('|');
      var filenames = in_filename.split('|');
      if (contents == '') return true;
      $.each(contents, function (i, n) {
          var ids = parseInt(Math.random() * 10000 + 10 * i);
          var filename = filenames[i].substr(0, filenames[i].indexOf('.'));
          var str = "<li><input type='hidden' name='pic[]' value='" + n
              + "' ><img src='"+n
              +"'  ><div class='operate'><span class='sl'></span><span class='sr'></span><a href=\"javascript:void(0)\" class='tupian' ></a></div>" +
              "</li>";

          $('#product_picture' ).append (str);
          //$('#product_picture' ).find(".noimg:first").removeClass("noimg");
      });

      $(".imgNum").html($("#product_picture").find("li").length + "/2");
    }
//      if($('#product_picture' ).find(".noimg").html()){
//          $('#product_picture' ).find(".noimg").show();
//      }else{
//          $('#product_picture' ).find(".noimg").hide();
//      }

</script>
<script>
$(function(){
  
  $(".submits").click(function(){
    
    $.ajax({
      type:"GET",
      url:"/Api/CommentList/pay_commentend",
      dataType:"json",
      data:$("form").serialize(),
      success:function(data){
        
        if(data.status == 1){
          
          layer.open({
              type: 1,
              title: false,
              time:3000,
              closeBtn: 0,
              shadeClose: true,
              content: '<div id="layer">评价已提交，感谢您的建议</div>',
              success:function(){

                setTimeout(function(){
                    window.location.href = "/Buyer/Order/index.html";
                },3000);                  
                  
              }
            })
        }else{
            alert("提交失敗");
        }
      }
    })
    return false;
  })

  


  
})




/*  $('.star1').find('li').click(function(){
   var star1 =$(this).val();
   $.ajax({
  type:"POST",
  url : '{:U("Buy/Cart/upload")}',
  dataType:"json",
  data:{"star1":star1},
  success:function (data){
   
    if(data.status == 1){
   
     alert("提交成功");
    }else{
    alert("提交失败");
    } 
  }

 }, "json");
  
})
$('.star2').find('li').click(function(){
   var star2 =$(this).val();
   $.ajax({
  type:"POST",
  url : '{:U("Buy/Cart/upload")}',
  dataType:"json",
  data:{"star2":star2},
  success:function (data){
   
    if(data.status == 1){
   
     alert("提交成功");
    }else{
    alert("提交失败");
    }
  }

 }, "json");
  
})
$('.star3').find('li').click(function(){
   var star1 =$(this).val();
   $.ajax({
  type:"POST",
  url : '{:U("Buy/Cart/upload")}',
  dataType:"json",
  data:{"star3":star3},
  success:function (data){
   
    if(data.status == 1){
   
     alert("提交成功");
    }else{
    alert("提交失败");
    }
  }

 }, "json");
  
})
$('.star4').find('li').click(function(){
   var star1 =$(this).val();
   $.ajax({
  type:"POST",
  url : '{:U("Buy/Cart/upload")}',
  dataType:"json",
  data:{"star4":star4},
  success:function (data){
   
    if(data.status == 1){
   
     alert("提交成功");
    }else{
    alert("提交失败");
    }
  }

 }, "json");
  
})*/
  
/*$('.star2').find('li').click(function(){
   var star2 =$(this).val();
   
})
$('.star3').find('li').click(function(){
   var star3 =$(this).val();
   
})
$('.star4').find('li').click(function(){
   var star4 =$(this).val();
   
})*/


</script>
<script>
$(function(){
  $(".comment_list  tr th input[type='radio']").click(function(){
    var type=$(this).val();
    var productid=$(".productID").val();

    $.ajax({
      type:'POST',
      url : '{:U("Api/Comment/lists")}',
      dataType:"json",
      data:{"type":type,'productid':productid},
      success:function(data){
        console.log(data);
        if(data.status ==1){
             var Tab=$('.comment_list');
              for(var i=0;i<data.data.length;i++){
                $(Tab).find('tr:not(:first)').remove();
                var tr=$('<tr></tr>').appendTo(Tab);
                 var nowDate = data.data[i].addtime;
                      var date = new Date(nowDate*1000);
                      Y = date.getFullYear()+'-';
                      M = (date.getMonth()+1<10?'0'+(date.getMonth()+1):date.getMonth()+1)+'-';
                      D = date.getDate()+' ';
                      h = date.getHours()+':';
                      m = date.getMinutes()+':';
                      s = date.getSeconds();
                      var newDate = Y+M+D+h+m+s;
                       if(data.data[i].picture[0]){

                        if(data.data[i].isanonymous == 0){

                          $('<td><ul><li>'+data.data[i].content+'</li><li ><img src=\"'+data.data[i].picture[0]+'\"><img src=\"'+data.data[i].picture[1]+'\"></li><li>'+newDate+'</li></ul></td><td><ul>'+ $(".shop").find("ul").html() +'</ul></td><td><p>(匿名)</p></td>').appendTo(tr);
                        }else{
                          $('<td><ul><li>'+data.data[i].content+'</li><li ><img src=\"'+data.data[i].picture[0]+'\"><img src=\"'+data.data[i].picture[1]+'\"></li><li>'+newDate+'</li></ul></td><td><ul>'+ $(".shop").find("ul").html() +'</ul></td><td><p>'+data.data[i].username+'</p></td>').appendTo(tr);
                        }
                      }else{
                        if(data.data[i].isanonymous == 0){
                          $('<td><ul><li>'+data.data[i].content+'</li><li >'+newDate+'</li></ul></td><td><ul>'+ $(".shop").find("ul").html() +'</ul></td><td><p>(匿名)</p></td>').appendTo(tr);
                        }else{
                          $('<td><ul><li>'+data.data[i].content+'</li><li >'+newDate+'</li></ul></td><td><ul>'+ $(".shop").find("ul").html() +'</ul></td><td><p>'+data.data[i].username+'</p></td>').appendTo(tr);
                        }
                      }   
              }
        }
      }
    });

    
  }).eq(0).trigger("click");;
});
</script>

</body>
</html>
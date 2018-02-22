<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>卖家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>
    <!--控制图片上传：-->
    <template file="common/_global_js.php"/>
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
</head>
<body>
  <!--背景容器-->
  <template file="Seller/common/_header.php"/>

  <div class="productdetail_box">
    <div class="head">
      填写宝贝基本信息
      <p>
        <span>*</span>
        表示该项必填
      </p>
    </div>
    <div class="leftbox">
      <h4>产品信息</h4>
      <p>类目>>网购建材>>{$categoryName}</p>
      <a href="{:U('selectcate')}" >编辑类目</a>
    </div>
    <div class="rightbox">
      <form id="form_add"  method="post"  onsubmit="return checkForm()">
        <input type='hidden' value='Seller' name='g'>
        <input type='hidden' value='Material' name='m'>
       <empty name="Think.get.id">
          <input type='hidden' value='add' name='a'>  
        <else/>
          <input type='hidden' value='edit' name='a'>
        </empty>
      <h4>1、宝贝基本信息</h4>
      <dl>
        <dt><i>*</i>宝贝标题：</dt>
        <dd class="title"><input type="text" name="title" value="{$data.title}"></dd>
        <dt><i>*</i>宝贝卖点：</dt>
        <dd><textarea name="sell_points" >{$data.sell_points}</textarea>
        <dt><i>*</i>宝贝属性：</dt>
        <dd class="attribute">
        <!--<p>关键属性：</p>-->
        <volist name="property" id ="vo">
          <if condition="$vo['is_key_prop'] == '1'">
          <div class="dt"><i>*</i>{$vo.name}:</div>
          <div class="dd">
          <select name="key_prop[{$vo.pid}]">
          <volist name="vo['value']" id='va'>
            <option value="{$va.vid}" <if condition="$data['key_prop'][$vo['pid']] == $va['vid']">selected</if>>{$va.name}</option>
          </volist>
          </select>
          </div>
          </if>
          </volist>
        <!--<p>非关键属性：</p>-->
          <!--非关键属性和非销售属性-->
          <volist name="property" id ="vo">
          <if condition="$vo['is_key_prop'] != '1' and $vo['is_sale_prop'] !='1'">
          <div class="dt">{$vo.name}:</div>
          <div class="dd">
            <!--枚举属性-->
            <if condition="$vo['is_enum_prop'] == '1'">
            <select name="nokey_prop[{$vo.pid}]">
              <volist name="vo['value']" id='va'>
                <option value="{$va.vid}" <if condition="$data['nokey_prop'][$vo['pid']] == $va['vid']">selected</if>>{$va.name}</option>
              </volist>
            </select>
            <else/>
            <!--非枚举属性-->
            <?php
            echo "<input type='text' name='nokey_prop[".$vo['pid']."]' value='".$data['nokey_prop'][$vo['pid']]."'></input>";
            ?>
            </if>
          </div>
          </if>
        </volist>
        </dd>
        <dt>宝贝规格：</dt>
        <!--销售属性-->
        <dd class="attribute">
        <!--销售属性 且 非颜色属性-->
        <volist name="property" id ="vo">
          <if condition="$vo['is_sale_prop'] =='1' and $vo['is_color_prop'] !=1" >
          <div class="dt">{$vo.name}:</div>
          <div class="dd" data-attr-name="{$vo.name}" data-pid="{$vo.pid}">
          <volist name="vo['value']" id='va'>
            <input type='checkbox' onclick="saleProp(this)" ></input>{$va.name}
          </volist>
          </div>
          </if>
        </volist>
        <!--销售属性 且 颜色属性-->
         <volist name="property" id ="vo">
          <if condition="$vo['is_sale_prop'] =='1' and $vo['is_color_prop'] ==1" >
          <div class="dt">{$vo.name}:</div>
          <div class="dd" data-attr-name="{$vo.name}" data-pid="{$vo.pid}">
          <volist name="vo['value']" id='va'>
            <input type='checkbox' onclick="colorProp(this)" ></input><input type="text" disabled data-vid="{$va.vid}" value="{$va.name}"></input>
          </volist>
          </div>
          <script type="text/javascript">$(function(){$(".picOfcolor").show()})</script>
          </if>
        </volist>
         <table class="picOfcolor" hidden>
          <thead>
            <th>颜色</th>
            <th>图片</th>
          </thead>
          <tbody></tbody>
        </table>
        <table class="sale_attr">
          <thead>
            <tr>
              <notempty  name="data['sale_prop']"><th>颜色分类</th></notempty>
              <th><i>*</i>价格</th>
              <th><i>*</i>数量</th>
              <th>商家编码</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            <volist name="data['sale_prop']" id="vo">
              <tr data-vid="{$key}">
                  <td>{$vo['0']}</td>
                  <td><input type='hidden' name='sale_prop["{$key}"][]' value="{$vo['0']}">
                    <input type='text' name='sale_prop["$key"][]' value="{$vo['1']}">
                  </td>
                  <td><input type='text' name='sale_prop["{$key}"][]' value="{$vo['2']}"></td>
                  <td><input type='text' name='sale_prop["{$key}"][]' value="{$vo['3']}"></td>
                  <td><a href="javascript:void(0)" onclick="javascript:$(this).parent().parent().remove();">删除</a></td>
                </tr>
            </volist>
          </tbody>
        </table>
        </dd>
        <dt><i>*</i>商家编码：</dt>
        <dd><input name="shopcode" value="{$data.shopcode}"></input></dd>
        <dt><i>*</i>宝贝数量</dt>
        <dd><input name="number" value="{$data.number}"></input></dd>
        <dt><i>*</i>计价单位</dt><dd><input type="hidden" name="charge_unit" value="元/㎡"></input>元/㎡</dd>
        <dt>付款模式：</dt><dd><input type="hidden" name="pay_mode" value="一口价"></input>一口价</dd>
        <dt>采购地：</dt>
        <dd>
          <input type="hidden" name="purchase_addr" class="refreshclear" data-default-v="<empty name='data.purchase_addr'>0<else/>{$data.purchase_addr}</empty>" data-inpname="purchase_addr" value="<empty name='data.purchase_addr'>0<else/>{$data.purchase_addr}</empty>">
          <em data-v="1" data-radioname="persontype_1" data-toinpname="purchase_addr" data-group="persontype_group" class="<?php echo ($data['purchase_addr'] ==1)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em> 
          <label data-forradio="persontype_1" class="forradio">国内</label>
          <em data-v="2" data-radioname="persontype_2" data-toinpname="purchase_addr" data-group="persontype_group" class="<?php echo ($data['purchase_addr'] ==2)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
          <label data-forradio="persontype_2" class="forradio">海外</label>
        </dd>
        <dt><i>*</i>宝贝图片：</dt>
        <dd class="imgbox">
          <ul class="title">
            <li>本地上传</li>
          </ul>
          <ul class="explain">
            <li>文件上传:</li>
            <li>
              <a href="javascript:upfile('product_picture')">上传图片</a>
              <p class="tips">提示：1、图片上传大小不得超过3M</p>
              <p class="tips">2、本类目下您最多可以上传五张图片</p>
            </li>
          </ul>
          <ul class="img" id="product_picture">
             <?php
            foreach ($picture_urls as $key => $url){
              echo "<li id='image".$key."'><input type='hidden' name='product_picture_url[]' value='".$url."'><img src='";
              echo $url;
              echo "'><br><a href=\"javascript:remove_div('image".$key;
              echo "')\" class='tupian' >删除</a></li>";
            }
            ?>
          </ul>
        </dd>
        <!--
          <dt>宝贝视频：</dt>
          <dd class="video">
          <div>暂无视频</div>
          <input type="button" value="请选择视频"></dd>
        -->
        <dt>
        <i>*</i>
        宝贝展示：
        </dt>
        <dd>
           <script type="text/plain" id="content" name="show">{$data.show}</script><?php echo Form::editor('content','full','Content',$catid,1); ?>
        </dd>
        <dt>店铺所属的分类：</dt>
        <dd><textarea name="cate_inshop" >{$data.cate_inshop}</textarea></dd>
     <h4>3.其他信息</h4>
      <dl class="other">
         <dt>合同：</dt>
        <dd>
        <span>
          <em data-v="1" data-radioname="agreement_1" data-toinpname="agreement" data-group="agreement_group" class="<?php echo ($data['agreement'] ==1)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
          <label data-forradio="is_agreement_1" class="forradio">有合同</label>
          <em data-v="2" data-radioname="agreement_0" data-toinpname="agreement" data-group="agreement_group" class="<?php echo ($data['agreement'] ==2)?"bindinput radiogroup on":"bindinput radiogroup" ?>" onclick="document.getElementById('notes').style.visibility='visible';"></em>
          <label data-forradio="is_agreement_0" class="forradio" >没合同</label>
          <em data-v="3" data-radioname="agreement_2" data-toinpname="agreement" data-group="agreement_group" class="<?php echo ($data['agreement'] ==3)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
          <label data-forradio="is_agreement_2" class="forradio">无</label>
        </span>
        </dd> 
        //jia
        <dd id="notes" class="white_content">
         <p>nihao </p>
        <a class="baby_address_hidden" href="javascript:void(0)" onclick="document.getElementById('notes').style.visibility='hidden';">确定</a>
        </dd> 

        <dt>会员打折：</dt>
        <dd>
        <input type="hidden" name="is_member_discount" class="refreshclear" data-default-v="<empty name='data.is_member_discount'>0<else/>{$data.is_member_discount}</empty>" data-inpname="is_member_discount" value="<empty name='data.is_member_discount'>0<else/>{$data.is_member_discount}</empty>">
          <span>
            <em data-v="0" data-radioname="is_member_discount_0"  data-toinpname="is_member_discount" data-group="is_member_discount_group" class="<?php echo ($data['is_member_discount'] == "1")?"bindinput radiogroup":"on bindinput radiogroup"?>"></em>
            <label data-forradio="is_member_discount_0" class="forradio">不参与会员打折</label>
            
          </span>
          <span>
            <em data-v="1" data-radioname="is_member_discount_1" data-toinpname="is_member_discount" data-group="is_member_discount_group" class="<?php echo ($data['is_member_discount'] == "1")?"bindinput radiogroup on":"bindinput radiogroup"?>"></em>
            <label data-forradio="is_member_discount_1" class="forradio">参与会员打折</label>
          </span>
        </dd>
        <dt>库存记数：</dt>
        <dd>
          <span>
            <em data-v="1" data-radioname="stock_type_1" data-toinpname="stock_type" data-group="stock_type_group" class="<?php echo ($data['stock_type'] != 2)?"bindinput radiogroup on":" bindinput radiogroup"?>">
              <input type="hidden" name="stock_type"  class="refreshclear" data-default-v="<empty name='data.stock_type'>1<else/>{$data.stock_type}</empty>" data-inpname="stock_type" value="<empty name='data.stock_type'>1<else/>{$data.stock_type}</empty>"></em>
            <label data-forradio="stock_type_1" class="forradio">拍下减库存</label>
          </span>
          <span>
            <em data-v="2" data-radioname="stock_type_2" data-toinpname="stock_type" data-group="stock_type_group" class="<?php echo ($data['stock_type'] == 2)?" on bindinput radiogroup":" bindinput radiogroup"?>"></em>
           <label data-forradio="stock_type_2" class="forradio">付款减库存</label>
          </span>
        </dd>
        <dt>有  效  期：</dt>
        <dd>
          <span>

            <em class="on"><input type="hidden"  name="expiry_date" value="1"></em>
            <label>7天</label>          

          </span>
        </dd>
        <dt>开始时间：</dt>
        <dd>
        <input type="hidden" name="starttime_type" class="refreshclear" data-default-v="<empty name='data.starttime_type'>1<else/>{$data.starttime_type}</empty>" data-inpname="starttime_type" value="<empty name='data.starttime_type'>1<else/>{$data.starttime_type}</empty>">        
          <span>

            <em data-v="1" data-radioname="starttime_1" data-toinpname="starttime_type" data-group="starttime_group" class="<?php echo (($data['starttime_type'] ==1) || empty($data['starttime_type']))?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="starttime_1" class="forradio">立刻</label>
          </span>
          <br>
          <span>
            <em data-v="2" data-radioname="starttime_2" data-toinpname="starttime_type" data-group="starttime_group" class="<?php echo ($data['starttime_type'] ==2)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="starttime_2" class="forradio">设定</label>
            <input type="text" name="starttime" id="starttime" value="<?php echo ($data['starttime_type'] ==2)?$data['starttime']:date('Y-m-d H:i') ?>" class="J_datetime input" >
          </span>
          <br>
          <span>
            <em data-v="3" data-radioname="starttime_3" data-toinpname="starttime_type" data-group="starttime_group" class="<?php echo ($data['starttime_type'] ==3)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="starttime_3" class="forradio">放入仓库</label>

          </span>
        </dd>
        <dt>橱窗推荐：</dt>
        <dd>
        <input type="hidden" name="is_showcase" class="refreshclear" data-default-v="<empty name='data.is_showcase'>0<else/>{$data.is_showcase}</empty>" data-inpname="is_showcase" value="<empty name='data.is_showcase'>0<else/>{$data.is_showcase}</empty>">
          <span>
            <em data-v="0" data-radioname="is_showcase_0" data-toinpname="is_showcase" data-group="is_showcase_group" class="<?php echo ($data['is_showcase'] ==0)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="is_showcase_0" class="forradio">否</label>
            <em data-v="1" data-radioname="is_showcase_1" data-toinpname="is_showcase" data-group="is_showcase_group" class="<?php echo ($data['is_showcase'] ==1)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="is_showcase_1" class="forradio">是</label>
          </span>
        </dd>
      </dl>
      <div class="end">
        <!--<a href="">预览</a>-->
        <a href="javascript:$('#form_add').submit()">发布</a>
        <a href="{:U('lists')}">取消</a>
        <input type="hidden" name="cid" value="{$Think.get.inpcid}">
        <input type="hidden" name="vid" value="{$Think.get.inpvid}">
      </div>
      </form>
    </div>
<template file="Seller/common/_footer.php"/>
<script type="text/javascript">
    //全局变量
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
        $max = 5;
        $authkey = upload_key("$max,$alowexts,1,$thumb_ext,$watermark_setting");
      ?>
    function upfile(id){
      flashupload(id+'_images', '图片上传',id,submit_pic,'{$max},{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
    }
    function submit_pic(uploadid,returnid){
      var d = uploadid.iframe.contentWindow;
      var in_content = d.$("#att-status").html().substring(1);
      var in_filename = d.$("#att-name").html().substring(1);
      var str = $('#' + returnid).html();
      var contents = in_content.split('|');
      var filenames = in_filename.split('|');
      if (contents == '') return true;
      $.each(contents, function (i, n) {
          var ids = parseInt(Math.random() * 10000 + 10 * i);
          var filename = filenames[i].substr(0, filenames[i].indexOf('.'));
          console.log(ids);
          str += "<li id='image"+ids+"'><input type='hidden' name='"+returnid+"_url[]' value='" + n + "'><img src='"+n+"'><br><a href=\"javascript:remove_div('image" + ids + "')\" class='tupian' >删除</a></li>";
      });
      $('#' + returnid).html(str);
    }
    //checkbox 颜色分类属性点击事件处理
    function colorProp(obj) {
      if($(obj).attr('checked') == 'checked'){
        $(obj).next().removeAttr('disabled');
        setAttrTable(obj,true);
        setPicOfcolor(obj,true);
      }else{
        $(obj).next().attr("disabled","disabled");
        setAttrTable(obj,false);
        setPicOfcolor(obj,false);
      }
    }
    //checkbox 其他销售属性点击事件处理
    function saleProp(obj) {
   
    }
    //销售属性Table响应事件
    function setAttrTable(obj,add){
      //同级选中元素个数
      var sibChkNum = $(obj).siblings("input:checked").length;
      //分类属性名称
      var attr_cate_name = $(obj).parent().attr('data-attr-name');
      //属性VID
      var attr_vid  = $(obj).next().attr("data-vid");
      //属性名称
      var attr_name = $(obj).next().val();
      //判断标题是否存在
      var title_exist = false;
      $(".sale_attr").children("thead").children("tr").children("th").each(function(){
          if($(this).text() == attr_cate_name ){
            title_exist = true;
          }
      });
      //删除记录行
      if(title_exist && !add ){
        $("tr[data-vid='"+attr_vid+"']").remove();
      }
      //删除记录后如果记录为空，则删除标题
      if(!add && sibChkNum <= 0){
          $(".sale_attr").children("thead").children("tr").children("th").each(function(){
          if($(this).text() == attr_cate_name ){
            $(this).remove();
          }
        });
      }
      //标题不存在，则先新建标题
      if(!title_exist && add){
          $(".sale_attr > thead > tr").prepend("<th>"+attr_cate_name+"</th>");
          title_exist = true;
      }
      //新增记录行
      if(title_exist && add){
        $(".sale_attr > tbody").append("<tr data-vid='"+attr_vid+"'><td>"+attr_name+"</td><td><input type='hidden' name='sale_prop["+attr_vid+"][]' value='"+attr_name+"'><input type='text' name='sale_prop["+attr_vid+"][]' value=''></td><td><input type='text' name=sale_prop["+attr_vid+"][]' value=''></td><td><input type='text' name='sale_prop["+attr_vid+"][]' value=''></td></tr>");
      }
    }
    //设置颜色图片
    function setPicOfcolor(obj,add){
         //属性VID
        var attr_vid  = $(obj).next().attr("data-vid");
        //属性名称
        var attr_name = $(obj).next().val();
        if(add){
            $(".picOfcolor > tbody").append("<tr data-vid='"+attr_vid+"'><td>"+attr_name+"</td><td><input type='text'></input></td></tr>");
        }else{
            $("tr[data-vid='"+attr_vid+"']").remove();
        }
    }
    //提交时检查待提交数据是否合法
    function checkForm(){
      //宝贝类型 4选一
      // if($(".type input:checked").length <=0){
      //   alert("必须选择至少一种宝贝类型！");
      //   return false;
      // }
      //宝贝类型 选择之后必须填写属性值
      var ret = true;
      $(".type input:checkbox").each(function(){
        //遍历所有type下的 checkbox的状态
        if(!ret){return false;}
        if($(this).attr("checked") =="checked"){
          //遍历所有checkbox状态为checked的输入标签
          var name = $(this).attr('name');
          $(":text[name='"+name+"']").each(function(){
            if($(this).val() == ""){
             alert("请填写完整信息！"); 
             $(this).focus().select();
             ret=false;
             return ret;
            }
          });
        }
      });
      if(!ret){return false;}
    }
  </script>
</body>
</html>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>卖家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>
    <!--<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>-->
    <!--<link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />-->
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/seller_reg.js"></script>
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
      <p>类目>>设计>>家装设计</p>
      <input type="button" value="编辑类目">
    </div>
    <div class="rightbox">
      <form id="form_edit_design" action="{:U('edit',array('id'=>$data['id']))}" method="post"  onsubmit="return checkForm()">
         <input type="hidden" name="id" value="{$Think.get.id}">
      <h4>1、宝贝基本信息</h4>
      <dl>
        <dt> <i>*</i>
          宝贝标题：
        </dt>
        <dd class="title">
          <input type="text" name="title[]" value="{$title[0]}">
          +
          <input type="text" name="title[]" value="{$title[1]}">
          +
          <input type="text" name="title[]" value="{$title[2]}">
          +
          <input type="text" name="title[]" value="{$title[3]}">
          +
          <input type="text" name="title[]" value="{$title[4]}">
          <p class="tips">注：请用简单的词或短句来组成您的宝贝标题，更容易被搜索到；最多可添加五个词组</p>
        </dd>
        <dt>设计理念：</dt>
        <dd>
          <textarea name="idea">{$data.idea}</textarea>
        </dd>
        <dt>宝贝属性：</dt>
        <dd class="attribute">
          <div class="dt"> <i>*</i>设计风格：</div>
          <div class="dd" id="styles">
            <input class="add" type="button" value="添加风格" onclick="addstyle()">
            <volist name="attr_style" id="as">
            <!--<Form function="select" parameter="option('attr_style'),'2',class='' name='attr_style[]',$as"/>-->
            <div class='style_{$key}'><if condition="$key != 0"><input type='button'value='取消' onclick='javascript:$(".style_{$key}").remove();' ></if>
             <select name="attr_style[]">
              <volist name="style" id="vo">
                <if condition="($vo['child'] neq '0') AND ($vo['pid'] eq '0') ">
                <optgroup label="{$vo.key}">
                <volist name="style" id="sub">
                  <if condition ="$sub['pid'] eq $vo['id']">
                    <option <if condition="$as eq $sub['key']">selected</if> >{$sub.key}</option>
                  </if>
                </volist>
                </optgroup>
                <elseif condition="($vo['child'] eq '0') AND ($vo['pid'] eq '0') "/>
                  <option <if condition="$as eq $vo['key']">selected</if> >{$vo.key}</option>
                </if>
              </volist>
            </select></div>
            </volist>
          </div>
          <div class="dt">案例面积：</div>
          <div class="dd">
            <Form function="select" parameter="option('attr_area'),$data['attr_area'],class='' name='attr_area'"/>
          </div>
          <div class="dt">案例户型：</div>
          <div class="dd">
            <Form function="select" parameter="option('attr_huxing'),$data['attr_huxing'],class='' name='attr_huxing'"/>
          </div>
          <div class="dt">局部设计：</div>
          <div class="dd">
            <Form function="select" parameter="option('attr_jubu'),$data['attr_jubu'],class='' name='attr_jubu'"/>
          </div>
          <div class="dt">独立空间：</div>
          <div class="dd">
            <Form function="select" parameter="option('attr_kongjian'),$data['attr_kongjian'],class='' name='attr_kongjian'"/>
          </div>
          <div class="dt">宝贝编码：</div>
          <div class="dd">
            <input type="" name="attr_code" value="{$data.attr_code}"></div>
        </dd>
        <dt>
          <i>*</i>
          计价单位：
        </dt>
        <dd>元/㎡</dd>
        <dt>付款模式：</dt>
        <dd>一口价</dd>
        <dt>
          <i>*</i>
          <!--设计师资历：-->
          专属设计师
        </dt>
        <dd class="desqua">

          <!--<Form function="select" parameter="option('designer_qualification'),'',class='' name='designer_qualification'"/>-->
          
          <!--<em class="bindchk on ispersonal" data-forchkname="is_personal" data-bindshow="haspersonal"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />-->
            <!--<input type="checkbox" class="refreshchk" data-default-v="1" data-chkname="is_personal" name='is_personal' value='1'></em>-->
          <!--专属设计师-->
          
          <cite class="bindchkshow" data-showname="haspersonal" >
          <select name="designer_name" id="designername"> 
          <option value="">-选择设计师-</option>
          <volist name="designerList" id="vo">
            <option value="{$vo.id}" <if condition="$data['designer_name'] == $vo['id']">selected</if>>{$vo.name}</option>
            </volist>
          </select>
          
          <em class="<?php echo ($data.is_home =="" )?"bindchk off":"bindchk on"; ?>" data-forchkname="is_home"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></em> 
          <input type="checkbox" class="refreshchk" data-default-v="1" data-chkname="is_home" value="1" name="is_home" id="homepage" onclick="getchecked()">
          主页显示
          <input type="hidden" name="persontype" class="refreshclear" data-default-v="{$data.is_home}" data-inpname="persontype" value="{$data.is_home}">
          <em data-v="1" data-radioname="persontype_1" data-toinpname="persontype" data-group="persontype_group" class="<?php echo ($data['is_home'] =="1")?"on bindinput radiogroup":"bindinput radiogroup" ?>"></em> 
          <label data-forradio="persontype_1" class="forradio">案例</label>
          <em data-v="2" data-radioname="persontype_2" data-toinpname="persontype" data-group="persontype_group" class="<?php echo ($data['is_home'] =="2")?"on bindinput radiogroup":"bindinput radiogroup" ?>"></em>
          <label data-forradio="persontype_2" class="forradio">作品集</label>
          </cite>
        </dd>
        
        <dt>
          <i>*</i>
          宝贝类型：
        </dt>
        <dd class="type">
          <table>
            <tr>
              <td>类型</td>
              <td>计价单位</td>
              <td>市场价格</td>
              <td>活动价格</td>
              <td>数量</td>
            </tr>
            <tr>
              <td>
               <em class="<?php echo in_array("on",$type['独立空间效果图'])?"bindchk on":"bindchk"?>" data-forchkname="product_type1">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("on",$type['独立空间效果图'])?"1":"0"?>" data-chkname="product_type1"  name="product_type[独立空间效果图][]"  id="indep_effect" >
                </em>
                独立空间效果图
              </td>
              <td>元/套</td>
              <td><input type="text" name="product_type[独立空间效果图][]" id="indep_effect_price"  value="{$type['独立空间效果图'][1]}"></input></td>
              <td><input type="text" name="product_type[独立空间效果图][]" id="indep_effect_price_act"  value="{$type['独立空间效果图'][2]}"></input></td>
              <td><input type="text" name="product_type[独立空间效果图][]" id="indep_effect_num" value="{$type['独立空间效果图'][3]}" ></input></td>
            </tr>
            <tr>
              <td>
              <em class="<?php echo in_array("on",$type['全屋效果图'])?"bindchk on":"bindchk"?>" data-forchkname="product_type2">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("on",$type['全屋效果图'])?"1":"0"?>" data-chkname="product_type2"  name="product_type[全屋效果图][]"  id="full_effect">
                </em>
             
                全屋效果图
              </td>
              <td>元/套</td>
               <td><input type="text" name="product_type[全屋效果图][]"  id="full_effect_price" value="{$type['全屋效果图'][1]}" ></input></td>
               <td><input type="text" name="product_type[全屋效果图][]"  id="full_effect_price_act" value="{$type['全屋效果图'][2]}" ></input></td>
              <td><input type="text" name="product_type[全屋效果图][]"  id="full_effect_num"  value="{$type['全屋效果图'][3]}"></input></td>
            </tr>
            <tr>
              <td>
              <em class="<?php echo in_array("on",$type['独立空间套图'])?"bindchk on":"bindchk"?>" data-forchkname="product_type3">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("on",$type['独立空间套图'])?"1":"0"?>" data-chkname="product_type3"  name="product_type[独立空间套图][]"  id="indep_sets">
                </em>
              
                独立空间套图
              </td>
              <td>元/㎡</td>
               <td><input type="text" name="product_type[独立空间套图][]" id="indep_sets_price"  value="{$type['独立空间套图'][1]}" ></input></td>
               <td><input type="text" name="product_type[独立空间套图][]" id="indep_sets_price_act"  value="{$type['独立空间套图'][2]}" ></input></td>
              <td><input type="text" name="product_type[独立空间套图][]"  id="indep_sets_num" value="{$type['独立空间套图'][3]}" ></input></td>
            </tr>
            <tr>
              <td>
              <em class="<?php echo in_array("on",$type['全屋套图'])?"bindchk on":"bindchk"?>" data-forchkname="product_type4">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("on",$type['全屋套图'])?"1":"0"?>" data-chkname="product_type4"  name="product_type[全屋套图][]"  id="full_sets">
                </em>
                全屋套图
              </td>
              <td>元/套</td>
               <td><input type="text" name="product_type[全屋套图][]" id="full_sets_price"  value="{$type['全屋套图'][1]}" ></input></td>
               <td><input type="text" name="product_type[全屋套图][]" id="full_sets_price_act"  value="{$type['全屋套图'][2]}" ></input></td>
              <td><input type="text" name="product_type[全屋套图][]"  id="full_sets_num" value="{$type['全屋套图'][3]}" ></input></td>
            </tr>
          </table>
        </dd>
        <dt>
                <dt><i>*</i>价格活动：</dt>
        <dd><Form function="select" parameter="option('activity'),$data['activity'],class='' name='activity',无"/></dd>
        <dt>
          <i>*</i>
          宝贝图片：
        </dt>
        <dd class="imgbox">
          <ul class="explain">
            <li>&nbsp;</li>
            <li>
              <a class="btnuppic" href="javascript:upfile('product_picture')">上传图片</a>
              <p class="tips">提示：1、图片上传大小不得超过4M</p>
              <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
            </li>
          </ul>
          <ul class="img jsaddimgul" id="product_picture">.
            <for start="0" end="$maxPicNum">
              <if condition="$picture_urls[$i] neq ''">
                <li class=''>
                  <input type="hidden" name="product_picture_url[]" value="{$picture_urls[$i]}">
                  <img src="{$picture_urls[$i]}">
                  <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                </li>
              <else/>
                <li class="noimg"></li>
              </if>
            </for>
        </ul>
        </dd>
        <dt>
        <i>*</i>
        宝贝展示：
        </dt>
       <dd style="position: relative;">
            <div class="showaytit chtitul "  data-tag="chshowway">
                <input type="hidden" name="showway" class="refreshclear" data-default-v="<empty name='data.showway'>1<else/>{$data.showway}</empty>" data-inpname="showway" value="<empty name='data.showway'>1<else/>{$data.showway}</empty>">
                <em data-v="1" data-radioname="radshowway_0" data-toinpname="showway" data-group="showway_group" class="<?php echo (($data['showway'] ==1)|| empty($data['showway']))?"bindinput chtitli radiogroup on":"bindinput chtitli radiogroup" ?>"></em>
                <label data-forradio="radshowway_0" class="forradio">普通编辑</label>
                <em data-v="2" data-radioname="radshowway_1" data-toinpname="showway" data-group="showway_group" class="<?php echo ($data['showway'] ==2)?"bindinput chtitli radiogroup on":"bindinput chtitli radiogroup" ?>"></em>
                <label data-forradio="radshowway_1" class="forradio">高级编辑</label>
                <em data-v="3" data-radioname="radshowway_2" data-toinpname="showway" data-group="showway_group" class="<?php echo ($data['showway'] ==3)?"bindinput chtitli radiogroup on":"bindinput chtitli radiogroup" ?>"></em>
                <label data-forradio="radshowway_2" class="forradio">选择模板</label>
            </div>
            <style type="text/css">
            .showwaycon{display: none;}
            </style>
            <div data-tag="chshowway" class="chconul">
                <div class="showwaycon chconli" <?php if (($data['showway'] ==1|| empty($data['showway'])) ) echo "style='display:block'" ?> >
                    <script type="text/plain" id="content" name="show">{$data.show}</script><?php echo Form::editor('content','ztshopdecnor','Content',$catid,1); ?>
                </div>

                <div class="showwaycon chconli" <?php if (($data['showway'] ==2))  echo "style='display:block'" ?> >
                    <a href="javascript:void(0);" class="btnproshowedit btnproadvedit">高级编辑</a>
                    <div class="ecplaypreview" id="ecplaypreview">{$data.showecplay}</div>
                    <textarea name="showecplay" class="contentecplay" id="contentecplay" >{$data.showecplay}</textarea>
                </div>
                <div class="showwaycon chconli" <?php if (($data['showway'] ==3) ) echo "style='display:block'" ?> >
                    <a href="javascript:void(0);" class="btnproshowedit">选择模板</a>
                </div>
            </div>

        </dd>
        <!--
          <dt>宝贝视频：</dt>
          <dd class="video">
          <div>暂无视频</div>
          <input type="button" value="请选择视频"></dd>
        -->
        <!--<dt>-->
        <!--<i>*</i>-->
        <!--宝贝展示：-->
        <!--</dt>-->
        <!--<dd>一口价</dd>-->
      </dl>
      <h4>2.设计服务信息</h4>
      <dl class="serve">
        <dt>增值服务：</dt>
        <dd>
          <table>
            <tr>
              <td>
              
                <em class="<?php echo in_array("现场跟踪指导",$service_added)?"bindchk on":"bindchk"?>" data-forchkname="service_added1" data-bindshow="service_addedshow1">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("现场跟踪指导",$service_added)?"1":"0"?>" data-chkname="service_added1"  name="service_added[]" id="service_added_add_xianchang" value="现场跟踪指导">

                </em>
                现场跟踪指导
              </td>
              <td>
                <?php 
                if(in_array("现场跟踪指导",$service_added)){
                  echo '<input type="text" placeholder="次" data-showname="service_addedshow1" name="service_added[]" class=""  id="track_times" value="';
                  echo $service_added[1];
                  echo '" ></td>';
                }
                else{
                  echo '<input type="text" placeholder="次" data-showname="service_addedshow1" name="service_added[]" class="bindchkshow"  id="track_times" ></td>';
                }
                ?>
            </tr>
            <tr>
              <td>

                <em class="<?php echo in_array("电话指导",$service_added)?"bindchk on":"bindchk"?>" data-forchkname="service_added2" data-bindshow="service_addedshow2" >
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("电话指导",$service_added)?"1":"0"?>" data-chkname="service_added2" name="service_added[]" id="service_added_add_dianhua" value="电话指导">

                </em>
                电话指导
              </td>
              <td>
                <?php 
                if(in_array("电话指导",$service_added)){
                  echo '<input type="text" placeholder="次" data-showname="service_addedshow2" name="service_added[]" id="guide_phone" class="" value="';
                  echo $service_added[3];
                  echo '" ></td>';
                }
                else{
                  echo '<input type="text" placeholder="次" data-showname="service_addedshow2" name="service_added[]" id="guide_phone" class="bindchkshow" ></td>';
                }
                ?>
            </tr>
          </table>
          <table>
            <tr>
              <td>

                <em class="<?php echo in_array("软装设计",$service_added)?"bindchk on":"bindchk"?>" data-forchkname="service_added3">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("软装设计",$service_added)?"1":"0"?>" data-chkname="service_added3" name="service_added[]" value="软装设计">

                </em>
                软装设计
              </td>
              <td>

                <em class="<?php echo in_array("软装配饰代购",$service_added)?"bindchk on":"bindchk"?>" data-forchkname="service_added4">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("软装配饰代购",$service_added)?"1":"0"?>" data-chkname="service_added4" name="service_added[]" value="软装配饰代购">

                </em>
                软装配饰代购
              </td>
            </tr>
            <tr>
              <td>

                <em class="<?php echo in_array("材料推荐",$service_added)?"bindchk on":"bindchk"?>" data-forchkname="service_added5">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("材料推荐",$service_added)?"1":"0"?>" data-chkname="service_added5" name="service_added[]" value="材料推荐">

                </em>
                材料推荐
              </td>
              <td>

                <em class="<?php echo in_array("主材推荐",$service_added)?"bindchk on":"bindchk"?>" data-forchkname="service_added6">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("主材推荐",$service_added)?"1":"0"?>" data-chkname="service_added6" name="service_added[]" value="主材推荐">

                </em>
                主材推荐
              </td>
              <td>

                <em class="<?php echo in_array("灯具推荐",$service_added)?"bindchk on":"bindchk"?>" data-forchkname="service_added7">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("灯具推荐",$service_added)?"1":"0"?>" data-chkname="service_added7" name="service_added[]" value="灯具推荐">

                </em>
                灯具推荐
              </td>
              <td>

                <em class="<?php echo in_array("家具推荐",$service_added)?"bindchk on":"bindchk"?>" data-forchkname="service_added8">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("家具推荐",$service_added)?"1":"0"?>" data-chkname="service_added8" name="service_added[]" value="家具推荐">

                </em>
                家具推荐
              </td>
              <td>

                <em class="<?php echo in_array("厨卫推荐",$service_added)?"bindchk on":"bindchk"?>" data-forchkname="service_added9">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("厨卫推荐",$service_added)?"1":"0"?>" data-chkname="service_added9" name="service_added[]" value="厨卫推荐">

                </em>
                厨卫推荐
              </td>
              <td>

                <em class="<?php echo in_array("配饰推荐",$service_added)?"bindchk on":"bindchk"?>" data-forchkname="service_added10">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("配饰推荐",$service_added)?"1":"0"?>" data-chkname="service_added10" name="service_added[]" value="配饰推荐">

                </em>
                配饰推荐
              </td>
            </tr>
          </table>
        </dd>
        <dt>
          <i>*</i>
          出图类型：
        </dt>
        <dd>
          <table>
            <tr>
              <td>效果图：</td>
            </tr>
            <tr>
              <td>
			   <em class="<?php echo in_array("亮点展示图",$pictype_effect)?"bindchk on":"bindchk"?>" data-forchkname="pictype_effect1">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input name="pictype_effect[]" class="refreshchk" data-default-v="<?php echo in_array("亮点展示图",$pictype_effect)?"1":"0"?>" data-chkname="pictype_effect1" type="checkbox" value="亮点展示图">

                </em>
                亮点展示图
              </td>
              <td>

                <em class="<?php echo in_array("空间展示图",$pictype_effect)?"bindchk on":"bindchk"?>" data-forchkname="pictype_effect2">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input name="pictype_effect[]" class="refreshchk" data-default-v="<?php echo in_array("空间展示图",$pictype_effect)?"1":"0"?>" data-chkname="pictype_effect2"  type="checkbox" value="空间展示图">

                </em>
                空间展示图
              </td>
              <td>

                <em class="<?php echo in_array("平布展示图",$pictype_effect)?"bindchk on":"bindchk"?>" data-forchkname="pictype_effect3">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input name="pictype_effect[]" class="refreshchk" data-default-v="<?php echo in_array("平布展示图",$pictype_effect)?"1":"0"?>" data-chkname="pictype_effect3"  type="checkbox" value="平布展示图">

                </em>
                平布展示图
              </td>
              <td>

                <em class="<?php echo in_array("自定义",$pictype_effect)?"bindchk on":"bindchk"?>" data-forchkname="pictype_effect4" data-bindshow="pictype_effectshow4">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox"  name="pictype_effect[]" class="refreshchk" data-default-v="<?php echo in_array("自定义",$pictype_effect)?"1":"0"?>" data-chkname="pictype_effect4" value="自定义" id="pictype_effect_custom">

                </em>
                自定义
              </td>
              <td>
                <?php 
                if(in_array("自定义",$pictype_effect)){
                  echo '<input class="" data-showname="pictype_effectshow4" type="text" name="pictype_effect[]" id="effect_custom" value="';
                  echo end($pictype_effect);
                  echo '" ></td>';
                }
                else{
                  echo '<input class="bindchkshow" data-showname="pictype_effectshow4" type="text" name="pictype_effect[]" id="effect_custom"   ></td>';
                }
                ?>
            </tr>
            <tr>
              <td>CAD图：</td>
            </tr>
            <tr>
              <td>

                <em class="<?php echo in_array("平面图",$pictype_cad)?"bindchk on":"bindchk"?>" data-forchkname="pictype_cad1">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" name="pictype_cad[]" class="refreshchk" data-default-v="<?php echo in_array("平面图",$pictype_cad)?"1":"0"?>" data-chkname="pictype_cad1" value="平面图">

                </em>
                平面图
              </td>
              <td>

                <em class="<?php echo in_array("家具平布图",$pictype_cad)?"bindchk on":"bindchk"?>" data-forchkname="pictype_cad2">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" name="pictype_cad[]" class="refreshchk" data-default-v="<?php echo in_array("家具平布图",$pictype_cad)?"1":"0"?>" data-chkname="pictype_cad2" value="家具平布图">

                </em>
                家具平布图
              </td>
              <td>

                <em class="<?php echo in_array("墙体改造图",$pictype_cad)?"bindchk on":"bindchk"?>" data-forchkname="pictype_cad3">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" name="pictype_cad[]" class="refreshchk" data-default-v="<?php echo in_array("墙体改造图",$pictype_cad)?"1":"0"?>" data-chkname="pictype_cad3" value="墙体改造图">

                </em>
                墙体改造图
              </td>
              <td>

                <em class="<?php echo in_array("水电平布图",$pictype_cad)?"bindchk on":"bindchk"?>" data-forchkname="pictype_cad4">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" name="pictype_cad[]" class="refreshchk" data-default-v="<?php echo in_array("水电平布图",$pictype_cad)?"1":"0"?>" data-chkname="pictype_cad4" value="水电平布图">

                </em>
                水电平布图
              </td>
            </tr>
            <tr>
              <td>

                <em class="<?php echo in_array("吊顶施工图",$pictype_cad)?"bindchk on":"bindchk"?>" data-forchkname="pictype_cad5">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" name="pictype_cad[]" class="refreshchk" data-default-v="<?php echo in_array("吊顶施工图",$pictype_cad)?"1":"0"?>" data-chkname="pictype_cad5" value="吊顶施工图">

                </em>
                吊顶施工图
              </td>
              <td>

                <em class="<?php echo in_array("电视墙施工图",$pictype_cad)?"bindchk on":"bindchk"?>" data-forchkname="pictype_cad6">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" name="pictype_cad[]" class="refreshchk" data-default-v="<?php echo in_array("电视墙施工图",$pictype_cad)?"1":"0"?>" data-chkname="pictype_cad6" value="电视墙施工图">

                </em>
                电视墙施工图
              </td>
              <td>

                <em class="<?php echo in_array("自定义",$pictype_cad)?"bindchk on":"bindchk"?>" data-forchkname="pictype_cad7" data-bindshow="cad_custom">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" name="pictype_cad[]" class="refreshchk" data-default-v="<?php echo in_array("自定义",$pictype_cad)?"1":"0"?>" data-chkname="pictype_cad7" value="自定义" id="pictype_cad_custom">

                </em>
                自定义
              </td>
              <td>
                <?php 
                if(in_array("自定义",$pictype_cad)){
                  echo '<input type="text" class="" data-showname="cad_custom" name="pictype_cad[]" id="cad_custom" value="';
                  echo end($pictype_cad);
                  echo '" ></td>';
                }
                else{
                  echo '<input type="text" class="bindchkshow" data-showname="cad_custom" name="pictype_cad[]" id="cad_custom" ></td>';
                }
                ?>
            </tr>
          </table>
        </dd>
      </dl>
      <h4>3.其他信息</h4>
      <dl class="other">
        <dt>合同：</dt>
         <input type="hidden" name="agreement" class="refreshclear" data-default-v="<empty name='data.agreement'>0<else/>{$data.agreement}</empty>" data-inpname="agreement" value="<empty name='data.agreement'>0<else/>{$data.agreement}</empty>">
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
        <dd id="notes" class="white_content">
        <p>注：您上传的宝贝，选择不与消费者签订线下合同，一旦发生纠纷，

          装途网将根据《装途网服务协议》处理。  </p>
        <a class="baby_address_hidden" href="javascript:void(0)" onclick="document.getElementById('notes').style.visibility='hidden';">确定</a>
        </dd>   
        <dt>会员打折：</dt>
        <dd>
        <input type="hidden" name="is_member_discount" class="refreshclear" data-default-v="{$data.is_member_discount}" data-inpname="is_member_discount" value="{$data.is_member_discount}">
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
            <em data-v="1" data-radioname="stock_type_1" data-toinpname="stock_type" data-group="stock_type_group" class="<?php echo ($data['stock_type'] == 1)?"bindinput radiogroup on":" bindinput radiogroup"?>">
              <input type="hidden" name="stock_type"  class="refreshclear" data-default-v="{$data.stock_type}" data-inpname="stock_type" value="{$data.stock_type}"></em>
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

            <em class="on"><input type="hidden" name="expiry_date" value="1"></em>
            <label>7天</label>          

          </span>
        </dd>
        <dt>开始时间：</dt>
        <dd>
        <input type="hidden" name="starttime_type" class="refreshclear" data-default-v="{$data.starttime_type}" data-inpname="starttime_type" value="{$data.starttime_type}">        
          <span>

            <em data-v="1" data-radioname="starttime_1" data-toinpname="starttime_type" data-group="starttime_group" class="<?php echo ($data['starttime_type'] ==1)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
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
        <input type="hidden" name="is_showcase" class="refreshclear" data-default-v="{$data.is_showcase}" data-inpname="is_showcase" value="{$data.is_showcase}">
          <span>
            <em data-v="0" data-radioname="is_showcase_0" data-toinpname="is_showcase" data-group="is_showcase_group" class="<?php echo ($data['is_showcase'] ==0)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="is_showcase_0" class="forradio">否</label>
            <em data-v="1" data-radioname="is_showcase_1" data-toinpname="is_showcase" data-group="is_showcase_group" class="<?php echo ($data['is_showcase'] ==1)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="is_showcase_1" class="forradio">是</label>
          </span>
        </dd>
      </dl>
      <div class="end">
        <a href="javascript:$('#form_edit_design').submit()">提交</a>
        <a href="{:U('lists')}">取消</a>
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
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>

<script type="text/javascript">
      
      <?php 
        $alowexts = "jpg|jpeg|gif|bmp|png";
        $thumb_ext = ",";
        $watermark_setting = 0;
        $module = "Seller";
        $catid = "0";
        $authkey = upload_key("$maxPicNum,$alowexts,1,$thumb_ext,$watermark_setting");
      ?>
    function upfile(id){
      flashupload(id+'_images', '图片上传',id,submit_pic,'{$maxPicNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
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
           var str = "<input type='hidden' name='"+returnid+"_url[]' value='" + n + "'><img src='"+n+"'><div class='operate'><span class='sl'></span><span class='sr'></span><a href=\"javascript:void(0)\" class='tupian' ></a></div>";
      	  $('#' + returnid).find(".noimg:first").html(str);
		      $('#' + returnid).find(".noimg:first").removeClass("noimg");
	  });
    }
    //checkbox 点击事件处理
    function getchecked() {
      $("#service_added_add_xianchang").attr("checked") == "checked"?$("#track_times").show():$("#track_times").hide();
      $("#service_added_add_dianhua").attr("checked") == "checked"?$("#guide_phone").show():$("#guide_phone").hide();
      $("#pictype_cad_custom").attr("checked") == "checked"?$("#cad_custom").show():$("#cad_custom").hide();
      $("#pictype_effect_custom").attr("checked") == "checked"?$("#effect_custom").show():$("#effect_custom").hide();
      //专属设计师 
      // $("#is_personal").attr("checked") =="checked"?$("#designername").removeAttr("readonly"):$("#designername").attr("readonly","readonly");
      //主页显示
      $("#homepage").attr("checked") =="checked"?$("#cases").show():$("#cases").hide();
    }
<?php $token = D('Member/Member')->saveToken($uid); ?>

  $(".btnproadvedit").click(function(){
      window.open("http://www.ecplay.com/zhuangtu/index.php?token={$token}&pageId=-1&moduleId={$id|default=-1}","zt_proedit");
  });

  function ecplaydone(content){
      console.log(content);
      $(".ecplaypreview").html(content);
      $("#contentecplay").html(content);
      //UE.getEditor('content').setContent(content);
  }

    //添加风格 响应事件
    function addstyle(){
      var count = $("select[name='attr_style[]']").length;
      console.log(count);
      if(count <3)
      {
        var name = "style_"+count;
        $("#styles").append("<div class='"+name+"'><input type='button'value='取消' onclick='javascript:$(\"."+name+"\").remove();' ></div>");
        $("select[name='attr_style[]']:first").clone(true).appendTo("."+name);
        // $("select[name='attr_style[]']:first").clone(true).appendTo("#styles");
      }
      else{
        alert("最多添加额外两种风格！");
      }
    }
    //提交时检查待提交数据是否合法
    function checkForm(){
      //宝贝类型 4选一
      if($(".type input:checked").length <=0){
        alert("必须选择至少一种宝贝类型！");
        return false;
      }
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

      $(".type input")
      //专属设计师名称
      // if($('#is_personal').attr('checked') == 'checked' && $('#designername').val() ==""){
      if($('#designername').val() ==""){
        alert('请填写专属设计师名称容!');
        $('#designername').focus().select();
        return false;
      }
      //增值服务：现场跟踪指导	
      if($('#service_added_add_xianchang').attr('checked') == 'checked' && $('#track_times').val() ==""){
        alert('请填写增值服务中现场跟踪指导的次数!');
        $('#track_times').focus().select();
        return false;
      }
      //增值服务：电话指导
       if($('#service_added_add_dianhua').attr('checked') == 'checked' && $('#guide_phone').val() ==""){
        alert('请填写增值服务中电话指导的号码!');
        $('#guide_phone').focus().select();
        return false;
      }
      //出图类型 ----CAD图自定义内容
      if($('#pictype_cad_custom').attr('checked') == 'checked' && $('#cad_custom').val() ==""){
        alert('请填写出图类型中CAD图的自定义内容!');
        $('#cad_custom').focus().select();
        return false;
      }
      //出图类型 ----效果图自定义内容
      if($('#pictype_effect_custom').attr('checked') == 'checked' && $('#effect_custom').val() ==""){
        alert('请填写出图类型中效果图的自定义内容!');
        $('#effect_custom').focus().select();
        return false;
      }
      
    }
     function submitedit(){
     var id = $("input[name='id']").val();
     var url = "/Seller/Design/edit?id=" + id;
    $.ajax({
      url:url,
      type:"post",
      data:$("#form_edit_design").serialize(),
      success:function(data,textStatus){
        var data = $.parseJSON(data);
        if(data.status == 1){
          alert(data.info);
          if(data.url != "")
           {
            location.href = data.url;
           }
        }else{
          alert(data.info);
        }
      },
      error:function(){
        alert("error here!");
      }
    }); 
        
      // }
}
  </script>
</body>
</html>
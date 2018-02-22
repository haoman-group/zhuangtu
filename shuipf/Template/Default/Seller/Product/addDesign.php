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
      <p>类目>>网购设计>>家装设计</p>
      <a href="{:U('selectcate')}" >编辑类目</a>
    </div>
    <div class="rightbox">
      <form id="form_add_design" method="post">
        <input type="hidden" name="id" value="{$Think.get.id}">
        <input type="hidden" name='shopid' value="{$shopid}">
       <empty name="Think.get.id">
          <input type='hidden' value='add' name='a'>
          <input type='hidden' name="designtype"value="{$Think.get.inpcid}" ></input>
          <input type="hidden" name="cid" value="{$Think.get.inpcid}" >
        <else/>
          <input type='hidden' name="designtype"value="{$data.cid}" ></input>
          <input type="hidden" name="cid" value="{$data.cid}">
          <input type='hidden' value='edit' name='a'>
        </empty>

      <h4>1、宝贝基本信息</h4>
      <dl>
        <dt> <i>*</i>
          宝贝标题：
        </dt>
        <dd class="title">
          <input type="text" name="title" value="{$data.title}" style="width:300px">
         <!--  +
          <input type="text" name="title[]" value="{$data.title.1}">
          +
          <input type="text" name="title[]" value="{$data.title.2}">
          +
          <input type="text" name="title[]" value="{$data.title.3}">
          +
          <input type="text" name="title[]" value="{$data.title.4}">
          <p class="tips">注：请用简单的词或短句来组成您的宝贝标题，更容易被搜索到；最多可添加五个词组</p> -->
        </dd>
        <!-- <dt>设计理念：</dt>
        <dd>
          <textarea name="idea">{$data.idea}</textarea>
        </dd> -->
        <dt>宝贝属性：</dt>
        <dd class="attribute">
          <div class="dt"> <i>*</i>设计风格：</div>
          <div class="dd" id="styles">
            <input class="add" type="button" value="添加风格" onclick="addstyle()">
            <empty name="attr_style">
              <Form function="select" parameter="option('attr_style'),'',class='' name='attr_style[]',--请选择--"/>  
            <else/>
              <volist name="attr_style" id="vo">
                <Form function="select" parameter="option('attr_style'),$vo,class='' name='attr_style[]',''"/>
              </volist>
            </empty>
<!--             <select name="attr_style[]">
              <volist name="style" id="vo">
                <if condition="($vo['child'] neq '0') AND ($vo['pid'] eq '0') ">
                <optgroup label="{$vo.key}">
                <volist name="style" id="sub">
                  <if condition ="$sub['pid'] eq $vo['id']">
                    <option>{$sub.key}</option>
                  </if>
                </volist>
                </optgroup>
                <elseif condition="($vo['child'] eq '0') AND ($vo['pid'] eq '0') "/>
                  <option>{$vo.key}</option>
                </if>
              </volist>
            </select> -->
          </div>
          <div class="dt">户型：</div>
          <div class="dd">
            <Form function="select" parameter="option('attr_huxing'),$data['attr_huxing'],class='' name='attr_huxing'"/>
          </div>
          <div class="dt">案例面积：</div>
          <div class="dd">
            <Form function="select" parameter="option('attr_area'),$data['attr_area'],class='' name='attr_area'"/>
          </div>
<!--           <div class="dt">局部设计：</div>
          <div class="dd">
            <Form function="select" parameter="option('attr_jubu'),$data['attr_jubu'],class='' name='attr_jubu'"/>
          </div> -->
          <div class="dt">主立空间：</div>
          <div class="dd">
            <Form function="select" parameter="option('attr_kongjian'),$data['attr_kongjian'],class='' name='attr_kongjian'"/>
          </div>
          <!-- <div class="dt">宝贝编码：</div>
          <div class="dd">
            <input type="" name="attr_code" value="{$data.attr_code}"></div>
          <div class="dt">已获奖项：</div>
          <div class="dd">
            <input type="" name="case" value="{$data.case}"></div>
          <div class="dt">联系电话：</div>
            <div class="dd">
            <input type="" name="phone" value="{$data.phone}"></div> -->
          <div class="dt">案例设计费：</div>
          <div class="dd">
            <input type="" name="case_price" value="{$data.case_price}"></div>
          <div class="dt">  案例名称：</div>
          <div class="dd">
            <input type="" name="case_name" value="{$data.case_name}"></div>
          <div class="dt">设计公司：</div>
            <div class="dd">
            <input type="" name="design_company" value="{$data.design_company}"></div>
          <div  class="dt">设计理念：</div>
          <div class="dd">
            <textarea name="idea" placeholder="最多90个字">{$data.idea}</textarea>
          </div>
        </dd>


          <!-- <dt><i>*</i>宝贝属性：</dt> -->
        <dd class="attribute">
        <!--<p>关键属性：</p>-->
        <volist name="property" id ="vo">
          <if condition="$vo['is_key_prop'] == '1'">
          <div class="dt"><i>*</i>{$vo.name}:</div>
          <div class="dd">
          <select name="key_prop[{$vo.pid}]">
          <volist name="vo['value']" id='va'>
            <option value="{$va.vid}" <if condition="($data['key_prop'][$vo['pid']] == $va['vid']) || ($Think.get.inpvid == $va['vid'])">selected</if>>{$va.name}</option>
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
              <if condition="$vo['multi'] != '1'">
                <select name="nokey_prop[{$vo.pid}]">
                  <volist name="vo['value']" id='va'>
                    <option value="{$va.vid}" <if condition="$data['nokey_prop'][$vo['pid']] == $va['vid']">selected</if>>{$va.name}</option>
                  </volist>
                   <empty name="Think.get.id">
         <option value="">无</option>
            <else/>
           <option value="" <empty name="data['nokey_prop'][$vo['pid']]">selected</empty> >无</option>
              </empty>
                  
                </select>
                <else/>
                  <volist name="vo['value']" id ="va">
                    <span class="chkoutspan">
                    <input type="checkbox" id="chk_{$va.vid}" name="nokey_prop[{$vo.pid}][]" value="{$va.vid}" <if condition="in_array($va['vid'],$data['nokey_prop'][$vo['pid']])">checked</if>><label for="chk_{$va.vid}"> {$va.name}</label>
                    </span>
                  </volist>
              </if>
            <else/>
            <!--非枚举属性-->
            <?php
            echo "<input type='text' name='nokey_prop[".$vo['pid']."]' value='".$data['nokey_prop'][$vo['pid']]."'>";
            ?>
            </if>
          </div>
          </if>
        </volist>
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
          <empty name="Think.get.id">
          <em class="bindchk on" data-forchkname="is_home"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></em> 
          <input type="checkbox" class="refreshchk" data-default-v="1" data-chkname="is_home" value="1" name="is_home" id="homepage" onclick="getchecked()">
          <else/>
          <em class="<?php echo ($data['is_home'] =="1" )?"bindchk on":"bindchk off"; ?>" data-forchkname="is_home"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></em> 
          <input type="checkbox" class="refreshchk" data-default-v="1" data-chkname="is_home" value="1" name="is_home" id="homepage" onclick="getchecked()">
          </empty>
          主页显示
          <input type="hidden" name="type" class="refreshclear" data-default-v="{$data.type}" data-inpname="persontype" value="{$data.type}">
          <em data-v="1" data-radioname="persontype_1" data-toinpname="persontype" data-group="persontype_group" class="<?php echo ($data['type'] =="1")?"on bindinput radiogroup":"bindinput radiogroup" ?>"></em> 
          <label data-forradio="persontype_1" class="forradio">案例</label>
          <em data-v="2" data-radioname="persontype_2" data-toinpname="persontype" data-group="persontype_group" class="<?php echo ($data['type'] =="2")?"on bindinput radiogroup":"bindinput radiogroup" ?>"></em>
          <label data-forradio="persontype_2" class="forradio">作品集</label>
          </cite>
           <br/>注：请先上传设计师，编辑设计师主页后，宝贝才能放进相应设计师主页的作品集或案例中
        </dd>
        <dt>
          <i>*</i>
          宝贝规格：
        </dt>
           <!--销售属性-->
        <dd class="format">
          <span>注：请先选择宝贝规格，然后填入相应的价格</span>
          <div class="formatulbox">
         <!--销售属性 且 颜色属性-->
         <volist name="property" id ="vo">
          <if condition="$vo['is_sale_prop'] =='1' and $vo['is_color_prop'] ==1" >
          <div class="dt"><span>{$vo.name}</span>:</div>
          <div class="dd" data-attr-name="{$vo.name}" data-pid="{$vo.pid}">
             <ul class="colorclass ulchk iscandiy"  data-name="{$vo.name}">
          <volist name="vo['value']" id='va'>
                        <li data-color="#f60" data-name="{$va.name}" data-vid="{$va.vid}"
              <if condition="in_array($va['vid'], $selected_prop[$vo['name']])">class="on"</if> >
                            <input type="checkbox" <if condition="in_array($va['vid'], $selected_prop[$vo['name']])">checked </if> />
              <label class="color_show"></label>
                            <label class="color_name"></label>
                            <input class="color_input" type="text">
                        </li>
          </volist>
          </ul>
          </div>
          <!--<script type="text/javascript">$(function(){$(".picOfcolor").show()})</script>-->
          </if>
        </volist>
        <!--销售属性 且 非颜色属性-->
        <volist name="property" id ="vo">
          <if condition="$vo['is_sale_prop'] =='1' and $vo['is_color_prop'] !=1" >
          <div class="dt"><span>{$vo.name}</span>:</div>
          <div class="dd" data-attr-name="{$vo.name}" data-pid="{$vo.pid}">
            <if condition="$vo['is_input_prop'] == '1'">
            <ul class="sizeclass ulchk iscandiy" data-name="{$vo.name}" data-attr-name="{$vo.name}">
            <else/>
            <ul class="sizeclass ulchk " data-name="{$vo.name}" data-attr-name="{$vo.name}">
              </if> 
              <volist name="vo['value']" id='va'>
                        <li data-color="" data-name="{$va.name}" data-vid="{$va.vid}"
              <if condition="in_array($va['vid'], $selected_prop[$vo['name']])">class="on"</if>  >
                            <input type="checkbox" <if condition="in_array($va['vid'], $selected_prop[$vo['name']])">checked</if> >
                            <label class="color_name"></label>
                            <input class="color_input" type="text">
                        </li>
            </volist>
          </ul>
          </div>
          </if>
        </volist>
        
        </div>

                <!-- <table class="colorclasstable" style="display:<?php //echo empty($selected_prop) ? "none" : "table "; ?>"> -->
                <table class="colorclasstable" style="display:none">
                  <thead>
                      <tr>
                          <th>颜色分类</th>
                          <th>图片（无图片可不填）</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <volist name="property" id ="vo">
                      <if condition="$vo['is_sale_prop'] =='1' and $vo['is_color_prop'] ==1" >
                      
                      <volist name="vo['value']" id='va'>

                        <tr data-name="{$va.name}" data-vid="{$va.vid}" style="display:<?php echo in_array($va['vid'], $selected_prop['颜色分类']) ? 'table-row;' : 'none;'; ?>">
                            <td><i></i><span></span></td>
                            <td>
                                <!--<input class="btn" type="file" value="">-->
                                <a class="btn" href="javascript:col_upfile('col_pic_{$va.vid}')">本地上传</a><p>为了您的宝贝展示效果，请尽量上传方形图片</p>
                                <ul class="img" id="col_pic_{$va.vid}">
                                    <if condition="array_key_exists($va['vid'], $selected_pics)">
                                    <volist name="selected_pics[$va['vid']]" id="vp" key="vk">
                                        <li id="image{$vk}"><img src="{$vp}">
                                            <br>
                                            <a href="javascript:remove_div('image{$vk}')" class="tupian" >删除</a>
                                        </li>
                                    </volist>
                                    </if>
                                </ul>
                                <!--<input class="btn" type="button" value="图片空间">-->
                            </td>
                        </tr>
                      </volist>
                      
                      </if>
                    </volist>

                    </tbody>
                </table>
                <div class="sizeclatabbox">
                    <table class="typesizeclasstable" style="display:<?php echo empty($data['price_json']) ? 'none;' : 'table;'; ?>">
                      <thead>
                            <tr>
                                <foreach name="selected_prop" item="vo" key="vk">
                                    <th class="val">{$vk}</th>
                                </foreach>
                                <th class="price">价格</th>
                                <th class="price_act">专享价格</th>
                                <th class="quantity">数量</th>
                                <th class="tsc">宝贝编码</th>
                                <th class="barcode">商品条形码</th>
                            </tr>
                        </thead>
                        <tbody>
                            <foreach name="data['price_json']" item="vo">
                                <tr>
                                    <foreach name="selected_prop" item="vp" key="vk">
                                        <if condition="$vo[$vk]['rowspan'] gt 0">
                                            <td class="val{$vo[$vk].listno}" data-v="{$vo[$vk]['txt']}{$vo[$vk]['idx']}" data-idx="{$vo[$vk]['idx']}" data-vid="{$vo[$vk]['vid']}" rowspan="{$vo[$vk]['rowspan']}">{$vo[$vk]['txt']}</td>
                                        </if>
                                    </foreach>
                                    <td> <input type="text" class=<?php echo empty($vo['price']) ? "price" : '"price valid" aria-invalid="false"' ?> value=<?php echo empty($vo['price']) ? " " : $vo['price'] ?> ></td>
                                    <td> <input type="text" class=<?php echo empty($vo['price_act']) ? "price_act" : '"price_act valid" aria-invalid="false"' ?> value=<?php echo empty($vo['price_act']) ? " " : $vo['price_act'] ?> ></td>
                                    <td> <input type="text" class=<?php echo empty($vo['quantity']) ? "quantity" : '"quantity valid" aria-invalid="false"' ?> value=<?php echo empty($vo['quantity']) ? " " : $vo['quantity'] ?> ></td>
                                    <td> <input type="text" class=<?php echo empty($vo['tsc']) ? "tsc" : '"tsc valid" aria-invalid="false"' ?> value=<?php echo empty($vo['tsc']) ? " " : $vo['tsc'] ?> ></td>
                                    <td> <input type="text" class=<?php echo empty($vo['barcode']) ? "barcode" : '"barcode valid" aria-invalid="false"' ?> value=<?php echo empty($vo['barcode']) ? " " : $vo['barcode'] ?> ></td>
                                    <input type="hidden" value="{$vo['hidden_value']}">
                                </tr>
                            </foreach>
                        </tbody>
                    </table>
                    <span class="propertytip" style="display:<?php echo empty($selected_prop) ? "inline-block":"none"; ?>"><strong>!</strong>您需要选择所有的销售属性，才能组合成完整的规格信息。</span>
                </div>
        <!-- <dt>
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
               <em class="bindchk" data-forchkname="product_type1">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="product_type1"  name="product_type[独立空间效果图][]"  id="indep_effect">
                </em>
                独立空间效果图
              </td>
              <td>元/套</td>
              <td><input type="text" name="product_type[独立空间效果图][]" id="indep_effect_price"  ></input></td>
              <td><input type="text" name="product_type[独立空间效果图][]" id="indep_effect_price_act"  ></input></td>
              <td><input type="text" name="product_type[独立空间效果图][]" id="indep_effect_num"  ></input></td>
            </tr>
            <tr>
              <td>
              <em class="bindchk" data-forchkname="product_type2">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="product_type2"  name="product_type[全屋效果图][]"  id="full_effect">
                </em>
             
                全屋效果图
              </td>
              <td>元/套</td>
               <td><input type="text" name="product_type[全屋效果图][]"  id="full_effect_price"  ></input></td>
               <td><input type="text" name="product_type[全屋效果图][]"  id="full_effect_price_act"  ></input></td>
              <td><input type="text" name="product_type[全屋效果图][]"  id="full_effect_num"  ></input></td>
            </tr>
            <tr>
              <td>
              <em class="bindchk" data-forchkname="product_type3">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="product_type3"  name="product_type[独立空间套图][]"  id="indep_sets">
                </em>
              
                独立空间套图
              </td>
              <td>元/㎡</td>
               <td><input type="text" name="product_type[独立空间套图][]" id="indep_sets_price"  ></input></td>
               <td><input type="text" name="product_type[独立空间套图][]" id="indep_sets_price_act"  ></input></td>
              <td><input type="text" name="product_type[独立空间套图][]"  id="indep_sets_num" ></input></td>
            </tr>
            <tr>
              <td>
              <em class="bindchk" data-forchkname="product_type4">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="product_type4"  name="product_type[全屋套图][]"  id="full_sets">
                </em>
              
              
                全屋套图
              </td>
              <td>元/套</td>
               <td><input type="text" name="product_type[全屋套图][]" id="full_sets_price"  ></input></td>
               <td><input type="text" name="product_type[全屋套图][]" id="full_sets_price_act"  ></input></td>
              <td><input type="text" name="product_type[全屋套图][]"  id="full_sets_num"  ></input></td>
            </tr>
          </table>-->
        </dd> 
         <dt><i>*</i>价格活动：</dt>
        <dd><Form function="select" parameter="option('activity_Designer'),$data['activity'],class='' name='activity',无"/></dd>
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
      </dl>
        <h4>2.设计服务信息</h4>
      <dl class="serve">
        <dt>全套设计方式每平米报价：</dt>
        <dd>
          <table>
            <tr>
              <td>
                <i>*</i>效果图：
              </td>
              <td>
                <input class="" data-showname="pictype_effectshow4" type="text" name="pictype_effect" id="effect_custom" value="{$pictype_effect}">
              </td>
              <td>张</td>
            </tr>
            <tr>
              <td><i>*</i>CAD图：</td>
            </tr>
            <tr>
              <td>

                <em class="<?php echo in_array("原始平面图",$pictype_cad)?"bindchk on":"bindchk"?>" data-forchkname="pictype_cad1">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" name="pictype_cad[]" class="refreshchk" data-default-v="<?php echo in_array("原始平面图",$pictype_cad)?"1":"0"?>" data-chkname="pictype_cad1" value="原始平面图">

                </em>
                原始平面图
              </td>
              <td>

                <em class="<?php echo in_array("原始平面图",$pictype_cad)?"bindchk on":"bindchk"?>" data-forchkname="pictype_cad2">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" name="pictype_cad[]" class="refreshchk" data-default-v="<?php echo in_array("平面布置图",$pictype_cad)?"1":"0"?>" data-chkname="pictype_cad2" value="平面布置图">

                </em>
                原始平面图
              </td>
              <td>

                <em class="<?php echo in_array("水电施工图",$pictype_cad)?"bindchk on":"bindchk"?>" data-forchkname="pictype_cad3">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" name="pictype_cad[]" class="refreshchk" data-default-v="<?php echo in_array("水电施工图",$pictype_cad)?"1":"0"?>" data-chkname="pictype_cad3" value="水电施工图">

                </em>
                水电施工图
              </td>
              <td>

                <em class="<?php echo in_array("墙体改造图",$pictype_cad)?"bindchk on":"bindchk"?>" data-forchkname="pictype_cad4">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" name="pictype_cad[]" class="refreshchk" data-default-v="<?php echo in_array("墙体改造图",$pictype_cad)?"1":"0"?>" data-chkname="pictype_cad4" value="墙体改造图">

                </em>
                墙体改造图
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

                <em class="<?php echo in_array("地面铺装图",$pictype_cad)?"bindchk on":"bindchk"?>" data-forchkname="pictype_cad6">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" name="pictype_cad[]" class="refreshchk" data-default-v="<?php echo in_array("地面铺装图",$pictype_cad)?"1":"0"?>" data-chkname="pictype_cad6" value="地面铺装图">

                </em>
                地面铺装图
              </td>
              <td>

                <em class="<?php echo in_array("立面图",$pictype_cad)?"bindchk on":"bindchk"?>" data-forchkname="pictype_cad6">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" name="pictype_cad[]" class="refreshchk" data-default-v="<?php echo in_array("立面图",$pictype_cad)?"1":"0"?>" data-chkname="pictype_cad6" value="立面图">

                </em>
                立面图
              </td>
            </tr>
          </table>
        <!-- </dd>
        <dd> -->
          <table>
            <tr>
              <td>增值服务：</td>
            </tr>
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
                <td>
                <em class="<?php echo in_array("软装设计",$service_added)?"bindchk on":"bindchk"?>" data-forchkname="service_added3">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("软装设计",$service_added)?"1":"0"?>" data-chkname="service_added3" name="service_added[]" value="软装设计">

                </em>
                软装设计
              </td>
            </tr>
          </table>
          <table>
<!--               <td>

                <em class="<?php //echo in_array("软装配饰代购",$service_added)?"bindchk on":"bindchk"?>" data-forchkname="service_added4">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php //echo in_array("软装配饰代购",$service_added)?"1":"0"?>" data-chkname="service_added4" name="service_added[]" value="软装配饰代购">

                </em>
                软装配饰代购
              </td> -->
            <tr>
              <td>

                <em class="<?php echo in_array("材料推荐",$service_added)?"bindchk on":"bindchk"?>" data-forchkname="service_added5">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("材料推荐",$service_added)?"1":"0"?>" data-chkname="service_added5" name="service_added[]" value="材料推荐">

                </em>
                材料推荐
              </td>
<!--               <td>

                <em class="<?php //echo in_array("主材推荐",$service_added)?"bindchk on":"bindchk"?>" data-forchkname="service_added6">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php //echo in_array("主材推荐",$service_added)?"1":"0"?>" data-chkname="service_added6" name="service_added[]" value="主材推荐">

                </em>
                主材推荐
              </td> -->
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
          单空间效果图
        </dt>
        <dd>
          <table>
            <tr>
              <td>
                <i>*</i>效果图：
              </td>
              <td><input class="" data-showname="pictype_effectshow4" type="text" name="single_effect" id="single_effect" value="{$data.single_effect}"></td>
                <td style="white-space:nowrap">张      &nbsp;&nbsp;&nbsp;                    注：收费方式与设计师沟通</td>
            </tr>
          </table>
        </dd>
        <dt>
          全屋软装解决方案</dt>
        <dd>
          <table>
              <tr>
                  <td style="white-space:nowrap">

                <em class="<?php echo in_array("软装饰品推荐购买",$solution)?"bindchk on":"bindchk"?>" data-forchkname="service_added10">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("软装饰品推荐购买",$solution)?"1":"0"?>" data-chkname="service_added10" name="solution[]" value="软装饰品推荐购买">

                </em>
                软装饰品推荐购买
              </td>  
              <td>

                <em class="<?php echo in_array("软装现场搭配",$solution)?"bindchk on":"bindchk"?>" data-forchkname="service_added11">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php echo in_array("软装现场搭配",$solution)?"1":"0"?>" data-chkname="service_added11" name="solution[]" value="软装现场搭配">

                </em>
                软装现场搭配
              </td>
              </tr>
          </table>  
        </dd>
      </dl>
     <h4>3.其他信息</h4>
      <dl class="other">
        <dt>合同：</dt>
         <input type="hidden" name="agreement" class="refreshclear" data-default-v="<empty name='data.agreement'>0<else/>{$data.agreement}</empty>" data-inpname="agreement" value="<empty name='data.agreement'>0<else/>{$data.agreement}</empty>">
        <dd class="table">
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
         <dt>服务承诺：</dt>
        <dd class="table">
        <!-- <input type='checkbox' name="service_promise[]" value="18" id="service_promise_18" <if condition="in_array('18',$data['service_promise'])">checked</if>  /><label for="service_promise_18">时间段保修（三月/半年/一年/两年）</label> -->
           <input type='checkbox' name="service_promise[]" value="18" id="service_promise_18" <if condition="in_array('18',$data['service_promise'])">checked</if>  /><label for="service_promise_18">免费量房</label>
          <input type='checkbox' name="service_promise[]" value="29" id="service_promise_29" <if condition="in_array('29',$data['service_promise'])">checked</if>  /><label for="service_promise_29">材料推荐</label>
          <input type='checkbox' name="service_promise[]" value="30" id="service_promise_30" <if condition="in_array('30',$data['service_promise'])">checked</if>  /><label for="service_promise_30">装修预算</label>
          <input type='checkbox' name="service_promise[]" value="31" id="service_promise_31" <if condition="in_array('31',$data['service_promise'])">checked</if>  /><label for="service_promise_31">按期交稿</label>
          <input type='checkbox' name="service_promise[]" value="32" id="service_promise_32" <if condition="in_array('32',$data['service_promise'])">checked</if>  /><label for="service_promise_32">软装搭配</label>
          <input type='checkbox' name="service_promise[]" value="33" id="service_promise_33" <if condition="in_array('33',$data['service_promise'])">checked</if>  /><label for="service_promise_33">施工交底</label>
          <input type='checkbox' name="service_promise[]" value="34" id="service_promise_34" <if condition="in_array('34',$data['service_promise'])">checked</if>  /><label for="service_promise_34">分期付款</label>
         </br>
           <input type='checkbox' name="service_promise[]" value="28" id="service_promise_28" <if condition="in_array('28',$data['service_promise'])">checked</if>  /><label for="service_promise_28">实名认证</label>
        
        </dd>
        <dt>会员打折：</dt>
        <dd class="table">
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
        <dd class="table">
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
        <dd class="table">
          <span>

            <em class="on"><input type="hidden"  name="expiry_date" value="1"></em>
            <label>7天</label>          

          </span>
        </dd>
        <dt>开始时间：</dt>
        <dd class="table">
        <input type="hidden" name="starttime_type" class="refreshclear" data-default-v="<empty name='data.starttime_type'>1<else/>{$data.starttime_type}</empty>" data-inpname="starttime_type" value="<empty name='data.starttime_type'>1<else/>{$data.starttime_type}</empty>">        
          <span>

            <em data-v="1" data-radioname="starttime_1" data-toinpname="starttime_type" data-group="starttime_group" class="<?php echo (($data['starttime_type'] ==1) || empty($data['starttime_type']))?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="starttime_1" class="forradio">立刻</label>
          </span>
          <br>
          <span>
            <em data-v="2" data-radioname="starttime_2" data-toinpname="starttime_type" data-group="starttime_group" class="<?php echo ($data['starttime_type'] ==2)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="starttime_2" class="forradio">设定</label>
            <input type="text" name="starttime" id="starttime" value="<?php echo ($data['starttime_type'] ==2)?$data['starttime']:date('Y-m-d H:i') ?>" class="J_datetime input ignore" >
          </span>
          <br>
          <span>
            <em data-v="3" data-radioname="starttime_3" data-toinpname="starttime_type" data-group="starttime_group" class="<?php echo ($data['starttime_type'] ==3)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="starttime_3" class="forradio">放入仓库</label>

          </span>
        </dd>
        <dt>放到设计库：</dt>
        <dd class="table">
        <input type="hidden" name="is_library" class="refreshclear" data-default-v="<empty name='data.is_library'>0<else/>{$data.is_library}</empty>" data-inpname="is_library" value="<empty name='data.is_library'>0<else/>{$data.is_library}</empty>">
          <span>
            <em data-v="0" data-radioname="is_library_0" data-toinpname="is_library" data-group="is_library_group" class="<?php echo ($data['is_library'] ==0)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="is_library_0" class="forradio">否</label>
            <em data-v="1" data-radioname="is_library_1" data-toinpname="is_library" data-group="is_library_group" class="<?php echo ($data['is_library'] ==1)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="is_library_1" class="forradio">是</label>
          </span>
        </dd>
        <dt>橱窗推荐：</dt>
        <dd class="table">
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
        <a  class="btnsubmit" href="javascript:void(0)">发布</a>
        <a href="{:U('lists')}">取消</a>
        <input type="hidden" name="price" class="priceArray" value=''>
      </div>
      </form>
    </div>
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
        $authkey = upload_key("$maxPicNum,$alowexts,1,$thumb_ext,$watermark_setting");
      ?>
    function upfile(id){
      flashupload(id+'_images', '图片上传',id,submit_pic,'{$maxPicNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
    }
	
	
    function submit_pic(uploadid,returnid){
      var d = uploadid.iframe.contentWindow;
      var in_content = d.$("#att-status").html().substring(1);
      var in_filename = d.$("#att-name").html().substring(1);
      /*var str = $('#' + returnid).html();*/
      var contents = in_content.split('|');
      var filenames = in_filename.split('|');
      if (contents == '') return true;
      $.each(contents, function (i, n) {
          var ids = parseInt(Math.random() * 10000 + 10 * i);
          var filename = filenames[i].substr(0, filenames[i].indexOf('.'));
          console.log(ids);
          var str = "<input type='hidden' name='"+returnid+"_url[]' value='" + n + "'><img src='"+n+"'><div class='operate'><span class='sl'></span><span class='sr'></span><a href=\"javascript:void(0)\" class='tupian' ></a></div>";
      	  $('#' + returnid).find(".noimg:first").html(str);
		  $('#' + returnid).find(".noimg:first").removeClass("noimg");
	  });
	  

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

    //添加风格 响应事件
    function addstyle(){
      var count = $("select[name='attr_style[]']").length;
      console.log(count);
      if(count <3)
      {
        var name = "style_"+count;
        $("#styles").append("<div class='"+name+"'><input type='button'value='取消' onclick='javascript:$(\"."+name+"\").remove();' ></div>");
        $("select[name='attr_style[]']:first").clone(true).appendTo("."+name);
      }
      else{
        alert("最多添加额外两种风格！");
      }
    }
    //提交时检查待提交数据是否合法
    function checkForm(){
      // //宝贝类型 4选一
      // if($(".type input:checked").length <=0){
      //   alert("必须选择至少一种宝贝类型！");
      //   return false;
      // }
      // //宝贝类型 选择之后必须填写属性值
      // var ret = true;
      // $(".type input:checkbox").each(function(){
      //   //遍历所有type下的 checkbox的状态
      //   if(!ret){return false;}
      //   if($(this).attr("checked") =="checked"){
      //     //遍历所有checkbox状态为checked的输入标签
      //     var name = $(this).attr('name');
      //     $(":text[name='"+name+"']").each(function(){
      //       if($(this).val() == ""){
      //        alert("请填写完整信息！"); 
      //        $(this).focus().select();
      //        ret=false;
      //        return ret;
      //       }
      //     });
      //   }
      // });
      // if(!ret){return false;}

      if($("select[name='attr_style[]']").val() ==""){
        alert('请至少选择一个设计风格!');
        $("select[name='attr_style[]']").focus().select();
        return false;
      }
      if($('#designername').val() ==""){
        alert('请选择专属设计师!');
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
    function submitadd(){
      
  TableToJson();
    $.ajax({
      url:"/Seller/Design/add",
      type:"post",
      data:$("#form_add_design").serialize(),
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
}
 var colorjson={"军绿色":"#5d762a","天蓝色":"#1eddff","巧克力色":"#d2691e","桔色":"#ffa500","浅灰色":"#e4e4e4","浅绿色":"#98fb98","浅黄色":"#ffffb1","深卡其布色":"#bdb76b","深灰色":"#666666","深紫色":"#4b0082","深蓝色":"#041690","白色":"#ffffff","粉红色":"#ffb6c1","紫罗兰":"#dda0dd","紫色":"#800080","红色":"#ff0000","绿色":"#008000","花色":"url(../images/bg_colorized.png)","蓝色":"#0000ff","褐色":"#855b00","透明":"url(../images/bg_transparent.png)","酒红色":"#990000","黄色":"#ffff00","黑色":"#000000"}
var tbjs={
      arname : [],
      arobj : [],
      arcount :[],
      arval :{},
      inptnum : 5,
          
      init : function(){
        var self=this; 
        var $ulchks= $(".ulchk");
        self.arname=[];
        self.arcount=[];
        $ulchks.each(function(index, element) {
          self.arname.push($(element).attr("data-name"));
          self.arcount.push({para:"",count:0});
        });
      },    
      toval : function(){
        var self=this;
        var $ulchks= $(".ulchk");
        $ulchks.each(function(index, element) {
          self.arname.push($(element).attr("data-name"));
        });
      },
      tolist : function(){
        var self =this;
        var arname= self.arname;
        var len=arname.length;
        var arobj=self.arobj;
        $.each(arname,function(i,v){
          arobj= self.mixar(arobj,i);
        })
        // console.log(arobj);
        return arobj; 
      },
      
      mixar : function(arobj,ulindex){
        var ar=[];
        var arname= this.arname;
        var $nowchked= $(".ulchk").eq(ulindex).find(":checked");
        
        if(arobj.length===0){
          $nowchked.each(function(j, e) {
            var ov={};
            //ov[arname[ulindex]]=e.value;
            ov[arname[ulindex]]={"txt":$(e).attr("data-txt"),"val":e.value,"idx":$(e).attr("data-idx"),"vid":$(e).attr("data-vid")};
            ar.push(ov);
          });
        }
        else{
          $.each(arobj ,function (i, v){          
            $nowchked.each(function(j, e) {
              var ov = $.extend(true, {}, v);
              //ov[arname[ulindex]]=e.value;
              ov[arname[ulindex]]={"txt":$(e).attr("data-txt"),"val":e.value,"idx":$(e).attr("data-idx"),"vid":$(e).attr("data-vid")};
              ar.push(ov);
              
            }); 
          })
        }
        return ar;
      },
      
      writeinpt : function(){
        var self =this;
        self.arval={};
        var $trs=$(".typesizeclasstable tbody tr");
        $trs.each(function(i,e){
          var $wrtr=$(".typesizeclasstable tbody tr").eq(i);
          var wrval=$wrtr.find("input[type='hidden']").val();
          var wrtxt=[];
          for(n=0;n<self.inptnum;n++){
            wrtxt[n]=$wrtr.find("input[type='text']").eq(n).val();
          }
          self.arval[wrval]=wrtxt;
        })
        return self.arval;
      },
      totb : function(){
        this.writeinpt();
        var arname=this.arname;
        var arcount=this.arcount;
        var arval=this.arval;
        var arobj=this.tolist();
        var $tb=$("<table></table>");
        var self=this;
        var inptnum=this.inptnum;
        $.each(arobj,function(i,v){
          var str="<tr>";
          var sarname='';
          $.each(arname ,function(j,e){
            if(v[e]["val"]===arcount[j]["para"]){
              arcount[j].count++;
            }
            else{
              if($tb.find("td").length){
                $tb.find("[data-v='"+arcount[j]["para"]+"']").attr("rowspan",arcount[j]["count"]);  
              }
              arcount[j]["para"]=v[e]["val"];
              arcount[j]["count"]=1;
              str+="<td class='val"+j+"' data-v='"+v[e]["val"]+"' data-idx='"+v[e]["idx"]+"' data-vid='"+v[e]["vid"]+"'>"+v[e]["txt"]+"</td>";  
            }
            sarname+=v[e]["val"];
          });
          if(!self.arval[sarname]){
            // for(var i=0;i<inptnum;i++){
              str+="<td><input type='text' value='' class='price'></td>"
              str+="<td><input type='text' value='' class='price_act'></td>"
              str+="<td><input type='text' value='' class='quantity'></td>"
              str+="<td><input type='text' value='' class='tsc'></td>"
              str+="<td><input type='text' value='' class='barcode'></td>"
            // }    
          }
          else{
            var arinpvals=self.arval[sarname];
            // for(var i=0;i<inptnum;i++){
              str+="<td><input type='text' value='"+arinpvals[0]+"' class='price'></td>"
              str+="<td><input type='text' value='"+arinpvals[1]+"' class='price_act'></td>"
              str+="<td><input type='text' value='"+arinpvals[2]+"' class='quantity'></td>"
              str+="<td><input type='text' value='"+arinpvals[3]+"' class='tsc'></td>"
              str+="<td><input type='text' value='"+arinpvals[4]+"' class='barcode'></td>"
              
            // }    
          }
          str+="<input type='hidden' value='"+sarname+"'></tr>"
          
          $tb.append($(str));
        })
        $.each(arcount,function(i,v){
          $tb.find("[data-v='"+v["para"]+"']").attr("rowspan",v["count"]);  
        })
        $(".typesizeclasstable tbody").remove();
        $(".typesizeclasstable thead .val").remove();
        $(".productdetail_box .rightbox dl .format .dt").each(function(i, e) {
          $th=$("<th></th>").addClass("val");
          $(".typesizeclasstable thead th").eq(i).before($th.html($(e).find("span").html()));
        })
        $(".typesizeclasstable thead").after($tb.html());
        self.init();
        
        return $tb.html();
      }
      
      
    }
    tbjs.init()
      //还原颜色
    $(function() {
      var colorArray = <?php  echo json_encode($colorArray); ?> ;
      if(colorArray == null){return;}
      $.each(colorArray, function(i, v) {
        var name = $(".formatulbox li:eq(" + i + ")").attr("data-name");
        $(".formatulbox li:eq(" + i + ")").attr("data-name", v);
        $(".formatulbox li:eq(" + i + ") .color_show").css("background-color", colorjson[name]);
        $(".colorclasstable tbody tr:eq(" + i + ") td i").css("background-color", colorjson[name]);
      })
    })

$(function(){
  $(".btnsubmit").click(function(){
      $('#form_add_design').submit();
  })
})



  </script>
</body>
</html>
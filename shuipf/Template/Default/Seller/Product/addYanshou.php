<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>卖家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/seller_reg.js"></script>
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
      <p>类目>>验收</p>
      <a href="{:U('selectcate')}" >编辑类目</a>
    </div>
    <div class="rightbox">
      <!--<form id="form_add_worker" action="{:U('add',array('designtype' => $_GET['designtype']))}" method="post"  onsubmit="return checkForm()">-->
      <form id="form_add_yanshou"  method="post"  onsubmit="return checkForm()">
        
        <input type="hidden" name="id" value="{$Think.get.id}">
       <!-- <input type='hidden' value='Seller' name='g'>-->
       <!-- <input type='hidden' value='Worker' name='m'>-->
       <empty name="Think.get.id">
          <input type='hidden' value='add' name='a'>
         <input type="hidden" name="cid" value="{$Think.get.inpcid}">
        <else/>
          <input type='hidden' value='edit' name='a'>
        </empty>
      <h4>1、宝贝基本信息</h4>
      <dl>
        <dt> <i>*</i>
          宝贝标题：
        </dt>
        <dd>
          <input type="text" name="title" value="{$data.title}"></input>
        </dd>
        <dt><!-- <i>*</i> -->宝贝卖点：</dt>
        <dd><textarea name="sell_points" >{$data.sell_points}</textarea></dd>
        <!-- <dt> <i>*</i>
          工人姓名：
        </dt>
        <dd>
          <input type="text" name="workername" value="{$data.workername}"></input>
        </dd>
        <dt> <i>*</i>
          联系电话：
        </dt>
        <dd>
          <input type="text" name="phone" value="{$data.phone}"></input>
        </dd>
        <dt> <i>*</i>
          年龄：
        </dt>
        <dd>
          <input type="text" name="age" value="{$data.age}"></input>
        </dd>
        <dt> <i>*</i>
          工人籍贯：
        </dt>
        <dd>
          <input type="text" name="hometown" value="{$data.hometown}"></input>
        </dd>
        <dt> <i>*</i>
          工种类型：
        </dt>
        <dd>
          <select name="crafttype" disabled >
            <volist name="category" id="vo">
              <option value='{$vo.cid}' <if condition="($Think.get.inpcid == $vo['cid'])||($data['cid'] == $vo['cid']) " >selected</if> >{$vo.name}</option>  
            </volist>
          </select>
        </dd>
        <dt> <i>*</i>
          从业年限：
        </dt>
        <dd>
          <input type="text" name="workyears" value="{$data.workyears}"></input>
        </dd>
        <dt>
          实名认证：
        </dt>
        <dd>
          <input type="hidden" name="certification" class="refreshclear" data-default-v="0" data-inpname="certification" value="<empty name='data.certification'>0<else/>{$data.certification}</empty>">
          <em data-v="1" data-radioname="certification_1" data-toinpname="certification" data-group="certification_group" class="<?php echo ($data['certification'] ==1)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
          <label data-forradio="is_certification_1" class="forradio">是</label>
          <em data-v="0" data-radioname="certification_0" data-toinpname="certification" data-group="certification_group" class="<?php echo ($data['certification'] ==0)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
          <label data-forradio="is_certification_0" class="forradio" >否</label>
        </dd>

        <dt> 
          施工经验：
        </dt>
        <dd>
          <input type="text" name="experience" value="{$data.experience}"></input>
        </dd>
        <dt>
          成功案例：
        </dt>
        <dd>
          <div id ="case">
            <if condition="$data.case !=''">
              <volist name="data.case" id="cases">
                <input type="text" name="case[]" value="{$cases}"></input>
              </volist>
            <else/>
              <input type="text" name="case[]" ></input>
            </if>
          </div>
          <input class="add" type="button" value="添加案例" onclick="addcase()">
        </dd> -->
        
        <!-- <dt> <i>*</i>-->
        <!--  计价单位：-->
        <!--</dt>-->
        <!--<dd><input type="radio" name="charge_unit" value="元/㎡"/>元/㎡</dd>-->
        <!--<dd><input type="radio" name="charge_unit" value="元/日"/>元/日</dd>-->
        <dt>付款模式：</dt>
        <dd>一口价</dd>
        <dt><i>*</i>宝贝属性：</dt>
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
<!--         <dt><i>*</i>价格体系：</dt>
        <dd>
            <select name="price_sys">
              <optgroup label="工人"></optgroup>
                <option value="单工种每米轻工报价" <if condition="$data['price_sys'] eq '单工种每米轻工报价' ">selected</if>>单工种每米轻工报价</option>
                <option value="单工种每平米轻工报价" <if condition="$data['price_sys'] eq '单工种每平米轻工报价' ">selected</if>>单工种每平米轻工报价</option>
                <option value="单工种每平米轻工报价" <if condition="$data['price_sys'] eq '单工种每平米轻工报价' ">selected</if>>单工种每平米轻工报价</option>
              <optgroup label="工长"></optgroup>
                <option value="纯轻工按阶段分步骤付款" <if condition="$data['price_sys'] eq '纯轻工按阶段分步骤付款' ">selected</if>>纯轻工按阶段分步骤付款</option>
              <optgroup label="单工长"></optgroup>
                <option value="单工长服务费" <if condition="$data['price_sys'] eq '单工长服务费' ">selected</if>>单工长服务费</option>
            </select>
        </dd> -->
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
                                <th class="price">门店价格</th>
                                <th class="price_act">市场价格</th>
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

      <!--   <dd class="type">
          <table>
            <tr>
              <td>计价单位</td>
              <td>市场价格</td>
              <td>活动价格</td>
            </tr>
            <tr>
              <td>
               <em class="<?php //echo in_array("on",$charge_type['平米'])?"bindchk on":"bindchk"?>" data-forchkname="product_type1">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php //echo in_array("on",$charge_type['平米'])?"1":"0"?>" data-chkname="product_type1"  name="charge_type[平米][]"  id="square" >
                </em>
                元/㎡
              </td>
              <td><input type="text" name="charge_type[平米][]" id="square_price" value="{$charge_type['平米'][1]}" ></input></td>
              <td><input type="text" name="charge_type[平米][]" id="square_price" value="{$charge_type['平米'][2]}" ></input></td>
            </tr>
            <tr>
              <td>
              <em class="<?php //echo in_array("on",$charge_type['天'])?"bindchk on":"bindchk"?>" data-forchkname="product_type2">
                  <img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" />
                  <input type="checkbox" class="refreshchk" data-default-v="<?php //echo in_array("on",$charge_type['天'])?"1":"0"?>" data-chkname="product_type2"  name="charge_type[天][]"  id="day" >
                </em>
             
                元/日
              </td>
                 <td><input type="text" name="charge_type[天][]"  id="day_price" value="{$charge_type['天'][1]}" ></input></td>
                 <td><input type="text" name="charge_type[天][]"  id="day_price" value="{$charge_type['天'][2]}" ></input></td>
            </tr>
          </table> -->


        </dd>
         <dt><i>*</i>价格活动：</dt>
        <dd><Form function="select" parameter="option('activity_Worker'),$data['activity'],class='activity' name='activity',无"/></dd>
        <dt>
            <i>*</i>
          宝贝图片：
        </dt>
        <dd class="imgbox">
          <!--<ul class="title">-->
          <!--  <li>本地上传</li>-->
          <!--</ul>-->
          <ul class="explain">
            <li>文件上传:</li>
            <li>
              <a href="javascript:upfile('product_picture')">上传图片</a>
              <p class="tips">提示：1、图片上传大小不得超过4M</p>
              <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张图片</p>
            </li>
          </ul>
          <ul class="img jsaddimgul" id="product_picture">
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
                    <a href="{:U('Seller/Manage/templatelist',array('type'=>'detail'))}" target="_blank" class="btnproshowedit">选择模板</a>
                </div>
            </div>

        </dd>
       
     <h4>3.其他信息</h4>
      <dl class="other">
        <!--<dt>服务承诺：</dt>-->
        <!--<dd>-->
        <!--  <input type='checkbox' name="service_promise[]" value="1" id="service_promise_1" <if condition="in_array('1',$data['service_promise'])">checked</if>  /><label for="service_promise_1">待定</label>-->
        <!--  <input type='checkbox' name="service_promise[]" value="2" id="service_promise_2" <if condition="in_array('2',$data['service_promise'])">checked</if>  /><label for="service_promise_2">待定</label>-->
          <!--<input type='checkbox' name="service_promise[]" value="3" id="service_promise_3" <if condition="in_array('3',$data['service_promise'])">checked</if>  /><label for="service_promise_3">待定</label>-->
          <!--<input type='checkbox' name="service_promise[]" value="4" id="service_promise_4" <if condition="in_array('4',$data['service_promise'])">checked</if>  /><label for="service_promise_4">待定</label>-->
        <!--</dd>-->
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
           <input type='checkbox' name="service_promise[]" value="19" id="service_promise_19" <if condition="in_array('19',$data['service_promise'])">checked</if>  /><label for="service_promise_19">免费报价</label>
           <input type='checkbox' name="service_promise[]" value="20" id="service_promise_20" <if condition="in_array('20',$data['service_promise'])">checked</if>  /><label for="service_promise_20">陪选主材</label>
           <input type='checkbox' name="service_promise[]" value="21" id="service_promise_21" <if condition="in_array('21',$data['service_promise'])">checked</if>  /><label for="service_promise_21">装修保姆</label>
           <input type='checkbox' name="service_promise[]" value="22" id="service_promise_22" <if condition="in_array('22',$data['service_promise'])">checked</if>  /><label for="service_promise_22">随叫随到</label>
           <input type='checkbox' name="service_promise[]" value="23" id="service_promise_23" <if condition="in_array('23',$data['service_promise'])">checked</if>  /><label for="service_promise_23">垃圾下楼</label>
           <input type='checkbox' name="service_promise[]" value="24" id="service_promise_24" <if condition="in_array('24',$data['service_promise'])">checked</if>  /><label for="service_promise_24">工期0延误</label>
         </br>
           <input type='checkbox' name="service_promise[]" value="25" id="service_promise_25" <if condition="in_array('25',$data['service_promise'])">checked</if>  /><label for="service_promise_25">工程无转包</label>
           <input type='checkbox' name="service_promise[]" value="26" id="service_promise_26" <if condition="in_array('26',$data['service_promise'])">checked</if>  /><label for="service_promise_26">成品保护</label>
           <input type='checkbox' name="service_promise[]" value="27" id="service_promise_27" <if condition="in_array('27',$data['service_promise'])">checked</if>  /><label for="service_promise_27">零增项</label>
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
            <input type="text" name="starttime" id="starttime" value="<?php echo ($data['starttime_type'] ==2)?$data['starttime']:date('Y-m-d H:i') ?>" class="J_datetime input" >
          </span>
          <br>
          <span>
            <em data-v="3" data-radioname="starttime_3" data-toinpname="starttime_type" data-group="starttime_group" class="<?php echo ($data['starttime_type'] ==3)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="starttime_3" class="forradio">放入仓库</label>

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
        <a href="javascript:$('#form_add_yanshou').submit()">发布</a>
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
   //   var str = $('#' + returnid).html();
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
    //添加风格 响应事件
    function addcase(){
      var count = $("#case > :text").length;
      console.log(count);
      if(count <4)
      {
        $("#case > :text :first").clone(true).appendTo("#case");
      }
      else{
        alert("最多添加额外三个案例！");
      }
    }
    //提交时检查待提交数据是否合法
    function checkForm(){

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

 function submitadd(){

  TableToJson();
    var action = $("input[name='a']").val();
    var id = $("input[name='id']").val();
    var url = "/Seller/Yanshou/" + action +"?id=" + id;
    $.ajax({
      url:url,
      type:"post",
      data:$("#form_add_yanshou").serialize(),
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
              str+="<td><input type='text' value='"+arinpvals[0]+"' class='price_act'></td>"
              str+="<td><input type='text' value='"+arinpvals[1]+"' class='quantity'></td>"
              str+="<td><input type='text' value='"+arinpvals[2]+"' class='tsc'></td>"
              str+="<td><input type='text' value='"+arinpvals[3]+"' class='barcode'></td>"
              
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

  </script>
</body>
</html>
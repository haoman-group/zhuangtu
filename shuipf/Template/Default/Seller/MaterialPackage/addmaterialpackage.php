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
      <p>类目>>网购建材>>{$categoryName}</p>
      <a href="{:U('selectcate')}" >编辑类目</a>
    </div>
    <div class="rightbox">
      <form id="form_add"  method="post"  >
        <input type="hidden" name='shopid' value="{$shopid}">
       <!-- <input type='hidden' value='Seller' name='g'>-->
       <!-- <input type='hidden' value='Material' name='m'>-->
       <empty name="Think.get.id">
          <input type='hidden' value='add' name='a'>  
        <else/>
          <input type='hidden' value='edit' name='a'>
        </empty>
      <h4>1、宝贝基本信息</h4>
      <dl>
        <dt><i>*</i>宝贝标题：</dt>
        <dd class="title"><span>瓷砖工程 木地板工程 橱柜及衣柜工程 壁纸工程 门置工程 集成吊顶工程 灯具开关工程</span></dd>
        <dt><!-- <i>*</i> -->宝贝卖点：</dt>
        <dd><textarea name="sell_points" >{$data.sell_points}</textarea></dd>
       <!--  <dt><i>*</i>宝贝属性：</dt> -->
        <!-- <dd class="attribute"> -->
        <!--<p>关键属性：</p>-->
        <!-- <volist name="property" id ="vo">
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
          <!-- <volist name="property" id ="vo">
          <if condition="$vo['is_key_prop'] != '1' and $vo['is_sale_prop'] !='1'">
          <div class="dt">{$vo.name}:</div>
          <div class="dd">
            
            <if condition="$vo['is_enum_prop'] == '1'">
              <if condition="$vo['multi'] != '1'">
                <select name="nokey_prop[{$vo.pid}]">
                  <volist name="vo['value']" id='va'>
                    <option value="{$va.vid}" <if condition="$data['nokey_prop'][$vo['pid']] == $va['vid']">selected</if>>{$va.name}</option>
                  </volist>
                   <empty name="Think.get.id"> -->
         <!-- <option value="">无</option>
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
            <else/> -->
            <!--非枚举属性-->
           <!--  <?php
           
            ?>
            </if>
          </div>
          </if>
        </volist>
        </dd>  -->

       <!--  <dt>宝贝规格：</dt> -->
        <!--销售属性-->
        <dd class="format">
          <!-- <span>注：请先选择宝贝规格，然后填入相应的价格</span> -->
         <!--  <div class="formatulbox"> -->
         <!--销售属性 且 颜色属性-->
         <!-- <volist name="property" id ="vo">
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
          <script type="text/javascript">$(function(){$(".picOfcolor").show()})</script>
          </if>
        </volist> -->
        <!--销售属性 且 非颜色属性-->
        <!-- <volist name="property" id ="vo">
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
        </volist> -->
        
       <!--  </div> -->

               <!--  <table class="colorclasstable" style="display:<?php echo empty($selected_prop) ? "none" : "table "; ?>">
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
                                <input class="btn" type="file" value="">
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
                               <input class="btn" type="button" value="图片空间">
                            </td>
                        </tr>
                      </volist>
                      
                      </if>
                    </volist>

                    </tbody>
                </table> -->
                <div class="sizeclatabbox">
                              <!-- <table class="typesizeclasstable" style="display:block;">
                                <tr>
                                  <td><span>门店价:</span><input type="text" name="price"></td>
                                   <td><span>活动价:</span><input type="text" name="price_act"></td>
                                </tr> -->
                       <!--  <thead>
                            <tr>
                                <foreach name="selected_prop" item="vo" key="vk">
                                    <th class="val">{$vk}</th>
                                </foreach>
                                <th class="price">门店价格</th>
                                <th class="price_act">活动价格</th>
                                <th class="quantity">数量</th>
                                <th class="tsc">宝贝编码</th>
                                <th class="barcode">商品条形码</th>
                            </tr>
                        </thead> -->
                        <!-- <tbody>
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
                        </tbody> -->
                    <!-- </table>  -->
                    <!-- <p>门店价:<input type="text" name="price"></p>
                    <p>活动价:<input type="text" name="price_act"></p>  -->
                    <!--  <dd><i>*</i>门店价：</dd> -->
                    <!--<input type="text" name="price">
                    <dt><i>*</i>活动价：</dt>
                    <input type="text" name="price_act"> -->
                    <span class="propertytip"><strong>!</strong>您需要选择所有的销售属性，才能组合成完整的规格信息。</span>
                </div>

        
        
        <!-- <table class="picOfcolor" hidden>-->
        <!--  <thead>-->
        <!--    <th>颜色</th>-->
        <!--    <th>图片</th>-->
        <!--  </thead>-->
        <!--  <tbody></tbody>-->
        <!--</table>-->
        <!--<table class="sale_attr">-->
        <!--  <thead>-->
        <!--    <tr>-->
        <!--      <notempty  name="data['sale_prop']"><th>颜色分类</th></notempty>-->
        <!--      <th><i>*</i>价格</th>-->
        <!--      <th><i>*</i>数量</th>-->
        <!--      <th>商家编码</th>-->
        <!--      <th>操作</th>-->
        <!--    </tr>-->
        <!--  </thead>-->
        <!--  <tbody>-->
        <!--    <volist name="data['sale_prop']" id="vo">-->
        <!--      <tr data-vid="{$key}">-->
        <!--          <td>{$vo['0']}</td>-->
        <!--          <td><input type='hidden' name='sale_prop["{$key}"][]' value="{$vo['0']}">-->
        <!--            <input type='text' name='sale_prop["$key"][]' value="{$vo['1']}">-->
        <!--          </td>-->
        <!--          <td><input type='text' name='sale_prop["{$key}"][]' value="{$vo['2']}"></td>-->
        <!--          <td><input type='text' name='sale_prop["{$key}"][]' value="{$vo['3']}"></td>-->
        <!--          <td><a href="javascript:void(0)" onclick="javascript:$(this).parent().parent().remove();">删除</a></td>-->
        <!--        </tr>-->
        <!--    </volist>-->
        <!--  </tbody>-->
        <!--</table>-->
                <!--<input type="button" class="btn" onclick="TableToJson()" value="测试"></input>-->
        </dd>
        <dt><!-- <i>*</i> -->价格活动：</dt>
        <?php $activity= empty($data['activity'])?'装途专享':$data['activity'];?>
        <dd><Form function="select" parameter="option('activity'),$activity,class='' name='activity',"/></dd>
        <dt><!-- <i>*</i> -->库存状态：</dt>
        <dd>
          <!--<input name="inventory" value="{$data.inventory}"></input>-->
          <select name="inventory" id="">
            <option value="1" <if condition="$data['inventory'] == 1">selected</if>>现货</option>
            <option value="2" <if condition="$data['inventory'] == 2">selected</if>>定制</option>
          </select>
          </dd>
        <dt><!-- <i>*</i> -->宝贝编码：</dt>
        <dd><input name="shopcode" value="{$data.shopcode}"></dd>
        <dt><i>*</i>宝贝数量</dt>
        <dd><input name="number" value="{$data.number}"></dd>
        <dt>是否限量:</dt>

        <dd>
        <input type="radio" name="checklimit" class="checklimit" value="-1" <if condition="($data.limitnum eq -1) OR (empty($data))">checked</if>>不限量
        <input type="radio" name="checklimit" class="checklimit" value="0"  <if condition="($data.limitnum neq -1) AND (!empty($data))">checked </if>>限量
        </dd>
        <div  class="limitnum" <if condition="($data.limitnum neq -1) AND (!empty($data))">style="display:block"<else/>style="display:none"</if>>
        <dt>限购数量:</dt>
        <dd><input type="text" name="limitnum" <if condition="$data.limitnum neq -1">value="{$data.limitnum}"<else/>value=""</if>></dd>
        </div>
        <dt><i>*</i>计价单位</dt><dd><input type="hidden" name="charge_unit" value="元">元</dd>
        <dt>计价方式：</dt><dd><input type="hidden" name="pay_mode" value="主材包">主材包</dd>
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
          <!--<ul class="title">-->
          <!--  <li>本地上传</li>-->
          <!--</ul>-->
          <ul class="explain">
            <li>文件上传:</li>
            <li>
              <a href="javascript:upfile('product_picture')" class="seller_upload_image">上传图片</a>
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
                    <a href="{:U('Seller/Manage/templatelist',array('type'=>'detail','id'=>$data['id']))}" target="_blank" class="btnproshowedit">选择模板</a>
                </div>
            </div>

        </dd>
       
        <!--<dt>店铺所属的分类：</dt>
        <!--<dd><textarea name="cate_inshop" >{$data.cate_inshop}</textarea></dd>-->
         <!--<dd>
         <span class="abtnclass">
                    <div class="ulbox" data-proid="{$vo.id}">
                      <volist name="category" id="cate">
                        <ul>
                          <h6><empty name='cate[son]'><input type="checkbox" id="chk{$cate[id]}_pro{$vo.id}" data-name="{$cate[name]}" value="{$cate[id]}" <?php if($vo['shopin_category'][$cate[id]]) echo 'checked';?> ></empty> <label for="chk{$cate[id]}_pro{$vo.id}">{$cate[name]}</label></h6>
                          <volist name="cate[son]" id="c">
                            <li>
                              <input type="checkbox" id="chk_{$c[id]}_pro{$vo.id}" data-name="{$c['name']}" value="{$c[id]}" <?php if($vo['shopin_category'][$c['id']]) echo 'checked'; ?>>
                              <label for="chk_{$c[id]}_pro{$vo.id}">{$c['name']}</label>
                            </li>
                          </volist>
                        </ul>
                      </volist>
                    </div>
                  </span>
         </dd>-->

        <h4>3.其他信息</h4>   
        <dt><a href="javascript:void(0)" class="baby_address_show" onclick="document.getElementById('show').style.display='block';">宝贝所在地址</a></dt>
        <dd class="table">
          <div id="show" class="white_content">
            <volist name="list" id = 'vo'>
             {$vo.name}: <input type='checkbox' name="details[]" value="{$vo.id}" id="details_{$i}" <if condition="in_array($i,$data['details'])">checked</if>  /><label for="details_{$i}">{$vo.address}</label></br>
            </volist> 
            <a class="baby_address_hidden" href="javascript:void(0)" onclick="document.getElementById('show').style.display='none';">确定</a>
          </div>
        </dd>    
        <input type="hidden" name="agreement" class="refreshclear" data-default-v="<empty name='data.agreement'>0<else/>{$data.agreement}</empty>" data-inpname="agreement" value="<empty name='data.agreement'>0<else/>{$data.agreement}</empty>">
        <dt>合同：</dt>
        <dd class="table">
        <span>
          <em data-v="1" data-radioname="agreement_1" data-toinpname="agreement" data-group="agreement_group" class="<?php echo ($data['agreement'] ==1)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
          <label data-forradio="is_agreement_1" class="forradio">有合同</label>
          <em data-v="2" data-radioname="agreement_0" data-toinpname="agreement" data-group="agreement_group" class="<?php echo ($data['agreement'] ==2)?"bindinput radiogroup on":"bindinput radiogroup" ?>" onclick="document.getElementById('notes').style.display='block';"></em>
          <label data-forradio="is_agreement_0" class="forradio" >没合同</label>
          <em data-v="3" data-radioname="agreement_2" data-toinpname="agreement" data-group="agreement_group" class="<?php echo ($data['agreement'] ==3)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
          <label data-forradio="is_agreement_2" class="forradio">无</label>
        </span>
        </dd>   
         <dd class="table">
          <div id="notes" class="white_content">
            <p>注：您上传的宝贝，选择不与消费者签订线下合同，一旦发生纠纷，

              装途网将根据《装途网服务协议》处理。  </p>
            <a class="baby_address_hidden" href="javascript:void(0)" onclick="document.getElementById('notes').style.display='none';">确定</a>
          </div>
        </dd>    
        <input type="hidden" name="agreement" class="refreshclear" data-default-v="<empty name='data.agreement'>0<else/>{$data.agreement}</empty>" data-inpname="agreement" value="<empty name='data.agreement'>0<else/>{$data.agreement}</empty>">
        
        <!-- <dd>     -->
      <!-- <dl class="other"> -->
        <dt>服务承诺：</dt>
        <dd class="table">
           <input type='checkbox' name="service_promise[]" value="1" id="service_promise_1" <if condition="in_array('1',$data['service_promise'])">checked</if>  /><label for="service_promise_1">假一赔十</label>
           <input type='checkbox' name="service_promise[]" value="2" id="service_promise_2" <if condition="in_array('2',$data['service_promise'])">checked</if>  /><label for="service_promise_2">价高返差</label>
           <input type='checkbox' name="service_promise[]" value="3" id="service_promise_3" <if condition="in_array('3',$data['service_promise'])">checked</if>  /><label for="service_promise_3">无理由换货</label>
           <input type='checkbox' name="service_promise[]" value="4" id="service_promise_4" <if condition="in_array('4',$data['service_promise'])">checked</if>  /><label for="service_promise_4">免费上门服务</label>
           <input type='checkbox' name="service_promise[]" value="5" id="service_promise_5" <if condition="in_array('5',$data['service_promise'])">checked</if>  /><label for="service_promise_5">放心环保</label>
           </br>
           <input type='checkbox' name="service_promise[]" value="6" id="service_promise_6" <if condition="in_array('6',$data['service_promise'])">checked</if>  /><label for="service_promise_6">免费维修</label>
           <input type='checkbox' name="service_promise[]" value="7" id="service_promise_7" <if condition="in_array('7',$data['service_promise'])">checked</if>  /><label for="service_promise_7">免费退补</label>
         <input type='checkbox' name="service_promise[]" value="8" id="service_promise_8" <if condition="in_array('8',$data['service_promise'])">checked</if>  /><label for="service_promise_8">无忧安装</label>
          <input type='checkbox' name="service_promise[]" value="9" id="service_promise_9" <if condition="in_array('9',$data['service_promise'])">checked</if>  /><label for="service_promise_9">年质保</label>
           <input type='checkbox' name="service_promise[]" value="10" id="service_promise_10" <if condition="in_array('10',$data['service_promise'])">checked</if>  /><label for="service_promise_10">7天无理由退货</label>
           </br>
           <input type='checkbox' name="service_promise[]" value="11" id="service_promise_11" <if condition="in_array('11',$data['service_promise'])">checked</if>  /><label for="service_promise_11">终身售后</label>
           <input type='checkbox' name="service_promise[]" value="12" id="service_promise_12" <if condition="in_array('12',$data['service_promise'])">checked</if>  /><label for="service_promise_12">免费设计</label>
           <input type='checkbox' name="service_promise[]" value="13" id="service_promise_13" <if condition="in_array('13',$data['service_promise'])">checked</if>  /><label for="service_promise_13">破损全包</label>
           <input type='checkbox' name="service_promise[]" value="14" id="service_promise_14" <if condition="in_array('14',$data['service_promise'])">checked</if>  /><label for="service_promise_14">先行赔付</label>
          <input type='checkbox' name="service_promise[]" value="15" id="service_promise_15" <if condition="in_array('15',$data['service_promise'])">checked</if>  /><label for="service_promise_15">及时安装</label>
          </br>
           <input type='checkbox' name="service_promise[]" value="16" id="service_promise_16" <if condition="in_array('16',$data['service_promise'])">checked</if>  /><label for="service_promise_16">材质保真</label>
           <input type='checkbox' name="service_promise[]" value="17" id="service_promise_17" <if condition="in_array('17',$data['service_promise'])">checked</if>  /><label for="service_promise_17">全国联保</label>
           <input type='checkbox' name="service_promise[]" value="35" id="service_promise_35" <if condition="in_array('35',$data['service_promise'])">checked</if>  /><label for="service_promise_35">三年质保</label>
           <input type='checkbox' name="service_promise[]" value="36" id="service_promise_36" <if condition="in_array('36',$data['service_promise'])">checked</if>  /><label for="service_promise_36">五年质保</label>
           <input type='checkbox' name="service_promise[]" value="37" id="service_promise_37" <if condition="in_array('37',$data['service_promise'])">checked</if>  /><label for="service_promise_37">免费测量</label>
         </br>
           <input type='checkbox' name="service_promise[]" value="38" id="service_promise_38" <if condition="in_array('38',$data['service_promise'])">checked</if>  /><label for="service_promise_38">免费更换耗材</label>
           <input type='checkbox' name="service_promise[]" value="39" id="service_promise_39" <if condition="in_array('39',$data['service_promise'])">checked</if>  /><label for="service_promise_39">免费清洗</label>
           <input type='checkbox' name="service_promise[]" value="40" id="service_promise_40" <if condition="in_array('40',$data['service_promise'])">checked</if>  /><label for="service_promise_40">以旧换新</label>
           <input type='checkbox' name="service_promise[]" value="41" id="service_promise_41" <if condition="in_array('41',$data['service_promise'])">checked</if>  /><label for="service_promise_41">免费检测</label>
        </dd>
       <!-- <dt>送货服务：</dt>
        <dd>
          <input type='checkbox' name="delivery[]" value="1" id="delivery_1" <if condition="in_array('1',$data['delivery'])">checked</if>  /><label for="delivery_1">买家自提</label>
          <input type='checkbox' name="delivery[]" value="2" id="delivery_2" <if condition="in_array('2',$data['delivery'])">checked</if>  /><label for="delivery_2">卖家送货</label>
        </dd>-->
          
         <dt>安装服务：</dt>
         <dd class="table">
          <input type="hidden" name="setup" class="refreshclear" data-default-v="<empty name='data.setup'>0<else/>{$data.setup}</empty>" data-inpname="setup" value="<empty name='data.setup'>0<else/>{$data.setup}</empty>">
           <em data-v="1" data-radioname="setup_1" data-toinpname="setup" data-group="setup_group" class="<?php echo ($data['setup'] ==1)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="is_setup_1" class="forradio">买家安装</label>
            <em data-v="2" data-radioname="setup_0" data-toinpname="setup" data-group="setup_group" class="<?php echo ($data['setup'] ==2)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="is_setup_0" class="forradio">卖家安装</label>
            <em data-v="3" data-radioname="setup_2" data-toinpname="setup" data-group="setup_group" class="<?php echo ($data['setup'] ==3)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="is_setup_2" class="forradio">无</label>
        </dd>
          
         <dt>送货服务：</dt>
         <dd class="table">
          <input type="hidden" name="delivery" class="refreshclear" data-default-v="<empty name='data.delivery'>0<else/>{$data.delivery}</empty>" data-inpname="delivery" value="<empty name='data.delivery'>0<else/>{$data.delivery}</empty>">
             <em data-v="1" data-radioname="delivery_1" data-toinpname="delivery" data-group="delivery_group" class="<?php echo ($data['delivery'] ==1)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="is_delivery_1" class="forradio">买家自提</label>
            <em data-v="2" data-radioname="delivery_0" data-toinpname="delivery" data-group="delivery_group" class="<?php echo ($data['delivery'] ==2)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="is_delivery_0" class="forradio">卖家送货</label>
            <em data-v="3" data-radioname="delivery_2" data-toinpname="delivery" data-group="delivery_group" class="<?php echo ($data['delivery'] ==3)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
            <label data-forradio="is_delivery_2" class="forradio">无</label>
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

            <!--<em class="on">-->
              <input type="hidden"  name="expiry_date" value="1">
              <!--</em>-->
            <label>&nbsp;7天</label>          

          </span>
        </dd>
        <dt>开始时间：</dt>
        <dd class="table">
        <input type="hidden" name="starttime_type" class="refreshclear" data-default-v="<empty name='data.starttime_type'>3<else/>{$data.starttime_type}</empty>" data-inpname="starttime_type" value="<empty name='data.starttime_type'>1<else/>{$data.starttime_type}</empty>">        
          <span>

            <em data-v="1" data-radioname="starttime_1" data-toinpname="starttime_type" data-group="starttime_group" class="<?php echo ($data['starttime_type'] ==1)?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
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
            <em data-v="3" data-radioname="starttime_3" data-toinpname="starttime_type" data-group="starttime_group" class="<?php echo (($data['starttime_type'] ==3)|| empty($data['starttime_type']))?"bindinput radiogroup on":"bindinput radiogroup" ?>"></em>
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
        <a class="btnsubmit" href="javascript:void(0)">发布</a>
        <a href="{:U('lists')}">取消</a>
        <input type="hidden" name="cid" value="{$Think.get.inpcid}">
        <input type="hidden" name="vid" value="{$Think.get.inpvid}">
        <input type="hidden" name="id" value="{$Think.get.id}">
        <input type="hidden" name="price" class="priceArray" value=''>
        
      </div>
      </form>
    </div></div>
<template file="common/_promise.php"/>
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
      //var str = $('#' + returnid).html();
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
    <?php
    $max = 1;
    $authkey = upload_key("$max,$alowexts,1,$thumb_ext,$watermark_setting");
    ?>
    function col_upfile(id){
      flashupload(id+'_images', '图片上传',id,col_submit_pic,'{$max},{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
    }
    function col_submit_pic(uploadid,returnid){
      var d = uploadid.iframe.contentWindow;
      var in_content = d.$("#att-status").html().substring(1);
      var in_filename = d.$("#att-name").html().substring(1);
      var str = "";
      var contents = in_content.split('|');
      var filenames = in_filename.split('|');
      if (contents == '') return true;
      $.each(contents, function (i, n) {
          var ids = parseInt(Math.random() * 10000 + 10 * i);
          var filename = filenames[i].substr(0, filenames[i].indexOf('.'));
          console.log(ids);
          str += "<li id='image"+ids+"'><img src='"+n+"'><br><a href=\"javascript:remove_div('image" + ids + "')\" class='tupian' >删除</a></li>";
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
        $(".sale_attr > tbody").append("<tr data-vid='"+attr_vid+"'><td>"+attr_name+"</td><td><input type='hidden' style='width:50px' name='sale_prop["+attr_vid+"][]' value='"+attr_name+"'><input   style='width:50px' type='text' name='sale_prop["+attr_vid+"][]' value=''></td><td><input  style='width:50px'  type='text' name=sale_prop["+attr_vid+"][]' value=''></td><td><input   style='width:50px' type='text' name='sale_prop["+attr_vid+"][]' value=''></td><td><a href='javascript:void(0)' onclick='javascript:$(this).parent().parent().remove();'>删除</a></td></tr>");
      }
    }
    //同步事件
    function syncolor(obj){
      var vid = $(obj).attr('data-vid');
      $("tr[data-vid='"+vid+"']").each(function(){$(this).children('td:first').text($(obj).val());});
    }
    //设置颜色图片
    function setPicOfcolor(obj,add){
         //属性VID
        var attr_vid  = $(obj).next().attr("data-vid");
        //属性名称
        var attr_name = $(obj).next().val();
        if(add){
            $(".picOfcolor > tbody").append("<tr data-vid='"+attr_vid+"'><td>"+attr_name+"</td><td><input type='button' value='上传图像'></td></tr>");
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
      // $('input[name="priceArray"]').val() = 
      // $(".priceArray").val(TableToJson());
      // if(!TableToJson()){
      //   alert("创建价格数组错误!");
      //   return false;
      // }
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
    
function submitadd(){
  TableToJson();
  // return true;
    var action = $("input[name='a']").val();//以a 开头的所有的input
    var id = $("input[name='id']").val();//以id开头所有input的值；
    var url = "/Seller/MaterialPackage/" + action +"?id=" + id;
    $.ajax({
      url:url,
      type:"post",
      data:$("#form_add").serialize(),
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
  </script>
  <script>
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
        $('#form_add').submit();
    })
})


  </script>
  <script>
   $(function(){
    $(".checklimit").click(function(){
      $this=$((this));
      var type=$(this).val();
       if(type == '0'){
        $(".limitnum").show();
       }else{
         $(".limitnum").hide();
       }
    });
   })
  </script>

</body>
</html>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>卖家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css" />
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>
</head>
<body>
    <template file="Seller/common/_header.php" />
    <!--sellercent_wrap卖家中心通用     scindex卖家中心首页-->
    <div class="container sellercenter_wrap scindex">
        <template file="Seller/common/_left.php" />
        <div class="wraprt">
            <div class="crumbs">
                <a href="{:U('Seller/Index/index')}" class="cat-ajx">卖家中心</a>
                <a href="#" class="icon-ajx"> > </a>
                <a href="{:U('Seller/Index/index')}" class="icon-ajx">宝贝管理</a>
                <a href="#" class="icon-ajx"> > </a>
                <a href="{:U('Seller/Material/warehouse')}" class="icon-ajx">仓库中的宝贝</a>
                <a href="#" class="icon-ajx"> </a>
            </div>
            <div class="productwarehouse_head">
                <p><i>i</i>装途提醒您： 请核对您发布的商品是否符合最新商品发布规则商品违规发布累计扣12分将做店铺屏蔽 7天。</p>
                <a href="{:U('illegality')}">查看被下架的违规宝贝>></a>
            </div>
            <div class="productsell_sear">
                <ul class="head">
                    <li <if condition="!$Think.get.StateType || ($Think.get.StateType == '0' ) " >class="on"</if> ><a href="{:U('warehouse?StateType=0')}">全部></a></li>
                    <li <if condition="$Think.get.StateType && ($Think.get.StateType == '-1' ) " >class="on"</if>><a href="{:U('warehouse?StateType=-1')}">售完下架></a></li>
                    <li <if condition="$Think.get.StateType && ($Think.get.StateType == '-5' ) " >class="on"</if>><a href="{:U('warehouse?StateType=-5')}">我下架的></a></li>
                    <li <if condition="$Think.get.StateType && ($Think.get.StateType == '-10' ) " >class="on"</if>><a href="{:U('warehouse?StateType=-10')}">违规下架></a></li>
                    <li <if condition="$Think.get.StateType && ($Think.get.StateType == '5' ) " >class="on"</if>><a href="{:U('warehouse?StateType=5')}">即将开始></a></li>
                    <li <if condition="$Think.get.StateType && ($Think.get.StateType == '1' ) " >class="on"</if>><a href="{:U('warehouse?StateType=1')}">从未上架></a></li>
                </ul>
                <form id='searchoptions'  method="get">
        <table>
          <tr>
            <td>
              <span>宝贝名称：</span>
              <input type="text" name="title" value="{$Think.get.title}"></td>
            <td>
              <span>宝贝编码：</span>
              <input type="text" name="id" value="{$Think.get.id}"></td>
            <td>
              <span>宝贝类目：</span>
               <select name='designtype' >
                <option>--请选择--</option>
                <volist name="category" id="vo">
                    <option value='{$vo.cid}' <if condition="$Think.get.designtype == $vo['cid']">selected</if>>{$vo.name}</option>
                </volist>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <span>价格：</span>
              <input type="text" class="inputs" name="min_price" value={$Think.get.min_price}> <em>到</em>
              <input type="text" class="inputs" name="max_price" value={$Think.get.max_price}></td>
            <td>
              <span>销售量</span>
              <input type="text" class="inputs" name="min_sales" value={$Think.get.min_sales}> <em>到</em>
              <input type="text" class="inputs" name="max_sales" value={$Think.get.max_sales}></td>
            <td>
              <span>店铺中分类：</span>
              <select>
                <option>全部类目</option>
                <option>全部类目</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <span>
                橱窗推荐：
                <p></p>
              </span>
              <select>
                <option>全部类目</option>
                <option>全部类目</option>
              </select>
            </td>
            <td></td>
            <td>
              <input type="reset" class='reset' value="清除条件"></input>
              <input type='submit' class='sear' value="搜 索"></input>
             </td>
          </tr>
        </table>
        
        </form>
            </div>
            <div class="productrecycle_port">
                找不到您的宝贝？您可能长时间没有编辑过宝贝，请查看<a href="{:U('Seller/Product/history')}">历史宝贝记录>></a>
                <span class="recycle"><a href="{:U('recycle')}">宝贝回收站</a></span>
            </div>
            <div class="productsell_record">
                <h4>共有宝贝{$pageinfo.count}条记录</h4>
                <ul class="head">
                    <li>宝贝名称</li>
                    <li>价格</li>
                    <li>库存</li>
                    <li class="on">总销量</li>
                    <li>发布时间</li>
                    <li>操作</li>
                </ul>
                <form id="listItems"  method="post">
                <div class="title">
                     <i data-chklistname="prolist" class="bindchk chklist chkall" data-forchkname="chkall1"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></i> <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="chkall1"  name="chkall1"  >
                    <span class="chose" onClick="selectall('chkprolist[]');">全选</span>
                    <input type="button" value="删除" data-action="{:U('delete')}" onclick="submitaction(this)">
                    <input type="button" value="上架" data-action="{:U('shelve')}" onclick="submitaction(this)">
                </div>
                 <volist name="lists" id="vo">
                <ul class="list">
                   <li> <i  data-chklistname="prolist" class="bindchk chklist" data-forchkname="chkprolist{$vo.id}"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></i>
               <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="chkprolist{$vo.id}"  name="chkprolist[]" value="{$vo.id}" >{$vo.id}
                        <img src="{$vo.headpic}" class="pic">
                        <div class="instruction">
                            <p>
                                {$vo.title}
                            </p>
                        </div>
                    </li>
                    <li>￥
                        <if condition="$vo['min_price'] == $vo['max_price']">{$vo.min_price}
                            <else/>{$vo.min_price} - {$vo.max_price}</if>
                    </li>
                    <li>{$vo.num}</li>
                    <li>0</li>
                    <li>
                        <p>{$vo.addtime|date="Y-m-d",###}</p>
                        <p>{$vo.addtime|date="H:i",###}</p>
                    </li>
                    <li>
                        <p><a href="{:U('edit',array('id' => $vo['id']))}">编辑宝贝</a></p>
                        <p><a href="#">复制链接</a></p>
                    </li>
                </ul>
                </volist>
                 </form>
                <div class="end">
               <if condition="$pageinfo.page !=''">{$pageinfo.page}<a href="#" class="jump">确定</a></if>
            </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>


<template file="common/_promise.php"/>
    <template file="Seller/common/_footer.php" />
</body>

</html>

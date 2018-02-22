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
    <script src="{$config_siteurl}statics/js/zClip/jquery.zeroclipboard.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>
</head>
<body>
  <!--背景容器-->
  <template file="Seller/common/_header.php"/>

  <!--sellercent_wrap卖家中心通用     scindex卖家中心首页-->
  <div class="container sellercenter_wrap scindex">
    <template file="Seller/common/_left.php"/>
    <div class="wraprt">
      <div class="crumbs">
        <a href="{:U('Seller/Index/index')}" class="cat-ajx">卖家中心</a>
        <a href="#" class="icon-ajx"> > </a>
        <a href="{:U('Seller/Index/index')}" class="icon-ajx">宝贝管理</a>
        <a href="#" class="icon-ajx"> > </a>
        <a href="{:U('Seller/Product/lists')}" class="icon-ajx">出售中的宝贝</a>
        <a href="#" class="icon-ajx"> </a>
      </div>
      <div class="productsell_count">
        <!--<div class="head">-->
        <!--  <a href="{:U('lists')}">宝贝管理>></a>-->
        <!--</div>-->
        <div class="metaobao">我的装途网 >> </div>
        <div class="body">
          <div class="cposition">
            <h4>橱窗位</h4>
            总数:
            <span class="count">15</span>
            已使用:
            <span class="count">{$pageinfo.countcase}</span>
            <a href="{:U('Seller/Product/showcase')}" class="btn">查看明细</a>
            <a href="" class="btn">一键设置</a>

          </div>
          <div class="cposition">
            <h4>成交达标奖励规则</h4>
            <p>
              本周（2015-09-17至2015-09-23）成交额达
              <span class="cash">￥145.71</span>
              ，可奖励
              <span class="seat">10</span>
              个橱窗位
            </p>
            <p>
              本周（2015-09-17至2015-09-23）成交额达
              <span class="cash">￥291.42</span>
              ，可奖励
              <span class="seat">25</span>
              个橱窗位,
              <span class="seat">0</span>
              个精品橱窗位
            </p>
            <p class="reward">
              奖励每周五更新，您的本周成交额：
              <span class="cash">￥0.00</span>
            </p>
          </div>
        </div>
      </div>
      <div class="productsell_sear">
        <ul class="head">
          <li class="on" >出售中的宝贝></li>
          <li><a href="{:U('Seller/Product/showcase')}">橱窗推荐宝贝></a></li>
          <span class="recycle"><a href="{:U('recycle')}">宝贝回收站</a></span>
        </ul>
        <form id='searchoptions'  method="get">
        <table>
          <tr>
            <td>
              <span>宝贝名称：</span>
              <input type="text"  name="title" value="{$Think.get.title}"></td>
            <td>
              <span>宝贝编码：</span>
              <input type="text"  name="id" value="{$Think.get.id}"></td>
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
              </span>
              <select class="is_showcase">
                <option value="-1">--全部类目--</option>
                <option value="0">未设置橱窗推荐</option>
                <option value="1">已设置橱窗推荐</option>
              </select>
            </td>
            <td></td>
            <td>
              <input type="reset" class="reset" value="清除条件">
              <input type="submit" class="sear" value="搜 索">
          </tr>
        </table>
        </form>
        <h4>共有宝贝{$pageinfo.count}条记录</h4>
      </div>
      <div class="productsell_record">

        <ul class="head">
          <li>宝贝名称</li>
          <li><a href="">价格</a></li>
          <li><a href="">库存</a></li>
          <li class="on"><a href="">总销量<span class="arrow arrow2"></span></a></li>
          <li><a href="">发布时间<span class="arrow"></span></a></li>
          <li><a href="">操作</a></li>
        </ul>
        <form id="listItems"  method="post">
        <div class="title">
          <i data-chklistname="prolist" class="bindchk chklist chkall" data-forchkname="chkall1"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></i> <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="chkall1"  name="chkall1"  >
          <span class="chose"  onClick="selectall('chkprolist[]');">全选</span>
          <input type="button" value="删除"  data-action="{:U('delete')}" onclick="submitaction(this)">
          <input type="button" value="下架"  data-action="{:U('unshelve')}" onclick="submitaction(this)">
<!--          <select>-->
<!--            <option>出售中的宝贝</option>-->
<!--            <option>橱窗推荐宝贝</option>-->
<!--          </select>-->
<!--          <input type="button" value="取消推荐" data-action="{:U('unsetshowcase')}" onclick="submitaction(this)">-->
        </div>
          <volist name="lists" id="vo">
            <ul class="list">
              <li> <i  data-chklistname="prolist" class="bindchk chklist" data-forchkname="chkprolist{$vo.id}"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></i>
               <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="chkprolist{$vo.id}"  name="chkprolist[]" value="{$vo.id}" >{$vo.id}
                <a href="{:U('Shop/Product/show',array('id'=>$vo['id']))}"><img src="{$vo.headpic}" class="pic"></a>
                <div class="instruction">
                  <p>
                    <eq name="vo[is_showcase]" value="1">[橱窗推荐]</eq>&nbsp;<a href="{:U('Shop/Product/show',array('id'=>$vo['id']))}">{$vo.title}</a>
                  </p>
                </div>
              </li>
              <li>￥<if condition="$vo['min_price'] == $vo['max_price']" >{$vo.min_price}<else/>{$vo.min_price} - {$vo.max_price}</if></li>
              <li><empty name="vo['num']">--<else/>{$vo.num}</empty></li>
              <li><empty name="vo['count_sold']">--<else/>{$vo.count_sold}</empty></li>
              <li class="times">
                <p>{$vo.addtime|date="Y-m-d",###}</p>
                <p>{$vo.addtime|date="H:i",###}</p>
              </li>
              <li>
                <p><a href="{:U('edit',array('id' => $vo['id']))}">编辑宝贝</a></p>
                <p><a class="acopy" href="javascript:void(0)" data-prolink="{:U('Shop/Product/show',array('id'=>$vo['id']))}" >复制链接</a></p>
              </li>
            </ul>
          </volist>
          
           <div class="pagebox">

              <if condition="$pageinfo.page !=''">{$pageinfo.page}</if>

            </div>
<!--------------------------->
          <div class="title">
            <i data-chklistname="prolist" class="bindchk chklist chkall" data-forchkname="chkall1"><img src="{$config_siteurl}statics/zt/images/sellercenter/right.png" /></i> <input type="checkbox" class="refreshchk" data-default-v="0" data-chkname="chkall1"  name="chkall1"  >
            <span class="chose"  onClick="selectall('chkprolist[]');">全选</span>
            <input type="button" value="删除"  data-action="{:U('delete')}" onclick="submitaction(this)">
            <input type="button" value="下架"  data-action="{:U('unshelve')}" onclick="submitaction(this)">
            <input type="button" value="橱窗推荐" >
            <input type="button" value="取消推荐" data-action="{:U('unsetshowcase')}" onclick="submitaction(this)">
            <input type="button" value="设置运费" >
          </div>
          </form>
           
      </div>
    </div>
    <div class="clear"></div>
  </div>
<!--end-->
<template file="common/_promise.php"/>
<template file="Seller/common/_footer.php"/>
</body>
<script>
  $(".is_showcase").change(function(){
    var is_showcase = $(this).val();
    if(is_showcase >= 0){
      location.href = "http://" + window.location.host + "/Seller/Design/showcase?is_showcase=" + is_showcase;
    }
  });
</script>
</html>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>卖家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/templates.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"> </script>
</head>
<body>
<!--背景容器-->
<template file="Content/common/_header.php"/>
<div class="designerstencil2_banner"></div>
<div class="designerstencil2_person">
    <h4>HELLO EVERYBODY</h4>
    <dl>
        <dt>
            <img src="{$config_siteurl}statics/zt/images/designerstencil2_persondt.jpg">
        </dt>
        <dd>
            <h5>{$designer.name}</h5>
            <ul>
                <li>{$designer.idea}</li>
                <li>从业时间：{$designer.work_time}年以上</li>
                <li>设计擅长：{$designer.style}<!-- <a href="">公寓</a><a href="">别墅</a> --></li>
                <li>设计资历：{$designer.qualification}</li>
                <li>所获奖项：{$designer.credential}</li>
                <li>设计风格：{$designer.style}<!-- <a href="">中式</a><a href="">欧式</a><a href="">田园</a><a href="">现代</a><a href="">简约</a><a href="">混搭</a><a href="">地中海</a> --></li>
                <li>{$data.introduce}<!-- 我们致力于室内设计以及装修顾问服务、精拓实业，并不断追求宽广的业务，只求精益求精。数年来曾为改变！ --></li>
<!--                 <li>我们不与同行业“拼”价格，只“拼”设计质量、专业水平、服务品质。</li>
                <li>我们专业，因为我们热爱这个行业，请热爱生活的您与我们一同尊重设计。</li> -->
                <a href="" class="btn">关注TA</a><a href="" class="btn">预约此设计师</a>
            </ul>
        </dd>
    </dl>
    <img class="person" src="{$designer.picture|thumb=###,'282','561','0'}">
</div>
<div class="designerstencil2_title">
    <strong>P</strong><p>作品集<span>roducts</span></p>
</div>
<div class="designerstencil2_production">
    <volist name="products" id="vo">
    <div class="li">
        <img src="{$vo.headpic|thumb=###,'274','325','0'}">
        <div class="explain">
            <div class="style"><?php echo implode("/",unserialize($vo['attr_style']));?><p>{$vo.attr_area}㎡{$vo.attr_huxing}</p></div>
            <a class="desinerProduct" href="">收藏作品</a><a  class="desinerProduct" href="{:U('Shop/Product/show',array('id'=>$vo['id']))}" target="_blank">立即购买</a>
            <a href="{:U('Shop/Product/index',array('dom'=>$domain))}"><div class="more"><p>MORE</p>+</div></a>
        </div>
        <div class="bottomb"><p></p></div>
    </div>
    </volist>
<!--     <div class="li">
        <img src="{$config_siteurl}statics/zt/images/designerstencil2_productionli1.jpg">
        <div class="explain">
            <div class="style">现代简约风<p>96㎡两室两厅</p></div>
            <a href="">收藏作品</a><a href="">立即购买</a>
            <div class="more"><p>MORE</p>+</div>
        </div>
        <div class="bottomb"><p></p></div>
    </div>
    <div class="li">
        <img src="{$config_siteurl}statics/zt/images/designerstencil2_productionli1.jpg">
        <div class="explain">
            <div class="style">现代简约风<p>96㎡两室两厅</p></div>
            <a href="">收藏作品</a><a href="">立即购买</a>
            <div class="more"><p>MORE</p>+</div>
        </div>
        <div class="bottomb"><p></p></div>
    </div>
    <div class="li">
        <img src="{$config_siteurl}statics/zt/images/designerstencil2_productionli1.jpg">
        <div class="explain">
            <div class="style">现代简约风<p>96㎡两室两厅</p></div>
            <a href="">收藏作品</a><a href="">立即购买</a>
            <div class="more"><p>MORE</p>+</div>
        </div>
        <div class="bottomb"><p></p></div>
    </div> -->
    <ul>
        <li class="btn"><</li>
        <li>1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
        <li class="btn">></li>
    </ul>
</div>
<div class="designerstencil2_transition"></div>
<div class="designerstencil2_case">
    <div class="designerstencil2_title">
        <strong>S</strong><p>成功案例<span>uccessful case</span></p>
    </div>
    <ul>
        <li><a href="{:U('Shop/Product/show',array('id'=>$success[0]['id']))}" target="_blank"><img src="{$success.0.headpic|thumb=###,'572','359','0'}"></a></li>
        <li class="explain">
            <p><span class="style"><?php echo implode("/",unserialize($vo['attr_style']));?></span>{$vo.attr_area}㎡{$vo.attr_huxing}</p>
            <a href="">收藏作品</a><a href="{:U('Shop/Product/show',array('id'=>$success[0]['id']))}" target="_blank">立即购买</a>
        </li>
        <li><a href="{:U('Shop/Product/show',array('id'=>$success[1]['id']))}" target="_blank"><img src="{$success.1.headpic|thumb=###,'276','220','0'}"></a></li>
        <li><a href="{:U('Shop/Product/show',array('id'=>$success[2]['id']))}" target="_blank"><img src="{$success.2.headpic|thumb=###,'276','220','0'}"></a></li>
        <li><a href="{:U('Shop/Product/show',array('id'=>$success[3]['id']))}" target="_blank"><img src="{$success.3.headpic|thumb=###,'276','220','0'}"></a></li>
        <li><a href="{:U('Shop/Product/show',array('id'=>$success[4]['id']))}" target="_blank"><img src="{$success.4.headpic|thumb=###,'276','220','0'}"></a></li>
        <li><a href="{:U('Shop/Product/show',array('id'=>$success[5]['id']))}" target="_blank"><img src="{$success.5.headpic|thumb=###,'276','220','0'}"></a></li>
        <li><a href="{:U('Shop/Product/show',array('id'=>$success[6]['id']))}" target="_blank"><img src="{$success.6.headpic|thumb=###,'276','220','0'}"></a></li>
    </ul>
</div>
<!--尾部-->
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>  
</body>
</html>

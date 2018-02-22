<!--保护容器-->
<template file="common/_top.php"/>

<div class="conwhole whole_imgbox"><a href="javascript:void(0)" target="_blank"><img src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==" class="whole_img"/></a></div>

<!--logo-->
<!--保护容器-->
<div class="container sear searShop">
    <a href="{:U('/')}"><img class="left index_logo shopLogo" src="{$config_siteurl}statics/zt/images/index/logo_01.png"></a>
    <dl>

        <dt title="{$shopInfo.name}"><a href="/s/{$shopInfo.domain}">{$shopInfo.name}</a></dt>
            <?php
            $pid = M('ShopCategory')->where(array('id'=>$shopInfo['catid']))->getField('pid');

                echo "<dd>";
                switch($pid){
                    case 1: echo $shopInfo['years']."年设计保证";break;
                    case 2: echo (empty($data['workyears'])?$shopInfo['years']:$data['workyears'])."年施工经验";break;
                    case 3: echo $shopInfo['years']."年金牌老店";break;
                    case 4: echo $shopInfo['years']."年金牌老店";break;
                    case 5: echo $shopInfo['years']."年金牌老店";break;
                    case 23: echo $shopInfo['years']."年金牌老店";break;
                    default:break;
                }
                echo "</dd>";
            ?>
    </dl>
    <dl>
        <dt>
            <?php
            switch ($pid) {
                case 1:
                case 2:
                    echo "400-003-3030";
                    break;
                default:
                    echo $shopInfo['phone'];
                    break;
            }

            ?>
        </dt>
        <if condition="$pid neq '2'">
            <dd class="address_txt" title="{$shopInfo.addr}">{$shopInfo.addr}</dd>
        <else/>
            <dd class="star" style="background:none;padding-left:0;" data-star={$shopInfo.star}>
                装途认证
                <p><span></span></p>
            </dd>
        </if>
    </dl>

    <form class="searform" style="width:540px;height:31px;margin: 15px 2px 0 0;float:right;" id="shopForm" action="" method="get">
        <input type="text" value="{$shopInfo['id']}" style="display:none" name="shopid">
	    <input  type="text" class="inpsear inpShop" placeholder="搜索你喜欢的" name="searchkey" style="width:80%">
	    <input type="submit" class="btnsear btnShop" value="搜网站" style="width:15%" onclick="search()">
        <input type="submit" class="right selfShop" value="搜本店" onclick="searchself()">
    </form>
</div>
<?php if($pid == 1){ ?>
<!-- <div id="teamWorker">
    <div class="container">
        <img src="" alt="" class="img">
        <dl class="name">
            <dt>张大力</dt>
            <dd>zhang dali</dd>
        </dl>
        <dl class="style">
            <dt>资深设计师 / 从业8年</dt>
            <dd>现代风、简约、日式、中式</dd>
        </dl>
        <p class="idea headeridea">设计理念：简约而不简单，繁复而不繁琐</p>
        <a href="" class="cost">合作装修服务费</a>
        <a href="" class="btn"></a>
    </div>
</div> -->
<?php } ?>
<script>
    $(function(){
        // var store_txt = $(".store_txt").text().substr(0,12) + "...";
        // alert(address_txt)
        var address_txt = $(".address_txt").text().substr(0,13) + "...";
        // if($(".store_txt").html().length > 7){
        //     $(".store_txt").html(store_txt);
        // }else{

        // }
        if($(".address_txt").text().length >= 13){
            $(".address_txt").text(address_txt);
        }

        var star_num = $(".star").attr('data-star');
        if(star_num == 0.5){$('.star').find('span').css("width","10%");}
        if(star_num == 1){$('.star').find('span').css("width","20%");}
        if(star_num == 1.5){$('.star').find('span').css("width","30%");}
        if(star_num == 2){$('.star').find('span').css("width","40%");}
        if(star_num == 2.5){$('.star').find('span').css("width","50%");}
        if(star_num == 3){$('.star').find('span').css("width","60%");}
        if(star_num == 3.5){$('.star').find('span').css("width","70%");}
        if(star_num == 4){$('.star').find('span').css("width","80%");}
        if(star_num == 4.5){$('.star').find('span').css("width","90%");}
        if(star_num == 5){$('.star').find('span').css("width","100%");}

    })
</script>
<script>
  function search(){
    document.getElementById("shopForm").action="{$config_siteurl}Content/Search/search";
     document.shopForm.submit();
  }
  function searchself(){
    document.getElementById("shopForm").action="{$config_siteurl}Shop/Product/searchself";
    document.shopForm.submit();
  }

</script>

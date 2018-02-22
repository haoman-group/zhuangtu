  <!--搜索-->
<div id="search" class="search">
  <div class="seartype">
    <!-- <a href="javascript:void(0)" class="on">服务<i></i></a> -->
    <!-- <a href="javascript:void(0)">货源<i></i></a> -->
    <a href="javascript:void(0)" <if condition="(strpos($_SERVER['PHP_SELF'], 'search') eq true) OR (strpos($_SERVER['PHP_SELF'], 'Search') eq false) ">class="on" </if> data-url="{:U('Content/Search/search')}">宝贝<i></i></a>
    <a href="javascript:void(0)" <if condition="strpos($_SERVER['PHP_SELF'], 'resultshop') eq true"> class="on" </if> data-url="{:U('Content/Search/resultshop')}">店铺<i></i></a>
<!--    <a href="javascript:void(0)">帮助<i></i></a>-->

  </div>
  <form class="searform" action="{:U('Content/Search/search')}" method="get" target="_blank">
    <input  type="text" autocomplete="off" aria-expanded="false" class="inpsear" placeholder="搜索你喜欢的" name="searchkey" value="{$Think.get.searchkey}">
    <input type="submit" class="btnsear" value="搜索" >
    <div class="float_border"></div>
  </form>

  <h2>
    <a href="{:U('Content/Search/search', array('searchkey'=>'电视柜'))}">电视柜</a>
    <a href="{:U('Content/Search/search', array('searchkey'=>'真皮沙发'))}">真皮沙发</a>
    <a href="{:U('Content/Search/search', array('searchkey'=>'装修队'))}">装修队</a>
    <a href="{:U('Content/Search/search', array('searchkey'=>'乳胶漆'))}">乳胶漆</a>
    <a href="{:U('Content/Search/search', array('searchkey'=>'壁纸'))}">壁纸</a>
  </h2>
</div>
<script>
  // 搜索框功能
  $(function(){
    $(".searform").attr("action",$(".seartype a.on").attr("data-url"));
    $(".seartype").find("a").on("click",function(){
      $(this).addClass("on").siblings("a").removeClass("on");
      $(this).parents(".seartype").next("form").attr("action",$(this).attr("data-url"));
    });

    $('.searform .inpsear').focus(function(event){
      event.preventDefault();
      $(this).keyup(function(){
        $('.float_border').css('display','block');
      })
    }).blur(function(){
      $('.float_border').css('display','none');
    }).dblclick(function(event){
      event.preventDefault();
    })
  });
</script>

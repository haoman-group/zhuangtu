<div class="container sear buyercenter_sear">  
     <a href="" class="buyeimg_top"><img src="{$config_siteurl}statics/zt/images/buyercenter/buyercenterlogo.png" class="left" /></a>
     <div class="search" id="search">
     	<div class="seartype">
        	<a href="javascript:void(0)" class="on">服务<i></i></a>
            <a href="javascript:void(0)">宝贝<i></i></a>
            <a href="javascript:void(0)">店铺<i></i></a>
<!--            <a href="javascript:void(0)">帮助<i></i></a>-->
        </div>
        <form class="searform" action="{:U('Content/Search/search')}" method="get">
            <input  type="text" autocomplete="off" aria-expanded="false" class="inpsear" placeholder="搜索你喜欢的" name="searchkey" value="{$Think.get.searchkey}">
              <input type="submit" value="搜索" class="btnsear">
        </form>        
    </div>
</div>
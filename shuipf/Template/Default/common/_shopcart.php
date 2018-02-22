<div class="fixedsliderout">
    <div class="fixedslider fixsfold">
        <div class="navs">
            <a class="emim minlt needlogin">
                <i></i>
                <span>
                    <empty name="uid">0<else/>
                        <?php echo D('Buyer/Cart')->getCountByUid($uid);?>
                    </empty>
                </span>
                <cite>我的装途</cite>
            </a>
            <a href="/buyer/cart/" class="emcart minlt needlogin" id="shopCart">
                <div class="borders"></div>
                <i></i>
                <div class="txt">
                    购物车
                </div>                
            </a>
            <div class="emcart_tips">
                <i>▲</i>
                <p class="close"><a href="javascript:void(0)">×</a></p>
                <div class="title">
                    <h5>商品已成功加入购物车！</h5>
                    <p>您可以<a href="/Buyer/Cart/lists.html">去购物车结算</a>，或查看<a href="{:U('Shop/Product/index',array('cateID'=>'','dom'=>$domain))}">店内其他宝贝</a></p>
                </div>
                <p class="equal">同类宝贝推荐 ></p>
                <div class="box">
                    <div class="btnleft">‹</div>
                    <div class="centerbox">
                        <ul class="shopbox">
                            
                        </ul>
                    </div>
                    <div class="btnright">›</div>
                </div>
            </div>
            <a class="bill needlogin" href="{:U('Buyer/AccountBook/index')}"><i></i><cite>家装账单</cite></a>
            <a class="fav needlogin" href="/buyer/user/collection"><i></i><cite>我的收藏</cite></a>
            <a class="visited needlogin" href="/buyer/user/footprint"><i></i><cite>我看过的</cite></a>
            <a href="#" class="totop minlt">top</a>
        </div>
        <div class="tabs">
            <div class="tab zbchats">
                <div class="zb_top"><span>&gt;&gt;</span>联系卖家（当前页面）</div>
                <div class="zb_cen">最近联系</div>
                <ul class="zb_bot">
                    <li>
                        <img src="" />
                        <span class="name"></span>
                        <span class="date"></span>
                    </li>
                </ul>

                <div class="govim">
                    <a class="btngovim needlogin singleim">联系客服</a>
                    <p>如有疑问，请咨询装途客服<br>或拨打热线电话400-003-3030</p>
                </div>
            </div>
        </div>
        <div class="fixszhe"></div>
    </div>
</div>







<!--<div class="boxdiv">-->
<!--    <div class="twodiv">-->
<!--        <div class="div_in">-->
<!--            <div class="boxadiv">-->
<!--                <a onclick="show()"><div class="fix_navcona"><div class="fix_navatit" style="display: none; right: 70px; opacity: 0;">家装账单</div><img src="{$config_siteurl}statics/zt/images/index/fix/nav2.png"/></div></a>-->
<!--                <a onclick="show()"><div class="fix_navcona"><div class="fix_navatit" style="display: none; right: 70px; opacity: 0;">我的收藏</div><img src="{$config_siteurl}statics/zt/images/index/fix/nav3.png"/></div></a>-->
<!--                <a onclick="show()"><div class="fix_navcona"><div class="fix_navatit" style="display: none; right: 70px; opacity: 0;">我看过的</div><img src="{$config_siteurl}statics/zt/images/index/fix/nav4.png"/></div></a>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!---->
<!--        <div class="fix_navcon">-->
<!--            <div class="fix_navcona fix_logo">-->
<!--                <div class="fix_navatit" style="display: none; right: 70px; opacity: 0;">我的装途</div>-->
<!--                <div class="imghema"><img class="hema" src="{$config_siteurl}statics/zt/images/buyercenter/hema.gif"/></div>-->
<!---->
<!--                <div class="num topcartnum">-->
<!--                    <empty name="uid">0<else/>-->
<!--                        --><?php
//                        echo D('Buyer/Cart')->getCountByUid($uid);
//                        ?>
<!--                    </empty>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="fix_cart" id="shopCart">-->
<!--                <div class="borders"></div>-->
<!--                <a onclick="show()"><div class="tit">购物车</div></a>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!---->
<!--        <a href="#" class="totop">top</a>-->
<!--    </div>-->
<!---->
<!--</div>-->








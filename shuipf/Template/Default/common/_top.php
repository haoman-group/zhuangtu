
<div class="conwhole top">
  <div class="container top">
    <!--顶端-->
    <ul id="top_ulleft" class="top_ulleft">
      <!--顶端左-->
      <li>
        <a id="zt_index" href="{:U('/')}">回到装途首页</a>
      </li>
      <empty name="uid">
        <li>
          <span>你好,</span>
          <a href="{:U('Member/Buyer/login')}">请登录</a>
        </li>
        <li>
          <a href="{:U('Member/Buyer/register')}"><i>免费注册</i></a>
        </li>
        <else/>
        <li>
          <a href="{:U('Buyer/Index/index')}">{$username}</a>
        </li>
        <li>
          |<a href="{:U('Member/Index/logout')}">退出</a>
        </li>
        <li>
          <a href="" target="_top">
            <img src="{$config_siteurl}statics/zt/images/headmsg_10.png" />
            消息
            <span>0<div class="header_b"> <b></b></div></span>
          </a>
        </li>
        
      </empty>
      <li> <strong>太原</strong>
        【切换城市】
      </li>
    </ul>

    <ul id="top_ulright" class="top_ulright right">
      <!--顶端右-->
      <!-- <li>
        <a href="{:U('/')}" target="_top">回到装途首页</a>
      </li> -->
      <li>
        <div class="hassub hidden">
          <a href="{:U('Buyer/Order/index')}">
            我的装途
            <div class="header_b"> <b></b>
            </div>
          </a>
          <div class="sub show">
            <a href="{:U('Buyer/Order/index')}" target="_top">已买到的宝贝</a>
            <a href="<empty name='uid'>{:U('Member/Buyer/login')}<else/>{:U('Member/Buyer/Index')}</empty>" target="_top">我的足迹</a>
          </div>
        </div>
      </li>
      <!-- <li>
        <a href="">
          <img src="{$config_siteurl}statics/zt/images/headmsg_01.png" />
          我的关注
        </a>
      </li> -->
      <li class="topshipping">
        <div class="hassub hidden">
          <a href="{:U('/Buyer/Cart/lists')}" class="topcarta" target="_top">
            <img src="{$config_siteurl}statics/zt/images/headmsg_08.png" />
            购物车
            <span>  <span class="topcartnum"><empty name="uid">0<else/>
                  <?php
                  echo D('Buyer/Cart')->getCountByUid($uid);
                  ?>
                </empty></span><div class="header_b"> <b></b></div>
            </span>
          </a>
          <div class="sub show spcartframe">
              <h3>最近加入购物车的宝贝：</h3>
              <ul class="topcartul topcartnotload" >
                <li>
                  <a href="" target="_blank">
                    <dl>
                      <dt><img src="{$config_siteurl}statics/zt/images/top/shipingimg.jpg" /></dt>
                      <dd>
                        <p class="titlep">太原九宸空间设计资深设...</p>
                        <p class="gray">价格：每平米设计价格</p>
                      </dd>
                    </dl>
                  </a>
                  <div class="r_price">
                    <p>￥<span class="jiage">88.00</span></p>
                    <div class="optopcart">
<!--                        <a href="javascript:void(0)" class="fav">收藏</a>/-->
                        <span href="javascript:void(0)" class="del">删除</span>
                    </div>
                  </div>
                </li>
              <empty name='uid'>

                  <else/>
                <div class="loading"></div>
              </empty>
              </ul>
              <div class="topcartfoot">
                <p class="leftnump">购物车里还有<span class="leftnum">12</span>件宝贝</p>
                <a href="/Buyer/Cart/lists.html" class="lookvehicle needlogin">查看我的购物车</a>
              </div>

          </div>
        </div>
      </li>
      <li>
        <div class="hassub hidden">
          <a href="<empty name='uid'>{:U('Member/Buyer/login')}<else/>{:U('Buyer/User/collection')}</empty>" target="_top">
            <img src="{$config_siteurl}statics/zt/images/headmsg_06.png" />
            收藏夹
            <div class="header_b"> <b></b>
            </div>
          </a>
          <div class="sub show">
            <a href="<empty name='uid'>{:U('Member/Buyer/login')}<else/>{:U('Buyer/User/collection')}</empty>" target="_top">宝贝收藏</a>
            <a href="<empty name='uid'>{:U('Member/Buyer/login')}<else/>{:U('Buyer/User/collection')}</empty>" target="_top">店铺收藏</a>
          </div>
        </div>
      </li>
      <li>
        <a href="">
          <img src="{$config_siteurl}statics/zt/images/headmsg_07.png" />
          装途手机版
          <div class="header_b">
              <b></b>
          </div>
        </a>
      </li>
      <li>
        <a href="{:(U('/Check/index'))}" target="blank">
          <img src="{$config_siteurl}statics/zt/images/headmsg_05.png" />
          预约验收
        </a>
      </li>
      <li>
        <div class="hassub hidden">
          <a href="">
            商家支持
            <div class="header_b">
              <b></b>
            </div>
          </a>
          <div class="sub show">
            <a href="{:U('Member/Seller/index')}" target="_top">商家入驻</a>
            <a href="{:U('Seller/Index/index')}" target="_top">商家首页</a>
          </div>
        </div>
      </li>
      <li>
        <a href="{:U('/Public/contact')}" target="_blank">
        <img src="{$config_siteurl}statics/zt/images/headmsg_09.png" />
        联系客服</a>
      </li>
    </ul>
  </div>
</div>


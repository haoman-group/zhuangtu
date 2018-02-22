<div class="wraplt">
<!--      <div class="menulogo"></div>-->
      <div class="meation">我的应用</div>
      <div class="scentermenu">
        <dl>
          <dt>
            <a href="{:U('Seller/Index/index')}">交易统计</a>
            <div class="arrow">
                <s><b></b></s>

            </div>
          </dt>
        </dl>

        <dl>
          <dt>
            <a href="javascript:void(0)">账号管理
              <div class="arrow"><s></s></div>
            </a>
          </dt>
          <dd>
            <a href="{:U('Member/Account/secure')}">安全设置</a>
            <div class="arrow">
              <s><b></b></s>

            </div>

          </dd>
          <dd>
            <a href="{:U('Buyer/User/profile')}">个人资料</a>
            <div class="arrow">
              <s><b></b></s>

            </div>

          </dd>
          <dd>
            <a href="{:U('Member/Seller/shop_bank_cartid')}">银行卡</a>
            <div class="arrow">
              <s><b></b></s>
            </div>

          </dd>
        </dl>

         <eq name="cateType" value="3">
         <dl>
          <dt> <a  href="{:U('Seller/Address/address')}">地址管理</a>
           <div class="arrow">
             <s><b></b></s>
           </div>
          </dt>
         </dl>
         </eq>
         <eq name="cateType" value="4">
         <dl>
          <dt> <a  href="{:U('Seller/Address/address')}">地址管理</a>
           <div class="arrow"><s><b></b></s></div>
          </dt>
         </dl>
         </eq>
         <eq name="cateType" value="5">
         <dl>
          <dt> <a  href="{:U('Seller/Address/address')}">地址管理</a>
           <div class="arrow"><s><b></b></s></div>

           </dt>

         </dl>
         </eq>

        <dl>
          <dt>
            <a href="javascript:void(0)">交易管理</a>
            <div class="arrow"><s><b></b></s></div>
          </dt>
            <dd>
                <a href="{:U('Seller/Order/index')}">已卖出的宝贝</a>
            </dd>
        </dl>
        <dl>
          <dt>
            <a href="javascript:void(0)">宝贝管理</a>
            <div class="arrow"><s><b></b></s></div>
          </dt>
          <dd>
            <a href="{:U('Seller/Product/selectcate')}">发布宝贝</a>
          </dd>
          <dd>
            <a href="{:U('Seller/Product/lists')}">出售中的宝贝</a>
          </dd>
          <dd >
            <a href="{:U('Seller/Product/showcase')}" >橱窗推荐</a>
          </dd>
            <dd>
                <a href="{:U('Seller/Product/warehouse')}">仓库中的宝贝</a>

            </dd>
            <dd>
                <a href="{:U('Seller/Product/warehouse')}">历史宝贝记录</a>

            </dd>
            <dd>
                <a href="{:U('Seller/Product/warehouse')}">品牌查询</a>

            </dd>
          <!--<dd>-->
          <!--  <a href="{:U('Seller/Product/history')}">历史宝贝记录</a>-->
          <!--</dd>-->
          <!--<dd>-->
          <!--  <a href="javascript:void(0)">品牌查询</a>-->
          <!--</dd>-->
        </dl>
        <eq name="cateType" value="1">


        <dl>
          <dt>
            <a href="javascript:void(0)">上传设计师</a>
          </dt>
          <dd>
            <a href="{:U('Seller/Designer/add')}">上传设计师</a>
          </dd>
          <dd>
            <a href="{:U('Seller/Designer/index')}">设计师管理</a>
          </dd>
        </dl>
        <dl>
          <dt>
            <a href="{:U('Seller/DesignLibrary/index')}">设计库图片管理</a>
          </dt>
        </dl>
        </eq>
        <dl>
          <dt>
            <a href="javascript:void(0)">店铺管理</a>
            <div class="arrow"><s><b></b></s></div>
          </dt>
          <dd>
          	<a href="{:U('Seller/Manage/decorate')}" target="_blank">店铺装修</a>
          </dd>
        <dd>
            <a href="{:U('Seller/Manage/shopcatemanage')}" target="_blank">宝贝分类</a>
        </dd>
          <dd>
          	<a href="{:U('Picture/Index/index')}" target="_blank">图片空间</a>
          </dd>
          <dd>
          	<a href="{:U('Seller/Manage/setting')}">店铺设置</a>
          </dd>
        </dl>
        <dl hidden>
          <dt>
            <a href="javascript:void(0)">营销中心</a>
            <div class="arrow"><s><b></b></s></div>
          </dt>
        </dl>
        <dl>
          <dt>
            <a href="javascript:void(0)">客户服务</a>
          <div class="arrow"><s><b></b></s></div>
          </dt>
        </dl>
        <dl>
          <dt>
            <a href="javascript:void(0)">消息中心</a>
          <div class="arrow"><s><b></b></s></div>
          </dt>
        </dl>
        <eq name="cateType" value="1">
        <dl>
            <dt><a href="javascript:void(0)">合作工长</a></dt>
            <dd><a href="{:U('Seller/Teamworker/twAddEx')}">添加工长</a></dd>
            <dd><a href="{:U('Seller/Teamworker/twLists')}">已合作工长</a></dd>
          </dl>
        <dl>
          <dt>
            <a href="{:U('Seller/MaterialPackage/materialpackagelist')}">主材包</a>
            <div class="arrow">
                <s><b></b></s>

            </div>
          </dt>
        </dl>
        <dl>
          <dt>
            <a href="{:U('Seller/AccessoryPackage/accessorypackagelist')}">辅材包</a>
            <div class="arrow">
                <s><b></b></s>

            </div>
          </dt>
        </dl>
      </eq>
<!--         <dl>
          <dt>
            <a href="javascript:void(0)">卖家地图</a>
          <div class="arrow"><s><b></b></s></div>
          </dt>
        </dl> -->
      </div>
    </div>

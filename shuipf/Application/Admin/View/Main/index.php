<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
  <div id="home_toptip"></div>
  <h2 class="h_a">系统信息</h2>
  <div class="home_info">
    <ul>
      <volist name="server_info" id="vo">
        <li> <em>{$key}</em> <span>{$vo}</span> </li>
      </volist>
    </ul>
  </div>
  <!--
  <h2 class="h_a">开发团队</h2>
  <div class="home_info" id="home_devteam">
    <ul>
      <li> <em>负责人</em> <span>贺德虎 李博凯</span> </li>
      <li> <em>邮箱</em> <span>lbk747@163.com</span> </li>
      <li> <em>手机</em> <span>18610675202</span> </li>
      <li> <em>微信</em> <span>lbk747</span> </li>
    </ul>
  </div>
  -->

</div>

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 10/29/15
 * Time: 17:50
 */
if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">搜索</div>
    <form name="searchform" action="" method="get" >
        <input type="hidden" value="Admin" name="g">
        <input type="hidden" value="Smsemail" name="m">
        <input type="hidden" value="email" name="a">
        <input type="hidden" value="1" name="search">
        <label>邮箱</label>
        <input name="keyword" type="text" value="{$Think.get.keyword}" class="input" />
        <button class="btn">搜索</button><br/>
        
    </form>
    <!--<form name="myform" action="{:U('Smsverify/index')}" method="post" class="">-->
        <div class="table_list">
            <table width="100%" cellspacing="0">
                <thead>
                <tr>
                    <!--<td  align="left" width="20">#</td>-->
                    <td align="left">ID</td>
                    <td align="left">邮箱</td>
                    <td align="left">验证码</td>
                    <td align="left">发送时间</td>
                    <td align="left">结束时间</td>
                     <td align="left">内容</td>
                      <td align="left">url</td>
                </tr>
                </thead>
                <tbody>
                <volist name="data" id="em">
                    <tr>
                        <!--<td align="left">{$i}</td>-->
                        <td align="left">{$em.id}</td>
                        <td align="left">{$em.email}</td>
                        <td align="left">{$em.code}</td>
                        <td align="left">{$em.addtime|date="Y-m-d H:i",###}</td>
                        <td align="left">{$em.endtime|date="Y-m-d H:i",###}</td>
                         <td align="left">{$em.content}</td>
                          <td align="left">{$em.url}</td>
                    </tr>
                </volist>
                </tbody>
            </table>
            <div class="p10">
                <div class="pages"> {$Page} </div>
            </div>
        </div>
    <!--</form>-->
</div>
<<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
</body>
</html>
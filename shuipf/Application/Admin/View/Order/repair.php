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

    <form id="searchform"  name="searchform" method="post" >
        <input type="hidden" value="Admin" name="g">
        <input type="hidden" value="Order" name="m">
        <input type="hidden" value="repair" name="a" id='a'>
        <input type="hidden" value="1" name="search">
        <div class="search_type cc mb10">
            <div class="mb10">
                <span class="mr20">
                         <table>
                             <tr>
                                 <td>
                                     <span >订单支付号(pay_sn)：</span>
                                     <input name="pay_sn" type="text" style="width:210px;" class="input" required>
                                 </td>
                                 </tr>
                                 <tr>
                                 <td>
                                     <span style="margin-left: 20px;">支付时间：</span>
                                     <input name="payment_time" type="text"  class="input length_2 J_datetime" style="width:250px;">
                                 </td>
                             </tr>
                                 <tr>
                                 <td>
                                     <span style="margin-left: 20px;">支付方式：</span>
                                     <select name="payment_code" style="width:200px;">
                                         <option value=""> --全部-- </option>
                                         <volist name="paymodelist" id="pvo">
                                             <option value='{$key}' <if condition=" null !== $Think.get.paymode and $Think.get.paymode == $key">selected</if>>{$pvo}</option>
                                         </volist>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <input type='submit' class='sear' value="修复"/>
                                     <input type="checkbox" name="ifforce" id="ifforce" value="1">
                                     <label for="ifforce">强制修复</label>
                                 </td>
                             </tr>

                         </table>

                </span>
            </div>
        </div>
    </form>
   
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
</body>
</html>

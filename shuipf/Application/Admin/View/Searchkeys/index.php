<?php

if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>

    <form id="searchform"  name="searchform" method="get" >
        <input type="hidden" value="Admin" name="g">
        <input type="hidden" value="Searchkeys" name="m">
        <input type="hidden" value="index" name="a" id='a'>
        <input type="hidden" value="1" name="search">
        <div class="search_type cc mb10">
            <div class="mb10">
                <span class="mr20">
                    <table>
                        <tr>
                            <td>
                                <span style="margin-left: 16px;">数据范围：</span>
                                <span>{$startdate}</span>
                                --
                                <span>{$enddate}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="margin-left: 16px;">搜索时间：</span>
                                <input type="text" name="search_start_time" class="input length_2 J_date"  style="width:120px;" value="{$Think.get.search_start_time}">
                                --
                                <input type="text" class="input length_2 J_date" name="search_end_time"  style="width:120px;" value="{$Think.get.search_end_time}">
                            </td>
                            <td>
                                <input type='submit' class='sear' value="搜 索"/>
                            </td>
                        </tr>
                    </table>
                </span>
            </div>
        </div>
    </form>

    <form name="myform" method="post" class="J_ajaxForm">
        <div class="table_list">
            <table width="100%" cellspacing="0">
                <thead>
                <tr>
                    <td align="left" width="60">排名</td>
                    <td align="left">搜索关键词</td>
                    <td align="left">搜索次数</td>
                </tr>
                </thead>
                <tbody>
                <volist name="data" id="vo">
                    <tr>
                        <td align="left">{$rank++}</td>
                        <td align="left">{$vo.search_key}</td>
                        <td align="left">{$vo.counts}</td>
                    </tr>
                </volist>
                </tbody>
            </table>
            <div class="p10">
                <div class="pages"> {$Page} </div>
            </div>
        </div>
    </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 10/29/15
 * Time: 20:41
 */
if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap jj">
    <Admintemplate file="Common/Nav"/>
    <div class="common-form">
        <form method="post" class="J_ajaxForm" action="{:U('Shop/edit')}">
            <div class="h_a">菜单信息</div>
            <div class="table_list">
                <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
                    <input type="hidden" name="id" value="{$id}" />
                    <tbody>
                    <tr>
                        <td>用户ID:</td>
                        <td><input type="text" class="input" name="uid" value="{$data.uid}" readonly="readonly"></td>
                    </tr>
                    <tr>
                        <td>用户名:</td>
                        <td><input type="text" class="input" name="username" id="username" value="{$data.username}"  readonly="readonly"></td>
                    </tr>
                    <tr>
                        <td>店铺名称:</td>
                        <td><input type="text" class="input" name="name" id="shopname" value="{$data.name}"
                        <?php
                        if(!(\Libs\System\RBAC::authenticate('Admin/Shop/Shopname'))){
                            echo ' readonly="readonly"';
                        } 
                        ?>  
                         ></td>
                    </tr>
                    <tr>
                        <td>店铺类型:</td>
                        <!--<td><input type="text" class="input" name="catname" id="catname" value="{$category.category}" readonly="readonly"></td>-->
                        <td>
                            <select id="pcate" onchange="categoryChange()">
                            <?php 
                            foreach($category as $key=>$val){
                                if($val['id'] == $data['catpid']){
                                    echo  '<option value="'.$val['id'].'" selected>'.$val['name'].'</option>';
                                }else{
                                    echo  '<option value="'.$val['id'].'">'.$val['name'].'</option>';
                                }
                            }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>店铺级别:</td>
                        <!--<td><input type="text" class="input" name="catshopname" id="catshopname" value="{$category.shopname}" readonly="readonly"></td>-->
                        <td>
                            <select name="catid" id="cate">
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>站内域名:</td>
                        <td><input type="text" class="input" name="domain" id="domain" value="{$data.domain}"></td>
                    </tr>
                    <tr>
                        <td>店铺联系电话</td>
                        <td><input type="text" class="input" name="phone" id="phone" value="{$data.phone}"></td>
                    </tr>
                    <tr>
                        <td>店铺联系地址</td>
                        <td><input type="text" class="input" name="addr" id="addr" value="{$data.addr}"></td>
                    </tr>
                    <tr>
                        <td>是否认证:</td>
                        <td><label for="yes">是</label><input id="yes" name="certification" type="radio" value="1" <eq name="data['certification']" value="1">checked</eq>>
                            <label for="no">否</label><input id="no"  name="certification" type="radio" value="2" <eq name="data['certification']" value="2">checked</eq> >
                        </td>
                    </tr>
                    <tr>
                        <td>星级认证:</td>
                        <td><select name='star'>
                            <option value="0.5" <eq name="data['star']" value="0.5">selected</eq>>0.5</option>
                            <option value="1.0" <eq name="data['star']" value="1.0">selected</eq>>1.0</option>
                            <option value="1.5" <eq name="data['star']" value="1.5">selected</eq>>1.5</option>
                            <option value="2.0" <eq name="data['star']" value="2.0">selected</eq>>2.0</option>
                            <option value="2.5" <eq name="data['star']" value="2.5">selected</eq>>2.5</option>
                            <option value="3.0" <eq name="data['star']" value="3.0">selected</eq>>3.0</option>
                            <option value="3.5" <eq name="data['star']" value="3.5">selected</eq>>3.5</option>
                            <option value="4.0" <eq name="data['star']" value="4.0">selected</eq>>4.0</option>
                            <option value="4.5" <eq name="data['star']" value="4.5">selected</eq>>4.5</option>
                            <option value="5.0" <eq name="data['star']" value="5.0">selected</eq>>5.0</option>
                            </select>星</td>
                    </tr>
                    <tr>
                        <td>从业年限:</td>
                        <td><input type="text" class="input" name="years" id="years" value="{$data.years}"></td>年
                    </tr>
                    <tr>
                        <td>搜索排名权重:</td>
                        <td><input type="text" class="input" name="rank" id="rank" value="{$data.rank}"></td>年
                    </tr>
                    <tr>
                      <td>短信通知:</td>

                      <td><label for="">姓名：</label><input type="text" class="input" name=telphone[0][name] value= {$data[telphone][0][name]}><label for="">手机号：</label><input type="text" class="input" name="telphone[0][mobile]" id="telphone" value={$data['telphone']['0']["mobile"]} ></td>
                    </tr>
                    <tr><td></td><td><label for="">姓名：</label><input type="text" class="input" name=telphone[1][name] value= {$data[telphone][1][name]}><label for="">手机号：</label><input type="text" class="input" name="telphone[1][mobile]" id="telphone" value={$data['telphone']['1']["mobile"]} ></td></tr>
                    <tr><td></td><td><label for="">姓名：</label><input type="text" class="input" name=telphone[2][name] value= {$data[telphone][2][name]}><label for="">手机号：</label><input type="text" class="input" name="telphone[2][mobile]" id="telphone" value={$data['telphone']['2']["mobile"]} ></td></tr>
                    </tbody>
                </table>
            </div>
            <div class="">
                <div class="btn_wrap_pd">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                    <input type="hidden" name="id" value="{$data.id}" />
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
<script>
    var category = <?php echo json_encode($category); ?> ;
    var userCate = <?php echo $data['catid'];?> ;
    function categoryChange(){
        var catpid = $("#pcate").val() - 1;
        var html="";
        $.each( category[catpid]['son'], function(i,v){
            if(v.id == userCate){
                html += "<option value="+v.id+" selected >"+v.shopname+"</option>";
            }else{
                html += "<option value="+v.id+">"+v.shopname+"</option>";
            }
        })
        $("#cate").html(html);
    }
    categoryChange();
</script>
</body>
</html>
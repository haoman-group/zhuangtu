<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>装途网在线客服系统</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/chat.css" type="text/css"/>
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script src="http://cdn.ronghub.com/RongIMLib-2.1.0.min.js"></script>
    <script src="http://cdn.ronghub.com/RongEmoji-2.1.0.min.js"></script>
    <script src="{$config_siteurl}statics/js/ajaxForm.js"></script>
</head>
<body>
<div class="chatw">
    <div class="chatw_t">
        <img src="{$config_siteurl}statics/zt/images/chat/chatlogo.png"/>
        <strong>装途网在线客服系统</strong><span class="t_inspan btncloseim">x</span>
    </div>
    <div class="chatw_b">
        <div class="chatwin_l">
            <div class="contacts">
                <ul class="conta_ul">
                    <li class="on">最近联系</li>
                </ul>
                <ul class="l_conul">
                    <volist name="voimrecord" id="vo">

                        <a href="{:U('index',array('shopid'=>$vo['shop']['id'],'ischating'=>1))}">
                        <li data-shopid="{$vo.shopid}">
                            <img class="h_portrait" src="<empty name='vo.shop.logo' value=''>/statics/zt/images/hema_blueround_92_92.png<else/>{$vo['shop']['logo']}</empty>"  />
                            <span class="shopname">{$vo['shop']['name']}</span>
                            <span class="time">{:date('m-d',$vo['updatetime'])}</span>
                        </li>
                        </a>
                    </volist>

                </ul>
                <div class="contactin_con">

                    <div class="l_classification">
                        <ul>
                            <a href="{:U('Buyer/Index/index')}" target="_blank">
                            <li>
                                <img src="{$config_siteurl}statics/zt/images/chat/chatimg1.png"/>
                                买家中心
                            </li>
                            </a>
                            <a href="{:U('Buyer/Order/index')}" target="_blank">
                            <li>
                                <img src="{$config_siteurl}statics/zt/images/chat/chatimg2.png"/>
                                已买到的宝贝
                            </li>
                            </a>
                            <a href="{:U('Buyer/Cart/index')}" target="_blank">
                            <li>
                                <img src="{$config_siteurl}statics/zt/images/chat/chatimg3.png"/>
                                购物车
                            </li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="region">
                <div class="reg_t">
                    <volist name="voimmessage" id="vo">
                        <div class="t_con <eq name='vo.direction' value='1' >i_con</eq>">
                            <div class="tconname"><eq name='vo.direction' value='1' >{$username}<else/>{$shop['name']}</eq>  <span>(20{:date('y-m-d H:m:s',$vo['addtime'])})</span></div>
                            <dl>
                                <dt><img src="<eq name='vo.direction' value='1' >{$avatar}<else/>{$shop['logo']}</eq>"></dt>
                                <dd><?php echo htmlspecialchars_decode(reset(preg_split("/\|\=\|/",$vo['content']))) ?></dd>

                            </dl>
                        </div>

                    </volist>


                    <div id="botline"></div>
                </div>
                <div class="reg_b">
                    <div class="expression">
                        <em class="emojisout" href="javascript:void(0)">
                            <img src="{$config_siteurl}statics/zt/images/chat/expression1.png"/>
                            <div class="emojis clearfix">

                            </div>
                        </em>
<!--                        <a href="javascript:void(0)"><img src="{$config_siteurl}statics/zt/images/chat/expression2.png"/></a>-->
                        <em id="uploadpic" href="javascript:void(0)"><img src="{$config_siteurl}statics/zt/images/chat/expression3.png"/></em>
<!--                        <a href="javascript:void(0)"><img src="{$config_siteurl}statics/zt/images/chat/expression4.png"/></a>-->
                        <!--<span class="record">查看消息记录</span>-->
                    </div>
                    <div class="chattingzone">

                        <textarea class="chazo" id="txtask" value="请输入您想咨询的问题"></textarea>
                        <div class="chabo">
                            <span class="leftwords">还可以输入<span>360</span>字</span>
                            <a href="javascript:void(0)" class="btncloseim">关闭</a>
                            <a href="javascript:void(0)" onclick="sendtxt()" id="btnsend" class="newa">发送<!--<span class="newapan"></span>--></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="chatwin_r">
            <ul class="rcon_ul chtitul ulproshoptit" data-tag="shoppro">
                <li class="chtitli" ><empty name="order_sn">产品<else/>订单</empty>详情</li>
                <li class="on chtitli">店铺信息</li>
            </ul>
            <div class="chconul" data-tag="shoppro">
                <div class="clist chconli lipro" style="display: none;">
                    <notempty name="productid">
                        <dl>
                            <dt><a href="{:U('Shop/Product/show',array('id'=>$productid))}" target="_blank"><img class="propic" src="{$improduct['headpic']}"/></a></dt>
                            <dd>
                                <strong class="predsr">￥{$improduct["min_price"]}</strong>
                                <p>{$improduct["title"]}</p>
                            </dd>
                        </dl>
                        <a href="{:U('Shop/Product/show',array('id'=>$productid))}" class="purchase" target="_blank">点击购买</a>
                    </notempty>

                    <notempty name="order_sn">
                        <p>订单编号:<br>{$imorder["order_sn"]}</p>
                    </notempty>
                </div>
                <div class="clist chconli lishop">

                    <eq name="shop['id']" value="442">
                        <div class="govshopinfo">
                            <h5>装途网全国客服<img src="{$config_siteurl}statics/zt/images/hema_blue_341_339.png"> </h5>
                            <div class="tip">及时为您解答疑问。</div>
                            <div class="tip">第一时间帮您处理售前，售中，售后，退换货、退款等问题。</div>
                            <dl>
                                <dt class="red">电话 :</dt>
                                <dd class="red">400-003-3030</dd>
                                <dt>地址 :</dt>
                                <dd>太原市高新开发区高新街
                                    环能科技12F装途网</dd>
                            </dl>
                        </div>
                    <else/>
                        <div class="business">
                            <ul>
                                <li>
                                    <div>
                                        <h5>商家:{$shop['name']}</h5><img src="<eq name="shop['certification']" value='1'>{$config_siteurl}statics/zt/images/buyercenter/identificationicon.png<else/>{$config_siteurl}statics/zt/images/buyercenter/no_identificationicon.png</eq>">
                                    </div>
                                    <span> {$shop.years}<?php
                                            $pid = M('ShopCategory')->where(array('id'=>$shop['catid']))->getField('pid');
                                            switch($pid){
                                                case 1: echo "年设计保证";break;
                                                case 2: echo "年施工经验";break;
                                                case 3:
                                                case 4:
                                                case 5: echo "年金牌老店";break;
                                                default:break;
                                                }
                                            ?></span>
                                </li>
                                <li>
                                    <p>线上<span>5.0</span></p>
                                    <p>线上<span>5.0</span></p>
                                    <p>线上<span>5.0</span></p>
                                </li>
                                <li>
                                    <p>电话：{$shop.phone}</p>
                                    <p>地址：{$shop.addr}</p>
                                </li>
                            </ul>
                            <a href="/s/{$shop.domain}" target="_blank" class="purchase">进入店铺</a>
                        </div>

                        <img src="{$shop['headpic']}" class="headpic">
                        <div class="shopname">{$shop['name']}</div>

                    </eq>


                </div>
            </div>

        </div>
    </div>


</div>

<div class="zhe"></div>

<div id="msgtmplate" style="display: none;">
    <div class="t_con">
        <div class="tconname">我的名称-01  <span>(在线)</span></div>
        <dl>
            <dt><img src="/statics/zt/images/chat/tconlogo.jpg"></dt>
            <dd>我司旗舰店内购买产品，享受正规售后服务？</dd>
        </dl>
    </div>

    <div class="offlinetip"><span>您长时间没有操作,已处于离线状态,请刷新页面重新连接</span></div>

    <a href="" class="lirecord">
    <li data-shopid="78" >
        <img class="h_portrait" src="">
        <span class="shopname">周博海设计工作室装途专营店</span>
        <span class="time">05-06</span>
    </li>
    </a>

</div>


<form style="display: none;" id="upform" enctype="multipart/form-data" method="post" action="/Api/Other/upimg">
    <input type="file" name="upload" id="upfile">
</form>




<script>

    RongIMClient.init("{:C('RONGYUN_APP_KEY')}");
    RongIMLib.RongIMEmoji.init();

//    RongIMClient.registerMessageType('AddonMessage','s:empty',new RongIMLib.MessageTag(true,true),["shopid","productid","order_sn"]);

    var emojis = RongIMLib.RongIMEmoji.emojis;
    console.log(emojis);
    var $domemojis = $("<div></div>");
    $.each(emojis,function(i,v){
        $domemojis.append(v.innerHTML);
    });
    $(".emojis").html($domemojis.html());

    var customerServiceId = "{:C('RONGYUN_KEFU_ID')}";// 客服 Id
    var shopid = {$shop["id"]};
    var productid = {$productid};
    var order_sn = "{$order_sn}";
    var objshop = {}, objuser = {};
    var ischating = {$ischating};
    objshop["shopid"] = {$shop["id"]};
    objshop.shopname = "{$shop['name']}";
    objshop.shoplogo = "{$shop['logo']}";
    objshop.domain = "{$shop['domain']}";
    objuser.uname = "{$username}";
    objuser.mobile = "{$mobile}";
    objuser.avatar = "{$avatar}";
    objuser.uid = "{$uid}";

    if(objuser.uid === "451451451"){
        if(!$.cookie("chatnick")){
            var nickname = "游客"+ (new Date().Format("MMddhhmmssS"))+ Math.floor(100*Math.random());
            $.cookie("chatnick",nickname,{ expires: 365 ,path:"/"});
            objuser.uname = nickname;
        }
        else{
            objuser.uname = $.cookie("chatnick");
        }
    }



    //    var token = "RNWY62H7WFRqC9Y+qH3TZmnbybxpMRsuTBegMY95lt2Y/yp1LC3UP9NTxLoiuF+56ABkZf0CGKcL/bDUpaSyeg==";
    var token = "{$rongtoken}";


    // 设置连接监听状态 （ status 标识当前连接状态）
    // 连接状态监听器
    RongIMClient.setConnectionStatusListener({
        onChanged: function (status) {
            switch (status) {
                //链接成功
                case RongIMLib.ConnectionStatus.CONNECTED:
                    console.log('链接成功');
                    $(".zhe").hide();
                    if(!ischating){
                        msgoneshow("您好，很高兴为您服务，感谢您对本店的支持，建议在我司旗舰店内购买产品，享受正规售后服务",objshop.shopname,objshop.shoplogo,-1,0);
                        var jsonmsg = {};
                        jsonmsg["shopid"] = objshop.shopid;
                        jsonmsg["productid"] = productid;
                        jsonmsg["order_sn"] = order_sn;
                        jsonmsg["direction"] = 2;
                        jsonmsg["msgtype"] = 0;
                        jsonmsg["content"] = "您好，很高兴为您服务，感谢您对本店的支持，建议在我司旗舰店内购买产品，享受正规售后服务!";

                        addmsg(jsonmsg);
                    }
                    else{
                        document.getElementById("botline").scrollIntoView();
                    }
                    if(objuser.uid == "451451451"){
                        $("#msgtmplate .offlinetip").clone().find("span").html("友情提示:您处于未登录状态,咨询记录将无法保存,可 <a href='/Member/Buyer/register' target='_blank'>免费注册</a> 以获取更好的服务体验 ").end().insertBefore("#botline");
                    }


//                    RongIMClient.getInstance().switchToHumanMode("KEFU145992318841289",{
//                        onSuccess:function(){
//                            console.log("转到人工客服成功");
//                        },
//                        onError:function(){
//                            console.log("转到人工客服失败");
//                        }
//                    });

                    break;
                //正在链接
                case RongIMLib.ConnectionStatus.CONNECTING:
                    console.log('正在链接');
                    break;
                //重新链接
                case RongIMLib.ConnectionStatus.DISCONNECTED:
                    console.log('断开连接');
                    break;
                //其他设备登陆
                case RongIMLib.ConnectionStatus.KICKED_OFFLINE_BY_OTHER_CLIENT:
                    console.log('其他设备登陆');
                    break;
                //网络不可用
                case RongIMLib.ConnectionStatus.NETWORK_UNAVAILABLE:
                    console.log('网络不可用');
                    break;
            }
        }});

    // 消息监听器
    RongIMClient.setOnReceiveMessageListener({
        // 接收到的消息
        onReceived: function (message) {

            console.log(message);
            // 判断消息类型
            switch(message.messageType){

                case RongIMClient.MessageType.TextMessage:
                    // 发送的消息内容将会被打印
                    console.log(message.content.content);

                    msgoneshow(message.content.content.split(/\|\=\|/)[0],objshop.shopname,objshop.shoplogo,1,2);
                    var jsonmsg = {};
                    jsonmsg["shopid"] = objshop.shopid;
                    jsonmsg["productid"] = productid;
                    jsonmsg["order_sn"] = order_sn;
                    jsonmsg["direction"] = 2;
                    jsonmsg["msgtype"] = 1;
                    jsonmsg["content"] = message.content.content;
                    addmsg(jsonmsg);

                    break;
                case RongIMClient.MessageType.VoiceMessage:
                    // 对声音进行预加载
                    // message.content.content 格式为 AMR 格式的 base64 码
                    RongIMLib.RongIMVoice.preLoaded(message.content.content);
                    break;
                case RongIMClient.MessageType.ImageMessage:
                    // do something...
                    break;
                case RongIMClient.MessageType.DiscussionNotificationMessage:
                    // do something...
                    break;
                case RongIMClient.MessageType.LocationMessage:
                    // do something...
                    break;
                case RongIMClient.MessageType.RichContentMessage:
                    // do something...
                    break;
                case RongIMClient.MessageType.DiscussionNotificationMessage:
                    // do something...
                    break;
                case RongIMClient.MessageType.InformationNotificationMessage:
                    // do something...
                    console.log("InformationNotificationMessage");
                    if(message.content.message && message.content.message  === "暂无客服在线"){
                        $("#msgtmplate .offlinetip").clone().find("span").html("暂无客服在线").end().insertBefore("#botline");
                    }
                    else if(message.content.message && message.content.message === "装途网接受了您的请求"){
                        $("#msgtmplate .offlinetip").clone().find("span").html("客服接受了您的请求").end().insertBefore("#botline");
                    }
                    else if(message.content.message && message.content.message === "装途网结束了本次会话"){

                    }
                    else{
                        $("#msgtmplate .offlinetip").clone().insertBefore("#botline");
                    }
                    break;
                case RongIMClient.MessageType.ContactNotificationMessage:
                    // do something...
                    console.log("ContactNotificationMessage");
                    break;
                case RongIMClient.MessageType.ProfileNotificationMessage:
                    // do something...
                    break;
                case RongIMClient.MessageType.CommandNotificationMessage:
                    // do something...
                    break;
                case RongIMClient.MessageType.CommandMessage:
                    // do something...
                    break;
                case RongIMClient.MessageType.UnknownMessage:
                    // do something...
                    break;
                default:
                // 自定义消息
                // do something...
            }
        }
    });




    // 连接融云服务器。
    RongIMClient.connect(token, {
        onSuccess: function(userId) {
            console.log("Login successfully." + userId);
        },
        onTokenIncorrect: function() {
            console.log('token无效');
        },
        onError:function(errorCode){
            var info = '';
            switch (errorCode) {
                case RongIMLib.ErrorCode.TIMEOUT:
                    info = '超时';
                    break;
                case RongIMLib.ErrorCode.UNKNOWN_ERROR:
                    info = '未知错误';
                    break;
                case RongIMLib.ErrorCode.UNACCEPTABLE_PaROTOCOL_VERSION:
                    info = '不可接受的协议版本';
                    break;
                case RongIMLib.ErrorCode.IDENTIFIER_REJECTED:
                    info = 'appkey不正确';
                    break;
                case RongIMLib.ErrorCode.SERVER_UNAVAILABLE:
                    info = '服务器不可用';
                    break;
            }
            console.log(errorCode);
        }
    });


//    //发送消息给客服
//    function wenkefu(){
//        console.log("我要问客服");
//        // 定义消息类型,文字消息使用 RongIMLib.TextMessage
//        var msg = new RongIMLib.TextMessage({content: document.getElementById("txtask").value ,extra:"附加信息"});
//        var conversationtype = RongIMLib.ConversationType.CUSTOMER_SERVICE; // 客服会话类型
//        var customerServiceId = "KEFU146131758131409"; // 客服 Id
//        RongIMClient.getInstance().sendMessage(conversationtype, customerServiceId, msg, {
//                // 发送消息成功
//                onSuccess: function (message) {
//                    //message 为发送的消息对象并且包含服务器返回的消息唯一Id和发送消息时间戳
//                    console.log("Send successfully");
//                    console.log(message);
//                    var jsonmsg;
//                    jsonmsg["shopid"] = {$shop['id']};
//                    jsonmsg["productid"] = "{$productid}";
//                    jsonmsg["direction"] = 1;
//                    jsonmsg["msgtype"] = 1;
//                    jsonmsg["content"] = message.content.content;
//                    addmsg(jsonmsg);
//                },
//                onError: function (errorCode,message) {
//                    var info = '';
//                    switch (errorCode) {
//                        case RongIMLib.ErrorCode.TIMEOUT:
//                            info = '超时';
//                            break;
//                        case RongIMLib.ErrorCode.UNKNOWN_ERROR:
//                            info = '未知错误';
//                            break;
//                        case RongIMLib.ErrorCode.REJECTED_BY_BLACKLIST:
//                            info = '在黑名单中，无法向对方发送消息';
//                            break;
//                        case RongIMLib.ErrorCode.NOT_IN_DISCUSSION:
//                            info = '不在讨论组中';
//                            break;
//                        case RongIMLib.ErrorCode.NOT_IN_GROUP:
//                            info = '不在群组中';
//                            break;
//                        case RongIMLib.ErrorCode.NOT_IN_CHATROOM:
//                            info = '不在聊天室中';
//                            break;
//                        default :
//                            info = "weizhi";
//                            break;
//                    }
//                    console.log('发送失败:' + info);
//                }
//            }
//        );
//    }




    function sendtxt(){
        var txtcon = $("#txtask").val().trim();
        if(txtcon.length === 0){return false;}

        wenkefuxin(txtcon);
    }

    function wenkefuxin(msgcon){



        var msg = new RongIMLib.TextMessage({content:msgcon + "|=|" + objshop.domain +"|=|"+objshop.shopname+"|=|"+productid+"|=|"+objuser.uname+"|=|"+objuser.uid+"|=|"+order_sn ,extra:"附加信息"});
        var conversationtype = RongIMLib.ConversationType.CUSTOMER_SERVICE; // 客服会话类型
        RongIMClient.getInstance().sendMessage(conversationtype, customerServiceId, msg, {

                onSuccess: function (message) {
//                    console.log("Send successfully");
//                    console.log(message);
//                    var $msgtmp=$("#msgtmplate .t_con").clone();
//                    $msgtmp.addClass("i_con");
//                    $msgtmp.find(".tconname").html("{$username} <span>("+(new Date()).Format("yyyy-MM-dd hh:mm:ss")+")</span>");
//                    $msgtmp.find("dt img").attr("src","{$avatar}");
//                    $msgtmp.find("dd").html(message.content.content);
//                    $msgtmp.insertBefore("#botline");
//                    document.getElementById("botline").scrollIntoView();
//                    $("#txtask").val("");

                    msgoneshow(msgcon ,objuser.uname,objuser.avatar,-1, 1);
                    var jsonmsg = {};
                    jsonmsg["shopid"] = objshop.shopid;
                    jsonmsg["productid"] = productid;
                    jsonmsg["order_sn"] = order_sn;
                    jsonmsg["direction"] = 1;
                    jsonmsg["msgtype"] = 1;
                    jsonmsg["content"] = message.content.content;
                    addmsg(jsonmsg);

                },
                onError: function (errorCode,message) {
                    var info = '';
                    switch (errorCode) {
                        case RongIMLib.ErrorCode.TIMEOUT:
                            info = '超时';
                            $("#msgtmplate .offlinetip").clone().insertBefore("#botline");
                            break;
                        case RongIMLib.ErrorCode.UNKNOWN_ERROR:
                            info = '未知错误';
                            break;
                        case RongIMLib.ErrorCode.REJECTED_BY_BLACKLIST:
                            info = '在黑名单中，无法向对方发送消息';
                            break;
                        case RongIMLib.ErrorCode.NOT_IN_DISCUSSION:
                            info = '不在讨论组中';
                            break;
                        case RongIMLib.ErrorCode.NOT_IN_GROUP:
                            info = '不在群组中';
                            break;
                        case RongIMLib.ErrorCode.NOT_IN_CHATROOM:
                            info = '不在聊天室中';
                            break;
                        default :
                            info = "weizhi";
                            break;
                    }
                    console.log('发送失败:' + info);
                }
            }
        );
    }

    function sendaddonmsg(jsonmsg){
        var msg = new RongIMClient.RegisterMessage.AddonMessage(jsonmsg);
        var conversationtype = RongIMLib.ConversationType.CUSTOMER_SERVICE; // 客服会话类型
        RongIMClient.getInstance().sendMessage(conversationtype, customerServiceId, msg,  {
            onSuccess: function (data) {
                console.log("addon msg send!");
            },
            onError: function (errorCode) {
                console.log("addon msg error!");
            }
        });
    }




    function addmsg(jsonmsg){
        console.log("ajaxaddmsg");
        $.ajax({
            type:"POST",
            url: "/Api/Rongcloud/addmsg",
            dataType:"json",
            data: jsonmsg,
            timeout:5000,
            success: function(data,status){
                if(data.status==1){
                    //parent.layer.msg("添加成功!");
                    console.log('chenggong');
                }
                else{
                    alert("失败"+data.msg);
                }
            }
            ,error:function(XHR, textStatus, errorThrown){
                console.log(textStatus+"\n"+errorThrown);
            }

        });
    }



    function msgoneshow(messagetxt,uname,pic,isonline,asktype){
        var $msgtmp=$("#msgtmplate .t_con").clone();
        if(asktype === 1)
        {
            $("#txtask").val("");
            $msgtmp.addClass("i_con");
            $(".leftwords span").html("360");
        }
        $msgtmp.find(".tconname").html(uname+(isonline === -1 ?"":(isonline?"-在线":"-离线"))+" <span>("+(new Date()).Format("yyyy-MM-dd hh:mm:ss")+")</span>");
        $msgtmp.find("dt img").attr("src",pic);
        $msgtmp.find("dd").html(RongIMLib.RongIMEmoji.symbolToHTML(messagetxt));
        $msgtmp.insertBefore("#botline");
        document.getElementById("botline").scrollIntoView();
    }



//    function initupload(){
//        var oBtn = document.getElementById("uploadpic");
//        new AjaxUpload(oBtn,{
//            action:"/Api/Other/upimg",
//            name:"upload",
//            onSubmit:function(file,ext){
//                if(ext && /^(jpg|jpeg|png|gif)$/.test(ext)){
//                    //ext是后缀名
//                    oBtn.value = "正在上传…";
//                    oBtn.disabled = "disabled";
//                }else{
//                    oRemind.style.color = "#ff3300";
//                    oRemind.innerHTML = "不支持非图片格式！";
//                    return false;
//                }
//            },
//            onComplete:function(file,response){
//                console.log(response);
//            }
//        });
//    }

    $(function(){

        $("#uploadpic").click(function(){
            $("#upfile").trigger("click");
        })

        $("#upfile").change(function(){
            $("#msgtmplate .offlinetip").clone().addClass("sploading").find("span").html("正在上传...").end().insertBefore("#botline");
            document.getElementById("botline").scrollIntoView();



            $("#upform").ajaxSubmit(
                {
                success : function(data){
                    if(data && data.status == 1){
                        $(".sploading").remove();
                        wenkefuxin("<img src='http://"+document.domain+data["data"]+"'>");
                    }
                    else{
                        $(".sploading").find("span").html("上传失败:"+data["msg"]);
                    }
                }
                }
            );

        })

        if($(".l_conul [data-shopid='442']").length === 0 ){
            var $tmpmsg = $("#msgtmplate .lirecord").clone();
            $tmpmsg.attr("href","/Member/Chat/index/shopid/442/ischating/1").find("li").attr("data-shopid",442).find("img").attr("src","/statics/zt/images/hema_blueround_92_92.png").siblings(".shopname").html("装途网客服").siblings(".time").html(new Date().Format("MM-dd"));
            $tmpmsg.appendTo(".l_conul");
        }

        if($("[data-shopid='"+objshop.shopid+"']").length === 0 ){
            var $tmpmsg = $("#msgtmplate .lirecord").clone();
            $tmpmsg.attr("href","/Member/Chat/index/shopid/"+objshop.shopid+"/ischating/1").find("li").attr("data-shopid",objshop.shopid).find("img").attr("src",objshop.shoplogo).siblings(".shopname").html(objshop.shopname).siblings(".time").html(new Date().Format("MM-dd"));
            if($(".l_conul a").length === 0){
                $tmpmsg.appendTo(".l_conul");
            }
            else{
                $tmpmsg.insertBefore($(".l_conul a").eq(0));
            }

        }
        else{
            $("[data-shopid='"+objshop.shopid+"']").parent().clone().insertBefore($(".l_conul a").eq(0)).end().remove();
        }

        $("#txtask").keyup(function(){
            var len= $("#txtask").val().length;
            $(".leftwords span").html(360-len);

        });

        $("#txtask").keydown(function(e){
            if( 13 === e.keyCode && !e.ctrlKey){
                $("#btnsend").trigger("click");
            }
        });

        $(".chtitli").click(function(){
            var $chtitul= $(this).closest(".chtitul");
            var tag=$chtitul.attr("data-tag");
            var $chconul= $(".chconul[data-tag='"+tag+"']").eq(0);

            var index = $chtitul.find(".chtitli").index(this);
            $(this).addClass("on").siblings(".chtitli.on").removeClass("on");
            $chconul.find(".chconli").eq(index).show().siblings(".chconli").hide();
        });


        if(productid || order_sn){
            $(".ulproshoptit li").eq(0).click();
        }

        $(".btncloseim").click(function(){
            parent.layer.closeAll();
        });

        $(".emojis").on("click","span",function(){
            if(!($("#txtask").val().length>360)){
                $("#txtask").val($("#txtask").val()+ $(this).attr("name"));
            }
        })

        $(".reg_t dd").each(function(i,v){
            $(v).html(RongIMLib.RongIMEmoji.symbolToHTML($(v).html()));
        });

        $(".emojisout").click(function(){
            $(this).toggleClass("emojison");
            return false;
        })


        $("body").click(function(){
            $(".emojison").removeClass("emojison");
        })


    })



</script>
</body>
</html>

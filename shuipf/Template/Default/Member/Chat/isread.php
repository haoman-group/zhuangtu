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

</div>



<script>

    RongIMClient.init("{:C('RONGYUN_APP_KEY')}");

    var customerServiceId = "{:C('RONGYUN_KEFU_ID')}";// 客服 Id
    var objuser = {};
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

    RongIMClient.getInstance().hasRemoteUnreadMessages(token,{
        onSuccess:function(hasMessage){
            if(hasMessage){
                console.log(111);

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

            }else{
                // 没有未读的消息
                console.log(000);
            }
        },onError:function(err){
            // 错误处理...
        }
    });


    // 设置连接监听状态 （ status 标识当前连接状态）
    // 连接状态监听器
    RongIMClient.setConnectionStatusListener({
        onChanged: function (status) {
            switch (status) {
                //链接成功
                case RongIMLib.ConnectionStatus.CONNECTED:
                    console.log('链接成功');

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
        }
    });


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

//                    msgoneshow(message.content.content.split(/\|\=\|/)[0],objshop.shopname,objshop.shoplogo,1,2);
//                    var jsonmsg = {};
//                    jsonmsg["shopid"] = objshop.shopid;
//                    jsonmsg["productid"] = productid;
//                    jsonmsg["order_sn"] = order_sn;
//                    jsonmsg["direction"] = 2;
//                    jsonmsg["msgtype"] = 1;
//                    jsonmsg["content"] = message.content.content;
//                    addmsg(jsonmsg);

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





</script>
</body>
</html>

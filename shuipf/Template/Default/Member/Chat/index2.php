<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/chat.css" type="text/css"/>
    <script src="http://cdn.ronghub.com/RongIMLib-2.0.15.min.js"></script>
</head>
<body>
<div class="chatw">
    <div class="chatw_t">
        <img src="{$config_siteurl}statics/zt/images/chat/chatlogo.png"/>
        <strong>装途网在线客服系统</strong><span class="t_inspan">x</span>
    </div>
    <div class="chatw_b">
        <div class="chatwin_l">
            <div class="contacts">
                <ul class="conta_ul">
                    <li class="on">最近联系</li>
                    <li>正在联系</li>
                </ul>
                <ul class="l_conul">
                    <li >
                        <span class="h_portrait"></span>
                        mlink23689
                        <span class="time">9:50</span>
                    </li>
                    <li class="on">
                        <span class="h_portrait"></span>
                        mlink23689
                        <span class="time">9:50</span>
                    </li>
                </ul>
                <div class="contactin_con">

                    <div class="l_classification">
                        <ul>
                            <li>
                                <img src="{$config_siteurl}statics/zt/images/chat/chatimg1.png"/>
                                买家中心
                            </li>
                            <li>
                                <img src="{$config_siteurl}statics/zt/images/chat/chatimg2.png"/>
                                已买到的宝贝
                            </li>
                            <li>
                                <img src="{$config_siteurl}statics/zt/images/chat/chatimg3.png"/>
                                购物车
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="region">
                <div class="reg_t">
                    <div class="t_con">
                        <div class="tconname">苏泊尔客服-01  <span>(在线)</span></div>
                        <dl>
                            <dt><img src="{$config_siteurl}statics/zt/images/chat/tconlogo.jpg"/></dt>
                            <dd>您好，很高兴为您服务，感谢您对本店的支持，建议在我司旗舰店内购买产品，享受正规售后服务</dd>
                        </dl>
                    </div>
                    <div class="t_con i_con">
                        <div class="tconname">我的名称-01  <span>(在线)</span></div>
                        <dl>
                            <dt><img src="{$config_siteurl}statics/zt/images/chat/tconlogo.jpg"/></dt>
                            <dd>我司旗舰店内购买产品，享受正规售后服务？</dd>
                        </dl>
                    </div>
                </div>
                <div class="reg_b">
                    <div class="expression">
                        <a href=""><img src="{$config_siteurl}statics/zt/images/chat/expression1.png"/></a>
                        <a href=""><img src="{$config_siteurl}statics/zt/images/chat/expression2.png"/></a>
                        <a href=""><img src="{$config_siteurl}statics/zt/images/chat/expression3.png"/></a>
                        <a href=""><img src="{$config_siteurl}statics/zt/images/chat/expression4.png"/></a>
                        <span class="record">查看消息记录</span>
                    </div>
                    <div class="chattingzone">

                        <textarea class="chazo" value="请输入您想咨询的问题"></textarea>
                        <div class="chabo">
                            <span>还可以输入360字</span>
                            <a href="#">关闭</a>
                            <a href="javascript:void(0)" onclick="abc()" class="newa">发送<span class="newapan"></span></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="chatwin_r">
            <ul class="rcon_ul">
                <li class="on">产品详情</li>
                <li>店铺信息</li>
            </ul>
            <div class="clist">
                <dl>
                    <dt><img src="{$config_siteurl}statics/zt/images/chat/clistbg.jpg"/></dt>
                    <dd>
                        <strong class="predsr">￥1898.00</strong>
                        <p>苏泊尔榨汁机。全新工艺。破壁料理机，全新上市</p>
                    </dd>
                </dl>
                <a href="#" class="purchase">点击购买</a>
            </div>
        </div>
    </div>


</div>


<script>
    RongIMClient.init("8brlm7ufrnjh3");


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
        }});

    // 消息监听器
    RongIMClient.setOnReceiveMessageListener({
        // 接收到的消息
        onReceived: function (message) {
            // 判断消息类型
            switch(message.messageType){
                case RongIMClient.MessageType.TextMessage:
                    // 发送的消息内容将会被打印
                    console.log(message.content.content);
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
                    break;
                case RongIMClient.MessageType.ContactNotificationMessage:
                    // do something...
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


    var token = "eARgqUomjY9JkFFKIK4LmK8X321a4WB+kX37RLu5vwj+Xh396Iu2DwWmnxIS+8H3Qh5m5TVm4e0sTQe2yz67vTOujuRwSDCr";

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

    function abc(){
        console.log("我要发送消息");
        // 定义消息类型,文字消息使用 RongIMLib.TextMessage
        var msg = new RongIMLib.TextMessage({content:"hello",extra:"附加信息"});
        //或者使用RongIMLib.TextMessage.obtain 方法.具体使用请参见文档
        //var msg = RongIMLib.TextMessage.obtain("hello");
        var conversationtype = RongIMLib.ConversationType.PRIVATE; // 私聊
        var targetId = "suncycle6"; // 目标 Id
        RongIMClient.getInstance().sendMessage(conversationtype, targetId, msg, {
                // 发送消息成功
                onSuccess: function (message) {
                    //message 为发送的消息对象并且包含服务器返回的消息唯一Id和发送消息时间戳
                    console.log("Send successfully");
                },
                onError: function (errorCode,message) {
                    var info = '';
                    switch (errorCode) {
                        case RongIMLib.ErrorCode.TIMEOUT:
                            info = '超时';
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
                            info = x;
                            break;
                    }
                    console.log('发送失败:' + info);
                }
            }
        );
    }


</script>
</body>
</html>
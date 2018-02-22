<?php

namespace Member\Controller;

class AccountController extends MemberbaseController {

    //互联模型
    protected $connect = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->connect = D('Member/Connect');
    }
    public function secure(){
        $this->display();
    }
    public function chpwd(){
        // $result = SendMail("makeup1123@163.com", "dasdasd", "teste");
        // var_dump($result);
        $step = I('step',1);
        $act = I('post.act');
        //验证类型 1-短信 2-邮件
        $type = I('type',1);
        if(IS_POST){
            if($act=='verify'){
                 //验证验证码  邮箱或者手机
                 if(!empty($type) && $type == 1){//手机验证
                    $this->checkSmsCode();
                 }else if(!empty($type) && $type == 2){//邮箱验证
                    $this->checkEmailCode();
                 }
                //验证身份证
                if($this->userinfo['isbuyer'] != '1'){//买家不检测身份证
                    ($idcard = I('idcard')) or $this->error('请填写正确的证件号码');
                    $verify = D('Member/Member')->verifyIdcard($this->userid,$idcard) ;
                    if(!$verify) $this->error('证件号码验证失败');
                }
                session('passverify',md5($this->userinfo['idcard'].$this->userinfo['mobile']));
                $step = 3;
            }elseif($act=='change'){
                if(!I('passverify') || !session('passverify') || I('passverify')<>session('passverify')) $this->error('验证失败');
                ($oldpassword = I('oldpassword')) || $this->error('请输入当前密码');
                ($password = I('password')) || $this->error('请输入新密码');
                $repassword = I('repassword') ;
                if($password<>$repassword) $this->error('两次密码输入不一致');
                $status = service("Passport")->userEdit($this->username, $oldpassword, $password);
                if ($status > 0) {
                    $step=4;
                    service("Passport")->logoutLocal();
                    session("connect_openid", NULL);
                    session("connect_app", NULL);
                    session("mobile", NULL);
                    //注销在线状态
                    D('Member/Online')->onlineDel();
                    // $this->success('修改成功，请重新登录！');

                } else {
                    $this->error('重置密码失败');
                }
            }
        }
        if(isset($type) && !empty($type)){$this->assign('type',$type);}
        $this->assign('step',$step);
        $this->display();
    }
    //验证短信验证码
    private function checkSmsCode(){
        //验证短信
        ($vcode = I('smscode','')) or $this->error('验证码不能为空');
        if(!APP_DEBUG){
            $verify = D('Member/Member')->reg_sms_verify($this->userinfo['mobile'],$vcode);
            if($verify<1) $this->error('验证码不正确');
        }
    }
    //发送短信
    public function SendSmsCode(){
        //发送短信
        if(!APP_DEBUG){
            $code = rand(100000,999999);
            $re = D('Member/Member')->reg_send_sms($code,$this->userinfo['mobile']);
            if($re<1) $this->error("短信发送失败");
        }
    }
    //验证邮件验证码
    private function checkEmailCode(){
        //验证短信
        ($vcode = I('smscode','')) or $this->error('验证码不能为空');
        // if(!APP_DEBUG){
            $verify = D('Member/Member')->verify_email_code($this->userinfo['email'],$vcode);
            if($verify<1) $this->error(D('Member/Member')->getErrorMsg($verify));
        // }
    }
    //发送邮箱验证码
    private function SendEmailCode(){
        $code = rand(100000,999999);
        $re = D('Member/Member')->send_email_verify($code,$this->userinfo['email']);
        if($re<1){
            $this->error(D('Member/Member')->getErrorMsg($re));
        }
    }
    //验证图形验证码
    public function checkVcode($action){
        ($vcode = I('vcode','')) or $this->error('验证码不能为空');
        if (false == $this->verify($vcode, $action)) {
            $this->error('验证码不正确');
        }
    }
    /**
     * edit by f
     */
    public function chmobile(){
        //验证类型
        $type = I('get.type',1);
        $step = I('step',1);
        $act = I('post.act');
        if(IS_POST){
            if($act=='verify'){
                $idcard = I('idcard');
                if($this->userinfo['isbuyer'] != '1'){//买家不检测身份证
                    if(empty($idcard)){$this->error('请填写正确的证件号码');}
                    $verify = D('Member/Member')->verifyIdcard($this->userid,$idcard) ;
                    if(!$verify) $this->error('证件号码验证失败');
                }
                //验证短信验证码
                if(!empty($type) && $type == 1){//手机验证
                    $this->checkSmsCode();
                 }else if(!empty($type) && $type == 2){//邮箱验证
                    $this->checkEmailCode();
                 }
                session('passverify',md5($this->userinfo['idcard'].$this->userinfo['mobile']));
                $step = 3;
            }else if($act=='new_mobile'){
                ($mobile = I('new_phone','')) or $this->error('新手机号不能为空');
                if(!checkMobile($mobile)) $this->error('手机号码不正确');//验证手机号码是否正确
                $this->checkVcode('chmobile');
                //向新手机号发送短信
                if(!APP_DEBUG){
                    $code = rand(100000,999999);
                    $re = D('Member/Member')->reg_send_sms($code,$mobile);
                    if($re<1) $this->error("短信发送失败");
                }
                $step = 4;
                $this->assign('mobile',$mobile);
            }else if($act=='change'){
                $mobile = I('mobile','');
                 //验证短信
                ($vcode = I('smscode','')) or $this->error('验证码不能为空');
                //验证短信
                if(!APP_DEBUG){
                    $verify = D('Member/Member')->reg_sms_verify($mobile,$vcode);
                    if($verify<1) $this->error('验证码不正确');
                }
                //将新手机号码存入相应的库中
                $status =D('Member/Member')->changeMobile($this->userid,$mobile);
                if ($status > 0) {
                    $this->assign('new_mobile',$mobile);
                    $step=5;
                } else {
                    $this->error('绑定手机号码失败');
                }
            }
        }else if($step == 2){
            //发送短信
            // $this->SendSmsCode();
        }
        if(isset($type) && !empty($type)){$this->assign('type',$type);}
        $this->assign('step',$step);
        $this->assign('mobile',$mobile);
        $this->display();
    }
    /**
     * 绑定邮箱
     */
    public  function post(){
        $step = I('step',1);
        $act = I('post.act');
        if(IS_POST){
            if($act=='verify'){
                if($this->userinfo['isbuyer'] != '1'){//买家不检测身份证
                    ($idcard = I('idcard')) or $this->error('请填写正确的证件号码');
                    $verify = D('Member/Member')->verifyIdcard($this->userid,$idcard) ;
                    if(!$verify) $this->error('证件号码验证失败');
                }
                $this->checkSmsCode();
                session('passverify',md5($this->userinfo['idcard'].$this->userinfo['mobile']));
                $step = 3;
            }elseif($act=='add'){
                $email=I('email');
                if(!D("Member/Member")->checkEmail($email)) $this->error('邮箱不正确或已被使用');//验证邮箱是否正确
                //邮箱验证码
                ($vcode = I('smscode','')) or $this->error('验证码不能为空');
                $verify = D('Member/Member')->verify_email_code($email,$vcode);
                if($verify<1) $this->error(D('Member/Member')->getErrorMsg($verify));
                //if(!I('passverify') || !session('passverify') || I('passverify')<>session('passverify')) $this->error('验证失败');
                //将邮箱存入相应的库中
                $status =D('Member/Member')->where(array('userid'=>$this->userid))->data(array('email'=>$email))->save();
                if ($status > 0) {
                    $step=4;
                } else {
                    $this->error('绑定邮箱错误');
                }
            }
        }
        $this->assign('step',$step);
        $this->assign('email',$email);
        $this->display();
    }
    /**
     * 修改邮箱
     */
    public  function chpost(){
        //验证类型
        $type = I('get.type',1);
        $step = I('step',1);
        $act = I('post.act');
        if(IS_POST){
            if($act=='verify'){
                if($this->userinfo['isbuyer'] != '1'){//买家不检测身份证
                    ($idcard = I('idcard')) or $this->error('请填写正确的证件号码');
                    $verify = D('Member/Member')->verifyIdcard($this->userid,$idcard) ;
                    if(!$verify) $this->error('证件号码验证失败');
                }
                if(!empty($type) && $type == 1){//手机验证
                    $this->checkSmsCode();
                 }else if(!empty($type) && $type == 2){//邮箱验证
                    $this->checkEmailCode();
                 }
                session('passverify',md5($this->userinfo['idcard'].$this->userinfo['mobile']));
                $step = 3;
            }elseif($act=='change'){
                $email=I('email');
                if(!D("Member/Member")->checkEmail($email)) $this->error('邮箱不正确或已被使用');//验证邮箱是否正确
                //邮箱验证码
                ($vcode = I('smscode','')) or $this->error('验证码不能为空');
                $verify = D('Member/Member')->verify_email_code($email,$vcode);
                if($verify<1) $this->error(D('Member/Member')->getErrorMsg($verify));
                //if(!I('passverify') || !session('passverify') || I('passverify')<>session('passverify')) $this->error('验证失败');
                //将邮箱存入相应的库中
                $status =D('Member/Member')->where(array('userid'=>$this->userid))->data(array('email'=>$email))->save();
                if ($status > 0) {
                    $step=4;
                } else {
                    $this->error('修改邮箱错误');
                }
            }
        }
        if(isset($type) && !empty($type)){$this->assign('type',$type);}
        $this->assign('step',$step);
        $this->assign('email',$email);
        $this->display();
    }







    //个人帐户
    public function assets() {

        $this->assign('isqqlogin', $this->connect->getUserAuthorize($this->userid, 'qq'));
        $this->assign('isweibologin', $this->connect->getUserAuthorize($this->userid, 'sina_weibo'));
        $this->display();
    }

    //取消绑定
    public function cancelbind() {
        $connectid = I('get.connectid', 0, 'intval');
        if (empty($connectid)) {
            $this->error('参数不正确！');
        }
        //查询出绑定信息
        $info = $this->connect->where(array('connectid' => $connectid, 'uid' => $this->userid))->find();
        if (empty($info)) {
            $this->error('该绑定信息不存在，无法解绑！');
        }
        if ($this->connect->connectDel($connectid, $this->userid)) {
            $this->success('解绑成功！');
        } else {
            $this->error('解绑失败！');
        }
    }

    //授权绑定
    public function authorize() {
        $type = I('get.type');
        if (empty($type)) {
            $this->error('请指定授权类型！');
        }
        switch ($type) {
            case 'qq':
                $redirect_uri = self::$Cache['Config']['siteurl'] . "index.php?g=Member&m=Account&a=qqbind";
                header("location:" . $this->connect->getUrlConnectQQ($redirect_uri));
                break;
            case 'sina_weibo':
                $redirect_uri = self::$Cache['Config']['siteurl'] . "index.php?g=Member&m=Account&a=sinabind";
                header("location:" . $this->connect->getUrlConnectSinaWeibo($redirect_uri));
                break;
            default:
                $this->error('授权类型错误！');
                break;
        }
    }

    //QQ绑定
    public function qqbind() {
        $curl = new \Curl();
        $sUrl = "https://graph.qq.com/oauth2.0/token";
        $aGetParam = array(
            "grant_type" => "authorization_code",
            "client_id" => $this->memberConfig['qq_akey'],
            "client_secret" => $this->memberConfig['qq_skey'],
            "code" => $_GET["code"],
            "state" => $_GET["state"],
            "redirect_uri" => session("redirect_uri")
        );
        session("redirect_uri", NULL);
        //Step2：通过Authorization Code获取Access Token
        foreach ($aGetParam as $key => $val) {
            $aGet[] = $key . "=" . urlencode($val);
        }
        $sContent = $curl->get($sUrl . "?" . implode("&", $aGet));
        if ($sContent == FALSE) {
            $this->error("帐号授权出现错误！");
        }
        //参数处理
        $aTemp = explode("&", $sContent);
        $aParam = array();
        foreach ($aTemp as $val) {
            $aTemp2 = explode("=", $val);
            $aParam[$aTemp2[0]] = $aTemp2[1];
        }
        $sUrl = "https://graph.qq.com/oauth2.0/me";
        $aGetParam = array(
            "access_token" => $aParam["access_token"]
        );
        //$sContent = $this->get($sUrl, $aGetParam);
        foreach ($aGetParam as $key => $val) {
            $aGet[] = $key . "=" . urlencode($val);
        }
        $sContent = $curl->get($sUrl . "?" . implode("&", $aGet));

        if ($sContent == FALSE) {
            $this->error("帐号授权出现错误！");
        }
        $aTemp = array();
        //处理授权成功以后，返回的一串类似：callback( {"client_id":"000","openid":"xxx"} );
        preg_match('/callback\(\s+(.*?)\s+\)/i', $sContent, $aTemp);
        //把json数据转换为数组
        $aResult = json_decode($aTemp[1], true);
        //合并数组，把access_token和expires_in合并。
        $Result = array_merge($aResult, $aParam);
        //检查帐号是否已经绑定过了
        if ($this->connect->isUserAuthorize($Result['access_token'], 'qq')) {
            $this->error('您已经绑定过，不能重复绑定！');
        }
        //绑定
        if ($this->connect->connectAdd(array(
                    'openid' => $Result['openid'],
                    'uid' => $this->userid,
                    'app' => 'qq',
                    'accesstoken' => $Result['access_token'],
                    'expires' => time() + (int) $Result['expires_in'],
                ))) {
            $this->success('绑定成功！', U('Account/assets'));
        } else {
            $this->error($this->connect->getError()?:'绑定失败！');
        }
    }

    //新浪微博绑定
    public function sinabind() {
        $curl = new \Curl();
        $sUrl = "https://api.weibo.com/oauth2/access_token";
        $aGetParam = array(
            "code" => $_GET["code"], //用于调用access_token，接口获取授权后的access token
            "client_id" => $this->memberConfig['sinawb_akey'], //申请应用时分配的AppSecret
            "client_secret" => $this->memberConfig['sinawb_skey'], //申请应用时分配的AppSecret
            "grant_type" => "authorization_code", //请求的类型，可以为authorization_code、password、refresh_token。
            "redirect_uri" => session("redirect_uri"), //回调地址
        );
        session("redirect_uri", NULL);
        $sContent = $curl->post($sUrl, $aGetParam);
        if ($sContent == FALSE) {
            $this->error("帐号授权出现错误！");
        }
        //参数处理
        $aParam = json_decode($sContent, true);
        //检查帐号是否已经绑定过了
        if ($this->connect->isUserAuthorize($aParam['access_token'], 'sina_weibo')) {
            $this->error('您已经绑定过，不能重复绑定！');
        }
        //绑定
        if ($this->connect->connectAdd(array(
                    'openid' => $aParam['uid'],
                    'uid' => $this->userid,
                    'app' => 'sina_weibo',
                    'accesstoken' => $aParam['access_token'],
                    'expires' => time() + (int) $aParam['expires_in'],
                ))) {
            $this->success('绑定成功！', U('Account/assets'));
        } else {
            $this->error($this->connect->getError()?:'绑定失败！');
        }
    }
    //未登录用户，重置账户密码
    public function resetpwd(){
        $step = I('get.step',1);
        if(IS_POST){
            if($step == 2){
                ($vcode = I('vcode','')) or $this->error('验证码不能为空');
                ($mobile = I('mobile','')) or $this->error('手机号码不能为空');
                ($username = I('username','')) or $this->error('用户名不能为空');
                if (false == $this->verify($vcode, 'resetpwd')) {
                    $this->error('验证码不正确');
                }
                if(!(D("Member/Member")->where(array("mobile"=>$mobile,"username"=>$username))->find())){
                    $this->error("用户名不存在!");
                }
                //发送短信
                if(!APP_DEBUG){
                    $code = rand(100000,999999);
                    $re = D('Member/Member')->reg_send_sms($code,$mobile);
                    if($re<1) $this->error("短信发送失败");
                }
                $this->assign("mobile",$mobile);
                $this->assign("username",$username);
                //session("resetpwd",I("post."));

            }else if($step ==3){//验证身份证
                $data =  I("post.");
                ($idcard = I('idcard')) or $this->error('请填写正确的证件号码');
                //验证证件号
                $userid = D("Member/Member")->where(array("mobile"=>$data['mobile'],"username"=>$data['username']))->getField("userid");
                $verify = D('Member/Member')->verifyIdcard($userid,$idcard) ;
                if(!$verify) $this->error('证件号码验证失败');
                //验证短信
                ($vcode = I('vcode','')) or $this->error('验证码不能为空');
                if(!APP_DEBUG){
                    $verify = D('Member/Member')->reg_sms_verify($data['mobile'],$vcode);
                    if($verify<1) $this->error('验证码不正确');
                }
                $this->assign("mobile",$data['mobile']);
                $this->assign("username",$data['username']);
                session('passverify',md5($idcard.$data['mobile'].$data['username']));
            }else if($step ==4){
                $data =  I("post.");
                if(!I('passverify') || !session('passverify') || I('passverify')<>session('passverify')) $this->error('验证失败,请重新设置',U("resetpwd",array('step'=>1)));
                ($password = I('password')) || $this->error('请输入新密码');
                $repassword = I('repassword') ;
                if($password<>$repassword) $this->error('两次密码输入不一致');
                $userid = D("Member/Member")->where(array("mobile"=>$data['mobile'],"username"=>$data['username']))->getField("userid");
                if(D("Member/Member")->ChangePassword($userid,$password)){
                    session("resetpwd", NULL);
                    session("passverify", NULL);
                } else {
                    $this->error('重置密码失败！新密码不能与原密码相同！');
                }
            }
        }
        $this->assign("step",$step);
        $this->display();
    }

    public function realnamedone(){
        $this->display();
    }

}

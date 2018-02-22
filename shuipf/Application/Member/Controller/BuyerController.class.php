<?php

namespace Member\Controller;
// use Common\Controller\Base;
class BuyerController extends MemberbaseController {
    protected function _initialize() {
        parent::_initialize();
        $this->memberConfig = cache("Member_Config");
        $this->memberGroup = cache("Member_group");
        $this->memberModel = cache("Model_Member");
        $this->memberDb = D('Member/Member');
    }
    /**
     * update by f
     */
    public function index()
    {
        if ($this->userid == 0) {
             redirect(U('login'));
        }else{
            $this->display("Buyer/Index/index");
        }
    }

    //登录页面
    public function login() {
        $forward = $_REQUEST['forward'] ? $_REQUEST['forward'] : cookie("forward");
        cookie("forward", null);
        if (!empty($this->userid)) {
            $this->success("您已经是登陆状态！", $forward ? $forward : U("Index/index"));
        } else {
            $this->assign('forward', $forward);
            $this->display();
        }
    }

    public function loginpop(){
        $this->display();
    }

    public function doLogin(){
        $loginName = I('request.loginName', null, 'trim');
        //$password = I('request.password');
        $password = I('request.password',null,'trim');
        //记住密码
        $RememberMe = I('request.RememberMe',"off",'trim');
        
        if (empty($loginName)) {
            $this->error('用户名或手机号不能为空');
        }
        if (empty($password)) {
            $this->error('密码不能为空');
        }
        $userid = service('Passport')->loginLocal($loginName, $password, ($RememberMe=="on") ? 86400 : 0);
        if ($userid > 0) {
            $userinfo = service("Passport")->getLocalUser((int) $userid);
            //待审核
            if ($userinfo['checked'] == 0) {
                service("Passport")->logoutLocal();
                $this->error('用户正在审核中');
            }
            //注册在线状态
            D('Online')->registerOnlineStatus($userid);
            //tag 行为点
            tag('action_member_loginend', $userinfo);
            // if($userinfo['step'] == 1){
            //     $this->redirect('reg_success');
            // }
            redirect(U('Buyer/Index/index'));
        } else {
            //登陆失败
            $this->assign('errMsg','登陆失败：账号或密码错误！');
            $this->display('login');
        }
    }

    //注册页面
    public function register() {
        // if (empty($this->memberConfig['allowregister'])) {
        //     $this->error("系统不允许新会员注册！");
        // }
        $forward = $_REQUEST['forward'] ? $_REQUEST['forward'] : cookie("forward");
        cookie("forward", null);
        if ($this->userid) {
            $this->success("您已经是登陆状态，无需注册！", $forward ? $forward : U("Index/index"));
            exit;
        }
        if(IS_POST){
            ($mobile = I('mobile','')) or $this->error('手机号码不能为空');
            ($vcode = I('vcode','')) or $this->error('验证码不能为空');
            if(!checkMobile($mobile)) $this->error('手机号码不正确');
            if (false == $this->verify($vcode, 'sendsms')) {
                $this->error('验证码不正确');
            }
            if(!APP_DEBUG){
                $code = rand(100000,999999);
                $re = D('Member/Member')->reg_send_sms($code,$mobile);
                if($re<1) $this->error("短信发送失败"); 
            }
            session('mobile',$mobile);
            $this->assign('mobile',$mobile);
            $this->display('register2');
        }else{
            $this->display();
        }
    }
    
    public function register2(){
        if(IS_POST){
            ($mobile = session('mobile','')) or $this->error('手机号码不能为空');
            ($vcode = I('vcode','')) or $this->error('验证码不能为空');
            $verify = D('Member/Member')->reg_sms_verify($mobile,$vcode);

            if(!APP_DEBUG){
                if($verify<1) $this->error('验证码不正确');
            }
            redirect(U('register3'));
        }else{
            $this->display();
        }
    }
    public function register3(){
        // if(!session('mobile')) redirect(U('reg_mobile'));
        if(IS_POST){
            ($password = I('password')) or $this->error('密码不能为空');
            ($repassword = I('repassword')) or $this->error('重复密码不能为空');
            ($username = I('username')) or $this->error('会员名不能为空');
            if($password<>$repassword) $this->error('两次密码不一致');
            $post = array(
                'mobile'=>session('mobile'),
                'username'=>$username,
                'password'=>$password,
                'pwdconfirm'=>$repassword,
            );

            $info = D('Member/Member')->token(false)->create($post);
            if ($info) {
                $userid = service("Passport")->userRegister($info['username'], $info['password'], $info['mobile']);
                if ($userid > 0) {
                    //获取用户信息
                    $memberinfo = service("Passport")->getLocalUser((int) $userid);
                    $info['username'] = $memberinfo['username'];
                    $info['password'] = $memberinfo['password'];
                    $info['mobile'] = $memberinfo['mobile'];
                    //新注册用户积分
                    $info['point'] = $this->memberConfig['defualtpoint'] ? $this->memberConfig['defualtpoint'] : 0;
                    //新会员注册默认赠送资金
                    $info['amount'] = $this->memberConfig['defualtamount'] ? $this->memberConfig['defualtamount'] : 0;
                    $info['checked'] = 1;
                    $info['groupid'] = 7;
                    $info['step'] = 1;
                    $info['modelid'] = 1;
                    $info['isbuyer'] = 1; //买家标志
                    if (false !== $this->memberDb->where(array('userid' => $memberinfo['userid']))->save($info)) {
                        
                        //注册登陆状态
                        service("Passport")->loginLocal($post['username'], $post['password']);
                        //tag 行为
                        tag('action_member_registerend', $memberinfo);
                       
                        $this->assign("mobile",session('mobile'));
                        $this->assign("username",$memberinfo['username']);
                        session('mobile',NULL);
                        $this->display("register4");
                    } else {
                        //删除
                        service("Passport")->userDelete($memberinfo['userid']);
                        $this->error("会员注册失败！");
                    }
                } else {
                    $this->error(service("Passport")->getError()? : '帐号注册失败！');
                }
            } else {
                $this->error($this->memberDb->getError()? : '帐号注册失败！');
            }

        }else{
            $this->assign("mobile",session('mobile'));
            $this->display();
        }
    }

    public function register4(){
        $this->display();
    }
    public function findpsw(){
        $forward = $_REQUEST['forward'] ? $_REQUEST['forward'] : cookie("forward");
        cookie("forward", null);
        if ($this->userid) {
            $this->success("您已经是登陆状态，无需注册！", $forward ? $forward : U("Index/index"));
            exit;
        }
        if(IS_POST){
            
            ($mobile = I('mobile','')) or $this->error('手机号码不能为空');
            ($vcode = I('vcode','')) or $this->error('验证码不能为空');
            //验证手机号码
            if(!checkMobile($mobile)) $this->error('手机号码不正确');
            //验证图像验证码
            if (false == $this->verify($vcode, 'resetpwd')) {
                $this->error('验证码不正确');
            }
            //判断是否为买家
            if(!D("Member/Member")->isBuyer($mobile)){
                redirect(U('Member/Account/resetpwd',array("mobile"=>$mobile,"msg"=>"卖家账户修改密码需提供用户名称!")));
            }
            if(!APP_DEBUG){
                $code = rand(100000,999999);
                $re = D('Member/Member')->reg_send_sms($code,$mobile);
                if($re<1) $this->error("短信发送失败"); 
            }
            session('mobile',$mobile);
            $this->assign('mobile',$mobile);
            $this->display('findpsw2');
        }else{
            $this->display();
        }
    }
    public function findpsw2(){
       if(IS_POST){
            ($mobile = session('mobile','')) or $this->error('手机号码不能为空');
            ($vcode = I('vcode','')) or $this->error('验证码不能为空');
            $verify = D('Member/Member')->reg_sms_verify($mobile,$vcode);
            if(!APP_DEBUG){
                if($verify<1) $this->error('验证码不正确');
            }
            redirect(U('findpsw3'));
        }else{
            $this->display();
        }
    }
    public function findpsw3(){
        if(IS_POST){
            ($password = I('password')) or $this->error('密码不能为空');
            ($repassword = I('repassword')) or $this->error('重复密码不能为空');
            if($password<>$repassword) $this->error('两次密码不一致');
            $userid = D("Member/Member")->where(array("mobile"=>session('mobile','')))->getField("userid");
            if(D("Member/Member")->ChangePassword($userid,$password)){
                $this->display('findpsw4');
            }else{
                $this->error('重置密码失败！新密码不能与原密码相同！');
            }
        }else{
            $this->assign("mobile",session('mobile'));
            $this->display();
        }
    }
    
    public function findpsw4(){
        $this->display();
    }
    

}
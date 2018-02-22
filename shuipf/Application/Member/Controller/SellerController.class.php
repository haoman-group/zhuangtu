<?php

namespace Member\Controller;

class SellerController extends MemberbaseController {

    protected function _initialize() {
        parent::_initialize();
        $this->checkStep();
    }
    //step状体检测
    private function checkStep(){
        $userinfo = $this->userinfo;
         switch(ACTION_NAME){
            case "shop_cate": if($userinfo['step'] != 1){$this->redirectStep();}break;
            case "shop_bank_step0":   if($userinfo['step'] != 1 and $userinfo['step'] != 92){$this->redirectStep();}break;
            case "shop_bank_step1":   if($userinfo['step'] != 1 and $userinfo['step'] != 92){$this->redirectStep();}break;
            case "shop_bank_step2":   if($userinfo['step'] != 3 and $userinfo['step'] != 93){$this->redirectStep();}break;
            case "shop_bank_step3":   if(!in_array($userinfo['step'],array('3','4','93','94'))){$this->redirectStep();}break;
            case "shop_bank_skip":    if(!in_array($userinfo['step'],array('1','5','4','93','94'))){$this->redirectStep();}break;
            case "shop_offline_info": if(!in_array($userinfo['step'],array('1','4','5','7','94'))){$this->redirectStep();}break;
            case "shop_offline_info_success": if($userinfo['step'] != 6){$this->redirectStep();}break;
            case "shop_offline_result": if($userinfo['step'] != 7){$this->redirectStep();}
            default:break;
         }
    }
    //跳转路由
    private function redirectStep(){
        if ($this->userid) {
            $userinfo = $this->userinfo;
            $step = $userinfo['step'];
            switch ($step) {
                case 1:
                    redirect(U('reg_success'));
                    break;
                case 92:
                case 2:
                    redirect(U('shop_bank_step0'));
                    break;
                case 93:
                case 3:
                    redirect(U('shop_bank_step2'));
                    break;
                case 94:
                case 4:
                    //进行银行卡认证
                    redirect(U('shop_bank_step3'));
                    break;
                case 5:
                    redirect(U('shop_offline_info'));
                    break;
                case 6:
                    //资质信息提交完成
                    redirect(U('shop_offline_info_success'));
                    break;
                case 7:
                    //资质信息审核结果
                    redirect(U('shop_offline_result'));
                    break;
                case 8:
                    redirect(U('Seller/Index/index'));
                    break;
                default:
                    break;
            }   
        }
     }
    /**
     * update by f
     */
    public function index()
    {
        $this->redirectStep();
        $this->display();
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



    public function regmobilehtml(){
        $this->display();
    }

    public function doLogin(){
        $loginName = I('request.loginName', null, 'trim');
        //$password = I('request.password');
        $password = I('request.password',null,'trim');
        //下次自动登陆
        $cookieTime = I('request.cookieTime', 0, 'intval');

        if (empty($loginName)) {
            $this->error('用户名或手机号不能为空');
        }
        if (empty($password)) {
            $this->error('密码不能为空');
        }
        $userid = service('Passport')->loginLocal($loginName, $password, $cookieTime ? 86400 * 180 : 86400);
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
            if($userinfo['step'] == 1){
                $this->redirect('reg_success');
            }
            redirect(U('Index/index'));
        } else {
            //登陆失败
            $this->assign('errMsg','登陆失败：账号或密码错误！');
            $this->display('login');
        }
    }

    //注册页面
    public function reg_mobile() {
        if (empty($this->memberConfig['allowregister'])) {
            $this->error("系统不允许新会员注册！");
        }
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
            //session('vcode',$vcode);
            //session('mobile',$mobile);
           
            $this->assign('mobile',$mobile);
            $this->display('reg_sms');
        }else{
            $this->display();
        }
    }
    public function reg_sms(){
        if(IS_POST){
            ($mobile =I('mobile','')) or $this->error('手机号码不能为空');
              //var_dump($mobile);exit;
            ($vcode = I('vcode','')) or $this->error('验证码不能为空');
            $verify = D('Member/Member')->reg_sms_verify($mobile,$vcode);

            if(!APP_DEBUG){
                if($verify<1) $this->error('验证码不正确');
            }
             
            //redirect(U('register',array('mobile'=>$mobile)));

             $this->assign('mobile',$mobile);
            $this->display('register');
              // redirect(U('register'));
        }
           
    }
    public function register(){
        // if(!session('mobile','') ) {
        //     redirect(U('reg_mobile'));
        // }
        if(IS_POST){
            ($mobile = I('mobile')) or $this->error('手机号码不能为空');
            //var_dump($mobile);exit;
            ($password = I('password')) or $this->error('密码不能为空');
            ($repassword = I('repassword')) or $this->error('重复密码不能为空');
            ($username = I('username')) or $this->error('会员名不能为空');
            if($password<>$repassword) $this->error('两次密码不一致');
            $post = array(
                'mobile'=>$mobile,
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
                    if (false !== $this->memberDb->where(array('userid' => $memberinfo['userid']))->save($info)) {
                        
                        //注册登陆状态
                        service("Passport")->loginLocal($post['username'], $post['password']);
                        //tag 行为
                        tag('action_member_registerend', $memberinfo);
                        session('mobile',NULL);
                        redirect(U('reg_success'));
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
            $this->display();
        }
    }
    public function reg_success(){
        $this->display();
    }
    public function shop_cate(){

        if(IS_POST){
            $catid = I('shopcate2',0);
            $shop = D('Member/Shop')->addshop($catid);
            if(!$shop) $this->error("提交失败:".D('Member/Shop')->getError());
            redirect(U('shop_bank_step0'));
        }else{
            $category = D('Member/ShopCategory')->getCategory();
            $this->assign('category',$category);
            $this->display();
        }
    }
    public function shop_bank_step0(){
        $this->assign('step',D('Member/Member')->where(array('userid'=>$this->userid))->getField('step'));
        $this->display();
    }
    /**
    * @name 银行卡信息填写提交
    **/
    public function shop_bank_step1(){
        if(IS_POST){
            $truename = I('truename') or $this->error('真实姓名不能为空');
            $bank_card_number = I('bank_card_number') or $this->error('银行卡号不能为空');
            $bank = I('bank') or $this->error('开户行不能为空');
            if(!APP_DEBUG){  
                if(substr_compare($bank_card_number,"161601",0,6) != 0 ){
                    $idcard = I('idcard') or $this->error('身份证号不能为空');
                    if(!checkIdCard($idcard)) $this->error('身份证号不正确');
                    if(!checkBankCard($bank_card_number)) $this->error('银行卡号不正确');
                }
            }
            $data = array(
                'truename'=>$truename,
                'idcard'=>$idcard,
                'bank_card_number'=>$bank_card_number,
                'bank'=>$bank,
            );
            $re = D('Member/Member')->updateData($this->userid,$data);
            if(!$re) $this->error('提交失败');
            $step = D('Member/Member')->where(array('userid'=>$this->userid))->getField('step');
            if($step == '92'){
                D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',93);
            }else{
                D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',3);
            }
            redirect(U('shop_bank_step2'));
        }else{
            $step = D('Member/Member')->where(array('userid'=>$this->userid))->getField('step');
            //查询是否有银行卡信息
            // $data = M('MemberData')->find($this->userid);
            $data = D('Member/Member')->checkData($this->userid);
            if(!empty($data)){
                 //银行卡审核信息
                 $audit = M('AuditBank')->where(array('uid'=>$this->userid))->order('id desc')->find();   
                 if(!empty($audit)){
                     if($audit['status'] == '-1' && ($step == '1' || $step == '92')){
                        $this->assign('data',$data);
                        $this->display(); 
                        exit;           
                     }
                     if($step != '4' ||$step != '94'){$this->error("已经无法修改信息");}
                     if(($audit['status'] == '1') and (($audit['addtime'] + 3600*24*3) < time())){
                         $this->error("暂时无法修改信息！请您稍后确认！");
                     }
                 }
            }
            $this->assign('data',$data);
            $this->display();
        }
    }
    public function shop_bank_step2(){
        $memberdata = M('MemberData')->find($this->userid);
        $this->assign('data',$memberdata);
        $this->display();
    }
    public function shop_bank_step3(){
        //验证步骤
        $step = D('Member/Member')->where(array('userid'=>$this->userid))->getField('step');
        //增加打款信息
        if($step == '3' || $step == "93"){
            $member = M('MemberData')->where(array('userid'=>$this->userid))->find();
            $audit = array(
                'uid'=>$this->uid,
                'username'=>$this->username,
                'truename'=>$member['truename'],
                'idcard'=>$member['idcard'],
                'bank_card_number'=>$member['bank_card_number'],
                'bank'=>$member['bank'],
                'mobile'=>$this->userinfo['mobile'],
                'money'=>(float)rand(1,20)/100,
                'regdate'=>$this->userinfo['regdate'],
                'addtime'=>time(),
                'status'=>0,
                );
            M('AuditBank')->data($audit)->add();
            $step = D('Member/Member')->where(array('userid'=>$this->userid))->getField('step');
            if($step == '93'){
                D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',94);
            }else{
                D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',4);
            }
        }else{
            $audit = M('AuditBank')->where(array('uid'=>$this->userid))->order('id desc')->find();   
        }
        $data = M('MemberData')->find($this->userid);
        $this->assign('data',$data);
        $this->assign('audit',$audit);
        $this->display();
    }
    /**
    * @name 资质信息填写提交
    **/
    public function shop_offline_info(){
        if(IS_POST){
            $type = $this->userinfo['type'];
            $type = ($type==0)?I('type'):$type;
            $data = array();
            if($type==2){
                // ($data['company_name'] = I('company_name')) || $this->error('公司名词不能为空！');
                // ($data['business_licence_number'] = I('business_licence_number')) || $this->error('营业执照号不能为空');
                // ($data['business_licence_validity'] = I('business_licence_validity')) || $this->error('执照有效期不能为空！');
                // $data['business_licence_validity'] = implode('至',$data['business_licence_validity']);
                // ($data['business_scope'] = I('business_scope')) || $this->error('主营范围不能为空');
                // ($data['agent_brand'] = I('agent_brand')) || $this->error('代理品牌不能为空');
                // ($data['business_licence_picture'] = I('business_licence_picture_url')) || $this->error('营业执照图片不能为空');
                // $data['business_licence_picture'] = serialize($data['business_licence_picture']);
                // ($data['corporation_picture'] = I('corporation_picture_url')) || $this->error('法人照片不能为空！');
                // $data['corporation_picture'] = serialize($data['corporation_picture']);
                // ($data['corporation_idcard_picture'] = I('corporation_idcard_picture_url')) || $this->error('法人证件照不能为空');
                // $data['corporation_idcard_picture'] = serialize($data['corporation_idcard_picture']);
                // ($data['corporation_phone'] = I('corporation_phone')) || $this->error('法人电话不能为空');
                // ($data['agent_brand_name'] = I('agent_brand_name')) || $this->error('代理品牌不能为空');
                // ($data['agent_level'] = I('agent_level')) || $this->error('代理级别不能为空！');
                // ($data['agent_start_date'] = I('agent_start_date')) || $this->error('代理开始时间不能为空');
                // ($data['agent_end_date'] = I('agent_end_date')) || $this->error('代理结束时间不能为空');
                // ($data['agent_authorize_picture'] = I('agent_authorize_picture_url')) || $this->error('授权证明不能空');
                // $data['agent_authorize_picture'] = serialize($data['agent_authorize_picture']);
                // ($data['has_shop'] = I('has_shop')) ;
                // if($data['has_shop']){
                //     ($data['shop_name'] = I('shop_name')) || $this->error('店铺名称不能为空');
                //     ($data['shop_address'] = I('shop_address')) || $this->error('店铺地址不能为空');
                //     ($data['shop_area'] = I('shop_area')) || $this->error('店铺面积不能为空');
                //     ($data['shop_phone'] = I('shop_phone')) || $this->error('店铺电话不能为空');
                //     ($data['shop_picture'] = I('shop_picture_url')) || $this->error('店铺照片不能空');
                //     $data['shop_picture'] = serialize($data['shop_picture']);
                  ($data['company_name'] = I('company_name'));
                ($data['business_licence_number'] = I('business_licence_number'));
                ($data['business_licence_validity'] = I('business_licence_validity'));
                $data['business_licence_validity'] = implode('至',$data['business_licence_validity']);
                ($data['business_scope'] = I('business_scope'));
                ($data['agent_brand'] = I('agent_brand')) ;
                ($data['business_licence_picture'] = I('business_licence_picture_url'));
                $data['business_licence_picture'] = serialize($data['business_licence_picture']);
                ($data['corporation_picture'] = I('corporation_picture_url')) ;
                $data['corporation_picture'] = serialize($data['corporation_picture']);
                ($data['corporation_idcard_picture'] = I('corporation_idcard_picture_url')) ;
                $data['corporation_idcard_picture'] = serialize($data['corporation_idcard_picture']);
                ($data['corporation_phone'] = I('corporation_phone')) ;
                ($data['agent_brand_name'] = I('agent_brand_name')) ;
                ($data['agent_level'] = I('agent_level')) ;
                ($data['agent_start_date'] = I('agent_start_date')) ;
                ($data['agent_end_date'] = I('agent_end_date')) ;
                ($data['agent_authorize_picture'] = I('agent_authorize_picture_url')) ;
                $data['agent_authorize_picture'] = serialize($data['agent_authorize_picture']);
                ($data['has_shop'] = I('has_shop')) ;
                if($data['has_shop']){
                    ($data['shop_name'] = I('shop_name')) ;
                    ($data['shop_address'] = I('shop_address')) ;
                    ($data['shop_area'] = I('shop_area')) ;
                    ($data['shop_phone'] = I('shop_phone')) ;
                    ($data['shop_picture'] = I('shop_picture_url')) ;
                    $data['shop_picture'] = serialize($data['shop_picture']);
                }
            }elseif($type==1){
                 //个人认证
                ($data['truename'] = I('truename')) || $this->error('真实姓名不能为空');
                ($data['sex'] = I('sex')) || $this->error('性别不能为空');
                ($data['age'] = I('age')) || $this->error('年龄不能为空');
                ($data['idcard'] = I('idcard')) || $this->error('证件号码不能为空');
                ($data['idcard_address'] = I('idcard_address')) || $this->error('证件所在地不能为空');
                ($data['phone'] = I('phone')) || $this->error('联系方式不能为空');
                ($data['address'] = I('address')) || $this->error('联系地址不能为空');
                ($data['emergency_contactor'] = I('emergency_contactor')) || $this->error('紧急联络人不能为空');
                ($data['emergency_phone'] = I('emergency_phone')) ;
                ($data['emergency_address'] = I('emergency_address')) ;
                ($data['realname_picture'] = I('realname_picture_url')) || $this->error('证件照图像必须上传！');
                $data['realname_picture'] = serialize($data['realname_picture']);
            }else{
                $this->error('参数不正确');
            }
            $data['status'] = 0;
            $re = D('Member')->updateData($this->userid,$data);
            $audit = M('AuditQualification')->where(array('uid'=>$this->uid))->find();
            if($audit){
               $re =  M('AuditQualification')->where(array('uid'=>$this->uid))->data($data)->save();
            }else{
                $data['addtime'] = time();
                $data['uid'] = $this->uid;
                $data['username'] = $this->username;
                $re = M('AuditQualification')->data($data)->add();
            }
            if(!$re) $this->error('提交失败');
            if($this->userinfo['type']==0){
                D('Member/Member')->where(array('userid'=>$this->userid))->setField('type',$type);
            }
            D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',6);
            redirect(U('shop_offline_info_success'));
        }else{
            $userData = M('MemberData')->find($this->userid);
            if(!empty($userData)){
                $userinfo = array_merge($this->userinfo,$userData);
            }else{
                $userinfo = $this->userinfo;
            }
            $audit_bank = M('AuditBank')->where(array('uid'=>$this->userid))->order('id desc')->find();
            $audit_qualification = M('AuditQualification')->where(array('uid'=>$this->userid))->order('id desc')->find();
            if(($userinfo['step']==4)&&$audit_bank['status']==2){
                D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',5);
            }elseif(($userinfo['step']==94)&&$audit_bank['status']==2){
                D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',8);
                redirect(U("Seller/Index/index"));
            }elseif(($userinfo['step']==7)&&($audit_qualification['status']==-1)){//资质审核未通过
            }elseif(($userinfo['step']==6)&&($audit_qualification['status']==-1)){
            }elseif($userinfo['step']<>5){
                $this->error('状态信息错误');
            }
            $shop = M('Shop')->where(array('uid'=>$this->userid))->find();
            $shopcate = M('ShopCategory')->where(array('id'=>$shop['catid']))->find();
            $audit = M('AuditQualification')->where(array('uid'=>$this->userid))->find();

            $audit['business_licence_picture'] = unserialize($audit['business_licence_picture']);
            $audit['corporation_picture'] = unserialize($audit['corporation_picture']);
            $audit['corporation_idcard_picture'] = unserialize($audit['corporation_idcard_picture']);
            $audit['agent_authorize_picture'] = unserialize($audit['agent_authorize_picture']);
            $audit['shop_picture'] = unserialize($audit['shop_picture']);
            $audit['realname_picture'] = unserialize($audit['realname_picture']);

            $this->assign('userinfo',$userinfo);
            $this->assign('audit',$audit);
            $this->assign('shopcate',$shopcate);
            $this->display();
        }
    }
    public function shop_offline_info_success(){
        $userinfo = $this->userinfo;
        if($userinfo['step'] =='7'){
            redirect(U('shop_offline_result'));
        }else{
            $this->display();
        }
    }
    /**
    * @name 线下信息审核结果
    **/
    public function shop_offline_result(){
        if(IS_POST){
            ($name = I('shop_name')) || $this->error('店铺名称不能为空');
            ($domain = I('domain')) || $this->error('店铺域名不能为空');
            if(!(D('Member/Shop')->checkName($name))) $this->error('店铺名称不可用');
            if(!(D('Member/Shop')->checkDomain($domain))) $this->error('店铺域名不可用');
            $re = D('Member/Shop')->where(array('uid'=>$this->uid))->data(array('name'=>$name,'domain'=>$domain))->save();
            //if(!$re) $this->error('提交失败');
            D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',8);
            $this->success('提交成功',U('Seller/Index/index')); 
        }else{
            //如果店铺存在
            if(D('Member/Shop')->checkShop($this->userid)){
                $shopInfo = D('Member/Shop')->where(array('uid'=>$this->userid))->getField("uid,name,domain");
                $this->assign('shop_name',$shopInfo[$this->userid]['name']);
                $this->assign('domain',$shopInfo[$this->userid]['domain']);
            }
            $audit = M('AuditQualification')->where(array('uid'=>$this->uid))->order('id desc')->find();
            $this->assign('result',$audit);
            $this->display();   
        }
    }
    /**
     * 跳过银行卡认证阶段
     * */
    public function shop_bank_skip(){
        $userinfo = $this->userinfo;
        $audit_bank = M('AuditBank')->where(array('uid'=>$this->userid))->order('id desc')->find();
        $audit_qualification = M('AuditQualification')->where(array('uid'=>$this->userid))->order('id desc')->find();
        if($userinfo['step']<>5){
             D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',5);
        }
        $shop = M('Shop')->where(array('uid'=>$this->userid))->find();
        $shopcate = M('ShopCategory')->where(array('id'=>$shop['catid']))->find();
        $audit = M('AuditQualification')->where(array('uid'=>$this->userid))->find();

        $audit['business_licence_picture'] = unserialize($audit['business_licence_picture']);
        $audit['corporation_picture'] = unserialize($audit['corporation_picture']);
        $audit['corporation_idcard_picture'] = unserialize($audit['corporation_idcard_picture']);
        $audit['agent_authorize_picture'] = unserialize($audit['agent_authorize_picture']);
        $audit['shop_picture'] = unserialize($audit['shop_picture']);
        $audit['realname_picture'] = unserialize($audit['realname_picture']);
    
        $this->assign('userinfo',$userinfo);
        $this->assign('audit',$audit);
        $this->assign('shopcate',$shopcate);
        $this->display('shop_offline_info');
    }
    //重新认证银行卡信息
    public function shop_bank_redo(){
       if(D('Member/Member')->checkData($this->userid)){
            $this->error('银行卡账户信息已经存在!无法添加!');
        }else{
            D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',92);
            redirect(U('shop_bank_step0'));
        }
        //$this->display();
    }
        //重新填写银行卡信息
    public function shop_bank_step1_redo(){
       $audit = M('AuditBank')->where(array('uid'=>$this->userid))->order('id desc')->find();  
       $step = D('Member/Member')->where(array('userid'=>$this->userid))->getField('step');
       if($audit['status'] == '-1'){
            // $this->assign('data',$data);
             if($step == '93'){
                D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',92);
            }else{
                D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',1);
            }
            $this->redirect("shop_bank_step0");
       }else if($audit['status'] == '1'){
         $this->redirect("cart");
       }else{
         $this->error('错误的状态！');
       }
    }

    public function shop_bank_cartid(){
         $uid=$this->userid;
         $result=M('MemberData')->where(array('userid'=>$uid))->find();
        $numb=substr_replace($result['bank_card_number'],"************",4,11);
        $amount=M('Member')->where(array('userid'=>$uid))->getField("amount");
        $this->assign("amount",$amount);
        $this->assign("result",$result);
        $this->assign("numb",$numb);
        $this->display();
    }

   public function cart(){
       $uid=$this->userid;
        $re=M('MemberData')->where(array('userid'=>$uid))->find();
        $result=M('MemberData')->where(array('userid'=>$uid))->delete();
       $audit=M('AuditBank')->where(array('userid'=>$uid))->delete();
        $message=array(
            'userid'=>$re['userid'],
            'truename'=>$re['truename'],
            'bank_card_number'=>$re['bank_card_number'],
            'bank'=>$re['bank'],
            'idcard'=>$re['idcard'],
            'bank_audit'=>$re['bank_audit'],
            'company_name'=>$re['company_name'],
            'business_licence_number'=>$re['business_licence_number'],
            'business_licence_validity'=>$re['business_licence_validity'],
            'business_scope'=>$re['business_scope'],
            'agent_brand'=>$re['agent_brand'],
            'business_licence_picture'=>$re['business_licence_picture'],
            'corporation_picture'=>$re['corporation_picture'],
            'corporation_idcard_picture'=>$re['corporation_idcard_picture'],
            'corporation_phone'=>$re['corporation_phone'],
            'agent_brand_name'=>$re['agent_brand_name'],
            'agent_level'=>$re['agent_level'],
            'agent_start_date'=>$re['agent_start_date'],
            'agent_end_date'=>$re['agent_end_date'],
            'agent_authorize_picture'=>$re['agent_authorize_picture'],
            'has_shop'=>$re['has_shop'],
            'shop_name'=>$re['shop_name'],
            'shop_address'=>$re['shop_address'],
            'shop_area'=>$re['shop_area'],
            'shop_phone'=>$re['shop_phone'],
            'shop_picture'=>$re['shop_picture'],
            'sex'=>$re['sex'],
            'age'=>$re['age'],
            'idcard_address'=>$re['idcard_address'],
            'phone'=>$re['phone'],
            'address'=>$re['address'],
            'emergency_contactor'=>$re['emergency_contactor'],
            'emergency_phone'=>$re['emergency_phone'],
            'emergency_address'=>$re['emergency_address'],
            'realname_picture'=>$re['realname_picture'],
            'addtime'=>time(),
            'updatetime'=>$re['updatetime']


        );

       $userid=M('MemberDataHistory')->where(array('userid'=>$uid))->select();
       if($userid){
          $car=M('MemberDataHistory')->where(array('userid'=>$uid))->save($message);
       }else{
           $car=M('MemberDataHistory')->data($message)->add();
       }
         //echo $this->M('MemberDataHistory')->getLastSql();
       //exit;
       $step = D('Member/Member')->where(array('userid'=>$this->userid))->getField('step');
        if($step == '8'){
            D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',92);
        }else if($step == '4'){
            D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',1);
        }
        $this->display('shop_bank_step0');
    }





}
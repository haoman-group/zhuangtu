<?php
namespace App\Controller;

/*
* @class 用户信息
*/
class MemberController extends ApibaseController {

    protected $model = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Member/Member');
    }
    /**
    * @name 登录
    * @param string loginname
    * @param string password
    * @example 
    *   [JSON](success:{status:1,data:{userid:1,username:'lbk747',mobile:'18610675398',token:"xxxxxxxxxxx"}})
    *   [JSON](error:{status:0,data:{msg:'登录失败'}})
    */
    function login(){
        $loginName = I('request.loginname', null, 'trim');
        $password = I('request.password');

        $registration_id = I('registration_id');

        if (empty($loginName)) {
            $this->error('用户名不能为空');
        }
        if (empty($password)) {
            $this->error('密码不能为空');
        }
        $userid = service('Passport')->loginLocal($loginName, $password, $cookieTime ? 86400 * 180 : 86400);
        if ($userid > 0) {
            // $userInfo = service("Passport")->getLocalUser((int) $userid);
            //tag 行为点
            // tag('action_member_loginend', $userInfo);
            // $field = array();
            $user = M('Member')->field("password,regdate,regip,lastip,loginnum",true)->where(array('userid'=>$userid))->find();
            $user['typecategory']=$this->gettype($userid);
            $user['token']=$this->_getUserToken($user['userid'],$user['password']);
            if($user['userpic']) $user['userpic'] = CONFIG_SITEURL_MODEL.$user['userpic'];
            unset($user['password']);
            
            if($registration_id){
                $this->model->where(array('userid'=>$userid))->setField('registration_id',$registration_id);
            }

            $this->success($user);
        } else {
            //登陆失败
            $this->error('登陆失败');
        }
    }
    function checkmobile(){
        ($mobile=trim(I('mobile'))) || $this->error('手机号不能为空');
        if(!checkMobile($mobile)) $this->error('手机号码不正确');
        if(M('Member')->where(array("mobile" => $mobile))->count()){
            $this->error('手机号码已存在');
        }
        $this->success($mobile,'可以注册');

    }
    /*
    * @name 注册
    * @param string username
    * @param string mobile
    * @param string code
    * @param string password
    * @param string repassword
    */
    function register(){
        ($username=trim(I('username'))) || $this->error('昵称不能为空');
        ($mobile=trim(I('mobile'))) || $this->error('手机号不能为空');
        ($code=trim(I('code'))) || $this->error('手机验证码不能为空');
        ($password=trim(I('password'))) || $this->error('密码不能为空');
        // ($repassword = I('repassword')) or $this->error('两次密码不一致');
        $invitecode = I('invitecode');

        // if($password<>$repassword) $this->error('两次密码不一致');
        if(!checkMobile($mobile)) $this->error('手机号不正确');
        if(!APP_DEBUG){
            if(D('Member/Member')->reg_sms_verify($mobile,$code)<=0){
                $this->error('手机验证码不正确');
            }
        }
        $post = array(
            'mobile'=>$mobile,
            'username'=>$username,
            'password'=>$password,
            // 'pwdconfirm'=>$repassword,
            'invitecode'=>$invitecode,
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
                $info['userpic'] = "";
                $info['modelid'] = 3;
                if (false !== D('Member/Member')->where(array('userid' => $memberinfo['userid']))->save($info)) {
                    
                    //注册登陆状态
                    service("Passport")->loginLocal($post['username'], $post['password']);
                    //tag 行为
                    tag('action_member_registerend', $memberinfo);
                    $userInfo = service("Passport")->getLocalUser((int) $userid);
                    //tag 行为点
                    tag('action_member_loginend', $userInfo);
                    $user = array(
                        'userid'=>$userInfo['userid'],
                        'username'=>$userInfo['username'],
                        'mobile'=>$userInfo['mobile'],
                        'name'=>$userInfo['name'],
                        'type'=>$userInfo['type'],
                        'sex'=>$userInfo['sex'],
                        'area'=>$userInfo['area'],
                        'token'=>$this->_getUserToken($userInfo['userid'],$userInfo['password']),
                    );
                    $this->success($user,'账号注册成功');
                } else {
                    //删除
                    service("Passport")->userDelete($memberinfo['userid']);
                    $this->error("会员注册失败！");
                }
            } else {
                $this->error(service("Passport")->getError()? : '帐号注册失败！');
            }
        } else {
            $this->error(D('Member/Member')->getError()? : '帐号注册失败！');
        }



    }
    function findpwd_checkmobile(){
        ($mobile = I('mobile')) || $this->error('手机号不能为空');
        ($code = trim(I('code')))||$this->error('验证码必填');
        if(!checkMobile($mobile)) $this->error('手机号不正确');
        if(D('Member/Member')->reg_sms_verify($mobile,$code)<=0){
            $this->error('手机验证码不正确');
        }
        $this->success('验证码正确');
    }
    function findpwd(){
        ($mobile = I('mobile')) || $this->error('手机号不能为空');
        ($code = trim(I('code')))||$this->error('验证码必填');
        ($password = trim(I('password'))) || $this->error('密码必填');
        $password2 = trim(I('password2'));

        if(strlen($password) < 6 || strlen($password) > 20) $this->error('密码长度在6~20之间');
        if($password<>$password2) $this->error('两次密码不一致');

        if(!checkMobile($mobile)) $this->error('手机号不正确');
        if(D('Member/Member')->reg_sms_verify($mobile,$code)<=0){
            $this->error('手机验证码不正确');
        }

        //随机密码
        $encrypt = genRandomString(6);
        //新密码
        $password = D('Member/Member')->encryption(0, $password, $encrypt);
        $data['password'] = $password;
        $data['encrypt'] = $encrypt;

        if(D('Member/Member')->where(array('mobile'=>$mobile))->data($data)->save()){
            $this->success('修改成功');
        }else{
            $this->error('修改失败');
        }

    }

    function chpwd(){
        ($userid = trim($this->userid))||$this->error('用户名必填');
        ($password = trim(I('password'))) || $this->error('旧密码必填');
        ($newpassword = trim(I('newpassword')))||$this->error('新密码必填');
        if(strlen($newpassword) < 6 || strlen($newpassword) > 20) $this->error('密码长度在6~20之间');
        $username = M('Member')->getFieldByUserid($userid,'username');
        if(service('Passport')->userEdit($username,$password,$newpassword)){
            $this->success('修改成功,请重新登录！');
        }else{
            $this->error('修改失败');
        }
    }
    /*
    * @name 发送短信验证码
    * @param string mobile
    * @param string vcode
    */
    function sendsms(){
        ($mobile = I('mobile','')) or $this->error('手机号码不能为空');
        // ($vcode = I('vcode','')) or $this->error('验证码不能为空');
        if(!checkMobile($mobile)) $this->error('手机号码不正确');
        if (false == $this->verify($vcode, 'sendsms')) {
            // $this->error('验证码不正确');
        }
        $code = rand(100000,999999);
        $re = D('Member/Member')->reg_send_sms($code,$mobile);
        if($re<1) $this->error("短信发送失败");
        $this->success('','短信发送成功');
    }
    function gensign(){
        $querystring = I('querystring');
        echo $this->_encrypt($querystring);
    }

    function headpic(){
        ($userid = I('userid')) || $this->error('用户不能为空');
        if($_FILES){
            $Attachment = service("Attachment", array('module' => 'Content', 'catid' => 1, 'isadmin' =>0, 'userid' => $userid));
            //缩略图宽度
            $thumb_width = 100;
            $thumb_height = 100;
            //图片裁减相关设置，如果开启，将不保留原图
            if ($thumb_width && $thumb_height) {
                $Attachment->thumb = true;
                $Attachment->thumbRemoveOrigin = true;
                //设置缩略图最大宽度
                $Attachment->thumbMaxWidth = $thumb_width;
                //设置缩略图最大高度
                $Attachment->thumbMaxHeight = $thumb_height;
            }
            //开始上传
            $info = $Attachment->upload($Callback);
            if ($info) {
                if (in_array(strtolower($info[0]['extension']), array("jpg", "png", "jpeg", "gif"))) {
                    $picture = $info[0]['url'];
                    $re = $this->model->where(array('userid'=>$userid))->data(array('userpic'=>$picture))->save();
                    if(!$re) $this->error('头像上传失败');
                    $this->success(CONFIG_SITEURL_MODEL.$picture);
                } else {
                    $this->error('头像上传失败');
                }
            } else {
                $this->error($Attachment->getErrorMsg());
            }
        }else{  
            ($picture = I('picture')) or $this->error('图片不能为空');
            $pic = array(
                'md_img'=>$picture,
            );
            $picture = api_upfile($pic);
            if($picture['status']<=0) $this->error('头像上传失败');
            $picture = $picture['msg'];
            $re = $this->model->where(array('userid'=>$userid))->data(array('userpic'=>$picture))->save();
            if(!$re) $this->error('头像上传失败');
            $this->success(CONFIG_SITEURL_MODEL.$picture);
        }
    }
    
    public function userinfo(){
        $userid = I('userid');
        $data = $this->model->field(array('userid','username','mobile','userpic','regdate','lastdate','lastip','point'))->where(array('userid'=>$userid))->find();
        if(!$data) $this->error('用户不存在');
        if($data['userpic']) $data['userpic'] = CONFIG_SITEURL_MODEL.$data['userpic'];
        $this->success($data);
    }

    public function gettype($userid){

        $catid=M('Member')->field("zt_shop.catid")->join("join zt_shop on zt_shop.uid=zt_member.userid")->where(array('userid'=>$userid))->find();  
        $typecategory=M("ShopCategory")->where(array("id"=>$catid['catid']))->getField("pid");
        return $typecategory;

    }
}




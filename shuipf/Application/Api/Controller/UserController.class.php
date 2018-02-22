<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 获取当前登陆信息
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Api\Controller;

use Common\Controller\Base;

class UserController extends Base {

    //用户id
    protected $userid = 0;
    //用户名
    protected $username = NULL;
    //用户信息
    protected $userinfo = array();

    protected function _initialize() {
        parent::_initialize();
        $this->userid = (int) service("Passport")->userid;
        $this->username = service("Passport")->username;
        $this->userinfo = service("Passport")->getInfo();
    }

    //jsonp/json的方式获取当前登陆信息
    public function getuser() {
        $data = array(
            'userid' => $this->userid,
            'username' => $this->username,
            //昵称
            'nickname' => $this->userinfo['nickname'],
            //头像地址
            'avatar' => $this->userid ? service("Passport")->getUserAvatar((int) $this->userid, 45) : '',
            //分享总数
            'dance_num' => $this->userinfo['share'],
            //状态
            'status' => $this->userid ? true : false,
        );
        $callback = I('request.callback', '');
        if (empty($callback)) {
            $type = 'JSON';
        } else {
            $type = 'JSONP';
            C('VAR_JSONP_HANDLER', 'callback');
        }
        $this->ajaxReturn($data, $type);
    }
    /**
    * @name 发送验证码
    * @param string mobile
    * @return JSON
    **/
    public function send_reg_sms(){
        ($mobile = I('mobile','')) or $this->ajaxReturn(array('status'=>0,'msg'=>'手机号码不能为空'));
        if(!checkMobile($mobile)) $this->ajaxReturn(array('status'=>0,'msg'=>'手机号码不正确'));
        if(!APP_DEBUG){
            $code = rand(100000,999999);
            $re = D('Member/Member')->reg_send_sms($code,$mobile);
            if($re<1) $this->ajaxReturn(array('status'=>0,'msg'=>D('Member/Member')->getErrorMsg($re)));
        }
        $this->ajaxReturn(array('status'=>1,'msg'=>'发送成功'));
    }
    /**
    * @name 发送邮件验证码
    * @param string email
    * @return JSON
    **/
    public function send_email_code(){
        ($mobile = I('email','')) or $this->ajaxReturn(array('status'=>0,'msg'=>'邮箱不能为空'));
        // if(!(service("Passport")->userCheckeMail($email))) $this->ajaxReturn(array('status'=>0,'msg'=>service("Passport")->getError()));
        $code = rand(100000,999999);
        $re = D('Member/Member')->send_email_verify($code,$mobile);
        if($re<1) $this->ajaxReturn(array('status'=>0,'msg'=>D('Member/Member')->getErrorMsg($re)));
        $this->ajaxReturn(array('status'=>1,'msg'=>'发送成功'));
    }
    /**
    * @name 验证邮箱是否存在
    * @param string mobile
    * @return JSON
    **/
    public function checkEmail(){
        $email = I('email');
        $re = service("Passport")->userCheckeMail($email);
        if(!$re) {
            $msg = service("Passport")->getError();
            $this->ajaxReturn(array('status'=>0,'msg'=>$msg));
        }
        $this->ajaxReturn(array('status'=>1,'msg'=>'手机号不存在'));
    }
    /**
    * @name 验证手机号是否存在
    * @param string mobile
    * @return JSON
    **/
    public function checkMobile(){
        ($mobile = I('mobile','')) or $this->ajaxReturn(array('status'=>0,'msg'=>'手机号码不能为空'));
        $re = service("Passport")->userCheckMobile($mobile);
        if(!$re) {
            $msg = service("Passport")->getError($re);
            if($msg == '该手机号码已经被注册！'){
                $num = D('Member/Member')->where(array("mobile"=>$mobile))->count();    
                $msg = "该手机号码已经注册过".$num."个账户，若继续进行，则之前的账户无法通过此手机号码登录，只能通过用户名进行登录";
                $this->ajaxReturn(array('status'=>0,'msg'=>$msg));
            }
            $this->ajaxReturn(array('status'=>0,'msg'=>$msg));
        }
        $this->ajaxReturn(array('status'=>1,'msg'=>'手机号不存在'));
    }
    /**
    * @name 验证银行卡输入金额
    * @param float @money
    * @return JSON
    **/
//    public function verifyBank(){
//        $money = I('money');
//        ($this->userid) || $this->ajaxReturn(array('status'=>0,'msg'=>'未登录'));
//        $audit = M('AuditBank')->where(array('uid'=>$this->userid))->order('id desc')->find();
//        if(($audit['status']==1)){
//            if($audit['money']<>$money) $this->ajaxReturn(array('status'=>0,'msg'=>'金额不正确'));
//            else{
//                M('AuditBank')->where(array('id'=>$audit['id']))->data(array('status'=>2,'finishtime'=>time()))->save();
//                D('Member/Member')->where(array('userid'=>$audit['uid']))->setField('audit_bank',1);
//                $this->ajaxReturn(array('status'=>1,'msg'=>'验证成功'));
//            }
//        }elseif($audit['status']==0){
//            $this->ajaxReturn(array('status'=>0,'msg'=>'未打款'));
//        }else{
//            $this->ajaxReturn(array('status'=>0,'msg'=>'验证失败'));
//        }
//    }

    /**
     * edit by f
     */
    public function verifyBank(){
        $money = I('money');
        ($this->userid) || $this->ajaxReturn(array('status'=>0,'msg'=>'未登录'));
        $audit = M('AuditBank')->where(array('uid'=>$this->userid))->order('id desc')->find();
        if(($audit['status']==1)){
            if($audit['money']<>$money){
                //先读取session
                $flag=S($audit['uid']);
                if(empty($flag)) {
                    S($audit['uid'], 1);
                }else{
                    $flag++;
                    S($audit['uid'],$flag);
                }
                if(S($audit['uid'])>=3){
                    S($audit['uid'], 0);
                    //将operatetime增加30分钟,修改认证状态
                    M('AuditBank')->where(array('id'=>$audit['id']))->data(array('status'=>5,'operatetime'=>time()))->save();
                    $this->ajaxReturn(array('status'=>5,'msg'=>'认证被锁定30分钟'));
                }
                $this->ajaxReturn(array('status'=>0,'msg'=>'金额不正确'));
            }
            else{
                M('AuditBank')->where(array('id'=>$audit['id']))->data(array('status'=>2,'finishtime'=>time()))->save();
                D('Member/Member')->where(array('userid'=>$audit['uid']))->setField('audit_bank',1);
                M('MemberData')->where(array('userid'=>$audit['uid']))->setField('bank_audit',1);
                $this->ajaxReturn(array('status'=>1,'msg'=>'验证成功'));
            }
        }elseif($audit['status']==0){
            $this->ajaxReturn(array('status'=>0,'msg'=>'未打款'));
        }elseif($audit['status']==5){//认证被锁定
            $operatetime=$audit['operatetime'];
            if(time()<=$operatetime+1800){
                //锁定时间还不到
                //计算差时
                $delayTime=$operatetime+1800-time();
                $delayTime=ceil($delayTime/60);
                $this->ajaxReturn(array('status'=>5,'msg'=>'您的认证过程已经被锁定，请于'.$delayTime.'分钟后再进行操作'));
            }else{
                //锁定时间已过
                M('AuditBank')->where(array('id'=>$audit['id']))->setField('status',1);
                $this->ajaxReturn(array('status'=>0,'msg'=>'锁定时间已过，可以显示弹出框了'));
            }
            $this->ajaxReturn(array('status'=>0,'msg'=>'未打款'));
        }else{
            $this->ajaxReturn(array('status'=>0,'msg'=>'验证失败'));
        }
    }
    // 获取当前用户购物车数量
    public function getCartNum(){
        if(empty($this->userid)){
            return $this->ajaxReturn(array('status'=>1,'msg'=>'成功','data'=>'0'));
        }
        $num = D('Buyer/Cart')->getCountByUid($this->userid);
        return $this->ajaxReturn(array('status'=>1,'msg'=>'成功','data'=>$num));
    }

}

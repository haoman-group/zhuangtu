<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 获取当前登陆信息
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Api\Controller;

//use Common\Controller\Base;

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
            $field = array();
            $user = M('Member')->field($field)->where(array('userid'=>$userid))->find();
            $user['token']=$this->_getUserToken($user['userid'],$user['password']);
            if($user['userpic']) $user['userpic'] = CONFIG_SITEURL_MODEL.$user['userpic'];
            unset($user['password']);
            $this->success($user);
        } else {
            //登陆失败
            $this->error('登陆失败');
        }
    }
    function loginForH5(){
        $data = I('post.');
        $userinfo = M('Member')->where(array('userid'=>$data['userid']))->find();
        date_default_timezone_set('Asia/Shanghai');
        $md5Data = md5($userinfo['userid'].$userinfo['encrypt'].date("YmdH"));
        if($md5Data == $data['token']){
            $userid = service('Passport')->loginLocal($userinfo['mobile'], null, $cookieTime ? 86400 * 180 : 86400);
            if ($userid > 0) {
                $this->success('登陆成功!');
            }
        }else{
            $this->error('登陆失败');
        }
    }
    //H5登出接口
    public function loginoutH5(){
        return R('Member/Index/logout');
    }

}

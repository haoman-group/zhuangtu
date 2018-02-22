<?php

// +----------------------------------------------------------------------
// | 会员设置管理
// +----------------------------------------------------------------------
// | Author: 李博凯 <lbk747@163.com>
// +----------------------------------------------------------------------

namespace Member\Model;

use Common\Model\Model;

class MemberModel extends Model {

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
        array('mobile', 'require', '手机号码不能为空！'),
        // array('mobile', '', '手机号已经存在！', 0, 'unique', 1),
        array('username', 'require', '用户名不能为空！'),
        array('username', '', '帐号名称已经存在！', 0, 'unique', 1),
        array('username', 'checkName', '用户名已经存在或不合法！', 0, 'callback', 1),
        array('password', 'require', '密码不能为空！', 0, 'regex', 1),
        // array('email', 'email', '邮箱地址有误！'),
        // array('nickname', '', '该昵称已经存在！', 0, 'unique', 1),
        array('pwdconfirm', 'password', '两次输入的密码不一样！', 0, 'confirm'),
        //callback
        // array('email', 'checkEmail', '邮箱已经存在或者不合法！', 0, 'callback', 1),
        // array('groupid', 'checkGroupid', '该会员组不存在！', 0, 'callback'),
        // array('modelid', 'checkModelid', '该会员模型不存在！', 0, 'callback'),
    );
    //array(填充字段,填充内容,[填充条件,附加规则])
    protected $_auto = array(
        array('regdate', 'time', 1, 'function'),
        array('regip', 'get_client_ip', 1, 'function'),
    );

    /**
     * 根据错误代码返回错误提示
     * @param type $errorCodes 错误代码
     * @return type
     */
    public function getErrorMsg($errorCodes) {
        switch ($errorCodes) {
            case -1:
                $error = '用户名不合法';
                break;
            case -2:
                $error = '包含不允许注册的词语';
                break;
            case -3:
                $error = '用户名已经存在';
                break;
            case -4:
                $error = 'Email 格式有误';
                break;
            case -5:
                $error = 'Email 不允许注册';
                break;
            case -6:
                $error = '该 Email 已经被注册';
                break;
            case -2001:
                $error = '短信发送失败';
                break;
            case -2002:
                $error = '系统错误';
                break;
            case -2003:
                $error = '验证码过于频繁';
                break;
            case -2004:
                $error = '手机号不正确或已存在';
                break;
            case -3001:
                $error = '发送邮件验证码失败';
                break;
            case -3002:
                $error = '发送邮件验证码失败：写入数据库错误！';
                break;
            case -3003:
                $error = '验证失败：未找到待验证的验证码';
                break;
            case -3004:
                $error = '验证失败：已经超时，请重试！';
                break;
            case -3005:
                $error = '验证失败：验证码错误！';
                break;
            default:
                $error = '操作出现错误';
                break;
        }

        return $error;
    }

    //检查用户名
    public function checkName($name) {
        if (service("Passport")->userCheckUsername($name)) {
            return true;
        }
        return false;
    }

    //检查邮箱
    public function checkEmail($email) {
        if (service("Passport")->userCheckeMail($email)) {
            return true;
        }
        return false;
    }
    //检查手机号
    public function checkMobile($mobile) {

        if (service("Passport")->usercheckMobile($mobile)) {
            return true;
        }
        return false;
    }

    //检查会员组
    public function checkGroupid($groupid) {
        $Member_group = cache('Member_group');
        if (!$Member_group[$groupid]) {
            return false;
        }
        return true;
    }

    //检查会员模型
    public function checkModelid($modelid) {
        $Model_Member = cache("Model_Member");
        if (!$Model_Member[$modelid]) {
            return false;
        }
        return true;
    }

    /**
     * 对明文密码，进行加密，返回加密后的密码
     * @param $identifier 为数字时，表示uid，其他为用户名
     * @param type $pass 明文密码，不能为空
     * @return type 返回加密后的密码
     */
    public function encryption($identifier, $pass, $verify = "") {
        $v = array();
        if (is_numeric($identifier)) {
            $v["id"] = $identifier;
        } else {
            $v["username"] = $identifier;
        }
        $pass = md5($pass . md5($verify));
        return $pass;
    }

    /**
     * 根据标识修改对应用户密码
     * @param type $identifier
     * @param type $password
     * @return type
     */
    public function ChangePassword($identifier, $password) {
        if (empty($identifier) || empty($password)) {
            return false;
        }
        $term = array();
        if (is_numeric($identifier)) {
            $term['userid'] = $identifier;
        } else {
            $term['username'] = $identifier;
        }
        $verify = $this->where($term)->getField('encrypt');

        $data['password'] = $this->encryption($identifier, $password, $verify);

        $up = $this->where($term)->save($data);
        if ($up) {
            return true;
        }
        return false;
    }

    /**
     * 根据积分算出用户组
     * @param $point int 积分数
     */
    public function get_usergroup_bypoint($point = 0) {
        $groupid = 2;
        if (empty($point)) {
            $member_setting = cache("Member_Config");
            //新会员默认点数
            $point = $member_setting['defualtpoint'] ? $member_setting['defualtpoint'] : 0;
        }
        //获取会有组缓存
        $grouplist = cache("Member_group");
        foreach ($grouplist as $k => $v) {
            $grouppointlist[$k] = $v['point'];
        }
        //对数组进行逆向排序
        arsort($grouppointlist);
        //如果超出用户组积分设置则为积分最高的用户组
        if ($point > max($grouppointlist)) {
            $groupid = key($grouppointlist);
        } else {
            foreach ($grouppointlist as $k => $v) {
                if ($point >= $v) {
                    $groupid = $tmp_k;
                    break;
                }
                $tmp_k = $k;
            }
        }
        return $groupid;
    }

    /**
     * 取得本应用中的用户资料
     * @param type $identifier
     * @param type $field
     * @return boolean
     */
    public function getUserInfo($identifier, $field = '*') {
        if (empty($identifier)) {
            return false;
        }
        $where = array();
        if (is_numeric($identifier) && gettype($identifier) == "integer") {
            $where['userid'] = $identifier;
        } else {
            $where['username'] = $identifier;
        }
        $userInfo = $this->where($where)->field($field)->find();
        if (empty($userInfo)) {
            return false;
        }
        return $userInfo;
    }

    /**
     * 取得用户配置
     * @param type $userid 用户UID
     * @return boolean
     */
    public function getUserConfig($userid) {
        if (empty($userid) || $userid < 1) {
            $this->error = '请指定用户ID！';
            return false;
        }
        //检查缓存是否存在
        $userConfig = S('user_config_' . $userid);
        if (!empty($userConfig)) {
            return $userConfig;
        }
        //取得用户信息
        $userInfo = service("Passport")->getLocalUser((int) $userid);
        if (empty($userInfo)) {
            $this->error = '该用户不存在！';
            return false;
        }
        //会员组缓存
        $memberGroupCache = cache('Member_group');
        //取得该用户所属会有组信息
        $groupInfo = $memberGroupCache[$userInfo['groupid']];
        if (empty($groupInfo)) {
            $this->error = '获取不到该用户所属会有组信息！';
            return false;
        }
        $getUserConfig = array();
        $getUserConfig = array_merge($getUserConfig, $groupInfo);
        $getUserConfig['heat'] = $userInfo['heat'];
        $getUserConfig['theme'] = $userInfo['theme'];
        $getUserConfig['praise'] = $userInfo['praise'];
        $getUserConfig['attention'] = $userInfo['attention'];
        $getUserConfig['fans'] = $userInfo['fans'];
        $getUserConfig['share'] = $userInfo['share'];
        $getUserConfig['nickname'] = $userInfo['nickname'];
        $getUserConfig['userpic'] = $userInfo['userpic'];
        $getUserConfig['groupid'] = $userInfo['groupid'];
        $getUserConfig['modelid'] = $userInfo['modelid'];
        $getUserConfig['message'] = $userInfo['message'];
        $getUserConfig['vip'] = $userInfo['vip'];
        $getUserConfig['overduedate'] = $userInfo['overduedate'];
        //进行缓存
        S('user_config_' . $userid, $getUserConfig, 3600);
        return $getUserConfig;
    }

    //会员配置缓存
    public function member_cache() {
        $data = unserialize(M('Module')->where(array('module' => 'Member'))->getField('setting'));
        cache("Member_Config", $data);
        $this->member_model_cahce();
        return $data;
    }

    //会员模型缓存
    public function member_model_cahce() {
        $data = D('Content/Model')->getModelAll(2);
        cache("Model_Member", $data);
        return $data;
    }
    /**
    * 模板接口发短信
    * @param code 验证码
    * @param mobile 为接受短信的手机号
    * @return -1=>'短信发送失败' -2=>'系统错误' －3=>'验证码过于频繁',-4=>'手机号不正确或已存在'，1=>'发送成功'
    * apikey 为云片分配的apikey
    * tpl_id 为模板id
    * tpl_value 为模板值
    */
    public function reg_send_sms($code, $mobile){
        // if(!$this->checkMobile($mobile)) return -2004;
        $apikey = C('YUNPIAN_APPKEY');
        $tpl_id = 1294243;
        $url="http://yunpian.com/v1/sms/tpl_send.json";
        $tpl_value = "#code#=".$code;
        $encoded_tpl_value = urlencode("$tpl_value");
        //$post_string="apikey=$apikey&tpl_id=$tpl_id&tpl_value=$encoded_tpl_value&mobile=$mobile";
        $post_string="apikey=$apikey&tpl_id=$tpl_id&tpl_value=$encoded_tpl_value&mobile=$mobile";
        $result = sock_post($url, $post_string);
        $result = json_decode($result);
        if($result->code<>0)  return -2001;
        $re = M('SmsVerify')->data(array('mobile'=>$mobile,'code'=>$code,'addtime'=>time(),'endtime'=>time()+900))->add();
        if(!$re) return -2002;
        return 1;
    }
    /**
    * 手机验证
    * @return -1=>没有发送验证码，-2=>'验证码已过期',-3=>'验证码错误',1=>'验证成功'
    */
    public function reg_sms_verify($mobile,$code){
        $veriry = M('SmsVerify')->where(array('mobile'=>$mobile))->order('id desc')->find();
        if(!$veriry) return -1;
        if($veriry['endtime']<time()) return -2;
        if($veriry['code']<>$code) return -3;
        return 1;
    }
    //发短信接口
     public function send_user($mobile,$company,$order_sn){
         if(!APP_DEBUG) {
             if(!empty($mobile)&& !empty($company)&& !empty($order_sn)){
             $apikey = C('YUNPIAN_APPKEY');
             $tpl_id = 1380629;
             $url = "http://yunpian.com/v1/sms/tpl_send.json";
             $tpl_value = urlencode("#order_sn#")."=".urlencode($order_sn);
             $tpl_value = $tpl_value."&".urlencode("#comtele#")."=".urlencode($company);
             $encoded_tpl_value = urlencode($tpl_value);
             $post_string = "apikey=$apikey&tpl_id=$tpl_id&tpl_value=$encoded_tpl_value&mobile=$mobile";
             $result = sock_post($url, $post_string);
             $result = json_decode($result);
             return 1;
             }else{
                 return ;
             }
         }else{
             return false;
         }

     }
     //支付成功后发的信息
    public function send_user_pay($mobile,$companytele,$order_sn)
    {
        if(!APP_DEBUG) {
            if(!empty($mobile) && !empty($companytele)&& !empty($order_sn)){
            $apikey = C('YUNPIAN_APPKEY');
            $tpl_id = 1380699;
            $url = "http://yunpian.com/v1/sms/tpl_send.json";
            $tpl_value=urlencode("#companytele#")."=".urlencode($companytele);
            $tpl_value=$tpl_value."&".urlencode("#order_sn#")."=".urlencode($order_sn);
            $encoded_tpl_value = urlencode($tpl_value);
            $post_string = "apikey=$apikey&tpl_id=$tpl_id&tpl_value=$encoded_tpl_value&mobile=$mobile";
            $result = sock_post($url, $post_string);
            $result = json_decode($result);
            return 1;
            }else{
                return;
            }
        }else{
        return false;
    }
    }

    //支付成功后给商家发的信息
    public function send_company($mobile,$usertele,$username,$order_sn)
    {
        if(!APP_DEBUG) {
            if(!empty($mobile)&& !empty($username)&& !empty($order_sn)) {
                $apikey = C('YUNPIAN_APPKEY');
                $tpl_id = 1380735;
                $url = "http://yunpian.com/v1/sms/tpl_send.json";
                $tpl_value = urlencode("#usertele#") . "=" . urlencode($usertele);
                $tpl_value = $tpl_value . "&" . urlencode("#username#") . "=" . urlencode($username);
                $tpl_value = $tpl_value . "&" . urlencode("#order_sn#") . "=" . urlencode($order_sn);
                $encoded_tpl_value = urlencode($tpl_value);
                $post_string = "apikey=$apikey&tpl_id=$tpl_id&tpl_value=$encoded_tpl_value&mobile=$mobile";
                $result = sock_post($url, $post_string);
                $result = json_decode($result);
                return 1;
            }else{
                return;
            }
        }else{
         return false;
    }

    }
    //支付成功后给装途人员发的信息
    public function send_zhuangtu($mobile,$usertele,$username,$order_sn)
    {
        if(!APP_DEBUG) {
            if(!empty($mobile)&& !empty($usertele)&& !empty($username)&& !empty($order_sn)){
            $apikey = C('YUNPIAN_APPKEY');
            $tpl_id = 1380735;
            $url = "http://yunpian.com/v1/sms/tpl_send.json";
            $tpl_value=urlencode("#usertele#")."=".urlencode($usertele);
            $tpl_value= $tpl_value."&".urlencode("#username#")."=".urlencode($username);
            $tpl_value= $tpl_value."&".urlencode("#order_sn#")."=".urlencode($order_sn);
            $encoded_tpl_value = urlencode($tpl_value);
            $post_string = "apikey=$apikey&tpl_id=$tpl_id&tpl_value=$encoded_tpl_value&mobile=$mobile";
            $result = sock_post($url, $post_string);
            $result = json_decode($result);
            // var_dump($post_string);
            // var_dump($result);
            return 1;
            }else{
                return;
            }
        }else{
            return false;
        }

    }




    //发送邮箱验证内容
    public function send_email_verify($code,$email){
        if(!APP_DEBUG){
            SendMail($email,'验证信息','您的装途网验证码为:'.$code);
        }
        $re = M('EmailVerify')->data(array('email'=>$email,'code'=>$code,'addtime'=>time(),'endtime'=>time()+900))->add();
        if(!$re){
            return -3002;
        }
        return 1;
    }
    //验证邮箱内容
    // @return -1=>没有发送验证码，-2=>'验证码已过期',-3=>'验证码错误',1=>'验证成功'
    public function verify_email_code($email,$code){
        $veriry = M('EmailVerify')->where(array('email'=>$email))->order('id desc')->find();
        // echo M('EmailVerify')->getLastSql();
        if(!$veriry) return -3003;
        if($veriry['endtime']<time()) return -3004;
        if($veriry['code']<>$code) return -3005;
        return 1;
    }
    public function updateData($userid,$data){
        if(!$userid) return false;
        $memberdata = M('MemberData')->where(array('userid'=>$userid))->find();
        if(!$memberdata){
            $data['addtime'] = time();
            $re = M('MemberData')->data(array('userid'=>$userid))->add();
            if(!$re) return false;
        }
        $data['updatetime'] = time();
        $re = M('MemberData')->where(array('userid'=>$userid))->data($data)->save();
        if(!$re) return false;
        return true;
    }
    /**
    * 修改绑定手机号
    * @param userid
    * @param mobile
    **/
    public function changeMobile($userid,$mobile){
        if(!$userid || !$mobile) return false;
        $re = $this->where(array('userid'=>$userid))->data(array('mobile'=>$mobile))->save();
        if(!$re) return false;
        return true;
    }
    public function verifyIdcard($userid,$idcard){
        return M('MemberData')->where(array('userid'=>$userid,'idcard'=>$idcard))->find();
    }
    //检测是否有银行卡信息
    public function checkData($userid){
        return (M('MemberData')->where(array('userid'=>$userid))->getField("bank_card_number") == '')?false:true;
    }
    public function getUserData($userid=0) {

        $userInfo = $this->where(array('userid'=>$userid))->find();
        if (empty($userInfo)) {
            return false;
        }
        $userdata = M('MemberData')->where(array('userid'=>$userid))->find();

        return array_merge($userInfo,$userdata);
    }
    public function saveToken($userid){
        $token = $this->where(array('userid'=>$userid))->getFieldByUserid($userid,'token');
        if(!$token){
            $token = md5($userid.session_id());
            $this->where(array('userid'=>$userid))->setField('token',$token);
        }else{
            return $token;
        }
    }
    public function verifyToken($userid,$token){
        $verify = $this->where(array('userid'=>$userid,'token'=>$token))->find();
        return $veriry?true:false;
    }
    //根据手机号判断是否为买家
    public function isBuyer($mobile){
        if(empty($mobile)){return false;}
        $result = $this->where(array('mobile'=>$mobile))->count();
        if($result > 1){
            return false;
        }else if($result == 1){
            $isbuyer = $this->where(array("mobile"=>$mobile))->getField("isbuyer");
            if($isbuyer == 1){//买家标识
                return true;
            }
            else {
                return false;
            }
        }else{
            return false;
        }
        return false;
    }
    public function isBuyerByUid($uid){
        if(empty($uid)){return false;}
        $result = $this->where(array('userid'=>$uid))->count();
        if($result > 1){
            return false;
        }else if($result == 1){
            $isbuyer = $this->where(array("userid"=>$uid))->getField("isbuyer");
            if($isbuyer == 1){//买家标识
                return true;
            }
            else {
                return false;
            }
        }else{
            return false;
        }
        return false;
    }
}

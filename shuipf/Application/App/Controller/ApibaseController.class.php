<?php
namespace App\Controller;
use Common\Controller\Base;

class ApibaseController extends Base {
    protected $key='d924b9f2ab3ddf2f';
    protected $userid=NULL;
    protected function _initialize() {
        parent::_initialize();
        $key = I('get.key');
        $sign = I('get.sign');
        $timestamp = I('timestamp');
        // if($key<>$this->key) $this->error('用户密钥不正确');
        // if(($timestamp-60)>time()) $this->_301();
        // if($sign<>$this->_encrypt()) $this->_301();
        $this->userid = I('userid');
        $token = I('token');
        if (CONTROLLER_NAME == 'Member' && in_array(ACTION_NAME, array( 'chpwd','info'))) {
            if(!$this->_isLogin($this->userid,$token)){
                $this->error('用户验证失败');
            } 
        }
    }
    /**
     * Ajax方式返回数据到客户端
     * @access protected
     * @param mixed $data 要返回的数据
     * @param String $type AJAX返回数据格式
     * @param int $json_option 传递给json_encode的option参数
     * @return void
     */
    protected function ajaxReturn($data,$type='',$json_option=0) {
        if(empty($type)) $type  =   C('DEFAULT_AJAX_RETURN');
        switch (strtoupper($type)){
            case 'JSON' :
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                exit(json_encode($data,$json_option));
            case 'XML'  :
                // 返回xml格式数据
                header('Content-Type:text/xml; charset=utf-8');
                exit(xml_encode($data));
            case 'JSONP':
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                $handler  =   isset($_GET[C('VAR_JSONP_HANDLER')]) ? $_GET[C('VAR_JSONP_HANDLER')] : C('DEFAULT_JSONP_HANDLER');
                exit($handler.'('.json_encode($data,$json_option).');');  
            case 'EVAL' :
                // 返回可执行的js脚本
                header('Content-Type:text/html; charset=utf-8');
                exit($data);            
            default     :
                // 用于扩展其他返回格式数据
                Hook::listen('ajax_return',$data);
        }
    }


    /**
    * 加密方法
    * md5(REQUEST参数值（升序排序，除key sign参数除外） + 用户密钥)
    * 接口必备参数：key(用户的key),sign(加密的签名串),timestamp (请求的时间，服务端对请求有时间生效)
    * 用户操作必备参数：userid,token (登录成功后返回)
    **/
    protected function _encrypt(){
        $querystring = $_SERVER['QUERY_STRING'];
        // $querystring = I('querystring');
        $p = explode('&',$querystring);
        foreach ($p as $v) {
            if(($p=='key') || ($p=='sign')) continue; 
            $temp = explode("=", $v);  
            $pArr[$temp[0]] = $temp[1];  
        }  
        ksort($pArr);  
        foreach ($pArr as $k => $v) {      
            $pStr2 .= $k . $v ;  
        }  
        return md5($pStr2 . $this->key);
    }
    public function success($data='',$msg=''){
        $this->ajaxReturn(array('status'=>1,'data'=>$data,'msg'=>$msg));
    }
    public function error($msg){
        $this->ajaxReturn(array('status'=>0,'msg'=>$msg));
    }
    /**
    * 生成用户登录后的密钥
    * @param userid
    * @param password
    **/
    protected function _getUserToken($userid,$password){
        if(!$userid || !$password) return false;
        return md5($userid.md5($password));
    }
    /**
    * 判断是否登录
    * @param userid
    * @param token
    **/
    protected function _isLogin($userid,$token){
        if(!$userid) return false;
        $password = D('Member/Member')->getFieldByUserid($userid,'password');
        if($this->_getUserToken($userid,$password)<>$token) return false;
        return true;
    }
    public function _404(){
        send_http_status(404);
        exit('Not Found!');
    }
    public function _301(){
        send_http_status(301);
        exit('No Privileges!');
    }






}




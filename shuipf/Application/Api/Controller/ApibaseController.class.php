<?php
namespace Api\Controller;
use Common\Controller\Base;

class ApibaseController extends Base {
    protected $userid=NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->isLogin();
    }
    protected function isLogin(){
        $this->userid = (int) service("Passport")->userid;
        return $this->userid;
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
     * 生成用户登录后的密钥
     * @param userid
     * @param password
     **/
    protected function _getUserToken($userid,$password){
        if(!$userid || !$password) return false;
        return md5($userid.md5($password));
    }

   
    public function success($data='',$msg='',$type='JSON'){
        $this->ajaxReturn(array('status'=>1,'data'=>$data,'msg'=>$msg),$type);
    }
    public function error($msg,$type="JSON"){
        $this->ajaxReturn(array('status'=>0,'msg'=>$msg),$type);
    }



}




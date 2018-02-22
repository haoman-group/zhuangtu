<?php
namespace Wap\Controller;
use Common\Controller\Base;

class WechatController extends Base {

    protected function _initialize() {
        parent::_initialize();
        
        $this->appId = 'wx3eba62463bb5352f';
        $this->appSecret = '1951d2bd30da4348a5e10215c4de3037';
    }

    public function login(){
      $redirect_uri = 'http://www.zhuangtu.net/Wap/Wechat/checkAuth/?ref='.urlencode($_GET['ref']).'&noreg='.$_GET['noreg'];
      $code_url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$this->appId&redirect_uri=".urlencode($redirect_uri)."&response_type=code&scope=snsapi_base&state=123#wechat_redirect"; // 获取code
      if($this->userid){ //已经登陆
        $ref=U('Wap/Index/index');
        header('Location:'.$ref);exit;  
      }else{      
          header("location:".$code_url);exit;
      }
    
  }
  

  public function checkAuth(){
    $ref = $_GET['ref'];
    if(empty($ref)){
      $ref=U('Wap/Index/index');
    }else{
      $ref = urldecode($ref);
    }
    if (isset($_GET['code'])){
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$this->appId&secret=$this->appSecret&code=".$_GET['code']."&grant_type=authorization_code";     
        $res =json_decode($this->httpGet($url), true);
        $this->openid = $res['openid'];         
        
        $_SESSION['openid']=$res['openid'];       
        $accessToken5 = $this->getAccessToken();          
        $url="https://api.weixin.qq.com/cgi-bin/user/info?access_token=$accessToken5&openid=".$res['openid']."&lang=zh_CN"; //获取用户信息            
        $res5=json_decode($this->httpGet($url), true);
        

      if(empty($res5['unionid'])){
        $res5['unionid'] = $res5['openid'];
      }

      $member_info = D('Member')->where(array('weixin_unionid'=>$res5['unionid']))->find();
      
      if(!empty($member_info)){
        if($res5['subscribe'] && !empty($res5['nickname']) && $res5['nickname']!=$member_info['member_name']){
          D('Member')->where(array('weixin_unionid'=> $res5['unionid']))->data(array('member_name'=> $res5['nickname']))->save();
        }

        $userid = service('Passport')->loginLocal(intval($member_info['userid']));

        header('Location:'.$ref);exit;  
      }else{  
        if(!$_GET['noreg']) $this->register($res5);
        header('Location:'.$ref);exit;
      }
      
    }else{
      header('Location:'.$ref);exit;
    }
  }
  private function register($user_info){
        $unionid = $user_info['unionid'];
        $nickname = $user_info['nickname'];
        if(!empty($unionid)) {
            $rand = rand(100, 899);
            if(empty($nickname))$nickname = 'zt_'.$rand;
            if(strlen($nickname) < 3) $nickname = $nickname.$rand;
            $username = $nickname;

            $member_info = D('Member')->where(array('username'=>$username))->find();
            
            $password = rand(100000, 999999);
            $member = array();
            $member['weixin_unionid'] = $unionid;
            $member['weixin_info'] = $user_info['weixin_info'];
      
            if(empty($member_info)) {
                $result = service('Passport')->userRegister($username,$password);
            } else {
                for ($i = 1;$i < 999;$i++) {
                    $rand += $i;
                    $username = $nickname.$rand;
                    $member_info = D('Member')->where(array('username'=>$username))->find();
                    if(empty($member_info)) {//查询为空表示当前会员名可用
                        $result = service('Passport')->userRegister($username,$password);
                        break;
                    }
                }
            }
            if(!$result) return false;

            $member['point'] = 0;
            $member['amount'] = 0;
            $member['checked'] = 1;
            $member['groupid'] = 7;
            $member['regdate'] = time();
            $member['lastdate'] = time();


            $headimgurl = $user_info['headimgurl'];//用户头像，最后一个数值代表正方形头像大小（有0、46、64、96、132数值可选，0代表640*640正方形头像）
            $headimgurl = substr($headimgurl, 0, -1).'132';
            $avatar = @copy($headimgurl,(service('Passport')->getAvatarPath($result)).$userid.'_180x180.jpg');
            $avatar = @copy($headimgurl,(service('Passport')->getAvatarPath($result)).$userid.'_90x90.jpg');
            $avatar = @copy($headimgurl,(service('Passport')->getAvatarPath($result)).$userid.'_45x45.jpg');
            $avatar = @copy($headimgurl,(service('Passport')->getAvatarPath($result)).$userid.'_30x30.jpg');

            $savePath = D('Attachment/Attachment')->getFilePath('Member', 'Y/m', time());
            $saveName = uniqid().'.jpg';

            @copy($headimgurl,$savePath.$saveName);
            $member['userpic'] = 'd/member/'.date('Y').'/'.date('m').'/'.$saveName;
            $member['reg_platform'] = 'wechat';

            D("Member")->where(array('userid'=>$result))->data($member)->save();
            service('Passport')->loginLocal(intval($result));
            return true;
        }
    }

  
  
  /**
     * 登录生成token
     */
    private function _get_token($member_id, $member_name, $client) {
        $model_mb_user_token = Model('mb_user_token');
        //生成新的token
        $mb_user_token_info = array();
        $token = md5($member_name . strval(TIMESTAMP) . strval(rand(0,999999)));
        $mb_user_token_info['member_id'] = $member_id;
        $mb_user_token_info['member_name'] = $member_name;
        $mb_user_token_info['token'] = $token;
        $mb_user_token_info['login_time'] = TIMESTAMP;
        $mb_user_token_info['client_type'] = $client;

        $result = $model_mb_user_token->addMbUserToken($mb_user_token_info);
        if($result) {
            return $token;
        } else {
            return null;
        }

    }
  


  //校验AccessToken 是否可用及返回新的
  private function getAccessToken() {

    $data = json_decode(file_get_contents("./access_token.json"));
    $check_token_url="https://api.weixin.qq.com/sns/auth?access_token=$data->access_token&openid=".$_SESSION['openid'];
    $check_res = json_decode($this->httpGet($check_token_url));    
    if ($data->expire_time < time() || $check_res->errcode>0) {
     $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret";
     $res = json_decode($this->httpGet($url));
     $access_token = $res->access_token;
     if ($access_token) {
       $data->expire_time = time() + 6500;
       $data->access_token = $access_token;
       $fp = fopen("./access_token.json", "w");
       fwrite($fp, json_encode($data));
       fclose($fp);
     }
    } else {
     $access_token = $data->access_token;
    }
    return $access_token;
  }

  public function httpGet($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);  
    $res = curl_exec($curl);
    curl_close($curl);  
    return $res;
  }
}




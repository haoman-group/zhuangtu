<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员收藏模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Member\Model;

use Common\Model\Model;

class RongcloudTokenModel extends Model {

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_auto = array(
        array('addtime','time',self::MODEL_INSERT,'function'),
        array('updatetime','time',self::MODEL_UPDATE,'function'),
    );

    protected $_validate = array(
        array('uid','require','缺少用户ID！'),
        array('token','require','需要token！'),
    );


    public function getToken($userid){
        //到数据库查找是否存在该uid的token记录
        $result = $this->where(array('uid'=>$userid))->find();
        if(!$result){

            $userpic = getavatar($userid);
            $username = D("Member/Member")->getFieldByUserid($userid,'username');

            //如果不存在,到融云API获取token
            $rognyun = new \Rongcloud(C('RONGYUN_APP_KEY'), C('RONGYUN_APP_SECRET'));
            $remotetoken = $rognyun->getToken($userid,$username,$userpic );
            if(empty($remotetoken)){

            }
            else{
                $data["uid"] = $userid;
                $remotetoken = json_decode($remotetoken,true);
                if($remotetoken["code"] != 200){
                    $result = false;
                }
                else{
                    $remotetoken = $remotetoken["token"];
                    $data["token"] = $remotetoken;
                    $data["status"] = 1;

                    $this->addToken($data);
                    $result = $remotetoken;
                }
            }
        }
        else{
            $result = $result["token"];
        }

        return $result;
    }



    /*新增token记录*/
    public function addToken($data){
        $this->create($data);
        return $this->add();
    }


}

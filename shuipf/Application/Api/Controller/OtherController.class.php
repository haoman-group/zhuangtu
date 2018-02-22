<?php

namespace Api\Controller;

use Common\Controller\Base;

class OtherController extends ApibaseController {

    protected function _initialize() {
        parent::_initialize();
    }

    public function upimg(){
        if($_FILES){
            $Attachment = service("Attachment", array('module' => 'Shop', 'catid' => 1, 'isadmin' =>0, 'userid' => $this->userid));
            //缩略图宽度
            // $thumb_width = 1000;
            // $thumb_height = 1000;
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
                    
                    $this->success($picture);
                } else {
                    $this->error('图片上传失败');
                }
            } else {
                $this->error($Attachment->getErrorMsg());
            }
        }else{  
            $this->error('无图片');
        }
    }
    
    /**
    * Feedback 
    * APP问题反馈接口
    *
    * @access public
    * @param mixed $types  问题分类
    * @param mixed $content 问题描述
    * @since 1.0
    * @return success
    * @auther libing
    */
    public function Feedback(){
        $data = I('request.');
        if(empty($data) || empty($data['content'])||empty($data['userid'])){
            return $this->ajaxReturn(array('status'=>-1,'msg'=>'请填写内容'));	
        }
        $client_request_info = array();
        $client_request_info['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
        $client_request_info['SERVERHTTP_USER_AGENT_ADDR'] = $_SERVER['HTTP_USER_AGENT'];
        $data['client_request_info'] = json_encode($client_request_info);
        $data['addtime'] = time();
        // var_dump($data);
        M('Feedback')->data($data)->add();
        return $this->ajaxReturn(array('status'=>1,'msg'=>'反馈信息已成功记录'));
    }
}

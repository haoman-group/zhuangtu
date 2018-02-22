<?php

namespace Admin\Controller;

use Common\Controller\AdminBase;

class AuditqualificationController extends AdminBase {

    protected $model = NULL;
    protected $shopModel = NULL;
    protected $shopCateModel = NULL;
    protected $logModel = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->model = M('AuditQualification');
        $this->shopModel = M('Shop');
        $this->shopCateModel = M('ShopCategory');
        $this->logModel = M('AuditQualificationLog');
        $this->assign('status',array(-1=>'被拒绝',1=>'审核通过'));
    }

    public function index(){
        $where = array('isdelete'=>0);
        $search = I("get.search", null);
        if ($search) {
            //注册时间段
            $start_time = I('start_time','');
            $end_time = I('end_time',date('Y-m-d', time()));
            //开始时间
            $where_start_time = strtotime($start_time) ? strtotime($start_time) : 0;
            //结束时间
            $where_end_time = strtotime($end_time) ? (strtotime($end_time) + 86400) : 0;
            //开始时间大于结束时间，置换变量
            if ($where_start_time > $where_end_time) {
                $tmp = $where_start_time;
                $where_start_time = $where_end_time;
                $where_end_time = $tmp;
                $tmptime = $start_time;
                $start_time = $end_time;
                $end_time = $tmptime;
                unset($tmp, $tmptime);
            }
            //时间范围
            if ($where_start_time) {
                $uid = D('Member/Member')->where(array('regdate'=>array('between', array($where_start_time, $where_end_time))))->getField('userid',true);
                if(!empty($uid)){
                    $where['uid'] = array('IN',$uid);
                }else{
                    $where['uid'] = '';
                }
            }
            // var_dump(I('get.'));
            //状态
            if(I('get.status') !== 0 & I('get.status') !== '-请选择-'){
                $where['status'] = I('get.status', 0, 'intval');   
            }else if(I('get.status') === 0){
                $where['status'] = 0;
            }
            //关键字
            $keyword = I('get.keyword');
            if ($keyword) {
                $type = I('get.type', 0, 'intval');
                switch ($type) {
                    case 1:
                        $name_uid = D("Member/Member")->where(array('username'=>array('LIKE','%'.$keyword.'%')))->getField('userid',true);
                        if(!empty($name_uid)){
                            $where['uid'] = array("IN",$name_uid); 
                        }else{
                            $where['uid'] = ''; 
                        }
                        break;
                    case 2:
                        $where['truename'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 3:
                        $truename_uid = D("Member/Member")->where(array('mobile'=>array('LIKE','%'.$keyword.'%')))->getField('userid',true);
                        if(!empty($truename_uid)){
                            $where['uid'] = array("IN",$truename_uid);
                        }else{
                            $where['uid'] = ''; 
                        }
                        break;
                    case 4:
                        $where['uid'] = array("EQ", $keyword);
                        break;
                    // case 5:
                    //     $where['nickname'] = array("LIKE", '%' . $keyword . '%');
                    //     break;
                    default:
                        $where['username'] = array("LIKE", '%' . $keyword . '%');
                        break;
                }
            }
        }
        $count = $this->model->where($where)->order('id desc')->count();
        $page = $this->page($count, 20);
        $data = $this->model->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('id desc')->select();
        foreach($data as $k=>$v){
            $shop = $this->shopModel->where(array('uid'=>$v['uid']))->find();
            $data[$k]['category'] = $this->shopCateModel->find($shop['catid']);
            $data[$k]['user'] = D("Member/Member")->where(array('userid'=>$v['uid']))->find();
        }
        $this->assign('Page',$page->show());
        $this->assign('data',$data);
        $this->display();
    }
    public function show(){
        $id = I('id',0);
        $data = $this->model->where(array('id'=>$id))->find();
        if(!$data) $this->error("页面不存在");
        $data['user'] = D('Member/Member')->getUserData($data['uid']);
        $data['business_licence_picture'] = unserialize($data['business_licence_picture']);
        $data['corporation_picture'] = unserialize($data['corporation_picture']);
        $data['corporation_idcard_picture'] = unserialize($data['corporation_idcard_picture']);
        $data['agent_authorize_picture'] = unserialize($data['agent_authorize_picture']);
        $data['shop_picture'] = unserialize($data['shop_picture']);
        $data['realname_picture'] = unserialize($data['realname_picture']);
        $log = $this->logModel->where(array('uid'=>$data['uid']))->select();
        $this->assign('data',$data);
        $this->assign('log',$log);
        if($data['user']['type'] == 1){
            $this->display('show_personal');  
        }
        elseif($data['user']['type'] == 2){
            $this->display('show_company');      
        }
        else{
            $this->error("错误的资质类型");
        }
        
    }
    /**
    * @name 审核状态
    **/
    public function status(){
        $id = I('id',0);
        $data = $this->model->where(array('id'=>$id))->find();
        if(!$data) $this->error("页面不存在");
        if(IS_POST){
            $status = I('status');
            if($status==1){
                $audit = array(
                    'status'=>1,
                    'adminid'=>$this->adminid,
                    'audittime'=>time(),
                    'message'=>$reason,
                );
                $re = $this->model->where(array('id'=>$id))->data($audit)->save();
                if(!$re) $this->error('提交失败');
                D('Member/Member')->where(array('userid'=>$data['uid']))->setField('audit_qualification',1);
                D('Member/Member')->where(array('userid'=>$data['uid']))->setField('step',7);
            }elseif($status==-1){
                $reason = implode('|',I('reason'));
                $audit = array(
                    'status'=>-1,
                    'adminid'=>$this->adminid,
                    'audittime'=>time(),
                    'message'=>$reason,
                );
                $re = $this->model->where(array('id'=>$id))->data($audit)->save();
                if(!$re) $this->error('提交失败');
                $log = array(
                    'snapshot'=>serialize($data),
                    'uid'=>$data['uid'],
                    'username'=>$data['username'],
                    'reason'=>$reason,
                    'addtime'=>time(),
                    'adminid'=>$this->adminid,
                    'status'=>-1,
                );
                $this->logModel->data($log)->add();
                D('Member/Member')->where(array('userid'=>$data['uid']))->setField('step',7);
            }
            $this->success('提交成功',U('index'));
        }else{           
            $this->assign('status',array(-1=>'交易失败',0=>'待交易',1=>'交易成功',2=>'认证成功'));
            $this->assign('data',$data);
            $this->display();  

        }
    }
    /**
    * @name 银行卡信息删除
    **/
    public function bank_delete() {
        $id = I("get.id", 0, "intval");
        if (!$id) {
            $this->error("请指定需要删除的项目！");
        }
        $re = $this->model->find($id);
        if(!$re) $this->error("不存在");
        if (false == $this->model->where(array('id'=>$id))->setField('isdelete',1)) {
            $this->error("删除失败");
        }
        $this->success("删除成功！");
    }
     /**
     *添加资质
     **/
     public function add(){
        if(IS_POST){
            $type = I('post.type');
            $uid = I('request.uid');
            $type = ($type==0)?I('type'):$type;
            $data = array();
            $data['type'] = $type;
            if($type==2){//企业认证
                ($data['company_name'] = I('company_name')) || $this->error('公司名字参数不完整');
                ($data['business_licence_number'] = I('business_licence_number')) || $this->error('参数不完整');
                ($data['business_licence_validity'] = I('business_licence_validity')) || $this->error('参数不完整');
                $data['business_licence_validity'] = implode('至',$data['business_licence_validity']);
                ($data['business_scope'] = I('business_scope')) || $this->error('参数不完整');
                ($data['agent_brand'] = I('agent_brand')) || $this->error('参数不完整');
                ($data['business_licence_picture'] = I('business_licence_picture')) || $this->error('参数不完整');
                $data['business_licence_picture'] = serialize($data['business_licence_picture']);
                ($data['corporation_picture'] = I('corporation_picture')) || $this->error('参数不完整');
                $data['corporation_picture'] = serialize($data['corporation_picture']);
                ($data['corporation_idcard_picture'] = I('corporation_idcard_picture')) || $this->error('参数不完整');
                $data['corporation_idcard_picture'] = serialize($data['corporation_idcard_picture']);
                ($data['corporation_phone'] = I('corporation_phone')) || $this->error('参数不完整');
                ($data['agent_brand_name'] = I('agent_brand_name')) || $this->error('参数不完整');
                ($data['agent_level'] = I('agent_level')) || $this->error('参数不完整');
                ($data['agent_start_date'] = I('agent_start_date')) || $this->error('参数不完整');
                ($data['agent_end_date'] = I('agent_end_date')) || $this->error('参数不完整');
                ($data['agent_authorize_picture'] = I('agent_authorize_picture')) || $this->error('参数不完整');
                $data['agent_authorize_picture'] = serialize($data['agent_authorize_picture']);
                ($data['has_shop'] = I('has_shop')) ;
                if($data['has_shop']){
                    ($data['shop_name'] = I('shop_name')) || $this->error('参数不完整');
                    ($data['shop_address'] = I('shop_address')) || $this->error('参数不完整');
                    ($data['shop_area'] = I('shop_area')) || $this->error('参数不完整');
                    ($data['shop_phone'] = I('shop_phone')) || $this->error('参数不完整');
                    ($data['shop_picture'] = I('shop_picture')) || $this->error('参数不完整');
                    $data['shop_picture'] = serialize($data['shop_picture']);
                }
            }elseif($type==1){
                 //个人认证
                ($data['truename'] = I('truename')) || $this->error('真实姓名不能为空');
                ($data['sex'] = I('sex')) || $this->error('性别不能为空');
                ($data['age'] = I('age')) || $this->error('年龄不能为空');
                ($data['idcard'] = I('idcard')) || $this->error('证件号码不能为空');
                ($data['idcard_address'] = I('idcard_address')) || $this->error('所在地信息不完整');
                ($data['phone'] = I('phone')) || $this->error('联络方式参数不完整');
                ($data['address'] = I('address')) || $this->error('联络地址参数不完整');
                ($data['emergency_contactor'] = I('emergency_contactor')) || $this->error('紧急联络人参数不完整');
                ($data['emergency_phone'] = I('emergency_phone')) || $this->error('紧急联络人联系方式参数不完整');
                ($data['emergency_address'] = I('emergency_address')) || $this->error('紧急联络人地址参数不完整');
                ($data['realname_picture'] = I('realname_picture')) || $this->error('实名认证图片参数不完整');
                $data['realname_picture'] = serialize($data['realname_picture']);
            }else{
                $this->error('错误的资质类型！');
            }
            $data['status'] = 0;
            //$re = D('Member/Member')->updateData($this->userid,$data);
            $audit = M('AuditQualification')->where(array('uid'=>$uid))->find();
            if($audit){
              $re =  M('AuditQualification')->where(array('uid'=>$uid))->data($data)->save();
            }else{
                $data['addtime'] = time();
                $data['uid'] = $uid;
                $data['username'] = $this->username;
                $re = M('AuditQualification')->data($data)->add();
            }
            if(!$re) $this->error('提交失败');
            if($this->userinfo['type']==0){
                D('Member/Member')->where(array('userid'=>$this->userid))->setField('type',$type);
            }
            D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',6);
            redirect(U('Member/Member/index'));
        }else{
            $uid = I('request.uid');
            $userData = M('MemberData')->find($uid);
            $userInfo = D('Member/Member')->find($uid);
            $audit = M('AuditQualification')->where(array('uid'=>$uid))->find();
            $shop = M('Shop')->where(array('uid'=> $uid))->find();
            $shopcate = M('ShopCategory')->where(array('id'=>$shop['id']))->find();
            $this->assign('userinfo',$userInfo);
            $this->assign('userData',$userData);
            $this->assign('shopcate',$shopcate);
            if($audit){
                $this->assign('audit',$audit);   
            }
            $this->display();
        }
    }

}

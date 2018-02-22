<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员组管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Member\Controller;

use Common\Controller\AdminBase;

class MemberController extends AdminBase {

    //会员用户组缓存
    protected $groupCache = array();
    //会员模型
    protected $groupsModel = array();
    //会员数据模型
    protected $member = NULL;
    //注册状态
    protected $steps_array = array('1'=>'1-注册手机号','2'=>"2-绑定银行卡",'8'=>'8-正常','92'=>'92-补充绑定银行卡');
    //初始化
    protected function _initialize() {
        parent::_initialize();
        $this->groupCache = cache("Member_group");
        $this->groupsModel = cache("Model_Member");
        $this->member = D('Member/Member');
    }

    //会员管理首页
    public function index() {
        $search = I("get.search", null);
        $where = array(
            'checked' => 1,
        );
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
                $where['regdate'] = array('between', array($where_start_time, $where_end_time));
            }
            //状态
            $status = I('get.status', 0, 'intval');
            if ($status > 0) {
                $islock = $status == 1 ? 1 : 0;
                $where['islock'] = array("EQ", $islock);
            }
            //会员模型
            $modelid = I('get.modelid', 0, 'intval');
            if ($modelid > 0) {
                $where['modelid'] = array("EQ", $modelid);
            }
            //会员组
            $groupid = I('get.groupid', 0, 'intval');
            if ($groupid > 0) {
                $where['groupid'] = array("EQ", $groupid);
            }
            //关键字
            $keyword = I('get.keyword');
            if ($keyword) {
                $type = I('get.type', 0, 'intval');
                switch ($type) {
                    case 1:
                        $where['username'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 2:
                        $where['userid'] = array("EQ", $keyword);
                        break;
                    case 3:
                        $where['email'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 4:
                        $where['regip'] = array("EQ", $keyword);
                        break;
                    case 5:
                        $where['nickname'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 6:
                        $where['mobile'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    default:
                        $where['username'] = array("LIKE", '%' . $keyword . '%');
                        break;
                }
            }
        }
        $count = $this->member->where($where)->count();
        $page = $this->page($count, 20);
        $data = $this->member->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("userid" => "DESC"))->select();
        //判断该用户是否已有资质信息
        foreach($data as $r => $d){
            $data[$r]['hasqualification'] = M('AuditQualification')->where(array('uid'=>$d['userid']))->find()?1:0;
        }
        foreach ($this->groupCache as $g) {
            $groupCache[$g['groupid']] = $g['name'];
        }
        foreach ($this->groupsModel as $m) {
            $groupsModel[$m['modelid']] = $m['name'];
        }
        $this->assign('groupCache', $groupCache);
        $this->assign('groupsModel', $groupsModel);
        $this->assign("Page", $page->show('Admin'));
        $this->assign("data", $data);
        $this->display();
    }

    //添加会员
    public function add() {
        if (IS_POST) {
            $post = I('post.');
            $info = $this->member->token(false)->create($post);
            if ($info) {
                //vip过期时间
                $info['overduedate'] = strtotime($post['overduedate']);
                $userid = service("Passport")->userRegister($info['username'], $info['password'], $info['mobile']);
                if ($userid > 0) {
                    $memberinfo = service("Passport")->getLocalUser((int) $userid);
                    $info['username'] = $memberinfo['username'];
                    $info['password'] = $memberinfo['password'];
                    $info['email'] = $memberinfo['email'];
                    if (false !== $this->member->where(array('userid' => $memberinfo['userid']))->save($info)) {
                        $this->success("添加会员成功！", U("Member/index"));
                    } else {
                        service("Passport")->userDelete($memberinfo['userid']);
                        $this->error("添加会员失败！");
                    }
                } else {
                    $this->error($this->member->getErrorMsg($userid));
                }
            } else {
                $this->error($this->member->getError());
            }
        } else {
            foreach ($this->groupCache as $g) {
                if (in_array($g['groupid'], array(8, 1, 7))) {
                    continue;
                }
                $groupCache[$g['groupid']] = $g['name'];
            }
            foreach ($this->groupsModel as $m) {
                $groupsModel[$m['modelid']] = $m['name'];
            }
            $this->assign('groupCache', $groupCache);
            $this->assign('groupsModel', $groupsModel);
            $this->display();
        }
    }

    //修改会员 
    public function edit() {
        if (IS_POST) {//确认修改
            $userid = I('post.userid', 0, 'intval');
            $post = I('post.');
            $info = I('post.info');
            $modelid = I('post.modelid', 0, 'intval');
            $data = $this->member->create($post);
            if ($data) {
                $data['overduedate'] = strtotime($data['overduedate']);
                //获取用户信息
                $userinfo = service("Passport")->getLocalUser($userid);
                if (empty($userinfo)) {
                    $this->error('该会员不存在！');
                }
                $ContentModel = \Content\Model\ContentModel::getInstance($modelid);
                if ($userinfo['modelid'] == $modelid && $info) {
                    //详细信息验证
                    $content_input = new \content_input($modelid);
                    $inputinfo = $content_input->get($info, 2);
                    if ($inputinfo) {
                        //数据验证
                        $inputinfo = $ContentModel->token(false)->create($inputinfo, 2);
                        if (false == $inputinfo) {
                            $ContentModel->tokenRecovery($post);
                            $this->error($ContentModel->getError());
                        }
                    } else {
                        $ContentModel->tokenRecovery($post);
                        $this->error($content_input->getError());
                    }
                    //检查详细信息是否已经添加过
                    if ($ContentModel->where(array("userid" => $userid))->find()) {
                        $ContentModel->where(array("userid" => $userid))->save($inputinfo);
                    } else {
                        $inputinfo['userid'] = $userid;
                        $ContentModel->add($inputinfo);
                    }
                }
                //判断是否需要删除头像
                if (I('post.delavatar')) {
                    service("Passport")->userDeleteAvatar($userinfo['userid']);
                }
                //修改基本资料
                if ($userinfo['username'] != $data['username'] || !empty($data['password']) || $userinfo['email'] != $data['email']) {
                    $edit = service("Passport")->userEdit($data['username'], '', $data['password'], $data['email'], 1);
                    if ($edit < 0) {
                        $this->error($this->member->getError($edit));
                    }
                }
                unset($data['username'], $data['password'], $data['email']);
                //更新除基本资料外的其他信息
                if (false === $this->member->where(array('userid' => $userid))->save($data)) {
                    $this->error('更新失败！');
                }
                $this->success("更新成功！", U("Member/index"));
            } else {
                $this->error($this->member->getError());
            }
        } else {//显示内容
            $userid = I('get.userid', 0, 'intval');
            $modelid = I('get.modelid', 0, 'intval');
            //主表
            $data = $this->member->where(array("userid" => $userid))->find();
            if (empty($data)) {
                $this->error("该会员不存在！");
            }
            if ($modelid) {
                if (!$this->groupsModel[$modelid]) {
                    $this->error("该模型不存在！");
                }
            } else {
                $modelid = $data['modelid'];
            }
            //$modelid=1;
            //在这儿因为$modelid为0，所以获取不到$tablename，需要进行修改
            //可添加的判断 (f)
            if(!$modelid){
                $this->error("该模型不存在！");
            }
            // (/f)
            //会员模型数据表名
            $tablename = $this->groupsModel[$modelid]['tablename'];
            //相应会员模型数据
            $modeldata = M(ucwords($tablename))->where(array("userid" => $userid))->find();
            if (!is_array($modeldata)) {
                $modeldata = array();
            }
            $data = array_merge($data, $modeldata);
            $content_form = new \content_form($modelid);
            $data['modelid'] = $modelid;
            //字段内容
            $forminfos = $content_form->get($data);
            //js提示
            $formValidator = $content_form->formValidator;

            foreach ($this->groupCache as $g) {
                if (in_array($g['groupid'], array(8, 1, 7))) {
                    continue;
                }
                $groupCache[$g['groupid']] = $g['name'];
            }
            foreach ($this->groupsModel as $m) {
                $groupsModel[$m['modelid']] = $m['name'];
            }
             // 获取银行卡信息
            $member_data = D('MemberData')->where(array("userid" => $userid))->find();
            $this->assign('member_data', $member_data);
            $this->assign('groupCache', $groupCache);
            $this->assign('groupsModel', $groupsModel);
            $this->assign("forminfos", $forminfos);
            $this->assign("formValidator", $formValidator);
            $this->assign("data", $data);
            $this->display();
        }
    }

    //删除会员
    public function delete() {
        if (IS_POST) {
            $userid = I('post.userid');
            if (!$userid) {
                $this->error("请选择需要删除的会员！");
            }
            $connect = M("Connect");
            foreach ($userid as $uid) {
                $info = $this->member->where(array("userid" => $uid))->find();
                if (!empty($info)) {
                    //删除会员信息，且删除投稿相关
                    if (service("Passport")->userDelete($uid)) {
                        $connect->where(array("uid" => $uid))->delete();
                    }
                }
            }
            $this->success("删除成功！");
        }
    }

    //锁定会员 
    public function lock() {
        if (IS_POST) {
            $userid = I('post.userid');
            if (!$userid) {
                $this->error("请选择需要锁定的会员！");
            }
            $this->member->where(array("userid" => array('IN', $userid)))->save(array("islock" => 1));
            $this->success("锁定成功！");
        }
    }

    //解除锁定会员 
    public function unlock() {
        if (IS_POST) {
            $userid = I('post.userid');
            if (!$userid) {
                $this->error("请选择需要解锁的会员！");
            }
            $this->member->where(array("userid" => array('IN', $userid)))->save(array("islock" => 0));
            $this->success("解锁成功！");
        }
    }
//    //会员资料查看 ,点击放大镜显示详细信息  (old)
//    public function memberinfo() {
//        $userid = I('get.userid', 0, 'intval');
//        //主表
//        $data = $this->member->where(array("userid" => $userid))->find();
//        if (empty($data)) {
//            $this->error("该会员不存在！");
//        }
//        $modelid = $data['modelid'];//获取用户模型，这里需要进行一次判空操作，否则会出现错误
//        //相应会员模型数据
//        $modeldata = \Content\Model\ContentModel::getInstance($modelid)->where(array("userid" => $userid))->find();
//        $content_output = new \content_output($modelid);
//        $output_data = $content_output->get($modeldata);
//        $modelField = cache('ModelField');
//        $Model_field = $modelField[$modelid];
//        foreach ($this->groupCache as $g) {
//            $groupCache[$g['groupid']] = $g['name'];
//        }
//        foreach ($this->groupsModel as $m) {
//            $groupsModel[$m['modelid']] = $m['name'];
//        }
//        $this->assign('groupCache', $groupCache);
//        $this->assign('groupsModel', $groupsModel);
//        $this->assign("output_data", $output_data);
//        $this->assign("Model_field", $Model_field);
//        $this->assign($data);
//        $this->display();
//    }

    //会员资料查看 ,点击放大镜显示详细信息 （f）
    public function memberinfo() {
        $userid = I('get.userid', 0, 'intval');
        //主表
        $data = $this->member->where(array("userid" => $userid))->find();
        if (empty($data)) {
            $this->error("该会员不存在！");
        }
        $modelid = $data['modelid'];//获取用户模型，这里需要进行一次判空操作，否则会出现错误
        if(!empty($modelid)){
            //相应会员模型数据
            $modeldata = \Content\Model\ContentModel::getInstance($modelid)->where(array("userid" => $userid))->find();
            $content_output = new \content_output($modelid);
            $output_data = $content_output->get($modeldata);
            $modelField = cache('ModelField');
            $Model_field = $modelField[$modelid];

            $this->assign("output_data", $output_data);
            $this->assign("Model_field", $Model_field);

        }
        foreach ($this->groupCache as $g) {
            $groupCache[$g['groupid']] = $g['name'];
        }
        foreach ($this->groupsModel as $m) {
            $groupsModel[$m['modelid']] = $m['name'];
        }
        // 获取银行卡信息
        $member_data = D('MemberData')->where(array("userid" => $userid))->find();
        $this->assign('member_data', $member_data);
        $this->assign('groupCache', $groupCache);
        $this->assign('groupsModel', $groupsModel);
        $this->assign($data);
        $this->display();
    }

    //审核会员 
    public function userverify() {
        if (IS_POST) {
            $userid = $_POST['userid'];
            if (!$userid) {
                $this->error("请选择需要审核的会员！");
            }
            $this->member->where(array("userid" => array('IN', $userid)))->save(array("checked" => 1));
            $this->success("审核成功！");
        } else {
            $where = array();
            $search = I("get.search", null);
            $where['checked'] = array("EQ", 0);
            if ($search) {
                //注册时间段
                $start_time = isset($_GET['start_time']) ? $_GET['start_time'] : '';
                $end_time = isset($_GET['end_time']) ? $_GET['end_time'] : date('Y-m-d', time());
                //开始时间
                $where_start_time = strtotime($start_time) ? strtotime($start_time) : 0;
                //结束时间
                $where_end_time = strtotime($end_time) + 86400;
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
                $where['regdate'] = array('between', array($where_start_time, $where_end_time));
                //会员模型
                $modelid = I('get.modelid', 0, 'intval');
                if ($modelid > 0) {
                    $where['modelid'] = array("EQ", $modelid);
                }
                //会员组
                $groupid = I('get.groupid', 0, 'intval');
                if ($groupid > 0) {
                    $where['groupid'] = array("EQ", $groupid);
                }
                //关键字
                $keyword = I('get.keyword');
                if ($keyword) {
                    $type = I('get.type', 0, 'intval');
                    switch ($type) {
                        case 1:
                            $where['username'] = array("LIKE", '%' . $keyword . '%');
                            break;
                        case 2:
                            $where['userid'] = array("EQ", $keyword);
                            break;
                        case 3:
                            $where['email'] = array("LIKE", '%' . $keyword . '%');
                            break;
                        case 4:
                            $where['regip'] = array("EQ", $keyword);
                            break;
                        case 5:
                            $where['nickname'] = array("LIKE", '%' . $keyword . '%');
                            break;
                        default:
                            $where['username'] = array("LIKE", '%' . $keyword . '%');
                            break;
                    }
                }
            }

            $count = $this->member->where($where)->count();
            $page = $this->page($count, 20);
            $data = $this->member->where($where)->limit($page->firstRow . ',' . $page->listRows)->order(array("userid" => "DESC"))->select();
            foreach ($this->groupCache as $g) {
                $groupCache[$g['groupid']] = $g['name'];
            }
            foreach ($this->groupsModel as $m) {
                $groupsModel[$m['modelid']] = $m['name'];
            }
            $this->assign('groupCache', $groupCache);
            $this->assign('groupsModel', $groupsModel);
            $this->assign("Page", $page->show('Admin'));
            $this->assign("data", $data);
            $this->display();
        }
    }

    //用户授权管理
    public function connect() {
        $db = D("Member/Connect");
        if (IS_POST) {
            //批量删除
            $connectid = I('post.connectid');
            if ($db->connectDel($connectid)) {
                $this->success("操作成功！");
            } else {
                $this->error($db->getError());
            }
        } else {
            $connectid = I('get.connectid', 0, 'intval');
            if ($connectid) {
                //单个删除
                if ($db->connectDel($connectid)) {
                    $this->success("取消绑定成功！");
                } else {
                    $this->error($db->getError());
                }
            } else {
                $count = $db->count();
                $page = $this->page($count, 20);
                $data = $db->limit($page->firstRow . ',' . $page->listRows)->order(array('connectid' => 'DESC'))->select();
                foreach ($data as $k => $r) {
                    $data[$k]['username'] = $this->member->where(array("userid" => $r['uid']))->getField("username");
                    $data[$k]['userid'] = $r['uid'];
                }
                $this->assign("Page", $page->show('Admin'));
                $this->assign("data", $data);
                $this->display();
            }
        }
    }
    //更新重要信息
    public function advancedEdit(){
        if(IS_POST){
            $data = array();
            $data['username'] = I('post.username');
            $data['mobile'] = I('post.mobile');
            $data['step'] = I('post.step');
            $userid = I('post.userid', 0, 'intval');
            //
            if(empty($data['username']) ||empty($data['mobile'])){
                $this->error("用户名和手机号都不能为空");
            }
            if(!checkMobile($data['mobile'])){
                $this->error("错误的手机号");
            }
            if(!in_array($data['step'],array("1","2","3","4","5","6","7","8","92","93","94")) ){
                $this->error("错误的注册状态");
            }
            $userinfo = service("Passport")->getLocalUser($userid);
            if($userinfo['username'] == $data['username']){
                unset($data['username']);
            }elseif(!$this->member->checkName($data['username'])){
                $this->error("用户名已经存在或不合法！");   
            }
            $this->member->where(array('userid'=>$userid))->save($data);
            $member_data = array();
            $member_data['truename'] = I('post.truename');
            $member_data['bank_card_number'] = I('post.bank_card_number');
            $member_data['idcard'] = I('post.idcard');
            D('MemberData')->where(array('userid'=>$userid))->save($member_data);
            $this->success('更新成功!');
        }else{
            $userid = I("get.userid");
            $data = $this->member->where(array("userid" => $userid))->find();
            // 获取银行卡信息
            $member_data = D('MemberData')->where(array("userid" => $userid))->find();
            $this->assign('member_data', $member_data);
            $this->assign('data',$data);
            $this->display();
        }
    }
}

<?php
// +----------------------------------------------------------------------
// | 宝贝管理--工人类
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Admin\Controller;
use Common\Controller\AdminBase;
use League\Csv\Writer;
use League\Csv\Reader;
use PDO;
use SplTempFileObject;

class PosManageController extends AdminBase {
    /**
    * @name 上传宝贝
    **/
    private $posmodel = NULL;
    //会员用户组缓存
    protected $groupCache = array();
    //会员模型
    protected $groupsModel = array();
    //会员数据模型
    protected $member = NULL;
    //商户类型
    protected $ptypes = array("店面"=>"店面","个人"=>"个人");
    //付款类型
    protected $ppayments = array("现金"=>"现金","微信"=>"微信","支付宝"=>"支付宝");
    protected function _initialize(){
        parent::_initialize();
        $this->assign("ptypes",$this->ptypes);
        $this->assign("ppayments",$this->ppayments);
        $this->groupCache = cache("Member_group");
        $this->groupsModel = cache("Model_Member");
        $this->member = D('Member/Member');
        $this->posmodel = D('Admin/PosManage');
    }
    public function addlist(){
        $search = I("get.search", null);
        $where = array(
            'checked' => 1,
            'step'=>'8'
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
        $data = $this->member->where($where)->join("zt_pos_manage on zt_pos_manage.uid= zt_member.userid","left")->limit($page->firstRow . ',' . $page->listRows)->order(array("userid" => "DESC"))->select();
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
    //pos机信息详情页
    public function show(){
        $uid = I('userid');
        $data = $this->posmodel->getByUid($uid);
        $this->assign('userinfo',$this->getInfoByUid($uid));
        $this->assign('data',$data);
        $this->display();
    }
    //pos机信息添加页面
    public function add(){
        if(IS_POST){
            $data = I("post.");
            $this->posmodel->create($data);
            $this->posmodel->add();
            redirect('Admin/PosManage/addlist');
        }else{
            $uid = I('userid');
            $this->assign('userinfo',$this->getInfoByUid($uid));
            $this->display();
        }
    }
    //列表也
    public function lists(){
        $search = I("get.search", null);
        $where = array(
            // 'checked' => 1,
            // 'step'=>'8'
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
                    case 7:
                        $where['zt_pos_manage.pos_sn'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 8:
                        $where['zt_shop.name'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    default:
                        $where['username'] = array("LIKE", '%' . $keyword . '%');
                        break;
                }
            }
        }
        $count = $this->member->where($where)
                              ->join("zt_shop zs on zs.uid= zt_member.userid","left")
                              ->join("zt_member_data zmd on zmd.userid = zs.uid","left")
                              ->join("zt_pos_manage on zt_pos_manage.uid= zt_member.userid","right")->count();
        $page = $this->page($count, 20);
        $data = $this->member->where($where)
                              ->field('zt_pos_manage.pos_id,zt_member.userid,zt_member.username,zt_member.mobile,zs.id as shopid,zs.name,zt_pos_manage.pos_sn,zt_pos_manage.paddr,zt_pos_manage.addtime,zt_pos_manage.manager,zmd.truename,zmd.idcard,zmd.bank_card_number,zmd.bank')
                              ->join("zt_shop zs on zs.uid= zt_member.userid","left")
                              ->join("zt_member_data zmd on zmd.userid = zs.uid","left")
                              ->join("zt_pos_manage on zt_pos_manage.uid= zt_member.userid","right")
                              ->limit($page->firstRow . ',' . $page->listRows)
                              ->order(array("userid" => "DESC"))
                              ->select();
        $this->assign('groupCache', $groupCache);
        $this->assign('groupsModel', $groupsModel);
        $this->assign("Page", $page->show('Admin'));
        $this->assign("data", $data);
        $this->display();
    }
    //获取用户信息和店铺信息
    public function getInfoByUid($uid){
        if(empty($uid)){return false;}
        return M('Member')->join("zt_shop on zt_member.userid=zt_shop.uid","left")->where(array('userid'=>$uid))->find();
    }

    public function edit(){
        $pos_id=I('id');
        $posinfo=$this->posmodel->where(array('pos_id'=>$pos_id))->find();
        $userinfo=$this->getInfoByUid($posinfo['uid']);

        $this->assign('posinfo',$posinfo);  
        $this->assign('userinfo',$userinfo);
        $this->display('edit');

    }

    public function delete(){
        $id=I('id');
        if(empty($id)){
            $this->error('请选择');
        }else{
            $result=$this->posmodel->where(array('pos_id'=>$id))->delete();
           
            if($result){
                $this->success("删除成功");

            }else{
                $this->error("删除失败");
            }
        }
    }
    public function edited(){
        $pos_id=I("pos_id");
       empty(I('pos_sn'))?$this->error("请填写终端号"):$data['pos_sn']=I('pos_sn');
       empty(I('manager'))?$this->error("请填写经手人/安装"):$data['manager']=I("manager");
       empty(I('legal_person'))?$this->error("请填写法人"):$data['legal_person']=I("legal_person");
       empty(I('pmobile'))?$this->error("请填写电话"):$data['pmobile']=I("pmobile");
       empty(I('paddr'))?$this->error("请填写地址"):$data['paddr']=I("paddr");
       $data['ptype']=I("ptype");
       $data['ppayment']=I("ppayment");
       $update=$this->posmodel->where(array('pos_id'=>$pos_id))->save($data);
       if($update){
          redirect('Admin/PosManage/lists');

       }else{
        $this->error("修改失败");
       }
    }
    //导出POS数据临时方法
    //  private function import(){
    //      $excel = Reader::createFromPath('/home/libing/tmp/posAuditCSV.csv');
    //      $excel->setOffset(1);
    //      $result = $excel->fetch();
    //      try{
    //          foreach ($result as  $value) {
    //             //  dump($value);
    //              echo "[".$value[2]."]";
    //              $shopinfo = M('Shop')->where(array("name"=>trim($value[2])))->find();
    //              if(!$shopinfo){
    //                  echo ":店铺不存在<br>";
    //              }else{
    //                  $data = array();
    //                  $data['uid'] = $shopinfo['uid'];
    //                  //法人
    //                  $data['legal_person'] = $value[8];
    //                  //联系电话
    //                  $data['pmobile'] = $value[7];
    //                  //地址
    //                  $data['paddr'] = $value[5];
    //                  //终端号
    //                  $data['pos_sn'] =$value[11];
    //                  $this->posmodel->create($data);
    //                  $this->posmodel->add();
    //                 //  $data['']
    //                 echo "成功!<br>";
    //              }
    //          }
    //      }catch(Exception $e){
    //          echo $e->getMessage();
    //      }
    //  }
}
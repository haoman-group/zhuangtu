<?php

namespace Admin\Controller;
use Admin\Service\User;
use Common\Controller\AdminBase;
use League\Csv\Writer;
use League\Csv\Reader;
use PDO;
use SplTempFileObject;
class AuditbankController extends AdminBase {

    protected $auditBankModel = NULL;
    protected $auditQualificationModel = NULL;
    protected $userInfo = null;
    protected function _initialize() {
        parent::_initialize();
        $this->auditBankModel = M('AuditBank');
        $this->auditQualificationModel = M('auditQualification');
        $this->userInfo = User::getInstance()->getInfo();
    }

    public function index(){
        
        $where = self::_search();
        $where['isdelete'] = 0;
        $count = $this->auditBankModel->where($where)->order('id desc')->count();
        $page = $this->page($count, 20);
        $data = $this->auditBankModel->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('id desc')->select();
        // echo $this->auditBankModel->getLastSql();
        $this->assign('Page',$page->show());
        $this->assign('data',$data);
        $this->assign('status',array(-2=>'',-1=>'交易失败',0=>'未交易',1=>'交易成功',2=>'审核成功',5=>'被锁定'));
        $this->display();
    }
    /**
    * @name 银行卡打款，状态改变
    **/
    public function status(){
        $id = I('id',0);
        $data = $this->auditBankModel->where(array('id'=>$id))->find();
        if(!$data) $this->error("页面不存在");
        if(IS_POST){
            $data = array(
                'tradedate'=>I('post.tradedate'),
                'operator'=>I('post.operator'),
                'status'=>I('post.status'),
                'adminid'=>$this->adminid,
                'operatetime'=>time(),
            );
            $this->auditBankModel->where(array('id'=>$id))->data($data)->save();
            $this->success('提交成功',U('index'));
        }else{           
            $this->assign('userInfo', $this->userInfo);
            $this->assign('now',date("Y-m-d H:i"));
            $this->assign('status',array(-1=>'交易失败',0=>'待交易',1=>'交易成功'));
            $this->assign('data',$data);
            $this->display();  

        }
    }
    /**
    * @name 银行卡信息删除
    **/
    public function delete() {
        $id = I("get.id", 0, "intval");
        if (!$id) {
            $this->error("请指定需要删除的项目！");
        }
        $re = $this->auditBankModel->find($id);
        if(!$re) $this->error("不存在");
        if (false == $this->auditBankModel->where(array('id'=>$id))->setField('isdelete',1)) {
            $this->error("删除失败");
        }
        $this->success("删除成功！");
    }
    public function add(){

        if(IS_POST){
            $data = $_POST;
            $data['catpid'] = M('ProductCategory')->getFieldById($data['catid'],'pid');
            $data['picture'] = serialize($data['picture']);
            $data['addtime'] = time();
            $this->model->data($data)->add();
            $this->success('提交成功');
        }else{
            $cate = M('ProductCategory')->where(array('pid'=>0))->getField("id,name,pid");
            foreach ($cate as $k => $v) {
                $cate[$k]['son'] = M('ProductCategory')->where(array('pid'=>$k))->getField('id,name,pid');
            }
            $this->assign('cate',$cate);
            $this->display();    
        }
    }

    public function edit(){
        $id = I('id',0);
        $data = $this->model->where(array('id'=>$id))->find();
        if(!$data) $this->error("页面不存在");
        if(IS_POST){
            $data = $_POST;
            $data['catpid'] = M('ProductCategory')->getFieldById($data['catid'],'pid');
            $data['picture'] = serialize($data['picture']);
            $this->model->where(array('id'=>$id))->data($data)->save();
            $this->success('提交成功',U('index'));
        }else{
            $data['picture'] = unserialize(($data['picture']));

            $cate = M('ProductCategory')->where(array('pid'=>0))->getField("id,name,pid");
            foreach ($cate as $k => $v) {
                $cate[$k]['son'] = M('ProductCategory')->where(array('pid'=>$k))->getField('id,name,pid');
            }            $this->assign('cate',$cate);
            $this->assign('data',$data);
            $this->display();  

        }
    }
    private function _search(){
        $where = array();
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
            if($start_time){
                $where['from_unixtime(zt_audit_bank.addtime)'] = array(array('gt',$start_time),array('lt',$end_time));
            }
            //状态
            if(I('get.status') !== 0 & I('get.status') !== '--请选择--'){
                $where['zt_audit_bank.status'] = I('get.status', 0, 'intval');   
            }else if(I('get.status') === 0){
                $where['zt_audit_bank.status'] = 0;
            }
            //关键字
            $keyword = I('get.keyword');
            if ($keyword) {
                $type = I('get.type', 0, 'intval');
                switch ($type) {
                    case 1:
                        $where['zt_audit_bank.username'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 2:
                        $where['zt_audit_bank.truename'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 3:
                        $where['zt_audit_bank.mobile'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 4:
                        $where['zt_audit_bank.idcard'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 5:
                        $where['zt_audit_bank.bank_card_number'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 6:
                        $where['zt_audit_bank.operator'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    default:
                        $where['zt_audit_bank.username'] = array("LIKE", '%' . $keyword . '%');
                        break;
                }
            }
        }
        return $where;
    }
    // 数据导出
    public function export(){
        //获取查询条件
        $where = self::_search();
        $where['zt_audit_bank.isdelete'] = 0;
        //获取待执行的sql语句
        $sql = $this->auditBankModel->where($where)->join("zt_shop on zt_shop.uid = zt_audit_bank.uid",'LEFT')->order('zt_audit_bank.id desc')->field('zt_audit_bank.id,zt_audit_bank.bank,zt_audit_bank.bank_card_number,zt_audit_bank.truename,zt_audit_bank.money,zt_audit_bank.mobile,zt_shop.name,zt_audit_bank.username,zt_audit_bank.idcard,from_unixtime(zt_audit_bank.addtime),zt_audit_bank.status')->buildSql();
        try {
            //配置PDO模式的数据库链接
            $dbh = new PDO('mysql:dbname='.C('DB_NAME').';host='.C('DB_HOST'),C('DB_USER'),C('DB_PWD'));
            //修改字符集
            $dbh->exec("SET names utf8");
            //执行sql,获取结果集
            $sth =  $dbh->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();
        } catch (PDOException $e) {
            throw new PDOException("Error  : " .$e->getMessage());
        }
        //创建CSV对象
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        //设置字符集
        $csv->setEncodingFrom('GBK');
        //插入标题
        $csv->insertOne(['编号','银行名称','银行卡号', '银行户名','金额','手机号','店铺名称','用户名','身份证号','认证时间','状态']);
        //插入查询结果数据
        $csv->insertAll($sth);
        //客户端下载文件
        $csv->output(date("Y-m-d").'银行卡验证信息.csv');
        exit;
    }   
    //数据导入
    public function import(){
        if(IS_POST){
            $upload = new \UploadFile();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->allowExts      =     array('csv','jpg');// 设置附件上传类型
            // $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     '/tmp/'; // 设置附件上传（子）目录
            // 上传文件 
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getErrorMsg(),"javascript:history.back(-1);");
            }else{// 上传成功
                //获取上传文件的信息
                $uploadinfo = $upload->getUploadFileInfo();
                //配置PDO模式的数据库链接
                $dbh = new PDO('mysql:dbname='.C('DB_NAME').';host='.C('DB_HOST'),C('DB_USER'),C('DB_PWD'));
                //修改字符集
                $dbh->exec("SET names utf8");
                //执行sql,获取结果集
                // $sth = $dbh->prepare($sql);
                $csv = Reader::createFromPath($uploadinfo[0]['savepath'].$uploadinfo[0]['savename']);
                //跳过两行标题
                $csv->setOffset(2);
                $results = $csv->fetch();
                try{
                    foreach ($results as $index => $row) {
                        if($row[1] == ''){continue;}
                        if(chop($row[9]) != '成功'){continue;}
                        $sql = "update zt_audit_bank set status = '1' ,operator='".$this->userInfo['username']."' ,operatetime = unix_timestamp() ,tradedate='".date('Y-m-d')."', adminid='".$this->adminid."' 
                        where status='0' 
                          and bank ='晋城银行' 
                          and bank_card_number= ".$row[3]."
                          and truename= ".$row[5]."
                          and money = ".$row[8]."
                          order by id desc limit 1;";
                        // echo $row[3].$row[5].$row[8];
                        // $sth->bindParam(':bank_card_number', $row[3], PDO::PARAM_STR);
                        // $sth->bindParam(':truename', $row[5], PDO::PARAM_STR);
                        // $sth->bindParam(':money', $row[8], PDO::PARAM_INT);
                        $dbh->exec($sql);
                        // echo $sql;
                        // $sth->execute(array($row[3],$row[8]));
                        // $sth->debugDumpParams();
                    }
                    // $dbh->commit();
                }catch(PDOException $e) {
                     throw new PDOException("Error  : " .$e->getMessage());
                }
            }
            $this->redirect('index');
        }else{
            $this->display();
        }
    }
}

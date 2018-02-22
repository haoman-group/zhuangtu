<?php

namespace Admin\Controller;

use Common\Controller\AdminBase;
use League\Csv\Writer;
use PDO;
use SplTempFileObject;
class ActivityController extends AdminBase {
    protected $dataModel = NULL;
    protected $activityModel = NULL;
    protected $wechatModel = NULL;
    protected $status = array("-1"=>"禁用","0"=>"未启用","1"=>"启用中");
    protected $price_type = array("0"=>"未选","1"=>"价格组合");
    protected function _initialize() {
        parent::_initialize();
        $this->model = M('Position');
        $this->dataModel = D('Admin/ActivityData');
        $this->activityModel = D('Admin/Activity');
        $this->wechatModel = D('Admin/ActivityWechat');
        $this->assign('status',$this->status);
        $this->assign('types',$this->price_type);
    }
    //活动管理首页
    public function index(){
        $data = $this->activityModel->where(array('isdelete'=>"0"))->select();
        $this->assign('data',$data);
        $this->display();
    }
    //活动列表管理
    public function products(){
        $data = $this->activityModel->where(array('isdelete'=>"0"))->select();
        $this->assign('data', $data);
        $this->display();
    }
    //活动产品位列表
    public function lists(){
        $where = array();
        $act_id = I('act_id');
        if($act_id) $where['act_id'] = $act_id;
        $act_data = $this->activityModel->where(array('id'=>$act_id))->find();
        $result = $this->dataModel->where($where)->select();
        $data =array();
        foreach ($result as $key => $value) {
            # code...
            $data[$value['place']] = $value;
        }
        $this->assign('activity',$act_data);
        $this->assign('data', $data)->display();
    }
    //新增活动
    public function add() {
         //$num =M('PositionPage')->select();
        //$this->assign('num',$num);

        if(IS_POST){
            $type=I('package');
            $status=I('status');
            $description=I('activedescript');
            $title=I('activetitle');
            $maxnum=I('maxnum');
            $data=array(
             'type'=>$type,
             'status'=>$status,
              'description'=>$description,
              'title'=>$title,
               'addtime'=>time(),
                'updatetime'=>time(),
               'isdelete'=>0,
                'maxnum'=>$maxnum
            );

            $re = $this->activityModel->data($data)->add();
            if(!$re) $this->error('提交失败');
            $this->success('提交成功');
        }else{
            $this->display();
        }
    }
    public function edit(){
          $id = I('id');
         // $num =M('PositionPage')->select();
          //$this->assign('num',$num);
        $data = $this->activityModel->where(array('id'=>$id))->find();
        if(!$data) $this->error('数据不存在');
        if(IS_POST){
            $type=I('package');
            $status=I('status');
            $description=I('activedescript');
            $title=I('activetitle');
            $maxnum=I('maxnum');
            $data=array(
                'type'=>$type,
                'status'=>$status,
                'description'=>$description,
                'title'=>$title,
                'updatetime'=>time(),
                'isdelete'=>0,
                'maxnum'=>$maxnum
            );
            $re = $this->activityModel->where(array('id'=>$id))->data($data)->save();
            if(!$re) $this->error('提交失败');
            $this->error('提交成功');
        }else{
            $this->assign('data',$data);
            $this->display();
        }
    }

    public function delete(){
        $id=I('id');
        $re=$this->activityModel->where(array('id'=>$id))->setField('isdelete',1);
        if($re){
          $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }
    public function item(){
        $id = I('id','');
        if(IS_POST){
            $data = I('post.');
            $data['picture'] = implode(',',$data['picture_url']);
            $result = M('Product')->field("id,uid,title,sell_points,min_price,max_price,number,headpic,min_price_ori,max_price_ori")->where(array('id'=>$data['dataid']))->find();
            $data['data'] =serialize($result);
            if(!$this->dataModel->create($data)){
                $this->error('错误：'.$this->dataModel->getError());
            }else{
                if(!empty($id)){
                    $this->dataModel->save();
                    $this->success("修改成功!",U("Admin/Activity/lists",array("act_id"=>$data['act_id'])));
                }else{
                    $this->dataModel->add();
                    $this->success("添加成功!",U("Admin/Activity/lists",array("act_id"=>$data['act_id'])));
                }
            }
        }else{
            if(!empty($id)){
                $data = $this->dataModel->where(array('id'=>$id))->find();
                $this->assign("data",$data);
            }
            $this->display();
        }
        // $posid = I('posid');
        // $place = I('place');
        // $position = $this->model->where(array('posid'=>$posid))->find();
        // $data = $this->dataModel->where(array('posid'=>$posid,'place'=>$place))->order(array('listorder'=>'desc','id'=>'desc','starttime'=>"desc"))->select();
        // foreach($data as $k=>$v){
        //     if($v['starttime']>date("Y-m-d H:i:s")) $data[$k]['window_status'] = '即将开始';
        //     elseif($v['endtime']<date("Y-m-d H:i:s")) $data[$k]['window_status'] = '已结束';
        //     elseif(($v['starttime']<=date("Y-m-d H:i:s"))&&($v['endtime']>=date("Y-m-d H:i:s"))) $data[$k]['window_status'] = '<span style="color:red">进行中</span>';
        //     else $data[$k]['window_status'] = '------';
        // }
        // $this->assign('data',$data);        
        // $this->assign('position',$position);
        // $this->assign('place',$place);
    }
    public function item_add(){
        ($posid = I('posid',0)) || $this->error('推荐位不能为空');
        $place = I('place',0);
        $status=I('status',0);
        
        $position = $this->model->where(array('posid'=>$posid))->find();
        if(!$position) $this->error('推荐位不存在');
        if(IS_POST){

            $picture = implode(',',I('picture_url'));
            $post = array(
                'pageid'=>I('pageid'),
                'posid'=>$posid,
                'starttime'=>I('starttime'),
                'endtime'=>I('endtime'),
                'listorder'=>I('listorder',0),
                'title'=>I('title'),
                'description'=>I('description'),
                'picture'=>$picture,
                'url'=>$url,
                'place'=>$place,
                'dataid'=>I('dataid',0),
                'status'=>$status,
                'url'=>I('url')
            );
            
            if($position['model']){
                $dataid = I('dataid'); 

                if(!empty($dataid)){
                    $data = D($position['model'])->field($position['field'])->find($dataid);
                    if(!$data) $this->error('数据不存在',U("Admin/Position/item",array('posid'=>$posid,'place'=>$place)));
                    if(!$this->dataModel->checkProduct($dataid)){
                        $this->error('错误！当前推荐的宝贝已删除或者下架!',U("Admin/Position/item",array('posid'=>$posid,'place'=>$place)));
                    }
                    $post['data'] = serialize($data);
                }
            }
            $re = $this->dataModel->data($post)->add();
            if(!$re) $this->error('提交失败');
            $this->success('提交成功',U("Admin/Position/place",array('posid'=>$posid)));
        }else{
            $this->assign('place',$place);
            $this->assign('position',$position);
            $this->display();
        }
    }
    public function item_edit(){
         $status=I('status',0);

        ($id = I('id',0)) || $this->error('信息不能为空');
        $data = $this->dataModel->where(array('id'=>$id))->find();
        $posid = $data['posid'];
        if(!$data) $this->error('信息不存在');
        if(IS_POST){
            $position = $this->model->where(array('posid'=>$data['posid']))->find();
            $picture = implode(',',I('picture_url'));
            $post = array(
                'pageid'=>I('pageid'),
                'posid'=>$posid,
                'starttime'=>I('starttime'),
                'endtime'=>I('endtime'),
                'listorder'=>I('listorder',0),
                'title'=>I('title'),
                'description'=>I('description'),
                'picture'=>$picture,
                'url'=>$url,
                'place'=>$place,
                'dataid'=>I('dataid'),
                'status'=>$status,
                'url'=>I('url')
            );
            if($position['model']){
                $dataid = I('dataid');
                if(!empty($dataid)){
                    $data = D($position['model'])->field($position['field'])->find($dataid);
                    if(!$data) $this->error('数据不存在');
                    if(!$this->dataModel->checkProduct($dataid)){
                        $this->error('错误！当前推荐的宝贝已删除或者下架!',U("Admin/Position/item",array('posid'=>$posid,'place'=>$place)));
                    }
                    $post['data'] = serialize($data);
                }
                // $data = D($position['model'])->field($position['field'])->find();
                // if(!$data) $this->error('数据不存在');
                // $post['data'] = serialize($data);
            }
            $re = $this->dataModel->where(array('id'=>$id))->data($post)->save();

            if(!$re) $this->error('提交失败');
            $this->success('提交成功',U("Admin/Position/place",array('posid'=>$posid)));
        }else{
            $data['picture'] = explode(',',$data['picture']);
            $this->assign('data',$data);
            $this->display();
        }
    }
    public function item_delete() {
        $id =I('id');

       //$posid = I('get.posid',0,'intval');

        $re = $this->dataModel->where(array('id'=>$id))->select();


        if(!$re) $this->error("不存在");
        if (false == $this->dataModel->where(array('id'=>$id))->delete()) {
            $this->error("删除失败");
        }
        $this->success("删除成功！");
    }
    public function item_status(){
        $id = I('get.id');
        $data = $this->dataModel->where(array('id'=>$id))->find();
        if(!$data) $this->error('信息不存在');
        if(  $data['status']==1){
            $this->dataModel->where(array('id'=>$id))->setField('status',0);
        }else{
            /*if(!$this->dataModel->checkProduct($data['dataid'])){
                $this->error('错误！当前推荐的宝贝已删除或者下架!');
            }*/
            $this->dataModel->where(array('id'=>$id))->setField('status',1);
        }
        $this->success('提交成功');

          }
    public function place(){
       
        
        $posid = I('posid',0);
       
        $position = $this->model->where(array('posid'=>$posid))->find();
       
        if(!$position) $this->error('指定项目不存在');
        $page = $this->pageModel->where(array('id'=>$position['pageid']))->find();
        $this->assign('position',$position);
        $this->assign('posid',$posid);
        $this->assign('page',$page);
        $this->display();
    }
    public function pageadd(){
        if(IS_POST){
            $data['name'] = $_POST['pageadd']?$_POST['pageadd']:$this->error('信息不能为空');
            $re =$this->pageModel->add($data);
          
            if(!$re) $this->error('提交失败');
            $this->success('提交成功');
        }else{
            $this->display();
        }

      
    }
    public function check(){
       $posid=I('posid'); 
       $check=$_POST['checkAll'];
       if(empty($check)) $this->error("请选择");
       //获取推荐位模型数据
        $position = $this->model->where(array('posid'=>$posid))->find();
        //获取推荐位产品数据
        $infor =array();
        $data=$this->dataModel->where(array('posid'=>$posid,'place'=>array(in,$check),status=>'1'))->select();
         foreach($data as $key=>$value){
           $dataArr =D($position['model'])->field($position['field'])->find($value['dataid']);
           $dataArr=serialize($dataArr); 
            $infor[]=$this->dataModel->where(array('posid'=>$posid,'place'=>$value['place'],'dataid'=>$value['dataid']))->setField('data',$dataArr);
        }
         $num=array_sum($infor);
         if($num ==0){
           $this->error("无更新");
         }else{
           $this->error("更新成功");
         }
         

        

         }

         public function search(){
            $key=I('keyword');
            $search_items = preg_split("/\s+/", trim($key));
            $where['title'] = array('like', '%' . implode('%', $search_items) . '%');
            $result=M('PositionData')->where($where)->select();
            foreach ($result as $key => $value) {
                 $posid['name']=M('Position')->where(array('posid'=>$value['posid']))->getField('name');
                 $posid['pageid']=M('Position')->where(array('posid'=>$value['posid']))->getField('pageid');
                 $result[$key]['pageid']=$posid['pageid'];
                 $result[$key]['name']=$posid['name'];
                 

              }  
              foreach ($result as $k1 => $v1) {
                //var_dump($v1['pageid']);
                  $pos['pagename']=M('PositionPage')->where(array('id'=>$v1['pageid']))->getField('name');
                 
                  $result[$k1]['pagename']=$pos['pagename'];
              }
           
            $this->assign('search',$result);
            $this->display();
         }
    public function status(){
        $id = I('get.id');
        $data = $this->activityModel->where(array('id'=>$id))->find();
        //var_dump($data);exit;
        if(!$data) $this->error('信息不存在');
        if(  $data['status']==-1){
            $this->activityModel->where(array('id'=>array("NEQ","0")))->setField('status',-1);
            $this->activityModel->where(array('id'=>$id))->setField('status',1);
        }else{
            /*if(!$this->dataModel->checkProduct($data['dataid'])){
                $this->error('错误！当前推荐的宝贝已删除或者下架!');
            }*/
            $this->activityModel->where(array('id'=>$id))->setField('status',-1);
        }
        $this->success('提交成功');

    }
    //微信活动列表
    public function wechat(){
        $where = self::_search();
        $count = $this->wechatModel->where($where)->count();
        $page  = $this->page($count,20);
        $data  = $this->wechatModel->where($where)->limit($page->firstRow . ',' . $page->listRows)->order()->select();
        $this->assign("Page", $page->show('Admin'));
        $this->assign("data", $data);
        //获取活动名称
        $actnames = $this->wechatModel->getActNameArray();
        // var_dump($actnames);
        $this->assign('actnames',$actnames);
        $this->display();
    }
    private function _search(){
        $search = I('get.search',NULL);
        $where = array();
        if($search){
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
                $where['addtime'] = array('between', array($where_start_time, $where_end_time));
            }
             //关键字
            $keyword = I('get.keyword');
            if ($keyword) {
                $type = I('get.type', 0, 'intval');
                switch ($type) {
                    case 1:
                        $where['mobile'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    case 2:
                        $where['name'] = array("EQ", $keyword);
                        break;
                    case 3:
                        $where['addr'] = array("LIKE", '%' . $keyword . '%');
                        break;
                    default:
                        $where['name'] = array("LIKE", '%' . $keyword . '%');
                        break;
                }
            }
        }
        return $where;
    }
    //微信活动导出
    public function exportWechat(){
        //获取查询条件
        $where = self::_search();
        //获取待执行的sql语句
        $sql = $this->wechatModel->where($where)->field("wid,mobile,name,addr,from_unixtime(addtime),actname")->buildSql();
        // echo $sql;
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
        $csv->insertOne(['编号','手机号','姓名','地址', '登记时间','活动名称']);
        //插入查询结果数据
        $csv->insertAll($sth);
        //客户端下载文件
        $csv->output(date("Y-m-d").'微信活动数据.csv');
        exit;
    }

      
}

<?php
namespace Seller\Controller;


class DesignerController extends SellerbaseController {

    protected $model = NULL;
    protected $tempInfo=array();
    protected $designerList=array();
    protected $Page_Size = 10;
    protected function _initialize() {
        parent::_initialize();
        $this->model = M('Designer');
    }

    /**
     * 添加设计师
     */
    public function add(){
        if(IS_POST){//添加设计师
            $editStatus=I('previewstatus',2,'intval');
            if($editStatus==1) {//预览
                $data = $this->_DesignerData();
                session('designer_preview',$data);
                switch($data['modeltype']){
                    case 1://模板1
                        //$modType="showModel1";
                        $this->redirect('showModel1');
                        break;
                    case 2://模板2
                        $this->redirect('showModel2');
                       // $modType="showModel2";
                        break;
                    case 3://模板3
                        //$modType="showModel3";
                        $this->redirect('showModel3');
                        break;
                    default://默认模版1
                        $this->redirect('showModel1');
                        //$modType="showModel1";
                        break;
                }
                  //redirect('/Shop/Designer/'.$modType.'?'.http_build_query($data));//跳转到展示页面
               // $show=new \Shop\Controller\DesignerController();
//                $show=A('Shop/Designer');
//                $show->showModel1($data);
            }elseif($id=I('id',0)){
                $info=$this->model->where(array('id'=>$id))->find();
                if(!$info) $this->error('此设计师信息不存在');
                $data = $this->_DesignerData();
                $re = $this->model->where(array('id'=>$id))->data($data)->save();
                if(!$re) $this->error('修改失败');
                $this->success('修改成功');
            }
            elseif($editStatus==2){//发布
                $data = $this->_DesignerData();
                $re = $this->model->data($data)->add();
                if(!$re) $this->error('添加失败');
                $this->success("添加设计师成功！", U("index"));
            }
        }else{
            $id=I('id',0,'intval');//是否修改页面
            if($id){
                $info=$this->model->where(array('id'=>$id))->find();
                if(empty($info)) $this->error('此设计师信息不存在');
                    $this->assign("info",$info);
                    $this->assign("id",$id);
            }
            $this->display();
            session('designer_preview',null);
        }
    }


    //处理传过来的数据
    private function _DesignerData(){
        ($number = I('number',''));
        ($name = I('name')) || $this->error('姓名不能为空');
        $sex = I('sex');
        ($qualification = I('qualification')) || $this->error('请选择资质');
        ($work_time = I('work_time')) || $this->error('请填写从业时间');
        ($school = I('school')) || $this->error('请填写毕业院校');
        ($idea = I('idea',''));
        ($style = I('style')) || $this->error('请填写擅长风格');
        ($introduce = I('introduce')) || $this->error('请填写简介');
        $credential = I('credential');
        ($picture = I('designer_picture')) || $this->error('请上传图片');
        $modelType=I('modeltype');
        $data = array(
            'number' => $number,
            'name' => $name,
            'sex' => $sex,
            'qualification' => $qualification,
            'work_time' => $work_time,
            'school' => $school,
            'idea' => $idea,
            'style' => $style,
            'introduce' => $introduce,
            'credential' => $credential,
            'picture' => $picture,
            'uid' => $this->uid,
            'username' => $this->username,
            'addtime' => time(),
            'modeltype'=>$modelType,
            'status'=>1,
            'service_status'=>1,
        );
        return $data;
    }

    /**
     * 设计师首页
     */
    public function index(){
        $state=I('state',0,'intval');//0全部，1服务中，-1暂停服务
        $where = array('uid'=>$this->uid);
        if($state!=0) $where['service_status']=$state;
        $operate=I('get.','','');
        if(!empty($operate)){//查询,获取查询条件
            $name=I('get.name','','htmlspecialchars');
            $number=I('get.number','','htmlspecialchars');
            $qualification=I('get.qualification','','htmlspecialchars');
            $status=I('get.status',0,'intval');
            if(!empty($name)) $where['name']=array('LIKE','%'.$name.'%');
            if(!empty($number)) $where['number']=array('LIKE','%'.$number.'%');
            if(!empty($qualification)) $where['qualification']=array('EQ',$qualification);
            if($status!=0) $where['service_status']=array('EQ',$status);
        }
        //trace($where,'查询条件','debug');
        //分页数据信息
        $pageInfo=array();
        //页码
        $pageNum=I('get.page',0,'intval');
        //查询总数
        $count = $this->model->where($where)->count();
        //分页设置
        $page = new \Libs\Util\Page($count,$this->Page_Size,$pageNum);
        //设置分页参数
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span>&nbsp;
                        <span class="pageindex">{pageindex}/{pagecount}</span>&nbsp;
                        {first}&nbsp;{prev}&nbsp;{liststart}&nbsp;{list}&nbsp;{listend}&nbsp;{next}&nbsp;{last}&nbsp;到第{jump}页',array('jump'=>'input'));
        //获取当前页数据
        $data = $this->model->where($where)->order('id desc')->page($pageNum.','.$this->Page_Size)->select();
        //分页跳转的时候保证查询条件
        foreach($where as $key=>$val) {
            $page->parameter[$key]   =   urlencode($val);
        }
        //分页显示输出
        $pageInfo["page"] = $page->show('sellercenter');
        $this->assign('list',$data);
        $this->assign('count',$count);
        $this->assign('pageinfo',$pageInfo);
        $this->display();
    }
    /**
     * 设计师上架、下架、橱窗推荐、取消推荐、暂停服务、开启服务、删除操作
     */
    public function designerAction(){
        if (IS_POST) {
            $did = I('post.id');
            if (!$did) {
                $this->error("请选择需要操作的设计师！");
            }
            $action=I('get.action');
            switch($action){
                case 'up'://上架
                    $re = $this->model->where(array("id" => array('IN', $did),'uid'=>$this->userid))->save(array("status" => 1));
                    if(!$re) $this->error('操作失败');
                    $this->success("上架成功");
                    break;
                case 'down'://下架
                    $re = $this->model->where(array("id" => array('IN', $did),'uid'=>$this->userid))->save(array("status" => -1));
                    if(!$re) $this->error('操作失败');
                    $this->success("下架成功");
                    break;
                case 'recommend'://橱窗推荐
                    $re = $this->model->where(array("id" => array('IN', $did),'uid'=>$this->userid))->save(array("is_showcase" => 1));
                    if(!$re) $this->error('操作失败');
                    $this->success("橱窗推荐成功");
                    break;
                case 'unrecommend'://取消推荐
                    $re = $this->model->where(array("id" => array('IN', $did),'uid'=>$this->userid))->save(array("is_showcase" => 0));
                    if(!$re) $this->error('操作失败');
                    $this->success("取消推荐成功");
                    break;
                case 'service_pause'://暂停服务
                    $re = $this->model->where(array("id" => array('IN', $did),'uid'=>$this->userid))->save(array("service_status" => -1));
                    if(!$re) $this->error('操作失败');
                    $this->success("暂停服务成功");
                    break;
                case 'service_on'://开启服务
                    $re = $this->model->where(array("id" => array('IN', $did),'uid'=>$this->userid))->save(array("service_status" => 1));
                    if(!$re) $this->error('操作失败');
                    $this->success("开启服务成功");
                    break;
                case 'delete'://删除设计师
                    $re = $this->model->where(array("id" => array('IN', $did),'uid'=>$this->userid))->delete();
                    if(!$re) $this->error('操作失败');
                    $this->success("删除成功");
                    break;
                default:
                    break;
            }
        }
    }

    /**
     * 设计师模板展示
     */
    public function showModel1(){
        $this->display();
    }
    public function showModel2(){
        $this->display();
    }
    public function showModel3(){
        $this->display();
    }
    //合作工长
    public function teamworker(){
        $this->display();
    }

    //  public function materialpackagelist(){
    //   $this->display();
    // }
}
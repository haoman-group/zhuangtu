<?php
/**
 * Created by f.
 * User: Administrator
 * Date: 2015/10/20
 * Time: 10:04
 */
namespace Admin\Controller;
use Common\Controller\AdminBase;
class ProductController extends AdminBase{

    protected $model= null;
    protected $logModel = null;
    protected $shopModel = null;
    protected $proCate = null;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Seller/Product');
        $this->logModel = M('ProductAuditLog');
        $this->shopModel = M('Shop');
        //产品分类表
        $this->proCate = D('Admin/ProductCategory');
    }
     /**
     * 产品管理页面
     */
    public function product(){
        $where = $this->_search();//设置搜索条件
        $count=$this->model->where($where)->count();//获取总数
        $page=$this->page($count,20);
        $data=$this->model->where($where)->limit($page->firstRow.','.$page->listRows)->order(array("id" => "DESC"))->select();
        foreach($data as $k=>$v){//将宝贝名反序列号并转化为字符串显示
            //宝贝店铺>
            $data[$k]['shopname']="--";
            $shopId=$data[$k]['shopid'];
            $shop=$this->shopModel;
            $shopRes=$shop->where(array('id'=>$shopId))->select();
            $shopName=$shopRes[0]['name'];
            if(!empty($shopName)){
                $data[$k]['shopname']=$shopName;
            }
            //宝贝类目
            $data[$k]['typeName'] = M('ProductCategory')->where(array('cid'=>$data[$k]['cid']))->getField('name');
        }

        $category = array();
        foreach($this->proCate->getType() as $tid => $tname ) {
            $category[$tid] = array('name' => $tname);
            $category[$tid]['category'] = $this->proCate->getCateType($tid);
        }

        $this->assign("Page", $page->show('Admin'));
        $this->assign("data", $data);
        $this->assign('category', $category);
        $this->assign('proStatus',\Seller\Controller\Status::$ProStatus);
        $this->assign('auditStatus',\Seller\Controller\Status::$auditStatus);
        $this->display();
    }
    private function _search(){
        $where = array();
        //产品ID
        $prod_id = I('prodid', '');
        if($prod_id) {
            $where['id'] = $prod_id;
        }

        // 产品类型
        $proptype = I('proptype', '');
        $parent_type = I('type', '');
        if($proptype) {
            $where['proptype'] = $proptype;
        } else if ($parent_type) {
            $where['proptype'] = array('IN',$this->proCate->parent[$parent_type]);
        }
        //注册时间
        $statrTime=I('start_time','');
        $endTime=I('end_time',date('Y-m-d', time()));
        //开始时间
        $whereStartTime=strtotime($statrTime) ? strtotime($statrTime) : 0;
        //结束时间
        $whereEndTime=strtotime($endTime) ? (strtotime($endTime) + 86400) : 0;
        //如果开始时间大于结束时间，置换一下
        if($whereStartTime>$whereEndTime){
            $temp=$whereStartTime;
            $whereStartTime=$whereEndTime;
            $whereEndTime=$temp;
        }
        if($whereStartTime) $where['addtime']=array('between',array($whereStartTime,$whereEndTime));
        $number=I('number','','htmlspecialchars');//宝贝编号
        if(!empty($number)) $where['attr_code']=array('LIKE','%'.$number.'%');
        //标题
        $title=I('title','','htmlspecialchars');//宝贝标题
        //状态
        $auditStatus=I('audit_status');//审核状态
        $shopName=I('shop','','htmlspecialchars');//店铺名称
        if(!empty($shopName)){
            $shopwhere = array();
            $shopwhere['name'] = array('LIKE','%'.$shopName.'%');
            $id = $this->shopModel->where($shopwhere)->getField('id');
            $where['shopid'] = array('IN',$id);
        }
        $crafttype=I('crafttype','','htmlspecialchars');//宝贝类目
        $status=I('status');//宝贝状态
        if(!empty($title)) $where['title']=array('LIKE','%'.$title.'%');
        if(is_numeric($auditStatus)) $where['auditstatus']=array('EQ',$auditStatus);
        if(is_numeric($crafttype)) $where['crafttype']=$crafttype;
        if(is_numeric($status)) $where['status']=array('EQ',$status);
        return $where;
    }


     /**
     * 产品详情页
     */
    public function productinfo(){
        $pid=I('pid',0,'intval');
        $info = $this->model->where(array('id'=>$pid))->find();
        if(empty($info))  $this->error("该宝贝不存在！");
        //宝贝类目
        $info['cname'] = M('ProductCategory')->where(array('cid' => $info['cid']))->getField('name');
        //宝贝店铺>
        $info['shopname']="--";
        $shopId=$info['shopid'];
        $shop=M('Shop');
        $shopRes=$shop->where(array('id'=>$shopId))->select();
        $shopName=$shopRes[0]['name'];
        if(!empty($shopName)){
            $info['shopname']=$shopName;
        }
        $info['key_prop'] = unserialize($info['key_prop']);
        $info['nokey_prop'] = unserialize($info['nokey_prop']);
        //将违规原因反序列化
        $tempReason=unserialize($info['ill_reason']);
        $tempReason=array_filter($tempReason);
        $info['ill_reason']=implode(",",$tempReason);
        $auditlogs = $this->logModel->where(array('productid'=>$pid))->select();
        foreach($auditlogs as $k => $v){
            $auditlogs[$k]['name'] = M('User')->where(array('id'=>$v['adminid']))->getField('username');
            $auditlogs[$k]['reason'] = unserialize($auditlogs[$k]['reason']);
        }
         //获取属性
        $this->assign('property',D('Seller/ProductProperty')->getProperty($info['cid']));
        $this->assign('auditlogs',$auditlogs);
        $this->assign('info',$info);
        $this->assign('proStatus',\Seller\Controller\Status::$ProStatus);
        $this->assign('auditStatus',\Seller\Controller\Status::$auditStatus);
        $this->display();
    }
    
    /**
     * 删除产品
     */
    public function productdelete(){
        if (IS_POST) {
            $pid = I('post.id');
            if (!$pid) {
                $this->error("请选择需要删除的宝贝！");
            }
            foreach ($pid as $id) {
                M('Product')->where(array("id" => $id))->delete();
            }
            $this->success("删除成功！");
        }
    }
     /**
     * 产品审核操作
     */
    public function productaudit(){
        if(IS_POST){
            $data = array();
            $logdata = array();
            $pid = I('post.id');
            if(!$pid){
                $this->error("请选择要操作的宝贝!");
            }
            $auditstatus = I('auditstatus',0,'intval');
              if($auditstatus == \Seller\Controller\Status::AUDIT_PASS){//通过
                $data['ill_reason'] = serialize('审核通过');
            }
            else if($auditstatus == \Seller\Controller\Status::AUDIT_VIOLATE){//违规
                $data['ill_reason'] = serialize(I('audit_reason','','htmlspecialchars'));
            }else if($auditstatus == \Seller\Controller\Status::AUDIT_SELLOUT){//下架
                $data['ill_reason'] = serialize(I('audit_reason','','htmlspecialchars'));
                $data['status'] = \Seller\Controller\Status::STATUS_VIOLATE; //设置下架状态
            }else{
                $this->error('错误的审核类型');
            }
            
            $data['auditstatus'] = $auditstatus;
            $data['audittime'] = time();
            //审核记录
            $logdata['shopid'] = $this->model->where(array("id" =>$pid))->getField('shopid');
            $logdata['productid'] = $pid;
            $logdata['reason'] = $data['ill_reason'];
            $logdata['addtime'] = time();
            $logdata['adminid'] = $this->adminid;
            $logdata['status'] = $auditstatus;
            $logdata['snapshot'] = "";
            $this->logModel->add($logdata);
            //写记录
            $re=$this->model->where(array("id" =>$pid))->save($data);
            if($re){
                $this->success("操作成功！",U('material?type='.I('type')));
            }else{
                $this->error("操作失败！");
            }
        }
    }

    public function changerank() {
        $prod_id = I('prodid');
        if(empty($prod_id)){
            $this->error('未指定产品ID！');
        }
        $prod = $this->model->where(array('id'=>$prod_id))->find();
        $this->assign("prod",$prod);
        $this->display();
    }

}
<?php
/**
* @class 设计库
* @author 李博凯
**/
namespace Content\Controller;

use Common\Controller\Base;
use Content\Model\ContentModel;

class DesignlibraryController extends Base {
    protected $model = NULL;
    protected $Page_Size=40;
    protected $Page_size=40;
    protected $collectionmodel=NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Seller/DesignLibrary');
        $this->collectionmodel=M('Collection');
    }

    public function index() {
        $pagenum = I('get.page','1','');
        $this->assign('style',M('option_field')->where(array('name'=>'attr_style','status'=>'1','value'=>array('neq','古典')))->getField('id,value',true));
        //echo M("option_field")->getLastsql();exit;
        $count=$this->model->where(array('isdelete'=>0))->count();
        $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
        $data=$this->model->where(array('isdelete'=>0))->page($pagenum.','.$this->Page_Size)->order(' RAND() ')->select();
         foreach ($data as $key => $value) {
            $data[$key]['userpic']=M('Member')->where(array('userid'=>$value['uid']))->getField("userpic");
            $data[$key]['userid']=$this->userid;
            $data[$key]['collectnum']=M("Collection")->where(array('itemid'=>$value['proid'],'type'=>1,'isdelete'=>0))->count();
            $data[$key]['likecount']=M("DesignlibLike")->where(array('itemid'=>$value['proid'],'type'=>1))->count();
            $nameid=M("Product")->where(array('id'=>$value['proid']))->getField("designer_name");
            $data[$key]['designer_name']=M("Designer")->where(array('id'=>$nameid))->getField("name");
            $data[$key]['shopname']=M("Shop")->where(array("id"=>$value['shopid']))->getField("name");
         }

         //var_dump($data);exit;
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('pageinfo',$pageinfo);
        $this->assign("data",$data);
        $this->display();
    }
    public function lists(){
       $pagenum = I('get.page','1','');
       $style=I("style");
       $where['style']=array("LIKE","%".$style."%");
       $where['isdelete']=0;
       $count=$this->model->where($where)->count();
       $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
       $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
       $message=$this->model->where($where)->page($pagenum.','.$this->Page_size)->order('addtime desc')->select();
        foreach ($message as $key => $value) {
            $message[$key]['userpic']=M('Member')->where(array('userid'=>$value['uid']))->getField("userpic");
            $message[$key]['userid']=$this->userid;
            $message[$key]['collectnum']=M("Collection")->where(array('itemid'=>$value['proid'],'type'=>1,'isdelete'=>0,'uid'=>$this->userid))->count();
            $message[$key]['likecount']=M("DesignlibLike")->where(array('itemid'=>$value['proid'],'type'=>1))->count();
            $nameid=M("Product")->where(array('id'=>$value['proid']))->getField("designer_name");
            $message[$key]['designer_name']=M("Designer")->where(array('id'=>$nameid))->getField("name");
            $message[$key]['shopname']=M("Shop")->where(array("id"=>$value['shopid']))->getField("name");
         }
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign('pageinfo',$pageinfo);
        $this->assign("message",$message);
      $this->assign('data',I('get.'));
      $this->assign('style',M('option_field')->where(array('name'=>'attr_style','status'=>'1','value'=>array("neq","古典")))->getField('id,value',true));
     // var_dump(M('option_field')->where(array('name'=>'attr_style','status'=>'1'))->getField('id,value',true));exit;
      $this->display();
    }
    public function show(){
        $proid = I('get.proid');
        //var_dump($proid);exit;
        $where['itemid']=$proid;
        $where['uid']=$this->userid;
        $where['type']=1;
        $where['isdelete']=0;
        $countlike=M("DesignlibLike")->where($where)->count();
        $count=$this->collectionmodel->where($where)->count();
        $data = M('Product')->getById($proid);
        $data['userid']=$this->userid;
        $data['picture'] = explode(',',$data['picture']);
        $data['title'] = implode("、",unserialize($data['title']));
        $data['designer'] = M('Designer')->getFieldById($data['designer_name'],'name');
        $data['shopname'] = M('Shop')->getFieldById($data['shopid'],'name');
        $data['attr_style'] = implode("、",unserialize($data['attr_style']));
        $shopid=$this->model->where(array("proid"=>$proid))->getField("shopid");
        $productcount=M("Product")->where(array('shopid'=>$shopid))->count();
        if($productcount%2 ==0){
        $data['sameshopheadpic']=M("Product")->where(array('shopid'=>$shopid))->select();
        }else{
        $data['sameshopheadpic']=M("Product")->where(array('shopid'=>$shopid))->limit($productcount-1)->select();
         }
        $data['seller_userpic']=M("Member")->where(array('userid'=>$data['uid']))->getField("userpic");
        $data['buyer_userpic']=M("Member")->where(array('userid'=>$data['userid']))->getField("userpic");
        $data['count_collected']=M("Collection")->where(array('itemid'=>$proid,'isdelete'=>0,'type'=>1))->count();
        $data['countcollect']=M("Collection")->where(array('itemid'=>$proid,'isdelete'=>0,'type'=>1))->count();
        $data['comment']=M("DesignlibCommit")->where(array('itemid'=>$proid,'isdelete'=>0,'type'=>1))->select();
       
         //var_dump($data);exit;
        $this->assign('data',$data);
        
        $this->assign("countlike",$countlike);
        $this->assign("count",$count);
        $this->display();
    }

 //添加评论
    public function addcommit(){
        $data['itemid']=I("itemid");
        $data['content']=I("content");
        $data['userid']=$this->userid;
        $data['isdelete']=I("isdelete");
        $data['type']=I("type");
        $data['addtime']=time();
        $result=M("DesignlibCommit")->add($data);
        $commitinfo=M("DesignlibCommit")->where(array('itemid'=>I("itemid")))->find();
        $commitinfo['userpic']=M("Member")->where(array("userid"=>$this->userid))->getField("userpic");

        if($result){
           $this->ajaxReturn(array('status'=>1,'msg'=>"操作成功",'data'=>$commitinfo));
        }else{
            $this->ajaxReturn(array("status"=>0,'msg'=>'操作失败'));
        }
    }


    public function commitlists(){
        $where['itemid']=I("productid");
        $where['type']=1;
        $where['is_delete']=0;
        $data=M("DesignlibCommit")->where($where)->order("addtime desc")->select();
        foreach ($data as $key => $value) {
            $data[$key]['userinfo']=M("Shop")->where(array('id'=>$value['userid']))->find();
        }
        $this->ajaxReturn(array("status"=>1,'msg'=>$data));
    }

}

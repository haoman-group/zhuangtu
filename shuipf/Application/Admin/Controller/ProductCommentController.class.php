<?php
//普通的评价

namespace Admin\Controller;
use Common\Controller\AdminBase;

class ProductCommentController extends  AdminBase{
	protected $commentproduct=NULL;
    protected $member=NULL;
	protected $Page_Size=40;
    protected $Page_size=40;

	protected function _initialize() {
        parent::_initialize();
        $this->commentproduct=M("CommentProduct");
        $this->member=M("member");
        
        
    }

    public function index(){
    	$pagenum = I('get.page','1','');
    	$count=$this->commentproduct->where(array("state"=>0))->count();
        $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
        $data=$this->commentproduct->where(array("state"=>0))->page($pagenum.','.$this->Page_Size)->order('addtime desc')->select();
        foreach ($data as $key => $value) {
            $data[$key]['buyertel']=$this->member->where(array('userid'=>$value['userid']))->getField("mobile");
        }
         $pageinfo["page"] = $page->show('sellercenter');
         $pageinfo['count'] = $count;
         $this->assign('pageinfo',$pageinfo);
         $this->assign("data",$data);

    	 $this->display();

    }

    public function delete(){
        $id=I("id");
        $result=$this->commentproduct->where(array('id'=>$id))->setField("state",1);
        if($result){
            $this->success("操作成功");

        }else{
            $this->error("挫折失败");
        }

    }

    public function edit(){
        $id=I("id");
        $data=$this->commentproduct->where(array('id'=>$id))->find();
        $data['buyertel']=$this->member->where(array('userid'=>$data['userid']))->getField("mobile");
        $this->assign("data",$data);
        $this->display();
    }

    public function newedit(){
        $id=I("id");
        $content=I("content");
        $result=$this->commentproduct->where(array('id'=>$id))->setField("content",$content);
        if($result){
          $this->success("修改成功",U("Admin/ProductComment/index"));
        }else{
            $this->error("修改失败");
        }
    }

    public function find(){
        if(!empty(I("order_sn"))){
        $where['order_sn']=I("order_sn");
       }
        if(!empty(I("shopname"))){
        $where['shop_name']=array("LIKE",'%'.I("shopname").'%');
        }
        $where['state']=0;
        if(!empty(I("shop_id"))){
        $where['shop_id']=I("shop_id");
    }    
        if(!empty(I("userid"))){
        $where['userid']=I("userid");
    }
       
        if(!empty(I("username"))){
        $where['username']=array("LIKE",'%'.I("username").'%');
    }
       if(!empty(I("productid"))){
         $where['product_id']=I("productid");
       }
         
        $count=$this->commentproduct->where($where)->select();
       
        $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
        $data=$this->commentproduct->where($where)->page($pagenum.','.$this->Page_size)->order('addtime desc')->select();

        foreach ($data as $key => $value) {
            $data[$key]['buyertel']=$this->member->where(array('userid'=>$value['userid']))->getField("mobile");
        }
         $pageinfo["page"] = $page->show('sellercenter');
         $pageinfo['count'] = $count;
         $this->assign('pageinfo',$pageinfo);
         $this->assign("data",$data);
        $this->display();
    }
}


?>
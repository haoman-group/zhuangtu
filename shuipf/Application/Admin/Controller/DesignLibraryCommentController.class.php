<?php

namespace Admin\Controller;
use Common\Controller\AdminBase;
class DesignLibraryCommentController extends AdminBase{
   protected $designcommentmodel=NULL;
   protected $member=NULL;
   protected $shop=NULL;
   protected $Page_Size=30;
   protected $Page_size=30;
	protected function _initialize() {
        parent::_initialize();
        $this->designcommentmodel=M("DesignlibCommit");
        $this->member=M("Member");
        $this->shop=M("Shop");
        
    }

    public function index(){
    	$pagenum = I('get.page','1','');
    	$commentinfo=$this->designcommentmodel->where(array('is_delete'=>0))->order("addtime desc")->select();
    	$count=count($commentinfo);
    	$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
        $data=$this->designcommentmodel->where(array('is_delete'=>0))->page($pagenum.','.$this->Page_Size)->order('addtime desc')->select();
    	foreach ($data as $key => $value) {
    		$data[$key]['username']=$this->member->where(array('userid'=>$value['userid']))->getField("username");
    		$data[$key]['sellername']=$this->getsellername($value['itemid']);
    	}
    	 $this->assign("data",$data);
    	 $pageinfo["page"] = $page->show('sellercenter');
         $pageinfo['count'] = $count;
         $this->assign('pageinfo',$pageinfo);
    	$this->display();
    }



    public function getsellername($productid){
    	$designerid=M("Product")->where(array('id'=>$productid))->getField("designer_name");
    	$sellername=M('Designer')->where(array('id'=>$designerid))->getField("name");
    	return $sellername;


    }

    public function delete(){
    	$id=I("id");
    	$data['isdelete']=1;
    	$result=$this->designcommentmodel->where(array('id'=>$id))->setField('is_delete','1');
       
    	if($result){
          $this->success("删除成功");
    	}else{
    		$this->error("删除失败");
    	}
    }

    public function edit(){
        $id=I("id");
        $data=$this->designcommentmodel->where(array('id'=>$id))->find();
        $this->assign("data",$data);
    	$this->display();
    }

    public function newedit(){
    	$id=I("id");
    	$content=I("content");
    	$result=$this->designcommentmodel->where(array('id'=>$id))->setField("content",$content);
    	if($result){
          $this->success("修改成功",U("Admin/DesignLibraryComment/index"));
    	}else{
    		$this->error("修改失败");
    	}
    }

   public function find(){
   	    $productid=I("productid");
   	    if(empty($productid)){
   	    	$this->error("请填写");
   	    }else{
   	    	$pagenum = I('get.page','1','');
   	    	$count=$this->designcommentmodel->where(array('itemid'=>$productid,'is_delete'=>0))->count();
   	    	$page = new \Libs\Util\Page($count,$this->Page_size,$pagenum);
            $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
            $data=$this->designcommentmodel->where(array('is_delete'=>0,'itemid'=>$productid))->page($pagenum.','.$this->Page_size)->order('addtime desc')->select();
            foreach ($data as $key => $value) {
    		$data[$key]['username']=$this->member->where(array('userid'=>$value['userid']))->getField("username");
    		$data[$key]['sellername']=$this->getsellername($value['itemid']);	 
    	}
             $this->assign("data",$data);
    	     $pageinfo["page"] = $page->show('sellercenter');
             $pageinfo['count'] = $count;
             $this->assign('pageinfo',$pageinfo);
             $this->display();
   	    }
   }
}
?>
<?php
// +----------------------------------------------------------------------
// | 设计库接口
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Api\Controller;

use Common\Controller\Base;

class DesignLibraryController extends Base {
    protected $model = null;
    protected $designerlike=null;
    //设计库
    protected $Page_Size = 30;
      protected function _initialize() {
        parent::_initialize();
        $this->model = D('Seller/DesignLibrary');
        $this->designerlike=M("DesignlibLike");
    }
    //根据风格获取设计库内容
    public function getLists(){
        //获取参数
        $data = I('get.');
        $where = array();
        $where['style'] = array('LIKE','%'.$data['style'].'%');
        $where['isdelete'] = 0;
        $where['status'] = 0;
        $order = array('id'=>'desc');
        $pagenum = $data['page'];
        $count = $this->model->where($where)->count();
        $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $libs = $this->model->where($where)->page($pagenum.','.$this->Page_Size)->order($order)->select();
        // echo $this->model->getLastSql();
        // $libs = $this->model->getListByStyle($data['style']);
        $msg = array();
        foreach($libs as $key => $res){
            $proinfo  = M('Product')->where(array('id'=>$res['proid']))->find();
            $designer = M('Designer')->where(array('id'=>$proinfo['designer_name']))->find();
            $msg[$key]['userid']=$this->userid;
            $msg[$key]['productid']=$res['proid'];
            $msg[$key]['pic']  = $res['picture'];
            $msg[$key]['url']  = "/Designlibrary/show?proid=".$res['proid'];
            $msg[$key]['txt']  = $proinfo['title'];
            $msg[$key]['good'] = 0;
            $msg[$key]['fav']  = 0;
            $msg[$key]['photo'] = $designer['picture'];
            $msg[$key]['designer'] = $designer['name'];
            $msg[$key]['designcom'] = M('Shop')->where(array('id'=>$proinfo['shopid']))->getField('name');
        }
        $result = array(
            'status'=>1,
            'msg'=>$msg,
        );

        $this->ajaxReturn($result);
        // echo json_encode($result);
    }


    //喜欢他的功能

    public function designerlike(){
        $delete=I("isdelete");
        $data['itemid']=I("itemid");
        $data['type']=I("type");
        $data['userid']=I('userid');
        $data['addtime']=time();
        $where['itemid']=I("itemid");
        $where['type']=I("type");
        $where['userid']=I("userid");
        if($delete == 0){
          $result=$this->designerlike->add($data);
          $this->ajaxReturn(array('status'=>1,"msg"=>"操作成功","isdelete"=>$delete));

        }else{
            $result=$this->designerlike->where($where)->delete();
             $this->ajaxReturn(array('status'=>1,"msg"=>"操作成功","isdelete"=>$delete));
        }
    }
}

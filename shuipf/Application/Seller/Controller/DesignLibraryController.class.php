<?php
// +----------------------------------------------------------------------
// | 宝贝管理
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Seller\Controller;

class DesignLibraryController extends \Seller\Controller\SellerbaseController {
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('DesignLibrary');
    }
    /**
     * @name 设计库索引
     **/
    public function index(){
        //查询数据
       $where = array();
       $where['status'] = array('NEQ','-1');
       $where['isdelete'] = 0;
       $this->_prepData($where);
       $this->assign('proStatus',Status::$ProStatus);
       $this->display();
    }
    /**
     * @name 批量删除、单记录删除
     **/
    public function delete(){
        if(IS_POST){//批量删除
            $chkprolist = I('request.chkprolist','','');  
            foreach($chkprolist as $id){
            $res = $this->model->del($id);
            }
        }
        if(IS_GET){//单个删除
            $id = I('get.id','','');  
            $res = $this->model->del($id);
        }
        if($res){
            $this->success('删除成功!');  
        }else{
            $this->error('删除失败!');
        }
    }
    /**
     * @name 设置搜索条件
     * */
     private function _search(){
        $options = I('get.');
        if(!empty($options)){
            //商品标题模糊查询
            if($options['title']){
                $this->where['title'] = array('LIKE','%'.$options['title'].'%'); 
            }
            //状态
            if($options['status']){
                $this->where['status'] = $options['status'];
            }
            //上传时间范围
            if($options['begin_addtime'] && $options['end_addtime']){
                $this->where['addtime'] = array(array('EGT',strtotime($options['begin_addtime'])),array('ELT',strtotime($options['end_addtime'])),'and');
            }
            //只有开始时间
            if($options['begin_addtime'] && !$options['end_addtime']){
                $this->where['addtime'] = array('EGT',strtotime($options['begin_addtime']));
            }
            //只有结束时间
            if(!$options['begin_addtime'] && $options['end_addtime']){
                $this->where['addtime'] = array('ELT',strtotime($options['end_addtime']));
            }
            //风格
            if($options['style']){
                $this->where['style'] = array('LIKE','%'.$options['style'].'%');
            }
        }
     }
     /**
      * @name 处理显示数据
      * */
    private function _special($data){
        foreach($data as $k => $v){
            //处理标题 1.反序列化 2.去除空元素 3.使用斜杠做分隔符
            $data[$k]['proStatus'] = M('Product')->where(array('id' => $v['proid']))->getField('status');
        }
        return $data;
    }
    //准备前台显示的数据
    private function _prepData($where){
      //页面信息数据
      $pageinfo =array();
      //获取页码
      $pagenum = I('get.page','1','');
      //设置用户条件
      $this->where['uid'] = $this->userid;
      //设置搜索条件
      $this->_search();
      //排序
      $order = array('id'=>'desc');
      //合并搜索条件和基础条件（array_merge 如果有重复key，则后面的会覆盖前面的）
      $where = array_merge($where,$this->where);
      trace($where,'搜索条件2','debug');
      //总数
      $count = $this->model->where($where)->count();
      //分页设置
      $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
      //设置分页参数
      $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
      //获取当前页数据
      $data = $this->model->where($where)->page($pagenum.','.$this->Page_Size)->order($order)->select();
      //分页跳转的时候保证查询条件
      foreach($where as $key=>$val) {
        $page->parameter[$key]   =   urlencode($val);
      }
      //分页显示输出
      $pageinfo["page"] = $page->show('sellercenter');
      //处理显示数据
      $data = $this->_special($data);
      //输出记录总数
      $pageinfo['count'] = $count;
      $this->assign('lists',$data);
      $this->assign('pageinfo',$pageinfo);
      return;
    }
}
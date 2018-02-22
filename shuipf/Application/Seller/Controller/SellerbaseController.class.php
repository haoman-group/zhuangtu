<?php
namespace Seller\Controller;


class SellerbaseController extends \Member\Controller\MemberbaseController {

    //全局搜索条件
    protected $where = null;
    //单页数据容量
    protected $Page_Size = 10;
    //店铺类型
    protected $cateType = null;
    //推荐位数据模型
    protected $posDataModel = null;
    protected function _initialize() {
      parent::_initialize();
      if(!$this->shopid){
        redirect(U('Member/Seller/index'));
      }
      $this->assign('shopid',$this->shopid);
      //获取Shop类型ID
      $cateid = M('Shop')->where(array('uid' => $this->userid))->getField('catid');
      //获取Shop类型的PID
      $this->cateType = D('Member/ShopCategory')->getPid($cateid);
      $this->posDataModel = D('Admin/PositionData');
      $this->assign('cateType',$this->cateType);
      $this->assign('maxPicNum',7);
    }
     /**
    * @name正在出售的宝贝
    **/
    public function lists() {
      $where = array();
      $where['status'] = Status::STATUS_SELLING;
      $where['isdelete'] = "0";
      if($this->cateType == '1'){//设计师产品列表页去掉合作公章工长内容
        $where['cid'] = array('NEQ','103');
      }
      $this->_prepData($where);
      $this->assign('category',$this->_getCateType());
      $this->display('Product/lists');
    }
    /**
    * @name 橱窗出售的宝贝
    **/
    public function showcase(){
      $this->_prepData(array('status' =>Status::STATUS_SELLING,'is_showcase' =>'1','isdelete' => '0'));
      $this->display('Product/showcase');
    }
	  /**
    * @name 宝贝类目选择
    **/
    public function selectcate(){
      $this->assign('category',$this->_getCateType());
      $this->assign('catpid', D('Member/Shop')->getCatpidById($this->shopid));
      $this->display('Product/selectcate');	
	  }
	  /**
	   * @name 根据店铺类别，获取产品宝贝分类列表
	   * */
    protected function _getCateType(){
      $catpid = D('Member/Shop')->getCatpidById($this->shopid);
      $cate = D('Admin/ProductCategory')->getCate($catpid);
      if(!$cate) $this->error('系统错误');
      $cate = D('ProductCategory')->where(array('cid'=>array('in',$cate),'isdelete'=>'0'))->select();
      // $cate = $this->cateModel->field("cid,name,is_parent")->where(array('parent_cid'=>$cid))->select();
      $category = array();

      foreach($cate as $k=>$v){
          $category[$k]['cid'] = $v['cid'];
          $category[$k]['name'] = $v['name'];
          $category[$k]['spell'] = '';
          $category[$k]['vid'] = 0;
          if($v['is_parent']){
              $category[$k]['hascate'] = 1;
              $category[$k]['hasbrand'] = 0;
          }else{
              $category[$k]['hascate'] = 0;
              $brand = M('ProductPropertyValue')->where(array('cid'=>$v['cid'],'pid'=>20000))->select();
              $category[$k]['hasbrand'] = $brand?1:0;
          }
      }
      return $category;
    }
     /**
	   * @name 根据店铺类别，获取产品宝贝分类列表
	   * */
    protected function _getCateTypeEx(){
      $catpid = D('Member/Shop')->getCatpidById($this->shopid);
      $cate = D('Admin/ProductCategory')->getCate($catpid);
      if(!$cate) $this->error('系统错误');
      $cate = D('ProductCategory')->where(array('cid'=>array('in',$cate)))->select();
      // $cate = $this->cateModel->field("cid,name,is_parent")->where(array('parent_cid'=>$cid))->select();
      $category = array();

      foreach($cate as $k=>$v){
          $category[$k]['cid'] = $v['cid'];
          $category[$k]['name'] = $v['name'];
          $category[$k]['spell'] = '';
          $category[$k]['vid'] = 0;
          if($v['is_parent']){
              $category[$k]['hascate'] = 1;
              $category[$k]['hasbrand'] = 0;
          }else{
              $category[$k]['hascate'] = 0;
              $brand = M('ProductPropertyValue')->where(array('cid'=>$v['cid'],'pid'=>20000))->select();
              $category[$k]['hasbrand'] = $brand?1:0;
          }
      }
      return $category;
    }
      /**
	   * @name 根据店铺类别，获取产品宝贝分类列表
	   * */
    protected function _getCateTypeForWorker(){
      $catpid = D('Member/Shop')->getCatpidById($this->shopid);
      $cate = D('Admin/ProductCategory')->getCate($catpid);
      if(!$cate) $this->error('系统错误');
      $cate = D('ProductCategory')->where(array('cid'=>array('in',$cate)))->select();
      $category = array();

      foreach($cate as $k=>$v){
          $category[$k]['cid'] = $v['cid'];
          $category[$k]['name'] = $v['name'];
          $child = D('ProductCategory')->where(array('parent_cid'=>$v['cid']))->select();
          if(!empty($child)){
            foreach($child as $k1=>$v1){
              $c['cid'] = $v1['cid'];
              $c['name'] = $v1['name'];
              $category[] = $c;
            }
          }
      }
      return $category;
    }
	  /**
    * @name 仓库中的宝贝
    **/
	  public function warehouse(){
	    $this->_prepData(array('status' =>array(array('neq',Status::STATUS_SELLING),array('neq',Status::STATUS_VIOLATE),'and'),'isdelete' => '0','auditstatus' => array('neq','-1')));
	    $this->assign('proStatus',Status::$ProStatus);
	    $this->assign('category',$this->_getCateType());
		  $this->display('Product/warehouse');	
	  }
	   /**
    * @name 历史宝贝记录
    **/
	  public function history(){
	    $this->_prepData(array());
		  $this->display('Product/history');	
	  }
	  /**
	   * @name 宝贝回收站
	   * */
	  public function recycle(){
	    $this->_prepData(array('isdelete' => '1'));
	    $this->display('Product/recycle');
	  }
	  /**
	   * @name 违规宝贝
	   * */
	   public function illegality(){
	     $this->_prepData(array('isdelete' => '0','auditstatus' =>array(array('neq','0'),array('neq','1'),'and')));
	     $this->display('Product/illegality');
	   }
	 
    
    /**
    * @name 商品上架
    **/
    public function shelve(){
      //检测店铺状态
      if(!$this->checkShopStatus()){
        $this->error('上架失败：店铺已冻结！');
      }
      $chkprolist = I('request.chkprolist','','');
      foreach($chkprolist as $id){
        $res = $this->model->shelve($id);
      }
      if($res){
        $this->success('上架成功！');
      }else 
        $this->error('上架失败!');
    }
    /**
    * @name 商品下架
    **/
    public function unshelve(){
      $chkprolist = I('request.chkprolist','','');
      foreach($chkprolist as $id){
        if($this->posDataModel->checkDataId($id)){
          $this->error('下架失败！宝贝ID=['.$id.']为首页推荐位数据,下架请联系后台管理员!');
        }
        $res =$this->model->unshelve($id);
      }
      if($res){
        $this->success('下架成功！');
      }else 
        $this->error('下架失败!');
    }
    /**
    * @name 删除商品
    * @param int id 商品id 
    **/
    public function delete(){
      if(IS_POST){//批量删除
        $chkprolist = I('request.chkprolist','','');  
          foreach($chkprolist as $id){
            //检测是否为推荐位的有效数据
            if($this->posDataModel->checkDataId($id)){
              $this->error('删除失败！宝贝ID=['.$id.']为首页推荐位数据,删除请联系后台管理员!');
            }
            $res = $this->model->del($id);
        }
      }
      if(IS_GET){//单个删除
        $id = I('get.id','','');  
        //检测是否为推荐位的有效数据
        if($this->posDataModel->checkDataId($id)){
          $this->error('删除失败！当前宝贝为首页推荐位数据,删除请联系后台管理员!');
        }
        $res = $this->model->del($id);
      }
      if($res){
        $this->success('删除成功!');  
      }else{
        $this->error('删除失败!');
      }
    }
    /**
    * @name 恢复商品
    * @param int id 商品id 
    **/
    public function recover(){
      $chkprolist = I('request.chkprolist','','');
      foreach($chkprolist as $id){
        $res = $this->model->recover($id);
      }
      if($res){
        $this->success('恢复成功!');
      }else {
        $this->error('恢复失败！');
      }
    }
    /**
    * @name 橱窗推荐
    **/
    public function setshowcase(){
      $chkprolist = I('request.chkprolist','','');
      foreach($chkprolist as $id){
        $res = $result = $this->model->setshowcase($id);
      }
      if($res){
        $this->success('推荐成功！');
      }else{
        $this->error('推荐失败！');
      }
    }
    /**
    * @name 取消橱窗推荐
    **/
    public function unsetshowcase(){
      
      $chkprolist = I('request.chkprolist','','');
      foreach($chkprolist as $id){
        $res = $result = $this->model->unsetshowcase($id);
      }
      if($res){
        $this->success('取消成功！');
      }else{
        $this->error('取消失败！');
      }
    }
    /**
     *@name 设置搜索条件 
     **/
    private function _search(){
       $options = I('get.','','');
       //判断是否有搜索条件
       if($options){
        //商品标题模糊查询
        if($options['title']){
           $this->where['title'] = array('LIKE','%'.$options['title'].'%'); 
        }
        //商品ID? 或者是 attr_code 有待商榷
        if($options['id']){
           $this->where['id'] = $options['id'];
        }
        //售价范围
        if($options['min_price'] || $options['max_price']){
           $this->where['min_price'] = array('GT',$options['min_price']);
           $this->where['max_price'] = array('LT',$options['max_price']);
        }
        //销售数量范围
        if($options['min_sales'] && $options['max_sales']){
          //$where['']
        }
        //删除时间范围
        if($options['begin_deltime'] || $options['end_deltime']){
          $this->where['deletetime'] = array(array('EGT',strtotime($options['begin_deltime'])),array('ELT',strtotime($options['end_deltime'])),'AND');
        }
        //只有开始时间
        if($options['begin_deltime'] && !$options['end_deltime']){
          $this->where['deletetime'] = array('EGT',strtotime($options['begin_deltime']));
        }
        //只有结束时间
        if(!$options['begin_deltime'] && $options['end_deltime']){
          $this->where['deletetime'] = array('ELT',strtotime($options['end_deltime']));
        }       
        //是否为橱窗推荐 
        if($options['is_showcase'] || $options['is_showcase']==="0"){
          $this->where['is_showcase'] = $options['is_showcase'];
        }
        //宝贝类型 0-家装设计；1-软装设计
        if($options['designtype'] || $options['designtype']==="0"){
          $this->where['designtype'] = $options['designtype'];
        }
        //针对仓库中宝贝的搜索条件
        if($options['StateType'] || $options['StateType'] ==='0'){
          switch ($options['StateType']){
            //全部
            case "0"  : break;
            //售完下架
            case Status::STATUS_SELLOUT : ;
            //商户下架
            case Status::STATUS_SELLEROUT : ;
            //违规下架
            case Status::STATUS_VIOLATE : ;
            //从未上架
            case Status::STATUS_NEVER : $this->where['status'] = $options['StateType']; break; 
            //即将开始 3天以内
            case Status::STATUS_SOON : $this->where['status'] = Status::STATUS_NEVER;
                        $this->where['starttime'] = array('GT',(time() - 60*60*24*3));  //即将上架表示starttime在3天以内的
                        break;
            //默认为正在出售的宝贝
            default:    $this->where['status'] =  Status::STATUS_SELLING;break;
          }
        }
       }
     }
    //准备前台显示的数据
    protected function _prepData($where){
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
      //获取橱窗总数
      $pageinfo['countcase'] = $this->model->countcase();
      $this->assign('lists',$data);
      $this->assign('pageinfo',$pageinfo);
      return;
    }

    //检测当前店铺的状态，如果店铺为冻结状态，则不允许相应操作
    private function checkShopStatus(){
      $Shopstatus  = M('Shop')->getFieldByUid($this->userid,'status');
      return $Shopstatus == '1'?true:false;
    }
}
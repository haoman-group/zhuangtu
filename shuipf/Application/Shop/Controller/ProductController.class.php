<?php
namespace Shop\Controller;
use Common\Controller\Base;

class ProductController extends Base {
    protected $Size_Page=25;
    protected $PageSize=30;
     protected $ShopSize=30;
    protected $model = NULL;
    protected $workerModel = NULL;
    protected $collection=NULL;
    protected function _initialize(){
        parent::_initialize();
        $this->model = D('Seller/Product');
        $this->propmodel = D('Admin/ProductProperty');
        $this->workerModel = D('Seller/Product');
        $this->collectionModel=M('Collection');
        $this->valueModel=D('Admin/ProductPropertyValue');

        $this->shopModel = D('Member/Shop');
        // $this->shopModel = D('Member/Shop');
        $this->pageModel = D('ShopPage');

        $Jssdk = new \Jssdk();
        $sign = $Jssdk->getSignPackage();
        $this->assign('sign',$sign);


    }
    public function index(){
        $cateid = I('cateID','');
        $domain = I('dom', '');
        // for order
        $orderby = I('order', '');
        $order = '';
        $searchkey=I('searchkey');
        $where['status']=10;
        $where['isdelete']=0;

        $shop = $this->shopModel->where(array('domain'=>$domain))->find();
        if(!$shop) $this->error('店铺不存在');



        if (!empty($orderby)) {
            if (substr($orderby, 0, 1) == '_') {
                $orderby = substr($orderby, 1, strlen($orderby) - 1);
                $order = ' desc';
            }

            switch($orderby) {
                case 'sell':
                    $order = 'count_sold'.$order;
                    break;
                case 'new':
                    $order = 'starttime'.$order;
                    break;
                case 'price':
                    $order = 'min_price'.$order;
                    break;
                case 'collect':
                    $order = 'count_collected'.$order;
                    break;
                default:
                    $order = '';
                    break;
            }
        }
      if(!empty($cateid)){
            //获取产品列表
            $product_ids = D('Seller/ShopinCategory')->getProducts($cateid);
            // $product_ids = explode(",", $product_ids);

            if(!empty($product_ids)){
              $where['id']=array('IN',$product_ids);
              //$productList = $this->model->where(array('status'=>'10','isdelete'=>'0','id'=>array('IN',$product_ids)))->order($order)->select();
               $productList = $this->model->where($where)->order($order)->select();
              $this->assign("productList",$productList);
            }
            //获取分类路径

            $userid = D("Seller/ShopinCategory")->getFieldById($cateid,'userid');
            $catepath = D("Seller/ShopinCategory")->getPath($cateid,"");
            $this->assign('catepath',$catepath);

        }
        elseif (!empty($domain)) {
            //$shop = $this->shopModel->where(array('domain'=>$domain))->find();
            if (!empty($shop['id'])) {
              $where['shopid']=$shop['id'];
              $userid=$shop['uid'];
                //$productList = $this->model->where(array('shopid'=>$shop['id'],'isdelete'=>'0','status'=>'10'))->order($order)->select();
              $productList = $this->model->where($where)->order($order)->select();

                $this->assign("productList", $productList);
            }
        }


        
        $page = $this->pageModel->where(array('uid'=>$userid,'type'=>'home'))->find();
        $page['setting'] = unserialize($page['setting']);
        $this->assign('pageid',$page['id']);
        $this->assign('layout',$page['setting']['layout']);
        $this->assign('page',$page);
        $this->assign('shopInfo',$shop);
        $this->display();
    }
    public function show(){
      //宝贝ID
        $uid=$this->userid;
        $shopyear=$this->shopModel->where(array('uid'=>$uid))->getField('years');
      //宝贝数据
        $id=I('id');
        $studioinfo=$this->getstudioinfo($id);
         //var_dump($studioinfo);exit;
        if($this->userid){
       $this->addurl($id);
     }
        $type=I('type');
        $commentcount=M('CommentProduct')->where(array('product_id'=>$id,'scores'=>0,'state'=>0))->count();
        $comments=M('CommentProduct')->where(array('product_id'=>$id,'state'=>0))->count();
        $this->assign("comments",$comments);
        $list=$this->getSameCate($id);
        $this->assign("commentcount",$commentcount);
        $this->assign('list',$list);
        $result = $this->model->where(array('id'=>$id, 'isdelete'=>0, 'status'=>10))->find();
      if(empty($result)){
        $this->error('错误！产品已经下架或者被删除!');
      }
      //还原图片
      $result['picture'] = explode(',',$result['picture']);
      $result['service_promise'] = unserialize($result['service_promise']);
      //获取价格区间
      $priceRange = $this->getPriceRange($result['price_json']);
      //获取店铺信息
      $shopInfo = $this->shopModel->getInfoByProductID($id);

      //$number = ($result["number"] - $result['count_sold'] >0)?($result["number"] - $result['count_sold']):0;
      $number = $result['number'];
      $years=$this->getYears($id);

      // 获取 店内宝贝列表
      $hotSoldProd = $this->model->where(array('shopid'=>$shopInfo['id'], 'isdelete'=>0, 'status'=>10))->order('count_sold desc')->limit(6)->select();
      $hotCollectedProd = $this->model->where(array('shopid'=>$shopInfo['id'], 'isdelete'=>0, 'status'=>10))->order('count_collected desc')->limit(6)->select();

      // 获取当前用户是否收藏本店铺
      $userid=$this->userid;
      $shopid=$shopInfo['id'];
      //var_dump($isshop);
      //var_dump($id);
      $iscollected=$this->collectionModel->where(array('itemid'=>$id,'uid'=>$userid,'type'=>1))->getField('isdelete');
      $isshop=$this->collectionModel->where(array('itemid'=>$shopid,'uid'=>$userid,'type'=>2))->getField('isdelete');
      $this->assign('isshop',$isshop);
      $this->assign('iscollected',$iscollected);
      //$num=$this->
      $this->assign("studioinfo",$studioinfo);
      $this->assign('shopyear',$shopyear);
      $this->assign('years',$years);
      $this->assign('shopInfo',$shopInfo);
      $this->assign('priceRange',$priceRange);
      $this->assign('hotSold', $hotSoldProd);
      $this->assign('hotCollected', $hotCollectedProd);
      //获取属性键对
      $key_Array= $this->getProperty($result);
      $this->assign('key_Array',$key_Array);
      $nokey_Array=$this->getnokey($result);
      $this->assign('nokey_Array',$nokey_Array);
      $this->assign('data',$result);

      $page = $this->pageModel->where(array('uid'=>$shopInfo['uid'],'type'=>'home'))->find();
      $page['setting'] = unserialize($page['setting']);
      $this->assign('pageid',$page['id']);
      $this->assign('layout',$page['setting']['layout']);

      $category = D("ShopinCategory")->where(array('userid'=>$shopInfo['uid'],'pid'=>0))->order('listorder asc')->select();
      foreach($category as $k=>$v){
          $category[$k]['son'] = D("ShopinCategory")->where(array('pid'=>$v['id']))->order('listorder asc')->select();
      }
      $domain = D('Member/Shop')->where(array('uid'=>$result['uid']))->getField('domain');
      $this->assign("id",$id);
      $this->assign("number",$number);
      $this->assign('domain',$domain);
      $this->assign('category',$category);
      $this->assign('page',$page);

      //设计详情页
      if(!empty($result['designtype'])){
        //获取设计师信息
        $this->assign('designer',M('Designer')->where(array('id'=>$result['designer_name']))->find());
        //解析设计服务信息数据
        $this->assign('service_added', unserialize($result['service_added']));
        //效果图
        $this->assign('pictype_effect',unserialize($result['pictype_effect']));
        // CAD图
        $this->assign('pictype_cad',   unserialize($result['pictype_cad']));

        $this->display("showDesign");exit;
      }else if(!empty($result['workername'])){//工人详情页
        $this->display("showWorker");exit;
      }else{//产品页
        //获取当前宝贝地址信息
        $productAddr = $this->getAddr($id);
        $this->assign('productAddr',$productAddr);
        $this->display("showProduct");exit;
      }

    }
    public function worker(){
      $id = I('id');
      $result = $this->workerModel->where(array('id'=>$id))->find();
      $result['picture'] = explode(',',$result['picture']);
      $this->assign('data',$result);
      $this->display('show');
    }
    //解析价格数组，获取价格最大值和最小值
    private function getPriceRange($priceJson){
      if(empty($priceJson)){return false;}
      $price_Array = json_decode($priceJson);
      if(empty($price_Array)){return false;}
      $range = array();
      $range['price_min'] = 0;
      $range['price_max'] = 0;
      $range['price_act_min'] = 0;
      $range['price_act_max'] = 0;
      foreach ($price_Array as $key => $value) {
          if((float)($value->price) <= $range['price_min'] ||  $range['price_min'] === 0){
            $range['price_min'] = (float)($value->price);
          }
          if((float)($value->price) >= $range['price_max']){
            $range['price_max'] = (float)($value->price);
          }
          if((float)($value->price_act) <= $range['price_act_min'] || $range['price_act_min'] === 0){
            $range['price_act_min'] = (float)($value->price_act);
          }
          if((float)($value->price_act) > $range['price_act_max']){
            $range['price_act_max'] = (float)($value->price_act);
          }
      }
      return $range;
    }
    //获取属性键对
    private function getProperty($data){
      $key_Array = unserialize($data['key_prop']);
      //$nokey_Array = unserialize($data['nokey_prop']);
      $property = null;
      if(empty($key_Array)){
        return "";
      }
      foreach ($key_Array as $key => $value) {
        $key_data = $this->propmodel->where(array('cid'=>$data['cid'],'pid'=>$key))->getField('name');

        $key_prop=$this->valueModel->where(array('cid'=>$data['cid'],'vid'=>$value))->getField('name');

        $property = $property.$key_data.":<span>".$key_prop."</span>";
      }
      return  $property;
    }
    private function getnokey($data){
     $nokey_Array = unserialize($data['nokey_prop']);

      $nokey=array();
      foreach ($nokey_Array as $key => $value) {
        $nokey_data=$this->propmodel->where(array('cid'=>$data['cid'],'pid'=>$key))->find();
        if($nokey_data['is_enum_prop'] == '1'){
          if($nokey_data['multi'] =='1'){
            $nokey_prop=$this->valueModel->where(array('cid'=>$data['cid'],'pid'=>$key,'vid'=>array('in',$value)))->getField('name',true);
            if(!empty($nokey_prop)){
              $nokey[$key] = $nokey_data['name'].":".implode("/",$nokey_prop);
            }
          }else{
            $nokey_prop=$this->valueModel->where(array('cid'=>$data['cid'],'pid'=>$key,'vid'=>$value))->getField('name');
            if(!empty($nokey_prop)){
              $nokey[$key] = $nokey_data['name'].":<span>".$nokey_prop."</span>";
            }
          }
        }else{
          $nokey[$key] = $nokey_data['name'].":<span>".$value."</span>";
        }
      }
    return $nokey;
}
    //获取宝贝的地址内容
    public function getAddr($productId){
        if(empty($productId)){return false;}
        $addrs = $this->model->where(array('id'=>$productId))->getField('details');
        $addrs = unserialize($addrs);
        if(!empty($addrs)){
          $list = implode(",", $addrs);
          $where['id'] = array('IN',$list);
          if(!empty($list)){
            $addrs = M('SellerAddr')->where($where)->order(array('default'=>'desc'))->select();
          }
          return $addrs;
        }else{//没有勾选地址的使用默认地址
           $uid = $this->model->where(array('id'=>$productId))->getField('uid');
           return  M('SellerAddr')->where(array('uid'=>$uid,'default'=>'1'))->order(array('addtime'=>'desc'))->limit(1)->select();
        }
        return null;
    }
    //获取同类商品
    public function getSameCate($productId){
       if(empty($productId)){return false;}

       $cid = $this->model->where(array('id'=>$productId))->getField('cid');
       $uid=$this->model->where(array('id'=>$productId))->getField('uid');

       $result=$this->model->where(array('cid'=>$cid,'uid'=>$uid,"isdelete"=>'0',"status"=>"10"))->limit(7)->order('id desc')->select();
      return $result;

    }
    //获取设计师信息
    public function getDesignerInfo($result){
      if(empty($result)){return false;}
      if(!empty($result['designtype'])){
        return M("Designer")->where(array('id'=>$result['designer_name'],'status'=>'1','service_status'=>'1'))->find();
      }
    }
    public function getYears($id){
     $uid=$this->model->where(array('id'=>$id))->getField('uid');
     $year=$this->shopModel->where(array('uid'=>$uid))->getField('years');
     return $year;

    }
    public function collecton(){

        $uid=$this->userid;
        $itemid=I('productid');//产品id
        $type=I('type');
        $is_delete=I('is_delete');
        $collection=array(
          'uid'=>$uid,
          'itemid'=>$itemid,
          'type'=>$type,
          'addtime'=>time(),
          'isdelete'=>$is_delete
        );
        if ($this->collectionModel->where(array('itemid'=>$itemid,'type'=>$type, 'uid'=>$uid))->count() > 0) {
            $result=$this->collectionModel->where(array('itemid'=>$itemid, 'uid'=>$uid))->data($collection)->save();
        } else {
            $result=$this->collectionModel->data($collection)->add();
        }

        if($result){
            $this->ajaxReturn(array('status'=>1,'infor'=>'收藏成功', 'isdelete'=>$is_delete));
        }else{
            $this->ajaxReturn(array('status'=>0,'infor'=>'失败'));
        }
}
    public function deleproduct(){
     $uid=$this->userid;
     $productid=I('productid');
      $type=I('type');
     $result=$this->collectionModel->where(array('itemid'=>$productid,'type'=>$type,'uid'=>$uid))->delete();
     if($result){
       $this->ajaxReturn(array('status'=>1,'infor'=>'取消成功'));
     }else{
       $this->ajaxReturn(array('status'=>0,'infor'=>'取消失败'));
     }
    }


      //  public function collectonshop(){
      //   $collecton=array();
      //   $uid=$this->userid;
      //   $shopid=I('shopid');//产品id
      //   $type=I('type');
      //   //$this->ajaxReturn(array('status'=>1, "info"=>$uid));
      //   $is_delete=I("is_delete");
      //    $collection=array(
      //     'uid'=>$uid,
      //   'itemid'=>$shopid,
      //   'addtime'=>date('Y-m-d H:i:s',time()),
      //   'isdelete'=>$is_delete,
      //   'type'=>$type
      //   );

      //   if ($this->collectionModel->where(array('itemid'=>$shopid,'type'=>$type, 'uid'=>$uid))->count() > 0) {


      //       $result1=$this->collectionModel->data($collection)->where(array('itemid'=>$shopid, 'uid'=>$uid))->save();
      //   } else {

      //       $result1=$this->collectionModel->data($collection)->add();
      //   }

      //   if($result1){
      //       $this->ajaxReturn(array('status'=>1,'infor'=>'收藏成功','isdelete'=>$is_delete));
      //   }else{
      //       $this->ajaxReturn(array('status'=>0,'infor'=>'失败'));
      //   }
      // }

      public function deleshop(){
        $shopid=I("shopid");
        $type=I('type');
         $result=$this->collectionModel->where(array('itemid'=>$shopid,'type'=>$type))->delete();
          // $this->ajaxReturn(array('status'=>1, "info"=>$result));
          if($result){
         $this->ajaxReturn(array('status'=>1,'infor'=>'取消成功'));
       }else{
         $this->ajaxReturn(array('status'=>0,'infor'=>'取消失败'));
       }
      }
    public function addurl($id){
        $uid=$this->userid;
        $message=array('uid'=>$uid,
            'urlid'=>$id,
            'addtime'=>time(),
        );
        $existence=M('Url')->where(array('uid'=>$uid,'urlid'=>$id))->select();
        $exit=M('Url')->where(array('uid'=>$uid))->count();
        if($exit<=30) {
            if (!$existence && $id != 0) {
                $result1 = M('Url')->data($message)->add();
            } else {
                $result1 = M('Url')->where(array('urlid' => $id, 'uid' => $uid))->setField('addtime', time());
            }
        }else{
            $del=M('Url')->where(array('uid'=>$uid))->order('addtime desc')->delete();
            $result1 = M('Url')->data($message)->add();
        }
    }


     public function searchself(){
        $pagenum = I('get.page','1','');
        $shopid=I("get.shopid","");
         $shopInfo=M('Shop')->where(array('id'=>$shopid))->find();
         $search_key = I('get.searchkey', '');
        if($search_key == '') {
            redirect(U('Index/index'));
        }
        $where['isdelete']=0;
        $where['shopid']=$shopid;
        $where['title']=array("like",'%'.$search_key.'%');
        $where['status']=10;
        $product=M('Product')->where($where)->select();
        $count=count($product);
        $page = new \Libs\Util\Page($count,$this->PageSize,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
        $productdata = M('Product')->where($where)->page($pagenum.','.$this->PageSize)->select();
        foreach ($productdata as $key => $value) {
          $productdata[$key]['commnum']=M("CommentProduct")->where(array("product_id"=>$value['id']))->count();
        }
         $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign("productList",$productdata);
        $this->assign("shopInfo",$shopInfo);
        $this->assign("pageinfo", $pageinfo);
        $this->display("Shop/Product/index");
    }


     public function navsearch(){
        $pagenum = I('get.page','1','');
        $search_key = I('get.searchkey', '');
        $domain=I("dom");
        $shopid=I("shopid");
        if(!empty($domain)){
        $shopInfo=M('Shop')->where(array('domain'=>$domain))->find();
        $where['shopid']=$shopInfo['id'];
    }else{
         $shopInfo=M('Shop')->where(array('id'=>$shopid))->find();
        $where['shopid']=$shopid;
    }
        $where['status']=10;
        $where['isdelete']=0;
        $order=I("order","");
        $where['title']=array("like",'%'.$search_key.'%');
        $productList=M('Product')->where($where)->order("$order desc")->select();
        $count=count($productList);
        $page = new \Libs\Util\Page($count,$this->PageSize,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
        $productdata = M('Product')->where($where)->order("$order desc")->page($pagenum.','.$this->PageSize)->select();
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
        $this->assign("shopInfo",$shopInfo);
        $this->assign("pageinfo", $pageinfo);
        $this->assign("productList",$productdata);
        $this->display("Shop/Product/index");
    }

    public function datasearch(){
      $pagenum = I('get.page','1','');
      $shopid=I("shopid","");
      $shopInfo=M('Shop')->where(array('id'=>$shopid))->find();
      $min=I("min","");
      $max=I("max",'');
      $where['status']=10;
      $where['isdelete']=0;
      $where['shopid']= $shopid;
      $where["min_price"]=array("between",array($min,$max));
      //$where["min_price"]=array("elt",$max);
      $product=M('Product')->where($where)->order("min_price desc")->select();
      $count=count($product);
      $page = new \Libs\Util\Page($count,$this->PageSize,$pagenum);
      $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
      $productdata = M('Product')->where($where)->order("min_price desc")->page($pagenum.','.$this->PageSize)->select();
      $this->assign("shopInfo",$shopInfo);
      $this->assign("pageinfo", $pageinfo);
      $this->assign("productList",$productdata);
      $this->display("Shop/Product/index");


    }


    public function shopmore(){
       $pagenum = I('get.page','1','');
       $shopid=I("shopid");
       $shopInfo=M('Shop')->where(array('id'=>$shopid,'status'=>1,'isdelete'=>0))->find();
       $count=$this->model->where(array('shopid'=>$shopid,'status'=>10))->order("addtime desc")->count();
      $page = new \Libs\Util\Page($count,$this->ShopSize,$pagenum);
      $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
      $productdata = M('Product')->where(array('shopid'=>$shopid,'status'=>10))->order("addtime desc")->page($pagenum.','.$this->ShopSize)->select();
      $pageinfo["page"] = $page->show('sellercenter');
      $pageinfo['count'] = $count;
      $this->assign("shopInfo",$shopInfo);
      $this->assign("pageinfo", $pageinfo);
      $this->assign("productList",$productdata);
      $this->display();
    }

    public function getstudioinfo($id){
       $cid=M("Product")->where(array('id'=>$id))->getField("cid");

      $orderid=M("OrderGoods")->where(array('goods_id'=>$id))->getField("order_id",true);
       foreach ($orderid as $key => $value) {
         $order_sn=M("Order")->where(array('order_id'=>$value))->find();
         $studio=M("Studio")->where(array('order_sn'=>$order_sn['order_sn']))->find();

         if(!empty($studio)){
         $studio[$key]['studiocomment']=M("studioComment")->where(array('studioid'=>$studio[$key]['id']))->select();
         $studio[$key]['picture']=explode(",", $studio[$key]['picture']);
         $memberinfo=M("Member")->where(array("userid"=>$studio[$key]['publishid']))->find();
         $studio[$key]['sellername']=$memberinfo['username'];
         $studio[$key]['userpic']=$memberinfo["userpic"];
         $studio[$key]['about']=$memberinfo['about'];
         $studio[$key]['name']=$name;
         $studio[$key]['struction_content']=explode(",", $studio[$key]['struction_content']);
         $studio[$key]['coustomername']=M("Member")->where(array("userid"=>$studio[$key]['userid']))->getField("username");

       }
     }

       if(!empty($studio)){
      $name=M("ProductCategory")->where(array('cid'=>$cid))->getField("name");
      return $studio;
      }else{
       return $studio;
     }
    }
    public function teamworker(){
      //域名
      $domain = I('get.domain',null);
      //店铺信息
      $shop = $this->shopModel->where(array('domain'=>$domain))->find();
      //店铺铺设计师信息
      // $desiner = M('Designer')->where(array('uid'=>$shop['uid']))->select();
      //合作工长,主材包,辅材包
      $teamworker = $this->model->where(array('cid'=>array('IN','103,124886059,124886060'),'uid'=>$shop['uid'],'shopid'=>$shop['id'],'isdelete'=>'0','status'=>'10'))->select();
      $this->assign('teamworker',$teamworker);
      $this->assign('shop',$shop);
      $this -> display();
    }
}

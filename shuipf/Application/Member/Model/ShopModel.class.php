<?php

// +----------------------------------------------------------------------
// | 会员设置管理
// +----------------------------------------------------------------------
// | Author: 李博凯 <lbk747@163.com>
// +----------------------------------------------------------------------

namespace Member\Model;

use Common\Model\Model;

class ShopModel extends Model {

    const STATUS_VALID = 99;//正常使用
    const STATUS_LOCKED = -1;//管理员锁定
    const STATUS_REGISTERING = 1;//注册中

    protected $_validate = array(
        array('uid', 'require', '未登录',1,'',1),
        array('uid', '', '已创建过店铺！', 0, 'unique', 1),
        array('username', 'require', '未登录',1,'',1),
        array('username', '', '该用户名已创建过店铺！', 0, 'unique', 1),
    );
    protected $_auto = array ( 
         array('status','1',1),
         array('addtime','time',1,'function') ,
         array('updatetime','time',3,'function'),
        array('telphone','serialize',3,'function')
    );
    protected function getUserid(){
      return (int) service("Passport")->userid;
    }
    protected function getUsername(){
      return service("Passport")->username;
    }

    /**
    * @name 根据分类开店
    * @param string $catid
    **/
    public function addshop($catid){
      $cate = M('ShopCategory')->where(array('status'=>1))->find($catid);
      if(!$cate) return false;
      $uid = (int) service("Passport")->userid;
      $username = service("Passport")->username;
      $data = array(
        'uid'=>$uid,
        'username'=>$username,
        'catid'=>$catid,
      );
      D('Member/Member')->where(array('userid'=>$uid))->setField('type',$cate['type']);
      $shop = $this->where(array('uid'=>$uid))->find();
      if($shop){
        $this->where(array('uid'=>$uid))->save($data);
        return true;
      }else{
        if(!$this->create($data)) return false;
        $shopid = $this->add();
        if(!$shopid) return false;
        $this->addShopPage($uid,$shopid);
        return true;
      }
    }
    /**
    * @name 验证店铺名称是否可用
    **/
    public function checkName($name){
      $uid = (int) service("Passport")->userid;
      if(!$name) return false;
      $shop = $this->where(array('name'=>$name,"uid"=>array("NEQ",$uid)))->find();
      if($shop) return false;
      return true;
    }
    /**
    * @name 验证域名是否可用
    **/
    public function checkDomain($domain){
      $uid = (int) service("Passport")->userid;
      if(!$domain) return false;
      if($this->where(array('domain'=>$domain,"uid"=>array("NEQ",$uid)))->find()){
        return false;
      }

      return true;
    }
    /**
    * @name 检测是否开过店铺
    **/
    public function checkShop($uid){
      if(!$uid) return false;
      $shop = $this->where(array('uid'=>$uid))->find();
      if(!$shop) return false;
      return true;
    }
    public function getCatpidById($id){
      if(!$id) return false;
      $catid = $this->getFieldById($id,'catid');
      return D('ShopCategory')->getFieldById($catid,'pid');
    }
    public function addShopPage($uid,$type='home'){
        $shopid = $this->getFieldByUid($uid,'id');
        $data = array(
            'uid'=>$uid,
            'type'=>'home',
            'shopid'=>$shopid,
            'addtime'=>time(),
            'updatetime'=>time(),
        );
        $pageid = M('ShopPage')->data($data)->add();
        if(!$pageid) return false;
        $this->addShopLayout($uid,$pageid);
        return true;
    }
    public function addShopLayout($uid,$pageid){
        $shopid = $this->getFieldByUid($uid,'id');
        $block_hd = M('ShopBlock')->data(array('uid'=>$uid,'shopid'=>$shopid,'type'=>'mall','pageid'=>$pageid,'position'=>0,'addtime'=>time(),'updatetime'=>time()))->add();
        $block1 = M('ShopBlock')->data(array('uid'=>$uid,'shopid'=>$shopid,'type'=>'mall','pageid'=>$pageid,'position'=>0,'addtime'=>time(),'updatetime'=>time()))->add();
        $block2 = M('ShopBlock')->data(array('uid'=>$uid,'shopid'=>$shopid,'type'=>'slmr','pageid'=>$pageid,'position'=>1,'addtime'=>time(),'updatetime'=>time()))->add();

        $layout = array(
          'hd'=>array(
            array(
              'blockid'=>$block_hd,
              'classname'=>"mall",
              'subcol'=>array(),
              'maincol'=>array(
                array(
                  'widgetid'=>M("ShopModule")->data(array('wtype'=>'h950','uid'=>$uid,'pageid'=>$pageid,'blockid'=>$block_hd,'compid'=>8820,'side'=>'main','position'=>0,'addtime'=>time(),'updatetime'=>time()))->add(),
                  'compid'=>8820,
                  'towtype'=>'h950',
                  'title'=>'店铺招牌',
                  'data-ismove'=>1,
                  'data-isdel'=>1,
                  'data-isadd'=>1,
                  'data-isedit'=>1,
                ),
                array(
                  'widgetid'=>M("ShopModule")->data(array('wtype'=>'h950','uid'=>$uid,'pageid'=>$pageid,'blockid'=>$block_hd,'compid'=>8821,'side'=>'main','position'=>1,'addtime'=>time(),'updatetime'=>time()))->add(),
                  'compid'=>8821,
                  'towtype'=>'h950',
                  'title'=>'导航',
                  'data-ismove'=>0,
                  'data-isdel'=>0,
                  'data-isadd'=>0,
                  'data-isedit'=>0,
                ),
              ),
            ),
          ),
          'bd'=>array(

            array(
              'blockid'=>$block1,
              'classname'=>'mall',
              'maincol'=>array(
                array(
                  'widgetid'=>M("ShopModule")->data(array('wtype'=>'h950','uid'=>$uid,'pageid'=>$pageid,'blockid'=>$block1,'compid'=>8805,'side'=>'main','position'=>0,'addtime'=>time(),'updatetime'=>time()))->add(),
                  'compid'=>8805,
                  'towtype'=>'h950',
                  'title'=>'自定义内容区',
                  'data-ismove'=>1,
                  'data-isdel'=>1,
                  'data-isadd'=>1,
                  'data-isedit'=>1,
                ),
              ),
              'subcol'=>array(
                
              ),
            ),
            array(
              'blockid'=>$block2,
              'classname'=>'slmr',
              'subcol'=>array(
                array(
                  'widgetid'=>M("ShopModule")->data(array('wtype'=>'b190','uid'=>$uid,'pageid'=>$pageid,'blockid'=>$block2,'compid'=>8803,'side'=>'sub','position'=>0,'addtime'=>time(),'updatetime'=>time()))->add(),
                  'compid'=>8803,
                  'towtype'=>'b190',
                  'title'=>'宝贝分类',
                  'data-ismove'=>1,
                  'data-isdel'=>1,
                  'data-isadd'=>1,
                  'data-isedit'=>1,
                ),
                array(
                  'widgetid'=>M("ShopModule")->data(array('wtype'=>'b190','uid'=>$uid,'pageid'=>$pageid,'blockid'=>$block2,'compid'=>8802,'side'=>'sub','position'=>1,'addtime'=>time(),'updatetime'=>time()))->add(),
                  'compid'=>8802,
                  'towtype'=>'b190',
                  'title'=>'宝贝排行榜',
                  'data-ismove'=>1,
                  'data-isdel'=>1,
                  'data-isadd'=>1,
                  'data-isedit'=>1,
                ),
                array(
                  'widgetid'=>M("ShopModule")->data(array('wtype'=>'b190','uid'=>$uid,'pageid'=>$pageid,'blockid'=>$block2,'compid'=>8812,'side'=>'sub','position'=>2,'addtime'=>time(),'updatetime'=>time()))->add(),
                  'compid'=>8812,
                  'towtype'=>'b190',
                  'title'=>'本店搜索',
                  'data-ismove'=>1,
                  'data-isdel'=>1,
                  'data-isadd'=>1,
                  'data-isedit'=>1,
                ),
                array(
                  'widgetid'=>M("ShopModule")->data(array('wtype'=>'b190','uid'=>$uid,'pageid'=>$pageid,'blockid'=>$block2,'compid'=>8808,'side'=>'sub','position'=>3,'addtime'=>time(),'updatetime'=>time()))->add(),
                  'compid'=>8808,
                  'towtype'=>'b190',
                  'title'=>'客服中心',
                  'data-ismove'=>1,
                  'data-isdel'=>1,
                  'data-isadd'=>1,
                  'data-isedit'=>1,
                ),
              ),
              'maincol'=>array(
                array(
                  'widgetid'=>M("ShopModule")->data(array('wtype'=>'b190','uid'=>$uid,'pageid'=>$pageid,'blockid'=>$block2,'compid'=>8806,'side'=>'main','position'=>0,'addtime'=>time(),'updatetime'=>time()))->add(),
                  'compid'=>8806,
                  'towtype'=>'b190',
                  'title'=>'图片轮播',
                  'data-ismove'=>1,
                  'data-isdel'=>1,
                  'data-isadd'=>1,
                  'data-isedit'=>1,
                ),
                array(
                  'widgetid'=>M("ShopModule")->data(array('wtype'=>'b190','uid'=>$uid,'pageid'=>$pageid,'blockid'=>$block2,'compid'=>8805,'side'=>'main','position'=>1,'addtime'=>time(),'updatetime'=>time()))->add(),
                  'compid'=>8805,
                  'towtype'=>'b190',
                  'title'=>'自定义内容区',
                  'data-ismove'=>1,
                  'data-isdel'=>1,
                  'data-isadd'=>1,
                  'data-isedit'=>1,
                ),
              ),
            ),

          ),
          'ft'=>array(
            
          ),
        );
        M("ShopPage")->where(array('id'=>$pageid))->data(array('setting'=>serialize(array('layout'=>$layout))))->save();
        return true;
    }


    //验证后台修改店铺信息是否合法
    public function checkdata($data){
      if(empty($data['name']) || empty($data['domain'])) return -1;
      if($this->where(array('name'=>$data['name'],"uid"=>array("NEQ",$data['uid'])))->find()){
    	return -2;}
      if($this->where(array('domain'=>$data['domain'],"uid"=>array("NEQ",$data['uid'])))->find()){
    	return -3;}
      $shopinfo = $this->where(array('id'=>$data['id']))->find();
      if(($shopinfo['catid'] != $data['catid']) && $this->checkProduct($data['id'])){//是否已经发布给宝贝
        return -4;
      }
      if($shopinfo['name'] !=$data['name'] && $this->checkOrder($data['id'])){//修改店铺名称，近期内有无交易
        return -5;
      }
      return 1;
    }
    //检测当前店铺是否发布过宝贝
    public function checkProduct($id){
      // $w = M('Product')->where(array('shopid'=>$id))->count();
      // $p = M('Product')->where(array('shopid'=>$id))->count();
      $m = M('Product')->where(array('shopid'=>$id))->count();
      return (($w+$p+$m)>0)?true:false;
    }
    //根据产品获取店铺信息
    public function getInfoByProductID($id){
      if(empty($id)){return false;}
      $uid = M('Product')->where(array('id'=>$id))->getField('uid');
      if(empty($uid)){return false;}
      return $this->where(array('uid'=>$uid))->find();
    }
    //根据店铺类型修改member表type类型
    public function changeType($uid){
      if(empty($uid)){return false;}
      $catid = $this->where(array('uid'=>$uid))->getField('catid');
      $type  = D('ShopCategory')->getFieldById($catid,'type');
      return D('Member/Member')->where(array('userid'=>$uid))->setField('type',$type);
    }
    //当前店铺是否在近期发生有效交易
    public function checkOrder($id){
      date_default_timezone_set("Asia/Shanghai");
      $count = M('Order')->where(array('shop_id'=>$id,'order_state'=>array("EGT",'20'),'addtime'=>array("EGT",strtotime("-10 Days"))))->count();
      // echo M('Order')->getLastSql();
      return ($count >0)?true:false;
    }
}

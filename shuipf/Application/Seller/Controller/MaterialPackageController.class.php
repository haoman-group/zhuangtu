<?php
//主材包
namespace Seller\Controller;

class MaterialPackageController extends SellerbaseController {
      protected $model = null;
    protected $proCate = null;
    protected $property = null;
    protected $shopin = null;
    protected function _initialize(){
        parent::_initialize();
        $this->model = D('Product');
        //产品分类表
        $this->proCate = D('Admin/ProductCategory');
        $this->property = D('Seller/ProductProperty');
        $this->shopin=M('ShopinCategory');
        // C('TOKEN_ON',true);
    }
    
    public function add(){
      $category=$this->shopin->where(array('userid'=>$this->userid,'pid'=>0))->select();
      foreach ($category as $key => $value) {
       $category[$key]['son']=$this->shopin->where(array('userid'=>$this->userid,'pid'=>$value['id']))->select();
      }
       $this->assign('category',$category);
      
     
      if(IS_POST){
        //var_dump(IS_POST);exit;
        // if(!$this->model->autoCheckToken($_POST)){
        //   $this->error('请勿重复提交！');
        //   redirect('Product/addMaterial');
        // }
         

        $maxpro = $this->model->where(array('uid'=>$this->userid))->order('id desc')->find();
        if($maxpro['addtime']>(time()-3)){
            $this->error('请勿重复提交');
        }
        $data = $this->_procData();
        if(!$this->model->create($data)){
            $this->error('提交失败:'.$this->model->getError());
        }
        $proid = $this->model->add();
        if(!$proid) $this->error('提交失败');

        $this->success('提交成功',"javascript:history.back(-1);");

      }else{
        //删除模板session
        session('detail_template',null);
        $Addr = M("SellerAddr");
        $result =$Addr->where(array('uid'=>$this->userid))->select();
         //$result = $this->model->where(array('uid'=>$this->userid))->select('SellerAddr');
         $this->assign("list",$result);
        //获取类目CID
        $cid = I('get.inpcid');
        
        //获取类目名称
        $this->assign('categoryName',$this->proCate->getFieldByCid($cid,'name'));
        //获取属性
        $this->assign('property',$this->property->getProperty($cid));
        // var_dump($this->property->getProperty($cid));
        $this->display('MaterialPackage/addmaterialpackage');
      }
    }
    public function edit(){
      $id = I('get.id');
      if(IS_POST){
        if(!$this->model->where(array('id' => $id))->count()){
          $this->error('数据不存在！');
        }
        else{
            //删除模板session
            session('detail_template',null);
          $data = $this->_procData();
          $data['id'] = $id;
          $data['auditstatus'] = 2;  //任何修改操作 都将审核状态置为“2-待处理”

          if(!$this->model->create($data)){
            $this->error('提交失败:'.$this->model->getError());
          }
          //过滤Cid、vid字段，不更新这两个字段
          $result = $this->model->where(array('id' => $id))->field('vid,cid,uid,shopid',true)->save();
          $this->success('提交成功','javascript:history.back(-1);');
          return;
        }
      }
        $data = $this->model->where(array('id'=>$id))->find();
          $Addr = M("SellerAddr");
           $result =$Addr->where(array('uid'=>$this->userid))->select();
         //$result = $this->model->where(array('uid'=>$this->userid))->select('SellerAddr');
       
        //反序列化宝贝属性值
        $data['key_prop'] = unserialize($data['key_prop']);
        $data['starttime'] = date("Y-m-d h:i:s", $data['starttime']);
        //$data['details'] = unserialize($data['details']);
        //var_dump($data['details']);
        $data['sale_prop'] = unserialize($data['sale_prop']);
        $data['nokey_prop'] = unserialize($data['nokey_prop']);
        $data['custom_prop'] = unserialize($data['custom_prop']);
        $data['service_promise'] = unserialize($data['service_promise']);
       // $data['delivery'] = unserialize($data['delivery']);
        //$data['setup'] = unserialize($data['setup']);
        $data['details'] = unserialize($data['details']);
        $data['showecplay'] = htmlspecialchars_decode($data['showecplay']);
        $data['show'] = htmlspecialchars_decode($data['show']);
        $selected_prop = array();
        $selected_pics = array();
        $data['price_json'] = json_decode($data['price_json'], true);
        //颜色数组
        $colorArray =  array();
        $rowspanArray = array();
        foreach($data['price_json'] as $pkey => $pvalue) {
            foreach($pvalue as $key => $value) {
                if (array_key_exists('vid', $value)){
                    if (!array_key_exists($key, $selected_prop)) {
                        $selected_prop[$key] = array(); // selected_prop = { 分类名称: [已选分类元素列表]}
                    }

                    // 设置rowspan
                    if (!array_key_exists($key, $rowspanArray)) {
                        $rowspanArray[$key] = $pkey;
                    }
                    $data['price_json'][$pkey][$key]['rowspan'] = 1;
                    if ($data['price_json'][$rowspanArray[$key]][$key]['vid'] == $value['vid']) {
                        if ($rowspanArray[$key] != $pkey) {
                            $data['price_json'][$rowspanArray[$key]][$key]['rowspan'] += 1;
                            $data['price_json'][$pkey][$key]['rowspan'] = 0;
                        }
                    } else {
                        $rowspanArray[$key] = $pkey;
                    }
                    //判断属性名是否还有汉字
                    if(preg_match("/[\x7f-\xff]/", $key)){
                      $colorArray[$value['idx']] = $value['txt'];
                    }
                    array_push($selected_prop[$key], $value['vid']);
                    if (array_key_exists('pictures', $value) && !array_key_exists($key, $selected_pics)) {
                        $selected_pics[$value['vid']] = array();
                        foreach($value['pictures'] as $ikey=>$ivalue) {
                            $selected_pics[$value['vid']][(string)mt_rand(0, 10000)] = $ivalue;
                            //selected_pics = {颜色vid : {随机数字:图片地址, 随机数字:图片地址}}
                        }
                    }
                }
            }
        }
        $this->assign("list",$result);
        $this->assign('data',$data);
        $this->assign("id",$id);
        //图像处理
        $this->assign('picture_urls',explode(",",$data['picture']));
        //获取类目名称
        $this->assign('categoryName',$this->proCate->getFieldByCid($data['cid'],'name'));
        //获取属性分类和属性值
        $this->assign('property',$this->property->getProperty($data['cid']));
        // $this->assign('category',$this->_getCateType());
        //已选择宝贝规格属性
        $this->assign('selected_prop', $selected_prop);
        $this->assign('selected_pics', $selected_pics);
        //颜色数组
        $this->assign('colorArray',$colorArray);
        $this->display('MaterialPackage/addmaterialpackage');
    }
     //处理提交数据
    private function _procData(){
        //post数据
        $data = I('post.');
        // echo $data['showecplay'];

        if($data['showway'] == "2"){//高级编辑
          $data['show'] = $data['showecplay'];
        }elseif($data['showway']=='3'){
            if(!$template=session('detail_template')){
                $id = I('get.id');
                if(empty($id)){//新增时必须选择模板
                    $this->error('请先选择模版');
                }
            }
            $data['showecplay'] = $template['content'];
            
        }
          if($data['checklimit'] == -1){
             $data['limitnum']=-1;
          }else{
            if($data['limitnum'] == 0 || $data['limitnum'] == ''){
                // $this->error('限量数不能为空或者限量数必须大于0');
              $data['limitnum']=-1;
            }else{
                $data['limitnum']=I("limitnum");
            }
          }

        // var_dump($data['service_promise']);
        //宝贝图片
        $data['headpic'] = $data['product_picture_url'][0];
        if($data['product_picture_url'] != ""){
          $data['picture'] = implode(',',$data['product_picture_url']); 
        }else{
          $this->error("请选择宝贝图片进行上传！");
        }
        //状态
        $data['status'] = ($data['starttime_type']==1)?Status::STATUS_SELLING:Status::STATUS_NEVER;
        //当前用户
        $data['uid'] = $this->userid;
        //店铺ID
        $data['shopid'] = I('shopid');
        if($data['shopid'] != $this->shopid){
          $this->error("无法提交,您已登陆别的店铺,请先刷新页面!");
        }
        //价格和价格区间
        $data['price_json']='{"0": {"颜色分类": {"计价方式": "主材包", "inpcid": "124886059", "idx": ""}, "pictures": {"0": ""}, "price": "1.00", "barcode": "", "tsc": "", "quantity": "" }}';
        $data['title']='瓷砖工程 木地板工程 橱柜及衣柜工程 壁纸工程 门置工程 集成吊顶工程 灯具开关工程';
       // $data['price_json'] = html_entity_decode($data['price']);
        $data['price_json']='{"0":{"计价方式":{"idx":"11","vid":"","txt":"主材包","listno":0,"pictures":{}},"price":"1.00","price_act":"1.00","quantity":"21","tsc":"","barcode":"","hidden_value":"主材包11"}}';
        // var_dump($data['price_json']);
        //送货服务
        //$data['delivery'] = serialize($data['delivery']);
        $data['details'] = serialize($data['details']);
        //安装服务
       // $data['setup'] = serialize($data['setup']);
        // $data['min_price_ori']=1.00;
        // $data['max_price_ori']=1.00;
        // $data['min_price']=1.00;
        // $data['max_price']=1.00;
        // $data['case_price'] = 0.00;
        // // $data['min_act_price']=1.00;
        // // $data['max_act_price']=1.00;
        $priceArray = json_decode($data['price_json'],true);
        foreach($priceArray as $price){
          //活动价

          if($data['min_price'] == 0){ $data['min_price'] = $price['price_act'] ;}
          if($data['min_price'] > $price['price_act']){ $data['min_price'] = $price['price_act'] ;}
          if($data['max_price'] < $price['price_act']){ $data['max_price'] = $price['price_act'] ;}
          //门店价
          if($data['min_price_ori'] == 0){ $data['min_price_ori'] = $price['price'] ;}
          if($data['min_price_ori'] > $price['price']){ $data['min_price_ori'] = $price['price'] ;}
          if($data['max_price_ori'] < $price['price']){ $data['max_price_ori'] = $price['price'] ;}
        }
        //产品分类
        if(!empty($data['cid'])){
          $data['proptype'] = D('Admin/ProductCategory')->getRootCate($data['cid']);
        }
        return $data;
    }
    protected function _special($data){
        foreach($data as $key => $da){
            $data[$key]['ill_reason'] = unserialize($data[$key]['ill_reason']);
            $data[$key]['num'] = $data[$key]['number'] ;
        }
        return $data;
    }

   public function materialpackagelist(){
      $where['cid']=124886059;
      $where['uid']=$this->userid;
      $where['isdelete']=0;
      $where['status']=10;
      $list=$this->_prepData($where);
      //var_dump($list);exit;
      //$this->assign('list',$list);
   	$this->display();
   }

   public function materialpackageshow(){
   	 $id=I('id');
   	 $data=$this->model->where(array('id'=>$id))->find();
   	 $data['picture']=explode(",", $data['picture']);
   	 $data['service_promise']=unserialize($data['service_promise']);
     $priceRange = $this->getPriceRange($data['price_json']);
     //var_dump($priceRange);exit;
   	 $commentcount=M('CommentProduct')->where(array('product_id'=>$id,'scores'=>0,'state'=>0))->count();
     $comments=M('CommentProduct')->where(array('product_id'=>$id,'state'=>0))->count();
   	 $shopInfo=M('Shop')->where(array('id'=>$data['shopid']))->find();
   	 $list=$this->model->where(array('shopid'=>$data['shopid'],'isdelete'=>0,'status'=>10,'cid'=>array(array('neq',124886060),array('neq',124886059),'and')))->select();
   	 $hotSoldProd = $this->model->where(array('shopid'=>$shopInfo['id'], 'isdelete'=>0, 'status'=>10,'cid'=>array(array('neq',124886060),array('neq',124886059),'and')))->order('count_sold desc')->limit(6)->select();
      $hotCollectedProd = $this->model->where(array('shopid'=>$shopInfo['id'], 'isdelete'=>0, 'status'=>10,'cid'=>array(array('neq',124886060),array('neq',124886059),'and')))->order('count_collected desc')->limit(6)->select();
   	 $this->assign("data",$data);
     $this->assign("priceRange",$priceRange);
   	 $this->assign("shopInfo",$shopInfo);
   	 $this->assign('list',$list);
   	  $this->assign('hotSold', $hotSoldProd);
      $this->assign('hotCollected', $hotCollectedProd);
   	 $this->assign("commentcount",$commentcount);
   	 $this->assign("comments",$comments);
   	$this->display("Shop/Product/show");
   }
   

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
}


?>
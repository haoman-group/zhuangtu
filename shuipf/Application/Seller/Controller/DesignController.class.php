<?php
// +----------------------------------------------------------------------
// | 宝贝管理--设计类
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Seller\Controller;

class DesignController extends SellerbaseController {

    protected $model = NULL;
    protected $property = NULL;
    protected $shopid = NULL;
    protected $memnerModel=null;
    protected $designerModel=null;
    protected $where = array();
    protected $Page_Size = 10;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Product');
        $this->property = D('Seller/ProductProperty');
        $this->memberModel=D('Member');
        $this->designerModel=D('Designer');
        // C('TOKEN_ON',true);
    }
    /**
    * @name 设计宝贝上传
    **/
    public function add(){

      if(IS_POST){
        // if(!session('form_member_product_add')){
        //   $this->error('请勿重复提交！');
        //   redirect('Product/addDesign');
        // }
        $maxpro = $this->model->where(array('uid'=>$this->userid))->order('id desc')->find();
        if($maxpro['addtime']>(time()-3)){
            $this->error('请勿重复提交');
        }
        $data = $this->_procData();

        $data['addtime'] = time();
        if(!$this->model->create($data)){
           $this->error('提交失败:'.$this->model->getError());
          return false;
        }

        $proid = $this->model->add();

        if(!$proid) $this->error('提交失败');
        // 添加图片到设计库
        $is_library = I('is_library','0');
        if($is_library == '1'){
          // foreach(I('product_picture_url') as $k=>$v){
            $library = array(
              'picture'=>$data['headpic'],
              'uid'=>$this->uid,
              'username'=>$this->username,
              'shopid'=>$this->shopid,
              'shopcatid'=>M('Shop')->getFieldById($this->shopid,'catid'),
              'style'=>implode(',',I('attr_style')),
              'proid'=>$proid,
              'status'=>0,
              'title'=>$data['title'],
              'addtime'=>time(),
            );
            M('DesignLibrary')->data($library)->add();
          // } 
        }

        session('form_member_product_add',NULL);
        $this->success('提交成功',U('lists'));
        
      }else{
        session('form_member_product_add',md5('form_member_product_add'.time()));
        //获取风格
        $style = M('OptionField')->where(array('name'=>'attr_style','status'=>'1'))->select();
        foreach($style as $key=>$vo){
          $style[$key]['child'] = M('OptionField')->where(array('pid'=>$vo['id']))->count();
        }
        //获取类目CID
       
        $cid = I('get.inpcid');
        $this->assign('property',$this->property->getProperty($cid));
        $this->assign('style',$style);
       
        //获取可用设计师
       $designer_name= $this->assign('designerList',D('Seller/Designer')->getDesignerList()) ;
       $designer_name=$this->designerModel->where(array('uid'=>$this->uid))->getField('username')||$this->error('您还没有设计师，请先上传',U("/Seller/Designer/add"));
      $this->display('Product/addDesign');
      

         
         
  

       

      

    }

  }
    /**
    * @name 编辑宝贝
    * @param 无
    **/
    public function edit(){
      if(IS_POST){
        $id = I('id','','');
        if(!$this->model->where(array('id' => $id))->count()){
          $this->error('数据不存在！');
        }
        else{
          $data = $this->_procData();
          $data['auditstatus'] = Status::AUDIT_PENDING;  //任何修改操作 都将审核状态置为“2-待处理”
          $data['id'] = $id;
          if(!$this->model->create($data)){
            $this->error('提交失败:'.$this->model->getError());
          }
          $result = $this->model->where(array('id' => $id))->field('vid,cid',true)->save();
          $is_library = $data['is_library'];
          if($is_library == '1'){
            $library = array(
              'picture'=>$data['headpic'],
              'uid'=>$this->uid,
              'username'=>$this->username,
              'shopid'=>$this->shopid,
              'shopcatid'=>M('Shop')->getFieldById($this->shopid,'catid'),
              'style'=>implode(',',I('attr_style')),
              'proid'=>$id,
              'status'=>0,
              'title'=>$data['title'],
              'addtime'=>time(),
            );
            $count = M('DesignLibrary')->where(array('proid'=>$id))->find();
            if($count){
              M('DesignLibrary')->where(array("proid"=>$id))->data($library)->save();
            }else{
              M('DesignLibrary')->data($library)->add();
            }
            
          }else{
            M('DesignLibrary')->where(array('proid'=>$id))->delete();
          }
          
          
          $this->success('提交成功',U('Product/lists'));
          return;
        }
      }
      $id = I('id','','');
        $data = $this->model->where(array('id'=>$id))->find();
       // trace($data,'用户数据','debug');
        $data['service_promise'] = unserialize($data['service_promise']);
        $data['price_json'] = json_decode($data['price_json'], true);
        $data['key_prop'] = unserialize($data['key_prop']);
        $data['sale_prop'] = unserialize($data['sale_prop']);
        $data['nokey_prop'] = unserialize($data['nokey_prop']);
        $data['starttime'] = date("Y-m-d h:i:s", $data['starttime']);
        //颜色数组
        $selected_prop = array();
        $selected_pics = array();
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
         //已选择宝贝规格属性
      $this->assign('selected_prop', $selected_prop);
      // $this->assign('selected_pics', $selected_pics);
      //颜色数组
      $this->assign('colorArray',$colorArray);
      //标题
      // $data['title'] = unserialize($data['title']);
      //风格属性
      $this->assign('attr_style',unserialize($data['attr_style']));
      //宝贝类型
      // $this->assign('type',unserialize($data['type']));
      //增值服务
      // $data['service_added'] = unserialize($data['service_added']);
      $this->assign('service_added',unserialize($data['service_added']));
      //效果图
      // $data['pictype_effect'] = unserialize($data['pictype_effect']);
      $this->assign('solution',unserialize($data['solution']));
      $this->assign('pictype_effect',$data['pictype_effect']);
      //CAD图
      // $data['pictype_cad'] = unserialize($data['pictype_cad']);
      $this->assign('pictype_cad',unserialize($data['pictype_cad']));
      //所有图片
      $this->assign('picture_urls',explode(",",$data['picture']));
      $data['showecplay'] = htmlspecialchars_decode($data['showecplay']);
      $data['show'] = htmlspecialchars_decode($data['show']);
      //获取属性分类和属性值
      $this->assign('property',$this->property->getProperty($data['cid']));
      //所有数据

      $this->assign('data',$data);
       //获取风格
      $style = M('OptionField')->where(array('name'=>'attr_style','status'=>'1'))->select();
        foreach($style as $key=>$vo){
          $style[$key]['child'] = M('OptionField')->where(array('pid'=>$vo['id']))->count();
        }
      $this->assign('style',$style);
      $this->assign("id",$id);
      $this->assign('designerList',D('Seller/Designer')->getDesignerList());
      $this->display('Product/addDesign');
    }
    
    //处理提交数据
    private function _procData(){
        //判断用户
        $shopid_post = I('shopid');
        if($shopid_post != $this->shopid){
          $this->error("无法提交,您已登陆别的店铺,请先刷新页面!");
        }
        //获取设计类型 0-家装设计；1-软装设计
        $designtype = I('request.designtype','','');
        //标题
        ($title = I('title')) || $this->error("宝贝的标题必须填写！");
        // $title = serialize($title);
        ($picture = I('product_picture_url')) || $this->error("请选择宝贝图片进行上传！");
        
        I('attr_style') || $this->error("设计风格必须选择！");
        // I('product_type') || $this->error("宝贝类型必须选择并填写！");
        
        //设计理念
        $idea = I('idea');
        //宝贝风格
        $attr_style = serialize(I('attr_style'));
        $attr_area = I('attr_area');
        $attr_huxing = I('attr_huxing');
        $attr_jubu = I('attr_jubu');
        $attr_kongjian = I('attr_kongjian');
        $attr_code = I('attr_code');
        $charge_unit = I('charge_unit','1/㎡');
        $pay_mode = I('pay_mode','一口价');
        $designer_qualification = I('designer_qualification');
        //是否为专属设计师
        // $is_personal = I('is_personal');
        // if($is_personal == "1"){
        //   //专属设计师名字
          ($designer_name = I('designer_name')) ||  $this->error("请填写专属设计师");
        // }
        //主页显示
        $is_home = I("is_home");
        //宝贝属性
        $type = I('type');
         //价格和价格区间
        $price_json = html_entity_decode(I('price'));
        //拆分金额区间
        $min_price = 0;
        $max_price = 0;
        $min_price_ori = 0;
        $max_price_ori = 0;
        // foreach(I('charge_type') as $k => $ty){
        //   if($ty[0] =="on"){
        //     if($min_price == 0){ $min_price = $ty[1] ;}
        //     if($min_price > $ty[1]){ $min_price= $ty[1] ;}
        //     if($max_price < $ty[1]){ $max_price = $ty[1] ;}
        //   } 
        // }
        $priceArray = json_decode($price_json,true);
        foreach($priceArray as $price){
          if($min_price == 0){ $min_price = $price['price_act'] ;}
          if($min_price > $price['price_act']){ $min_price = $price['price_act'] ;}
          if($max_price < $price['price_act']){ $max_price = $price['price_act'] ;}
          //门店价
          if($min_price_ori == 0){ $min_price_ori = $price['price'] ;}
          if($min_price_ori > $price['price']){ $min_price_ori = $price['price'] ;}
          if($max_price_ori < $price['price']){ $max_price_ori = $price['price'] ;}
        }
        //价格活动
        $activity = I("activity");
        //图片
        $headpic = $picture[0];
        $picture = implode(',',$picture);
        //设计服务信息
        //增值服务
        $service_added = serialize(I('service_added'));
        //出图类型  
        // ((count(I('pictype_cad')) >1) || (count(I('pictype_effect')) >1)) || $this->error("出图类型必须选择一个！");
        $pictype_effect = I('pictype_effect');
        $pictype_cad  = serialize(I('pictype_cad'));
        //会员打折
        $is_member_discount = I('is_member_discount');
        $stock_type = I('stock_type');
        $showway = I('showway','1');
        $show = I('show','');
        $showecplay = I('showecplay','');
        //合同
        $agreement = I('agreement');
        //橱窗推荐
        $is_showcase = I('is_showcase');
        //有效期
        $expiry_date = I('expiry_date');
        //开始时间
        $starttime_type = I('starttime_type');
         if($starttime_type == '2'){
          $starttime = I('starttime');  
        }
        //状态
        $status = (I('starttime_type')==1)?Status::STATUS_SELLING:Status::STATUS_NEVER;
        //库存计数
        $track_times = I('track_times');
        $is_library = I('is_library');

        $data = array(
          'uid'=>$this->userid,
          'username'=>$this->username,
          'shopid'=>$this->shopid,
          'updatetime'=>time(),
          'title'=>$title,
          'idea'=>$idea,
          'attr_style'=>$attr_style,
          'attr_area'=>$attr_area,
          'attr_huxing'=>$attr_huxing,
          'attr_jubu'=>$attr_jubu,
          'attr_kongjian'=>$attr_kongjian,
          'attr_code'=>$attr_code,
          'charge_unit'=>$charge_unit,
          'pay_mode'=>$pay_mode,
          'designer_qualification'=>$designer_qualification,
          'is_personal'=>$is_personal,
          'designer_name'=>$designer_name,
          'type'=>$type,
          'picture'=>$picture,
          'headpic'=>$headpic,
          'video'=>$video,
          'service_added'=>$service_added,
          'service_assurance'=>$service_assurance,
          'pictype_effect'=>$pictype_effect,
          'pictype_cad'=>$pictype_cad,
          'is_member_discount'=>$is_member_discount,
          'stock_type'=>$stock_type,
          'expiry_date'=>$expiry_date,
          'is_showcase'=>$is_showcase,
          'status'=>$status,
          'starttime_type'=>$starttime_type,
          'starttime'=>$starttime,
          'is_home'=>$is_home,
          'min_price'=>$min_price,
          'max_price'=>$max_price,
          'designtype'=>$designtype,
          'cid'=>I('cid',''),
          'proptype'=>$designtype,
          'is_library'=>$is_library,
          'activity'=>$activity,
          'showway'=>$showway,
          'showecplay'=>$showecplay,
          'agreement'=>$agreement,
          'show'=>$show,
          'price_json'=>$price_json,
          'key_prop'=>I('key_prop',''),
          'nokey_prop'=>I('nokey_prop',''),
          'sale_prop'=>I('sale_prop',''),
          'service_promise'=>I('service_promise'),
          'min_price_ori'=>$min_price_ori,
          'max_price_ori'=>$max_price_ori,
          '__hash__'=>I('__hash__'),
          'case'=>I('case'),
          'phone'=>I('phone'),
          'case_price'=>I('case_price'),
          'case_name'=>I('case_name'),
          'design_company'=>I('design_company'),
          'single_effect'=>I('single_effect'),
          'solution'=>I('solution'),
          'limitnum'=>-1
        );
        return $data;
    }
    //处理标题 1.反序列化 2.去除空元素 3.使用斜杠做分隔符
    protected function _special($data){
        foreach($data as $key => $da){
            // $data[$key]['title'] = implode("/",array_filter(unserialize($da['title'])));
            $data[$key]['ill_reason'] = unserialize($data[$key]['ill_reason']);
            // $type =unserialize($data[$key]['type']);
            //获取商品总数
            // foreach($type as $ty){
            // $data[$key]['num'] +=$ty['2'];
            // }
        }
        return $data;
    }

    
}
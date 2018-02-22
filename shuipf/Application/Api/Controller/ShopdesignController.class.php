<?php

namespace Api\Controller;

use Common\Controller\Base;

class ShopdesignController extends ApibaseController {

    protected $moduleModel = NULL;
    protected $memberModel = NULL;
    protected $productModel = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->moduleModel = D("ShopModule");
        $this->memberModel = D('Member/Member');
        $this->productModel = D('Product');
        // if(!$this->userid) $this->error('未登录');
    }
    /** 
    * 醉优风token验证接口
    **/
    public function zyf_verify(){
        $token = I("token");
        $user = $this->memberModel->field(array('userid','username','userpic'))->where(array('token'=>$token))->find();
        if(!$user) $this->error('验证失败');
        if($user['userpic']) $user['userpic'] = CONFIG_SITEURL_MODEL.$user['userpic'];
        $this->success($user);
    }
    /**
    * 醉优风
    **/
    public function zyf_notify(){
        ($token = I('token')) || $this->error('参数不完整');
        ($pageid = I('pageId')) || $this->error('参数不完整');
        ($moduleid = I('moduleId')) || $this->error('参数不完整');
        $content = I('contentHtml');
        if($pageid==-1){
            $this->success('提交成功');
        }
        //$content_height= I('content_height');
        //preg_match("/width:(\d+px);height:(\d+px);/i", $content, $matches);
        preg_match("/height:(\d+px);/i", $content, $matches);
        $userid = $this->memberModel->getFieldByToken($token,'userid');
        if(!$userid) $this->error('验证失败');
        $module = $this->moduleModel->where(array('uid'=>$userid,'id'=>$moduleid))->find();
        if(!$module) $this->error('模块不存在');
        $setting = unserialize($module['setting']);
        $setting['content'] = $content;
        //$setting['content_width'] = $matches[1];
        //$setting['content_height'] = $matches[2];
        $setting['content_height'] = $matches[1];
        $setting['isecplay'] = 1;
        $setting['isshowtit'] = 0;
        if($module['compid']==8820){
            $setting['type'] = 2; //自定义类型
        }
        $setting = serialize($setting);
        $re = $this->moduleModel->where(array('id'=>$moduleid))->setField('setting',$setting);
        $this->success('提交成功');
    }
    public function zyf_info(){
        ($token = I('token')) || $this->error('参数不完整');
        ($pageid = I('pageId')) || $this->error('参数不完整');
        ($moduleid = I('moduleId')) || $this->error('参数不完整');
        if(($pageid==-1)&&($moduleid>0)){
            $show = D('Product')->field(array('id','showecplay'))->where(array('id'=>$moduleid))->find();
            if(!$show) $this->error('宝贝不存在');
            //$this->success($show['show']);
            $this->success($show['showecplay']);
            //edit by suncycle 2016.04.01

        }elseif(($pageid==-1)&&($moduleid==-1)){
            $this->success('');
        }
        $userid = $this->memberModel->getFieldByToken($token,'userid');
        if(!$userid) $this->error('验证失败');
        $module = $this->moduleModel->where(array('userid'=>$userid,'id'=>$moduleid))->find();
        if(!$module) $this->error('模块不存在');
        $setting = unserialize($module['setting']);
        $this->success($setting['content']);
    }

    /**
    * @name 模块相关操作
    * @param $opt 操作类型：add
    * @param $width 模块宽度
    * @param $module_comp_id 通用模块id
    * @param $layout  12346745841-sub-0
    **/
    public function module(){

        $opt = I('opt');
        $width = I('width',190);
        $module_comp_id = I('module_comp_id',4023);
        $layout = I('layout','12346745841-sub-0');
        switch ($opt) {
            case 'add':
                $module = $this->moduleModel->where(array('id'=>$module_comp_id))->find();
                if(!$module) $this->error('模块不存在');
                $html = \Design::$module['name']($this->userid);
                echo $html;
                break;
            
            default:
                # code...
                break;
        }
    }
    public function test(){

        $content = "&lt;div class=&quot;abs&quot; data-type=&quot;pophtml&quot; style=&quot;left:0px;top:0px;width:1919px;height:830px;overflow:hidden;&quot;&gt;&lt;div style=&quot;height:100%;&quot; class=&quot;subpanl &quot;&gt;&lt;div class=&quot;abs&quot; data-type=&quot;popvideo&quot; style=&quot;left:0px;top:-50px;&quot;&gt;&lt;embed width=&quot;1920&quot; height=&quot;1197&quot; src=&quot;http://cloud.video.taobao.com/play/u/2146742267/e/1/t/1/p/1/33421575.swf&quot; wmode=&quot;opaque&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;abs&quot; data-type=&quot;tagglelayer&quot; style=&quot;left:0px;top:0px;&quot;&gt;&lt;div class=&quot;J_TWidget&quot; data-widget-type=&quot;Tabs&quot; data-widget-config='{&quot;navCls&quot;:&quot;zui-nav&quot;,&quot;contentCls&quot;:&quot;zui-con&quot;,&quot;triggerType&quot;:&quot;click&quot;,&quot;effect&quot;:&quot;fade&quot;,&quot;autoplay&quot;:false}'&gt;&lt;div class=&quot;zui-slide-con zui-con&quot;&gt;&lt;div class=&quot;con-item zui_area&quot; style=&quot;position:relative;width:1920px;height:820px;&quot;&gt;&lt;img class=&quot;bgimg&quot; src=&quot;https://gdp.alicdn.com/imgextra/i2/2146742267/TB2.rl6jFXXXXc.XXXXXXXXXXXX_!!2146742267.png&quot; width=&quot;1919.997&quot; height=&quot;829.997&quot;&gt;&lt;/div&gt;&lt;div class=&quot;con-item&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;abs zui-slide-nav zui-nav-toggle zui-nav&quot; style=&quot;left:1285px;top:192px;&quot;&gt;&lt;div class=&quot;nav-item ks-active&quot;&gt;&lt;/div&gt;&lt;div class=&quot;abs nav-item&quot; style=&quot;cursor:pointer;left:0px;top:0px;width:32px;height:32px;background:url(http://img04.taobaocdn.com/imgextra/i4/368136/TB2NkROaVXXXXXaXpXXXXXXXXXX-368136.png);&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;abs&quot; data-type=&quot;qrcode&quot; style=&quot;left:329px;top:266px;&quot;&gt;&lt;div class=&quot;custom-widget&quot; st";
        preg_match("/width:(\d+px);height:(\d+px);/i", $content, $matches);
        dump($matches);
    }
    public function queryById(){
        ($id = I('id')) || $this->error('参数不完整');
        $sort = I('sort');
        $where = array('id'=>$id);
        $order = array('id'=>'desc');
        switch ($sort) {
            case 'coefp':
                $order = array('count_collected'=>'desc','id'=>'desc');
                break;
            case '_coefp':
                $order = array('count_collected'=>'asc','id'=>'desc');
                break;
            case 'hotsell':
                $order = array('count_sold'=>'desc','id'=>'desc');
                break;
            case '_hotsell':
                $order = array('count_sold'=>'asc','id'=>'desc');
                break;
            case 'price':
                $order = array('price'=>'asc','id'=>'desc');
                break;
            case '_price':
                $order = array('price'=>'desc','id'=>'desc');
                break;
            case 'newOn':
                $order = array('id'=>'desc');
                break;
            case '_newOn':
                $order = array('id'=>'asc');
                break;
            case 'HotKeep':

                break;
            case '_HotKeep':

                break;
            default:
                $order = array('id'=>'desc');
                break;
        }
        $product = $this->productModel->where($where)->order($order)->find();
        if(!$product) $this->success(array(),'','JSONP');
        $data = array();
        $data['nid'] = $product['id'];
        $data['detailHref'] = U('Shop/Product/show',array('id'=>$product['id'])) ;
        $data['auctionImage'] = "http://seller.zhuangtu.net".thumb($product['headpic'],310,310);
        $data['auctionTitle'] = $product['title'];
        $data['currentPrice'] = (float)$product['price'];
        $data['orignalPrice'] = (float)$product['price'];
        $data['sellerId'] = $product['uid'];
        $picture = explode(",",$product['picture']);
        foreach($picture as $k=>$v){
            $picture[$k] = "http://seller.zhuangtu.net".thumb($v,310,310);
        }
        $data['pics'] = $picture;
        $data['totalSold'] = (int)$product['count_sold'];
        $data['favcount'] = (int)$product['count_collected'];
        $this->success($data,'','JSONP');
    }
    public function getIdByUrl(){
        //http://zhuangtu.local/Shop/Product/show/id/17.html
        ($url = I('url')) || $this->error('参数不完整');
        preg_match('/id\/(\d+).html/',$url,$res);
        if(!$res[1]) $this->error('链接不正确');
        $this->success($res[1]);
        
    }


}

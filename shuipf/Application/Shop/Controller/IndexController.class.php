<?php
namespace Shop\Controller;
use Common\Controller\Base;

class IndexController extends Base {

    protected $model = NULL;
    protected $shopModel = NULL;
    protected $pageModel = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Seller/Product');
        $this->shopModel = D('Shop');
        $this->pageModel = D('ShopPage');
    }
    public function test(){
      $data = array(
        'hd'=>array(
          array(
            'blockid'=>343253256,
            'classname'=>"mall",
            'subcol'=>array(),
            'maincol'=>array(
              // array(
              //   'widgetid'=>98049832,
              //   'compid'=>17,
              //   'towtype'=>'h950',
              //   'title'=>'店铺招牌',
              //   'data-ismove'=>1,
              //   'data-isdel'=>1,
              //   'data-isadd'=>1,
              //   'data-isedit'=>1,
              // ),
              // array(
              //   'widgetid'=>98049832,
              //   'compid'=>17,
              //   'towtype'=>'h950',
              //   'title'=>'导航',
              //   'data-ismove'=>1,
              //   'data-isdel'=>1,
              //   'data-isadd'=>1,
              //   'data-isedit'=>1,
              // ),
            ),
          ),
        ),
        'bd'=>array(
          // array(
          //   'blockid'=>343253256,
          //   'classname'=>"mall",
          //   'subcol'=>array(),
          //   'maincol'=>array(
          //     array(
          //       'widgetid'=>98049832,
          //       'compid'=>5,
          //       'towtype'=>'h950',
          //       'title'=>'自定义内容区',
          //       'data-ismove'=>1,
          //       'data-isdel'=>1,
          //       'data-isadd'=>1,
          //       'data-isedit'=>1,
          //     ),
          //   ),
          // ),
          array(
            'blockid'=>3432434435,
            'classname'=>'srml',
            'maincol'=>array(
              array(
                'widgetid'=>98049832,
                'compid'=>8806,
                'towtype'=>'b190',
                'title'=>'图片轮播',
                'data-ismove'=>1,
                'data-isdel'=>1,
                'data-isadd'=>1,
                'data-isedit'=>1,
              ),
              array(
                'widgetid'=>98049832,
                'compid'=>8805,
                'towtype'=>'b190',
                'title'=>'自定义内容区',
                'data-ismove'=>1,
                'data-isdel'=>1,
                'data-isadd'=>1,
                'data-isedit'=>1,
              ),
            ),
            'subcol'=>array(
              array(
                'widgetid'=>98049832,
                'compid'=>8802,
                'towtype'=>'b190',
                'title'=>'宝贝排行榜',
                'data-ismove'=>1,
                'data-isdel'=>1,
                'data-isadd'=>1,
                'data-isedit'=>1,
              ),
              array(
                'widgetid'=>98049832,
                'compid'=>8803,
                'towtype'=>'b190',
                'title'=>'宝贝分类（竖向）',
                'data-ismove'=>1,
                'data-isdel'=>1,
                'data-isadd'=>1,
                'data-isedit'=>1,
              ),
              array(
                'widgetid'=>98049832,
                'compid'=>8802,
                'towtype'=>'b190',
                'title'=>'宝贝排行榜',
                'data-ismove'=>1,
                'data-isdel'=>1,
                'data-isadd'=>1,
                'data-isedit'=>1,
              ),
              array(
                'widgetid'=>98049832,
                'compid'=>8803,
                'towtype'=>'b190',
                'title'=>'宝贝分类（横向）',
                'data-ismove'=>1,
                'data-isdel'=>1,
                'data-isadd'=>1,
                'data-isedit'=>1,
              ),
            ),
          ),
          array(
            'blockid'=>3432434435,
            'classname'=>'slmr',
            'subcol'=>array(
              array(
                'widgetid'=>98049832,
                'compid'=>8802,
                'towtype'=>'b190',
                'title'=>'宝贝排行榜',
                'data-ismove'=>1,
                'data-isdel'=>1,
                'data-isadd'=>1,
                'data-isedit'=>1,
              ),
              array(
                'widgetid'=>98049832,
                'compid'=>8803,
                'towtype'=>'b190',
                'title'=>'宝贝分类（竖向）',
                'data-ismove'=>1,
                'data-isdel'=>1,
                'data-isadd'=>1,
                'data-isedit'=>1,
              ),
              array(
                'widgetid'=>98049832,
                'compid'=>8802,
                'towtype'=>'b190',
                'title'=>'宝贝排行榜',
                'data-ismove'=>1,
                'data-isdel'=>1,
                'data-isadd'=>1,
                'data-isedit'=>1,
              ),
              array(
                'widgetid'=>98049832,
                'compid'=>8803,
                'towtype'=>'b190',
                'title'=>'宝贝分类（横向）',
                'data-ismove'=>1,
                'data-isdel'=>1,
                'data-isadd'=>1,
                'data-isedit'=>1,
              ),
            ),
            'maincol'=>array(
              array(
                'widgetid'=>98049832,
                'compid'=>8806,
                'towtype'=>'b190',
                'title'=>'图片轮播',
                'data-ismove'=>1,
                'data-isdel'=>1,
                'data-isadd'=>1,
                'data-isedit'=>1,
              ),
              array(
                'widgetid'=>98049832,
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
          array(
            'blockid'=>3432434435,
            'classname'=>'mall',
            'subcol'=>array(
            ),
            'maincol'=>array(
              array(
                'widgetid'=>98049832,
                'compid'=>8806,
                'towtype'=>'b190',
                'title'=>'图片轮播',
                'data-ismove'=>1,
                'data-isdel'=>1,
                'data-isadd'=>1,
                'data-isedit'=>1,
              ),
            ),
          ),

        ),
        'ft'=>array(
          array(
            'blockid'=>343253256,
            'classname'=>'mall',
            'subcol'=>array(),
            'maincol'=>array(),
          ),
        ),
      );
      $data = array('uid'=>2,'data'=>serialize($data));
      // M('ShopDesign')->data($data)->add();
    }
    public function index(){
        $domain = I('domain');
        $shop = $this->shopModel->where(array('domain'=>$domain))->find();
        if(!$shop) $this->error('店铺不存在');
        // $data = M('ShopDesign')->where(array('uid'=>$shop['uid']))->find();
        // $data = unserialize($data['data']);
        // foreach($data as $k0=>$v0){
        //   foreach($v0 as $k=>$v){
        //     foreach($v['maincol'] as $k1=>$v1){
        //       $module = M('ShopDesignModule')->getFieldById($v1['compid'],'name');
        //       // echo $module."<hr/>";
        //       $html[$k0][$k1]['maincol'] .= \Design::$module();
        //     }
        //     foreach($v['subcol'] as $k1=>$v1){
        //       $module = M('ShopDesignModule')->getFieldById($v1['compid'],'name');
        //       $html[$k0][$k1]['subcol'] .= \Design::$module();
        //     }  
        //   }
        // }
        $page = $this->pageModel->where(array('uid'=>$shop['uid'],'type'=>'home'))->find();
        $page['setting'] = unserialize($page['setting']);
        //$shop = $this->shopModel->where(array('uid'=>$this->uid))->find();
        //合作工长
        $tw = $this->model->checkTeamWorker($shop['uid'],$shop['id']);
        $this->assign('tw',$tw);
        $this->assign('pageid',$page['id']);
        $this->assign('layout',$page['setting']['layout']);
        $this->assign('page',$page);
        $this->assign('shopInfo',$shop);
        $this->assign('shopyear',$shop['years']);
        $this->display();

    }

  /**
   * ajax 店铺流量统计入库
   */
  public function ajax_flowstat_record(){
    $stat = I("key",'','htmlspecialchars_decode');
    $filePath = C("SHOP_LOG_PATH").date('Y').'/'.date('m').'/';
    //检测目录是否存在，不存在创建
    if (!is_dir($filePath)) {
        if (!mkdir($filePath, 0777, true)) {
            $this->error = '目录创建失败！';
            return false;
        }
    }
    $filename = $filePath.date('d').".log";
    $fp = fopen("$filename","a");
    fwrite($fp,$stat."\r\n");
    fclose($fp);
  }

  


    

}
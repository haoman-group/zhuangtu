<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 3/29/16
 * Time: 14:14
 */

namespace Content\Controller;

use Common\Controller\Base;
use Elasticsearch\ClientBuilder;

class SearchController extends Base {
    protected $PageSize = 40;
    protected $model=NULL;
    protected $productmodel=NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->model=M("Shop");
        $this->productmodel=M("Product");
    }
    public function search() {
        $search_key = I('get.searchkey', '');
        if ($search_key == '') {
            redirect(U('Index/index'));
        }
        $search_filter = array();
        $search_filter['pid'] = I('get.pid', '');
        $search_filter['vid'] = I('get.vid', '');
        $search_filter['min_price'] = I('get.min', '');
        $search_filter['max_price'] = I('get.max', '');
        $search_filter['catid'] = I('get.shop_catid', '');
        $search_filter['orderby'] = I('order', '');
        $page_num = I('get.page', '1', 'int');
        $search_tool = new \Libs\Util\ProductSearch();
        $result = $search_tool->search($search_key, $search_filter, $page_num, $this->PageSize);
        if (array_key_exists('order', $result)) {
            $this->assign('order', $result['order']);
        }
        $this->assign('searchOpts', $this->_searchOpts());
        $this->assign('page', $result['page']->show());
        $this->assign('recommends', $result['recommends']);
        $this->assign('recommendPidMap', $result['recommendPidMap']);
        $this->assign('list', $result['list']);
        $this->assign('total', $result['count']);

        $this->display('Search/result');
    }
    private function _searchOpts(){
        $searchOpts=array();
        //风格
        $searchOpts['style'] = M('OptionField')->where(array('name'=>'attr_style'))->select();
        return $searchOpts;
    }

    // public function shopid(){
    //     $domain=I("dom");
    //     $shopid=I("shopid");
    //     if(!empty($domain)){
    //     $shopInfo=M('Shop')->where(array('domain'=>$domain))->find();
    //     $where['shopid']=$shopInfo['id'];
    // }else{
    //      $shopInfo=M('Shop')->where(array('id'=>$shopid))->find();
    //     $where['shopid']=$shopid;
    // }
    //     $where['status']=10;
    //     $where['isdelete']=0;
    //     $min=I("min","");
    //     $max=I("max","");
    //     $order=I("order","");
    //     $productList=M('Product')->where($where)->order("$order desc")->select();
    //     $this->assign("shopInfo",$shopInfo);
    //     $this->assign("productList",$productList);
    //     $this->display("Shop/Product/index");
    // }

    // public function searchself(){
    //     $pagenum = I('get.page','1','');
    //     $shopid=I("get.shopid","");
    //      $shopInfo=M('Shop')->where(array('id'=>$shopid))->find();
    //      $search_key = I('get.searchkey', '');
    //     if ($search_key == '') {
    //         redirect(U('Index/index'));
    //     }
    //     $where['isdelete']=0;
    //     $where['shopid']=$shopid;
    //     $where['title']=array("like",'%'.$search_key.'%');
    //     $where['status']=10;
    //     $product=M('Product')->where($where)->select();
    //     $this->assign("shopInfo",$shopInfo);
    //     $this->assign("productList",$product);
    //     $this->display("Shop/Product/index");
    // }
     public function resultshop(){
        $key=I("searchkey",'null');
        $where['zt_shop.name']=array("LIKE","%".$key."%");
        if(empty($key)){
           $this->error("请输入您要查找的关键字");
        }
        $where['zt_shop.status']=1;
        $where['zt_shop.isdelete']=0;

        $count=$this->model->join('zt_member_data ON zt_member_data.userid = zt_shop.uid')->where($where)->count();

        $page = $this->page($count,15);
        $page_num = I('page','1');
        $data = $this->model->field("zt_member_data.business_scope,zt_member_data.agent_brand,zt_shop.*")->join('left join zt_member_data on zt_member_data.userid = zt_shop.uid')->where($where)->order('addtime desc')->page($page_num.','.'15')->select();
        foreach ($data as $k => $v) {
            $num=M("CommentShop")->where(array('shop_id'=>$v['id']))->getField("lineshop,lineservice,onlineshop,onlineseveri",true);
            $data[$k]['countnum']=$this->productmodel->where(array('shopid'=>$v['id'],'status'=>10))->count();
            if(empty($num)){
              $data[$k]['num']=0.0;
            }
            $number=array_sum($num);
            $data[$k]['num']=ceil($number);
        }

        foreach ($data as $key => $value) {
            $data[$key]['productinfo']=$this->productmodel->where(array('shopid'=>$value['id'],'status'=>10))->order("count_sold desc")->limit(4)->select();
         }
        // var_dump($data);exit;
         $this->assign("data",$data);
         $this->assign("count",$count);
         $this->assign('Page',$page->show());
         $this->display();

    }
}

<?php

// +----------------------------------------------------------------------
// | ShuipFCMS
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Api\Controller;

use Common\Controller\ShuipFCMS;

class IndexController extends ShuipFCMS {

    public function token() {
        $token = \Libs\Util\Encrypt::authcode($_POST['token'], 'DECODE', C('CLOUD_USERNAME'));
        if (!empty($token)) {
            S($this->Cloud->getTokenKey(), $token, 3600);
            $this->success('验证通过');
            exit;
        }
        $this->error('验证失败');
    }
    public function test(){
      $cat_url = "http://open.taobao.com/apitools/ajax_props.do?cid=###&act=childCid&restBool=false";
      $prop_url = "http://open.taobao.com/apitools/ajax_props.do?act=props&cid=###&restBool=false";
      $content = file_get_contents("http://open.taobao.com/apitools/apiPropTools.htm");
      // dump($content);
      // $re = preg_match("/^var cid1_api = '0\|(.+)\|0';$/",$content,$matches);
      $re = preg_match("/0\|(.+)\|0/",$content,$matches);
      // dump($matches[1]);
      $str = str_replace('\\"', '"', $matches[1]);
      $str = str_replace('\\/', '', $str);
      $cate = json_decode($str);
      $cate = $cate->itemcats_get_response->item_cats->item_cat;
      // dump($cate);
      foreach ($cate as $k => $v) {
        $data = array(
          'name'=>$v->name,
          'pid'=>0,
          'is_parent'=>$v->is_parent,
          'taobao_cid'=>$v->cid,
        );
        $cid = M('ProductCategory')->data($data)->add();
        
        $url = str_replace("###",$v->cid,$cat_url);
        $content = file_get_contents($url);
        $subcat = json_decode($content);

        $cat1 = $subcat->itemcats_get_response->item_cats->item_cat;
        // dump($cate);
        foreach ($cat1 as $k1 => $v1) {
          $data = array(
            'name'=>$v1->name,
            'pid'=>$cid,
            'is_parent'=>$v1->is_parent,
            'taobao_cid'=>$v1->cid,
          );
          $cid1 = M('ProductCategory')->data($data)->add();
          $url = str_replace("###",$v->cid,$cat_url);
          $content = file_get_contents($url);
          $subcat = json_decode($content);
          $cat2 = $subcat->itemcats_get_response->item_cats->item_cat;
          // dump($cate);
          foreach ($cat2 as $k2 => $v2) {
            $data = array(
              'name'=>$v2->name,
              'pid'=>$cid1,
              'is_parent'=>$v2->is_parent,
              'taobao_cid'=>$v2->cid,
            );
            $cid2 = M('ProductCategory')->data($data)->add();
            $url = str_replace("###",$v->cid,$cat_url);
            $content = file_get_contents($url);
            $subcat = json_decode($content);
            $cat3 = $subcat->itemcats_get_response->item_cats->item_cat;
            // dump($cate);
            foreach ($cat3 as $k3 => $v3) {
              $data = array(
                'name'=>$v3->name,
                'pid'=>$cid2,
                'is_parent'=>$v3->is_parent,
                'taobao_cid'=>$v3->cid,
              );
              $cid3 = M('ProductCategory')->data($data)->add();
              // $url = str_replace("###",$v->cid,$cat_url);
              // $content = file_get_contents($url);
              // $subcat = json_decode($content);
            }

          }


        }


      }
      echo 'end';
    }
    function getprop(){
      $cid = 50016107;
      $prop_url = "http://open.taobao.com/apitools/ajax_props.do?act=props&cid=###&restBool=false";
      $content = file_get_contents(str_replace("###",$cid,$prop_url));
      dump($content);
      $re1 = preg_match("/var props=(.+);/",$content,$props);
      $re2 = preg_match("/var propvalues=(.+);/",$content,$propvalues);
      
      $props = json_decode($props[1]);
      $propvalues = json_decode($propvalues[1]);
      dump($props);
      dump($propvalues);
    }

}

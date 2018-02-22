<?php

// +----------------------------------------------------------------------
// | 店铺装修接口
// +----------------------------------------------------------------------
// | Author: 李博凯 <lbk747@163.com>
// +----------------------------------------------------------------------

namespace Seller\Controller;

class ApiController extends \Api\Controller\ApibaseController {
    protected $pageModel = null;
    protected $blockModel = null;
    protected $moduleModel = NULL;
    protected $designModuleModel = NULL;
    protected $productModel = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->pageModel = M('ShopPage');
        $this->blockModel = M('ShopBlock');
        $this->moduleModel = M('ShopModule');
        $this->designModuleModel = M('ShopDesignModule');
        $this->shopinCategoryModel = D('Seller/ShopinCategory');
        $this->productModel = M("Product");
    }
    public function upimage(){
        if($_FILES){
            $Attachment = service("Attachment", array('module' => 'Shop', 'catid' => 1, 'isadmin' =>0, 'userid' => $this->userid));
            //缩略图宽度
            // $thumb_width = 100;
            // $thumb_height = 100;
            //图片裁减相关设置，如果开启，将不保留原图
            if ($thumb_width && $thumb_height) {
                $Attachment->thumb = true;
                $Attachment->thumbRemoveOrigin = true;
                //设置缩略图最大宽度
                $Attachment->thumbMaxWidth = $thumb_width;
                //设置缩略图最大高度
                $Attachment->thumbMaxHeight = $thumb_height;
            }
            //开始上传
            $info = $Attachment->upload($Callback);
            if ($info) {
                if (in_array(strtolower($info[0]['extension']), array("jpg", "png", "jpeg", "gif"))) {
                    $picture = $info[0]['url'];
                    $this->success($picture);
                } else {
                    $this->error('头像上传失败');
                }
            } else {
                $this->error($Attachment->getErrorMsg());
            }
        }else{
            $this->error('页面不存在');
        }
    }
    /**
    * @name 页面操作
    **/
    public function page() {
        ($act = I('act')) || $this->error('参数不完整');
        ($uid = $this->userid) || $this->error('未登录');
        ($pageid = I('pageid')) || $this->error('参数不完整');
        $is_all_page = I('is_all_page');
        $page = $this->pageModel->where(array('id'=>$pageid))->find();
        if(!$page) $this->error('页面不存在');
        $page['setting'] = unserialize($page['setting']);
        switch ($act) {
            case 'header':
                $header['background_color'] = I('background_color');
                $header['background_image'] = I('background_image');
                $header['background_repeat'] = I('background_repeat');
                $header['background_align'] = I('background_align');
                $header['margin_bottom_10'] = I('margin_bottom_10');
                $header['isshowhead'] = I('isshowhead');
                $header['isshownav'] = I('isshownav');
                $page['setting']['header'] = $header;
                break;
            case 'container':
                $container['background_color'] = I('background_color');
                $container['background_image'] = I('background_image');
                $container['background_repeat'] = I('background_repeat');
                $container['background_align'] = I('background_align');
                $page['setting']['container'] = $container;
                break;
            case 'color':
                $page['setting']['color']= I("v");
                break;
        }
        $re = $this->pageModel->where(array('id'=>$pageid))->setField('setting',serialize($page['setting']));
        // if(!$re) $this->error('保存失败');
        $this->success('保存成功');
    }
    /**
    * @name 区块操作
    **/
    public function block() {
        ($act = I('act')) || $this->error('参数不完整');
        ($uid = $this->userid) || $this->error('未登录');
        switch ($act) {
            case 'add':
                ($pageid = I('pageid')) || $this->error('参数不完整');
                ($type = I('type')) || $this->error('参数不完整');
                
                if(!in_array($type,array('mall','slmr','srml'))) $this->error('区块类型错误');
                $page = $this->pageModel->where(array('id'=>$pageid))->find();
                if(!$page) $this->error('页面不存在');
                $data = array(
                    'uid'=>$uid,
                    'shopid'=>$shopid,
                    'type'=>$type,
                    'pageid'=>$pageid,
                    'position'=>$position,
                    'addtime'=>time(),
                    'updatetime'=>time(),
                );
                $re = $this->blockModel->data($data)->add();
                if(!$re) $this->error('保存失败');
                $page['setting'] = unserialize($page['setting']);
                $page['setting']['layout']['bd'][] = array('blockid'=>$re,'classname'=>$type,'subcol'=>array(),'maincol'=>array());
                $this->pageModel->where(array('id'=>$pageid))->data(array('setting'=>serialize($page['setting']),'updatetime'=>time()))->save();
                $this->success($re);
                break;
            case 'edit':
                ($blockid = I('blockid')) || $this->error('不存在');
                $type = I('type');
                $pageid = I('pageid');

                if(!in_array($type,array('mall','slmr','srml'))) $this->error('区块类型错误');
                $re = $this->blockModel->where(array('id'=>$blockid,'uid'=>$uid))->data(array('type'=>$type,'updatetime'=>time()))->save();
                if(!$re) $this->error('保存失败');

                $page = $this->pageModel->where(array('id'=>$pageid,'uid'=>$uid))->find();
                if($page){
                    $page['setting'] = unserialize($page['setting']);
                    foreach($page['setting']['layout']['bd'] as $k=>$v){
                        
                        if($v['blockid']==$blockid){
                            $page['setting']['layout']['bd'][$k]['classname'] = $type;
                        }
                    }
                    $this->pageModel->where(array('id'=>$pageid))->data(array('setting'=>serialize($page['setting']),'updatetime'=>time()))->save();
                }
                $this->success('提交成功');
                break;
            case 'move':
                ($blockid = I('blockid')) || $this->error('不存在');
                $position = I('position');
                $frompos = I('frompos');
                if($position==$frompos) $this->error('参数错误');
                $block = $this->blockModel->where(array('id'=>$blockid,'uid'=>$uid))->find();
                $pageid = $block['pageid'];
                $re = $this->blockModel->where(array('id'=>$blockid,'uid'=>$uid))->data(array('position'=>$position,'updatetime'=>time()))->save();
                if(!$re) $this->error('保存失败');
                if($position>$block['position']){
                    $this->blockModel->where(array('uid'=>$uid,'pageid'=>$block['pageid'],'position'=>array('between',array($block['position'],$position))))->setDec('position');
                }elseif($position<$block['position']){
                    $this->blockModel->where(array('uid'=>$uid,'pageid'=>$block['pageid'],'position'=>array('between',array($position,$block['position']))))->setInc('position');
                }

                $page = $this->pageModel->where(array('id'=>$pageid,'uid'=>$uid))->find();
                if($page){
                    $page['setting'] = unserialize($page['setting']);
                    // $current = $page['setting']['layout']['bd'][$frompos];
                    // if($frompos>$position) { array_unshift($page['setting']['layout']['bd'],array()); }
                    // foreach($page['setting']['layout']['bd'] as $k=>$v){
                    //     if($frompos<$position){
                    //         if(($k>$frompos) && ($k<$position)){
                    //             $page['setting']['layout']['bd'][$k-1] = $v;
                    //         }elseif($k==$position){
                    //             $page['setting']['layout']['bd'][$k-1] = $v;
                    //             $page['setting']['layout']['bd'][$k] = $current;
                    //         }
                    //     }elseif($frompos>$position){
                    //         if($k<$position){
                    //             $page['setting']['layout']['bd'][$k] = $page['setting']['layout']['bd'][$k+1];
                    //         }elseif($k==$position){
                    //             $page['setting']['layout']['bd'][$k] = $current;
                    //         }
                    //         unset($page['setting']['layout']['bd'][$frompos+1]);
                    //     }
                    // }
                    $from = $page['setting']['layout']['bd'][$frompos];
                    array_splice($page['setting']['layout']['bd'],$frompos,1);
                    array_splice($page['setting']['layout']['bd'],$position,0,array($from));
                    // if($frompos>$position){
                    //     array_splice($page['setting']['layout']['bd'],$position,0,array($page['setting']['layout']['bd'][$frompos]));
                    //     array_splice($page['setting']['layout']['bd'],$frompos+1,1);
                    // }elseif($frompos<$position){
                    //     array_splice($page['setting']['layout']['bd'],$position+1,0,array($page['setting']['layout']['bd'][$frompos]));
                    //     array_splice($page['setting']['layout']['bd'],$frompos,1);
                    // }
                    $this->pageModel->where(array('id'=>$pageid))->data(array('setting'=>serialize($page['setting']),'updatetime'=>time()))->save();
                }

                $this->success('提交成功');
                break;
            case 'delete':
                ($blockid = I('blockid')) || $this->error('不存在');
                $pageid = I('pageid');
                $re = $this->blockModel->where(array('id'=>$blockid,'uid'=>$uid))->delete();
                // if(!$re) $this->error('删除失败');
                $page = $this->pageModel->where(array('id'=>$pageid,'uid'=>$uid))->find();
                if($page){
                    $page['setting'] = unserialize($page['setting']);
                    foreach($page['setting']['layout']['bd'] as $k=>$v){
                        if($v['blockid']==$blockid){
                            array_splice($page['setting']['layout']['bd'],$k,1);
                        }
                    }
                    $this->pageModel->where(array('id'=>$pageid))->data(array('setting'=>serialize($page['setting']),'updatetime'=>time()))->save();
                }
                $this->success('删除成功');
                break;
            default:
                
                break;
        }
        
    }
    /**
    * 模块操作
    **/
    public function module(){
        ($act = I('act')) || $this->error('参数不完整');
        ($uid = $this->userid) || $this->error('未登录');
        switch ($act) {
            case 'add':
                ($pageid = I('pageid')) || $this->error('参数不完整');
                ($compid = I('compid')) || $this->error('参数不完整');
                ($wtype = I('wtype')) || $this->error('参数不完整');
                ($pos = I('pos')) || $this->error('参数不完整');
                $pos = explode("-",$pos);
                ($blockid = $pos[0]) || $this->error('参数不正确');
                ($side = $pos[1]) || $this->error('参数不正确');
                $position = $pos[2]?$pos[2]:0;
                $page = $this->pageModel->where(array('id'=>$pageid))->find();
                if(!$page) $this->error('页面不存在');
                $module = $this->designModuleModel->where(array('id'=>$compid))->find();
                if(!$module) $this->error('模块不存在');
                
                $block = $this->blockModel->where(array('id'=>$blockid))->find();
                if(!$block) $this->error('区块不存在');
                
                $data = array(
                    'uid'=>$uid,
                    'pageid'=>$pageid,
                    'compid'=>$compid,
                    'wtype'=>$wtype,
                    'blockid'=>$blockid,
                    'side'=>$side,
                    'position'=>$position,
                    'addtime'=>time(),
                    'updatetime'=>time(),
                );
                $re = $this->moduleModel->data($data)->add();

                $html = getDesignHtml($re);
                
                $page['setting'] = unserialize($page['setting']);
                if($compid=='8820'){
                    foreach($page['setting']['layout']['hd'] as $k=>$v){
                        if($v['blockid']==$blockid){
                            array_splice($page['setting']['layout']['hd'][$k][$side.'col'],$position,0,array(array('widgetid'=>$re,'compid'=>$compid,'towtype'=>$wtype,'title'=>$module['description'],'data-ismove'=>$module['ismove'],'data-isdel'=>$module['isdel'],'data-isadd'=>$module['isadd'],'data-isedit'=>$module['isedit'])));
                        }
                    }
                }else{
                   foreach($page['setting']['layout']['bd'] as $k=>$v){
                    if($v['blockid']==$blockid){
                        array_splice($page['setting']['layout']['bd'][$k][$side.'col'],$position,0,array(array('widgetid'=>$re,'compid'=>$compid,'towtype'=>$wtype,'title'=>$module['description'],'data-ismove'=>$module['ismove'],'data-isdel'=>$module['isdel'],'data-isadd'=>$module['isadd'],'data-isedit'=>$module['isedit'])));
                    }
                } 
                }
                
                $this->pageModel->where(array('id'=>$pageid))->data(array('setting'=>serialize($page['setting']),'updatetime'=>time()))->save();

                $this->success(array('moduleid'=>$re,'html'=>$html));
                break;

            case 'move':
                ($moduleid=I('moduleid')) || $this->error('参数不完整');
                ($pos = I('pos')) || $this->error('参数不完整');
                ($frompos = I('frompos')) || $this->error('参数不完整');

                $pos = explode("-",$pos);
                ($blockid = $pos[0]) || $this->error('参数不正确');
                ($side = $pos[1]) || $this->error('参数不正确');
                $position = $pos[2]?$pos[2]:0;

                $frompos = explode("-",$frompos);
                ($from_blockid = $frompos[0]) || $this->error('参数不正确');
                ($from_side = $frompos[1]) || $this->error('参数不正确');
                $from_position = $frompos[2]?$frompos[2]:0;

                $block = $this->blockModel->where(array('id'=>$blockid,'uid'=>$uid))->find();
                if(!$block) $this->error('区块不存在');
                $module = $this->moduleModel->where(array('id'=>$moduleid,'uid'=>$uid))->find();
                if(!$module) $this->error('模块不存在');
                $data = array(
                    'blockid'=>$blockid,
                    'side'=>$side,
                    'position'=>$position,
                    'updatetime'=>time(),
                );
                $re = $this->moduleModel->where(array('id'=>$moduleid,'uid'=>$uid))->data($data)->save();
                if(!$re) $this->error('提交失败');
                // if($position>$module['position']){
                //     $this->moduleModel->where(array('uid'=>$uid,'blockid'=>$module['blockid'],'position'=>array('between',array($module['position'],$position))))->setDec('position');
                // }elseif($position<$module['position']){
                //     $this->moduleModel->where(array('uid'=>$uid,'blockid'=>$module['blockid'],'position'=>array('between',array($position,$module['position']))))->setInc('position');
                // }

                $page = $this->pageModel->where(array('id'=>$module['pageid']))->find();
                if(!$page) $this->error('页面不存在');
                $page['setting'] = unserialize($page['setting']);
                foreach($page['setting']['layout']['bd'] as $k=>$v){
                    if($v['blockid']==$blockid){
                        $block_key = $k;                  
                    }
                    if($v['blockid']==$from_blockid){
                        $from_block_key = $k;
                    }

                }

                $from = $page['setting']['layout']['bd'][$from_block_key][$from_side.'col'][$from_position];
                array_splice($page['setting']['layout']['bd'][$from_block_key][$from_side.'col'],$from_position,1);
                array_splice($page['setting']['layout']['bd'][$block_key][$side.'col'],$position,0,array($from)); 
                $this->pageModel->where(array('id'=>$module['pageid']))->data(array('setting'=>serialize($page['setting']),'updatetime'=>time()))->save();


                $this->success('提交成功');
                break;
            case 'delete':
                $pageid = I('pageid');
                ($moduleid=I('moduleid')) || $this->error('参数不完整');
                $module = $this->moduleModel->where(array('id'=>$moduleid,'uid'=>$uid))->find();
                if(!$module) $this->error('模块不存在');
                $re = $this->moduleModel->where(array('id'=>$moduleid,'uid'=>$uid))->delete();
                if(!$re) $this->error('提交失败');

                $page = $this->pageModel->where(array('id'=>$pageid,'uid'=>$uid))->find();
                if(!$page) $this->error('页面不存在');
                $page['setting'] = unserialize($page['setting']);

                if($module['compid']=='8820'){
                    foreach($page['setting']['layout']['hd'] as $k=>$v){
                        if($v['blockid']==$module['blockid']){
                            foreach($page['setting']['layout']['hd'][$k][$module['side'].'col'] as $k1=>$v1){
                                
                                if($v1['widgetid']==$moduleid){
                                    array_splice($page['setting']['layout']['hd'][$k][$module['side'].'col'],$k1,1);
                                }
                            }
                        }
                    }
                }else{
                    foreach($page['setting']['layout']['bd'] as $k=>$v){

                        if($v['blockid']==$module['blockid']){
                            foreach($page['setting']['layout']['bd'][$k][$module['side'].'col'] as $k1=>$v1){
                                
                                if($v1['widgetid']==$moduleid){
                                    array_splice($page['setting']['layout']['bd'][$k][$module['side'].'col'],$k1,1);
                                }
                            }
                        }
                    }
                }
                $this->pageModel->where(array('id'=>$pageid))->data(array('setting'=>serialize($page['setting']),'updatetime'=>time()))->save();


                $this->success('提交成功');
                break;

        }
    }
    public function module_save(){
        ($moduleid=I('moduleid')) || $this->error('参数不完整');
        $module = $this->moduleModel->where(array('id'=>$moduleid,'uid'=>$this->userid))->find();

        if(!$module) $this->error('模块不存在');
        $designModule = $this->designModuleModel->where(array('id'=>$module['compid']))->find();
        if(!$designModule) $this->error('模块不存在!');
        $module['setting'] = unserialize($module['setting']);
        switch ($designModule['name']) {
            case 'diyblock'://自定义区
                $isshowtit = I('isshowtit');
                $content = I('content');
                $title = I('title');
                $module['setting']['content'] = $content;
                $module['setting']['isshowtit'] = $isshowtit;
                $module['setting']['title'] = $title;
                $module['setting']['isecplay'] = 0;
                break;
            case 'rank'://宝贝排行榜
                $module['setting']['isshowtit'] = I('isshowtit');
                $module['setting']['title'] = I('title');
                $module['setting']['category'] = I('category');
                $module['setting']['keywords'] = I('keywords');
                $module['setting']['price_from'] = I('price_from');
                $module['setting']['price_to'] = I('price_to');
                $module['setting']['number'] = I('number');
                $module['setting']['default'] = I('default');
                $module['setting']['is_show_sales'] = I('is_show_sales');
                break;
            case 'recommend'://宝贝推荐
                $module['setting']['isauto'] = I('isauto');
                $module['setting']['category'] = I('category');
                $module['setting']['keywords'] = I('keywords');
                $module['setting']['price_from'] = I('price_from');
                $module['setting']['price_to'] = I('price_to');
                $module['setting']['number'] = I('number');

                $module['setting']['isshowtit'] = I('isshowtit');
                $module['setting']['title'] = I('title');
                $module['setting']['display_type'] = I('display_type');
                $module['setting']['is_show_discount'] = I('is_show_discount');
                $module['setting']['is_show_sales'] = I('is_show_sales');
                $module['setting']['is_show_comment_count'] = I('is_show_comment_count');
                $module['setting']['is_show_comment'] = I('is_show_comment');
                $module['setting']['sort'] = I('sort');
                break;
            case 'slider'://图片轮播
                $module['setting']['content'] = I('content');
                $module['setting']['isshowtit'] = I('isshowtit');
                $module['setting']['title'] = I('title');
                $module['setting']['height'] = I('height');
                $module['setting']['switch'] = I('switch');
                break;
            case 'friendlink'://友情链接
                $module['setting']['type'] = I('type');
                $module['setting']['content'] = I('content');
                $module['setting']['isshowtit'] = I('isshowtit');
                $module['setting']['title'] = I('title');
                break;
            case 'service'://客服中心
                $module['setting']['worktime1'] = I('worktime1');
                $module['setting']['is_show_worktime1'] = I('is_show_worktime1');
                $module['setting']['worktime2'] = I('worktime2');
                $module['setting']['is_show_worktime2'] = I('is_show_worktime2');
                $module['setting']['phone1'] = I('phone1');
                $module['setting']['is_show_phone1'] = I('is_show_phone1');
                $module['setting']['phone2'] = I('phone2');
                $module['setting']['is_show_phone2'] = I('is_show_phone2');
                $module['setting']['isshowtit'] = I('isshowtit');
                $module['setting']['title'] = I('title');
                break;
            case 'shopsign'://店铺招牌
                $module['setting']['type'] = I('type');
                $module['setting']['is_show_name'] = I('is_show_name');
                $module['setting']['background_image'] = I('background_image');
                $module['setting']['height']  = I('height');
                $page = $this->pageModel->where(array('id'=>$module['pageid']))->find();
                if($page){
                    $setting = unserialize($page['setting']);
                    $setting['header']['height'] = I('height')+30;
                    $setting = serialize($setting);
                    $this->pageModel->where(array('id'=>$module['pageid']))->setField('setting',$setting);
                }
                
                break;
            case 'category'://宝贝分类
                break;
            case 'search'://宝贝搜索
                break;
            case 'navigation'://导航
                //$module['setting']['isshownav'] = I('isshownav');

                break;

            default:
                
                break;
        }
        $re = $this->moduleModel->where(array('id'=>$moduleid))->setField('setting',serialize($module['setting']));
        // if(!$re) $this->error('保存失败');
        $this->success('保存成功');
    }

    public function category(){
        $act = I('get.act');
        switch ($act) {
            case 'delete':
                $id = I('id');
                $data = $this->shopinCategoryModel->where(array('id'=>$id,'userid'=>$this->userid))->find();
                if(!$data) $this->error('分类不存在');
                $re = $this->shopinCategoryModel->where(array('id'=>$id,'userid'=>$this->userid))->delete();
                if(!$re) $this->error('删除失败');
                $this->success('删除成功');
                break;
            case 'save':
                ($content = I('d')) || $this->error('内容不能为空');
                
                // $content = json_decode($content);
                foreach ($content as $k => $v) {
                    $id = $v['id'];
                    $son = $v['son'];
                    $data = array(
                        'name'=>$v['name'],
                        'isunfolder'=>$v['isunfolder'],
                        'listorder'=>$k,
                        'userid'=>$this->userid,
                        'pid'=>0,
                        'addtime'=>time(),
                        'type'=>2,
                    );
                    if($id==0){
                        $id = $this->shopinCategoryModel->data($data)->add();
                        if(!$id) $this->error('新增分类失败');
                    }elseif($id>0){
                        $re = $this->shopinCategoryModel->where(array('id'=>$id,'userid'=>$this->userid))->data($data)->save();
                    }
                    $category[] = $id;
                    if($son){
                        $pid = $id;
                        $is_update = false;
                        foreach($son as $k1=>$v1){
                            $id = $v1['id'];
                            $data = array(
                                'name'=>$v1['name'],
                                'isunfolder'=>$v1['isunfolder'],
                                'listorder'=>$k1,
                                'userid'=>$this->userid,
                                'pid'=>$pid,
                                'addtime'=>time(),
                                'type'=>2,
                            );
                            if($id==0){
                                $id = $this->shopinCategoryModel->data($data)->add();
                                if(!$id) $this->error('新增分类失败');
                                else $is_update = true;
                            }elseif($id>0){
                                $re = $this->shopinCategoryModel->where(array('id'=>$id,'userid'=>$this->userid))->data($data)->save();
                            }
                            $category[] = $id;
                        }
                        if($is_update) {
                            $this->shopinCategoryModel->where(
                                array('id'=>$pid, 'userid'=>$this->userid, 'products'=>array('NEQ', ''))
                            )->data(
                                array('products'=>'')
                            )->save();
                        }
                    }

                }
                $this->shopinCategoryModel->where(array('id'=>array('notin',$category),'userid'=>$this->userid))->delete();
                $this->success('提交成功');
                break;
            case 'product':
                ($proid = I('proid')) || $this->error('产品ID参数不完整');
                ($strcate = I('strcate'));// || $this->error('产品分类参数不完整');
                $proid = explode(',',$proid);
                $this->productModel->where(array('id'=>array('in',$proid),'uid'=>$this->userid))->setField('shopin_category',$strcate);
                $this->shopinCategoryModel->editProducts(explode(',',I('proid')),explode(',',$strcate),$this->userid);
                $this->success('编辑成功');
                break;
            default:
                break;
        }
    }
}

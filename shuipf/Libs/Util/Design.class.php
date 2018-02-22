<?php

class Design
{
    public $widgetid = 0;
    public $module = NULL;

    function __construct($widgetid = 0)
    {
        $this->widgetid = $widgetid;
        $module = D('ShopModule')->where(array('id' => $widgetid))->find();
        // if(!$module) return false;
        $module['attr'] = D('ShopDesignModule')->where(array('id' => $module['compid']))->find();
        $module['setting'] = unserialize($module['setting']);
        $this->module = $module;

    }

    /**
     * @name 宝贝推荐
     * @param $data array('lists'=>'','color'=>'')
     **/
    public function recommend()
    {

        $data = D('Product')->field(array('id', 'headpic', 'title', 'price','min_price'))->where(array('uid' => $this->module['uid'], 'status' => array('egt', 10)))->order('listorder desc,id desc')->limit(5)->select();

        $html = '
<div class="J_TModule" data-widgetid="' . $this->module['id'] . '" id="" data-componentid="' . $this->module['compid'] . '" data-spm="" microscope-data="' . $this->module['compid'] . '-' . $this->module['id'] . '" data-title="宝贝推荐" data-context="' . $this->module[attr][wtype] . '" data-ismove="1" data-isdel="1" data-isedit="1" data-isadd="1" data-width="" data-needwidth="1" data-renderwmove="1" data-renderurl="">
    <div class="skin-box tb-module zts-recommend">
        <s class="skin-box-tp"> <b></b>
        </s>
        <div class="skin-box-hd ' . (($this->module['setting']['isshowtit'] === '0') ? "disappear" : "") . '"> <i class="hd-icon"></i>

            <h3>
                <span>' . ($this->module['setting']['isshowtit'] ? $this->module['setting']['title'] : $this->module['attr']['description']) . '</span>
            </h3>

            <div class="skin-box-act">
                <a href="javascript:" class="more" target="_blank" rel="nofollow">更多&gt;</a>
            </div>
        </div>
        <div class="skin-box-bd">

            <div class="recomdlout ' . $this->module[setting][display_type] . '">
            ';
        foreach ($data as $k => $v) {

            $html .= '
                <dl class="item  last " data-id="' . $v[id] . '">
                    <dt class="photo">
                        <a href="' . U('shop/product/show', array('id' => $v['id'])) . '" target="_blank">
                            <img src="' . $v[headpic] . '" alt="' . $v[title] . '"></a>
                    </dt>
                    <dd class="detail">
                        <div class="attribute">
                            <div class="cprice-area">
                                <span class="symbol">¥</span>
                                <span class="c-price">' . $v[min_price] . '</span>
                            </div>
                        </div>
                        <a class="item-name" href="' . U('shop/product/show', array('id' => $v['id'])) . '" target="_blank">' . $v[title] . '</a>
                    </dd>
                </dl>
            ';
        }
        $html .= '
            </div>
        </div>
        <s class="skin-box-bt"> <b></b>
        </s>
    </div>
</div>

        ';
        return $html;
    }

    /**
     * 宝贝排行
     **/
    public function rank($compid)
    {

        $html = '
<div class="J_TModule" data-widgetid="' . $this->module['id'] . '" id="shop13072654075" data-componentid="' . $this->module['compid'] . '" data-spm="110.0.8802-13072654075" microscope-data="8802-13072654075" data-title="宝贝排行榜" data-context="' . $this->module[attr][wtype] . '" data-ismove="1" data-isdel="1" data-isedit="1" data-isadd="1" data-uri="">
    <div class="skin-box tb-module tshop-pbsm tshop-pbsm-shop-top-list">
        <div class="skin-box zts-rank">
            <s class="skin-box-tp"><b></b></s>
            <div class="skin-box-hd ' . (($this->module['setting']['isshowtit'] === '0') ? "disappear" : "") . ' ">
                <i class="hd-icon"></i>
                <h3><span>' . ($this->module['setting']['isshowtit'] ? $this->module['setting']['title'] : $this->module['attr']['description']) . '</span></h3>
                <div class="skin-box-act disappear">
                    <a href="#" class="more">更多</a>
                </div>
            </div>
            <div class="skin-box-bd">
                <ul class="top-list-tab chtitul" data-tag="rankxxxxxx">
                    <li class="on chtitli"><span class="J_SaleTab tab1">销售量</span></li>
                    <li data-geturl="//favorite.t.taobao.com/json/shop_hot_items.htm?ownerId=1059350344&amp;limit=5" class="chtitli J_Collect"><span class="J_CollectTab tab2">收藏数</span></li>
                </ul>
                <div class="panels chconul" data-tag="rankxxxxxx">
                    <div class="panel sale chconli">
                        <ul>
                            <li class="item even last">
                                <div class="ranking">
                                    <span>1</span>
                                </div>
                                <div class="more">
                                    <a href="//item.taobao.com/item.htm?id=524652636501" target="_blank"><img src="//img.alicdn.com/bao/uploaded/i3/TB1N5_KKFXXXXaVXpXXXXXXXXXX_!!2-item_pic.png_120x120.jpg" class="hover-show"></a>
                                </div>
                                <div class="img">
                                    <a href="//item.taobao.com/item.htm?id=524652636501" target="_blank"><img alt="商品图片" src="//img.alicdn.com/bao/uploaded/i3/TB1N5_KKFXXXXaVXpXXXXXXXXXX_!!2-item_pic.png_40x40.jpg" class="hover-show"></a>
                                </div>
                                <div class="detail">
                                    <p class="desc"><a title="吊带背心" href="//item.taobao.com/item.htm?id=524652636501" target="_blank">吊带背心</a></p>
                                    <p class="price">￥<span>999.00</span></p>
                                    <p class="sale">
                                        已售出<span class="sale-count">0</span>件
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="panel collection disappear chconli">
                    </div>
                    <div class="control-group">
                        <a class="collect-this-shop border-radius" href="//favorite.taobao.com/popup/add_collection.htm?itemid=125546945&amp;itemtype=0&amp;ownerid=1059350344&amp;scjjc=2&amp;_tb_token_=vQ91jpkwmNTkwGA" target="_blank" rel="nofollow">收藏本店</a>
                        <span class="split">/</span>
                        <a class="show-more border-radius disappear hotkeep_desc" target="_blank" href="//shop125546945.taobao.com/search.htm?orderType=hotkeep_desc">查看更多宝贝</a>
                        <a class="show-more border-radius hotsell_desc" target="_blank" href="//shop125546945.taobao.com/search.htm?orderType=hotsell_desc">查看更多宝贝</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        ';
        return $html;
    }

    /**
     * @name 默认分类
     **/
    public function category()
    {
        $category = D("ShopinCategory")->where(array('userid'=>$this->module['uid'],'pid'=>0))->order('listorder asc')->select();
        $shop = D("Shop")->where(array('uid'=>$this->module['uid']))->find();
        foreach($category as $k=>$v){
            $category[$k]['son'] = D("ShopinCategory")->where(array('pid'=>$v['id']))->order('listorder asc')->select();
        }

        $html = '
<div class="J_TModule" data-widgetid="' . $this->module[id] . '" id="shop13072964554" data-componentid="' . $this->module[compid] . '" data-spm="110.0.4010-13072964554" microscope-data="4010-13072964554" data-title="宝贝分类（竖向）" data-context="' . $this->module[attr][wtype] . '" data-ismove="1" data-isdel="1" data-isedit="1" data-isadd="1" data-width="720" data-istarget="1" data-uri="//siteadmin.taobao.com/category/index.htm?sid=340826219">
    <div class="skin-box tb-module tshop-pbsm tshop-pbsm-shop-item-cates">
        <s class="skin-box-tp"> <b></b>
        </s>

        <div class="skin-box-hd ' . (($this->module['setting']['isshowtit'] === '0') ? "disappear" : "") . '"> <i></i>

            <h3>
                <span>' . ($this->module['setting']['isshowtit'] ? $this->module['setting']['title'] : $this->module['attr']['description']) . '</span>
            </h3>

            <div class="skin-box-act disappear">
                <a href="#">更多</a>
            </div>
        </div>
        <div class="skin-box-bd">

            <ul class="J_TCatsTree cats-tree J_TWidget" data-widget-type="Accordion" data-widget-config="{\'triggerCls\': \'acrd-trigger\',\'panelCls\': \'fst-cat-bd\',\'activeTriggerCls\': \'active-trigger\',\'triggerType\': \'click\',\'multiple\': true}">

                <li class="cat fst-cat float">
                    <h4 class="cat-hd fst-cat-hd"> <i class="cat-icon fst-cat-icon acrd-trigger active-trigger"></i>
                        <a href="'.U('Shop/Product/index',array('cateID'=>'','dom'=>$shop['domain'])).'" class="cat-name fst-cat-name" title="查看所有宝贝">查看所有宝贝</a>
                    </h4>
                    <ul class="fst-cat-bd">
                        <a href="'.U("Shop/Product/index",array('cateID'=>'','dom'=>$shop['domain'],'order'=>'_sell')).'" class="cat-name" title="按销量">按销量</a>
                        <a href="'.U("Shop/Product/index",array('cateID'=>'','dom'=>$shop['domain'],'order'=>'_new')).'" class="cat-new" title="按新品">按新品</a>
                        <a href="'.U("Shop/Product/index",array('cateID'=>'','dom'=>$shop['domain'],'order'=>'price')).'" class="cat-price" title="按价格">按价格</a>
                        <a href="'.U("Shop/Product/index",array('cateID'=>'','dom'=>$shop['domain'],'order'=>'_collect')).'" class="cat-collect" title="按收藏">按收藏</a>
                    </ul>
                </li>';

        foreach($category as $k=>$v){
            $html .='<li class="cat fst-cat ">
                    <h4 class="cat-hd fst-cat-hd" data-cat-id="1168684628">
                        <i class="cat-icon fst-cat-icon acrd-trigger active-trigger"></i>
                        <a class="cat-name fst-cat-name" href="'.U("Shop/Product/index",array("cateID"=>$v["id"],'dom'=>$shop['domain'])).'">'.$v['name'].'</a>

                    </h4>
                    ';
            if($v['son']){
                $html .=  '<ul class="fst-cat-bd">';
                foreach($v['son'] as $k1=>$v1){
                    $html .= '<li class="cat snd-cat  ">
                            <h4 class="cat-hd snd-cat-hd" data-cat-id="1168684629">
                                <i class="cat-icon snd-cat-icon"></i>
                                <a class="cat-name snd-cat-name" href="'.U("Shop/Product/index",array("cateID"=>$v1["id"],'dom'=>$shop['domain'])).'">'.$v1['name'].'</a>
                            </h4>
                        </li>';
                }
                $html .='</ul>';

                    
            }

            $html .='</li>';
        }


        $html .='        
            </ul>
        </div>
        <s class="skin-box-bt"> <b></b>
        </s>
    </div>
</div>
        ';
        return $html;
    }

    /**
     * @name 自定义模块
     **/
    public function diyblock()
    {

        $html = '
<div class="J_TModule" data-widgetid="' . $this->module['id'] . '" id="shop13072699252" data-componentid="' . $this->module[compid] . '" data-spm="110.0.8805-13072699252" microscope-data="8805-13072699252" data-title="自定义内容区" data-context="' . $this->module[attr][wtype] . '" data-ismove="1" data-isdel="1" data-isedit="1" data-isadd="1" data-width="880" data-uri="/module/moduleForm.htm?widgetId=13072699252&amp;sid=340826219&amp;pageId=1147251295">
    <div class="skin-box zts-custom">
        <s class="skin-box-tp"><b></b></s>
        <div class="skin-box-hd ' . (($this->module['setting']['isshowtit'] === '1') ? "" : "disappear") . ' ">
            <i class="hd-icon"></i>
            <h3><span>' . ($this->module['setting']['isshowtit'] ? $this->module['setting']['title'] : $this->module['attr']['description']) . '</span></h3>
            <div class="skin-box-act disappear">
                <a href="#" class="more">更多</a>
            </div>
        </div>
        <div class="skin-box-bd" >
            <div class="customcon" ' . ($this->module['setting']['isecplay'] == "1" ? 'style="height:' . $this->module['setting']['content_height'] . ';"' : '') . ' >
                ' .
            ($this->module[setting][content] ? ($this->module['setting']['isecplay'] == "1" ? '<div class="ecplaycuswrap" style="height:' . $this->module['setting']['content_height'] . ' ;"><div class="ecplaycuswrapin" id="container">' . htmlspecialchars_decode($this->module[setting][content]) . '</div></div>' : htmlspecialchars_decode($this->module[setting][content])) : '
                                <div class="customtip">
                                    自定义内容，可以用来展示店铺特色的宝贝、活动。
                                </div>')
            . '
            </div>
        </div>
    </div>
</div>
        ';
        return $html;
    }

    /**
     * @name 图片轮播
     **/
    public function slider()
    {

        $html = '
<div class="J_TModule" data-widgetid="' . $this->module['id'] . '" id="shop13072685668" data-componentid="' . $this->module[compid] . '" data-spm="110.0.8806-13072685668" microscope-data="8806-13072685668" data-title="图片轮播" data-context="' . $this->module[attr][wtype] . '" data-ismove="1" data-isdel="1" data-isedit="1" data-isadd="1" data-width="773" data-uri="/module/moduleForm.htm?widgetId=13072685668&amp;sid=340826219&amp;pageId=1147251295">
  <div class="skin-box tb-module zts-focus">
    <style>.tshop-pbsm-shop-main-slide-1450356673033 .slide-box,.tshop-pbsm-shop-main-slide-1450356673033 .slide-box .slide-content li{height: 250px;}</style>
    <s class="skin-box-tp"> <b></b>
    </s>
    <div class="skin-box-hd ' . (($this->module['setting']['isshowtit'] === '0') ? "disappear" : "") . ' "> <i class="hd-icon"></i>
      <h3>
        <span>' . ($this->module['setting']['isshowtit'] ? $this->module['setting']['title'] : $this->module['attr']['description']) . '</span>
      </h3>
      <div class="skin-box-act disappear">
        <a href="#" class="more">更多</a>
      </div>
    </div>
    <div class="skin-box-bd">
      <div data-widget-config="{
            \'contentCls\': \'slide-content\',
            \'triggerCls\': \'slide-triggers\',
            \'navCls\': \'slide-triggers\',
            \'activeTriggerCls\': \'selected\',
            \'triggerType\': \'mouse\',
            \'effect\': \'fade\',
            \'prevBtnCls\': \'prev-btn\',
            \'nextBtnCls\': \'next-btn\',
            \'disableBtnCls\': \'disable\',
            \'steps\': 1,
            \'autoplay\': true,
            \'circular\': true,
            \'length\': 2,
            \'interval\': 3,
            \'easing\': \'easeBothStrong\'
        }" data-widget-type="Carousel" class="J_TWidget slide-box">
        <ul class="slide-content">
          <li style="display: block;">
            <a target="_blank" title="" href="#">
              <img src="//gdp.alicdn.com/tps/i2/T1GBncXl4fXXa_gJAe-950-250.png"></a>
            <div class="title"></div>
            <div class="sub-title"></div>
            <div class="other"></div>

          </li>
          <li style="display: block;">
            <a target="_blank" title="" href="#">
              <img src="//gdp.alicdn.com/tps/i3/T1NWDfXjldXXa_gJAe-950-250.png"></a>
            <div class="title"></div>
            <div class="sub-title"></div>
            <div class="other"></div>

          </li>
        </ul>
        <div class="slide-triggers-bg"></div>
        <ol class="slide-triggers">
          <li class="first selected">
            <span>01</span>
            <s></s>
          </li>
          <li>
            <span>02</span>
            <s></s>
          </li>
        </ol>
        <div class="prev-btn prev">
          <div class="prev-next-bg"></div>
          <div class="text"></div>
        </div>
        <div class="next-btn next">
          <div class="prev-next-bg"></div>
          <div class="text"></div>
        </div>
      </div>
    </div>
    <s class="skin-box-bt"> <b></b>
    </s>
  </div>
</div>
        ';
        return $html;
    }

    /**
     * @name 友情链接
     **/
    public function friendlink()
    {

        $html = '
<div class="J_TModule" data-widgetid="' . $this->module[id] . '" id="shop13072724788" data-componentid="' . $this->module[compid] . '" data-spm="110.0.8807-13072724788" microscope-data="8807-13072724788" data-title="友情链接" data-context="' . $this->module[attr][wtype] . '" data-ismove="1" data-isdel="1" data-isedit="1" data-isadd="1" data-width="734" data-uri="/module/moduleForm.htm?widgetId=13072724788&amp;sid=340826219&amp;pageId=1147251295">
    <div class="skin-box tb-module tshop-pbsm tshop-pbsm-shop-friend-link">
        <s class="skin-box-tp"> <b></b>
        </s>
        <div class="skin-box-hd ' . (($this->module['setting']['isshowtit'] === '0') ? "disappear" : "") . '"> <i></i>
            <h3>
                <span>' . ($this->module['setting']['isshowtit'] ? $this->module['setting']['title'] : $this->module['attr']['description']) . '</span>
            </h3>
            <div class="skin-box-act disappear">
                <a href="#">更多</a>
            </div>
        </div>
        <div class="skin-box-bd">
            <ul class="cats-tree">
                <li class="cat"> <i class="cat-icon"></i>
                    <!--mmfr-->
                    <a title="" href="//shop125546945.taobao.com/?spm=0.0.0.0.xFpQuh&amp;amp;scene=taobao_shop" target="_blank" rel="nofollow">11</a>
                </li>
            </ul>
        </div>
    </div>

</div>
        ';
        return $html;
    }

    /**
     * @name 客服中心
     **/
    public function service()
    {
        $html = '
<div class="J_TModule" data-widgetid="' . $this->module[id] . '" id="shop13072710928" data-componentid="' . $this->module[compid] . '" data-spm="110.0.8808-13072710928" microscope-data="8808-13072710928" data-title="客服中心" data-context="' . $this->module[attr][wtype] . '" data-ismove="1" data-isdel="1" data-isedit="1" data-isadd="1" data-width="550" data-uri="/module/moduleForm.htm?widgetId=13072710928&amp;sid=340826219&amp;pageId=1147251295">
    <div class="skin-box zts-service">
        <s class="skin-box-tp"><b></b></s>
        <div class="skin-box-hd ' . (($this->module['setting']['isshowtit'] === '0') ? "disappear" : "") . ' ">
            <i class="hd-icon"></i>
            <h3><span>' . ($this->module['setting']['isshowtit'] ? $this->module['setting']['title'] : $this->module['attr']['description']) . '</span></h3>
            <div class="skin-box-act disappear">
                <a href="#" class="more">更多</a>
            </div>
        </div>
        <div class="skin-box-bd">
            <ul>
                <li class="service-block">
                    <h4>工作时间</h4>
                    <ul class="service-content">
                        <li>周一至周五：9:00-21:00</li>
                        <li>周六至周日：0:00-24:00</li>
                    </ul>
                </li>
                <li class="service-block">
                    <h4>在线咨询</h4>
                    <ul data-url="//osdsc.alicdn.com//taesite/TB15MgNKpXXXXbNXpXXUxnn4FXX.groupmember|var^groupMember;sign^7b520669ab5c30bca9ac0872d58beaf4;lang^gb18030;t^1452138831000" data-group-filter="all" data-nick="5%E5%BC%A0%E8%B1%AA%E6%A0%8B" data-gnick="5%D5%C5%BA%C0%B6%B0" class="service-content service-group">
                        <li data-wangwang="mainwangwang"><span class="groupname">客服中心</span></li></ul>
                </li>
            </ul>
        </div>
    </div>
</div>
        ';
        return $html;
    }
    /**
     * @name 店铺招牌
     **/
//     public function shopsign(){

//         $html = '
// <div class="J_TModule module_banner" data-widgetid="'.$this->module[id].'" id="shop12350952761" data-componentid="'.$this->module[compid].'" data-spm="110.0.8820-12350952761" microscope-data="8820-12350952761" data-title="店铺招牌" data-context="'.$this->module[attr][wtype].'" data-ismove="1" data-isdel="1" data-isedit="1" data-isadd="1" data-width="909" data-uri="/module/moduleForm.htm?widgetId=12350952761&amp;sid=340908835&amp;pageId=1147566751">
//   <div class="skin-box tb-module zts-banner">
//     <s class="skin-box-tp"> <b></b>
//     </s>
//     <div class="skin-box-hd '.(($this->module['setting']['isshowtit']==='0')?"disappear":"").' disappear"> <i class="hd-icon"></i>
//       <h3>
//         <span>'.($this->module['setting']['isshowtit']?$this->module['setting']['title']:$this->module['attr']['description']).'</span>
//       </h3>
//       <div class="skin-box-act">
//         <a href="#" class="more">更多</a>
//       </div>
//     </div>
//     <div class="skin-box-bd">

//       <div>
//         <div class="banner-box"></div>
//       </div>
//       <h2 class="title border-radius">尘尛</h2>
//     </div>
//     <s class="skin-box-bt"> <b></b>
//     </s>
//   </div>
// </div>
//         ';
//         return $html;
//     }
    /**
     * @name 搜索
     **/


    public function search()
    {
        $html = '
<div class="J_TModule tb-module shop13072654076" data-widgetid="' . $this->module[id] . '" data-componentid="' . $this->module['compid'] . '" data-spm="110.0.8802-13072654076" microscope-data="8802-13072654076" data-title="本店搜索" data-context="' . $this->module[attr][wtype] . '" data-ismove="1" data-isdel="1" data-isedit="1" data-isadd="1" data-width="" data-uri="/module/moduleForm.htm?widgetId=13072654076&amp;sid=340826219&amp;pageId=1147251295">
    <div class="skin-box zts-search">
        <s class="skin-box-tp"><b></b></s>
        <div class="skin-box-hd ' . (($this->module['setting']['isshowtit'] === '0') ? "disappear" : "") . ' ">
            <i class="hd-icon"></i>
            <h3><span>' . ($this->module['setting']['isshowtit'] ? $this->module['setting']['title'] : $this->module['attr']['description']) . '</span></h3>
            <div class="skin-box-act disappear">
                <a href="#" class="more">更多</a>
            </div>
        </div>
        <div class="skin-box-bd">
            <form name="SearchForm" action="//shop125546945.taobao.com/search.htm" method="get">
                <ul>
                    <input type="hidden" name="search" value="y">
                    <li class="keyword">
                        <label for="keyword">
                            <span class="key">关键字</span>
                            <input type="text" size="18" name="keyword" autocomplete="off" value="" class="keyword-input J_TKeyword prompt">
                        </label>

                    </li>
                    <li class="submit">
                        <input value="搜索" class="J_TSubmitBtn btn" type="submit">
                    </li>
                </ul>
            </form>
            <div class="hot-keys">

                <span>热门搜索:</span>
                <a href="//shop125546945.taobao.com/search.htm?search=y&amp;keyword=%B9%D8%BC%FC%B4%CA%D2%BB">关键词一</a>
                <a href="//shop125546945.taobao.com/search.htm?search=y&amp;keyword=%B9%D8%BC%FC%B4%CA%B6%FE">关键词二</a>
                <a href="//shop125546945.taobao.com/search.htm?search=y&amp;keyword=%B9%D8%BC%FC%B4%CA%C8%FD">关键词三</a>
            </div>
        </div>
    </div>
</div>
        ';
        return $html;
    }

    public function shopsign()
    {
        $shop = D('Shop')->where(array('uid' => $this->module['uid']))->find();
        $html = '
<div class="J_TModule module_banner" data-widgetid="' . $this->module[id] . '" id="shop12350952761" data-componentid="8820" data-spm="110.0.8820-12350952761" microscope-data="8820-12350952761" data-title="店铺招牌" data-context="h950" data-ismove="1" data-isdel="1" data-isedit="1" data-isadd="1" data-width="909" data-uri="/module/moduleForm.htm?widgetId=12350952761&amp;sid=340908835&amp;pageId=1147566751">

    <div class="banbox ' . ($this->module['setting']['type'] == 2 ? 'hascustoming' : '') . '" style=" height:' . (empty($this->module[setting][height])?150:$this->module[setting][height]) . 'px; ';
        if ($this->module['setting']['type'] == 1) {
            $html .= ' background:url(\'' . $this->module['setting']['background_image'] . '\');';
        }
        $html .= '">
        <div class="customcon" >' . ($this->module['setting']['type'] == 2 ? '<div class="ecplaycuswrap" style="height:' . (empty($this->module[setting][height])?150:$this->module[setting][height]) . 'px ;"><div class="ecplaycuswrapin" id="container">' . htmlspecialchars_decode($this->module[setting][content]) . '</div></div>' : '') . '</div>
        <h2 class="shoptitle">' . ($this->module[setting][is_show_name] === '0' ? "" : $shop[name]) . '</h2>
    </div>
</div>
        ';
        return $html;
    }

    public function navigation()
    {
        $category = D("ShopinCategory")->where(array('userid'=>$this->module['uid'],'pid'=>0))->order('listorder asc')->select();
        foreach($category as $k=>$v){
            $category[$k]['son'] = D("ShopinCategory")->where(array('pid'=>$v['id']))->order('listorder asc')->select();
        }
        $shop = D("Shop")->where(array('uid'=>$this->module['uid']))->find();
        $diypages = D("ShopPage")->where(array('uid'=>$this->module['uid'],'type'=>'diy','status'=>1))->select();

        $html = '
<div class="J_TModule tb-module nav_module  "  data-widgetid="' . $this->module[id] . '" data-componentid="8821" data-spm="110.0.5002-12346745824" microscope-data="8821-12346745824" data-title="导航" data-context="h950" data-ismove="0" data-isdel="0" data-isedit="0" data-isadd="0" data-width="650" data-uri="/module/moduleForm.htm?widgetId=12346745824&amp;sid=340826219&amp;pageId=1147251295">
    <div class="nav">
        <div class="allcats navpop-title">
            <div class="allcats-trigger " >
                <a href="javascript:void(0)" class="link">
                    <span class="title">所有分类</span>
                    <i class="popup-icon"></i>
                </a>
                <ul>
                    <li>
                        <h4>
                            <a href="'.U('Shop/Product/index',array('cateID'=>'','dom'=>$shop['domain'])).'">所有宝贝</a>
                        </h4>
                        <ul>
                            <li></li>
                            <li>
                                <h4><a href="'.U("Shop/Product/index",array('cateID'=>'','dom'=>$shop['domain'],'order'=>'_sell')).'">按销量</a></h4>
                                <h4><a href="'.U("Shop/Product/index",array('cateID'=>'','dom'=>$shop['domain'],'order'=>'_new')).'">按新品</a></h4>
                                <h4><a href="'.U("Shop/Product/index",array('cateID'=>'','dom'=>$shop['domain'],'order'=>'price')).'">按价格</a></h4>
                                <h4><a href="'.U("Shop/Product/index",array('cateID'=>'','dom'=>$shop['domain'],'order'=>'_collect')).'">按收藏</a></h4>
                            </li>
                        </ul>
                    </li>';
        foreach($category as $k=>$v){
            $html .='<li>
                        <h4>
                            <a href="'.U('Shop/Product/index',array('cateID'=>$v['id'],'dom'=>$shop['domain'])).'">'.$v['name'].'</a>
                        </h4>
                        <ul>
                            <li></li>
                            <li>
                            ';
            foreach($v['son'] as $k1=>$v1){
                $html .='<h4><a href="'.U('Shop/Product/index',array('cateID'=>$v1['id'],'dom'=>$shop['domain'])).'">'.$v1['name'].'</a> </h4>';
            }
            
            $html .=                '</li>
                        </ul>
                    </li>';
        }

        $html .=            
                    '
                </ul>
            </div>
        </div>
        <ul class="ulnav clear-fix">
            <li class="menu"><a href="'.shopurl($shop['domain']).'" class="link"><span class="title">首页</span></a></li>';
        foreach($diypages as $k=>$v){
            $html .= '<li class="menu"><a href="'.diypageurl($v['id'],$shop['domain']).'" class="link"><span class="title">'.$v['title'].'</span></a></li>';
        }
        $html .= '
            
        </ul>
    </div>
</div>

        ';
        return $html;
    }


}

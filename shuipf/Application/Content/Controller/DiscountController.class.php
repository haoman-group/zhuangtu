<?php
/**
* @class 折扣折扣&天天特价
* @author 李冰
**/
namespace Content\Controller;

use Common\Controller\Base;
use Content\Model\ContentModel;

class DiscountController extends Base {
    protected $model = NULL;
    protected function _initialize() {
        parent::_initialize();
    }
    //折扣折扣
    public function discount() {
        $posdata = D('Admin/PositionData')->getDataByPageID("11");
        $three=$posdata['210'];
        $four=$posdata['211'];
        $five=$posdata['212'];
        $between=$posdata['213'];
        $this->assign("between",$between);
        $this->assign('five',$five);
        $this->assign('four',$four);
        $this->assign("three",$three);
        $this->display();
    }
    //天天特价
    public function sale(){
         $posdata = D('Admin/PositionData')->getDataByPageID("9");
         $day=$posdata['214'];//今天特价
         $Package=$posdata['215'];//特价套餐
         $zhuangtu=$posdata['216'];
         $this->assign('zhuangtu',$zhuangtu);
         $this->assign('package',$Package);
         $this->assign("day",$day);
        $this->display();
    }
    //品牌街
    public function brandStreet(){
        $posdata = D('Admin/PositionData')->getDataByPageID("10");
        $posdataa=$posdata['176'];
        $posdatad=$posdata['179'];
        $posdataf=$posdata['180'];
        $posdataj=$posdata['181'];
        $posdatam=$posdata['182'];
        $posdatap=$posdata['183'];
        $posdatas=$posdata['184'];
        $posdataw=$posdata['186'];

        $posdatag=$posdata['187'];
        $posdatac=$posdata['188'];
        $posdatah=$posdata['189'];
        $posdatak=$posdata['190'];
        $posdatan=$posdata['191'];
        $posdataq=$posdata['192'];
        $posdatat=$posdata['193'];
        $posdatax=$posdata['194'];

        $posdatab=$posdata['195'];
        $posdatae=$posdata['196'];
        $posdatai=$posdata['197'];
        $posdatal=$posdata['198'];
        $posdatao=$posdata['199'];
        $posdatar=$posdata['200'];
        $posdatau=$posdata['201'];
        $posdataz=$posdata['202'];
        $this->assign('posdatax',$posdatax);
        $this->assign('posdataz',$posdataz);
        $this->assign('posdataw',$posdataw);
        $this->assign('posdatau',$posdatau);
        $this->assign('posdatat',$posdatat);
        $this->assign('posdatas',$posdatas);
        $this->assign('posdatar',$posdatar);
        $this->assign('posdataq',$posdataq);
        $this->assign('posdatap',$posdatap);
        $this->assign('posdatao',$posdatao);
        $this->assign('posdatal',$posdatal);
        $this->assign('posdatan',$posdatan);
        $this->assign('posdatam',$posdatam);
        $this->assign('posdataj',$posdataj);
        $this->assign('posdatab',$posdatab);
        $this->assign('posdatak',$posdatak);
        $this->assign('posdatai',$posdatai);
        $this->assign('posdataf',$posdataf);
        $this->assign('posdatah',$posdatah);
        $this->assign('posdatad',$posdatad);
        $this->assign('posdatae',$posdatae);
        $this->assign('posdatac',$posdatac);
        $this->assign('posdatag',$posdatag);
        $this->assign("posdataa",$posdataa);
        $this->display();
    }

    // 大家团
    public function groupBuy(){
        $data = D('Admin/Activity')->getProducts();
        $this->assign('Activity',$data['Activity']);
        $this->assign('data',$data['result']);
        $this->display();
    }

    // 格力空调
    public function GREE(){
        $this->display();
    }

    // 秒杀池
    public function spikepool(){
        $pool= D('Admin/PositionData')->getDataByPageID("12");
       foreach ($pool as $key => $value) {
          foreach ($value as $k => $v) {
            $pool[$key][$k]['count']=M('Product')->where(array('id'=>$v['data']['id']))->getField("count_sold");

          }
       }

        //var_dump($pool['219']);exit;
         $this->assign('pool',$pool);
        $this->display();

    }

    // 苏宁易购
    public function suning(){
        $posdata=D('Admin/PositionData')->getDataByPageID("16");
        $this->assign("posdata",$posdata);
        $this->display();
    }

    //七夕
    // public function tanabata(){
    //     $posdata=D('Admin/PositionData')->getDataByPageID("17");
    //     $this->assign("posdata",$posdata);
    //     $this->display();

    // }

    //大咖秀
    public function bigbrand(){
        $posdata=D('Admin/PositionData')->getDataByPageID("18");
        $this->assign("posdata",$posdata);
        //var_dump($posdata);exit;
        $this->display();

    }

    //中秋和国庆的活动页面

    public function autumnfestival(){
        $posdata=D("Admin/PositionData")->getDataByPageID('19');
        $this->assign("posdata",$posdata);
        $this->display();
    }

}

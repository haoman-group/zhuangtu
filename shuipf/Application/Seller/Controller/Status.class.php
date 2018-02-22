<?php

namespace Seller\Controller;
 class Status {
     
    const WEIGHT_INDEX = 90;//首页推荐
    const WEIGHT_LIST = 60;//首页推荐
    //宝贝销售状态
    const STATUS_VIOLATE=-10;//违规下架
    const STATUS_SELLEROUT=-5;//商家下架
    const STATUS_SELLOUT=-1;//售完下架
    const STATUS_NEVER=1;//从未上架
    const STATUS_SOON=5;//即将开始
    const STATUS_SELLING=10;//出售中
    // const STATUS_SHOWCASE=20;//橱窗推荐
    //宝贝审核状态
    const AUDIT_PASS=10;//通过
    const AUDIT_PENDING= 2;//待处理
    const AUDIT_VIOLATE=-10;//违规
    const AUDIT_SELLOUT=-5;//下架
    const AUDIT_AUDIT=0;//待审核

    //销售状态数组
    public static $ProStatus = array(    self::STATUS_VIOLATE=>'违规下架',
                                   self::STATUS_SELLEROUT=>'商家下架',
                                   self::STATUS_SELLOUT=>'售完下架',
                                   self::STATUS_NEVER=>'从未上架',
                                   self::STATUS_SOON=>'即将开始',
                                   self::STATUS_SELLING=>'出售中',
                                   // self::STATUS_SHOWCASE=>'橱窗推荐'
                                   );
    //审核状态数组
    public static $auditStatus =array(  self::AUDIT_PASS =>'通过',
                                   self::AUDIT_PENDING=>'待处理',
                                   self::AUDIT_VIOLATE=>'违规',
                                   self::AUDIT_SELLOUT=>'下架',
                                   self::AUDIT_AUDIT=>'待审核',
                                   );
    //交易状态
    public static $OrderStatus = array("1"=>array(ORDER_STATE_CANCEL=>'订单取消',ORDER_STATE_NEW=>'待付款',ORDER_STATE_PAY=>'待交稿',ORDER_STATE_SEND=>'改稿中',ORDER_STATE_SETUP=>'终稿待确认',ORDER_STATE_SUCCESS=>'交易完成'),
                                       "2"=>array(ORDER_STATE_CANCEL=>'订单取消',ORDER_STATE_NEW=>'待付款',ORDER_STATE_PAY=>'待施工',ORDER_STATE_SEND=>'施工中',ORDER_STATE_SETUP=>'待验收',ORDER_STATE_SUCCESS=>'交易完成'),
                                       "3"=>array(ORDER_STATE_CANCEL=>'订单取消',ORDER_STATE_NEW=>'待付款',ORDER_STATE_PAY=>'待发货',ORDER_STATE_SEND=>'待安装',ORDER_STATE_SETUP=>'待确认',ORDER_STATE_SUCCESS=>'交易完成'),
                                       "4"=>array(ORDER_STATE_CANCEL=>'订单取消',ORDER_STATE_NEW=>'待付款',ORDER_STATE_PAY=>'待发货',ORDER_STATE_SEND=>'待安装',ORDER_STATE_SETUP=>'待确认',ORDER_STATE_SUCCESS=>'交易完成'),
                                       "5"=>array(ORDER_STATE_CANCEL=>'订单取消',ORDER_STATE_NEW=>'待付款',ORDER_STATE_PAY=>'待发货',ORDER_STATE_SEND=>'待安装',ORDER_STATE_SETUP=>'待确认',ORDER_STATE_SUCCESS=>'交易完成')
                                       );
 }
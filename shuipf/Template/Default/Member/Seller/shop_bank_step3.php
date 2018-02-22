<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>

    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
</head>
<body>
  <template file="common/_header.php"/>
  <!--中部-->
  <div class="seller_reg_process_ul">
      <ul>
          <li>
              <em></em>
              <span>1.商家注册</span>
          </li>
          <li>
              <em></em>
              <span>2.申请开店</span>
          </li>
          <li  class="on">
              <em></em>
              <span>3.绑定银行卡</span>
          </li>
          <li >
              <em></em>
              <span>4.资质审核</span>
          </li>
          <li>
              <em></em>
              <span>5.创建店铺</span>
          </li>
          <li>
              <em></em>
              <span>6.店铺上线</span>
          </li>
      </ul>
  </div>
  <!--内容-->
  <!--保护容器-->
  <div class="container">
    <div class="seller_main">
        <ul class="guocheng">
            <li class="on">
                <em><i>1</i></em>
                <span>填写身份信息</span>
            </li>
            <li>
                <em><i>2</i></em>
                <span>验证银行卡信息</span>
            </li>
            <li>
                <em><i>3</i></em>
                <span>打款验证</span>
            </li>
        </ul>
      <div class="reg_bcard_stepform sellerreground">
        <div class="formhead"> 
          <eq name='audit[status]' value="0">
            <strong>请等待装途网向您的{$data.bank}卡（尾号{$data.bank_card_number|substr=###,-4}）汇款，预计1-2天内到账，请注意查收。</strong>
          </eq>
          <eq name='audit[status]' value="1">
            <strong>装途网已向您的{$data.bank}卡（尾号{$data.bank_card_number|substr=###,-4}）汇款，请继续下方的验证流程</strong>
          </eq>
        </div>
          <ul class="guocheng huikuan">
              <li <eq name='audit[status]' value="0"> class="on"</eq>>
                  <em><i>1</i></em>
                  <span>等待汇款（1-2天）</span>
              </li>
              <li <eq name='audit[status]' value="1"> class="on"</eq>>
                  <em><i>2</i></em>
                  <span>核对汇款金额</span>
              </li>
              <li <eq name='audit[status]' value="2"> class="on"</eq>>
                  <em><i>3</i></em>
                  <span>等待审核</span>
              </li>
              <li <eq name='audit[status]' value="5"> class="on"</eq>>
                  <em><i>4</i></em>
                  <span>认证成功</span>
              </li>
          </ul>
        <ul class="payverify">
          <li>
            <p>装途网向银行卡内汇一笔1元以下的随机金额</p>
            <eq name='audit[status]' value="1">
                <p>
                  <!--<a href="" class="btn btnmovered">已收到</a>-->
                  <a href="javascript:void(0)" data-tarfix="fix_nobankmoney" class="btn btnmovered btnshowfix">未收到</a>
                </p>
            </eq>
            <div class="position" id="fix_nobankmoney">
               <div class="box">              		
               		<img src="{$config_siteurl}statics/zt/images/seller_regbank_fixclose.png" class="close">
                    <img class="titleimg" src="{$config_siteurl}statics/zt/images/Seller_register03float_warn.png">
                    <h3>核对银行卡信息</h3>
                    <dl>
                        <dt>
                            开户人姓名：
                            <em></em>
                        </dt>
                        <dd>
                            {$data.truename}
                        </dd>
                        <dt>
                            身份证号码：
                            <em></em>
                        </dt>
                        <dd>
                            {$data.idcard}
                        </dd>
                        <dt>
                            银 行 卡 号：
                            <em></em>
                        </dt>
                        <dd>
                            {$data.bank_card_number}
                        </dd>
                        <dt>
                            开   户   行：
                            <em></em>
                        </dt>
                        <dd>
                            {$data.bank}
                        </dd>
                    </dl>
                    <div  class="btnbox">
                        <a href="{:U('shop_bank_step1_redo')}">重新填写</a>
                        <p>若信息无误，请拨打400客服热线进行人工认证</p>
                    </div>
               </div>
            </div>
            
          </li>
          <li>
            <p>请将您收到的金额提供给装途网</p>
            <eq name='audit[status]' value="1">
                <p>
                <a href="javascript:void(0)" class="btn btnred btnshowfix" data-tarfix="fix_fillbankmoney">输入金额</a>
                </p>
            </eq>

              <!--below edit by f-->
              <eq name='audit[status]' value="5">
                  <p>
                      <a href="javascript:void(0)" class="btn btnred btnshowfixlock" data-tarfix="fix_fillbankmoney">已锁定</a>
                  </p>
              </eq>
              <eq name='audit[status]' value="-1">
                  <p>
                       交易失败 <br><a href="{:U('shop_bank_step1_redo')}">重新填写银行卡信息</a>
                  </p>
              </eq>
            <!--above edit by f-->
            <div class="fix"></div>
            <div class="position" id="fix_fillbankmoney">
            	
               <div class="box entry">
        			<img src="{$config_siteurl}statics/zt/images/seller_regbank_fixclose.png" class="close">
                    <img class="titleimg" src="{$config_siteurl}statics/zt/images/Seller_register03float_money.png">
                    <h3>填写汇款金额</h3>
                    <span>请将您收到的金额提供给装途网，以确保您的账户处于正常状态，汇款金额累计填写错误三次，认证过程将锁定30分钟</span>
                    <div  class="btnbox hasyuan">
                        <input type="text" name="inpbankmoney" >
                        <!--默认状态-->
                        <p class="blank" style="display:block;">&nbsp;</p>
                        
                        <!--填写错误的状态-->
                        <p class="error" style="display:none"><img src="{$config_siteurl}statics/zt/images/Seller_register03float_wrong.png">汇款金额填写错误，请重新填写</p>
                        
                        <!--锁定状态-->
                        <p class="locked" style="display:none">汇款金额填写错误，认证过程将锁定30分钟</p>
                        <input type="button" class="btn" value="填写完成">
                    </div>
               </div>
          	</div>
            
          </li>


            <eq name="audit[status]" value='2'>

                <li>
                    <p class="color_bb1b21">
                        完成认证
                    </p>

                </li>
            <else/>

                <li>
                    <p>装途网对收到的金额截图进行审核</p>
                </li>

            </eq>

        </ul>
      </div>
      <eq name="audit[status]" value='2'>
        <div  class="btnbox nextb">
          <a href="{:U('shop_offline_info')}">下一步</a>
        </div>
      </eq>
    </div>
  </div>
  <template file="common/_footer.php"/>
</body>
</html>
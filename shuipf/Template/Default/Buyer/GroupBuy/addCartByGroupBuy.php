<!doctype html>
<html>
<head>
     <meta charset="utf-8">
     <title>购物车</title>
     <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
     <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css"/>
     <!--[if lt IE 9]>
     <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
     <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
     <![endif]-->
     <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script src="{$config_siteurl}statics/js/layer/layer.js"> </script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
     <script src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
</head>

<body>
<!--背景容器-->
<template file="Content/common/_header.php"/>

<!--购物车-->
<div class="container confirmorder">
    <form id="form" action="{:U('GroupBuyorderpay')}" method="post">
        <input name="act_id" value="{$act_id}" hidden>
    <h5>确认收货地址</h5>
    <div class="address">
        <div class="ul">
            <input type="hidden" name="addrid" value="{$addrlist.0.id}">
            <volist name="addrlist" id="vo">
            <a data-addrid="{$vo.id}"  <eq name="vo.default" value="1" >class="on"</eq> href="javascript:void(0)">

                <ul>
                    <li>
                        <em>{$vo.name}</em>（收）<span class="aaddredit btnaddr"  >修改本地址</span>
                    </li>
                    <li>{$vo.area}</li>
                    <li>{$vo.address}（{$vo.name}   收）</li>
                    <li>{$vo.phone}</li>
                </ul>
            </a>
            </volist>
            <a data-addrid="" class="addnew btnaddr" href="javascript:void(0)">
                <span>+</span>
                添加新地址
            </a>
        </div>
    </div>
    <span class="manage"><a href="{:U('Buyer/User/shipAddr')}">管理收货地址</a></span>
    <div class="details">
        <h5>商品及服务信息</h5>
        <volist name="cartlist" id="vo">
            <ul class="title">
                <li><a class="shop" href="javascript:void(0)">店铺名称：{$vo.shop.name}</a><a href="javascript:void(0)">卖家昵称：***</a></li>
                <li></li>
                <li>单价（元）</li>
                <li>数量</li>
                <li>优惠信息</li>
                <li>金额（元）</li>
            </ul>
            <volist name="vo[cart]" id="cart">
                <div class="content">
                    <ul>
                        <li>
                            <img class="img" src="{$cart['product']['headpic']}">
                            <p>{$cart['product']['title']}</p>
                            <p>
                              <volist name="cart[product][provalue]" id="provalue">
                                  <?php if($key=='price'|| $key=='price_act') break; ?>
                                  {$key}：{$provalue['txt']}&nbsp;&nbsp;&nbsp;
                                </volist>
                            </p>
                            <p>{$vo.shop.addr}   {$vo.shop.phone}</p>
                        </li>
                        <li><!-- 有合同 --></li>
                        <li>
                            {$cart[product][provalue]['price_act']}
                        </li>
                        <li>
                            {$cart['num']}
                        </li>
                        <li>
                            <empty name="cart['activity']">
                            <select>
                                <option>卖家促销</option>
                                <option>卖家促销</option>
                                <option>卖家促销</option>        
                            </select>
                            <else/>
                            <select>
                                <option>{$cart['activity']['title']}</option>
                            </select>
                            </empty>
                        </li>
                        <li>
                            <strong>{$cart[total]}</strong>
                        </li>
                    </ul>
                    <dl>
                        <dt>给卖家留言：<input type="text" name='msg[{$vo.shop.id}]' placeholder="选填：对本次交易的说明（建议填写已经和卖家达成一致的说明）"></dt>
                        <dd><span>工人施工险</span><span>装途网赠送:</span><span>0.00</span></dd>
                        <!--<a href="javascript:void(0)">卖家送货</a> 
                        <a href="javascript:void(0)">买家安装</a> -->
                        <!-- <a href="javascript:void(0)">有合同</a> -->
                        <!-- <strong>请查看您购买的商品合同/协议内容</strong> -->
                    </dl>
                </div>
            </volist>
        </volist>
        
    </div>

    <div class="pay">
        <span>合计（含运费）:<strong>￥{$total}</strong></span>
        <input type="hidden" name="cartid" value="{$cartid}">
        <a href="javascript:$('#form').submit()" class="btnsubmorder">提交订单</a>
    </div>
    </form>

</div>

<div class="tempbox" id="tempbox" style="display: none;">
    <a data-addrid="" >
    <ul>
        <li>
            <em></em>（收）<span class="aaddredit btnaddr"  >修改本地址</span>
        </li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    </a>
</div>


<!--保证栏-->
<template file="common/_promise.php"/>
<!--尾部-->
<!--背景容器-->
<template file="common/_footer.php"/>


<!--浮框-->
<div class="zt_fixed">
    <div class="content center">
        <h6>温馨提示</h6>
        <p>您购买的商品需要商家测量后拟订合同，请尽快与商家联系</p>
        <p>为保障双方权益，请自觉签署购买合同</p>
    </div>
    <a class="btn" href="javascript:void(0)">确 定</a>
</div>


<div class="zt_fixed zt_fixed_width1190">
    <div class="content">
        <h6 class="center">《装途网购买***合同》</h6>
        <p>
            一、声明与承诺
            （一）在接受本协议或您以本公司允许的其他方式实际使用支付宝服务之前，请您仔细阅读本协议的全部内容（特别是以粗体标注的内容）。如果您不同意本协议的任意内容，或者无法准确理解本公司对条款的解释，请不要进行后续操作，包括但不限于不要接受本协议，不使用本服务。如果您对本协议的条款有疑问，请通过本公司客服渠道进行询问（客服电话为95188），本公司将向您解释条款内容。
            （二）您同意，如本公司需要对本协议进行变更或修改的，须通过www.alipay.com网站公告的方式提前予以公布，公告期限届满后即时生效；若您在本协议内容公告变更生效后继续使用支付宝服务的，表示您已充分阅读、理解并接受变更后的协议内容，也将遵循变更后的协议内容使用支付宝服务；若您不同意变更后的协议内容，您应在变更生效前停止使用支付宝服务。
            （三）如您为无民事行为能力人或为限制民事行为能力人，例如您未满18周岁，则您应在监护人监护、指导下阅读本协议和使用本服务。若您非自然人，则您确认，在您取得支付宝账户时，或您以其他本公司允许的方式实际使用支付宝服务时，您为在中国大陆地区合法设立并开展经营活动或其他业务的法人或其他组织，且您订立并履行本协议不受您所属、所居住或开展经营活动或其他业务的国家或地区法律法规的排斥。不具备前述条件的，您应立即终止注册或停止使用支付宝服务。
            （四）您在使用支付宝服务时，应自行判断交易对方是否具有完全民事行为能力并自行决定是否使用支付宝服务与对方进行交易，且您应自行承担与此相关的所有风险。
            (五)您确认，您在淘宝上发生的所有交易，您已经不可撤销地授权淘宝按照其制定的《淘宝网服务协议》、《tmall.com（天猫）服务协议》及《淘宝规则》、《淘宝争议处理规范》、《交易超时规则》等规则进行处理；同时， 您不可撤销地授权本公司按照淘宝的指令将争议款项的全部或部分支付给交易一方或双方，同时本公司有权从淘宝获取您的相关信息（包括但不限于交易商品描述、物流信息、行为信息、账户相关信息等）。本公司按照淘宝的指令进行资金的止付、扣划完全来自于您的授权，本公司对因此给您造成的任何损失均不承担责任。但您确认，您使用支付宝服务时，您仍应完全遵守本协议及本公司制定的各项规则及页面提示等。

            （六）您同意，您在阿里巴巴中国站上发生的所有交易，您已经不可撤销地授权阿里巴巴中国站按照其与您之间的协议及其制定并发布的《阿里巴巴中国网站规则》等规则进行处理；同时，您不可撤销地授权本公司按照阿里巴巴中国站的指令将争议款项的全部或部分支付给交易一方或双方，同时本公司有权从阿里巴巴中国站获取您的相关信息（包括但不限于交易商品描述、物流信息、行为信息、账户相关信息等）。本公司按照阿里巴巴中国站的指令进行资金的止付、扣划完全来自于您的授权，本公司对因此给您造成的任何损失均不承担责任。但您确认，您使用支付宝服务时，您仍应完全遵守本本协议及本公司制定的各项规则及页面提示等。
            二、定义及解释
            （一）支付宝账户（或“该账户”）：指您按照本公司允许的方式取得的供您使用支付宝服务的账户。
            （二）本网站：除本协议另有规定外，指www.alipay.com及/或客户端。
            （三）阿里网站：指阿里巴巴集团旗下支持支付宝登录名登录的任何网站（包括但不限于淘宝、阿里巴巴中国站、阿里云网站及手机淘宝、来往等各种移动客户端应用程序）与本网站，以及后续可能开通的其他网站及其他移动客户端应用程序。前述网站及客户端可单称或并称阿里网站。
            （四）淘宝：指淘宝网（域名为taobao.com）、天猫网（域名为tmall.com）、一淘网（域名为etao.com）、聚划算（域名为ju.tmall.com）及阿里旅行•去啊网（域名为alitrip.com）等网站及客户端。前述网站及客户端可单称或并称淘宝。
            （五）阿里巴巴中国站，指阿里巴巴中国站（域名包括1688.com，alibaba.com.cn，alibaba.cn）。前述网站可单称或并称阿里巴巴中国站。
            （六）止付：指支付宝账户余额为不可用状态，例如被止付的支付宝账户余额不能用于充值、支付、提现或转账等服务。
            （七）冻结：指本协议第四（三）8条规定的有权机关要求的冻结或依据其他协议进行的保证金冻结等。被冻结余额为不可用状态，被冻结账户不可登录、使用。
            （八）支付宝服务（或“本服务”）：指本协议第三条所描述的服务。

            三.支付宝服务
            支付宝服务（或称“本服务”）是本公司向您提供的非金融机构支付服务，是受您委托代您收款和付款的资金转移服务，具体服务项目及内容请见本网站网页，包括（但不限于）以下服务：
            1、代收代付款项服务:代收代付款项服务是指本公司为您提供的代为收取或支付相关款项的服务， 其中：
            A.代收，即本公司代为收取任何人向您支付的各类款项。为免疑义，代收具体是指在符合本公司规定或产品规则的情况下，自您委托本公司将您银行卡内的资金充值到您的支付宝账户或委托本公司代为收取第三方向您支付的款项之时起至根据您的指令将该等款项的全部或部分实际入账到您的银行账户或支付宝账户之时止（含本条之1项3）规定的提现）的整个过程（但不包括本条之1项B（a）所述情形）。
            B.代付, 即本公司将您的款项代为支付给您指定的第三方。为免疑义, 代付具体是指在符合本公司规定或产品规则的情况下: (a)自款项从您的账户(包括但不限于银行账户或其他账户, 但不 包括支付宝账户)转出之时起至委托本公司根据您或有权方给出的指令将上述款项的全部或部分支付给第三方且第三方收到该款项(无论是否要求立即支付或根据届时情况不时支付)之时止的整个过程; 或 (b) 自您根据本协议委托本公司将您银行卡的资金充值到您的支付宝账户或自您因委托本公司代收相关款项到您的支付宝账户之时起至委托本公司根据您或有权方给出的指令将上述款项的全部或部分支付给第三方(无论是否要求立即支付或根据届时情况不时支付)之时止的整个过程。并且您同意, 本公司代付后, 非经法律程序或者非依本协议之约定, 该支付是不可撤销的。
            本公司提供的上述的代收代付款项服务可以分为以下各类具体服务:
            1)充值: 作为代收款项服务的一部分， 在符合本公司规定或产品规则的情况下，您委托本公司将您银行卡内的资金充值到您的支付宝账户。
            2)提现: 作为代收款项服务的一部分, 在符合本公司规定或产品规则的情况下，您可以请求本公司将您支付宝账户余额中的资金提取到您名下的有效中国大陆银行账户内, 该银行账户开户名需与您的姓名或名称一致。除被止付或限制款项外, 本公司将于收到提现指令后的一至五个工作日内, 将相应款项汇入该银行账户。您理解, 根据您提供的账户所属银行不同, 会有到账时间差异。此外, 我们可能会对提现进行风险审查, 因此可能导致提现延迟。您理解并同意您最终收到款项的服务是由您提供的银行账户对应的银行提供的, 您需向该银行请求查证。
            3)支付宝中介服务,亦称“支付宝担保交易”, 即本公司接受您的委托向您提供的有关买卖交易的代收或代付款项的中介服务。
            除本协议另有规定外, 交易双方使用支付宝中介服务, 即认可买方点击确认收货后, 本公司即有权将买家已支付的款项代为支付给卖家。除本协议另有规定外, 您与交易对方发生交易纠纷时, 您不可撤销地授权本公司自行判断并决定将争议款项的全部或部分支付给交易一方或双方。 4)货到付款服务,又称COD服务, 是指买卖双方约定买卖合同项下的交易货款, 由卖家委托的物流公司在向买方运送交易货物时以现金、POS刷卡、快捷支付等方式直接或间接地代收, 再由本公司代付至卖方支付宝账户的一种支付方式。在您使用本项服务时,您须遵守以下条款:
            a) 作为买方,您向卖方支付的交易货款将直接或者间接通过物流公司收付, 物流公司为此可能另行向您收取费用。您理解并同意, 该费用是物流公司基于其向您提供的服务所收取的, 与本公司向您提供的COD服务无关。
            您确认, 本服务能否完成取决于您提供的收货地址是卖方所选用的物流公司可以送达的地址。在物流公司确认不可送达时, 本公司有权要求您重新选择本公司提供的其他支付方式。
            b) 作为卖方, 您确认, 该服务能否完成, 取决于您选用的物流公司是否可将交易货物送达买方提供的收货地址, 或买方提供的收货地址准确无误, 或货物完全符合您与买方的约定, 及物流公司是否将相应交易货款清算至本公司等。您理解并接受, 您选用的物流公司不揽货、不清算、错误送达、货物被买方拒收等情形与本公司无关, 且为本公司不可预见、不可预防和不可控制的, 因此产生的损失需全部由您自行承担。
            5)即时到账服务:是指买卖双方约定买卖合同项下的货款通过买方支付宝账户即时向卖方支付宝账户支付的一种支付方式。本公司提示您注意: 该项服务一般适用于您与交易对方彼此都有充分信任的交易。在您与交易对方使用即时到账服务支付款项时, 该款项无需等您确认收货即立刻进入交易对方的支付宝账户。在使用即时到账服务时, 您理解并接受:
            a) 为控制可能存在的风险, 本公司对所有用户使用即时到账服务支付交易货款时的单日交易总额以及单笔交易最高额进行了限制, 并保留对限制种类和限制限额进行无需预告地调整的权利。
            b) 使用即时到账服务支付货款是基于您对交易对方的充分信任, 一旦您选用该方式, 您应自行承担所有交易风险并自行处理所有相关的交易及货款纠纷, 本公司不负责处理相关纠纷。
            6)后付服务:指买卖双方在交易时通过本服务支付，选择特定服务（以下简称“特定服务”）作为资金渠道的，本公司将根据特定服务的约定提供款项的代收代付服务；该特定服务包括但不限于花呗（或不时调整的其他名称）、余额宝冻结转支付（或不时调整的其他名称或实质上提供了余额宝冻结转支付功能的产品）服务。在使用后付服务时，您理解并接受：
            a)该笔交易项下的款项将由买家在确认收货后由本公司代收代付至卖家的支付宝账户。若买家采用特定服务中约定其他款项支付方式的，本公司将依照该等约定提供款项代收代付服务。
            b)如该笔交易发生在淘宝或阿里巴巴中国站，为保证交易的正常进行，就该笔交易产生的纠纷将按照本协议第一条第（五）、（六）款的约定处理。非因该笔交易产生的纠纷或非因淘宝、阿里巴巴中国站上发生的交易产生的纠纷，您需要联系特定服务的提供方或自行处理。
            7)转账服务:是指收付款双方使用本服务, 在付款方向本公司指示收款方支付宝账户或银行账户和转账金额后, 将付款方支付宝账户内指定金额的款项划转至收款方支付宝账户或银行账户的一种支付服务。本公司提示您注意: 该项服务适用于您与收(付)款方彼此都有充分了解的转账行为，且有真实、合法转账需求的转账行为。在您使用转账服务指示转出资金时, 您所转出的款项将进入您向本公司指示的收款方的支付宝账户或银行账户。在您获得支付宝账户后, 您的支付宝账户即具备接受(收)来自转账服务的转账款项的功能, 但未经实名的支付宝账户可能会受到收款和(或)提现的限制。基于此项服务可能存在的风险, 在使用转账服务时, 您理解并接受:
            a)为控制可能存在的风险, 本公司对所有用户使用转账服务时的转账款项的单日、单月转账总额以及单笔转账最高额进行了限制, 并保留对限制种类和限制限额进行无需预告进行调整的权利。
            b)您可能收到由于使用转账服务的付款方指示错误(失误)而转账到您支付宝账户或银行账户的款项, 在此情况下您应该根据国家的相关法律的规定和实际情况处理收到的该笔款项。
            c)使用转账服务是基于您对转账对方的充分了解(包括但不限于对方的真实身份及确切的支付宝账户名等), 一旦您选用转账服务进行转账, 您应当自行承担因您指示错误(失误)而导致的风险。本公司依照您指示的收款方并根据本协议的约定完成转账后, 即完成了当次服务的所有义务, 对于收付款双方之间产生的关于当次转账的任何纠纷不承担任何责任, 也不提供任何形式的纠纷解决途径, 您应当自行处理相关的纠纷。
            2、查询:本公司将对您使用本公司服务的操作的全部或部分进行记录, 不论该操作之目的最终是否实现。您可以登录支付宝账户查询您支付宝账户内的交易记录。
            3、购结汇服务:本公司根据适用的相关法律法规向您提供的人民币和外币的购结汇服务。
            4、其他:您实际使用的本公司接受您的委托为您不时提供的其他服务及本公司提供的其他产品或服务。
            四、支付宝账户
            （一） 注册相关
            除本协议另有规定或相关产品另有规则外，您须在本网站注册并取得本公司提供给您的支付宝账户，或在您于其他阿里网站完成支付宝登录名注册，取得支付宝账户，并且按照本公司要求提供相关信息完成激活后方可使用本服务。您需使用作为支付宝登录名的本人电子邮箱或手机号码，或者本公司允许的其它方式（例如通过扫描二维码、识别生物特征的方式）登录支付宝账户，并且您应当自行为支付宝账户设置密码。您同意：
            1、按照支付宝要求准确提供并在取得该账户后及时更新您正确、最新及完整的身份信息及相关资料。若本公司有合理理由怀疑您提供的身份信息及相关资料错误、不实、过时或不完整的，本公司有权暂停或终止向您提供部分或全部支付宝服务。本公司对此不承担任何责任，您将承担因此产生的任何直接或间接支出。若因国家法律法规、部门规章或监管机构的要求，本公司需要您补充提供任何相关资料时，如您不能及时配合提供，本公司有权暂停或终止向您提供部分或全部支付宝服务。
            2、您应当准确提供并及时更新您提供的电子邮件地址、联系电话、联系地址、邮政编码等联系方式，以便本公司与您进行及时、有效联系。您应完全独自承担因通过这些联系方式无法与您取得联系而导致的您在使用本服务过程中遭受的任何损失或增加任何费用等不利后果。您理解并同意，您有义务保持您提供的联系方式的有效性，如有变更需要更新的，您应按本公司的要求进行操作。
            3、您应及时更新资料（包括但不限于身份证、户口本、护照等证件或其他身份证明文件、联系方式、作为支付宝账户登录名的邮箱或手机号码、与支付宝账户绑定的邮箱、手机号码等），否则支付宝有权将支付宝登录名、支付宝账户绑定的邮箱、手机号码开放给其他用户注册或使用。因您未及时更新资料导致的一切后果，均应由您自行承担，该后果包括但不限于导致 本服务无法提供或提供时发生任何错误、支付宝账户及该账户内余额被别人盗用，且您不得将此作为取消交易、拒绝付款的理由。
            4、若您为个人用户, 您确认, 本公司有权在出现下列情形时要求核对您的有效身份证件或其他必要文件, 留存有效身份证件的彩色扫描件, 且完成本公司要求的相关身份认证。您应积极配合，否则本公司有权限制或停止向您提供部分或全部支付宝服务：
            A. 您办理充值、收取或支付单笔金额人民币1万元以上或者外币等值1000美元以上业务的;
            B. 您全部支付宝账户30天内充值、收取及支付总金额累计人民币5 万元以上或外币等值1万美元以上的;
            C. 您全部支付宝账户余额连续10天超过人民币5000元或外币等值1000美元的;
            D.您使用支付宝服务买卖金融产品或服务的；
            E.您购买我公司记名预付卡或办理记名预付卡充值的;
            F.您购买不记名预付卡或通过不记名预付卡为支付宝账户单笔充值超过人民币1万元的;
            G.您要求变更身份信息或您身份信息已过有效期的;
            H.本公司认为您的交易行为或交易情况出现异常的;
            200I.本公司认为您的身份资料存在疑点或本公司在向您提供服务的过程中认为您已经提供的身份信息或相关资料存在疑点的;
            J.本公司认为应核对或留存您身份证件或其他必要文件的其他情形的。
            本条款所称“以上”,包括本数。
            5、您在支付宝账户中设置的昵称、头像等必须遵守法律法规、公序良俗、社会公德，且不会侵害其他第三方的合法权益，否则支付宝有权对您的支付宝账户采取限制措施，包括但不限于屏蔽、撤销您支付宝账户的昵称、头像，停止提供部分或全部支付宝服务。
            （二）阿里网站相关
            您理解并同意，您在本网站完成支付宝账户注册程序后，您即取得以您手机号或电子邮箱为内容的支付宝登录名。您可以通过您的支付宝登录名直接登录任一阿里网站，无需重新注册。但如您此次注册使用的手机号或电子邮箱于2013年3月18日前已在其他阿里网站完成过注册的，则您此次注册的支付宝登录名在其他阿里网站登录的功能不会自动开通。为了使您更便捷地使用阿里网站的服务，您在此明确且不可撤销地授权，您的账户信息在您注册成功时，已授权本公司披露给所有阿里网站并授权阿里网站使用。
            （三） 账户安全
            您将对使用该账户及密码、校验码进行的一切操作及言论负完全的责任，您同意：
            1、除相关产品另有规则外，本公司可以通过您的支付宝登录名和密码或扫描二维码、声波支付、条码支付或识别您的生物特征或者本公司认可的其他方式识别您的身份，您应当对该等支付宝登录名、密码、校验码、身份识别信息等进行妥善保管，对于因支付宝登录名、密码、校验码、身份识别信息等泄露所致的损失由您自行承担。您保证不向其他任何人泄露您的支付宝登录名、密码、校验码以及身份信息等，亦不使用其他任何人的支付宝登录名、密码、校验码、身份识别信息等。本公司亦可能通过本服务应用您使用的其他产品或设备识别您的指示，您应当妥善保管处于您或应当处于您掌控下的这些产品或设备，对于这些产品或设备因非您本人使用或遗失所致的任何损失，由您自行承担。
            2、基于计算机端、手机端以及使用其他电子设备的用户使用习惯，我们可能在您使用具体产品时设置不同的账户登录模式及采取不同的措施识别您的身份。
            3、您同意，（a）如您发现有他人冒用或盗用您的支付宝登录名及密码或任何其他未经合法授权之情形，或发生与支付宝账户关联的手机或其他设备遗失或其他可能危及到支付宝账户权益安全情形时，应立即以有效方式通知本公司，向本公司申请暂停相关服务。您不可撤销地授权本公司将前述情况同步给阿里网站，以保障您的合法权益；及（b）确保您在持续登录任一阿里网站 时段结束时，以正确步骤离开网站。本公司不能也不会对因您未能遵守本款约定而发生的任何损失、损毁及其他不利后果负责。您理解本公司对您的请求采取行动需要合理期限，在 此之前，本公司对已执行的指令及(或)所导致的您的损失不承担任何责任。
            4、您确认，您应自行对您的支付宝账户负责，只有您本人方可使用该账户。该账户不可转让、不可赠与、不可继承，但账户内的相关财产权益可被依法继承。
            5、您同意，基于运行和交易安全的需要，本公司可以暂时停止提供或者限制本服务部分功能，或提供新的功能，在任何功能减少、增加或者变化时，只要您仍然使用本服务，表示您仍然同意本协议或者变更后的协议。
            6、本公司有权了解您使用本公司产品或服务的真实交易背景及目的，您应如实提供本公司所需的真实、全面、准确的信息或资料；如果本公司有合理理由怀疑您提供虚假交易信息的，本公司有权暂时或永久限制您所使用本服务的部分或全部功能。
            7、您同意，本公司有权国家法律或和行政法规所赋予权力的有权机关的要求对您的个人信息或对您的支付宝账户进行查询、冻结或扣划。
            (四)注销相关
            在需要终止使用本服务时,您可以申请注销您的支付宝账户,您同意:
            1、您所申请注销的支付宝账户应当是您本人的账户。如您需要注销您的支付宝账户，您应当依照本公司规定的程序进行支付宝账户注销。
            2、支付宝账户注销将导致本公司终止为您提供本服务，本协议约定的双方的权利义务终止（依本协议其他条款另行约定不得终止的或依其性质不能终止的除外），同时还可能对于该账户产生如下结果：
            A、任何兑换代码（购物券、礼品券、集分宝或优惠券、天猫点券等任何与支付宝账户相关的兑换代码、卡券等）都将作废；如您不愿将该部分兑换代码或卡券消耗掉或将其作废，则您不能申请注销支付宝账户。
            B、任何银行卡将不能适用该账户内的支付或提现服务。
            C、您仍应对您在注销支付宝账户前且使用本服务期间的行为承担相应责任，包括但不限于可能产生的违约责任、损害赔偿责任及履约义务，同时本公司仍可保有您的相关信息。
            3、您可以通过自助或者人工的方式申请注销支付宝账户，但如果您使用了本公司提供的安全产品，应当在该安全产品环境下申请注销。
            4、您申请注销的支付宝账户应当处于正常状态，即您的支付宝账户的账户信息和用户信息是最新、完整、正确的，且该账户可以使用所有支付宝服务功能。账户信息或用户信息过时、缺失、不正确的账户或被暂停或终止提供服务的账户不能被申请注销。如您申请注销的账户有关联账户或子账户的，在该关联账户或子账户被注销前，该账户不得被注销。
            5、您申请注销的支付宝账户应当不存在任何由于该账户被注销而导致的未了结的合同关系与其他基于该账户的存在而产生或维持的权利义务，及本公司认为注销该账户会由此产生未了结的权利义务而产生纠纷的情况。您申请注销的支付宝账户应当没有任何关联的理财产品，不存在任何待处理交易，没有任何余额、余额宝、集分宝、红包等资产，且符合支付宝页面或网站提示的其他条件和流程。如不符合前述任何情况的，您不能申请注销该账户。
            6、如果您申请注销的支付宝账户一旦注销成功，将不再予以恢复。
            7、您理解并同意，如（a）您连续12个月未使用您的支付宝登录名或本公司认可的其他方式登录过本网站，本公司有权注销您名下的全部或部分支付宝登录名及支付宝账户，您将不能再通过该登录名登录本网站或使用相关支付宝账户；如该相关支付宝账户内有余额，您可按照支付宝相关流程将其转到您的其他支付宝帐户或同名银行帐户；或（b）您在任一阿里网站有欺诈、发布或销售伪劣商品、侵犯他人合法权益或其他严重违反任一阿里网站规则的行为的，本公司有权注销您名下的全部或部分支付宝登录名，您将不能再登录任一阿里网站，所有阿里网站的服务将同时终止。本公司有权将您违反前述约定的情形同步给其他阿里网站。

            五、支付宝服务使用规则
            为有效保障您使用本服务时的合法权益，您理解并同意接受以下规则：
            （一）一旦您使用本服务，您即不可撤销地授权本公司代理您在您及（或）您指定人符合指定条件或状态时，支付款项给您指定人，或收取其他人支付给您的款项。
            （二）本公司通过以下三种方式接受来自您的指令：A、您在本网站或其他可使用本服务的网站或软件上通过以您的支付宝登陆名及密码或数字证书等安全产品登录支付宝账户并依照本服务预设流程所修改或确认的交易状态或指令；B、您通过您注册时作为该账户名称或者与该账户绑定的手机或其他专属于您的通讯工具（以下合称该手机）号码向本系统发送的信息（短信 或电话等）回复；C、您通过您注册时作为该账户名称或者与该账户名称绑定的其他硬件、终端、软件、代号、编码、代码、其他账户名等有形体或无形体向本系统发送的信息（如本方式 所指有形体或无形体具备与该手机接受信息相同或类似的功能，以下第五条第（四）、（五）、（六）项和第六条第（三）项涉及该手机的条款同样适用于本方式）。无论您通过以上何种方式中的任一种向本公司发出指令，都不可撤回或撤销，且成为本公司代理您支付或收取款项或进行其他账户操作的唯一指令，视为您本人的指令，您应当自己对本公司忠实执行上述指令产生的任何结果承担责任。本协议所称绑定，指您的支付宝账户与本条上述所称有形体或无形体存在对应的关联关系，这种关联关系使得支付宝服务的某些服务功能得以实现，且这种关联关系有时使得这些有形体或无形体能够作为本系统对您的支付宝账户的识别和认定依据。
            （三）您确认，您使用拍码方式向商家付款或通过“当面付”功能进行支付时，在一定额度内（该额度可能因您使用该支付服务时所处的国家/地区、支付场景、风险控制需要及其他本公司认为适宜的事由而有不同，具体额度请见相关提示或公告）或根据您与本公司的另行约定，您无需输入密码即可完成支付，您授权本公司按照商家确定的金额从您的资产里扣款给商家。
            （四）您在使用本服务过程中，本协议内容、网页上出现的关于操作的提示或本公司发送到该手机的信息（短信或电话等）内容是您使用本服务的相关规则，您使用本服务即表示您同意接受本服务的相关规则。您了解并同意本公司有权单方修改本服务的相关规则，而无须征得您的同意，本服务的相关规则应以您使用服务时的页面提示（或发送到该手机的短信或电话或客户端通知等）为准，您同意并遵照本服务的相关规则是您使用本服务的前提。
            （五）本公司会以网站公告、电子邮件、发送到该手机的短信、电话、站内信或客户端通知等方式向您发送通知，例如通知您交易进展情况，或者提示您进行相关操作，您应及时予以关注。但本公司不保证您能够收到或者及时收到该等通知，且对此不承担任何后果。因您没有及时对交易状态进行修改或确认或未能提交相关申请而导致的任何纠纷或损失，本公司不负任何责任。
            （六）您如果需要向交易对方交付货物，应根据交易状态页面（或您手机接收到的信息）显示的买方地址，委托有合法经营资格的承运人将货物直接运送至对方或其指定收货人，并要求对方或其委托的第三方（该第三方应当提供对方的授权文件并出示相应的身份证件）在收货凭证上签字确认，因货物延迟送达或在送达过程中的丢失、损坏，本公司不承担任何责任，应由您与交易对方自行处理。
            （七） 本公司对您所交易的标的物不提供任何形式的鉴定、证明的服务。除本协议另有规定外，如您与交易对方发生交易纠纷，您不可撤销地授权由本公司根据本协议及本网站上载说明的各项规则进行处理。您为解决纠纷而支出的通讯费、文件复印费、鉴定费等均由您自行承担。因市场因素致使商品涨价跌价而使任何一方得益或者受到损失而产生的纠纷（《争议处理规 则》另有约定的除外），本公司不予处理。
            （八）您应按照支付宝的要求完善您的身份信息以最终达到实名，否则您可能会受到收款、提现和（或）支付（包括但不限于余额、余额宝）的限制，且本公司有权对您的资金进行 止付，直至您达到实名。
            （九） 本公司会将您委托本公司代收或代付的款项，严格按照法律法规或有权机关的监管要求进行管理；除本协议另有规定外，不作任何其他非您指示的用途。
            （十） 本公司并非银行或其它金融机构，本协议项下涉及的资金移转均通过银行业金融机构来实现，您接受您的资金在转移转途中产生的合理时间。
            （十一）您理解，基于相关法律法规，对本协议项下的任何服务，本公司均不提供任何担保、垫资。
            （十二）您确认并同意，您应自行承担您使用本服务期间由本公司代收或代付的款项在代收代付服务过程中的任何货币贬值、汇率波动及收益损失等风险，您仅在该代收代付款项（不含被冻结、止付或受限制的款项）的金额范围内享有对该等代收代付款项指令支付、提现的权利，您对所有代收代付款项（含被冻结、止付或受限制的款项）产生的任何收益（包括但不限于利息和其他孳息）不享有任何权利。本公司就所有该代收代付款项产生的任何收益（包括但不限利息和其他于孳息）享有所有权。
            （十三）您不得将本服务用于非本公司许可的其他用途。
            （十四）交易风险
            1、在使用本服务时，若您或您的交易对方未遵从本协议或相关网站说明、交易、支付页面中之操作提示、规则），则本公司有权拒绝为您与交易对方提供相关服务，且本公司不承担损害赔偿责任。 若发生上述状况，而款项已先行划付至您或他人的支付宝账户名下，您同意本公司有权直接自相关账户中扣回相应款项及（或）禁止您要求支付此笔款项之权利。此款项若已汇入您 的银行账户，您同意本公司有向您事后索回之权利，因您的原因导致本公司事后追索的，您应当承担本公司合理的追索费用。
            2、因您的过错导致的任何损失由您自行承担，该过错包括但不限于：不按照交易、支付提示操作，未及时进行交易操作，遗忘或泄漏密码，密码被他人破解，您使用的计算机被他人侵入。
            3、您使用本服务时同意并认可，可能由于银行本身系统问题、银行相关作业网络连线问题、任何互联网系统问题或网络运营商原因、您的电子邮件系统问题或邮件服务商原因、您的手机通讯系统问题或通讯服务商原因或其他不可抗拒因素，造成本服务无法提供，对此本公司不承担任何责任。
            （十五）服务费用
            1、在您使用本服务时，本公司有权依照《支付宝服务收费规则》向您收取服务费用。本公司拥有制订及调整服务费之权利，具体服务费用以您使用本服务时本网站产品页面上所列之收费方式公告或您与本公司达成的其他书面协议为准。
            2、除非另有说明或约定，您同意本公司有权自您委托本公司代收或代付的款项或您任一支付宝账户余额或者其他资产中直接扣除上述服务费用。
            （十六）积分
            1、就您使用本服务过程中本公司向您授予的积分，无论该积分以何种方式获得，您都不得使用该积分换取任何现金或金钱。
            2、积分并非您拥有所有权的财产，本公司有权单方面调整积分数值或调整本公司的积分规则，而无须征得您的同意。
            3、您仅有权按本公司的积分规则，将所获积分交换本公司提供的指定的服务或产品。
            4、如本公司怀疑您的积分的获得及(或)使用存有欺诈、滥用或其它本公司认为不当的行为，本公司可随时取消、限制或终止您的积分或积分使用。
            （十七）您认可支付宝账户的使用记录、交易金额数据等均以支付宝系统记录的数据为准。如您对该等数据存有异议的，应自您账户数据发生变动之日起三日内向本公司提出异议，并提供相关证据供本公司核实，否则视为您认可该数据。
            （十八）如您使用支付宝代扣服务的，下面任一情况下均会导致扣款不成功，您需要自行承担该风险：
            1、您的指定账户余额不足；或
            2、您的指定账户被有权机关采取强制措施，或者已依据其他协议被冻结、止付。

            六、支付宝服务使用限制
            （一） 您在使用本服务时应遵守中华人民共和国相关法律法规及您所属、所居住或开展经营活动或其他业务的国家或地区的法律法规，不得将本服务用于任何非法目的（包括用于禁止或限制交易物品的交易），也不得以任何非法方式使用本服务。
            （二） 您不得利用本服务从事侵害他人合法权益之行为，否则本公司有权拒绝提供本服务，且您应承担所有相关法律责任，因此导致本公司或本公司雇员受损的，您应承担赔偿责任。
            上述（一）和（二）适用的情况包括但不限于
            1、侵害他人名誉权、隐私权、商业秘密、商标权、著作权、专利权等合法权益。
            2、违反依法定或约定之保密义务。
            3、冒用他人名义使用本服务。
            4、从事不法交易行为，如洗钱、恐怖融资、贩卖枪支、毒品、禁药、盗版软件、黄色淫秽物品、其他本公司认为不得使用本服务进行交易的物品等。
            5、提供赌博资讯或以任何方式引诱他人参与赌博。
            6、非法使用他人银行账户（包括信用卡账户）或无效银行账号（包括信用卡账户）交易。
            7、违反《银行卡业务管理办法》使用银行卡，或利用信用卡套取现金（以下简称套现）。
            8、进行与您或交易对方宣称的交易内容不符的交易，或不真实的交易。
            9、从事任何可能含有电脑病毒或是可能侵害本服务系统、资料之行为。
            10、其他本公司有正当理由认为不适当之行为。
            （三） 您理解并同意，本公司不对因下述任一情况导致的任何损害赔偿承担责任，包括但不限于利润、商誉、使用、数据等方面的损失或其他无形损失的损害赔偿 (无论本公司是否已被告知该等损害赔偿的可能性)：
            1、本公司有权基于单方判断，包含但不限于本公司认为您已经违反本协议的明文规定及精神，对您的名下的全部或部分支付宝账户暂停、中断或终止向您提供本服务或其任何部分， 并移除您的资料。
            2、在发现异常交易或合理怀疑交易有疑义或有违反法律规定或本协议约定之时，为维护用户资金安全和合法权益，本公司有权不经通知先行暂停或终止您名下全部或部分支付宝账户的使用（包括但不限于对这些账户名下的款项和在途交易采取取消交易、调账等措施），同时可能需要您配合提供包括但不限于物流凭证、身份证、银行卡，交易过程中交易双方的阿里旺旺聊天记录截图（非阿里旺旺聊天记录只能作为参考）等资料。如您未及时、完整、准确提供上述资料，本公司有权采取包括但不限于如下限制措施：关闭余额支付功能、限制收款功能、止付账户内余额或停止提供全部或部分支付宝服务。如涉嫌犯罪，本公司有权移交公安机关处理。
            3、您理解并同意， 存在如下情形时， 本公司有权对您名下支付宝账户暂停或终止提供全部或部分支付宝服务，或对资金的全部或部分进行止付， 且有权限制您所使用的产品或服务的部分或全部功能（包括但不限于对这些账户名下的款项和在途交易采取取消交易、调账等限制措施）， 并通过邮件或站内信或者客户端通知等方式通知您， 您应及时予以关注：
            1）根据本协议的约定；
            2）根据法律法规及法律文书的规定；
            3）根据有权机关的要求；
            4）您使用支付宝服务的行为涉嫌违反国家法律法规及行政规定的；
            5）本公司基于单方面合理判断认为账户操作、资金进出等存在异常时；
            6）本公司依据自行合理判断认为可能产生风险的；
            7）您在参加市场活动时有批量注册账户、刷信用及其他舞弊等违反活动规则、违反诚实信用原则的；
            8）他人向您账户错误汇入资金等导致您可能存在不当得利的；
            9）您遭到他人投诉，且对方已经提供了一定证据的；
            10）您可能错误地将他人支付宝账户进行了实名的。
            如您申请恢复服务、解除上述止付或限制，您应按本公司要求如实提供相关资料及您的身份证明以及本公司要求的其他信息或文件，以便本公司进行核实，且本公司有权依照自行判 断来决定是否同意您的申请。您应充分理解您的申请并不必然被允许。您拒绝如实提供相关资料及身份证明的，或未通过本公司审核的，则您确认本公司有权长期对该等账户停止提供服务且长期限制该等产品或者服务的部分或全部功能。
            在本公司认为该等异常已经得到合理解释或有效证据支持或未违反国家相关法律法规及部门规章的情况下，最晚将于止付款项或暂停执行指令之日起的30个日历天内解除止付或限制。但本公司有进一步理由相信该等异常仍可能对您或其他用户或本公司造成损失的情形除外，包括但不限于：
            1）收到针对该等异常的投诉；
            2）您已经实质性违反了本协议或另行签署的协议，且我们基于保护各方利益的需要必须继续止付款项或暂停执行指令；
            3）您虽未违反国家相关法律法规及部门规章规定，但该等使用涉及本公司限制合作的行业类目或商品，包括但不限于通过本公司的产品或服务从事类似金字塔或矩阵型的高额返利业务模式。
            4、在本公司合理认为有必要时，本公司无需事先通知即可终止提供本服务，并暂停、关闭或删除您名下全部或部分支付宝账户及该账户中所有相关资料及档案，并将您滞留在这些账户的全部合法资金退回到您的银行账户。
            （四）您理解并同意，如因您进行与您宣称的交易内容不符的交易，或违反您所在平台对商品类目管理的规定，导致本公司、您所在平台或用户遭受损失的，本公司有权向您追偿并有权随时从您名下的支付宝账户扣除相应资金以弥补该等损失。且本公司有权对您名下支付宝账户暂停或终止向您提供部分或全部支付宝服务，或对您名下资产的部分或全部进行止付。

            七、隐私权保护
            本公司重视对用户隐私的保护。关于您的身份资料和其他特定资料依本协议第十条所载明的《蚂蚁隐私权政策》受到保护与规范，详情请参阅《蚂蚁隐私权政策》。

            八、系统中断或故障
            本公司系统因下列状况无法正常运作，使您无法使用各项服务时，本公司不承担损害赔偿责任，该状况包括但不限于：
            （一）本公司在本网站公告之系统停机维护期间。
            （二）电信设备出现故障不能进行数据传输的。
            （三）因台风、地震、海啸、洪水、停电、战争、恐怖袭击等不可抗力之因素，造成本公司系统障碍不能执行业务的。
            （四）由于黑客攻击、电信部门技术调整或故障、网站升级、银行方面的问题等原因而造成的服务中断或者延迟。

            九、责任范围及责任限制
            （一）本公司仅对本协议中列明的责任承担范围负责。
            （二）您明确因适用本服务从事的交易所产生的任何风险应由您与交易对方承担。
            （三）支付宝用户信息是由用户本人自行提供的，本公司无法保证该信息之准确、及时和完整，您应对您的判断承担全部责任。
            （四）本公司不对交易标的及本服务提供任何形式的保证，包括但不限于以下事项：
            1、本服务符合您的需求。
            2、本服务不受干扰、及时提供或免于出错。
            3、您经由本服务购买或取得之任何产品、服务、资讯或其他资料符合您的期望。
            4、您使用本服务从事的交易及时或最终完成。
            （五）本服务之合作单位，所提供之服务品质及内容由该合作单位自行负责。
            （六）您经由本服务之使用下载或取得任何资料，应由您自行考量且自负风险，因资料之下载而导致您电脑系统之任何损坏或资料流失，您应负完全责任。
            （七）您自本公司及本公司工作人员或经由本服务取得之建议和资讯，无论其为书面或口头形式，均不构成本公司对本服务之保证。
            （八）在任何情况下，本公司对于与本协议有关或由本协议引起的任何间接的、惩罚性的、特殊的、派生的损失（包括业务损失、收益损失、利润损失、商誉损失、使用数据或其他经济利益的损失），不论是如何产生的，也不论是由对本协议的违约（包括违反保证）还是由侵权造成的，均不负有任何责任，即使事先已被告知此等损失的可能性。另外即使本协议规定的排他性救济没有达到其基本目的，也应排除本公司对上述损失的责任。
            （九）在任何情况下，本公司对本协议所承担的违约赔偿责任总额不超过向您收取的当次服务费用总额。
            （十）您充分知晓并同意本公司可能同时为您及您的（交易）对手方提供本服务，您同意对本公司可能存在的该等行为予以明确豁免任何实际或潜在的利益冲突，并不得以此来主张本公司在提供本服务时存在法律上的瑕疵。
            （十一）除本协议另有规定或本公司另行同意外，您对本公司的委托及向本公司发出的指令均不可撤销。

            十、完整协议
            本协议由《支付宝服务协议》条款与《争议处理规则》、《支付宝交易通用规则》、《支付宝认证服务协议》、《交易超时规则》、《支付宝集分宝规则》、《支付宝服务收费规则》、《支付宝活动规则》、《无线支付服务条款》、《蚂蚁金服隐私权政策》、《代理购结汇服务协议》、《支付宝服务窗服务规则》、《支付宝安全保障规则》等本网站不时公示的各项规则组成，各项规则有约定，而本协议条款没有约定的，以各项规则约定为准。您对本协议理解和认同，您即对本协议所有组成部分的内容理解并认同，一旦您取得支付宝账户，或您以其他本公司允许的方式实际使用本服务，您和本公司即受本协议所有组成部分的约束。本协议部分内容被有管辖权的法院认定为违法或无效的，不因此影响其他内容的效力。


            十一、知识产权的保护
            （一）本公司及关联公司所有系统及本网站上所有内容，包括但不限于著作、图片、档案、资讯、资料、网站架构、网站画面的安排、网页设计，均由本公司或本公司关联公司依法拥有其知识产权，包括但不限于商标权、专利权、著作权、商业秘密等。
            （二）非经本公司或本公司关联企业书面同意，任何人不得擅自使用、修改、复制、公开传播、改变、散布、发行或公开发表本网站程序或内容。
            （三）尊重知识产权是您应尽的义务，如有违反，您应承担损害赔偿责任。

            十二、法律适用与管辖
            本协议之效力、解释、变更、执行与争议解决均适用中华人民共和国法律。因本协议产生之争议，均应依照中华人民共和国法律予以处理，并由被告住所地人民法院管辖。
        </p>
    </div>
    <a class="btn" href="javascript:void(0)">同 意</a>
</div>

<script>
$(function(){

    $(".address").on("click",".ul>a:not('.addnew')",function(){
        $(this).addClass("on").siblings("a").removeClass("on");
        $("[name='addrid']").val($(this).attr("data-addrid"));
    })
    $(".address").on("click",".btnaddr",function(){
        var addrid= $(this).closest("a").attr("data-addrid");
        layer.open({
            type:2,
            title: false,
            closeBtn: 0,
            scrollbar: false,
            area: ['700px','460px'],
            shadeClose: true,
            content: "/Buyer/User/addAddr?id="+addrid+"&fnparent=freshaddr",
        });

    })

    $(".btnsubmorder").click(function(){
        if($(".address .on").length === 0){
            layer.msg("请选择收货地址");
            return false;
        }
    })



})

function freshaddr(objaddr){
    console.log(objaddr);
    if(!!objaddr.id){
        var addrid = objaddr.id;
        var $a = $("[data-addrid = '"+addrid+"']");
        $a.find("li").eq(0).find("em").html(objaddr.name);
        $a.find("li").eq(1).html(objaddr.province+objaddr.city+objaddr.block);
        $a.find("li").eq(2).html(objaddr.address+" ("+objaddr.name+"收)");
        $a.find("li").eq(3).html(objaddr.phone);
        $a.addClass("on").siblings().removeClass("on");
        $("[name='addrid']").val(addrid);
    }
    else{
        $a= $("#tempbox a").clone().attr("data-addrid",objaddr.newid).addClass("on");
        $a.find("li").eq(0).find("em").html(objaddr.name);
        $a.find("li").eq(1).html(objaddr.province+objaddr.city+objaddr.block);
        $a.find("li").eq(2).html(objaddr.address+" ("+objaddr.name+"收)");
        $a.find("li").eq(3).html(objaddr.phone);
        $a.prependTo(".address .ul").siblings().removeClass("on");
        $("[name='addrid']").val(objaddr.newid);
    }
}
</script>

</body>
</html>

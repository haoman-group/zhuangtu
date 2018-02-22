## BeeCloud PHP SDK (Open Source)

[![Build Status](https://travis-ci.org/beecloud/beecloud-php.svg)](https://travis-ci.org/beecloud/beecloud-php) ![license](https://img.shields.io/badge/license-MIT-brightgreen.svg) ![version](https://img.shields.io/badge/version-v2.3.0-blue.svg)

## 简介

本项目的官方GitHub地址是 [https://github.com/beecloud/beecloud-php](https://github.com/beecloud/beecloud-php)，本SDK 是基于 [BeeCloud RESTful API](https://github.com/beecloud/beecloud-rest-api)开发的PHP SDK，目前支持以下功能：
- 微信支付、支付宝支付、银联在线支付、百度钱包支付、京东支付、PayPal等多种支付方式
- 支付/退款订单总数的查询
- 支付订单和退款订单的查询
- 根据ID(支付/退款订单唯一标识)查询订单记录、退款记录

依赖: PHP 5.3+, PHP-curl

## 流程

下图为整个支付的流程: 
![Flow](http://7xavqo.com1.z0.glb.clouddn.com/img-beecloud%20sdk.png)

步骤①：**（从网页服务器端）发送订单信息**  
步骤②：**收到BeeCloud返回的渠道支付地址（比如支付宝的收银台）**  
>*特别注意：
微信扫码返回的内容不是和支付宝一样的一个有二维码的页面，而是直接给出了微信的二维码的内容，需要用户自己将微信二维码输出成二维码的图片展示出来*

步骤③：**将支付地址展示给用户进行支付**  
步骤④：**用户支付完成后通过一开始发送的订单信息中的return_url来返回商户页面**
>*特别注意：
微信没有自己的页面，二维码展示在商户自己的页面上，所以没有return url的概念，需要商户自行使用一些方法去完成这个支付完成后的跳转（比如后台轮询查支付结果）*

此时商户的网页需要做相应界面展示的更新（比如告诉用户"支付成功"或"支付失败")。**不允许**使用同步回调的结果来作为最终的支付结果，因为同步回调有极大的可能性出现丢失的情况（即用户支付完没有执行return url，直接关掉了网站等等），最终支付结果应以下面的异步回调为准。

步骤⑤：**（在商户后端服务端）处理异步回调结果（[Webhook](https://beecloud.cn/doc/?index=webhook)）**
 
付款完成之后，根据客户在BeeCloud后台的设置，BeeCloud会向客户服务端发送一个Webhook请求，里面包括了数字签名，订单号，订单金额等一系列信息。客户需要在服务端依据规则要验证**数字签名是否正确，购买的产品与订单金额是否匹配，这两个验证缺一不可**。验证结束后即可开始走支付完成后的逻辑。

## 初始化

1. 注册开发者: BeeCloud平台[注册账号](http://beecloud.cn/register/)
2. 创建应用: 使用注册的账号登陆,在控制台中创建应用,点击**"+添加应用"**创建新应用,具体可参考[快速开始](https://beecloud.cn/apply/)
3. 获取参数: 在新创建的应用中即可获取APP ID,APP Secret,Master Secret,Test Secret
4. 在代码中调用方法registerApp(请注意各个参数一一对应):

```
/* registerApp fun four params
 * @param(first) $app_id beecloud平台的APP ID
 * @param(second) $app_secret  beecloud平台的APP SECRET
 * @param(third) $master_secret  beecloud平台的MASTER SECRET
 * @param(fouth) $test_secret  beecloud平台的TEST SECRET, for sandbox
 */
\beecloud\rest\api::registerApp('app id', 'app secret', 'master secret', 'test secret');
//不使用namespace的用户和2.2.0之前的v2版本用户请使用
BCRESTApi::registerApp('app id', 'app secret', 'master secret', 'test secret')
```

5. LIVE模式和TEST模式

在代码中调用方法setMode, 即:
- setSandbox(false)或者不调用此方法, 即LIVE模式
- setSandbox(true), 即TEST模式, 仅提供下单和支付订单查询的Sandbox模式

开启测试模式,即:
```
\beecloud\rest\api::setSandbox(true);
//不使用namespace的用户和2.2.0之前的v2版本用户请使用
BCRESTApi::setSandbox(true)
```

## 引入BeeCloud API

### 使用[composer](https://getcomposer.org/)
> composer 是php的包管理工具， 通过composer.json里的配置管理依赖的包，同时可以在使用类时自动加载对应的包

在你的composer.json中添加如下依赖

```
{
	"require": {
		"beecloud.cn/rest": "{version}"
	}
}
```


version ＝ dev-master为主干分支开发版本,请酌情使用

然后命令行执行

```
composer install
```

在需要使用的php文件中引入vendor/autoload.php

```
require_once('vendor/autoload.php');
```

### 手动使用
适合不能使用composer(PHP < 5.3.2)或者namespace(PHP <
5.3)的情况，拷贝当前所有文件(demo可以忽略)到你指定的目录<YourPath>下，你的代码中

```
require_once('<YourPath>/loader.php');
```

## BeeCloud API
- 请求参数和返回参数请参考BeeCloud RESTfull API，同时可以参考demo中各渠道的代码示例
- [常见问题](https://beecloud.cn/faq/)
- [错误对照码](https://github.com/beecloud/beecloud-rest-api/tree/master/error_code)

## 发起支付订单

### 国际支付

国际支付目前主要是PayPal支付方式，主要提供了三种支付渠道类型：

- 当channel参数为PAYPAL_PAYPAL，即PayPal立即支付，接口返回url，用户跳转至此url，登陆paypal便可完成支付
- 当channel参数为PAYPAL_CREDITCARD，即信用卡支付，直接支付成功，接口返回的信用卡ID，此ID在快捷支付时需要
- 当channel参数为PAYPAL_SAVED_CREDITCARD，即存储的信用卡id支付，直接支付成功

支付调用的方法：

```
\beecloud\rest\international::bill(array $data);
```

不使用namespace的用户和2.2.0之前的v2版本用户请使用

```
BCRESTInteraional::bill(array $data);
```

注：具体的请求参数和返回参数，请参考[国际支付REST API](https://github.com/beecloud/beecloud-rest-api/tree/master/international)

### 国内支付

国内支付适用于支付宝支付、京东支付、微信支付、百度钱包支付、银联在线支付等多种支付方式，选择不同的支付渠道类型，请求参数和返回参数也不尽相同，开发过程中要特别留意，严格按照提供的[线上支付REST API](https://github.com/beecloud/beecloud-rest-api/tree/master/online)文档进行开发。


支付调用方法：

```
\beecloud\rest\api::bill(array $data);
```

不使用namespace的用户和2.2.0之前的v2版本用户请使用

```
BCRESTApi::bill(array $data);
```

注：具体的请求参数和返回参数，请参考[线上支付REST API](https://github.com/beecloud/beecloud-rest-api/tree/master/online) **【2. 支付】**部分

## 支付订单查询

用户提供相应的请求参数，并调用api中的bills方法，即可进行查询，主要包括单个（根据ID查询，即订单的唯一标识，而不是bill\_no）和多条记录的查询

多条记录的查询调用方法：

```
\beecloud\rest\api::bills(array $data);
```

不使用namespace的用户和2.2.0之前的v2版本用户请使用

```
BCRESTApi::bills(array $data);
```

根据ID查询调用的方法：

```
\beecloud\rest\api::bill(array $data);
```

不使用namespace的用户和2.2.0之前的v2版本用户请使用

```
BCRESTApi::bill(array $data);
```


注：具体的请求参数和返回参数，请参考[线上支付REST
API](https://github.com/beecloud/beecloud-rest-api/tree/master/online) **【5.订单查询】【11.
支付订单查询(指定ID)】**部分

## 订单总数查询

该接口主要用于对订单总数的统计，其中我们可以对其中的一段时间（即设置start\_time、end\_time）订单的统计，也可以只统计成功支付的订单（即设置spay\_result为true即可）

调用的方法：

```
\beecloud\rest\api::bills_count(array $data);
```

不使用namespace的用户和2.2.0之前的v2版本用户请使用

```
BCRESTApi::bills_count(array $data);
```

注：具体的请求参数和返回参数，请参考[线上支付REST
API](https://github.com/beecloud/beecloud-rest-api/tree/master/online) **【6. 订单总数查询】**部分

## 发起退款

退款接口仅支持对已经支付成功的订单进行退款，对于同一笔订单，仅能退款成功一次（同一个退款请求，第一次退款申请被驳回，可进行第二次退款申请）。
退款金额refund\_fee必须小于或者等于原始支付订单的total\_fee，如果是小于，则表示部分退款

退款接口包含预退款功能，当need\_approval值为true时，该接口开启预退款功能，预退款仅创建退款记录，并不真正发起退款，需后续调用审核接口，或者通过BeeCloud控制台的预退款界面，审核同意或者否决，才真正发起退款或者拒绝预退款。

退款调用方法：
```
\beecloud\rest\api::refund(array $data);
```

不使用namespace的用户和2.2.0之前的v2版本用户请使用

```
BCRESTApi::refund(array $data);
```

注：具体的请求参数和返回参数，请参考[线上支付REST
API](https://github.com/beecloud/beecloud-rest-api/tree/master/online) **【3. 退款】**部分


## 预退款批量审核

批量审核接口仅支持预退款，批量审核分为批量驳回和批量同意

调用方法：
```
\beecloud\rest\api::refund(array $data);
```

不使用namespace的用户和2.2.0之前的v2版本用户请使用

```
BCRESTApi::refund(array $data);
```

注：具体的请求参数和返回参数，请参考[线上支付REST
API](https://github.com/beecloud/beecloud-rest-api/tree/master/online) **【4. 预退款批量审核】**部分


## 退款订单查询

用户提供相应的请求参数，并调用api中的refunds方法，即可进行查询，主要包括单个（根据ID查询，即退款订单的唯一标识，而不是refund\_no）和多条记录的查询

多条记录查询调用的方法：
```
\beecloud\rest\api::refunds(array $data);
```

不使用namespace的用户和2.2.0之前的v2版本用户请使用

```
BCRESTApi::refunds(array $data);
```

根据ID查询调用的方法：

```
\beecloud\rest\api::refund(array $data);
```

不使用namespace的用户和2.2.0之前的v2版本用户请使用

```
BCRESTApi::refund(array $data);
```

注：具体的请求参数和返回参数，请参考[线上支付REST
API](https://github.com/beecloud/beecloud-rest-api/tree/master/online) **【7. 退款查询】【10.
退款订单查询(指定ID)】**部分


## 退款总数查询

该接口主要用于对退款订单总数的统计，其中我们可以对其中的一段时间（即设置start\_time、end\_time）退款订单的统计，也可以统计是否是预退款的退款订单（即设置need\_approval为true即可）

调用的方法：

```
\beecloud\rest\api::refunds_count(array $data);
```

不使用namespace的用户和2.2.0之前的v2版本用户请使用

```
BCRESTApi::refunds_count(array $data);
```

注：具体的请求参数和返回参数，请参考[线上支付REST
API](https://github.com/beecloud/beecloud-rest-api/tree/master/online) **【8. 退款总数查询】**部分

## 退款状态更新

退款状态更新接口提供查询退款状态以更新退款状态的功能，用于对退款后不发送回调的渠道（WX、YEE、KUAIQIAN、BD）退款后的状态更新。

调用方法：

```
\beecloud\rest\api::refundStatus(array $data);
```

不使用namespace的用户和2.2.0之前的v2版本用户请使用

```
BCRESTApi::refundStatus(array $data);
```

注：具体的请求参数和返回参数，请参考[线上支付REST
API](https://github.com/beecloud/beecloud-rest-api/tree/master/online) **【9. 退款状态更新】**部分

## BeeCloud企业打款 - 打款到银行卡

调用方法：
```
\beecloud\rest\api::bc_transfer(array $data);
```

不使用namespace的用户和2.2.0之前的v2版本用户请使用

```
BCRESTApi::bc_transfer(array $data);
```

注：具体的请求参数和返回参数，请参考[企业打款REST API](https://github.com/beecloud/beecloud-rest-api/tree/master/transfer) **【BeeCloud企业打款 - 打款到银行卡】**部分

## 微信企业打款/微信红包

主要包括微信红包、微信企业打款

打款调用方法：

```
\beecloud\rest\api::transfer(array $data);
```

不使用namespace的用户和2.2.0之前的v2版本用户请使用

```
BCRESTApi::transfer(array $data);
```

注：具体的请求参数和返回参数，请参考[企业打款REST
API](https://github.com/beecloud/beecloud-rest-api/tree/master/transfer) **【微信企业打款/微信红包】**部分


## Demo

项目文件夹demo为我们的样例项目,可根据自己的需要做出相应的调整

- 微信没有return_url，如果用户需要支付完成做类似同步跳转的形式，需根据微信支付提供的jsapi完成。
- 关于支付宝支付、银联在线支付、百度钱包支付、京东支付、PayPal等支付方式的return_url,需要用户自己设定
- 关于weekhook的接收 请参考demo中的webhook.php, 文档请阅读 [webhook](https://github.com/beecloud/beecloud-webhook)

## 测试

项目文件夹tests为我们的样例测试,可根据自己的需要做出相应的调整

- 测试采用PHPUnit,请参考[PHPUnit](https://phpunit.de/)

## 联系我们
- 如果发现了bug，欢迎提交[issue](https://github.com/beecloud/beecloud-php/issues)
- 如果有新的需求，欢迎提交[issue](https://github.com/beecloud/beecloud-php/issues)

## 代码许可
The MIT License (MIT).

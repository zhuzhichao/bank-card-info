# Bank card info

[![Build Status](https://api.travis-ci.org/zhuzhichao/bank-card-info.svg?branch=master)](https://travis-ci.org/zhuzhichao/bank-card-info)

根据银行卡号获取银行信息（银行名称, 信用卡/借记卡, 银行LOGO 等）, 供任何 PHP 框架或者原生代码使用.

做涉及到金融项目的时候，难免和银行卡打交道，还记得在支付宝上给 `同学` `同志` `同事` `女朋友` 打钱的时候，当你输入完银行卡号的时候自动帮你选择好银行卡的小细节吗？当你给信用卡还款的时候，还能自动判断出是信用卡还是储蓄卡。如此贴心的功能，你值得拥有！


```
BankCard::info('6225700000000000');

// 将得到
array (size=6)
  'validated'    => true			// 是否验证成功
  'bank'         => 'CEB',			// 银行标识
  'bankName'     => '中国光大银行' ,	// 银行名称
  'bankImg'      => 'https://apimg.alipay.com/combo.png?d=cashier&t=CEB',  // 银行LOGO
  'cardType'     => 'CC',		// 卡类型：CC 信用卡 DC 储蓄卡
  'cardTypeName' => '信用卡',	// 卡类型名称：信用卡 | 储蓄卡
```

## 特点

1. 不需要配置，不需要使用数据库，妈妈再也不用担心配置问题了
2. 使用简单，功能专（dān）注（yī）
3. 使用 [composer](https://getcomposer.org/) 进行安装管理，国际标准，方便快捷，即安即用，随时更新数据库

## Install

这里不详细介绍安装composer了，大家根据 [链接](https://getcomposer.org/) 自行安装 `composer`

`composer require "zhuzhichao/bank-card-info"`

## Usage

#### Common

可以这样来用
```php
<?php 
require 'vendor/autoload.php';  
use Zhuzhichao\BankCardInfo\BankCard;  
var_dump(BankCard::info('6225700000000000'));
```

```
// 返回结果
array (size=6)
  'validated'    => true
  'bank'         => 'CEB',
  'bankName'     => '中国光大银行' ,
  'bankImg'      => 'https://apimg.alipay.com/combo.png?d=cashier&t=CEB',
  'cardType'     => 'CC',
  'cardTypeName' => '信用卡',
```

#### For `laravel`:

1.安装该插件

2.在 `config/app.php`(Laravel 5.0 - 5.4) 添加下面的代码，如果是 Laravel 5.5+ ，已经支持扩展包发现，不需要添加下面的代码
```php
'aliases' => [
    'BankCard'  => 'Zhuzhichao\BankCardInfo\BankCard', 
],
```

3.然后开始在你的项目里面使用了 `BankCard::info('6225700000000000')` 获取银行卡信息.

```
// 返回结果
array (size=6)
  'validated'    => true
  'bank'         => 'CEB',
  'bankName'     => '中国光大银行' ,
  'bankImg'      => 'https://apimg.alipay.com/combo.png?d=cashier&t=CEB',
  'cardType'     => 'CC',
  'cardTypeName' => '信用卡',
```

4.获取银行列表信息 `BankCard::getBankList()` , 如下

```
array (size=165)
  'SRCB'   =>  '深圳农村商业银行',
  'BGB'    =>  '广西北部湾银行',
  'SHRCB'  =>  '上海农村商业银行',
  'BJBANK' =>  '北京银行',
  'WHCCB'  =>  '威海市商业银行',
  'BOZK'   =>  '周口银行',
  ...
  'LYBANK' =>  '洛阳银行',
  'GDB'    =>  '广东发展银行',
  'ZBCB'   =>  '齐商银行',
  'CBKF'   =>  '开封市商业银行',
```

5.获取银行名称 `BankCard::getBankNameList()` , 如下

```
array (size=165)
  0 => '深圳农村商业银行',
  1 => '广西北部湾银行',
  2 => '上海农村商业银行',
  3 => '北京银行',
  ...
  125 => '广东发展银行',
  126 => '齐商银行',
  127 => '开封市商业银行',
  more elements...
```

6.单独获取银行LOGO `BankCard::getBankImg('ABC')`

```
https://apimg.alipay.com/combo.png?d=cashier&t=ABC
```

7.支持的银行有 （ctrl + f 或 CMD + f 进行查找）

深圳农村商业银行

广西北部湾银行

上海农村商业银行

北京银行

威海市商业银行

周口银行

库尔勒市商业银行

平安银行

顺德农商银行

湖北省农村信用社

无锡农村商业银行

朝阳银行

浙商银行

邯郸银行

中国银行

东莞银行

中国建设银行

遵义市商业银行

绍兴银行

贵州省农村信用社

张家口市商业银行

锦州银行

平顶山银行

汉口银行

上海浦东发展银行

宁夏黄河农村商业银行

广东南粤银行

广州农商银行

苏州银行

杭州银行

衡水银行

湖北银行

嘉兴银行

华融湘江银行

丹东银行

安阳银行

恒丰银行

国家开发银行

江苏太仓农村商业银行

南京银行

郑州银行

德阳商业银行

宜宾市商业银行

四川省农村信用

昆仑银行

莱商银行

尧都农商行

重庆三峡银行

富滇银行

江苏省农村信用联合社

济宁银行

招商银行

晋城银行JCBANK

阜新银行

武汉农村商业银行

湖北银行宜昌分行

台州银行

泰安市商业银行

许昌银行

中国光大银行

宁夏银行

徽商银行

九江银行

农信银清算中心

浙江民泰商业银行

廊坊银行

鞍山银行

昆山农村商业银行

玉溪市商业银行

大连银行

东莞农村商业银行

广州银行

宁波银行

营口银行

陕西信合

桂林银行

青海银行

成都农商银行

青岛银行

东亚银行

湖北银行黄石分行

温州银行

天津农商银行

齐鲁银行

广东省农村信用社联合社

浙江泰隆商业银行

赣州银行

贵阳市商业银行

重庆银行

龙江银行

南充市商业银行

三门峡银行

常熟农村商业银行

上海银行

吉林银行

常州农村信用联社

潍坊银行

张家港农村商业银行

福建海峡银行

浙江省农村信用社联合社

兰州银行

晋商银行

渤海银行

浙江稠州商业银行

阳泉银行

盛京银行

西安银行

包商银行

江苏银行

抚顺银行

河南省农村信用

交通银行

邢台银行

中信银行

华夏银行

湖南省农村信用社

东营市商业银行

鄂尔多斯银行

北京农村商业银行

信阳银行

自贡市商业银行

成都银行

韩亚银行

中国民生银行

洛阳银行

广东发展银行

齐商银行

开封市商业银行

内蒙古银行

兴业银行

重庆农村商业银行

石嘴山银行

德州银行

上饶银行

乐山市商业银行

江西省农村信用

中国工商银行

晋中市商业银行

湖州市商业银行

南海农村信用联社

新乡银行

江苏江阴农村商业银行

云南省农村信用社

中国农业银行

广西省农村信用

中国邮政储蓄银行

驻马店银行

安徽省农村信用社

甘肃省农村信用

辽阳市商业银行

吉林农信

乌鲁木齐市商业银行

中山小榄村镇银行

长沙银行

金华银行

河北银行

鄞州银行

临商银行

承德银行

山东农信

南昌银行

天津银行

吴江农商银行

城市商业银行资金清算中心

河北省农村信用社

## 鸣谢

支付宝提供的这么好用的接口 ^_^

## Contributing

有什么新的想法和建议，欢迎提交 [issue](https://github.com/zhuzhichao/bank-card-info/issues) 或者 [Pull Requests](https://github.com/zhuzhichao/bank-card-info/pulls)。


## License

MIT


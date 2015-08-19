#Bank card info
[![Build Status](https://api.travis-ci.org/zhuzhichao/bank-card-info.svg?branch=master)](https://travis-ci.org/zhuzhichao/bank-card-info)

根据银行卡号获取银行信息（银行名称, 信用卡/借记卡, 银行LOGO 等）, 供任何 PHP 框架或者原生代码使用.

##特点

1. 不配置和使用数据库，妈妈再也不用担心配置问题了
2. 使用简单，功能专（dān）注（yī）
3. 使用[composer](https://getcomposer.org/)进行安装管理，国际标准，方便快捷，即安即用，随时更新数据库

##Install

这里不详细介绍安装composer了，大家根据[链接](https://getcomposer.org/)自行安装吧！什么？没听过？你真的需要脑补了，赶快行动吧！^^

如果已经有了`composer.json`文件的话，直接添加`"zhuzhichao/bank-card-info": "~1.0"` 到依赖，然后执行`composer update`。
或者直接`composer require "zhuzhichao/bank-card-info"`。

##Use

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
  'validated' => boolean true
  'bank' => string 'CEB' (length=3)
  'bankName' => string '中国光大银行' (length=18)
  'bankImg' => string 'https://apimg.alipay.com/combo.png?d=cashier&t=CEB' (length=50)
  'cardType' => string 'CC' (length=2)
  'cardTypeName' => string '信用卡' (length=9)
```

对于`laravel`可以这样优雅的用:

1.安装该插件

2.在`app/config/app.php`(Laravel 4) 或 `config/app.php`(Laravel 5)，或者你自定义配置的app.php文件内添加

```php
	'aliases' => array( 
        'BankCard'  => 'Zhuzhichao\BankCardInfo\BankCard', 
	),
```

3.然后开始在你的项目里面使用了 `BankCard::info('6225700000000000')` 获取银行卡信息.
```
// 返回结果
array (size=6)
  'validated' => boolean true
  'bank' => string 'CEB' (length=3)
  'bankName' => string '中国光大银行' (length=18)
  'bankImg' => string 'https://apimg.alipay.com/combo.png?d=cashier&t=CEB' (length=50)
  'cardType' => string 'CC' (length=2)
  'cardTypeName' => string '信用卡' (length=9)
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


##Contributing
有什么新的想法和建议，欢迎提交[issue](https://github.com/zhuzhichao/bank-card-info/issues)或者[Pull Requests](https://github.com/zhuzhichao/bank-card-info/pulls)。


##License
MIT


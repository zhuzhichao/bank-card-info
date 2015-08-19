<?php
require 'vendor/autoload.php';

use Zhuzhichao\BankCardInfo\BankCard;

var_dump(BankCard::info('6225700000000000'));

var_dump(BankCard::info('6217921400000000'));

var_dump(BankCard::info('4402905009100226'));

var_dump(BankCard::getBankList());

var_dump(BankCard::getBankNameList());
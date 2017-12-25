<?php
require __DIR__.'/../vendor/autoload.php';

use Zhuzhichao\BankCardInfo\BankCard;
use PHPUnit\Framework\TestCase;

class TestBankCard extends TestCase
{

    public function testBankCardInfo()
    {
        $this->assertEquals([
            'validated'    => true,
            'bank'         => 'CEB',
            'bankName'     => '中国光大银行',
            'bankImg'      => 'https://apimg.alipay.com/combo.png?d=cashier&t=CEB',
            'cardType'     => 'CC',
            'cardTypeName' => '信用卡'
        ], BankCard::info('6225700000000000'));

        $this->assertEquals([
            'validated'    => true,
            'bank'         => 'SPDB',
            'bankName'     => '上海浦东发展银行',
            'bankImg'      => 'https://apimg.alipay.com/combo.png?d=cashier&t=SPDB',
            'cardType'     => 'DC',
            'cardTypeName' => '储蓄卡',
        ], BankCard::info('6217921400000000'));

        $this->assertEquals([
            'validated'    => false
        ], BankCard::info('4402905009100000'));

        $this->assertEquals('https://apimg.alipay.com/combo.png?d=cashier&t=ABC', BankCard::getBankImg('ABC'));
    }
}
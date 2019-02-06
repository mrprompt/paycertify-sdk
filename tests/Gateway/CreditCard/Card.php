<?php
namespace MrPrompt\PayCertify\Tests\Gateway\CreditCard;

/**
 * Card
 * @author Thiago Paes <mrprompt@gmail.com>
 */
trait Card
{
    public function visa()
    {
        return [
            'brand' => 'Visa',
            'pan' => '4012000098765439',
            'exp' => '12/20',
            'cvv' => '999',
        ];
    }

    public function mastercard()
    {
        return [
            'brand' => 'MasterCard',
            'pan' => '5499740000000057',
            'exp' => '12/20',
            'cvv' => '998',
        ];
    }

    public function amex()
    {
        return [
            'brand' => 'AMEX',
            'pan' => '371449635392376',
            'exp' => '12/20',
            'cvv' => '997',
        ];
    }

    public function discover()
    {
        return [
            'brand' => 'Discover',
            'pan' => '6011000993026909',
            'exp' => '12/20',
            'cvv' => '966',
        ];
    }

    public function diners()
    {
        return [
            'brand' => 'Diners',
            'pan' => '3055155515160018',
            'exp' => '12/20',
            'cvv' => '996',
        ];
    }

    public function jcb()
    {
        return [
            'brand' => 'JCB',
            'pan' => '3530142019945859',
            'exp' => '12/20',
            'cvv' => '996',
        ];
    }
}
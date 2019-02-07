<?php
namespace MrPrompt\PayCertify\Gateway\Check;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * CHARGE AN ACCOUNT
 * 
 * POST https://gateway-api.paycertify.com/api/checks/sale
 * 
 * Charging a bank account using PayCertify Gateway is simple. 
 * All you need is the bank account information of the person 
 * or entity you want to credit or debit. 
 * Then decide how much you want to send or receive from their 
 * bank account.
 * 
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Charging extends Base
{
    const END_POINT = '/api/checks/sale';

    /**
     * @inheritdoc
     */
    public function process(array $params = [])
    {
        return $this->client->post(self::END_POINT, $params);
    }
}
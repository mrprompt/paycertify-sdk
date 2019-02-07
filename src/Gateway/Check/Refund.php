<?php
namespace MrPrompt\PayCertify\Gateway\Check;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * REFUND AN ACCOUNT
 * 
 * POST https://gateway-api.paycertify.com/api/checks/{transaction_id}/refund
 * 
 * Refunding a bank account using PayCertify Gateway is simple. 
 * A refund stops the transaction from being settled and don’t remove funds 
 * from the customer.
 * 
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Refund extends Base
{
    const END_POINT = '/api/checks/{transaction_id}/refund';

    /**
     * @inheritdoc
     */
    public function process(string $transaction, array $params = [])
    {
        $url = str_replace('{transaction_id}', $transaction, self::END_POINT);

        return $this->client->post($url, $params);
    }
}
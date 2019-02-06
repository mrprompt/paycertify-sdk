<?php
namespace MrPrompt\PayCertify\Gateway\CreditCard;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * REFUNDING A TRANSACTION
 * 
 * POST https://gateway-api.paycertify.com/api/transactions/{transaction_id}/refund
 * 
 * A refund should be ran when running a reversal for a transaction that has a capture 
 * or sale event. A refund flags the transaction to be sent for settlement and returns 
 * the funds to the customer.
 * 
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Refund extends Base
{
    const END_POINT = '/api/transactions/{transaction_id}/refund';

    /**
     * @inheritdoc
     */
    public function process(string $transaction, array $params = [])
    {
        $url = str_replace('{transaction_id}', $transaction, self::END_POINT);

        return $this->client->post($url, $params);
    }
}
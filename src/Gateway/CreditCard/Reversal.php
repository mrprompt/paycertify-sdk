<?php
namespace MrPrompt\PayCertify\Gateway\CreditCard;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * VOIDING A TRANSACTION
 * 
 * POST https://gateway-api.paycertify.com/api/transactions/{transaction_id}/void
 * 
 * A void is only possible after a transaction has been created through auth request. 
 * Once that’s done, you should use the transaction ID response field to reference 
 * the transaction being voided. A void simply cancels a previously made authorization 
 * and releases the authorized balance on the customer’s card.
 * 
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Reversal extends Base
{
    const END_POINT = '/api/transactions/{transaction_id}/void';

    /**
     * @inheritdoc
     */
    public function process(string $transaction, array $params = [])
    {
        $url = str_replace('{transaction_id}', $transaction, self::END_POINT);

        return $this->client->post($url, $params);
    }
}
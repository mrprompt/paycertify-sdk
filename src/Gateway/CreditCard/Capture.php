<?php
namespace MrPrompt\PayCertify\Gateway\CreditCard;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * CAPTURE
 * 
 * POST https://gateway-api.paycertify.com/api/transactions/{transaction_id}/capture

 * After running the auth transaction event, you should be able to capture the funds. 
 * Use the transaction ID sent back on the response to capture the desired amount.
 * 
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Capture extends Base
{
    const END_POINT = '/api/transactions/{transaction_id}/capture';

    /**
     * @inheritdoc
     */
    public function process(string $transaction, array $params = [])
    {
        $url = str_replace('{transaction_id}', $transaction, self::END_POINT);

        return $this->client->post($url, $params);
    }
}
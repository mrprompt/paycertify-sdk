<?php
namespace MrPrompt\PayCertify\Gateway\CreditCard;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * AUTHORIZE AND CHARGE LATER
 * 
 * POST https://gateway-api.paycertify.com/api/transactions/auth
 * 
 * In order to charge later, you need to make two requests: first an auth request, 
 * which blocks balance on customer’s credit card, and then run capture request, 
 * to flag the authorization for settlement.
 * 
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Authorize extends Base
{
    const END_POINT = '/api/transactions/auth';

    /**
     * @inheritdoc
     */
    public function process(array $params = [])
    {
        return $this->client->post(self::END_POINT, $params);
    }
}
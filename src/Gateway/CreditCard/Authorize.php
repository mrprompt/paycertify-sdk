<?php
namespace MrPrompt\PayCertify\Gateway\CreditCard;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * Authorize
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Authorize extends Base
{
    /**
     * AUTHORIZE AND CHARGE LATER
     * 
     * POST https://gateway-api.paycertify.com/api/transactions/auth
     * 
     * In order to charge later, you need to make two requests: first an auth request, 
     * which blocks balance on customer’s credit card, and then run capture request, 
     * to flag the authorization for settlement.
     * 
     * @return Response
     */
    public function process(array $params = [])
    {
        return $this->client->post('/api/transactions/auth', $params);
    }
}
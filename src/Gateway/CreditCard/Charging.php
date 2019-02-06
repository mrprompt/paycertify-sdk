<?php
namespace MrPrompt\PayCertify\Gateway\CreditCard;

use MrPrompt\PayCertify\Gateway\Base;

/**
 * Charging
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Charging extends Base
{
    /**
     * CHARGE A CREDIT CARD
     * 
     * POST https://gateway-api.paycertify.com/api/transactions/sale
     * 
     * Charging a credit card using PayCertify gateway is simple. 
     * In this case, we’re performing a straight capture, so it’s an authorization and also a settlement request. 
     * If you’re looking just to authorize a certain amount, and then charge later, see Authorize and Charge later.
     * 
     * @return Response
     */
    public function process(array $params = [])
    {
        return $this->client->post('/api/transactions/sale', $params);
    }
}
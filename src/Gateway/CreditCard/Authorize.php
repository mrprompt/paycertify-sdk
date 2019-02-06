<?php
namespace MrPrompt\PayCertify\Gateway\CreditCard;

use MrPrompt\PayCertify\HttpClient;

/**
 * Authorize
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Authorize
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * Constructor
     * 
     * @param HttpClient $client
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

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
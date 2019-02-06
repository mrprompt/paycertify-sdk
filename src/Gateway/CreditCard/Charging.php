<?php
namespace MrPrompt\PayCertify\Gateway\CreditCard;

use MrPrompt\PayCertify\HttpClient;

/**
 * Charging
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Charging
{
    private $client;

    public function __construct(HttpClient $client = null)
    {
        $this->client = $client;
    }

    public function sale(array $params = [])
    {
        return $this->client->post('/api/transactions/sale', $params);
    }
}
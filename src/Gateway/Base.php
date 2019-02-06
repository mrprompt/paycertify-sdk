<?php
namespace MrPrompt\PayCertify\Gateway;

use MrPrompt\PayCertify\HttpClient;

abstract class Base
{
    /**
     * @var HttpClient
     */
    protected $client;

    /**
     * Constructor
     * 
     * @param HttpClient $client
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    abstract public function process();
}
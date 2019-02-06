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

    /**
     * Get the end point
     * 
     * @return string
     */
    public function getEndPoint(): string
    {
        return static::END_POINT;
    }
}
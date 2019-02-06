<?php
namespace MrPrompt\PayCertify\Tests\Base;

use MrPrompt\PayCertify\HttpClient;
use PHPUnit\Framework\TestCase;

abstract class Base extends TestCase
{
    protected $client;

    /**
     * Bootstrap
     */
    public function setUp()
    {
        parent::setUp();

        $token = getenv('SDK_TOKEN');
        $environment = getenv('SDK_ENV');

        $this->client = new HttpClient($token, $environment);
    }
}
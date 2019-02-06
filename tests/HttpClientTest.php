<?php
namespace MrPrompt\PayCertify\Tests;

use GuzzleHttp\ClientInterface;
use MrPrompt\PayCertify\HttpClient;
use MrPrompt\PayCertify\Tests\Base\Base;

/**
 * HttpClientTest
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class HttpClientTest extends Base
{
    private $token;

    /**
     * Bootstrap
     */
    public function setUp()
    {
        parent::setUp();
        $this->token = getenv('SDK_TOKEN');
    }
    
    /** 
     * @test 
     * @coverage MrPrompt\PayCertify\HttpClient::__construct
     * @coverage MrPrompt\PayCertify\HttpClient::getClient
     */
    public function getClientMustBuReturnClientInterface()
    {
        $client = new HttpClient($this->token);

        $this->assertInstanceOf(ClientInterface::class, $client->getClient());
    }

    /** 
     * @test 
     * @coverage MrPrompt\PayCertify\HttpClient::__construct
     * @coverage MrPrompt\PayCertify\HttpClient::getClient
     */
    public function constructorSetProductionUrlByDefault()
    {
        $client = new HttpClient($this->token);

        $this->assertEquals(
            HttpClient::CLIENT_URLS['production'],
            $client->getClient()->baseUrl
        );
    }

    /** 
     * @test 
     * @coverage MrPrompt\PayCertify\HttpClient::__construct
     * @coverage MrPrompt\PayCertify\HttpClient::getClient
     */
    public function constructorMustBeSettedByTestEnv()
    {
        $environment = getenv('SDK_ENV');
        $client = new HttpClient($this->token, $environment);

        $this->assertEquals(
            HttpClient::CLIENT_URLS[ $environment ],
            $client->getClient()->baseUrl
        );
    }
}

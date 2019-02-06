<?php
namespace MrPrompt\PayCertify\Tests;

use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\TestCase;
use MrPrompt\PayCertify\HttpClient;

/**
 * HttpClientTest
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class HttpClientTest extends TestCase
{
    /** 
     * @test 
     * @coverage MrPrompt\PayCertify\HttpClient::__construct
     * @coverage MrPrompt\PayCertify\HttpClient::getClient
     */
    public function getClientMustBuReturnClientInterface()
    {
        $client = new HttpClient();

        $this->assertInstanceOf(ClientInterface::class, $client->getClient());
    }

    /** 
     * @test 
     * @coverage MrPrompt\PayCertify\HttpClient::__construct
     * @coverage MrPrompt\PayCertify\HttpClient::getClient
     */
    public function constructorSetProductionUrlByDefault()
    {
        $client = new HttpClient();

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
        $environment = getenv('APPLICATION_ENV');
        $client = new HttpClient($environment);

        $this->assertEquals(
            HttpClient::CLIENT_URLS[ $environment ],
            $client->getClient()->baseUrl
        );
    }
}

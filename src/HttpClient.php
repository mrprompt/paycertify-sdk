<?php
namespace MrPrompt\PayCertify;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;

/**
 * HttpClient
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class HttpClient
{
    /**
     * Environments
     */
    const CLIENT_URLS = [
        'test' => 'https://qa-gateway-api.paycertify.com',
        'production' => 'https://gateway-api.paycertify.com'
    ];

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * Initialize the HTTP Client used by SDK.
     * 
     * @param string $mode Set the client mode
     * @param ClientInterface $client
     */
    public function __construct(string $mode = 'production', ClientInterface $client = null)
    {
        $this->client = $client ?: new Client();
        $this->client->baseUrl = self::CLIENT_URLS[$mode];
        $this->headers = [
            'Content-Type' => 'application/json',
            'User-Agent' => 'Paycertify SDK HttpClient v1.0.0',
            'Cache-Control' => 'no-cache',
            'Connection' => 'Keep-Alive',
            'Accept' => 'application/json'
        ];
    }

    /**
     * Get the client
     * 
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    /**
     * Send a content by POST
     * 
     * @return string
     */
    public function post(string $url, $body)
    {
        $response = $this->client->request(
            'POST',
            $url,
            [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body'    => $body,
                'verify'  => false
            ]
        );

        return $response->getBody();
    }

    /**
     * Get a content
     * 
     * @return string
     */
    public function get(string $url)
    {
        $response = $this->client->request('GET', $url, ['verify' => false]);

        return $response->getBody();
    }
}

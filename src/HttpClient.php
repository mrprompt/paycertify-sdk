<?php
namespace MrPrompt\PayCertify;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\ClientException;

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
        'production' => 'https://gateway-api.paycertify.com',
        'local' => 'http://api.gateway',
    ];

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * Initialize the HTTP Client used by SDK.
     * 
     * @param string $token The access token
     * @param string $mode Set the client mode
     * @param ClientInterface $client
     */
    public function __construct(string $token, string $mode = 'production', ClientInterface $client = null)
    {
        $this->client = $client ?: new Client();
        $this->client->baseUrl = self::CLIENT_URLS[$mode];
        $this->client->headers = [
            'Content-Type' => 'application/json',
            'User-Agent' => 'Paycertify SDK HttpClient v1.0.0',
            'Cache-Control' => 'no-cache',
            'Connection' => 'Keep-Alive',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
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
     * @return ResponseInterface
     */
    public function post(string $endpoint, array $body = [])
    {
        $payload = array_merge(['body' => json_encode($body)], ['headers' => $this->getClient()->headers]);
        $url = $this->getClient()->baseUrl . $endpoint;
        
        try {
            $response = $this->getClient()->request('POST', $url, $payload);

            return json_decode($response->getBody(), true);
        } catch (ClientException $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Get a content using GET method
     * 
     * @return ResponseInterface
     */
    public function get(string $endpoint)
    {
        $payload = ['headers' => $this->getClient()->headers];
        $url = $this->getClient()->baseUrl . $endpoint;
        
        try {
            $response = $this->getClient()->request('GET', $url, $payload);

            return json_decode($response->getBody(), true);
        } catch (ClientException $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Send a DELETE requisition
     * 
     * @return ResponseInterface
     */
    public function delete(string $endpoint, array $body = [])
    {
        $url = $this->getClient()->baseUrl . $endpoint;

        try {
            $response = $this->getClient()->request('DELETE', $url, ['headers' => $this->getClient()->headers]);

            return json_decode($response->getBody(), true);
        } catch (ClientException $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Send a PATCH requisition
     * 
     * @return ResponseInterface
     */
    public function patch(string $endpoint, array $body = [])
    {
        $payload = array_merge(['body' => json_encode($body)], ['headers' => $this->getClient()->headers]);
        $url = $this->getClient()->baseUrl . $endpoint;

        try {
            $response = $this->getClient()->request('PATCH', $url, ['headers' => $this->getClient()->headers]);

            return json_decode($response->getBody(), true);
        } catch (ClientException $ex) {
            return $ex->getMessage();
        }
    }
}

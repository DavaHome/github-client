<?php

namespace DavaHome\GithubApi;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

class GithubRequest
{
    /** @var string */
    protected $apiUrl;

    /** @var string */
    protected $token;

    /** @var \GuzzleHttp\Client */
    protected $guzzleClient;

    /**
     * GithubRequest constructor.
     *
     * @param string $token
     * @param string $apiUrl
     */
    public function __construct($token, $apiUrl)
    {
        $this->token = $token;
        $this->apiUrl = rtrim($apiUrl, '/');
        $this->guzzleClient = new \GuzzleHttp\Client([
            'cookies' => true,
        ]);
    }

    /**
     * @return \GuzzleHttp\Client
     */
    protected function getGuzzleClient()
    {
        return $this->guzzleClient;
    }

    /**
     * @param string $method
     * @param string $query
     *
     * @return Request
     */
    protected function buildRequest($method, $query)
    {
        $uri = new Uri($this->apiUrl . '/' . ltrim($query, '/'));
        $message = new Request($method, $uri);

        return $message;
    }

    /**
     * @param Request $request
     *
     * @return string
     */
    public function request(Request $request)
    {
        return $this->getGuzzleClient()
            ->send($request)
            ->getBody()
            ->getContents();
    }

    /**
     * @param string $result
     *
     * @return array|mixed|null
     */
    protected function prepareResult($result)
    {
        return \GuzzleHttp\json_decode($result, true);
    }

    /**
     * @param string $query
     *
     * @return string
     */
    public function get($query)
    {
        return $this->prepareResult(
            $this->request(
                $this->buildRequest('GET', $query)
            )
        );
    }
}

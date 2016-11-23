<?php

namespace Pitchart\GitlabHelper\Service;

use GuzzleHttp\Client;

/**
 * Class GitlabClient
 * @package Pitchart\GitlabHelper\Service
 */
class GitlabClient
{
    /**
     * @var  Client
     */
    private $httpClient;

    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $token;

    /**
     * GitlabClient constructor.
     * @param Client $httpClient
     * @param string $version
     * @param string $token
     */
    public function __construct(Client $httpClient, $token, $version)
    {
        $this->httpClient = $httpClient;
        $this->version = $version;
        $this->token = $token;
    }

    /**
     * @param $method
     * @param string $route
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function request($method, $route = '', array $options = [])
    {
        return $this->httpClient->request($method, $this->getRoute($route), $options);
    }

    /**
     * @param string $route
     * @return string
     */
    private function getRoute($route = '')
    {
        return 'api/'.$this->version.'/'.$route;
    }
}

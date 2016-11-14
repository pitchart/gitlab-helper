<?php

namespace Pitchart\GitlabHelper\Service;


use GuzzleHttp\Client;

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

    public function request($method, $route = '', array $options = []) {
        return $this->httpClient->request($method, $this->getRoute($route), $options);
    }

    private function getRoute($route = '') {
        return 'api/'.$this->version.'/'.$route;
    }


}
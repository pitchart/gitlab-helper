<?php

namespace Pitchart\GitlabHelper\Gitlab\Api;

use Pitchart\GitlabHelper\Gitlab\Api;
use Pitchart\GitlabHelper\Service\GitlabClient;

class Factory
{
    /** @var
     * GitlabClient
     */
    private $client;

    /**
     * @var array
     */
    private $apis = [];

    /**
     * @param GitlabClient $client
     */
    public function __construct(GitlabClient $client)
    {
        $this->client = $client;
    }

    public function addApi(Api $api, $alias) {
        $this->apis[$alias] = $api;
    }

    public function has($type) {
        return isset($this->apis[$type]) && $this->apis[$type];
    }

    /**
     * @param string $type
     * @return Api
     */
    public function api($type)
    {
        if (!$this->has($type)) {
            throw new \InvalidArgumentException('Invalid API type '.$type);
        }
        return $this->apis[$type];
    }
}
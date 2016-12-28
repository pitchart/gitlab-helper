<?php

namespace Pitchart\GitlabHelper\Gitlab\Api;

use Pitchart\GitlabHelper\Gitlab\Api;
use Pitchart\GitlabHelper\Service\GitlabClient;

class Factory
{
    /** @var GitlabClient */
    private $client;

    /**
     * @param GitlabClient $client
     */
    public function __construct(GitlabClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $type
     * @return Api
     */
    public function api($type)
    {
        switch ($type) {
            case 'group':
                return new Group($this->client);
            default:
                throw new \InvalidArgumentException('Invalid API type '.$type);
        }
    }
}
<?php

namespace Pitchart\GitlabHelper\Gitlab\Api;

class Group extends BaseApi
{

    protected $basePath = 'groups';

    /**
     * @param array $data
     * @return \Pitchart\GitlabHelper\Gitlab\Model\Group
     */
    public function hydrate(array $data) {
        return \Pitchart\GitlabHelper\Gitlab\Model\Group::fromArray($data);
    }
}
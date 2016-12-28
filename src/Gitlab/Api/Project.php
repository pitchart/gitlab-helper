<?php

namespace Pitchart\GitlabHelper\Gitlab\Api;


class Project extends BaseApi
{

    protected $basePath = 'projects';

    /**
     * @param array $data
     * @return \Pitchart\GitlabHelper\Gitlab\Model\Project
     */
    public function hydrate(array $data) {
        return \Pitchart\GitlabHelper\Gitlab\Model\Project::fromArray($data);
    }
}
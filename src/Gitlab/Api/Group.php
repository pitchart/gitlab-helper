<?php

namespace Pitchart\GitlabHelper\Gitlab\Api;

use Pitchart\Collection\Collection;
use Pitchart\GitlabHelper\Gitlab\Model\Project;

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

    /**
     * @param $id
     * @param array $arguments
     * @return Collection
     */
    public function projects($id, array $arguments) {
        $url = sprintf('%s/%s/projects', $this->basePath, $id);
        $response =  $this->client->request('GET', $url, $arguments);
        $datas = \GuzzleHttp\json_decode($response->getBody()->getContents());
        $collection = [];
        foreach ($datas as $data) {
            $collection[] = Project::fromArray((array) $data);
        }
        return new Collection($collection);
    }
}
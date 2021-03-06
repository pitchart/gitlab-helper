<?php

namespace Pitchart\GitlabHelper\Gitlab\Api;

use Pitchart\Collection\Collection;
use Pitchart\GitlabHelper\Gitlab\Api;
use Pitchart\GitlabHelper\Gitlab\Model;
use Pitchart\GitlabHelper\Service\GitlabClient;
use Psr\Http\Message\ResponseInterface;

abstract class BaseApi implements Api
{
    /**
     * @var GitlabClient
     */
    protected $client;

    /**
     * @var string
     */
    protected $basePath = '';

    /**
     * BaseApi constructor.
     * @param GitlabClient $client
     */
    public function __construct(GitlabClient $client, $basePath)
    {
        $this->client = $client;
        $this->basePath = $basePath;
    }

    public function get($id) {
        /** @var ResponseInterface $results */
        $response =  $this->client->request('GET', $this->basePath.'/'.$id);
        $datas = \GuzzleHttp\json_decode($response->getBody()->getContents());
        return $this->hydrate((array) $datas);
    }

    /**
     * @param array $arguments
     * @return Collection
     */
    public function all(array $arguments)
    {
        $response =  $this->client->request('GET', $this->basePath, $arguments);
        $datas = \GuzzleHttp\json_decode($response->getBody()->getContents());
        $collection = [];
        foreach ($datas as $data) {
            $collection[] = $this->hydrate((array) $data);
        }
        return new Collection($collection);
    }

    public function post(array $data)
    {
        return $this->client->request('POST', $this->basePath, ['form_params' => $data]);
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    /**
     * @param array $data
     * @return Model
     */
    abstract public function hydrate(array $data);

}
<?php

namespace Pitchart\GitlabHelper\Gitlab\Api;


use Pitchart\Collection\Collection;
use Pitchart\GitlabHelper\Gitlab\Model\Model;
use Pitchart\GitlabHelper\Service\GitlabClient;
use Psr\Http\Message\ResponseInterface;

abstract class BaseApi implements Api
{
    /**
     * @var GitlabClient
     */
    protected $client;

    protected $basePath = '';

    /**
     * BaseApi constructor.
     * @param GitlabClient $client
     */
    public function __construct(GitlabClient $client)
    {
        $this->client = $client;
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

    public function post()
    {
        // TODO: Implement post() method.
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
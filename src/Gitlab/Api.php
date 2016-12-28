<?php

namespace Pitchart\GitlabHelper\Gitlab;

interface Api
{
    public function all(array $arguments);
    /**
     * @param $id
     * @return mixed
     */
    public function get($id);

    /**
     * @param array $data
     * @return mixed
     */
    public function post(array $data);

    public function delete();

    public function update();

}
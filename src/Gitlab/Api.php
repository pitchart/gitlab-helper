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

    public function post();

    public function delete();

    public function update();

}
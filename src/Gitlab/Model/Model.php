<?php

namespace Pitchart\GitlabHelper\Gitlab\Model;


interface Model
{
    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data);

}
<?php

namespace Pitchart\GitlabHelper\Gitlab\Model;


class AccessLevel
{
    /** Guest access */
    const GUEST = 10;

    /** Reporter access */
    const REPORTER = 20;

    /** Developer access */
    const DEVELOPER = 30;

    /** Master access */
    const MASTER = 40;

    /** Owner access */
    const OWNER = 50;

    private $names = [
        self::GUEST => 'Guest',
        self::REPORTER => 'Reporter',
        self::DEVELOPER => 'Developer',
        self::MASTER => 'Master',
        self::OWNER => 'Owner',
    ];

    public function getName($access) {
        if (!isset($this->names[$access])) {
            throw new \InvalidArgumentException('Invalid access level '.$access);
        }
        return $this->names[$access];
    }

}
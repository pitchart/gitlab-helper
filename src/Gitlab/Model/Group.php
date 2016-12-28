<?php

namespace Pitchart\GitlabHelper\Gitlab\Model;

use Pitchart\GitlabHelper as Gh;
use Pitchart\GitlabHelper\Gitlab\Model;

class Group implements Model
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $visibilityLevel;

    /**
     * @var string
     */
    private $avatarUrl;

    /**
     * @var string
     */
    private $webUrl;

    /**
     * @var boolean
     */
    private $requestAccessEnabled;

    /**
     * @var boolean
     */
    private $lfsEnabled;

    /**
     * @var  array
     */
    private $projects;


    /**
     * Group constructor.
     * @param int $id
     * @param string $name
     * @param string $path
     * @param string $description
     */
    public function __construct($id, $name, $path, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->path = $path;
        $this->description = $description;
    }

    /**
     * @param array $data
     * @return Group
     */
    public static function fromArray(array $data) {
        if (!isset($data['id'], $data['name'], $data['path'], $data['description'])) {
            throw new \InvalidArgumentException('Missing at least one key in id, name, path, description');
        }
        $group = new self($data['id'], $data['name'], $data['path'], $data['description']);
        unset($data['id'], $data['name'], $data['path'], $data['description']);

        foreach ($data as $key => $value) {
            $propertyName = Gh\underscoredToLowerCamelCase($key);
            if (!property_exists(self::class, $propertyName)) {
                throw new \InvalidArgumentException('Invalid key '.$key);
            }
            $group->$propertyName = $value;
        }

        return $group;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getVisibilityLevel()
    {
        return $this->visibilityLevel;
    }

    /**
     * @return string
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * @return string
     */
    public function getWebUrl()
    {
        return $this->webUrl;
    }

    /**
     * @return boolean
     */
    public function isRequestAccessEnabled()
    {
        return $this->requestAccessEnabled;
    }

    /**
     * @return array
     */
    public function getProjects()
    {
        return $this->projects;
    }

}
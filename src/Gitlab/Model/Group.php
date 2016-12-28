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
    private $projects = [];


    /**
     * Group constructor.
     * @param int $id
     * @param string $name
     * @param string $path
     * @param string $description
     */
    public function __construct($name, $path)
    {
        $this->name = $name;
        $this->path = $path;
    }

    /**
     * @param array $data
     * @return Group
     */
    public static function fromArray(array $data) {
        if (!isset($data['name'], $data['path'])) {
            throw new \InvalidArgumentException('Missing at least one key in id, name, path, description');
        }
        $group = new self($data['name'], $data['path']);
        unset($data['name'], $data['path']);

        foreach ($data as $key => $value) {
            $propertyName = Gh\underscoredToLowerCamelCase($key);
            if (!property_exists(self::class, $propertyName)) {
                throw new \InvalidArgumentException('Invalid key '.$key);
            }
            if ($propertyName == 'projects' && is_array($value)) {
                $group->$propertyName = [];
                foreach ($value as $projectData) {

                    $group->$propertyName = Project::fromArray($projectData);
                }
            }
            else {
                $group->$propertyName = $value;
            }
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
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getVisibilityLevel()
    {
        return $this->visibilityLevel;
    }

    /**
     * @param int $visibilityLevel
     */
    public function setVisibilityLevel($visibilityLevel)
    {
        $this->visibilityLevel = $visibilityLevel;
        return $this;
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
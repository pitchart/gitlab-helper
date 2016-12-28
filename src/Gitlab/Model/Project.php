<?php

namespace Pitchart\GitlabHelper\Gitlab\Model;

use Pitchart\GitlabHelper as Gh;
use Pitchart\GitlabHelper\Gitlab\Model;

class Project implements Model
{
    /**
     * @var integer
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
     * @var int
     */
    private $namespaceId;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $defaultBranch;

    /**
     * @var array
     */
    private $tagList = [];

    /**
     * @var boolean
     */
    private $archived;

    /**
     * @var string
     */
    private $sshUrlToRepo;

    /**
     * @var string
     */
    private $httpUrlToRepo;

    /**
     * @var string
     */
    private $webUrl;

    /**
     * @var string
     */
    private $nameWithNamespace;

    /**
     * @var string
     */
    private $pathWithNamespace;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var string
     */
    private $lastActivityAt;

    /**
     * @var boolean
     */
    private $lfsEnabled;

    /**
     * @var integer
     */
    private $creatorId;

    /**
     * @var string
     */
    private $namespace;

    /**
     * @var string
     */
    private $avatarUrl;

    /**
     * @var integer
     */
    private $starCount;

    /**
     * @var integer
     */
    private $forksCount;

    /**
     * @var integer
     */
    private $openIssuesCount;

    /**
     * @var array
     */
    private $sharedWithGroups;

    /**
     * @var boolean
     */
    private $issuesEnabled;

    /**
     * @var boolean
     */
    private $mergeRequestsEnabled;

    /**
     * @var boolean
     */
    private $buildsEnabled;

    /**
     * @var boolean
     */
    private $wikiEnabled;

    /**
     * @var boolean
     */
    private $snippetsEnabled;

    /**
     * @var boolean
     */
    private $containerRegistryEnabled;

    /**
     * @var boolean
     */
    private $sharedRunnersEnabled;

    /**
     * @var boolean
     */
    private $public;

    /**
     * @var int
     */
    private $visibilityLevel;

    /**
     * @var string
     */
    private $importUrl;

    /**
     * @var
     */
    private $publicBuilds;

    /**
     * @var boolean
     */
    private $onlyAllowMergeIfBuildSucceeds;

    /**
     * @var boolean
     */
    private $onlyAllowMergeIfAllDiscussionsAreResolved;

    /**
     * @var boolean
     */
    private $lfs_enabled;

    /**
     * @var boolean
     */
    private $requestAccessEnabled;

    /**
     * Project constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }


    public static function fromArray(array $data)
    {
        if (!isset($data['name'])) {
            throw new \InvalidArgumentException('Missing at least one key in id, name, path, description');
        }
        $project = new self($data['name']);
        unset($data['name']);

        foreach ($data as $key => $value) {
            $propertyName = Gh\underscoredToLowerCamelCase($key);
            if (!property_exists(self::class, $propertyName)) {
                throw new \InvalidArgumentException('Invalid key '.$key);
            }
            $project->$propertyName = $value;
        }

        return $project;
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
     * @return int
     */
    public function getNamespaceId()
    {
        return $this->namespaceId;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getDefaultBranch()
    {
        return $this->defaultBranch;
    }

    /**
     * @return array
     */
    public function getTagList()
    {
        return $this->tagList;
    }

    /**
     * @return boolean
     */
    public function isArchived()
    {
        return $this->archived;
    }

    /**
     * @return string
     */
    public function getSshUrlToRepo()
    {
        return $this->sshUrlToRepo;
    }

    /**
     * @return string
     */
    public function getHttpUrlToRepo()
    {
        return $this->httpUrlToRepo;
    }

    /**
     * @return string
     */
    public function getWebUrl()
    {
        return $this->webUrl;
    }

    /**
     * @return string
     */
    public function getNameWithNamespace()
    {
        return $this->nameWithNamespace;
    }

    /**
     * @return string
     */
    public function getPathWithNamespace()
    {
        return $this->pathWithNamespace;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getLastActivityAt()
    {
        return $this->lastActivityAt;
    }

    /**
     * @return int
     */
    public function getCreatorId()
    {
        return $this->creatorId;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @return string
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * @return int
     */
    public function getStarCount()
    {
        return $this->starCount;
    }

    /**
     * @return int
     */
    public function getForksCount()
    {
        return $this->forksCount;
    }

    /**
     * @return int
     */
    public function getOpenIssuesCount()
    {
        return $this->openIssuesCount;
    }

    /**
     * @return array
     */
    public function getSharedWithGroups()
    {
        return $this->sharedWithGroups;
    }

    /**
     * @return boolean
     */
    public function isIssuesEnabled()
    {
        return $this->issuesEnabled;
    }

    /**
     * @return boolean
     */
    public function isMergeRequestsEnabled()
    {
        return $this->mergeRequestsEnabled;
    }

    /**
     * @return boolean
     */
    public function isBuildsEnabled()
    {
        return $this->buildsEnabled;
    }

    /**
     * @return boolean
     */
    public function isWikiEnabled()
    {
        return $this->wikiEnabled;
    }

    /**
     * @return boolean
     */
    public function isSnippetsEnabled()
    {
        return $this->snippetsEnabled;
    }

    /**
     * @return boolean
     */
    public function isContainerRegistryEnabled()
    {
        return $this->containerRegistryEnabled;
    }

    /**
     * @return boolean
     */
    public function isSharedRunnersEnabled()
    {
        return $this->sharedRunnersEnabled;
    }

    /**
     * @return boolean
     */
    public function isPublic()
    {
        return $this->public;
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
    public function getImportUrl()
    {
        return $this->importUrl;
    }

    /**
     * @return mixed
     */
    public function getPublicBuilds()
    {
        return $this->publicBuilds;
    }

    /**
     * @return boolean
     */
    public function isOnlyAllowMergeIfBuildSucceeds()
    {
        return $this->onlyAllowMergeIfBuildSucceeds;
    }

    /**
     * @return boolean
     */
    public function isOnlyAllowMergeIfAllDiscussionsAreResolved()
    {
        return $this->onlyAllowMergeIfAllDiscussionsAreResolved;
    }

    /**
     * @return boolean
     */
    public function isLfsEnabled()
    {
        return $this->lfs_enabled;
    }

    /**
     * @return boolean
     */
    public function isRequestAccessEnabled()
    {
        return $this->requestAccessEnabled;
    }

}
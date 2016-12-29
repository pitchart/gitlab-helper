<?php

namespace Pitchart\GitlabHelper\Gitlab\Model;

use Pitchart\GitlabHelper\Gitlab\Model;
use Pitchart\GitlabHelper as Gh;


class User implements Model
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $avatarUrl;

    /**
     * @var string
     */
    private $webUrl;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var boolean
     */
    private $isAdmin;

    /**
     * @var string
     */
    private $bio;

    /**
     * @var string
     */
    private $location;

    /**
     * @var string
     */
    private $skype;

    /**
     * @var string
     */
    private $linkedin;

    /**
     * @var string
     */
    private $twitter;

    /**
     * @var string
     */
    private $websiteUrl;

    /**
     * @var string
     */
    private $organization;

    /**
     * @var string
     */
    private $lastSignInAt;

    /**
     * @var string
     */
    private $confirmedAt;

    /**
     * @var integer
     */
    private $themeId;

    /**
     * @var integer
     */
    private $colorSchemeId;

    /**
     * @var integer
     */
    private $projectsLimit;

    /**
     * @var string
     */
    private $currentSignInAt;

    /**
     * @var array
     */
    private $identities;

    /**
     * @var boolean
     */
    private $canCreateGroup;

    /**
     * @var boolean
     */
    private $canCreateProject;

    /**
     * @var boolean
     */
    private $twoFactorEnabled;

    /**
     * @var boolean
     */
    private $external;

    /**
     * @var integer
     */
    private $accessLevel;

    /**
     * @var string
     */
    private $expiresAt;

    /**
     * @param array $data
     * @return User
     */
    public static function fromArray(array $data)
    {
        $user = new self;
        foreach ($data as $key => $value) {
            $propertyName = Gh\underscoredToLowerCamelCase($key);
            if (!property_exists(self::class, $propertyName)) {
                throw new \InvalidArgumentException('Invalid key '.$key);
            }
                $user->$propertyName = $value;
        }
        return $user;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
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
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return boolean
     */
    public function isIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * @return string
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @return string
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    /**
     * @return string
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @return string
     */
    public function getLastSignInAt()
    {
        return $this->lastSignInAt;
    }

    /**
     * @return string
     */
    public function getConfirmedAt()
    {
        return $this->confirmedAt;
    }

    /**
     * @return int
     */
    public function getThemeId()
    {
        return $this->themeId;
    }

    /**
     * @return int
     */
    public function getColorSchemeId()
    {
        return $this->colorSchemeId;
    }

    /**
     * @return int
     */
    public function getProjectsLimit()
    {
        return $this->projectsLimit;
    }

    /**
     * @return string
     */
    public function getCurrentSignInAt()
    {
        return $this->currentSignInAt;
    }

    /**
     * @return array
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return boolean
     */
    public function isCanCreateGroup()
    {
        return $this->canCreateGroup;
    }

    /**
     * @return boolean
     */
    public function isCanCreateProject()
    {
        return $this->canCreateProject;
    }

    /**
     * @return boolean
     */
    public function isTwoFactorEnabled()
    {
        return $this->twoFactorEnabled;
    }

    /**
     * @return boolean
     */
    public function isExternal()
    {
        return $this->external;
    }

    /**
     * @return int
     */
    public function getAccessLevel()
    {
        return $this->accessLevel;
    }

    /**
     * @return string
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

}
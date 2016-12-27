<?php

namespace Tests\Pitchart\GitlabHelper\Gitlab\Model;

use Pitchart\GitlabHelper\Gitlab\Model\Group;

class GroupTest extends \PHPUnit_Framework_TestCase
{

    public function testCanBeInstantiated() {
        $group = new Group(3, 'name', 'path', 'description');
        $this->assertInstanceOf(Group::class, $group);
    }

    public function testCanBeCreatedFromMinimumDatas() {
        $group = Group::fromArray([
            'id' => 3,
            'name' => 'name',
            'path' => 'path',
            'description' => 'description',
        ]);
        $this->assertInstanceOf(Group::class, $group);
    }

    /**
     * @param array $incompleteDatas
     * @dataProvider incompleteDataProvider
     */
    public function testCreationFromMissingDatasThrowException(array $incompleteDatas) {
        $this->expectException(\InvalidArgumentException::class);
        Group::fromArray($incompleteDatas);
    }

    public function testCreationFromArrayProperties() {
        $group = Group::fromArray([
            'id' => 3,
            'name' => 'name',
            'path' => 'path',
            'description' => 'description',
            "visibility_level" => 20,
            "avatar_url" => null,
            "web_url" => "https://gitlab.example.com/groups/twitter",
            "request_access_enabled" => false,
        ]);

        $this->assertEquals(3, $group->getId());
        $this->assertEquals('name', $group->getName());
        $this->assertEquals('path', $group->getPath());
        $this->assertEquals('description', $group->getDescription());
        $this->assertEquals(20, $group->getVisibilityLevel());
        $this->assertEquals(null, $group->getAvatarUrl());
        $this->assertEquals("https://gitlab.example.com/groups/twitter", $group->getWebUrl());
        $this->assertEquals(false, $group->isRequestAccessEnabled());

    }

    /**
     * @return array
     */
    public function incompleteDataProvider() {
        return [
            'Missing id' => [['name' => 'name', 'path' => 'path', 'description' => 'description',]],
            'Missing name' => [['id' => 3, 'path' => 'path', 'description' => 'description',]],
            'Missing path' => [['id' => 3, 'name' => 'name', 'description' => 'description',]],
            'Missing description' => [['id' => 3, 'name' => 'name', 'path' => 'path',]],
        ];
    }

}

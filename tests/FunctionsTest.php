<?php

namespace Tests\Pitchart\GitlabHelper;

use Pitchart\GitlabHelper as Gh;

class FunctionsTest extends \PHPUnit_Framework_TestCase
{

    public function testUnderscoredToUpperCamelCaseConversion() {
        $this->assertEquals('RequestAccessEnabled', Gh\underscoredToUpperCamelCase('request_access_enabled'));
    }

    public function testUnderscoredToLowerCamelCaseConversion() {
        $this->assertEquals('requestAccessEnabled', Gh\underscoredToLowerCamelCase('request_access_enabled'));
    }

}
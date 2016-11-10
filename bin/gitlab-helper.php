#!/usr/bin/env php
<?php

require __DIR__.'/../vendor/autoload.php';

use Pitchart\GitlabHelper\Command;
use Symfony\Component\Console\Application;


$application = new Application('PHP-CLI application demo', '@package_version@');
// default command
$defaultCommand = new Command\InformationCommand();
$application->add($defaultCommand);
$application->setDefaultCommand($defaultCommand->getName());


//gitlab commands
$application->add(new Command\Group\ListCommand());
$application->add(new Command\Group\ProjectsCommand());
$application->run();
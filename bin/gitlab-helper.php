#!/usr/bin/env php
<?php

require __DIR__.'/../vendor/autoload.php';

use Pitchart\GitlabHelper\Command;
use Pitchart\GitlabHelper\Application;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

// default command

$parametersFile = getenv('HOME').'/.gitlab-helper.yml';
$application = new Application('Gitlab helper', '@package_version@');

if (!file_exists($parametersFile)) {
    $defaultCommand = new Command\ConfigurationCommand();
    $application->add($defaultCommand);
    $application->setDefaultCommand($defaultCommand->getName());
}
else {

    $container = new ContainerBuilder();
    $loader = new YamlFileLoader($container, new FileLocator(getenv('HOME')));
    $loader->load('.gitlab-helper.yml');

    $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../config/'));
    $loader->load('services.yml');

    $container->compile();

    $application->setContainer($container);

    $defaultCommand = new Command\InformationCommand();
    $application->add($defaultCommand);
    $application->setDefaultCommand($defaultCommand->getName());

    $application->addCommands([
        new Command\SelfUpdateCommand(),
        new Command\ConfigurationCommand(),
        new Command\Group\CreateCommand(),
        new Command\Group\ListCommand(),
        new Command\Group\ProjectsCommand(),
        new Command\Group\MembersCommand(),
        new Command\Group\MembersAddCommand(),
        new Command\Project\ListCommand(),
    ]);
}
$application->run();
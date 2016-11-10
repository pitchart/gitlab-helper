<?php

namespace Pitchart\GitlabHelper\Command\Group;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProjectsCommand extends Command
{
    protected function configure()
    {
        $this->setName('group:projects')
            ->setDescription('List groups from gitlab')
        ;
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}
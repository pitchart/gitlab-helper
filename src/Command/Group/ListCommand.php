<?php

namespace Pitchart\GitlabHelper\Command\Group;

use Pitchart\Collection\Collection;
use Pitchart\GitlabHelper\Service\GitlabClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class ListCommand extends Command implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    protected function configure()
    {
        $this->setName('group:list')
            ->setDescription('List groups from gitlab')
        ;
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var GitlabClient $gitlabClient */
        $gitlabClient = $this->container->get('gitlab_client');

        $response = $gitlabClient->request('GET', 'groups');
        $datas = \GuzzleHttp\json_decode($response->getBody()->getContents());

        $groups = Collection::from($datas);

        $groups->each(function($group) use ($output) {
            $output->writeln(sprintf('<info>%s (/%s)</info>0 : %s', $group->name, $group->path, $group->description));
        });

    }



}
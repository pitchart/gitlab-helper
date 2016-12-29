<?php

namespace Pitchart\GitlabHelper\Command\Group;

use Pitchart\Collection\Collection;
use Pitchart\GitlabHelper\Gitlab\Api\Group as GroupApi;

use Pitchart\GitlabHelper\Gitlab\Model\AccessLevel;
use Pitchart\GitlabHelper\Gitlab\Model\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class MembersCommand extends Command implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    protected function configure()
    {
        $this->setName('group:members')
            ->setDescription('Lists members of a group')
            ->addArgument('group', InputArgument::REQUIRED, 'The group name')
            ->addOption('nb', null, InputOption::VALUE_OPTIONAL, 'Number of items to display', 50)
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var GroupApi $api */
        $api = $this->container->get('gitlab_api_factory')->api('group');

        $members = $api->members($input->getArgument('group'), [
            'query' => [
                'per_page' => $input->getOption('nb'),
            ],
        ]);

        $table = new Table($output);
        $table->setHeaders(['ID', 'Name', 'State', 'Access level'])->setStyle('borderless');

        $accessLevel = new AccessLevel();

        $members->each(function (User $member) use ($table, $accessLevel) {
            $table->addRow(['<comment>'.$member->getId().'</comment>', $member->getName(), $member->getState(), $accessLevel->getName($member->getAccessLevel())]);
        });

        $table->render();
    }
}

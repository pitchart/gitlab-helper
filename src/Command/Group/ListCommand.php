<?php

namespace Pitchart\GitlabHelper\Command\Group;

use Pitchart\Collection\Collection;
use Pitchart\GitlabHelper\Gitlab\Api\Factory;
use Pitchart\GitlabHelper\Gitlab\Api\Group;
use Pitchart\GitlabHelper\Service\GitlabClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class ListCommand extends Command implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    protected function configure()
    {
        $this->setName('group:list')
            ->setDescription('Lists groups from gitlab')
            ->addArgument('search', InputArgument::OPTIONAL, 'Search criteria for project names', '')
            ->addOption('nb', null, InputOption::VALUE_OPTIONAL, 'Number of items to display', 50)
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Factory $gitlabClient */
        $apiFactory = $this->container->get('gitlab_api_factory');

        /** @var Group $api */
        $api = $apiFactory->api('group');

        $groups = $api->all([
            'query' => [
                'search' => $input->getArgument('search'),
                'per_page' => $input->getOption('nb'),
            ],
        ]);

        $table = new Table($output);
        $table->setHeaders(['Name', 'Description', 'Path'])->setStyle('borderless');

        $groups->each(function (\Pitchart\GitlabHelper\Gitlab\Model\Group $group) use ($table) {
            $table->addRow(['<comment>'.$group->getName().'</comment>', $group->getDescription(), $group->getPath()]);
        });

        $table->render();
    }
}

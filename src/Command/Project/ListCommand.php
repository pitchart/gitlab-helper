<?php

namespace Pitchart\GitlabHelper\Command\Project;

use Pitchart\Collection\Collection;
use Pitchart\GitlabHelper\Gitlab\Api\Project as ProjectApi;
use Pitchart\GitlabHelper\Gitlab\Model\Project;
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
        $this->setName('project:list')
            ->setDescription('Lists projects from a gitlab server')
            ->addArgument('search', InputArgument::OPTIONAL, 'Search criteria for project names', '')
            ->addOption('orderby', null, InputOption::VALUE_OPTIONAL, 'Order results by <comment>id</comment>, <comment>name</comment>, <comment>path</comment>, <comment>created_at</comment>, <comment>updated_at</comment> or <comment>last_activity_at</comment>', 'created_ad')
            ->addOption('sort', null, InputOption::VALUE_OPTIONAL, 'Return requests sorted in <comment>asc</comment> or <comment>desc</comment> order. Default is <comment>desc</comment>', 'desc')
            ->addOption('nb', null, InputOption::VALUE_OPTIONAL, 'Number of items to display', 50)
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var ProjectApi $api */
        $api = $this->container->get('gitlab_api_factory')->api('project');

        $projects = $api->all([
            'query' => [
                'search' => $input->getArgument('search'),
                'order_by' => $input->getOption('orderby'),
                'sort' => $input->getOption('sort'),
                'per_page' => $input->getOption('nb'),
            ],
        ]);


        $table = new Table($output);
        $table->setHeaders(array('Name', 'URL'))->setStyle('borderless');

        $projects->each(function (Project $project) use ($table) {
            $table->addRow(array('<comment>'.$project->getNameWithNamespace().'</comment>', $project->getSshUrlToRepo()));
        });

        $table->render();
    }
}

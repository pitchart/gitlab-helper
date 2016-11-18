<?php

namespace Pitchart\GitlabHelper\Command\Group;

use Pitchart\Collection\Collection;
use Pitchart\GitlabHelper\Service\GitlabClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class ProjectsCommand extends Command implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    protected function configure()
    {
        $this->setName('group:projects')
            ->setDescription('List projects from a gitlab group')
            ->addArgument('group', InputArgument::REQUIRED, 'Group name')
            ->addArgument('search', InputArgument::OPTIONAL, 'Search criteria for project names', '')
            ->addOption('orderby', null, InputOption::VALUE_OPTIONAL, 'Order results by <comment>id</comment>, <comment>name</comment>, <comment>path</comment>, <comment>created_at</comment>, <comment>updated_at</comment> or <comment>last_activity_at</comment>')
            ->addOption('sort', null, InputOption::VALUE_OPTIONAL, 'Return requests sorted in <comment>asc</comment> or <comment>desc</comment> order. Default is <comment>desc</comment>')
            ->addOption('nb', null, InputOption::VALUE_OPTIONAL, 'Number of items to display', 50)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var GitlabClient $gitlabClient */
        $gitlabClient = $this->container->get('gitlab_client');

        $response = $gitlabClient->request('GET', sprintf('groups/%s/projects', $input->getArgument('group')), array(
            'query' => [
                'search' => $input->getArgument('search'),
                'per_page' => $input->getOption('nb'),
            ],
        ));
        $datas = \GuzzleHttp\json_decode($response->getBody()->getContents());

        $table = new Table($output);
        $table->setHeaders(array('Name', 'Path'))->setStyle('borderless');
        $projects = Collection::from($datas);

        $projects->each(function($project) use ($table) {
            $table->addRow(array('<comment>'.$project->name_with_namespace.'</comment>', $project->ssh_url_to_repo));
        });

        $table->render();
    }
}
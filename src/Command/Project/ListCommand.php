<?php

namespace Pitchart\GitlabHelper\Command\Project;

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

class ListCommand extends Command implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    protected function configure()
    {
        $this->setName('project:list')
            ->setDescription('List projects from a gitlab server')
            ->addArgument('search', InputArgument::OPTIONAL, 'Search criteria for project names', '')
            ->addOption('orderby', null, InputOption::VALUE_OPTIONAL, 'Order results by <comment>id</comment>, <comment>name</comment>, <comment>path</comment>, <comment>created_at</comment>, <comment>updated_at</comment> or <comment>last_activity_at</comment>', 'created_ad')
            ->addOption('sort', null, InputOption::VALUE_OPTIONAL, 'Return requests sorted in <comment>asc</comment> or <comment>desc</comment> order. Default is <comment>desc</comment>', 'desc')
        ;
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var GitlabClient $gitlabClient */
        $gitlabClient = $this->container->get('gitlab_client');

        $response = $gitlabClient->request('GET', 'projects', array(
            'query' => [
                'search' => $input->getArgument('search'),
                'order_by' => $input->getOption('orderby'),
                'sort' => $input->getOption('sort')
            ],
        ));
        $datas = \GuzzleHttp\json_decode($response->getBody()->getContents());

        $table = new Table($output);
        $table->setHeaders(array('Name', 'URL'))->setStyle('borderless');

        $projects = Collection::from($datas);

        $projects->each(function($project) use ($table) {
            $table->addRow(array('<comment>'.$project->name_with_namespace.'</comment>', $project->ssh_url_to_repo));
        });
        $table->render();
    }



}
<?php

namespace Pitchart\GitlabHelper\Command\Group;

use Pitchart\Collection\Collection;
use Pitchart\GitlabHelper\Gitlab\Api\Factory;
use Pitchart\GitlabHelper\Gitlab\Api\Group;
use Pitchart\GitlabHelper\Gitlab\Model\Project;
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
            ->setDescription('Lists projects from a gitlab group')
            ->addArgument('group', InputArgument::REQUIRED, 'Group name')
            ->addArgument('search', InputArgument::OPTIONAL, 'Search criteria for project names', '')
            ->addOption('orderby', null, InputOption::VALUE_OPTIONAL, 'Order results by <comment>id</comment>, <comment>name</comment>, <comment>path</comment>, <comment>created_at</comment>, <comment>updated_at</comment> or <comment>last_activity_at</comment>')
            ->addOption('sort', null, InputOption::VALUE_OPTIONAL, 'Return requests sorted in <comment>asc</comment> or <comment>desc</comment> order. Default is <comment>desc</comment>')
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

        $search = $input->getArgument('search');

        $projects = $api->projects($input->getArgument('group'), [
            'query' => [
                'search' => $search,
                'per_page' => $input->getOption('nb'),
            ],
        ]);

        $table = new Table($output);
        $table->setHeaders(['Name', 'Path', 'Tags'])->setStyle('borderless');

        if ($search) {
            $patterns = array_map(function($keyword) {
                return preg_quote($keyword, '/');
            }, explode(' ', $search));
            $projects = $projects->filter(function(Project $project) use ($patterns) {
                $content = $project->getNameWithNamespace().' '.$project->getDescription().' '.$project->getPath().''.implode(' ', $project->getTagList());
                return (boolean) preg_match(sprintf('/(%s)/i', implode('|', $patterns)), $content);
            });
        }

        $projects->each(function (Project $project) use ($table) {
            $table->addRow(['<comment>'.$project->getNameWithNamespace().'</comment>', $project->getSshUrlToRepo(), implode(', ', $project->getTagList())]);
        });

        $table->render();
    }
}

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


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var GitlabClient $gitlabClient */
        $gitlabClient = $this->container->get('gitlab_client');

        $response = $gitlabClient->request('GET', 'groups', array(
            'query' => [
                'search' => $input->getArgument('search'),
                'per_page' => $input->getOption('nb'),
            ],
        ));
        $datas = \GuzzleHttp\json_decode($response->getBody()->getContents());

        $groups = Collection::from($datas);

        $table = new Table($output);
        $table->setHeaders(array('Name', 'Description', 'Path'))->setStyle('borderless');

        $groups->each(function ($group) use ($table) {
            $table->addRow(array('<comment>'.$group->name.'</comment>', $group->description, $group->path));
        });

        $table->render();
    }
}

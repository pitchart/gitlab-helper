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
        /** @var GitlabClient $gitlabClient */
        $gitlabClient = $this->container->get('gitlab_client');

        $response = $gitlabClient->request('GET', sprintf('groups/%s/members', $input->getArgument('group')), array(
            'query' => [
                'per_page' => $input->getOption('nb'),
            ],
        ));
        $datas = \GuzzleHttp\json_decode($response->getBody()->getContents());

        $members = Collection::from($datas);

        $table = new Table($output);
        $table->setHeaders(array('ID', 'Name', 'State'))->setStyle('borderless');

        $members->each(function ($member) use ($table) {
            $table->addRow(array('<comment>'.$member->id.'</comment>', $member->name, $member->state));
        });

        $table->render();
    }
}

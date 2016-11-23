<?php

namespace Pitchart\GitlabHelper\Command\Key;

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
        $this->setName('key:list')
            ->setDescription('Lists ssh keys from current user')
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

        $response = $gitlabClient->request('GET', 'user/keys');
        $datas = \GuzzleHttp\json_decode($response->getBody()->getContents());

        $table = new Table($output);
        $table->setHeaders(array('Title', 'Key'))->setStyle('borderless');
        $table->setColumnWidths([0, 60]);
        $keys = Collection::from($datas);

        $keys->each(function ($key) use ($table) {
            $table->addRow(array('<comment>'.$key->title.'</comment>', $key->key));
        });

        $table->render();
    }
}
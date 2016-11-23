<?php

namespace Pitchart\GitlabHelper\Command\Group;

use GuzzleHttp\Exception\ClientException;
use Pitchart\GitlabHelper\Service\GitlabClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class CreateCommand extends Command implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    protected function configure()
    {
        $this->setName('group:create')
            ->setDescription('Creates a new gitlab group')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the group')
            ->addArgument('path', InputArgument::REQUIRED, 'The path of the group')
            ->addOption('desc', null, InputOption::VALUE_OPTIONAL, 'The description of the group', '')
            ->addOption('level', null, InputOption::VALUE_OPTIONAL, 'Visibility level : 0 for private, 10 for internal, 20 for public.', 0)
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

        if (!in_array($input->getOption('level'), [0, 10, 20])) {
            throw new \InvalidArgumentException('The visibility level must be a value in [0, 10, 20]');
        }

        try {
            $response = $gitlabClient->request('POST', 'groups', array(
                'form_params' => [
                    'name' => $input->getArgument('name'),
                    'path' => $input->getArgument('path'),
                    'desc' => $input->getOption('desc'),
                    'level' => (int) $input->getOption('level'),
                ],
            ));

            if ($response->getStatusCode() == 201) {
                $output->writeln(sprintf('<info>The group "%s" was created successfully.</info>', $input->getArgument('name')));
            }
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $output->writeln(sprintf('<error>Could not create group "%s :".</error>', $input->getArgument('name')));
            $output->writeln('<error>'.$response->getBody()->getContents().'</error>');
        }
    }
}

<?php

namespace Pitchart\GitlabHelper\Command\Key;

use GuzzleHttp\Exception\ClientException;
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
use Symfony\Component\Filesystem\Exception\FileNotFoundException;


class AddCommand extends Command implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    protected function configure()
    {
        $this->setName('key:add')
            ->setDescription('Adds a ssh key for current user')
            ->addArgument('title', InputArgument::REQUIRED, 'The title of the new ssh key')
            ->addArgument('path', InputArgument::REQUIRED, 'The path of the new ssh key to add')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var GitlabClient $gitlabClient */
        $gitlabClient = $this->container->get('gitlab_client');

        $realPath = realpath($input->getArgument('path'));
        if (!file_exists($realPath)) {
            throw new FileNotFoundException('Could not find file '.$realPath);
        }

        $key = file_get_contents($realPath);

        try {
            $response = $gitlabClient->request('POST', 'user/keys', [
                'form_params' => [
                    'title' => $input->getArgument('title'),
                    'key' => $key,
                ],
            ]);
            if ($response->getStatusCode() == 201) {
                $output->writeln(sprintf('<info>The key "%s" was created successfully.</info>', $input->getArgument('title')));
            }
        }
        catch (ClientException $e) {
            $response = $e->getResponse();
            $output->writeln(sprintf('<error>Could not add key "%s :".</error>', $input->getArgument('title')));
            $output->writeln('<error>'.$response->getBody()->getContents().'</error>');
        }

    }
}
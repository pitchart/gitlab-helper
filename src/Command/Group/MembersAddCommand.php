<?php

namespace Pitchart\GitlabHelper\Command\Group;

use GuzzleHttp\Exception\ClientException;
use Pitchart\Collection\Collection;
use Pitchart\GitlabHelper\Service\GitlabClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class MembersAddCommand extends Command implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    protected function configure()
    {
        $this->setName('group:members:add')
            ->setDescription('Add members to a group')
            ->addArgument('group', InputArgument::REQUIRED, 'The group name')
            ->addArgument('emails', InputArgument::REQUIRED|InputArgument::IS_ARRAY, 'A list of user emails')
            ->addOption('level', null, InputOption::VALUE_OPTIONAL, 'An access level in [10, 20, 30, 40, 50]', 40)
        ;
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var GitlabClient $gitlabClient */
        $gitlabClient = $this->container->get('gitlab_client');
        $emails = Collection::from($input->getArgument('emails'));

        $emails->each(function ($email) use ($gitlabClient, $input, $output) {
            try {
                $response = $gitlabClient->request('GET', 'users', array(
                    'query' => [
                        'search' => $email,
                    ],
                ));
                $datas = \GuzzleHttp\json_decode($response->getBody()->getContents());
                if (count($datas) == 1) {
                    $user = $datas[0];
                    try {
                        $response = $gitlabClient->request('POST', sprintf('groups/%s/members', $input->getArgument('group')), array(
                            'form_params' => [
                                'id' => $input->getArgument('group'),
                                'user_id' => $user->id,
                                'access_level' => $input->getOption('level'),
                            ],
                        ));
                        $output->writeln(sprintf("<info>\u{2713} </info> ".'User <info>%s</info> added to group <info>%s</info>', $email, $input->getArgument('group')));
                    } catch (ClientException $e) {
                        $response = \GuzzleHttp\json_decode($e->getResponse()->getBody()->getContents());
                        $output->writeln(sprintf("<error>\u{2A2F} ".'Could not add user %s to group %s : %s</error>', $email, $input->getArgument('group'), $response->message));
                    }
                }
            } catch (ClientException $e) {
                $output->writeln(sprintf('<error>Could not find user for email %s</error>', $email));
            }
        });
    }
}

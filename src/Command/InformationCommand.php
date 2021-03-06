<?php

namespace Pitchart\GitlabHelper\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InformationCommand extends Command
{

    protected function configure()
    {
        $this->setName('info')->setDescription('Displays information about application');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(<<<'EOF'
<info>
 ██████╗ ██╗████████╗██╗      █████╗ ██████╗     ██╗  ██╗███████╗██╗     ██████╗ ███████╗██████╗   FTW
██╔════╝ ██║╚══██╔══╝██║     ██╔══██╗██╔══██╗    ██║  ██║██╔════╝██║     ██╔══██╗██╔════╝██╔══██╗
██║  ███╗██║   ██║   ██║     ███████║██████╔╝    ███████║█████╗  ██║     ██████╔╝█████╗  ██████╔╝
██║   ██║██║   ██║   ██║     ██╔══██║██╔══██╗    ██╔══██║██╔══╝  ██║     ██╔═══╝ ██╔══╝  ██╔══██╗
╚██████╔╝██║   ██║   ███████╗██║  ██║██████╔╝    ██║  ██║███████╗███████╗██║     ███████╗██║  ██║
 ╚═════╝ ╚═╝   ╚═╝   ╚══════╝╚═╝  ╚═╝╚═════╝     ╚═╝  ╚═╝╚══════╝╚══════╝╚═╝     ╚══════╝╚═╝  ╚═╝
</info>
EOF
        );
        $this->getApplication()->find('list')->run($input, $output);
    }
}

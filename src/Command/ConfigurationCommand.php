<?php

namespace Pitchart\GitlabHelper\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Yaml;

class ConfigurationCommand extends Command
{
    protected function configure()
    {
        $this->setName('config')->setDescription('Defines application settings');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $yamlParser = new Parser();
        $expectedValues = $yamlParser->parse(file_get_contents(dirname(__FILE__).'/../../config/parameters.yml.dist'));
        $output->writeln("<info>Configuration des accès à gitlab</info>\n");


        /** @var QuestionHelper $questionHelper */
        $questionHelper = $this->getHelper('question');

        $actualValues = array();

        foreach ($expectedValues['parameters'] as $name => $parameter) {
            $question = new Question(sprintf('<comment>%s</comment> : ', $name), $parameter);
            $actualValues[$name] = $questionHelper->ask($input, $output, $question);
        }

        file_put_contents(getenv('HOME').'/.gitlab-helper.yml', "# This file is auto-generated during the composer install\n".Yaml::dump(array('parameters' => $actualValues)));
    }
}

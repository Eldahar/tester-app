<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use AppBundle\Registry\TestHandlerRegistry;

class TestCommand extends Command {
    const ARG_TYPE = 'type';

    /**
     * @var TestHandlerRegistry
     */
    protected $registry;

    /**
     * @param TestHandlerRegistry $registry
     */
    public function setRegistry($registry) {
        $this->registry = $registry;
    }

    protected function configure() {
        $this->setName('test:run');
        $this->addArgument(self::ARG_TYPE, InputArgument::REQUIRED, 'A teszt típusa');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $testType = $input->getArgument(self::ARG_TYPE);
        $testHandler = $this->registry->getHandlerByType($testType);
        $testHandler->test($output);
    }
}
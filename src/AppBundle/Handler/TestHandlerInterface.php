<?php

namespace AppBundle\Handler;

use Symfony\Component\Console\Output\OutputInterface;

interface TestHandlerInterface {
    public function test(OutputInterface $output);
}
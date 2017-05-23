<?php

namespace AppBundle\Handler;

use Symfony\Component\Console\Output\OutputInterface;

class SeqIOWriteTestHandler implements TestHandlerInterface {
    protected $min = 0;
    protected $max = 9;
    protected $count = 10000000;
    
    public function test(OutputInterface $output) {
        $output->writeln(sprintf("Test start: %s, %s", self::class, date('Y-m-d H:i:s')));
        $file = new \SplFileObject('test.io', 'w');
        for($n=0; $n < $this->count ; $n++) {
            $file->fwrite(mt_rand($this->min, $this->max));
        }
        $file = NULL;
        $output->writeln(sprintf("Test end: %s, %s", self::class, date('Y-m-d H:i:s')));
    }
}
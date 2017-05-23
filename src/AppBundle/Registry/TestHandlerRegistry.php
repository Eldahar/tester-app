<?php

namespace AppBundle\Registry;

use AppBundle\Handler\TestHandlerInterface;

class TestHandlerRegistry {
    /**
     * @var TestHandlerInterface[]
     */
    protected $registry;

    /**
     * @param TestHandlerInterface $handler
     * @param string $type
     */
    public function addHandler(TestHandlerInterface $handler, $type) {
        $this->registry[$type] = $handler;
    }

    /**
     * @param string $type
     * 
     * @return TestHandlerInterface
     */
    public function getHandlerByType($type) {
        return $this->registry[$type];
    }
}
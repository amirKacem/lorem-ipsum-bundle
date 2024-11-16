<?php

namespace KnpU\LoremIpsumBundle\Tests\Functional;

use KnpU\LoremIpsumBundle\KnpUIpsum;
use KnpU\LoremIpsumBundle\Tests\Util\KnpKernel;
use PHPUnit\Framework\TestCase;

class FunctionalTest extends TestCase 
{

    public function testServiceWiring() {

        $kernel = new KnpKernel();
        $kernel->boot();

        $container = $kernel->getContainer();

        $ipsum = $container->get('knpu_lorem_ipsum.knpu_ipsum');
        $this->assertInstanceOf(KnpUIpsum::class,$ipsum);
        $this->assertIsString($ipsum->getParagraphs());
    }



}
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

    public function testServiceWiringWithConfiguration() {

        $kernel = new KnpKernel([
            'word_provider' => 'stub_word_list'
        ]);
        $kernel->boot();

        $container = $kernel->getContainer();

        $ipsum = $container->get('knpu_lorem_ipsum.knpu_ipsum');

        $this->assertStringContainsString('stub2',$ipsum->getWords(2));


    }


}
<?php

namespace KnpU\LoremIpsumBundle\Tests\Functional;

use PHPUnit\Framework\TestCase;
use KnpU\LoremIpsumBundle\Tests\Util\KnpControllerKernel;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;

class IpsumControllerTest extends TestCase
{
    public function testIndex() 
    {
        $kernel = new KnpControllerKernel();

        $client = new KernelBrowser($kernel);
        $client->request('GET','/api/');
        
        $this->assertSame(200,$client->getResponse()->getStatusCode());

    }
}
<?php

namespace KnpU\LoremIpsumBundle\Tests\Util;

use KnpU\LoremIpsumBundle\KnpULoremIpsumBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as HttpKernel;

class KnpKernel extends HttpKernel {



    public function __construct()
    {   
        parent::__construct('test', true);
    }

    public function registerBundles()
    {
        return [
            new KnpULoremIpsumBundle()

        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(function(ContainerBuilder $container) {
            $container->register('stub_word_list', StubWordList::class)
                      ->addTag('knpu_ipsum_word_provider');
        });
    }

    public function getCacheDir() {
        return __DIR__.'/../../var/cache/'.spl_object_hash($this);
    }


} 
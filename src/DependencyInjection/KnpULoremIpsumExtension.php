<?php

declare(strict_types=1);

namespace KnpU\LoremIpsumBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class KnpULoremIpsumExtension  extends Extension
{

    public function load(array $configs, ContainerBuilder $container) {
        $laoder = new PhpFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/'));
        $laoder->load('services.php');

        $configuration = $this->getConfiguration($configs,$container);
        $config = $this->processConfiguration($configuration,$configs);
        $defintion = $container->getDefinition('knpu_lorem_ipsum.knpu_ipsum');

        if(null !== $config['word_provider']) {
            $container->setAlias('knpu_lorem_ipsum.word_provider',$config['word_provider']);
            //$defintion->setArgument(0, new Reference($config['word_provider']));
        }
        $defintion->setArgument(1, $config['unicorns_are_real']);
        $defintion->setArgument(2, $config['min_sunshine']);
        
    }

    public function getAlias() {
        return 'knpu_lorem_ipsum';
    }


}
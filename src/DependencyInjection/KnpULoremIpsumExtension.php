<?php

declare(strict_types=1);

namespace KnpU\LoremIpsumBundle\DependencyInjection;

use KnpU\LoremIpsumBundle\KnpWordProviderInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class KnpULoremIpsumExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $laoder = new PhpFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/'));
        $laoder->load('services.php');

        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);
        $defintion = $container->getDefinition('knpu_lorem_ipsum.knpu_ipsum');
        $defintion->setArgument(1, $config['unicorns_are_real']);
        $defintion->setArgument(2, $config['min_sunshine']);

        $container->registerForAutoconfiguration(KnpWordProviderInterface::class)
                  ->addTag('knpu_ipsum_word_provider');
    }

    public function getAlias()
    {
        return 'knpu_lorem_ipsum';
    }
}

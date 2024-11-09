<?php

use KnpU\LoremIpsumBundle\KnpUIpsum;
use KnpU\LoremIpsumBundle\KnpUWordProvider;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

use function Symfony\Component\DependencyInjection\Loader\Configurator\ref;

return static function (ContainerConfigurator $container) {

    $services = $container->services();
    $services
              ->set('knpu_lorem_ipsum.knpu_ipsum',KnpUIpsum::class)
              ->arg('$wordProvider',ref('knpu_lorem_ipsum.word_provider'))
              ->alias(KnpUIpsum::class,'knpu_lorem_ipsum.knpu_ipsum')
              ->set('knpu_lorem_ipsum.knpu_word_provider',KnpUWordProvider::class)
              ->alias(KnpUWordProvider::class,'knpu_lorem_ipsum.word_provider');
 
};
<?php

use KnpU\LoremIpsumBundle\Controller\IpsumApiController;
use KnpU\LoremIpsumBundle\KnpUIpsum;
use KnpU\LoremIpsumBundle\KnpUWordProvider;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

use function Symfony\Component\DependencyInjection\Loader\Configurator\ref;
use function Symfony\Component\DependencyInjection\Loader\Configurator\tagged_iterator;

return static function (ContainerConfigurator $container) {

    $services = $container->services();
    $services
              ->set('knpu_lorem_ipsum.knpu_ipsum',KnpUIpsum::class)
              ->arg(0,tagged_iterator('knpu_ipsum_word_provider'))
              ->alias(KnpUIpsum::class,'knpu_lorem_ipsum.knpu_ipsum')
              ->set('knpu_lorem_ipsum.knpu_word_provider',KnpUWordProvider::class)
              ->tag('knpu_ipsum_word_provider')
              ->alias('knpu_lorem_ipsum.word_provider','knpu_lorem_ipsum.knpu_word_provider')
              ->set(IpsumApiController::class)
              ->arg(0, ref(KnpUIpsum::class))
              ->arg(1, ref('event_dispatcher')->nullOnInvalid())
              ->public();
};
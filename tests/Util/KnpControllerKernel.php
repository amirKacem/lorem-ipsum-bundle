<?php

namespace KnpU\LoremIpsumBundle\Tests\Util;

use KnpU\LoremIpsumBundle\KnpULoremIpsumBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as HttpKernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class KnpControllerKernel extends HttpKernel 
{

    use MicroKernelTrait;

    public function __construct()
    {   
        parent::__construct('test', true);

    }

    public function registerBundles()
    {
        return [
            new KnpULoremIpsumBundle(),
            new FrameworkBundle()
        ];
    }

    public function configureContainer(ContainerBuilder $c, LoaderInterface $loader) 
    {
        $c->loadFromExtension('framework',[
            'secret' => 'test',
            'error_controller' => 'test'
        ]);
    }

    protected function configureRoutes(RouteCollectionBuilder $routes) 
    {    
        $routes->import(__DIR__.'/../../src/Resources/config/routes.xml','/api'); 
    }

} 
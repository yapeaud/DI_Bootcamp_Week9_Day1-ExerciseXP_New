<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;

class GreetingService
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function greet($name)
    {
        $greeting = $this->container->get('App\Service\GreetingService');
        return $greeting->greet($name);
    }

}


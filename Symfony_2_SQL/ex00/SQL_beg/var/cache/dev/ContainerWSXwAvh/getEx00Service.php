<?php

namespace ContainerWSXwAvh;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getEx00Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\ex00\Controller\ex00' shared autowired service.
     *
     * @return \App\ex00\Controller\ex00
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/ex00/Controller/ex00.php';

        return $container->services['App\\ex00\\Controller\\ex00'] = new \App\ex00\Controller\ex00();
    }
}

<?php

namespace Container1r7vy1c;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getEx01buildService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.NwmT2jN.App\ex01\ex01::build()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.NwmT2jN.App\\ex01\\ex01::build()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'container' => ['privates', '.errored..service_locator.NwmT2jN.Symfony\\Component\\DependencyInjection\\ContainerBuilder', NULL, 'Cannot autowire service ".service_locator.NwmT2jN": it references class "Symfony\\Component\\DependencyInjection\\ContainerBuilder" but no such service exists.'],
        ], [
            'container' => 'Symfony\\Component\\DependencyInjection\\ContainerBuilder',
        ]))->withContext('App\\ex01\\ex01::build()', $container);
    }
}

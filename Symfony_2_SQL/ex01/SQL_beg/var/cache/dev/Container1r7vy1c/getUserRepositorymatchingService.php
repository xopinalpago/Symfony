<?php

namespace Container1r7vy1c;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserRepositorymatchingService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.tWJk8w6.App\Repository\UserRepository::matching()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.tWJk8w6.App\\Repository\\UserRepository::matching()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'criteria' => ['privates', '.errored..service_locator.tWJk8w6.Doctrine\\Common\\Collections\\Criteria', NULL, 'Cannot autowire service ".service_locator.tWJk8w6": it references class "Doctrine\\Common\\Collections\\Criteria" but no such service exists.'],
        ], [
            'criteria' => 'Doctrine\\Common\\Collections\\Criteria',
        ]))->withContext('App\\Repository\\UserRepository::matching()', $container);
    }
}

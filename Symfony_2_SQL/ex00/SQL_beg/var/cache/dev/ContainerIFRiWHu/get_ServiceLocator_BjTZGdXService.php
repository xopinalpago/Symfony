<?php

namespace ContainerIFRiWHu;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_BjTZGdXService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.bjTZGdX' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.bjTZGdX'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.4wc4Ag1.kernel::registerContainerConfiguration()', 'get_ServiceLocator_4wc4Ag1_KernelregisterContainerConfigurationService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.4wc4Ag1.kernel::registerContainerConfiguration()', 'get_ServiceLocator_4wc4Ag1_KernelregisterContainerConfigurationService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.4wc4Ag1.kernel::loadRoutes()', 'get_ServiceLocator_4wc4Ag1_KernelloadRoutesService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.4wc4Ag1.kernel::loadRoutes()', 'get_ServiceLocator_4wc4Ag1_KernelloadRoutesService', true],
            'App\\ex00\\ex00::build' => ['privates', '.service_locator.NwmT2jN.App\\ex00\\ex00::build()', 'getEx00buildService', true],
            'App\\ex00\\ex00::registerCommands' => ['privates', '.service_locator.JxCcp1M.App\\ex00\\ex00::registerCommands()', 'getEx00registerCommandsService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.4wc4Ag1.kernel::registerContainerConfiguration()', 'get_ServiceLocator_4wc4Ag1_KernelregisterContainerConfigurationService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.4wc4Ag1.kernel::loadRoutes()', 'get_ServiceLocator_4wc4Ag1_KernelloadRoutesService', true],
            'App\\ex00\\ex00:build' => ['privates', '.service_locator.NwmT2jN.App\\ex00\\ex00::build()', 'getEx00buildService', true],
            'App\\ex00\\ex00:registerCommands' => ['privates', '.service_locator.JxCcp1M.App\\ex00\\ex00::registerCommands()', 'getEx00registerCommandsService', true],
        ], [
            'kernel::registerContainerConfiguration' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\ex00\\ex00::build' => '?',
            'App\\ex00\\ex00::registerCommands' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:loadRoutes' => '?',
            'App\\ex00\\ex00:build' => '?',
            'App\\ex00\\ex00:registerCommands' => '?',
        ]);
    }
}
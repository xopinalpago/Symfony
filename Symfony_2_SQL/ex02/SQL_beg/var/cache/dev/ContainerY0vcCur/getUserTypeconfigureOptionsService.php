<?php

namespace ContainerY0vcCur;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserTypeconfigureOptionsService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.CDiLWep.App\ex02\Form\UserType::configureOptions()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.CDiLWep.App\\ex02\\Form\\UserType::configureOptions()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'resolver' => ['privates', '.errored..service_locator.CDiLWep.Symfony\\Component\\OptionsResolver\\OptionsResolver', NULL, 'Cannot autowire service ".service_locator.CDiLWep": it references class "Symfony\\Component\\OptionsResolver\\OptionsResolver" but no such service exists.'],
        ], [
            'resolver' => 'Symfony\\Component\\OptionsResolver\\OptionsResolver',
        ]))->withContext('App\\ex02\\Form\\UserType::configureOptions()', $container);
    }
}

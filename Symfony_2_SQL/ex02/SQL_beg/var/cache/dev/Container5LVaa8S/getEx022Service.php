<?php

namespace Container5LVaa8S;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getEx022Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\ex02\ex02' shared autowired service.
     *
     * @return \App\ex02\ex02
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-kernel/Bundle/BundleInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-kernel/Bundle/Bundle.php';
        include_once \dirname(__DIR__, 4).'/src/ex02/ex02.php';

        return $container->services['App\\ex02\\ex02'] = new \App\ex02\ex02();
    }
}

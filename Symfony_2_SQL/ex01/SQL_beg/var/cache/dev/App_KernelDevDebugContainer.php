<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerO6k3yqM\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerO6k3yqM/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerO6k3yqM.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerO6k3yqM\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerO6k3yqM\App_KernelDevDebugContainer([
    'container.build_hash' => 'O6k3yqM',
    'container.build_id' => '118c9f33',
    'container.build_time' => 1721311331,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerO6k3yqM');
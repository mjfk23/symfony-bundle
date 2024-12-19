<?php

declare(strict_types=1);

namespace Symfony\Component\HttpKernel\Bundle;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

trait MicroBundleExtensionTrait
{
    public function load(
        array $configs,
        ContainerBuilder $container
    ): void {
        $dir = dirname((new \ReflectionObject($this))->getFileName(), 2);

        $loader = new YamlFileLoader(
            $container,
            new FileLocator($dir . '/Resources/config')
        );

        $loader->load('services.yaml');
    }
}

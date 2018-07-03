<?php

namespace Optimax\HealthCheckBundle\DependencyInjection;

use Optimax\HealthCheckBundle\DependencyInjection\Compiler\HealthServicesPath;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class OptimaxTemplateProcessorClientExtension
 * @package Optimax\HealthCheckBundle\DependencyInjection
 * @codeCoverageIgnore
 */
class OptimaxTemplateProcessorClientExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);

        $container->addCompilerPass(new HealthServicesPath());

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');
    }
}

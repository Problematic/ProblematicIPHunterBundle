<?php

namespace Problematic\IPHunterBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class ProblematicIPHunterExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('problematic_ip_hunter.model_manager_name', $config['model_manager_name']);
        $container->setParameter('problematic_ip_hunter.model.log.class', $config['model']['class']['log']);

    }

}

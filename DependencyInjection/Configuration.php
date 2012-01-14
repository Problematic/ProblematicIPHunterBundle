<?php

namespace Problematic\IPHunterBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();
        $builder->root('problematic_ip_hunter', 'array')
            ->children()

                ->scalarNode('model_manager_name')->defaultNull()->end()

                ->arrayNode('model')->isRequired()
                    ->children()
                        ->arrayNode('class')->isRequired()
                            ->children()
                                ->scalarNode('log')->isRequired()->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end()
        ;

        return $builder;
    }

}

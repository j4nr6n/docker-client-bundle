<?php

namespace j4nr6n\DockerClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('j4nr6n_docker_client');

        /**
         * @noinspection NullPointerExceptionInspection
         * @psalm-suppress PossiblyUndefinedMethod
         * @psalm-suppress MixedMethodCall
         */
        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('engine_url')->defaultValue('http://localhost')->end()
                ->scalarNode('interface')->defaultValue('/var/run/docker.sock')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

<?php

namespace j4nr6n\DockerClientBundle\DependencyInjection;

use j4nr6n\DockerClient\Client;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class J4nr6nDockerClientExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../../config')
        );
        $loader->load('services.yaml');

        $container->getDefinition(Client::class)
            ->setArguments([$config['engine_url'], $config['interface']])
            ->addMethodCall('setHttpClient', [new Reference(HttpClientInterface::class)])
            ->addMethodCall('setSerializer', [new Reference(SerializerInterface::class)]);
    }
}

<?php

namespace Pitchart\GitlabHelper\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ApiCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        // always first check if the primary service is defined
        if (!$container->has('gitlab_api_factory')) {
            return;
        }

        $definition = $container->findDefinition('gitlab_api_factory');

        // find all service IDs with the app.mail_transport tag
        $taggedServices = $container->findTaggedServiceIds('gitlab_api');

        foreach ($taggedServices as $id => $tags) {
            foreach ($tags as $attributes) {
                $definition->addMethodCall('addApi', [
                    new Reference($id),
                    $attributes['alias']
                ]);
            }
        }
    }

}
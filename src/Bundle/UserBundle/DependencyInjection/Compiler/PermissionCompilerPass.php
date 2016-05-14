<?php

namespace Bundle\UserBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * Compiles the permission hierarchy.
 */
class PermissionCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('userbundle_user.user.permission_builder')) {
            return;
        }

        $definition = $container->getDefinition('userbundle_user.user.permission_builder');
        $taggedServices = $container->findTaggedServiceIds('userbundle_user.user.permission_provider');

        foreach ($taggedServices as $id => $tagAttributes) {
            foreach ($tagAttributes as $attributes) {
                $definition->addMethodCall(
                    'addProvider',
                    array(new Reference($id), $attributes["alias"])
                );
            }
        }
    }
}
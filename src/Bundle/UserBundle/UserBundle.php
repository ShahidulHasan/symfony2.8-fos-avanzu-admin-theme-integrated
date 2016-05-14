<?php

namespace Bundle\UserBundle;

use Bundle\UserBundle\DependencyInjection\Compiler\PermissionCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class UserBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new PermissionCompilerPass());
    }

    public function getParent()
    {
        return 'FOSUserBundle';
    }
}

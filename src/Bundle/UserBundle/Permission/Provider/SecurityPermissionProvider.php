<?php

namespace Bundle\UserBundle\Permission\Provider;

class SecurityPermissionProvider implements ProviderInterface
{
    public function getPermissions()
    {
        return array(
            'USER' => array('ROLE_USER','ROLE_ADMIN'),
            'ROLE_SUPER_ADMIN' => array('ROLE_SUPER_ADMIN')
        );
    }
}
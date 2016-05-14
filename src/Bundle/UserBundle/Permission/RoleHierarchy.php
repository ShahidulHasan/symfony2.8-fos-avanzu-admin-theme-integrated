<?php

namespace Bundle\UserBundle\Permission;

use Symfony\Component\Security\Core\Role\RoleHierarchy as BaseRoleHierarchy;

class RoleHierarchy extends BaseRoleHierarchy
{
    public function __construct(array $hierarchy, PermissionBuilder $permissionBuilder)
    {
        parent::__construct($permissionBuilder->getPermissionHierarchy());
    }
} 
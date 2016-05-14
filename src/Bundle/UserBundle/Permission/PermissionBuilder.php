<?php

namespace Bundle\UserBundle\Permission;

use Bundle\UserBundle\Permission\Provider\ProviderInterface;

class PermissionBuilder 
{
    protected $providers;

    public function __construct()
    {
        $this->providers = array();
    }

    public function addProvider(ProviderInterface $provider, $alias)
    {
        $this->providers[$alias] = $provider;
    }

    public function getPermissionHierarchy()
    {
        $hierarchy = array();

        foreach ($this->providers as $alias => $provider) {

            $permissions = $provider->getPermissions();

            foreach ($permissions as $permission => $children) {
                if (!empty($children)) {
                    $hierarchy[$permission] = $children;
                }
            }
        }

        $allPermissions = array_keys($hierarchy);
        $hierarchy['ROLE_SUPER_ADMIN'] = $allPermissions;

        return $hierarchy;
    }

    public function getPermissionHierarchyForChoiceField()
    {
        $hierarchy = $this->getPermissionHierarchy();
        $choices = array();

        foreach ($hierarchy as $parent => $children) {

            foreach ($children as $child) {
                $choices[$parent][$child] = $child;
            }
        }

        return $choices;
    }
}
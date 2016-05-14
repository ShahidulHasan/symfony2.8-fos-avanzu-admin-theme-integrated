<?php

namespace Bundle\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="fos_users")
 * @ORM\Entity(repositoryClass="Bundle\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="users")
     * @ORM\JoinTable(name="fos_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
     * @ORM\OneToOne(targetEntity="Profile", mappedBy="user", cascade={"persist"})
     */
    protected $profile;

    protected $role;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function isSuperAdmin()
    {
        $groups = $this->getGroups();

        foreach ($groups as $group) {
            if ($group->hasRole('ROLE_SUPER_ADMIN')) {
                return true;
            }
        }

        return false;
    }

    public function status()
    {
        return $this->isEnabled() ? "Active" : "Inactive" ;
    }

    public function statusChangeText()
    {
        return !$this->isEnabled() ? "Active" : "Inactive" ;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     */
    public function setProfile($profile)
    {
        $profile->setUser($this);

        $this->profile = $profile;
    }

    public function toArray($collection)
    {
        $this->setRoles($collection->toArray());
    }

    public function setRole($role)
    {
        $this->setRoles(array($role));

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        $role = $this->getRoles();

        return $role[0];
    }

    public function isGranted($role)
    {
        return in_array($role, $this->getRoles());
    }
}
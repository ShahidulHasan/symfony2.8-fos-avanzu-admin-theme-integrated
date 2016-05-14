<?php

namespace Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table(name="fos_user_profiles")
 * @ORM\Entity(repositoryClass="Bundle\UserBundle\Repository\ProfileRepository")
 */
class Profile
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="full_name", type="string", length=200 , nullable=true)
     */
    protected $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="cellphones", type="string", length=15, nullable=true)
     */
    protected $cellphone;

    /**
     * @var string
     *
     * @ORM\Column(name="designations", type="string", length=255, nullable=true)
     */
    protected $designation;

    /**
     * @ORM\OneToOne(targetEntity="Bundle\UserBundle\Entity\User", inversedBy="profile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", unique=true, onDelete="CASCADE")
     * })
     */
    protected $user;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * get user
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * set user
     *
     * @param mixed $user
     * @return Profile
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * set fullName
     *
     * @param string $fullName
     * @return Profile
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * get cellphone
     *
     * @return string
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * set cellphone
     *
     * @param string $cellphone
     * @return Profile
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    /**
     * get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * set designation
     *
     * @param string $designation
     * @return Profile
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }
}

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User01
 *
 * @ORM\Table(name="User01")
 * @ORM\Entity
 */
class User01
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="apenom", type="string", length=50, nullable=true)
     */
    private $apenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nomusuario", type="string", length=50, nullable=true)
     */
    private $nomusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="clave", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $clave;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;



    /**
     * Set apenom
     *
     * @param string $apenom
     *
     * @return User01
     */
    public function setApenom($apenom)
    {
        $this->apenom = $apenom;

        return $this;
    }

    /**
     * Get apenom
     *
     * @return string
     */
    public function getApenom()
    {
        return $this->apenom;
    }

    /**
     * Set nomusuario
     *
     * @param string $nomusuario
     *
     * @return User01
     */
    public function setNomusuario($nomusuario)
    {
        $this->nomusuario = $nomusuario;

        return $this;
    }

    /**
     * Get nomusuario
     *
     * @return string
     */
    public function getNomusuario()
    {
        return $this->nomusuario;
    }

    /**
     * Set clave
     *
     * @param string $clave
     *
     * @return User01
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User01
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

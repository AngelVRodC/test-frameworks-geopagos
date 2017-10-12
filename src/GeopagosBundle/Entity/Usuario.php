<?php

namespace GeopagosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuarios")
 * @ORM\Entity(repositoryClass="GeopagosBundle\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="codigousuario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigousuario;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=50, unique=true)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="clave", type="string", length=255)
     */
    private $clave;

    /**
     * @var int
     *
     * @ORM\Column(name="edad", type="integer")
     */
    private $edad;

    /**
     * @var \Doctrine\Common\Collections\Collection|pagos[]
     *
     * @ORM\ManyToMany(targetEntity="Pago", inversedBy="usuario")
     * @ORM\JoinTable(
     *  name="usuariospagos",
     *  joinColumns={
     *      @ORM\JoinColumn(name="codigousuario", referencedColumnName="codigousuario")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="codigopago", referencedColumnName="codigopago")
     *  }
     * )
     */
    private $pagos;

    /**
     * @var \Doctrine\Common\Collections\Collection|usuarios[]
     *
     * @ORM\ManyToMany(targetEntity="Usuario")
     * @ORM\JoinTable(
     *  name="favoritos",
     *  joinColumns={
     *      @ORM\JoinColumn(name="codigousuario", referencedColumnName="codigousuario")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="codigousuariofavorito", referencedColumnName="codigousuario")
     *  }
     * )
     */
    private $favoritos;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getCodigousuario()
    {
        return $this->codigousuario;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set clave
     *
     * @param string $clave
     * @return Usuario
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
     * Set edad
     *
     * @param integer $edad
     * @return Usuario
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return integer 
     */
    public function getEdad()
    {
        return $this->edad;
    }
}

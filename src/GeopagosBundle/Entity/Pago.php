<?php

namespace GeopagosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Pago
 *
 * @ORM\Table(name="pagos")
 * @ORM\Entity(repositoryClass="GeopagosBundle\Repository\PagoRepository")
 */
class Pago
{
    /**
     * @var int
     *
     * @ORM\Column(name="codigopago", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigopago;

    /**
     * @var int
     * @Assert\NotBlank()
     * @Assert\GreaterThan("0", message = "El importe debe ser mayor a cero")  
     * @ORM\Column(name="importe", type="integer")
     */
    private $importe;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     * @Assert\GreaterThan("today", message = "La fecha debe ser mayor o igual a la fecha actual")     
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

     /**
     * @var \Doctrine\Common\Collections\Collection|usuarios[]
     *
     * @ORM\ManyToMany(targetEntity="Usuario", inversedBy="pago")
     * @ORM\JoinTable(
     *  name="usuariospagos",
     *  joinColumns={
     *      @ORM\JoinColumn(name="codigopago", referencedColumnName="codigopago")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="codigousuario", referencedColumnName="codigousuario")
     *  }
     * )
     */
     
    protected $usuarios;

    public function addUsuario(Usuario $usuario)
    {
        $usuario->addPago($this);
        $this->usuarios[] = $usuario;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getCodigopago()
    {
        return $this->codigopago;
    }

    /**
     * Set importe
     *
     * @param string $importe
     * @return Pago
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe
     *
     * @return string 
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Pago
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    public function getUsuarios()
    {
        return $this->usuarios;
    }

    public function setUsuarios($usuarios)
    {
        $this->usuarios = $usuarios;

        return $this;
    }  
}

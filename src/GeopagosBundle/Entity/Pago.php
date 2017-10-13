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
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="codigousuario", referencedColumnName="codigousuario")
     * @Assert\NotBlank()
     */
    private $usuario;      


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

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }  
}

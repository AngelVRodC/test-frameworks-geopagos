<?php

namespace GeopagosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioPagos
 *
 * @ORM\Table(name="usuario_pagos")
 * @ORM\Entity(repositoryClass="GeopagosBundle\Repository\UsuarioPagosRepository")
 */
class UsuarioPagos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="codigopago", type="integer")
     */
    private $codigopago;

    /**
     * @var int
     *
     * @ORM\Column(name="codigousuario", type="integer")
     */
    private $codigousuario;


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
     * Set codigopago
     *
     * @param integer $codigopago
     * @return UsuarioPagos
     */
    public function setCodigopago($codigopago)
    {
        $this->codigopago = $codigopago;

        return $this;
    }

    /**
     * Get codigopago
     *
     * @return integer 
     */
    public function getCodigopago()
    {
        return $this->codigopago;
    }

    /**
     * Set codigousuario
     *
     * @param integer $codigousuario
     * @return UsuarioPagos
     */
    public function setCodigousuario($codigousuario)
    {
        $this->codigousuario = $codigousuario;

        return $this;
    }

    /**
     * Get codigousuario
     *
     * @return integer 
     */
    public function getCodigousuario()
    {
        return $this->codigousuario;
    }
}

<?php

namespace GeopagosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * favorito
 *
 * @ORM\Table(name="favorito")
 * @ORM\Entity(repositoryClass="GeopagosBundle\Repository\favoritoRepository")
 */
class favorito
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
     * @ORM\Column(name="codigousuario", type="integer")
     */
    private $codigousuario;

    /**
     * @var int
     *
     * @ORM\Column(name="codigousuariofavorito", type="integer")
     */
    private $codigousuariofavorito;


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
     * Set codigousuario
     *
     * @param integer $codigousuario
     * @return favorito
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

    /**
     * Set codigousuariofavorito
     *
     * @param integer $codigousuariofavorito
     * @return favorito
     */
    public function setCodigousuariofavorito($codigousuariofavorito)
    {
        $this->codigousuariofavorito = $codigousuariofavorito;

        return $this;
    }

    /**
     * Get codigousuariofavorito
     *
     * @return integer 
     */
    public function getCodigousuariofavorito()
    {
        return $this->codigousuariofavorito;
    }
}

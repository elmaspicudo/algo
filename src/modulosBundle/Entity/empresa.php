<?php

namespace modulosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * empresa
 */
class empresa
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $razonSocial;

    /**
     * @var string
     */
    private $rfc;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var integer
     */
    private $clienteinstan;

    /**
     * @var integer
     */
    private $idinstancia;

    /**
     * @var \modulosBundle\Entity\moduloContratado
     */
    private $productoContratado;


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
     * Set razonSocial
     *
     * @param string $razonSocial
     * @return empresa
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string 
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set rfc
     *
     * @param string $rfc
     * @return empresa
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;

        return $this;
    }

    /**
     * Get rfc
     *
     * @return string 
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return empresa
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set clienteinstan
     *
     * @param integer $clienteinstan
     * @return empresa
     */
    public function setClienteinstan($clienteinstan)
    {
        $this->clienteinstan = $clienteinstan;

        return $this;
    }

    /**
     * Get clienteinstan
     *
     * @return integer 
     */
    public function getClienteinstan()
    {
        return $this->clienteinstan;
    }

    /**
     * Set idinstancia
     *
     * @param integer $idinstancia
     * @return empresa
     */
    public function setIdinstancia($idinstancia)
    {
        $this->idinstancia = $idinstancia;

        return $this;
    }

    /**
     * Get idinstancia
     *
     * @return integer 
     */
    public function getIdinstancia()
    {
        return $this->idinstancia;
    }

    /**
     * Set productoContratado
     *
     * @param \modulosBundle\Entity\moduloContratado $productoContratado
     * @return empresa
     */
    public function setProductoContratado(\modulosBundle\Entity\moduloContratado $productoContratado = null)
    {
        $this->productoContratado = $productoContratado;

        return $this;
    }

    /**
     * Get productoContratado
     *
     * @return \modulosBundle\Entity\moduloContratado 
     */
    public function getProductoContratado()
    {
        return $this->productoContratado;
    }
}

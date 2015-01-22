<?php

namespace productoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * proveedores
 */
class proveedores
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
    private $nombreComercial;

    /**
     * @var string
     */
    private $rfc;

    /**
     * @var string
     */
    private $calle;

    /**
     * @var string
     */
    private $numeroExterior;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var string
     */
    private $codigoPostal;

    /**
     * @var string
     */
    private $clave;

    /**
     * @var string
     */
    private $colonia;

    /**
     * @var string
     */
    private $numeroInterior;

    /**
     * @var string
     */
    private $municipio;


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
     * @return proveedores
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
     * Set nombreComercial
     *
     * @param string $nombreComercial
     * @return proveedores
     */
    public function setNombreComercial($nombreComercial)
    {
        $this->nombreComercial = $nombreComercial;

        return $this;
    }

    /**
     * Get nombreComercial
     *
     * @return string 
     */
    public function getNombreComercial()
    {
        return $this->nombreComercial;
    }

    /**
     * Set rfc
     *
     * @param string $rfc
     * @return proveedores
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
     * Set calle
     *
     * @param string $calle
     * @return proveedores
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set numeroExterior
     *
     * @param string $numeroExterior
     * @return proveedores
     */
    public function setNumeroExterior($numeroExterior)
    {
        $this->numeroExterior = $numeroExterior;

        return $this;
    }

    /**
     * Get numeroExterior
     *
     * @return string 
     */
    public function getNumeroExterior()
    {
        return $this->numeroExterior;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return proveedores
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set codigoPostal
     *
     * @param string $codigoPostal
     * @return proveedores
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return string 
     */
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    /**
     * Set clave
     *
     * @param string $clave
     * @return proveedores
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
     * Set colonia
     *
     * @param string $colonia
     * @return proveedores
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;

        return $this;
    }

    /**
     * Get colonia
     *
     * @return string 
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * Set numeroInterior
     *
     * @param string $numeroInterior
     * @return proveedores
     */
    public function setNumeroInterior($numeroInterior)
    {
        $this->numeroInterior = $numeroInterior;

        return $this;
    }

    /**
     * Get numeroInterior
     *
     * @return string 
     */
    public function getNumeroInterior()
    {
        return $this->numeroInterior;
    }

    /**
     * Set municipio
     *
     * @param string $municipio
     * @return proveedores
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return string 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }
}

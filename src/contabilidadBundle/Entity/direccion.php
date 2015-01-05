<?php

namespace contabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * direccion
 */
class direccion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $calle;

    /**
     * @var string
     */
    private $noExterior;

    /**
     * @var string
     */
    private $noInterior;

    /**
     * @var string
     */
    private $colonia;

    /**
     * @var string
     */
    private $codigoPostal;

    /**
     * @var string
     */
    private $localidad;

    /**
     * @var string
     */
    private $referencia;

    /**
     * @var string
     */
    private $municipio;

    /**
     * @var integer
     */
    private $estado;

    /**
     * @var integer
     */
    private $pais;


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
     * Set calle
     *
     * @param string $calle
     * @return direccion
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
     * Set noExterior
     *
     * @param string $noExterior
     * @return direccion
     */
    public function setNoExterior($noExterior)
    {
        $this->noExterior = $noExterior;

        return $this;
    }

    /**
     * Get noExterior
     *
     * @return string 
     */
    public function getNoExterior()
    {
        return $this->noExterior;
    }

    /**
     * Set noInterior
     *
     * @param string $noInterior
     * @return direccion
     */
    public function setNoInterior($noInterior)
    {
        $this->noInterior = $noInterior;

        return $this;
    }

    /**
     * Get noInterior
     *
     * @return string 
     */
    public function getNoInterior()
    {
        return $this->noInterior;
    }

    /**
     * Set colonia
     *
     * @param string $colonia
     * @return direccion
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
     * Set codigoPostal
     *
     * @param string $codigoPostal
     * @return direccion
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
     * Set localidad
     *
     * @param string $localidad
     * @return direccion
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return string 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set referencia
     *
     * @param string $referencia
     * @return direccion
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;

        return $this;
    }

    /**
     * Get referencia
     *
     * @return string 
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set municipio
     *
     * @param string $municipio
     * @return direccion
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

    /**
     * Set estado
     *
     * @param integer $estado
     * @return direccion
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set pais
     *
     * @param integer $pais
     * @return direccion
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return integer 
     */
    public function getPais()
    {
        return $this->pais;
    }
}

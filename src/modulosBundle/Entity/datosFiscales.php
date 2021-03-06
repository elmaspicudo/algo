<?php

namespace modulosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * datosFiscales
 */
class datosFiscales
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
    private $referencia;

    /**
     * @var string
     */
    private $colonia;

    /**
     * @var integer
     */
    private $codigoPostal;

    /**
     * @var string
     */
    private $localidad;

    /**
     * @var \contenidoBundle\Entity\municipio
     */
    private $municipio;

    /**
     * @var \contenidoBundle\Entity\estado
     */
    private $estado;

    /**
     * @var \contenidoBundle\Entity\pais
     */
    private $pais;

    /**
     * @var \userBundle\Entity\usuario
     */
    private $usuario;


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
     * @return datosFiscales
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
     * @return datosFiscales
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
     * @return datosFiscales
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
     * @return datosFiscales
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
     * @return datosFiscales
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
     * Set referencia
     *
     * @param string $referencia
     * @return datosFiscales
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
     * Set colonia
     *
     * @param string $colonia
     * @return datosFiscales
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
     * @param integer $codigoPostal
     * @return datosFiscales
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return integer 
     */
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    /**
     * Set localidad
     *
     * @param string $localidad
     * @return datosFiscales
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
     * Set municipio
     *
     * @param \contenidoBundle\Entity\municipio $municipio
     * @return datosFiscales
     */
    public function setMunicipio(\contenidoBundle\Entity\municipio $municipio = null)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return \contenidoBundle\Entity\municipio 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set estado
     *
     * @param \contenidoBundle\Entity\estado $estado
     * @return datosFiscales
     */
    public function setEstado(\contenidoBundle\Entity\estado $estado = null)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \contenidoBundle\Entity\estado 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set pais
     *
     * @param \contenidoBundle\Entity\pais $pais
     * @return datosFiscales
     */
    public function setPais(\contenidoBundle\Entity\pais $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return \contenidoBundle\Entity\pais 
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set usuario
     *
     * @param \userBundle\Entity\usuario $usuario
     * @return datosFiscales
     */
    public function setUsuario(\userBundle\Entity\usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \userBundle\Entity\usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}

<?php

namespace contabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * polizas
 */
class polizas
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $rfc;

    /**
     * @var string
     */
    private $mes;

    /**
     * @var integer
     */
    private $año;
    protected $poliza;

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
     * Set version
     *
     * @param string $version
     * @return polizas
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set rfc
     *
     * @param string $rfc
     * @return polizas
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
     * Set mes
     *
     * @param string $mes
     * @return polizas
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return string 
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set año
     *
     * @param integer $año
     * @return polizas
     */
    public function setAño($año)
    {
        $this->año = $año;

        return $this;
    }

    /**
     * Get año
     *
     * @return integer 
     */
    public function getAño()
    {
        return $this->año;
    }
    /**
     * Set poliza
     *
     * @param \contabilidadBundle\Entity\poliza $poliza
     * @return polizas
     */
    public function setPoliza(\contabilidaBundle\Entity\poliza $poliza = null)
    {
        $this->poliza = $poliza;

        return $this;
    }

    /**
     * Get poliza
     *
     * @return \contabilidadBundle\Entity\poliza 
     */
    public function getPoliza()
    {
        return $this->poliza;
    }

    public function __toString()
    {
        return $this->descripcion; 
    }
}

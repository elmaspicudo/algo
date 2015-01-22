<?php

namespace contabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * balanzas
 */
class balanzas
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
     * @var integer
     */
    private $totalCuentas;

    /**
     * @var string
     */
    private $mes;

    /**
     * @var string
     */
    private $anio;


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
     * @return balanzas
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
     * @return balanzas
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
     * Set totalCuentas
     *
     * @param integer $totalCuentas
     * @return balanzas
     */
    public function setTotalCuentas($totalCuentas)
    {
        $this->totalCuentas = $totalCuentas;

        return $this;
    }

    /**
     * Get totalCuentas
     *
     * @return integer 
     */
    public function getTotalCuentas()
    {
        return $this->totalCuentas;
    }

    /**
     * Set mes
     *
     * @param string $mes
     * @return balanzas
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
     * Set anio
     *
     * @param string $anio
     * @return balanzas
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;

        return $this;
    }

    /**
     * Get anio
     *
     * @return string 
     */
    public function getAnio()
    {
        return $this->anio;
    }
}

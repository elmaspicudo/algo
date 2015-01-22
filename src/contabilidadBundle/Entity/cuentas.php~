<?php

namespace contabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cuentas
 */
class cuentas
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $cliente;

    /**
     * @var string
     */
    private $vercion;

    /**
     * @var binary
     */
    private $totalDeCuentas;

    /**
     * @var string
     */
    private $mes;

    /**
     * @var string
     */
    private $anio;
    
    protected $empresa;
    protected $cuenta;
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
     * Set cliente
     *
     * @param string $cliente
     * @return cuentas
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return string 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set vercion
     *
     * @param string $vercion
     * @return cuentas
     */
    public function setVercion($vercion)
    {
        $this->vercion = $vercion;

        return $this;
    }

    /**
     * Get vercion
     *
     * @return string 
     */
    public function getVercion()
    {
        return $this->vercion;
    }

    /**
     * Set totalDeCuentas
     *
     * @param binary $totalDeCuentas
     * @return cuentas
     */
    public function setTotalDeCuentas($totalDeCuentas)
    {
        $this->totalDeCuentas = $totalDeCuentas;

        return $this;
    }

    /**
     * Get totalDeCuentas
     *
     * @return binary 
     */
    public function getTotalDeCuentas()
    {
        return $this->totalDeCuentas;
    }

    /**
     * Set mes
     *
     * @param string $mes
     * @return cuentas
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
     * @return cuentas
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
    /**
     * Set empresa
     *
     * @param \contabilidadBundle\Entity\empresa $empresa
     * @return cuentas
     */
    public function setEmpresa(\contabilidadBundle\Entity\empresa $empresa = null)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return \contabilidadBundle\Entity\empresa 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }
    /**
     * Set cuenta
     *
     * @param \contabilidadBundle\Entity\cuenta $cuenta
     * @return cuentas
     */
    public function setCuenta(\contabilidadBundle\Entity\cuenta $cuenta = null)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return \contabilidadBundle\Entity\cuenta 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }
}

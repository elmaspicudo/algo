<?php

namespace contabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * transaccion
 */
class transaccion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $numCuenta;

    /**
     * @var string
     */
    private $concepto;

    /**
     * @var string
     */
    private $debe;

    /**
     * @var string
     */
    private $haber;

    /**
     * @var string
     */
    private $moneda;

    /**
     * @var string
     */
    private $tipoDeCambio;


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
     * Set numCuenta
     *
     * @param string $numCuenta
     * @return transaccion
     */
    public function setNumCuenta($numCuenta)
    {
        $this->numCuenta = $numCuenta;

        return $this;
    }

    /**
     * Get numCuenta
     *
     * @return string 
     */
    public function getNumCuenta()
    {
        return $this->numCuenta;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     * @return transaccion
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return string 
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set debe
     *
     * @param string $debe
     * @return transaccion
     */
    public function setDebe($debe)
    {
        $this->debe = $debe;

        return $this;
    }

    /**
     * Get debe
     *
     * @return string 
     */
    public function getDebe()
    {
        return $this->debe;
    }

    /**
     * Set haber
     *
     * @param string $haber
     * @return transaccion
     */
    public function setHaber($haber)
    {
        $this->haber = $haber;

        return $this;
    }

    /**
     * Get haber
     *
     * @return string 
     */
    public function getHaber()
    {
        return $this->haber;
    }

    /**
     * Set moneda
     *
     * @param string $moneda
     * @return transaccion
     */
    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;

        return $this;
    }

    /**
     * Get moneda
     *
     * @return string 
     */
    public function getMoneda()
    {
        return $this->moneda;
    }

    /**
     * Set tipoDeCambio
     *
     * @param string $tipoDeCambio
     * @return transaccion
     */
    public function setTipoDeCambio($tipoDeCambio)
    {
        $this->tipoDeCambio = $tipoDeCambio;

        return $this;
    }

    /**
     * Get tipoDeCambio
     *
     * @return string 
     */
    public function getTipoDeCambio()
    {
        return $this->tipoDeCambio;
    }
}

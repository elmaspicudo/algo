<?php

namespace contabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * balanza
 */
class balanza
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var binary
     */
    private $cuenta;

    /**
     * @var binary
     */
    private $saldoInicial;

    /**
     * @var binary
     */
    private $debe;

    /**
     * @var binary
     */
    private $haber;

    /**
     * @var binary
     */
    private $saldoFinal;
    protected $balanzas;

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
     * Set cuenta
     *
     * @param binary $cuenta
     * @return balanza
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return binary 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * Set saldoInicial
     *
     * @param binary $saldoInicial
     * @return balanza
     */
    public function setSaldoInicial($saldoInicial)
    {
        $this->saldoInicial = $saldoInicial;

        return $this;
    }

    /**
     * Get saldoInicial
     *
     * @return binary 
     */
    public function getSaldoInicial()
    {
        return $this->saldoInicial;
    }

    /**
     * Set debe
     *
     * @param binary $debe
     * @return balanza
     */
    public function setDebe($debe)
    {
        $this->debe = $debe;

        return $this;
    }

    /**
     * Get debe
     *
     * @return binary 
     */
    public function getDebe()
    {
        return $this->debe;
    }

    /**
     * Set haber
     *
     * @param binary $haber
     * @return balanza
     */
    public function setHaber($haber)
    {
        $this->haber = $haber;

        return $this;
    }

    /**
     * Get haber
     *
     * @return binary 
     */
    public function getHaber()
    {
        return $this->haber;
    }

    /**
     * Set saldoFinal
     *
     * @param binary $saldoFinal
     * @return balanza
     */
    public function setSaldoFinal($saldoFinal)
    {
        $this->saldoFinal = $saldoFinal;

        return $this;
    }

    /**
     * Get saldoFinal
     *
     * @return binary 
     */
    public function getSaldoFinal()
    {
        return $this->saldoFinal;
    }
    /**
     * Set balanzas
     *
     * @param \contabilidadBundle\Entity\balanzas $balanzas
     * @return balanza
     */
    public function setBalanzas(\contabilidadBundle\Entity\balanzas $balanzas = null)
    {
        $this->balanzas = $balanzas;

        return $this;
    }

    /**
     * Get balanzas
     *
     * @return \contabilidadBundle\Entity\balanzas 
     */
    public function getBalanzas()
    {
        return $this->balanzas;
    }

    public function __toString()
    {
        return $this->descripcion; 
    }
}

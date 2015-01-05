<?php

namespace contabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * transferencia
 */
class transferencia
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $cuentaOrigen;

    /**
     * @var string
     */
    private $bancoOrigen;

    /**
     * @var string
     */
    private $monto;

    /**
     * @var string
     */
    private $cuentaDestino;

    /**
     * @var string
     */
    private $bancoDestino;

    /**
     * @var string
     */
    private $beneficiario;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var string
     */
    private $rfc;
    /**
     * @var string
     */
    private $transaccion;

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
     * Set cuentaOrigen
     *
     * @param string $cuentaOrigen
     * @return transferencia
     */
    public function setCuentaOrigen($cuentaOrigen)
    {
        $this->cuentaOrigen = $cuentaOrigen;

        return $this;
    }

    /**
     * Get cuentaOrigen
     *
     * @return string 
     */
    public function getCuentaOrigen()
    {
        return $this->cuentaOrigen;
    }

    /**
     * Set bancoOrigen
     *
     * @param string $bancoOrigen
     * @return transferencia
     */
    public function setBancoOrigen($bancoOrigen)
    {
        $this->bancoOrigen = $bancoOrigen;

        return $this;
    }

    /**
     * Get bancoOrigen
     *
     * @return string 
     */
    public function getBancoOrigen()
    {
        return $this->bancoOrigen;
    }

    /**
     * Set monto
     *
     * @param string $monto
     * @return transferencia
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return string 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set cuentaDestino
     *
     * @param string $cuentaDestino
     * @return transferencia
     */
    public function setCuentaDestino($cuentaDestino)
    {
        $this->cuentaDestino = $cuentaDestino;

        return $this;
    }

    /**
     * Get cuentaDestino
     *
     * @return string 
     */
    public function getCuentaDestino()
    {
        return $this->cuentaDestino;
    }

    /**
     * Set bancoDestino
     *
     * @param string $bancoDestino
     * @return transferencia
     */
    public function setBancoDestino($bancoDestino)
    {
        $this->bancoDestino = $bancoDestino;

        return $this;
    }

    /**
     * Get bancoDestino
     *
     * @return string 
     */
    public function getBancoDestino()
    {
        return $this->bancoDestino;
    }

    /**
     * Set beneficiario
     *
     * @param string $beneficiario
     * @return transferencia
     */
    public function setBeneficiario($beneficiario)
    {
        $this->beneficiario = $beneficiario;

        return $this;
    }

    /**
     * Get beneficiario
     *
     * @return string 
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return transferencia
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set rfc
     *
     * @param string $rfc
     * @return transferencia
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
     * Set transaccion
     *
     * @param string $transaccion
     * @return transferencia
     */
    public function setTransaccion($transaccion)
    {
        $this->transaccion = $transaccion;

        return $this;
    }

    /**
     * Get transaccion
     *
     * @return string 
     */
    public function getTransaccion()
    {
        return $this->transaccion;
    }
}

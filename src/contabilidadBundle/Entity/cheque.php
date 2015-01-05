<?php

namespace contabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cheque
 */
class cheque
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $num;

    /**
     * @var string
     */
    private $banco;

    /**
     * @var string
     */
    private $cuentaOrigen;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var string
     */
    private $monto;

    /**
     * @var string
     */
    private $beneficiario;

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
     * Set num
     *
     * @param string $num
     * @return cheque
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return string 
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set banco
     *
     * @param string $banco
     * @return cheque
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;

        return $this;
    }

    /**
     * Get banco
     *
     * @return string 
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * Set cuentaOrigen
     *
     * @param string $cuentaOrigen
     * @return cheque
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return cheque
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
     * Set monto
     *
     * @param string $monto
     * @return cheque
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
     * Set beneficiario
     *
     * @param string $beneficiario
     * @return cheque
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
     * Set rfc
     *
     * @param string $rfc
     * @return cheque
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
     * @return cheque
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

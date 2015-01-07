<?php

namespace contabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * poliza
 */
class poliza
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $tipo;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var string
     */
    private $concepto;

 
    /**
     * @var \contabilidadBundle\Entity\polizas
     */
    private $polizas;
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
     * Set tipo
     *
     * @param integer $tipo
     * @return poliza
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return poliza
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return poliza
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
     * Set concepto
     *
     * @param string $concepto
     * @return poliza
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
   

    public function __toString()
    {
        return $this->id; 
    }
    


    /**
     * Set polizas
     *
     * @param \contabilidadBundle\Entity\polizas $polizas
     * @return poliza
     */
    public function setPolizas(\contabilidadBundle\Entity\polizas $polizas = null)
    {
        $this->polizas = $polizas;

        return $this;
    }

    /**
     * Get polizas
     *
     * @return \contabilidadBundle\Entity\polizas 
     */
    public function getPolizas()
    {
        return $this->polizas;
    }
}

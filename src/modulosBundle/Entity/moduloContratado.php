<?php

namespace modulosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * moduloContratado
 */
class moduloContratado
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fechaCorte;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var integer
     */
    private $cantidadPeriodo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $empresa;

    /**
     * @var \userBundle\Entity\usuario
     */
    private $usuario;

    /**
     * @var \contenidoBundle\Entity\misProductos
     */
    private $producto;

    /**
     * @var \modulosBundle\Entity\periodo
     */
    private $periodo;

    /**
     * @var \modulosBundle\Entity\renta
     */
    private $renta;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->empresa = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set fechaCorte
     *
     * @param \DateTime $fechaCorte
     * @return moduloContratado
     */
    public function setFechaCorte($fechaCorte)
    {
        $this->fechaCorte = $fechaCorte;

        return $this;
    }

    /**
     * Get fechaCorte
     *
     * @return \DateTime 
     */
    public function getFechaCorte()
    {
        return $this->fechaCorte;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return moduloContratado
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
     * Set cantidadPeriodo
     *
     * @param integer $cantidadPeriodo
     * @return moduloContratado
     */
    public function setCantidadPeriodo($cantidadPeriodo)
    {
        $this->cantidadPeriodo = $cantidadPeriodo;

        return $this;
    }

    /**
     * Get cantidadPeriodo
     *
     * @return integer 
     */
    public function getCantidadPeriodo()
    {
        return $this->cantidadPeriodo;
    }

    /**
     * Add empresa
     *
     * @param \modulosBundle\Entity\empresa $empresa
     * @return moduloContratado
     */
    public function addEmpresa(\modulosBundle\Entity\empresa $empresa)
    {
        $this->empresa[] = $empresa;

        return $this;
    }

    /**
     * Remove empresa
     *
     * @param \modulosBundle\Entity\empresa $empresa
     */
    public function removeEmpresa(\modulosBundle\Entity\empresa $empresa)
    {
        $this->empresa->removeElement($empresa);
    }

    /**
     * Get empresa
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set usuario
     *
     * @param \userBundle\Entity\usuario $usuario
     * @return moduloContratado
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

    /**
     * Set producto
     *
     * @param \contenidoBundle\Entity\misProductos $producto
     * @return moduloContratado
     */
    public function setProducto(\contenidoBundle\Entity\misProductos $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \contenidoBundle\Entity\misProductos 
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set periodo
     *
     * @param \modulosBundle\Entity\periodo $periodo
     * @return moduloContratado
     */
    public function setPeriodo(\modulosBundle\Entity\periodo $periodo = null)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return \modulosBundle\Entity\periodo 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set renta
     *
     * @param \modulosBundle\Entity\renta $renta
     * @return moduloContratado
     */
    public function setRenta(\modulosBundle\Entity\renta $renta = null)
    {
        $this->renta = $renta;

        return $this;
    }

    /**
     * Get renta
     *
     * @return \modulosBundle\Entity\renta 
     */
    public function getRenta()
    {
        return $this->renta;
    }
}

<?php

namespace cartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * itemCarrito
 */
class itemCarrito
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $cantidad;

    /**
     * @var integer
     */
    private $cantidadPeriodo;

    /**
     * @var string
     */
    private $total;

    protected $producto;

    protected $carrito;

    protected $periodo;

    protected $renta;
   
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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return itemCarrito
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set total
     *
     * @param string $total
     * @return itemCarrito
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set carrito
     *
     * @param \cartBundle\Entity\carrito $carrito
     * @return itemCarrito
     */
    public function setCarrito(\cartBundle\Entity\carrito $carrito = null)
    {
        $this->carrito = $carrito;

        return $this;
    }

    /**
     * Get carrito
     *
     * @return \cartBundle\Entity\carrito 
     */
    public function getCarrito()
    {
        return $this->carrito;
    }

    /**
     * Set producto
     *
     * @param \contenidoBundle\Entity\misProductos $producto
     * @return itemCarrito
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
     * @return itemCarrito
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
     * @return itemCarrito
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

    /**
     * Set cantidadPeriodo
     *
     * @param integer $cantidadPeriodo
     * @return itemCarrito
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
}

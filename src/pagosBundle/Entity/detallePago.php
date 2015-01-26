<?php

namespace pagosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * detallePago
 */
class detallePago
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
     * @var string
     */
    private $precio;

    /**
     * @var string
     */
    private $total;

    protected $producto;

    protected $pago;

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
     * @return detallePago
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
     * Set precio
     *
     * @param string $precio
     * @return detallePago
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set total
     *
     * @param string $total
     * @return detallePago
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
     * Set pago
     *
     * @param \pagosBundle\Entity\pago $pago
     * @return detallePago
     */
    public function setPago(\pagosBundle\Entity\pago $pago = null)
    {
        $this->pago = $pago;

        return $this;
    }

    /**
     * Get pago
     *
     * @return \pagosBundle\Entity\pago 
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * Set producto
     *
     * @param \contenidoBundle\Entity\misProductos $producto
     * @return detallePago
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
}

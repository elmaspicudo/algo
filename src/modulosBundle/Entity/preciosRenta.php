<?php

namespace modulosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * preciosRenta
 */
class preciosRenta
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $precio;

    /**
     * @var \contenidoBundle\Entity\misProductos
     */
    private $producto;

    /**
     * @var \modulosBundle\Entity\renta
     */
    private $renta;


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
     * Set precio
     *
     * @param string $precio
     * @return preciosRenta
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
     * Set producto
     *
     * @param \contenidoBundle\Entity\misProductos $producto
     * @return preciosRenta
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
     * Set renta
     *
     * @param \modulosBundle\Entity\renta $renta
     * @return preciosRenta
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

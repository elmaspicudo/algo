<?php

namespace productoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * precioProducto
 */
class precioProducto
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $precio;
   
    protected $producto;

    protected $precios;




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
     * @return precioProducto
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
     * @param \facturacionBundle\Entity\producto $producto
     * @return precioProducto
     */
    public function setProducto(\contabilidadBundle\Entity\producto $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }
    
    /**
     * Get producto
     *
     * @return \facturacionBundle\Entity\producto 
     */
    public function getProducto()
    {
        return $this->producto;
    }
    /**
     * Set precios
     *
     * @param \productoBundle\Entity\precios $precios
     * @return precioProducto
     */
    public function setPrecios(\contabilidadBundle\Entity\precios $precios = null)
    {
        $this->precios = $precios;

        return $this;
    }
    
    /**
     * Get precios
     *
     * @return \productosBundle\Entity\precios 
     */
    public function getPrecios()
    {
        return $this->precios;
    }
}

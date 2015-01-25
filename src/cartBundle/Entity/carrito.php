<?php

namespace cartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * carrito
 */
class carrito
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var status
     */
    private $status;

    /**
     * @var string
     */
    private $llave;

    protected $usuario;

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
     * Set llave
     *
     * @param string $llave
     * @return carrito
     */
    public function setLlave($llave)
    {
        $this->llave = $llave;

        return $this;
    }

    /**
     * Get llave
     *
     * @return string 
     */
    public function getLlave()
    {
        return $this->llave;
    }

    /**
     * Set usuario
     *
     * @param \userBundle\Entity\usuario $usuario
     * @return carrito
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
     * Set status
     *
     * @param integer $status
     * @return carrito
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
}

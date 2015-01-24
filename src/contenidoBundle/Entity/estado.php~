<?php

namespace contenidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * estado
 */
class estado
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var \contenidoBundle\Entity\pais
     */
    private $pais;


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
     * Set descripcion
     *
     * @param string $descripcion
     * @return estado
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set pais
     *
     * @param \contenidoBundle\Entity\pais $pais
     * @return estado
     */
    public function setPais(\contenidoBundle\Entity\pais $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return \contenidoBundle\Entity\pais 
     */
    public function getPais()
    {
        return $this->pais;
    }
}

<?php

namespace contenidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * municipio
 */
class municipio
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
     * @var \contenidoBundle\Entity\estado
     */
    private $estado;


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
     * @return municipio
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
     * Set estado
     *
     * @param \contenidoBundle\Entity\estado $estado
     * @return municipio
     */
    public function setEstado(\contenidoBundle\Entity\estado $estado = null)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \contenidoBundle\Entity\estado 
     */
    public function getEstado()
    {
        return $this->estado;
    }
}

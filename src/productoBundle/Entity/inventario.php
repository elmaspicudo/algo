<?php

namespace productoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * inventario
 */
class inventario
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $unidadM;

    /**
     * @var string
     */
    private $existencia;


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
     * Set nombre
     *
     * @param string $nombre
     * @return inventario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set unidadM
     *
     * @param string $unidadM
     * @return inventario
     */
    public function setUnidadM($unidadM)
    {
        $this->unidadM = $unidadM;

        return $this;
    }

    /**
     * Get unidadM
     *
     * @return string 
     */
    public function getUnidadM()
    {
        return $this->unidadM;
    }

    /**
     * Set existencia
     *
     * @param string $existencia
     * @return inventario
     */
    public function setExistencia($existencia)
    {
        $this->existencia = $existencia;

        return $this;
    }

    /**
     * Get existencia
     *
     * @return string 
     */
    public function getExistencia()
    {
        return $this->existencia;
    }
}

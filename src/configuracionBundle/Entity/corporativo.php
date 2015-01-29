<?php

namespace configuracionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * corporativo
 */
class corporativo
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
    private $descripcion;

    /**
     * @var integer
     */
    private $limiteEmpresa;


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
     * @return corporativo
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return corporativo
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
     * Set limiteEmpresa
     *
     * @param integer $limiteEmpresa
     * @return corporativo
     */
    public function setLimiteEmpresa($limiteEmpresa)
    {
        $this->limiteEmpresa = $limiteEmpresa;

        return $this;
    }

    /**
     * Get limiteEmpresa
     *
     * @return integer 
     */
    public function getLimiteEmpresa()
    {
        return $this->limiteEmpresa;
    }
}

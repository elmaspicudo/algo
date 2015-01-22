<?php

namespace facturacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * llaves
 */
class llaves
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $contenido;
    protected $archivos;

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
     * Set contenido
     *
     * @param string $contenido
     * @return llaves
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }
    /**
     * Set archivos
     *
     * @param \facturacionBundle\Entity\archivos $archivos
     * @return llaves
     */
    public function setArchivos(\facturacionBundle\Entity\archivos $archivos = null)
    {
        $this->archivos = $archivos;

        return $this;
    }

    /**
     * Get archivos
     *
     * @return \facturacionBundle\Entity\archivos 
     */
    public function getArchivos()
    {
        return $this->archivos;
    }

}

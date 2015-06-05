<?php

namespace Cloud\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categoria
 */
class Categoria
{
    // ...

    /**
     * @ORM\ManyToMany(targetEntity="Noticias", mappedBy="categoria")
     */
    protected $noticias;

    public function __construct()
    {
        $this->noticias = new ArrayCollection();
    }
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;


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
     * @return Categoria
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
}

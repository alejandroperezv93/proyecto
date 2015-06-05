<?php

namespace Cloud\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Noticias
 */
class Noticias
{
    /**
     * @ORM\ManyToMany(targetEntity="Categoria", inversedBy="noticias")
     * ORM\JoinTable(name="item_category",
     * joinColumns={@ORM\JoinColumn(name="id_categoria", referencedColumnName="id")})
     */
    protected $categoria;
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $detalle;

    /**
     * @var string
     */
    private $titutlo;

    /**
     * @var integer
     */
    private $id_Categoria;


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
     * Set titulo
     *
     * @param string $titulo
     * @return Noticias
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set detalle
     *
     * @param string $detalle
     * @return Noticias
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;

        return $this;
    }

    /**
     * Get detalle
     *
     * @return string 
     */
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * Set titutlo
     *
     * @param string $titutlo
     * @return Noticias
     */
    public function setTitutlo($titutlo)
    {
        $this->titutlo = $titutlo;

        return $this;
    }

    /**
     * Get titutlo
     *
     * @return string 
     */
    public function getTitutlo()
    {
        return $this->titutlo;
    }

    /**
     * Set id_Categoria
     *
     * @param integer $id_Categoria
     * @return Noticias
     */
    public function setId_Categoria($id_Categoria)
    {
        $this->id_Categoria = $id_Categoria;

        return $this;
    }

    /**
     * Get id_Categoria
     *
     * @return integer 
     */
    public function getId_Categoria()
    {
        return $this->id_Categoria;
    }

    /**
     * Set id_Categoria
     *
     * @param integer $idCategoria
     * @return Noticias
     */
    public function setIdCategoria($idCategoria)
    {
        $this->id_Categoria = $idCategoria;

        return $this;
    }

    /**
     * Get id_Categoria
     *
     * @return integer 
     */
    public function getIdCategoria()
    {
        return $this->id_Categoria;
    }
}

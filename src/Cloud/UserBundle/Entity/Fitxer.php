<?php

namespace Cloud\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fitxer
 */
class Fitxer
{


    /**
     * @ORM\ManyToMany(targetEntity="@TUserBundle/Entity/User", inversedBy="fitxer")
     * ORM\JoinTable(name="item_category",
     * joinColumns={@ORM\JoinColumn(name="id_user", referencedColumnName="id")})
     */
    protected $user;
    // ...

    /**
     * @ORM\ManyToMany(targetEntity="\Cloud\UserBundle\Entity\compartir", mappedBy="fitxer")
     */
    protected $compartir;


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
    private $description;

    /**
     * @var string
     */
    private $modificacion;

    /**
     * @var integer
     */
    private $idUser;

    /**
     * @var bool
     *
     * @ORM\Column(name="eliminado", type="boolean")
     */
    private $eliminado;

    /**
     * @var bool
     *
     * @ORM\Column(name="favorito", type="string")
     */
    private $favorito;


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
     * @return Fitxer
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
     * Set description
     *
     * @param string $description
     * @return Fitxer
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set modificacion
     *
     * @param string $modificacion
     * @return Fitxer
     */
    public function setModificacion($modificacion)
    {
        $this->modificacion = $modificacion;

        return $this;
    }

    /**
     * Get modificacion
     *
     * @return string 
     */
    public function getModificacion()
    {
        return $this->modificacion;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     * @return Fitxer
     */
    public function setIdUser($idUser)
{
    $this->idUser = $idUser;

    return $this;
}

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set eliminado
     *
     * @param boolean $eliminado
     * @return Fitxer
     */

    public function setEliminado($eliminado)
    {
        $this->eliminado = $eliminado;

        return $this;
    }

    /**
     * Get eliminado
     *
     * @return boolean
     */
    public function getEliminado()
    {
        return $this->eliminado;
    }

    /**
     * Set favorito
     *
     * @param string $favorito
     * @return Fitxer
     */
    public function setFavorito($favorito)
    {
        $this->favorito = $favorito;

        return $this;
    }

    /**
     * Get favorito
     *
     * @return string 
     */
    public function getFavorito()
    {
        return $this->favorito;
    }
}

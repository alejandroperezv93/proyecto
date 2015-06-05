<?php

namespace Cloud\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * compartir
 */
class compartir
{
    /**
     * @ORM\ManyToMany(targetEntity="/Cloud/UserBundle/Entity/Fitxer", inversedBy="compartir")
     * ORM\JoinTable(name="compartir_fichero",
     * joinColumns={@ORM\JoinColumn(name="id_fitxer", referencedColumnName="id")})
     */
    protected $fitxer;
    /**
     * @ORM\ManyToMany(targetEntity="@TUserBundle/Entity/User", inversedBy="compartir")
     * ORM\JoinTable(name="compartir_user",
     * joinColumns={@ORM\JoinColumn(name="id_user1", referencedColumnName="id")})
     */
    protected $user;
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var integer
     */
    private $idUser1;

    /**
     * @var integer
     */
    private $idFitxer;

    /**
     * @var integer
     */
    private $idUser2;


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
     * @return compartir
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
     * Set idUser1
     *
     * @param integer $idUser1
     * @return compartir
     */
    public function setIdUser1($idUser1)
    {
        $this->idUser1 = $idUser1;

        return $this;
    }

    /**
     * Get idUser1
     *
     * @return integer 
     */
    public function getIdUser1()
    {
        return $this->idUser1;
    }

    /**
     * Set idFitxer
     *
     * @param integer $idFitxer
     * @return compartir
     */
    public function setIdFitxer($idFitxer)
    {
        $this->idFitxer = $idFitxer;

        return $this;
    }

    /**
     * Get idFitxer
     *
     * @return integer 
     */
    public function getIdFitxer()
    {
        return $this->idFitxer;
    }

    /**
     * Set idUser2
     *
     * @param integer $idUser2
     * @return compartir
     */
    public function setIdUser2($idUser2)
    {
        $this->idUser2 = $idUser2;

        return $this;
    }

    /**
     * Get idUser2
     *
     * @return integer 
     */
    public function getIdUser2()
    {
        return $this->idUser2;
    }
}

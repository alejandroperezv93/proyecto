<?php

namespace Cloud\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


class Recursos
{
    /**
     * @ORM\ManyToMany(targetEntity="Id", mappedBy="Recursos"
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="Id", mappedBy="Recursos"
     */
    private $username;

    /**
     * @var array
     *
     * @ORM\Column(name="archivo", type="json_array")
     */

    private $archivo;
    /**
     * @var array
     *
     * @ORM\Column(name="archivos", type="json_array")
     */

    private $archivos;


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
     * Set username
     *
     * @param string $username
     * @return Recursos
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param array $roles
     * @return $this
     */
    public function setArchivo($archivo)
    {
        $this->archivo = $archivo;

        return $this;
    }

    /**
     * Returns the roles granted to the user.
     *
     * @return Archivo[] The user roles
     */
    public function getArchivo()
    {
        return empty($this->archivo) ? ['archivo'] : $this->archivo;
    }

    /**
     * Set archivos
     *
     * @param string $archivos
     * @return Recursos
     */
    public function setArchivos($archivos)
    {
        $this->archivos = $archivos;

        return $this;
    }

    /**
     * Get archivos
     *
     * @return string 
     */
    public function getArchivos()
    {
        return $this->archivos;
    }
}

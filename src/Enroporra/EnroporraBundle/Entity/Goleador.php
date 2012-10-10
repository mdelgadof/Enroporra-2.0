<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Enroporra\EnroporraBundle\Entity\GoleadorRepository")
 * @ORM\Table(name="Goleador")
 * @ORM\HasLifecycleCallbacks()
 */
class Goleador
{

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $nombre
     */
    private $nombre;

    /**
     * @var string $apellido
     */
    private $apellido;

    /**
     * @var integer $id_equipo
     */
    private $id_equipo;

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
     * @return Goleador
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
     * Set apellido
     *
     * @param string $apellido
     * @return Goleador
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set id_equipo
     *
     * @param integer $idEquipo
     * @return Goleador
     */
    public function setIdEquipo($idEquipo)
    {
        $this->id_equipo = $idEquipo;
        return $this;
    }

    /**
     * Get id_equipo
     *
     * @return integer
     */
    public function getIdEquipo()
    {
        return $this->id_equipo;
    }

}
<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Goleador
 *
 * @ORM\Table(name="Goleador")
 * @ORM\Entity
 */
class Goleador
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=64, nullable=false)
     */
    private $nombre;

    /**
     * @var string $apellido
     *
     * @ORM\Column(name="apellido", type="string", length=64, nullable=false)
     */
    private $apellido;

    /**
     * @var Equipo
     *
     * @ORM\ManyToOne(targetEntity="Equipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipo", referencedColumnName="id")
     * })
     */
    private $idEquipo;



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
     * Set idEquipo
     *
     * @param Enroporra\EnroporraBundle\Entity\Equipo $idEquipo
     * @return Goleador
     */
    public function setIdEquipo(\Enroporra\EnroporraBundle\Entity\Equipo $idEquipo = null)
    {
        $this->idEquipo = $idEquipo;
        return $this;
    }

    /**
     * Get idEquipo
     *
     * @return Enroporra\EnroporraBundle\Entity\Equipo 
     */
    public function getIdEquipo()
    {
        return $this->idEquipo;
    }
}
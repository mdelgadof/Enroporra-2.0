<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Equipo
 *
 * @ORM\Table(name="Equipo")
 * @ORM\Entity
 */
class Equipo
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
     * @ORM\Column(name="nombre", type="string", length=128, nullable=false)
     */
    private $nombre;

    /**
     * @var string $bandera
     *
     * @ORM\Column(name="bandera", type="string", length=128, nullable=false)
     */
    private $bandera;

    /**
     * @var Competicion
     *
     * @ORM\ManyToOne(targetEntity="Competicion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_competicion", referencedColumnName="id")
     * })
     */
    private $idCompeticion;



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
     * @return Equipo
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
     * Set bandera
     *
     * @param string $bandera
     * @return Equipo
     */
    public function setBandera($bandera)
    {
        $this->bandera = $bandera;
        return $this;
    }

    /**
     * Get bandera
     *
     * @return string 
     */
    public function getBandera()
    {
        return $this->bandera;
    }

    /**
     * Set idCompeticion
     *
     * @param Enroporra\EnroporraBundle\Entity\Competicion $idCompeticion
     * @return Equipo
     */
    public function setIdCompeticion(\Enroporra\EnroporraBundle\Entity\Competicion $idCompeticion = null)
    {
        $this->idCompeticion = $idCompeticion;
        return $this;
    }

    /**
     * Get idCompeticion
     *
     * @return Enroporra\EnroporraBundle\Entity\Competicion 
     */
    public function getIdCompeticion()
    {
        return $this->idCompeticion;
    }
}
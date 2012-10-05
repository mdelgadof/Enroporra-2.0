<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Equipo
 */
class Equipo
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
     * @var string $bandera
     */
    private $bandera;

    /**
     * @var integer $id_competicion
     */
    private $id_competicion;


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
     * Set id_competicion
     *
     * @param integer $idCompeticion
     * @return Equipo
     */
    public function setIdCompeticion($idCompeticion)
    {
        $this->id_competicion = $idCompeticion;
        return $this;
    }

    /**
     * Get id_competicion
     *
     * @return integer 
     */
    public function getIdCompeticion()
    {
        return $this->id_competicion;
    }
}
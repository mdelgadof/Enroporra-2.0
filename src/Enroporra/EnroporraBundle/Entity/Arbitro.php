<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Arbitro
 */
class Arbitro
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
     * @return Arbitro
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
     * Set id_competicion
     *
     * @param integer $idCompeticion
     * @return Arbitro
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
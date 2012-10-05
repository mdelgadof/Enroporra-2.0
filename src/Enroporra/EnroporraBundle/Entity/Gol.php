<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Gol
 */
class Gol
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $id_goleador
     */
    private $id_goleador;

    /**
     * @var integer $id_partido
     */
    private $id_partido;


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
     * Set id_goleador
     *
     * @param integer $idGoleador
     * @return Gol
     */
    public function setIdGoleador($idGoleador)
    {
        $this->id_goleador = $idGoleador;
        return $this;
    }

    /**
     * Get id_goleador
     *
     * @return integer 
     */
    public function getIdGoleador()
    {
        return $this->id_goleador;
    }

    /**
     * Set id_partido
     *
     * @param integer $idPartido
     * @return Gol
     */
    public function setIdPartido($idPartido)
    {
        $this->id_partido = $idPartido;
        return $this;
    }

    /**
     * Get id_partido
     *
     * @return integer 
     */
    public function getIdPartido()
    {
        return $this->id_partido;
    }
}
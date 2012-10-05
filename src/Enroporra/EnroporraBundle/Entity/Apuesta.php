<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Apuesta
 */
class Apuesta
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $id_porrista
     */
    private $id_porrista;

    /**
     * @var integer $id_partido
     */
    private $id_partido;

    /**
     * @var integer $id_competicion
     */
    private $id_competicion;

    /**
     * @var smallint $resultado1
     */
    private $resultado1;

    /**
     * @var smallint $resultado2
     */
    private $resultado2;

    /**
     * @var integer $id_equipo1
     */
    private $id_equipo1;

    /**
     * @var integer $id_equipo2
     */
    private $id_equipo2;

    /**
     * @var integer $quiniela
     */
    private $quiniela;


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
     * Set id_porrista
     *
     * @param integer $idPorrista
     * @return Apuesta
     */
    public function setIdPorrista($idPorrista)
    {
        $this->id_porrista = $idPorrista;
        return $this;
    }

    /**
     * Get id_porrista
     *
     * @return integer 
     */
    public function getIdPorrista()
    {
        return $this->id_porrista;
    }

    /**
     * Set id_partido
     *
     * @param integer $idPartido
     * @return Apuesta
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

    /**
     * Set id_competicion
     *
     * @param integer $idCompeticion
     * @return Apuesta
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

    /**
     * Set resultado1
     *
     * @param smallint $resultado1
     * @return Apuesta
     */
    public function setResultado1($resultado1)
    {
        $this->resultado1 = $resultado1;
        return $this;
    }

    /**
     * Get resultado1
     *
     * @return smallint 
     */
    public function getResultado1()
    {
        return $this->resultado1;
    }

    /**
     * Set resultado2
     *
     * @param smallint $resultado2
     * @return Apuesta
     */
    public function setResultado2($resultado2)
    {
        $this->resultado2 = $resultado2;
        return $this;
    }

    /**
     * Get resultado2
     *
     * @return smallint 
     */
    public function getResultado2()
    {
        return $this->resultado2;
    }

    /**
     * Set id_equipo1
     *
     * @param integer $idEquipo1
     * @return Apuesta
     */
    public function setIdEquipo1($idEquipo1)
    {
        $this->id_equipo1 = $idEquipo1;
        return $this;
    }

    /**
     * Get id_equipo1
     *
     * @return integer 
     */
    public function getIdEquipo1()
    {
        return $this->id_equipo1;
    }

    /**
     * Set id_equipo2
     *
     * @param integer $idEquipo2
     * @return Apuesta
     */
    public function setIdEquipo2($idEquipo2)
    {
        $this->id_equipo2 = $idEquipo2;
        return $this;
    }

    /**
     * Get id_equipo2
     *
     * @return integer 
     */
    public function getIdEquipo2()
    {
        return $this->id_equipo2;
    }

    /**
     * Set quiniela
     *
     * @param integer $quiniela
     * @return Apuesta
     */
    public function setQuiniela($quiniela)
    {
        $this->quiniela = $quiniela;
        return $this;
    }

    /**
     * Get quiniela
     *
     * @return integer 
     */
    public function getQuiniela()
    {
        return $this->quiniela;
    }
}
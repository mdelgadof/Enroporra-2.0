<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Partido
 */
class Partido
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var date $fecha
     */
    private $fecha;

    /**
     * @var time $hora
     */
    private $hora;

    /**
     * @var integer $id_competicion
     */
    private $id_competicion;

    /**
     * @var integer $fase
     */
    private $fase;

    /**
     * @var integer $id_equipo1
     */
    private $id_equipo1;

    /**
     * @var integer $id_equipo2
     */
    private $id_equipo2;

    /**
     * @var integer $resultado1
     */
    private $resultado1;

    /**
     * @var integer $resultado2
     */
    private $resultado2;

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
     * Set fecha
     *
     * @param date $fecha
     * @return Partido
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * Get fecha
     *
     * @return date 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set hora
     *
     * @param time $hora
     * @return Partido
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
        return $this;
    }

    /**
     * Get hora
     *
     * @return time 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set id_competicion
     *
     * @param integer $idCompeticion
     * @return Partido
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
     * Set fase
     *
     * @param integer $fase
     * @return Partido
     */
    public function setFase($fase)
    {
        $this->fase = $fase;
        return $this;
    }

    /**
     * Get fase
     *
     * @return integer 
     */
    public function getFase()
    {
        return $this->fase;
    }

    /**
     * Set id_equipo1
     *
     * @param integer $idEquipo1
     * @return Partido
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
     * @return Partido
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
     * Set resultado1
     *
     * @param integer $resultado1
     * @return Partido
     */
    public function setResultado1($resultado1)
    {
        $this->resultado1 = $resultado1;
        return $this;
    }

    /**
     * Get resultado1
     *
     * @return integer 
     */
    public function getResultado1()
    {
        return $this->resultado1;
    }

    /**
     * Set resultado2
     *
     * @param integer $resultado2
     * @return Partido
     */
    public function setResultado2($resultado2)
    {
        $this->resultado2 = $resultado2;
        return $this;
    }

    /**
     * Get resultado2
     *
     * @return integer 
     */
    public function getResultado2()
    {
        return $this->resultado2;
    }

    /**
     * Set quiniela
     *
     * @param integer $quiniela
     * @return Partido
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
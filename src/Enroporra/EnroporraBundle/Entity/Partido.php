<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Partido
 *
 * @ORM\Table(name="Partido")
 * @ORM\Entity
 */
class Partido
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
     * @var date $fecha
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var time $hora
     *
     * @ORM\Column(name="hora", type="time", nullable=false)
     */
    private $hora;

    /**
     * @var integer $fase
     *
     * @ORM\Column(name="fase", type="integer", nullable=false)
     */
    private $fase;

    /**
     * @var integer $resultado1
     *
     * @ORM\Column(name="resultado1", type="integer", nullable=false)
     */
    private $resultado1;

    /**
     * @var integer $resultado2
     *
     * @ORM\Column(name="resultado2", type="integer", nullable=false)
     */
    private $resultado2;

    /**
     * @var integer $quiniela
     *
     * @ORM\Column(name="quiniela", type="integer", nullable=false)
     */
    private $quiniela;

    /**
     * @var Equipo
     *
     * @ORM\ManyToOne(targetEntity="Equipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipo2", referencedColumnName="id")
     * })
     */
    private $idEquipo2;

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
     * @var Equipo
     *
     * @ORM\ManyToOne(targetEntity="Equipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipo1", referencedColumnName="id")
     * })
     */
    private $idEquipo1;



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

    /**
     * Set idEquipo2
     *
     * @param Enroporra\EnroporraBundle\Entity\Equipo $idEquipo2
     * @return Partido
     */
    public function setIdEquipo2(\Enroporra\EnroporraBundle\Entity\Equipo $idEquipo2 = null)
    {
        $this->idEquipo2 = $idEquipo2;
        return $this;
    }

    /**
     * Get idEquipo2
     *
     * @return Enroporra\EnroporraBundle\Entity\Equipo 
     */
    public function getIdEquipo2()
    {
        return $this->idEquipo2;
    }

    /**
     * Set idCompeticion
     *
     * @param Enroporra\EnroporraBundle\Entity\Competicion $idCompeticion
     * @return Partido
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

    /**
     * Set idEquipo1
     *
     * @param Enroporra\EnroporraBundle\Entity\Equipo $idEquipo1
     * @return Partido
     */
    public function setIdEquipo1(\Enroporra\EnroporraBundle\Entity\Equipo $idEquipo1 = null)
    {
        $this->idEquipo1 = $idEquipo1;
        return $this;
    }

    /**
     * Get idEquipo1
     *
     * @return Enroporra\EnroporraBundle\Entity\Equipo 
     */
    public function getIdEquipo1()
    {
        return $this->idEquipo1;
    }
}
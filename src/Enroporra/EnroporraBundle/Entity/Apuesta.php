<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Apuesta
 *
 * @ORM\Table(name="Apuesta")
 * @ORM\Entity
 */
class Apuesta
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
     * @var smallint $resultado1
     *
     * @ORM\Column(name="resultado1", type="smallint", nullable=false)
     */
    private $resultado1;

    /**
     * @var smallint $resultado2
     *
     * @ORM\Column(name="resultado2", type="smallint", nullable=false)
     */
    private $resultado2;

    /**
     * @var integer $quiniela
     *
     * @ORM\Column(name="quiniela", type="integer", nullable=false)
     */
    private $quiniela;

    /**
     * @var Partido
     *
     * @ORM\ManyToOne(targetEntity="Partido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_partido", referencedColumnName="id")
     * })
     */
    private $idPartido;

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
     * @var Equipo
     *
     * @ORM\ManyToOne(targetEntity="Equipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipo2", referencedColumnName="id")
     * })
     */
    private $idEquipo2;

    /**
     * @var Porrista
     *
     * @ORM\ManyToOne(targetEntity="Porrista")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_porrista", referencedColumnName="id")
     * })
     */
    private $idPorrista;



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

    /**
     * Set idPartido
     *
     * @param Enroporra\EnroporraBundle\Entity\Partido $idPartido
     * @return Apuesta
     */
    public function setIdPartido(\Enroporra\EnroporraBundle\Entity\Partido $idPartido = null)
    {
        $this->idPartido = $idPartido;
        return $this;
    }

    /**
     * Get idPartido
     *
     * @return Enroporra\EnroporraBundle\Entity\Partido 
     */
    public function getIdPartido()
    {
        return $this->idPartido;
    }

    /**
     * Set idEquipo1
     *
     * @param Enroporra\EnroporraBundle\Entity\Equipo $idEquipo1
     * @return Apuesta
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

    /**
     * Set idEquipo2
     *
     * @param Enroporra\EnroporraBundle\Entity\Equipo $idEquipo2
     * @return Apuesta
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
     * Set idPorrista
     *
     * @param Enroporra\EnroporraBundle\Entity\Porrista $idPorrista
     * @return Apuesta
     */
    public function setIdPorrista(\Enroporra\EnroporraBundle\Entity\Porrista $idPorrista = null)
    {
        $this->idPorrista = $idPorrista;
        return $this;
    }

    /**
     * Get idPorrista
     *
     * @return Enroporra\EnroporraBundle\Entity\Porrista 
     */
    public function getIdPorrista()
    {
        return $this->idPorrista;
    }
}
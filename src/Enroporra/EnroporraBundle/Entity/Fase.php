<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Fase
 *
 * @ORM\Table(name="Fase")
 * @ORM\Entity
 */
class Fase
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
     * @var decimal $puntosQuiniela
     *
     * @ORM\Column(name="puntos_quiniela", type="decimal", nullable=false)
     */
    private $puntosQuiniela;

    /**
     * @var decimal $puntosResultado
     *
     * @ORM\Column(name="puntos_resultado", type="decimal", nullable=false)
     */
    private $puntosResultado;

    /**
     * @var string $rotulo
     *
     * @ORM\Column(name="rotulo", type="string", length=32, nullable=false)
     */
    private $rotulo;

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
     * Set puntosQuiniela
     *
     * @param decimal $puntosQuiniela
     * @return Fase
     */
    public function setPuntosQuiniela($puntosQuiniela)
    {
        $this->puntosQuiniela = $puntosQuiniela;
        return $this;
    }

    /**
     * Get puntosQuiniela
     *
     * @return decimal 
     */
    public function getPuntosQuiniela()
    {
        return $this->puntosQuiniela;
    }

    /**
     * Set puntosResultado
     *
     * @param decimal $puntosResultado
     * @return Fase
     */
    public function setPuntosResultado($puntosResultado)
    {
        $this->puntosResultado = $puntosResultado;
        return $this;
    }

    /**
     * Get puntosResultado
     *
     * @return decimal 
     */
    public function getPuntosResultado()
    {
        return $this->puntosResultado;
    }

    /**
     * Set rotulo
     *
     * @param string $rotulo
     * @return Fase
     */
    public function setRotulo($rotulo)
    {
        $this->rotulo = $rotulo;
        return $this;
    }

    /**
     * Get rotulo
     *
     * @return string 
     */
    public function getRotulo()
    {
        return $this->rotulo;
    }

    /**
     * Set idCompeticion
     *
     * @param Enroporra\EnroporraBundle\Entity\Competicion $idCompeticion
     * @return Fase
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
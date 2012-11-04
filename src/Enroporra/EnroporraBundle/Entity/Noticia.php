<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Noticia
 *
 * @ORM\Table(name="Noticia")
 * @ORM\Entity
 */
class Noticia
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
     * @var string $titular
     *
     * @ORM\Column(name="titular", type="string", length=255, nullable=false)
     */
    private $titular;

    /**
     * @var boolean $activa
     *
     * @ORM\Column(name="activa", type="boolean", nullable=false)
     */
    private $activa;

    /**
     * @var text $cuerpo
     *
     * @ORM\Column(name="cuerpo", type="text", nullable=false)
     */
    private $cuerpo;

    /**
     * @var datetime $fecha
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

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
     * Set titular
     *
     * @param string $titular
     * @return Noticia
     */
    public function setTitular($titular)
    {
        $this->titular = $titular;
        return $this;
    }

    /**
     * Get titular
     *
     * @return string 
     */
    public function getTitular()
    {
        return $this->titular;
    }

    /**
     * Set activa
     *
     * @param boolean $activa
     * @return Noticia
     */
    public function setActiva($activa)
    {
        $this->activa = $activa;
        return $this;
    }

    /**
     * Get activa
     *
     * @return boolean 
     */
    public function getActiva()
    {
        return $this->activa;
    }

    /**
     * Set cuerpo
     *
     * @param text $cuerpo
     * @return Noticia
     */
    public function setCuerpo($cuerpo)
    {
        $this->cuerpo = $cuerpo;
        return $this;
    }

    /**
     * Get cuerpo
     *
     * @return text 
     */
    public function getCuerpo()
    {
        return $this->cuerpo;
    }

    /**
     * Set fecha
     *
     * @param datetime $fecha
     * @return Noticia
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * Get fecha
     *
     * @return datetime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set idCompeticion
     *
     * @param Enroporra\EnroporraBundle\Entity\Competicion $idCompeticion
     * @return Noticia
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
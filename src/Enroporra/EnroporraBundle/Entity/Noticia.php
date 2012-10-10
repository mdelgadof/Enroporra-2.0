<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Enroporra\EnroporraBundle\Entity\NoticiaRepository")
 * @ORM\Table(name="Noticia")
 * @ORM\HasLifecycleCallbacks()
 */
class Noticia
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $titular
     */
    private $titular;

    /**
     * @var boolean $activa
     */
    private $activa;

    /**
     * @var text $cuerpo
     */
    private $cuerpo;

    /**
     * @var datetime $fecha
     */
    private $fecha;

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
<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Competicion
 */
class Competicion
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
     * @var datetime $fecha_comienzo_primera_fase
     */
    private $fecha_comienzo_primera_fase;

    /**
     * @var datetime $fecha_fin_primera_fase
     */
    private $fecha_fin_primera_fase;

    /**
     * @var datetime $fecha_comienzo_segunda_fase
     */
    private $fecha_comienzo_segunda_fase;


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
     * @return Competicion
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
     * Set fecha_comienzo_primera_fase
     *
     * @param datetime $fechaComienzoPrimeraFase
     * @return Competicion
     */
    public function setFechaComienzoPrimeraFase($fechaComienzoPrimeraFase)
    {
        $this->fecha_comienzo_primera_fase = $fechaComienzoPrimeraFase;
        return $this;
    }

    /**
     * Get fecha_comienzo_primera_fase
     *
     * @return datetime 
     */
    public function getFechaComienzoPrimeraFase()
    {
        return $this->fecha_comienzo_primera_fase;
    }

    /**
     * Set fecha_fin_primera_fase
     *
     * @param datetime $fechaFinPrimeraFase
     * @return Competicion
     */
    public function setFechaFinPrimeraFase($fechaFinPrimeraFase)
    {
        $this->fecha_fin_primera_fase = $fechaFinPrimeraFase;
        return $this;
    }

    /**
     * Get fecha_fin_primera_fase
     *
     * @return datetime 
     */
    public function getFechaFinPrimeraFase()
    {
        return $this->fecha_fin_primera_fase;
    }

    /**
     * Set fecha_comienzo_segunda_fase
     *
     * @param datetime $fechaComienzoSegundaFase
     * @return Competicion
     */
    public function setFechaComienzoSegundaFase($fechaComienzoSegundaFase)
    {
        $this->fecha_comienzo_segunda_fase = $fechaComienzoSegundaFase;
        return $this;
    }

    /**
     * Get fecha_comienzo_segunda_fase
     *
     * @return datetime 
     */
    public function getFechaComienzoSegundaFase()
    {
        return $this->fecha_comienzo_segunda_fase;
    }
}
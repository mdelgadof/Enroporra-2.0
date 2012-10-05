<?php

namespace Enroporra\EnroporraBundle\EntityExtended;

use Enroporra\EnroporraBundle\Entity\Porrista;

class cPorrista extends Porrista
{

    private $puntos;
    private $puntos_detalle;
    private $bg_color;
    private $clasificacion;
    private $destacado;

    function __construct($porrista)
    {
        $this->setId($porrista->getId());
        $this->setNombre($porrista->getNombre());
        $this->setApellido($porrista->getApellido());
        $this->setNick($porrista->getNick());
        $this->setIdGoleador($porrista->getIdGoleador());
        $this->setIdArbitro($porrista->getIdArbitro());
        $this->setIdCompeticion($porrista->getIdCompeticion());
        $this->setPagado($porrista->getPagado());
        $this->setFormapago($porrista->getFormaPago());
        $this->setTelefono($porrista->getTelefono());
        $this->setEmail($porrista->getEmail());
        $this->setComisionero($porrista->getComisionero());
        $this->calculaPuntos();
    }

    /**
     * Set puntos
     *
     * @param integer $id
     * @return cPorrista
     */
    private function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set puntos
     *
     * @param integer $puntos
     * @return cPorrista
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;
        return $this;
    }

    /**
     * Get puntos
     *
     * @return integer
     */
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set puntosDetalle
     *
     * @param string $puntosDetalle
     * @return cPorrista
     */
    public function setPuntosDetalle($puntosDetalle)
    {
        $this->puntos_detalle = $puntosDetalle;
        return $this;
    }

    /**
     * Get puntosDetalle
     *
     * @return string
     */
    public function getPuntosDetalle()
    {
        return $this->puntos_detalle;
    }

    /**
     * Set bgColor
     *
     * @param string $bgColor
     * @return cPorrista
     */
    public function setBgColor($bgColor)
    {
        $this->bg_color = $bgColor;
        return $this;
    }

    /**
     * Get bgColor
     *
     * @return string
     */
    public function getBgColor()
    {
        return $this->bg_color;
    }

    /**
     * Set clasificacion
     *
     * @param integer $clasificacion
     * @return cPorrista
     */
    public function setClasificacion($clasificacion)
    {
        $this->clasificacion = $clasificacion;
        return $this;
    }

    /**
     * Get clasificacion
     *
     * @return integer
     */
    public function getClasificacion()
    {
        return $this->clasificacion;
    }

    /**
     * Set destacado
     *
     * @param boolean $destacado
     * @return cPorrista
     */
    public function setDestacado($destacado)
    {
        $this->destacado = $destacado;
        return $this;
    }

    /**
     * Get destacado
     *
     * @return boolean
     */
    public function getDestacado()
    {
        return $this->destacado;
    }

    public function calculaPuntos()
    {
        $puntos = rand(1, 100);
        $this->setPuntos($puntos);
    }

}
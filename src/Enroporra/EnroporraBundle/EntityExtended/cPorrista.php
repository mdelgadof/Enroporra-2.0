<?php

namespace Enroporra\EnroporraBundle\EntityExtended;

use Enroporra\EnroporraBundle\Entity\Porrista;
use Enroporra\EnroporraBundle\EntityExtended\cGoleador;

class cPorrista extends Porrista
{

    private $puntos;
    private $puntos_detalle;
    private $bg_color;
    private $clasificacion;
    private $destacado;
    private $goleador;
    private $segunda_fase;
    private $em;
    private $base;

    function __construct($porrista, $em, $base)
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
        $this->em = $em;
        $this->base = $base;
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
     * Set segundaFase
     *
     * @param string $segundaFase
     * @return cPorrista
     */
    public function setSegundaFase($segundaFase)
    {
        $this->segunda_fase = $segundaFase;
        return $this;
    }

    /**
     * Get segundaFase
     *
     * @return string
     */
    public function getSegundaFase()
    {
        return $this->segunda_fase;
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

    /**
     * Set goleador
     *
     * @param cGoleador $goleador
     * @return cPorrista
     */
    public function setGoleador($goleador)
    {
        $this->goleador = $goleador;
        return $this;
    }

    /**
     * Get goleador
     *
     * @return cGoleador
     */
    public function getGoleador()
    {
        return $this->goleador;
    }

    public function calculaPuntos()
    {
        /* $query="SELECT
          e1.nombre equiporeal1, e1.bandera banderareal1, e2.nombre equiporeal2, e2.bandera banderareal2,
          e3.nombre equipoapuesta1, e3.bandera banderaapuesta1, e4.nombre equipoapuesta2, e4.bandera banderaapuesta2,
          p.fecha, p.hora, p.fase, p.resultado1 r1, p.resultado2 r2, a.resultado1 r3, a.resultado2 r4,
          p.id idPartido, p.quiniela q1, a.quiniela q2 FROM partido p LEFT JOIN apuesta a ON a.id_partido=p.id,equipo e1,equipo e2,equipo e3,equipo e4 WHERE p.id_equipo1=e1.id AND p.id_equipo2=e2.id AND a.id_equipo1=e3.id AND a.id_equipo2=e4.id AND a.id_porrista='".$id_porrista."' AND p.resultado1>=0 AND (p.id_equipo1='".$idEquipoGoleador."' OR p.id_equipo2='".$idEquipoGoleador."' OR a.quiniela=p.quiniela) ORDER BY p.fecha DESC, p.hora DESC";
          $res=mysql_query($query,$conexion); */

        //$puntos = rand(1, 100);
        //$repGoles = $this->em->getRepository('EnroporraBundle:Gol');

        $puntos = 0;

        // Puntos por acertar árbitro de la final
        if (($this->getIdArbitro() == $this->base->getCompetition()->getIdArbitro()) && $this->getIdArbitro())
            $puntos+=$this->base->getCompetition()->getPuntosPorArbitro();

        // Puntos por acertar Pichichi del campeonato
        if ($this->base->getCompetition()->getFinalizada() && $this->getGoleador()->getEsPichichi()) {
            $puntos += $this->base->getCompetition()->getPuntosPorPichichi();
        }

        // Puntos por cada gol del goleador elegido
        $puntos += ($this->getGoleador()->getGoles() * $this->base->getCompetition()->getPuntosPorGol());



        $this->setPuntos($puntos);
    }

}
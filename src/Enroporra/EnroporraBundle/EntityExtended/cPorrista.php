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
    private $idp;

    function __construct($porrista, $em, $base)
    {
        $this->setIdp($porrista->getId());
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
    private function setIdp($id)
    {
        $this->idp = $id;
        return $this;
    }

    /**
     * Get idp
     *
     * @return integer
     */
    public function getIdp()
    {
        return $this->idp;
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

        // Puntos por cada quiniela y resultados acertados, siempre que el equipo ganador coincida con el de la apuesta

        // Creamos la query de Apuesta
        $repApuestas = $this->em->getRepository('EnroporraBundle:Apuesta');
        $resApuestas = $repApuestas->createQueryBuilder('a')
            ->where('a.idPorrista = :idPorrista')
            ->setParameter('idPorrista', $this->getIdp())
            ->getQuery()
            ->getResult();

        // En cada partido-apuesta del porrista...
        foreach ($resApuestas as $apuesta) {
            // Verificamos que el partido se ha disputado (de lo contrario tiene en el resultado un empate a -1)
            if ($apuesta->getIdPartido()->getResultado1()<0) continue;
            // Verificamos que el ganador (o empate) del partido coincide con la apuesta del porrista
            if ($apuesta->getQuiniela() == $apuesta->getIdPartido()->getQuiniela()) {
                // Necesitamos comprobar que el equipo ganador del partido es el mismo equipo por el que apostó el porrista
                // En el caso de empate final sabemos que es un partido de la fase de grupos (en las eliminatorias no hay empate), y en esos los equipos del porrista son siempre los mismos que los reales
                if ($apuesta->getQuiniela() == 0 ||
                    ($apuesta->getQuiniela() == 1 && $apuesta->getIdEquipo1()->getId() == $apuesta->getIdPartido()->getIdEquipo1()->getId()) ||
                    ($apuesta->getQuiniela() == 2 && $apuesta->getIdEquipo2()->getId() == $apuesta->getIdPartido()->getIdEquipo2()->getId())
                ) {
                    $puntos += $apuesta->getIdPartido()->getIdFase()->getPuntosQuiniela();

                    // Solo si ha acertado el ganador (o empate) es posible que también haya acertado el resultado, aquí lo verificamos
                    if ($apuesta->getResultado1()==$apuesta->getIdPartido()->getResultado1() && $apuesta->getResultado2()==$apuesta->getIdPartido()->getResultado2()) {
                        $puntos += $apuesta->getIdPartido()->getIdFase()->getPuntosResultado();
                    }
                }
            }
        }

        $this->setPuntos($puntos);
    }

}
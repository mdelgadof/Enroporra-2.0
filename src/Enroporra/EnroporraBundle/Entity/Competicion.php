<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Competicion
 *
 * @ORM\Table(name="Competicion")
 * @ORM\Entity
 */
class Competicion
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
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=64, nullable=false)
     */
    private $nombre;

    /**
     * @var datetime $fechaComienzoPrimeraFase
     *
     * @ORM\Column(name="fecha_comienzo_primera_fase", type="datetime", nullable=false)
     */
    private $fechaComienzoPrimeraFase;

    /**
     * @var datetime $fechaFinPrimeraFase
     *
     * @ORM\Column(name="fecha_fin_primera_fase", type="datetime", nullable=false)
     */
    private $fechaFinPrimeraFase;

    /**
     * @var datetime $fechaComienzoSegundaFase
     *
     * @ORM\Column(name="fecha_comienzo_segunda_fase", type="datetime", nullable=false)
     */
    private $fechaComienzoSegundaFase;

    /**
     * @var boolean $finalizada
     *
     * @ORM\Column(name="finalizada", type="boolean", nullable=false)
     */
    private $finalizada;

    /**
     * @var decimal $puntosPorGol
     *
     * @ORM\Column(name="puntos_por_gol", type="decimal", nullable=false)
     */
    private $puntosPorGol;

    /**
     * @var decimal $puntosPorArbitro
     *
     * @ORM\Column(name="puntos_por_arbitro", type="decimal", nullable=false)
     */
    private $puntosPorArbitro;

    /**
     * @var decimal $puntosPorPichichi
     *
     * @ORM\Column(name="puntos_por_pichichi", type="decimal", nullable=false)
     */
    private $puntosPorPichichi;

    /**
     * @var string $linkBases
     *
     * @ORM\Column(name="link_bases", type="string", length=32, nullable=false)
     */
    private $linkBases;

    /**
     * @var string $linkPartidos
     *
     * @ORM\Column(name="link_partidos", type="string", length=32, nullable=false)
     */
    private $linkPartidos;

    /**
     * @var string $primeraRondaEliminatoria
     *
     * @ORM\Column(name="primera_ronda_eliminatoria", type="string", length=32, nullable=false)
     */
    private $primeraRondaEliminatoria;

    /**
     * @var string $proximaCompeticion
     *
     * @ORM\Column(name="proxima_competicion", type="string", length=32, nullable=false)
     */
    private $proximaCompeticion;

    /**
     * @var string $bancoNombre
     *
     * @ORM\Column(name="banco_nombre", type="string", length=16, nullable=false)
     */
    private $bancoNombre;

    /**
     * @var string $bancoCuenta
     *
     * @ORM\Column(name="banco_cuenta", type="string", length=32, nullable=false)
     */
    private $bancoCuenta;

    /**
     * @var string $bancoTitular
     *
     * @ORM\Column(name="banco_titular", type="string", length=64, nullable=false)
     */
    private $bancoTitular;

    /**
     * @var integer $numeroPartidosEliminatorias
     *
     * @ORM\Column(name="numero_partidos_eliminatorias", type="integer", nullable=false)
     */
    private $numeroPartidosEliminatorias;

    /**
     * @var Arbitro
     *
     * @ORM\ManyToOne(targetEntity="Arbitro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_arbitro", referencedColumnName="id")
     * })
     */
    private $idArbitro;

    /**
     * @var Partido
     *
     * @ORM\ManyToOne(targetEntity="Partido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_partido_primera_ronda_eliminatoria", referencedColumnName="id")
     * })
     */
    private $idPartidoPrimeraRondaEliminatoria;



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
     * Set fechaComienzoPrimeraFase
     *
     * @param datetime $fechaComienzoPrimeraFase
     * @return Competicion
     */
    public function setFechaComienzoPrimeraFase($fechaComienzoPrimeraFase)
    {
        $this->fechaComienzoPrimeraFase = $fechaComienzoPrimeraFase;
        return $this;
    }

    /**
     * Get fechaComienzoPrimeraFase
     *
     * @return datetime 
     */
    public function getFechaComienzoPrimeraFase()
    {
        return $this->fechaComienzoPrimeraFase;
    }

    /**
     * Set fechaFinPrimeraFase
     *
     * @param datetime $fechaFinPrimeraFase
     * @return Competicion
     */
    public function setFechaFinPrimeraFase($fechaFinPrimeraFase)
    {
        $this->fechaFinPrimeraFase = $fechaFinPrimeraFase;
        return $this;
    }

    /**
     * Get fechaFinPrimeraFase
     *
     * @return datetime 
     */
    public function getFechaFinPrimeraFase()
    {
        return $this->fechaFinPrimeraFase;
    }

    /**
     * Set fechaComienzoSegundaFase
     *
     * @param datetime $fechaComienzoSegundaFase
     * @return Competicion
     */
    public function setFechaComienzoSegundaFase($fechaComienzoSegundaFase)
    {
        $this->fechaComienzoSegundaFase = $fechaComienzoSegundaFase;
        return $this;
    }

    /**
     * Get fechaComienzoSegundaFase
     *
     * @return datetime 
     */
    public function getFechaComienzoSegundaFase()
    {
        return $this->fechaComienzoSegundaFase;
    }

    /**
     * Set finalizada
     *
     * @param boolean $finalizada
     * @return Competicion
     */
    public function setFinalizada($finalizada)
    {
        $this->finalizada = $finalizada;
        return $this;
    }

    /**
     * Get finalizada
     *
     * @return boolean 
     */
    public function getFinalizada()
    {
        return $this->finalizada;
    }

    /**
     * Set puntosPorGol
     *
     * @param decimal $puntosPorGol
     * @return Competicion
     */
    public function setPuntosPorGol($puntosPorGol)
    {
        $this->puntosPorGol = $puntosPorGol;
        return $this;
    }

    /**
     * Get puntosPorGol
     *
     * @return decimal 
     */
    public function getPuntosPorGol()
    {
        return $this->puntosPorGol;
    }

    /**
     * Set puntosPorArbitro
     *
     * @param decimal $puntosPorArbitro
     * @return Competicion
     */
    public function setPuntosPorArbitro($puntosPorArbitro)
    {
        $this->puntosPorArbitro = $puntosPorArbitro;
        return $this;
    }

    /**
     * Get puntosPorArbitro
     *
     * @return decimal 
     */
    public function getPuntosPorArbitro()
    {
        return $this->puntosPorArbitro;
    }

    /**
     * Set puntosPorPichichi
     *
     * @param decimal $puntosPorPichichi
     * @return Competicion
     */
    public function setPuntosPorPichichi($puntosPorPichichi)
    {
        $this->puntosPorPichichi = $puntosPorPichichi;
        return $this;
    }

    /**
     * Get puntosPorPichichi
     *
     * @return decimal 
     */
    public function getPuntosPorPichichi()
    {
        return $this->puntosPorPichichi;
    }

    /**
     * Set linkBases
     *
     * @param string $linkBases
     * @return Competicion
     */
    public function setLinkBases($linkBases)
    {
        $this->linkBases = $linkBases;
        return $this;
    }

    /**
     * Get linkBases
     *
     * @return string 
     */
    public function getLinkBases()
    {
        return $this->linkBases;
    }

    /**
     * Set linkPartidos
     *
     * @param string $linkPartidos
     * @return Competicion
     */
    public function setLinkPartidos($linkPartidos)
    {
        $this->linkPartidos = $linkPartidos;
        return $this;
    }

    /**
     * Get linkPartidos
     *
     * @return string 
     */
    public function getLinkPartidos()
    {
        return $this->linkPartidos;
    }

    /**
     * Set primeraRondaEliminatoria
     *
     * @param string $primeraRondaEliminatoria
     * @return Competicion
     */
    public function setPrimeraRondaEliminatoria($primeraRondaEliminatoria)
    {
        $this->primeraRondaEliminatoria = $primeraRondaEliminatoria;
        return $this;
    }

    /**
     * Get primeraRondaEliminatoria
     *
     * @return string 
     */
    public function getPrimeraRondaEliminatoria()
    {
        return $this->primeraRondaEliminatoria;
    }

    /**
     * Set proximaCompeticion
     *
     * @param string $proximaCompeticion
     * @return Competicion
     */
    public function setProximaCompeticion($proximaCompeticion)
    {
        $this->proximaCompeticion = $proximaCompeticion;
        return $this;
    }

    /**
     * Get proximaCompeticion
     *
     * @return string 
     */
    public function getProximaCompeticion()
    {
        return $this->proximaCompeticion;
    }

    /**
     * Set bancoNombre
     *
     * @param string $bancoNombre
     * @return Competicion
     */
    public function setBancoNombre($bancoNombre)
    {
        $this->bancoNombre = $bancoNombre;
        return $this;
    }

    /**
     * Get bancoNombre
     *
     * @return string 
     */
    public function getBancoNombre()
    {
        return $this->bancoNombre;
    }

    /**
     * Set bancoCuenta
     *
     * @param string $bancoCuenta
     * @return Competicion
     */
    public function setBancoCuenta($bancoCuenta)
    {
        $this->bancoCuenta = $bancoCuenta;
        return $this;
    }

    /**
     * Get bancoCuenta
     *
     * @return string 
     */
    public function getBancoCuenta()
    {
        return $this->bancoCuenta;
    }

    /**
     * Set bancoTitular
     *
     * @param string $bancoTitular
     * @return Competicion
     */
    public function setBancoTitular($bancoTitular)
    {
        $this->bancoTitular = $bancoTitular;
        return $this;
    }

    /**
     * Get bancoTitular
     *
     * @return string 
     */
    public function getBancoTitular()
    {
        return $this->bancoTitular;
    }

    /**
     * Set numeroPartidosEliminatorias
     *
     * @param integer $numeroPartidosEliminatorias
     * @return Competicion
     */
    public function setNumeroPartidosEliminatorias($numeroPartidosEliminatorias)
    {
        $this->numeroPartidosEliminatorias = $numeroPartidosEliminatorias;
        return $this;
    }

    /**
     * Get numeroPartidosEliminatorias
     *
     * @return integer 
     */
    public function getNumeroPartidosEliminatorias()
    {
        return $this->numeroPartidosEliminatorias;
    }

    /**
     * Set idArbitro
     *
     * @param Enroporra\EnroporraBundle\Entity\Arbitro $idArbitro
     * @return Competicion
     */
    public function setIdArbitro(\Enroporra\EnroporraBundle\Entity\Arbitro $idArbitro = null)
    {
        $this->idArbitro = $idArbitro;
        return $this;
    }

    /**
     * Get idArbitro
     *
     * @return Enroporra\EnroporraBundle\Entity\Arbitro 
     */
    public function getIdArbitro()
    {
        return $this->idArbitro;
    }

    /**
     * Set idPartidoPrimeraRondaEliminatoria
     *
     * @param Enroporra\EnroporraBundle\Entity\Partido $idPartidoPrimeraRondaEliminatoria
     * @return Competicion
     */
    public function setIdPartidoPrimeraRondaEliminatoria(\Enroporra\EnroporraBundle\Entity\Partido $idPartidoPrimeraRondaEliminatoria = null)
    {
        $this->idPartidoPrimeraRondaEliminatoria = $idPartidoPrimeraRondaEliminatoria;
        return $this;
    }

    /**
     * Get idPartidoPrimeraRondaEliminatoria
     *
     * @return Enroporra\EnroporraBundle\Entity\Partido 
     */
    public function getIdPartidoPrimeraRondaEliminatoria()
    {
        return $this->idPartidoPrimeraRondaEliminatoria;
    }
}
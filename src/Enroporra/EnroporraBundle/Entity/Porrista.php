<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Porrista
 *
 * @ORM\Table(name="Porrista")
 * @ORM\Entity
 */
class Porrista
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
     * @var string $apellido
     *
     * @ORM\Column(name="apellido", type="string", length=64, nullable=false)
     */
    private $apellido;

    /**
     * @var string $nick
     *
     * @ORM\Column(name="nick", type="string", length=64, nullable=false)
     */
    private $nick;

    /**
     * @var boolean $pagado
     *
     * @ORM\Column(name="pagado", type="boolean", nullable=false)
     */
    private $pagado;

    /**
     * @var string $formaPago
     *
     * @ORM\Column(name="forma_pago", type="string", length=32, nullable=false)
     */
    private $formaPago;

    /**
     * @var string $telefono
     *
     * @ORM\Column(name="telefono", type="string", length=32, nullable=false)
     */
    private $telefono;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=64, nullable=false)
     */
    private $email;

    /**
     * @var string $comisionero
     *
     * @ORM\Column(name="comisionero", type="string", length=16, nullable=false)
     */
    private $comisionero;

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
     * @var Goleador
     *
     * @ORM\ManyToOne(targetEntity="Goleador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_goleador", referencedColumnName="id")
     * })
     */
    private $idGoleador;

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
     * Set nombre
     *
     * @param string $nombre
     * @return Porrista
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
     * Set apellido
     *
     * @param string $apellido
     * @return Porrista
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set nick
     *
     * @param string $nick
     * @return Porrista
     */
    public function setNick($nick)
    {
        $this->nick = $nick;
        return $this;
    }

    /**
     * Get nick
     *
     * @return string 
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set pagado
     *
     * @param boolean $pagado
     * @return Porrista
     */
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;
        return $this;
    }

    /**
     * Get pagado
     *
     * @return boolean 
     */
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * Set formaPago
     *
     * @param string $formaPago
     * @return Porrista
     */
    public function setFormaPago($formaPago)
    {
        $this->formaPago = $formaPago;
        return $this;
    }

    /**
     * Get formaPago
     *
     * @return string 
     */
    public function getFormaPago()
    {
        return $this->formaPago;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Porrista
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Porrista
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set comisionero
     *
     * @param string $comisionero
     * @return Porrista
     */
    public function setComisionero($comisionero)
    {
        $this->comisionero = $comisionero;
        return $this;
    }

    /**
     * Get comisionero
     *
     * @return string 
     */
    public function getComisionero()
    {
        return $this->comisionero;
    }

    /**
     * Set idArbitro
     *
     * @param Enroporra\EnroporraBundle\Entity\Arbitro $idArbitro
     * @return Porrista
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
     * Set idGoleador
     *
     * @param Enroporra\EnroporraBundle\Entity\Goleador $idGoleador
     * @return Porrista
     */
    public function setIdGoleador(\Enroporra\EnroporraBundle\Entity\Goleador $idGoleador = null)
    {
        $this->idGoleador = $idGoleador;
        return $this;
    }

    /**
     * Get idGoleador
     *
     * @return Enroporra\EnroporraBundle\Entity\Goleador 
     */
    public function getIdGoleador()
    {
        return $this->idGoleador;
    }

    /**
     * Set idCompeticion
     *
     * @param Enroporra\EnroporraBundle\Entity\Competicion $idCompeticion
     * @return Porrista
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
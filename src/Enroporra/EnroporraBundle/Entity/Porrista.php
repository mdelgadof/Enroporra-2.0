<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Porrista
 */
class Porrista
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
     * @var string $apellido
     */
    private $apellido;

    /**
     * @var string $nick
     */
    private $nick;

    /**
     * @var integer $id_goleador
     */
    private $id_goleador;

    /**
     * @var integer $id_arbitro
     */
    private $id_arbitro;

    /**
     * @var integer $id_competicion
     */
    private $id_competicion;

    /**
     * @var boolean $pagado
     */
    private $pagado;

    /**
     * @var string $forma_pago
     */
    private $forma_pago;

    /**
     * @var string $telefono
     */
    private $telefono;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $comisionero
     */
    private $comisionero;

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
     * Set id_goleador
     *
     * @param integer $idGoleador
     * @return Porrista
     */
    public function setIdGoleador($idGoleador)
    {
        $this->id_goleador = $idGoleador;
        return $this;
    }

    /**
     * Get id_goleador
     *
     * @return integer
     */
    public function getIdGoleador()
    {
        return $this->id_goleador;
    }

    /**
     * Set id_arbitro
     *
     * @param integer $idArbitro
     * @return Porrista
     */
    public function setIdArbitro($idArbitro)
    {
        $this->id_arbitro = $idArbitro;
        return $this;
    }

    /**
     * Get id_arbitro
     *
     * @return integer
     */
    public function getIdArbitro()
    {
        return $this->id_arbitro;
    }

    /**
     * Set id_competicion
     *
     * @param integer $idCompeticion
     * @return Porrista
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
     * Set forma_pago
     *
     * @param string $formaPago
     * @return Porrista
     */
    public function setFormaPago($formaPago)
    {
        $this->forma_pago = $formaPago;
        return $this;
    }

    /**
     * Get forma_pago
     *
     * @return string
     */
    public function getFormaPago()
    {
        return $this->forma_pago;
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
}
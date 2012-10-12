<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Arbitro
 *
 * @ORM\Table(name="Arbitro")
 * @ORM\Entity
 */
class Arbitro
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
     * @return Arbitro
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
     * Set idCompeticion
     *
     * @param Enroporra\EnroporraBundle\Entity\Competicion $idCompeticion
     * @return Arbitro
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
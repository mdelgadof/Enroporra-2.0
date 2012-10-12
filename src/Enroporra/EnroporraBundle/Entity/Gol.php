<?php

namespace Enroporra\EnroporraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enroporra\EnroporraBundle\Entity\Gol
 *
 * @ORM\Table(name="Gol")
 * @ORM\Entity
 */
class Gol
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
     * @var Partido
     *
     * @ORM\ManyToOne(targetEntity="Partido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_partido", referencedColumnName="id")
     * })
     */
    private $idPartido;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idPartido
     *
     * @param Enroporra\EnroporraBundle\Entity\Partido $idPartido
     * @return Gol
     */
    public function setIdPartido(\Enroporra\EnroporraBundle\Entity\Partido $idPartido = null)
    {
        $this->idPartido = $idPartido;
        return $this;
    }

    /**
     * Get idPartido
     *
     * @return Enroporra\EnroporraBundle\Entity\Partido 
     */
    public function getIdPartido()
    {
        return $this->idPartido;
    }

    /**
     * Set idGoleador
     *
     * @param Enroporra\EnroporraBundle\Entity\Goleador $idGoleador
     * @return Gol
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
}
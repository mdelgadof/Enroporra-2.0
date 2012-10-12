<?php

namespace Enroporra\EnroporraBundle\EntityExtended;

use Enroporra\EnroporraBundle\Entity\Goleador;

class cGoleador extends Goleador
{

    private $goles;
    private $es_pichichi;
    private $bandera;
    private $nombre_equipo;
    private $em;

    function __construct($goleador, $em)
    {
        $this->setId($goleador->getId());
        $this->setNombre($goleador->getNombre());
        $this->setApellido($goleador->getApellido());
        $this->setIdEquipo($goleador->getIdEquipo());
        $this->em = $em;

        $repGoles = $this->em->getRepository('EnroporraBundle:Gol');
        $resGoles = $repGoles->createQueryBuilder('g')
            ->select('COUNT(g.id) as numero')
            ->where('g.idGoleador = :idGoleador')
            ->setParameter('idGoleador', $goleador->getId())
            ->getQuery()
            ->getResult();

        $this->setGoles($resGoles[0]["numero"]);

        $resGoles = $repGoles->createQueryBuilder('g')
            ->select('COUNT(g.idGoleador) as numero')
            ->groupBy('g.idGoleador')
            ->orderBy('numero','DESC')
            ->getQuery()
            ->getResult();

        $this->setEsPichichi($this->getGoles()==$resGoles[0]["numero"]);

        $equipo = $goleador->getIdEquipo();

        $this->setBandera($equipo->getBandera());
        $this->setNombreEquipo($equipo->getNombre());

//         ob_start();
//          var_dump($equipo);
//          $this->setNombreEquipo(ob_get_contents());
//          ob_end_clean();
    }

    /**
     * Set Id
     *
     * @param integer $id
     * @return cGoleador
     */
    private function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set goles
     *
     * @param integer $goles
     * @return cGoleador
     */
    public function setGoles($goles)
    {
        $this->goles = $goles;
        return $this;
    }

    /**
     * Get goles
     *
     * @return integer
     */
    public function getGoles()
    {
        return $this->goles;
    }

    /**
     * Set bander
     *
     * @param string $bandera
     * @return cGoleador
     */
    public function setBandera($bandera)
    {
        $this->bandera = $bandera;
        return $this;
    }

    /**
     * Get bandera
     *
     * @return string
     */
    public function getBandera()
    {
        return $this->bandera;
    }

    /**
     * Set nombre equipo
     *
     * @param string $nombreEquipo
     * @return cGoleador
     */
    public function setNombreEquipo($nombreEquipo)
    {
        $this->nombre_equipo = $nombreEquipo;
        return $this;
    }

    /**
     * Get nombre equipo
     *
     * @return string
     */
    public function getNombreEquipo()
    {
        return $this->nombre_equipo;
    }

    /**
     * Set es pichichi
     *
     * @param boolean $esPichichi
     * @return cGoleador
     */
    public function setEsPichichi($esPichichi)
    {
        $this->es_pichichi = $esPichichi;
        return $this;
    }

    /**
     * Get es pichichi
     *
     * @return boolean
     */
    public function getEsPichichi()
    {
        return $this->es_pichichi;
    }


}
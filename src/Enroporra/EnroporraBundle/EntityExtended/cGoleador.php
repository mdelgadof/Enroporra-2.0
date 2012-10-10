<?php

namespace Enroporra\EnroporraBundle\EntityExtended;

use Enroporra\EnroporraBundle\Entity\Goleador;

class cGoleador extends Goleador
{

    private $goles;
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
            ->where('g.id_goleador = :id_goleador')
            ->setParameter('id_goleador', $goleador->getId())
            ->getQuery()
            ->getResult();

        $this->setGoles($resGoles[0]["numero"]);

        $repEquipo = $this->em->getRepository('EnroporraBundle:Equipo');
        $equipo = $repEquipo->find($goleador->getIdEquipo());

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

    public function calculaGoles()
    {


        /* $partidos = $repGoles->createQueryBuilder('g')
          ->select($partidos->expr()->count())
          ->where('p.fecha <= :fecha', 'p.resultado1 >= :resultado1')
          ->setParameter('fecha', date("Y-m-d"))
          ->setParameter('resultado1', 0)
          ->getQuery()
          ->getResult();

          $query = "SELECT j.nombre nombrej,e.nombre nombree,e.bandera,count(g.id) goles FROM equipo e,jugador j LEFT JOIN goles g ON g.id_goleador=j.id WHERE j.id_equipo=e.id AND j.id='" . $porrista["id_goleador"] . "' GROUP BY j.id";

          $this->setGoles($goles); */
    }

}
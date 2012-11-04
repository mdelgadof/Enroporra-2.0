<?php

namespace Enroporra\EnroporraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Enroporra\EnroporraBundle\EntityExtended\cPorrista;
use Enroporra\EnroporraBundle\EntityExtended\cGoleador;

class ClasificacionController extends Controller
{

    public $clasificacion;
    public $PROXIMOS_PARTIDOS;
    public $amigos;

    public function __construct()
    {
        $this->PROXIMOS_PARTIDOS = 4;
    }
    
    

    public function indexAction()
    {
        $this->getAmigos();

        $this->clasificacion("completa");

        return $this->render('EnroporraBundle:Front:clasificacion.html.twig', array('clasificacion' => $this->clasificacion)
        );
    }

    public function amigosAction()
    {
        $this->getAmigos();

        $this->clasificacion("amigos");

        return $this->render('EnroporraBundle:Front:clasificacion_amigos.html.twig', array('clasificacion' => $this->clasificacion, 'participantes' => $this->getListadoParticipantes())
        );
    }

    public function detalleAction($competicion, $nick)
    {
        $arbitro = $pichichi = $goles = "";
        $apuestas = array();

        $repPorristas = $this->getDoctrine()->getRepository('EnroporraBundle:Porrista');
        $repApuestas = $this->getDoctrine()->getRepository('EnroporraBundle:Apuesta');
        $repGoles = $this->getDoctrine()->getRepository('EnroporraBundle:Gol');

        $resPorrista = $repPorristas->createQueryBuilder('p')
            ->where('p.pagado = :pagado AND p.nick = :nick AND p.idCompeticion = :idCompeticion')
            ->setParameter('pagado', 1)
            ->setParameter('nick', $nick)
            ->setParameter('idCompeticion', $competicion)
            ->getQuery()
            ->getResult();
        if (!count($resPorrista))
            throw $this->createNotFoundException('Usuario no existente');

        $porrista = $resPorrista[0];

        // Acertar árbitro de la final: se rellena la variable $arbitro
        if (($porrista->getIdArbitro() == $porrista->getIdCompeticion()->getIdArbitro()) && $porrista->getIdArbitro())
            $arbitro = $porrista->getIdArbitro();

        // Acertar Pichichi: se rellena la variable $pichichi
        $cGoleador = new cGoleador($porrista->getIdGoleador(), $this->getDoctrine());
        if ($porrista->getIdCompeticion()->getFinalizada() && $cGoleador->getEsPichichi())
            $pichichi = $porrista->getIdGoleador();

        // Puntos por cada gol del goleador elegido
        $goles = $repGoles->createQueryBuilder('g')
            ->where('g.idGoleador = :idGoleador')
            ->setParameter('idGoleador', $porrista->getIdGoleador())
            ->getQuery()
            ->getResult();

        // Puntos por cada partido acertado
        $resApuestas = $repApuestas->createQueryBuilder('a')
            ->where('a.idPorrista = :idPorrista')
            ->setParameter('idPorrista', $porrista)
            ->getQuery()
            ->getResult();
        foreach ($resApuestas as $apuesta) {
            // Verificamos que el partido se ha disputado (de lo contrario tiene en el resultado un empate a -1)
            if ($apuesta->getIdPartido()->getResultado1() < 0)
                continue;

            if ($apuesta->getQuiniela() == $apuesta->getIdPartido()->getQuiniela()) {
                if ($apuesta->getQuiniela() == 0 ||
                    ($apuesta->getQuiniela() == 1 && $apuesta->getIdEquipo1()->getId() == $apuesta->getIdPartido()->getIdEquipo1()->getId()) ||
                    ($apuesta->getQuiniela() == 2 && $apuesta->getIdEquipo2()->getId() == $apuesta->getIdPartido()->getIdEquipo2()->getId())
                ) {
                    $apuestas[] = $apuesta;
                }
            }
        }

        return $this->render('EnroporraBundle:Front:clasificacion_detalle.html.twig', array('arbitro' => $arbitro, 'pichichi' => $pichichi, 'goles' => $goles, 'apuestas' => $apuestas, 'porrista' => $porrista));
    }

    public function setlistadoamigosAction($competicion, $nick, $valor)
    {

        $repPorristas = $this->getDoctrine()->getRepository('EnroporraBundle:Porrista');

        $resPorrista = $repPorristas->createQueryBuilder('p')
            ->where('p.pagado = :pagado AND p.nick = :nick AND p.idCompeticion = :idCompeticion')
            ->setParameter('pagado', 1)
            ->setParameter('nick', $nick)
            ->setParameter('idCompeticion', $competicion)
            ->getQuery()
            ->getResult();
        if (!count($resPorrista))
            throw $this->createNotFoundException('Usuario no existente');
        if ($valor != 0 && $valor != 1)
            throw $this->createNotFoundException('Valor no posible');

        $amigosEnro = $this->getRequest()->cookies->get("amigosEnro");

        if ($valor) {
            if ($amigosEnro) {
                if (strpos("," . $nick . ",", $amigosEnro) === false) {
                    $amigosEnro.=$nick . ",";
                }
            }
            else
                $amigosEnro = "," . $nick . ",";
        }
        else {
            if ($amigosEnro) {
                $amigosEnro = str_replace("," . $nick . ",", ",", $amigosEnro);
                $amigosEnro = str_replace("," . $nick . ",", ",", $amigosEnro);
                if ($amigosEnro == ",")
                    $amigosEnro = "";
            }
        }

        setcookie("amigosEnro", $amigosEnro, time() + 60 * 60 * 24 * 30, "/");
        return $this->render('EnroporraBundle:Front:clasificacion_amigos_setlistado.html.twig', array('amigosEnro' => $amigosEnro));
    }

    public function getAmigos()
    {
        $this->amigos = array();
        $cookieAmigos = $this->getRequest()->cookies->get("amigosEnro");

        if (!strlen($cookieAmigos)) {
            return;
        }

        $temp = explode(",", $cookieAmigos);
        if (!count($temp))
            return;
        foreach ($temp as $amigo)
            $this->amigos[] = strtolower(str_replace("'", "", $amigo));
    }

    public function cmp($a, $b)
    {
        if ($a->getPuntos() == $b->getPuntos()) {
            return (strtoupper(str_replace("Á", "A", str_replace("Ó", "O", $a->getNombre()))) < strtoupper(str_replace("Á", "A", str_replace("Ó", "O", $b->getNombre())))) ? -1 : 1;
        }
        return ($a->getPuntos() < $b->getPuntos()) ? 1 : -1;
    }

    public function clasificacion($tipo = "completa")
    {

        $this->clasificacion["tipo"] = $tipo;
        $this->clasificacion["destacados"] = ($tipo == "completa") ? 5 : 1;

        $repPartidos = $this->getDoctrine()->getRepository('EnroporraBundle:Partido');
        $repPorristas = $this->getDoctrine()->getRepository('EnroporraBundle:Porrista');
        $repApuestas = $this->getDoctrine()->getRepository('EnroporraBundle:Apuesta');

        $partidos = $repPartidos->createQueryBuilder('p')
            ->where('p.fecha <= :fecha', 'p.resultado1 >= :resultado1')
            ->setParameter('fecha', date("Y-m-d"))
            ->setParameter('resultado1', 0)
            ->getQuery()
            ->getResult();

        $this->clasificacion["numeroPartidos"] = count($partidos);

        if ($this->clasificacion["numeroPartidos"]) {

            $nombresExistentes = array();
            $goleadoresActuales = array();

            $comenzoSegundaFase = (date("Y-m-d H:i:s") > $this->container->getParameter('enroporra_ca_fecha_comienzo_fase2'));
            $condicionFase = ($comenzoSegundaFase) ? 'f.faseDeGrupos <= :fase' : 'f.faseDeGrupos = :fase';

            $resProximosPartidos = $repPartidos->createQueryBuilder('p')
                ->select('p.id')
                ->leftJoin('p.idFase', 'f')
                ->where('p.resultado1 = :resultado1', $condicionFase)
                ->setParameter('fase', 1)
                ->setParameter('resultado1', -1)
                ->orderBy('p.fecha', 'ASC', 'p.hora', 'ASC')
                ->setMaxResults($this->PROXIMOS_PARTIDOS)
                ->getQuery()
                ->getResult();
            $proximosPartidos = array();
            foreach ($resProximosPartidos as $proximoPartido) {
                $proximosPartidos[] = $proximoPartido["id"];
            }

            $porristasBD = $repPorristas->createQueryBuilder('p')
                ->where('p.pagado = :pagado')
                ->setParameter('pagado', 1)
                ->getQuery()
                ->getResult();

            // Generamos un array de cPorrista que tiene métodos y variables extendidas a Porrista. Así no tocamos la Entity
            $porristas = $porristasAmigos = array();
            foreach ($porristasBD as $porrista) {
                $porristas[] = new cPorrista($porrista, $this->getDoctrine(), $this->container);
            }

            foreach ($porristas as $clave => $porrista) {

                if ($tipo == "amigos" && !in_array(strtolower($porrista->getNick()), $this->amigos))
                    continue;
                else if ($tipo == "amigos")
                    $porristasAmigos[] = $porrista;

                if (count($proximosPartidos)) {
                    $proximasApuestas = $repApuestas->createQueryBuilder('a')
                        ->where('a.idPorrista = :idPorrista AND a.idPartido IN (:proximosPartidos)')
                        ->setParameter('proximosPartidos', $proximosPartidos)
                        ->setParameter('idPorrista', $porrista->getIdp())
                        ->getQuery()
                        ->getResult();
                    $porristas[$clave]->setProximasApuestas($proximasApuestas);
                }

                $porristas[$clave]->setNombre($this->get("enroporra.apellidos_con_tilde")->convertir($porrista->getNombre() . " " . $porrista->getApellido()));
                if (in_array($porrista->getNombre(), $nombresExistentes))
                    $porristas[$clave]->setNombre($porrista->getNombre() . " (2)");
                else
                    $nombresExistentes[] = $porrista->getNombre();

                if (!isset($goleadoresActuales[$porrista->getIdGoleador()->getId()])) {
                    $goleadoresActuales[$porrista->getIdGoleador()->getId()] = new cGoleador($porrista->getIdGoleador(), $this->getDoctrine());
                }
                $porristas[$clave]->setGoleador($goleadoresActuales[$porrista->getIdGoleador()->getId()]);
                $porristas[$clave]->calculaPuntos();
            }

            if ($tipo == "amigos")
                $porristas = $porristasAmigos;

            usort($porristas, array($this, "cmp"));

            $puestoClasificacion = $puestoImpreso = $ultimoPuestoImpreso = 1;
            $puntuacionAnterior = "";
            $par = true;
            foreach ($porristas as $clave => $porrista) {

                if ($par) {
                    $porristas[$clave]->setBgColor("#DDDDDD");
                    $par = false;
                } else {
                    $porristas[$clave]->setBgColor("#EEEEEE");
                    $par = true;
                }
                $nickRegistrado = $this->getRequest()->cookies->get("nickRegistrado");
                if ($nickRegistrado && strtolower($porrista->getNick()) == strtolower($nickRegistrado)) {
                    $porristas[$clave]->setBgColor("#FFFF00");
                } else if ($tipo == "completa" && in_array(strtolower($porrista->getNick()), $this->amigos)) {
                    $porristas[$clave]->setBgColor("#DDAA33");
                }

                $puestoImpreso = ($puntuacionAnterior == $porrista->getPuntos()) ? "" : $puestoClasificacion;
                $porristas[$clave]->setClasificacion($puestoImpreso);

                if ($puestoImpreso == $puestoClasificacion)
                    $ultimoPuestoImpreso = $puestoImpreso;
                $porristas[$clave]->setDestacado($ultimoPuestoImpreso <= $this->clasificacion["destacados"]);

                $puntuacionAnterior = $porrista->getPuntos();
                $puestoClasificacion++;
            }

            $this->clasificacion["porristas"] = $porristas;
        }
    }

    public function getListadoParticipantes()
    {

        $repPorristas = $this->getDoctrine()->getRepository('EnroporraBundle:Porrista');
        $porristasBD = $repPorristas->createQueryBuilder('p')
            ->where('p.pagado = :pagado')
            ->setParameter('pagado', 1)
            ->orderBy('p.nombre, p.apellido', 'ASC')
            ->getQuery()
            ->getResult();
        $participantes = array();

        foreach ($porristasBD as $porrista) {
            $participante = array();
            $participante["nick"] = $porrista->getNick();
            $participante["nombre"] = $this->get("enroporra.apellidos_con_tilde")->convertir($porrista->getNombre() . " " . $porrista->getApellido());
            if (in_array(strtolower($porrista->getNick()), $this->amigos))
                $participante["checked"] = "checked";
            else
                $participante["checked"] = "";
            $participantes[] = $participante;
        }

        return $participantes;
    }

}
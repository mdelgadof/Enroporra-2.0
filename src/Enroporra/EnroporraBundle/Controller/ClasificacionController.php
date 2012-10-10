<?php

namespace Enroporra\EnroporraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Enroporra\EnroporraBundle\EntityExtended\cPorrista;
use Enroporra\EnroporraBundle\EntityExtended\cGoleador;

class ClasificacionController extends Controller
{

    public $base;
    public $clasificacion;
    public $PROXIMOS_PARTIDOS;
    public $amigos;

    public function __construct()
    {
        $this->PROXIMOS_PARTIDOS = 4;
    }

    public function indexAction()
    {
        // Estas dos líneas van aquí porque no las puedo meter en el constructor. Dice que no puedo aplicar el método get y sospecho que es porque no ha terminado todavía de construir el objeto
        $this->base = $this->get("enroporra.base");
        $this->getAmigos();

        $this->clasificacion("completa");

        return $this->render('EnroporraBundle:Front:clasificacion.html.twig', array('base' => $this->base, 'clasificacion' => $this->clasificacion)
        );
    }

    public function amigosAction()
    {
        // Estas dos líneas van aquí porque no las puedo meter en el constructor. Dice que no puedo aplicar el método get y sospecho que es porque no ha terminado todavía de construir el objeto
        $this->base = $this->get("enroporra.base");
        $this->getAmigos();

        $this->clasificacion("amigos");

        return $this->render('EnroporraBundle:Front:clasificacion.html.twig', array('base' => $this->base, 'clasificacion' => $this->clasificacion)
        );
    }

    public function getAmigos()
    {
        $this->amigos = array();
        $cookieAmigos = $this->base->getCookieAmigos();

        if (!strlen($cookieAmigos))
            return;

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
        $repGoleador = $this->getDoctrine()->getRepository('EnroporraBundle:Goleador');

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

            $comenzoSegundaFase = (date("Y-m-d H:i:s") > "2012-06-21 20:45:00");
            $condicionFase = ($comenzoSegundaFase) ? 'p.fase >= :fase' : 'p.fase = :fase';

            $proximosPartidos = $repPartidos->createQueryBuilder('p')
                ->where('p.resultado1 < :resultado1', $condicionFase)
                ->setParameter('fase', 1)
                ->setParameter('resultado1', 0)
                ->orderBy('p.fecha', 'ASC', 'p.hora', 'ASC')
                ->setMaxResults($this->PROXIMOS_PARTIDOS)
                ->getQuery()
                ->getResult();

            $porristasBD = $repPorristas->createQueryBuilder('p')
                ->where('p.pagado = :pagado')
                ->setParameter('pagado', 1)
                ->getQuery()
                ->getResult();

            // Generamos un array de cPorrista que tiene métodos y variables extendidas a Porrista. Así no tocamos la Entity
            $porristas = array();
            foreach ($porristasBD as $porrista) {
                $porristas[] = new cPorrista($porrista, $this->getDoctrine());
            }

            foreach ($porristas as $clave => $porrista) {

                $porristas[$clave]->setNombre($this->get("enroporra.apellidos_con_tilde")->convertir($porrista->getNombre() . " " . $porrista->getApellido()));
                if (in_array($porrista->getNombre(), $nombresExistentes))
                    $porristas[$clave]->setNombre($porrista->getNombre() . " (2)");
                else
                    $nombresExistentes[] = $porrista->getNombre();

                if (!isset($goleadoresActuales[$porrista->getIdGoleador()])) {
                    $goleadoresActuales[$porrista->getIdGoleador()] = new cGoleador($repGoleador->find($porrista->getIdGoleador()), $this->getDoctrine());
                }
                $porristas[$clave]->setGoleador($goleadoresActuales[$porrista->getIdGoleador()]);

                if ($tipo == "amigos") {
                    if (!in_array(strtolower($porrista->getNick()), $this->amigos))
                        array_splice($porristas, $clave, 1);
                }
            }

            usort($porristas, array($this, "cmp"));

            $puestoClasificacion = $puestoImpreso = $ultimoPuestoImpreso = 1;
            $puntuacionAnterior = "";
            $estiloDestacado = true;
            $par = true;
            foreach ($porristas as $clave => $porrista) {

                if ($par) {
                    $porristas[$clave]->setBgColor("#DDDDDD");
                    $par = false;
                } else {
                    $porristas[$clave]->setBgColor("#EEEEEE");
                    $par = true;
                }
                if (isset($this->base->cookieNick) && strtolower($porrista->getNick()) == strtolower($this->base->cookieNick)) {
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
            return;

//
//                $stringProximasApuestas = apuestaPartidos($porrista["id"], $proximosPartidos);
//                if (!count($proximosPartidos)) {
//                    if (date("Y-m-d H:i:s") < "2012-06-21 20:30:00")
//                        $stringProximasApuestas = "&nbsp;Cuando comience la siguiente fase publicaremos todas las apuestas&nbsp;";
//                }
//                if ($porrista["id_arbitro"] > 0 && date("Y-m-d H:i:s") < "2012-06-21 20:45:00") {
//                    $query = "SELECT COUNT( * ) FROM partido p, apuesta a WHERE a.id_partido = p.id AND p.fase >1 AND a.id_equipo1 >0 AND a.id_equipo2 >0 AND a.id_porrista =" . $porrista["id"];
//                    $resComprobacion = mysql_query($query, $conexion);
//                    $partidosSegundaFase = mysql_fetch_array($resComprobacion);
//                    $partidosSegundaFase = $partidosSegundaFase[0];
//                    if ($partidosSegundaFase == $PARTIDOS_SEGUNDA_FASE)
//                        $segundaFaseOK = "<span class='green'>2ª Fase OK</span>";
//                    else
//                        $segundaFaseOK = "<span class='black'>Problema rellenando segunda fase</span>";
//                }
//                else
//                    $segundaFaseOK = "";
//
//                $devuelve.= "<tr " . $colorDestacado . "><td nowrap>";
//                $devuelve.= $head1 . "&nbsp;<span class='red'><b>" . $clasificacionString . "</b></span>" . $head2 . "</td><td nowrap>" . $head1 . "&nbsp;" . $porrista["nombre"] . " [<span class='red'><b>" . $porrista["puntos"] . "</b></span>]&nbsp;" . $head2 . $segundaFaseOK . $retorno . $stringGoleador[$porrista["id_goleador"]];
//                $devuelve.= "</td><td width='20'></td><td align='center' bgColor='#FFFFFF' style='padding: 0px 0px 0px 10px;'>";
//                $devuelve.= "<div id='enlace_" . str_replace(" ", "", strtoupper($porrista["nick"])) . "'><a alt='Ver los puntos que lleva " . $porrista["nombre"] . "' href='javascript:verDetalle(\"" . str_replace(" ", "", strtoupper($porrista["nick"])) . "\")'><img src='" . WEB_ROOT . "/images/bombilla.jpg' alt='Ver los puntos que lleva " . $porrista["nombre"] . "' width=32 height=32></a></div>";
//                $devuelve.= "</td><td align='center' bgColor='#FFFFFF'><a href='" . WEB_ROOT . "/cuenta.php?accion=ver&nick=" . $porrista["nick"] . "'><img src='" . WEB_ROOT . "/images/sobre.jpg' alt='Ver la apuesta completa de " . $porrista["nombre"] . "' width=32 height=32></a></td>";
//                $devuelve.= "<td " . $colorFuturaApuesta . " nowrap>" . $stringProximasApuestas . "</td>";
//                $devuelve.= "</tr>";
//                $devuelve.= "<tr><td colspan='5'>";
//                $devuelve.= "<div id='detalle_" . str_replace(" ", "", strtoupper($porrista["nick"])) . "' style='display:none'><p>" . $porrista["string"] . "</p></div>";
//                $devuelve.= "</td></tr>";
//            }
//            $devuelve.= "</table><br><br>";
        } // END existen partidos reales
        else {
            $devuelve.= "<p>Todavía no ha comenzado " . $NOMBRE_TORNEO . " en Enroporra :)</p>";
        }

        $WEB_ROOT = WEB_ROOT;
        $devuelve.= <<< EOT
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js'></script>
		<script type='text/javascript'>
		function verDetalle(nombre) {
			$("#detalle_"+nombre).show();
			$("#enlace_"+nombre).html("<a href='javascript:ocultarDetalle(\""+nombre+"\")'><img src='$WEB_ROOT/images/bombillaoff.jpg' alt='Ver los puntos que lleva "+nombre+"' width=32 height=32></a>");
		}
		function ocultarDetalle(nombre) {
			$("#detalle_"+nombre).hide();
			$("#enlace_"+nombre).html("<a href='javascript:verDetalle(\""+nombre+"\")'><img src='$WEB_ROOT/images/bombilla.jpg' alt='Ver los puntos que lleva "+nombre+"' width=32 height=32></a>");
		}

		</script>
EOT;

        return $devuelve;
    }

}
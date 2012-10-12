<?php

namespace Enroporra\EnroporraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public $base;

    public function indexAction()
    {
        // Esta línea va aquí porque no la puedo meter en el constructor. Dice que no puedo aplicar el método get y sospecho que es porque no ha terminado todavía de construir el objeto
        $this->base = $this->get("enroporra.base");
        $this->base->init($this->getDoctrine());

        $repNoticia = $this->getDoctrine()->getRepository('EnroporraBundle:Noticia');
        $noticias = $repNoticia->findByActiva(1);

        return $this->render('EnroporraBundle:Front:index.html.twig',
            array('noticias' => $noticias, 'base' => $this->base)
        );
    }

}

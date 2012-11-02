<?php

namespace Enroporra\EnroporraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        global $app;
        $repNoticia = $this->getDoctrine()->getRepository('EnroporraBundle:Noticia');
        $noticias = $repNoticia->findByActiva(1);
        $debug = "-".$app."-";
        return $this->render('EnroporraBundle:Front:index.html.twig',array('noticias' => $noticias, 'debug' => $debug));
    }

}

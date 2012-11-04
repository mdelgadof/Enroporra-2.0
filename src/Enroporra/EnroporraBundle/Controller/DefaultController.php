<?php

namespace Enroporra\EnroporraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        $repNoticia = $this->getDoctrine()->getRepository('EnroporraBundle:Noticia');
        $noticias = $repNoticia->findByActiva(1);

        return $this->render('EnroporraBundle:Front:index.html.twig',
            array('noticias' => $noticias)
        );
    }

}

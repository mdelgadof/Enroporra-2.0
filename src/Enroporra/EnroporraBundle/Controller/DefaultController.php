<?php

namespace Enroporra\EnroporraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public $base;

    public function __construct()
    {
        $this->base["banner"] = rand(1,12);
        $this->base["year"] = date("Y");
        $this->base["competition"] = "Eurocopa 2012";
        $this->base["contact"] = "miguel.delgado@gmail.com";
    }

    public function indexAction()
    {
        $repNoticia = $this->getDoctrine()->getRepository('EnroporraBundle:Noticia');
        $noticias = $repNoticia->findByActiva(1);

        return $this->render('EnroporraBundle:Front:index.html.twig',
            array('noticias' => $noticias, 'base' => $this->base)
        );
    }
}

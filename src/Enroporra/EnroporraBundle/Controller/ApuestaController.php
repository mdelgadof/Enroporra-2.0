<?php

namespace Enroporra\EnroporraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApuestaController extends Controller
{

    public function indexAction()
    {

        return $this->render('EnroporraBundle:Front:apuesta.html.twig', array()
        );
    }


}
<?php

namespace Enroporra\EnroporraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $banner = rand(1,12);
        $year = date("Y");
        $competition = "Eurocopa 2012";
        $contact = "miguel.delgado@gmail.com";
        return $this->render('EnroporraBundle:Default:index.html.twig',
            array('banner' => $banner, 'year' => $year, 'competition' => $competition, 'contact' => $contact)
        );
    }
}

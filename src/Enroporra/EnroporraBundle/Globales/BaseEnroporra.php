<?php

namespace Enroporra\EnroporraBundle\Globales;

use Enroporra\EnroporraBundle\Entity\Competicion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseEnroporra
{

    private $cookie_amigos;
    private $cookie_nick;
    public $debug;

    public function init($em)
    {
        $repCompeticion = $em->getRepository('EnroporraBundle:Competicion');

        if (isset($_COOKIE["amigosEnro"]))
            $this->setCookieAmigos($_COOKIE["amigosEnro"]);
        if (isset($_COOKIE["nickRegistrado"]))
            $this->setCookieNick($_COOKIE["nickRegistrado"]);
        date_default_timezone_set("Europe/Madrid");
    }

    public function setCookieAmigos($cookieAmigos)
    {
        $this->cookie_amigos = $cookieAmigos;
        return $this;
    }

    public function getCookieAmigos()
    {
        return $this->cookie_amigos;
    }

    public function setCookieNick($cookieNick)
    {
        $this->cookie_nick = $cookieNick;
        return $this;
    }

    public function getCookieNick()
    {
        return $this->cookie_nick;
    }

}

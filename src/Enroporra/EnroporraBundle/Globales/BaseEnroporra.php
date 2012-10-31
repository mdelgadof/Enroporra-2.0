<?php

namespace Enroporra\EnroporraBundle\Globales;

use Enroporra\EnroporraBundle\Entity\Competicion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseEnroporra
{

    private $year;
    private $banner;
    private $contact;
    private $active_competition;
    private $competition;
    private $cookie_amigos;
    private $cookie_nick;
    public $debug;

    public function init($em,$activeCompetition = 2)
    {
        $this->year = date("Y");
        $this->banner = rand(1, 12);
        $this->contact = "comisionporra@gmail.com";
        $this->active_competition = $activeCompetition;

        $repCompeticion = $em->getRepository('EnroporraBundle:Competicion');
        $this->competition = $repCompeticion->find($this->active_competition);

        if (isset($_COOKIE["amigosEnro"]))
            $this->setCookieAmigos($_COOKIE["amigosEnro"]);
        if (isset($_COOKIE["nickRegistrado"]))
            $this->setCookieNick($_COOKIE["nickRegistrado"]);
        date_default_timezone_set("Europe/Madrid");
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getBanner()
    {
        return $this->banner;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function getCompetition()
    {
        return $this->competition;
    }

    public function getActiveCompetition()
    {
        return $this->active_competition;
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

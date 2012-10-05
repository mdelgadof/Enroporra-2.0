<?php

namespace Enroporra\EnroporraBundle\Globales;

class BaseEnroporra
{

    private $year;
    private $banner;
    private $contact;
    private $competition;
    private $cookie_amigos;
    private $cookie_nick;

    public function __construct()
    {
        $this->year = date("Y");
        $this->banner = rand(1, 12);
        $this->contact = "comisionporra@gmail.com";

        // Cambiar para poder usar varias competiciones. Todos los datos de competition deberían sacarse de BD
        $this->competition["name"] = "la Eurocopa 2012";
        $this->competition["link_basis"] = "docs/bases_europorra_2012.pdf";
        $this->competition["link_matches"] = "docs/partidos_euro2012.pdf";
        $this->competition["second_draw_first_round"] = "cuartos de final";
        $this->competition["next_competition"] = "el Mundial 2014";
        $this->competition["bank_name"] = "Bankia";
        $this->competition["bank_account"] = "2038 1900 17 3000 142806";
        $this->competition["bank_account_owner"] = "Federico de la Torriente Gutiérrez";
        $this->competition["id_first_match_second_draw"] = 225;
        $this->competition["second_draw_number_matches"] = 7;

        if (isset($_COOKIE["amigosEnro"])) $this->cookieAmigos = $_COOKIE["amigosEnro"];
        if (isset($_COOKIE["nickRegistrado"])) $this->cookieNick = $_COOKIE["nickRegistrado"];
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

    public function getCookieAmigos()
    {
        return $this->cookie_amigos;
    }

    public function getCookieNick()
    {
        return $this->cookie_nick;
    }

}

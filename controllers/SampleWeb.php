<?php

namespace controllers;

use controllers\base\Web;
use utils\Template;

class SampleWeb extends Web
{
    function connexion()
    {
        Template::render("views/connexion.php");
    }
    
    function inscription()
    {
        Template::render("views/inscription.php");
    }

    function profile(){
        Template::render("views/profile.php");
    }
}
<?php

namespace controllers;

use controllers\base\Web;
use utils\Template;

class SampleWeb extends Web
{
    function home()
    {
        Template::render("views/connexion.php");
    }
    
    function about()
    {
        Template::render("views/inscription.php");
    }
}
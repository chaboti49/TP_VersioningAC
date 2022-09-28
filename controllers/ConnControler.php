<?php
namespace controllers;

use utils\Template;
use controllers\base\Web;
use utils\SessionHelpers;

class ConnControler extends Web
{
    
    function deco(){
        SessionHelpers::logout();
        $this->redirect("/");
    }
}
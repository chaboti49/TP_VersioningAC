<?php

namespace routes;

use controllers\Account;
use controllers\SampleWeb;
use controllers\VideoWeb;
use controllers\ConnControler;
use routes\base\Route;
use utils\SessionHelpers;

class Web
{
    function __construct()
    {
        $main = new SampleWeb();
    
        Route::Add('/', [$main, 'connexion']);

        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
        //        if (SessionHelpers::isLogin()) {
        //            Route::Add('/logout', [$main, 'home']);
        //        }
        Route::Add('/inscription', [$main, 'inscription']);
        $conn = new ConnControler();
        Route::Add('/verif', [$conn, 'AuthConn']);
    }
}


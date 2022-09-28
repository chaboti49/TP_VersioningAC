<?php

use utils\SessionHelpers;
?>
<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div class="block-connexion">
            <p>hello, <?= SessionHelpers::getConnected(); 
            ?></p>
        </div>
    </body>
</html>
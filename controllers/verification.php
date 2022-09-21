<?php
    use model\connModel;

    function verifConn($login){
        if(getConn($login) == ""){
            Template::render("views\inscription.php");
        }
        elseif (getConn) {
            # code...
        }
    }

?>
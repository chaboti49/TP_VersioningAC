<?php
namespace controllers;

use utils\Template;
use controllers\base\Web;
use utils\SessionHelpers;

class ConnControler extends Web
{
    public function AuthConn($login = "", $mdp = ""){
        if(SessionHelpers::IsLogin())
        {
            $this->redirect("/home");
        }
        $erreur = "";
        if(!empty($login) && !empty($mdp))
        {
            $auth = new \models\ConnModel;
            $Lauth = $auth->VerifConn($login, $mdp);
            if($Lauth != null){
                SessionHelpers::login($Lauth);
                $this->redirect("/todo/liste");
            }
            else{
                SessionHelpers::logout();
                $erreur = "Le login n'existe pas ou le mdp n'est pas le bon";
            }
        }
        return Template::render("views/connexion.php", array("erreur" => $erreur));
    }
}
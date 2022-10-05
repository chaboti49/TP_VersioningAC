<?php
namespace controllers;

use utils\Template;
use controllers\base\Web;
use utils\SessionHelpers;

class ConnControler extends Web
{
    function AuthConn($login = "", $mdp = ""){
        if(SessionHelpers::IsLogin())
        {
            $this->redirect("/home");
        }
        $erreur = "";
        if(!empty($login) && !empty($mdp))
        {
            $auth = new \models\ConnModel;
            $Lauth = $auth->VerifConn($login, $mdp);
            if($Lauth && password_verify($mdp, $Lauth['MDPUTIL']))
            {
                SessionHelpers::login($Lauth);
                $this->redirect("/");
            }
            else
            {
                SessionHelpers::logout();
                $erreur = "Le login n'existe pas ou le mdp n'est pas le bon";
            }
        }
        return Template::render("views/global/connexion.php", array("erreur" => $erreur));

    }

    function deco(){
        SessionHelpers::logout();
        $this->redirect("/");
    }

    function inscription($login = "", $mdp = "", $Cmdp = ""){
        if(SessionHelpers::IsLogin())
        {
            $this->redirect("/profile");
        }
        $erreur = "";
        if(!empty($login) && !empty($mdp) && !empty($Cmdp)){ //verif que les champ sont completer
            if($mdp == $Cmdp){
                $auth = new \models\ConnModel;
                $Lauth = $auth->inscr($login, $mdp);
                if($Lauth == ""){
                    $data = $auth->VerifConn($login, $mdp);
                    SessionHelpers::login($data);
                    $this->redirect('/profile');
                }
                else{
                    SessionHelpers::logout();
                    $erreur = $Lauth;
                }
            }
            else{
                SessionHelpers::logout();
                $erreur = "le mot de passe n'est pas le même que que celui dans la confirmation !";
            }
            
            return Template::render("views/inscription.php", array("erreur" => $erreur));
        }
    }

}
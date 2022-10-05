<?php
namespace models;

use DateTime;
use Exception;
use PDO;
use models\base\SQL;

class ConnModel extends SQL
{
    public function __construct()
    {
        parent::__construct('votre-table', 'cle-de-votre-table');
    }

    function VerifConn($login, $mdp): array|null
    {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateur WHERE loginUtil = ? LIMIT 1");
        $stmt->execute([$login]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function inscr($login, $mopasse){
        $erreur = "";
        try{
            $dateCrea = date("Y-m-d");
            $stmt = $this->pdo->prepare("INSERT INTO utilisateur (loginUtil, mdpUtil, dateCreationUtil) VALUES (?, ?, ?)");
            $mdp = password_hash($mopasse, PASSWORD_BCRYPT);
            $stmt->execute([$login, $mdp, $dateCrea]);
        }catch(Exception $e){
            $erreur = $e;
        }
        return $erreur;
    }

}
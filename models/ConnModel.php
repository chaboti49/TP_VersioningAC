<?php
namespace models;

use models\base\SQL;

class ConnModel extends SQL
{
    public function __construct()
    {
        parent::__construct('votre-table', 'cle-de-votre-table');
    }

    function VerifConn($login, $mdp){
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateur WHERE loginUtil = ? LIMIT 1");
        $stmt->execute([$login]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if($data && password_verify($mdp, $data['mdpUtil']))
        {
            return $data;
        }
        else
        {
            return null;
        }
    }
}
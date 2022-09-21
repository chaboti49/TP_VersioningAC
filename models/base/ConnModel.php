<?php
    class ConnModel extends SQL{

        public function __construct() {
            parrent::__construct('tp_versionningac', 'IDUtil');
        }

        public function getConn($login) {
            $stmt = $this->pdo->prepare("SELECT mdpUtil FROM utilisateur WHERE loginUtil = ?");
            $stmt->execute([$login]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }
    }
?>
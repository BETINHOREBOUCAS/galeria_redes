<?php

namespace src\handlers;

use PDO;
use src\models\Conection;


class ConfigHandler {

    public function getDataEmpresa($id_usuario_principal) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM usuarios WHERE id = $id_usuario_principal";
        $sql = $pdo->query($sql);
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch(PDO::FETCH_ASSOC);
        }

        return $sql;
    }
    
}
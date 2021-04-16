<?php

namespace src\handlers;

use PDO;
use src\models\Conection;
use src\models\Produto;


class AdminHandler
{

    public function getItens($id, $modelo)
    {
        $consulta = array();
        $pdo = Produto::sqlSelect();

        if (!empty($modelo)) {
            $sql = "SELECT * FROM produtos WHERE id_usuario = $id AND modelo = '$modelo'";
        } else {
            $sql = "SELECT * FROM produtos WHERE id_usuario = $id";
        }
        $sql = $pdo->query($sql);
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
            $consulta['produtos'] = $sql;

            $sql = "SELECT * FROM img_produtos WHERE id_usuario = $id ORDER BY capa DESC";
            $sql = $pdo->query($sql);
            if ($sql->rowCount() > 0) {
                $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
                $consulta['images'] = $sql;
            }
        } else {
            return false;
        }



        return $consulta;
    }

    public function getUrl($url)
    {
        $array = [];
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM usuarios WHERE nome_exibicao = '$url'";

        $sql = $pdo->prepare($sql);
        $sql->bindValue(':teste', $url);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
        }

        return $array;
    }
}

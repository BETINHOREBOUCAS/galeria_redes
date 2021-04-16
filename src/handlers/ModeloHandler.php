<?php

namespace src\handlers;

use PDO;
use src\models\Modelo;

class ModeloHandler {
    public function getModelo($id_usuario)
    {
        $pdo = Modelo::sqlSelect();

        $sql = "SELECT * FROM modelos WHERE ativo = 1 AND id_usuario = $id_usuario ORDER BY nome asc";
        $sql = $pdo->query($sql);

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return array();
        }
    }

    public function gerenciarModelo($acao = [],  $id_usuario, $novo, $editar = [])
    {
        $principal = $id_usuario['principal']['id'];
        $secundario = $id_usuario['secundario']['id'];

        $pdo = Modelo::sqlSelect();

        if (!empty($editar)) {
            if ($acao == 'excluir') {
                $sql = "UPDATE modelos SET ativo = 0, id_usuario_alterou = $secundario WHERE nome = :editar AND id_usuario = $principal";
                $sql = $pdo->prepare($sql);
                $sql->bindValue(':editar', $editar);
                $_SESSION['aviso'] = "Modelo excluido com sucesso!";
                $_SESSION['color'] = "lightgreen";
            } else {
                $sql = "UPDATE modelos SET id_usuario_alterou = $secundario, nome = :novo WHERE nome = :editar AND id_usuario = $principal";
                $sql = $pdo->prepare($sql);
                $sql->bindValue(':novo', $novo);
                $sql->bindValue(':editar', $editar);
                $_SESSION['aviso'] = "Modelo editado com sucesso!";
                $_SESSION['color'] = "lightgreen";
            }
        } else {
            $sql = "INSERT INTO modelos (nome, id_usuario, id_usuario_cadastrou) VALUES (:novo, $principal, $secundario)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(':novo', $novo);
            $_SESSION['aviso'] = "Modelo adcionado com sucesso!";
            $_SESSION['color'] = "lightgreen";
        }

        $sql->execute();

        if ($sql->rowCount() <= 0) {
            $_SESSION['aviso'] = "Erro: Algo deu errado!";
            $_SESSION['color'] = "lightcoral";
        }
    }
}
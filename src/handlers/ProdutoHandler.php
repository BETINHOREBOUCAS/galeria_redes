<?php

namespace src\handlers;

use PDO;
use src\models\Conection;

class ProdutoHandler {

    public function AddProduto($dados = array(), $imgs = array())
    {
        $id_usuario_principal = $dados['id_usuario'];
        $id_usuario_secundario = $dados['id_usuario_cadastrou'];

        $pdo = Conection::sqlSelect();

        foreach ($dados as $key => $value) {
            $chavesBind[] = ':' . $key;
            $chavesExec[] = $key;
            $valores[] = $value;
        }

        $sql = "INSERT INTO produtos (" . implode(', ', $chavesExec) . ") VALUES (" . implode(', ', $chavesBind) . ")";
        $sql = $pdo->prepare($sql);

        for ($i = 0; $i < count($chavesBind); $i++) {
            $sql->bindValue($chavesBind[$i], $valores[$i]);
        }

        $sql->execute();

        $id_produto = $pdo->lastInsertId();

        if ($sql->rowCount() > 0 && !empty($imgs['tmp_name'][0]) && isset($imgs['tmp_name'][0])) {
            for ($i = 0; $i < count($imgs['tmp_name']); $i++) {
                $nomedoarquivo = md5($imgs['name'][$i] . time() . rand(0, 999)) . '.jpg';
                move_uploaded_file($imgs['tmp_name'][$i], 'imgProdutos/' . $nomedoarquivo);

                $sql = "INSERT INTO img_produtos (id_usuario, id_usuario_cadastrou, id_produto, nome) VALUES ($id_usuario_principal, $id_usuario_secundario, $id_produto, '$nomedoarquivo')";
                $pdo->query($sql);
            }
        }

        return $id_produto;
    }

    public function editarProduto($dados, $imgs = array()) {

        $id = $dados['id'];

        $pdo = Conection::sqlSelect();

        foreach ($dados as $key => $value) {
            $comando[] = "$key = '$value'";
            $chavesBind[] = ':' . $key;
            $chavesExec[] = $key;
            $valores[] = $value;
        }

        $sql = 'UPDATE produtos SET ' . implode(', ', $comando) . " WHERE id = $id";

        $sql = $pdo->query($sql);

        if (!empty($imgs['tmp_name'][0]) && isset($imgs['tmp_name'][0])) {
            $nomedoarquivo = "SELECT * FROM img_produtos WHERE id_produto = $id";
            $nomedoarquivo = $pdo->query($nomedoarquivo);
            $nomedoarquivo = $nomedoarquivo->fetch(PDO::FETCH_ASSOC);
            
            for ($i = 0; $i < count($imgs['tmp_name']); $i++) {
                move_uploaded_file($imgs['tmp_name'][$i], 'imgProdutos/' . $nomedoarquivo['nome']);
            }
        }
    }

    public function getProduto($id) {
        $array = array();
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM produtos WHERE id = $id";
        $sql = $pdo->query($sql);

        if ($sql->rowCount() > 0) {
            $array['produto'] = $sql->fetch(PDO::FETCH_ASSOC);
        }

        $sql = "SELECT * FROM img_produtos WHERE id_produto = $id";
        $sql = $pdo->query($sql);

        if ($sql->rowCount() > 0) {
            $array['imagens'] = $sql->fetch(PDO::FETCH_ASSOC);
        }

        return $array;
    }

    public function excluirProduto($id) {
        $pdo = Conection::sqlSelect();
        $sql = "DELETE FROM produtos WHERE id = $id";
        $sql = $pdo->query($sql);
    }
}
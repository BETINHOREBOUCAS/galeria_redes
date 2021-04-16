<?php

namespace src\handlers;

use PDO;
use src\models\Conection;
use src\models\Usuario;

class UsuarioHandler {

    public function addUsuario($principal, $secundario, $nome, $sobrenome, $email, $senha, $permissao, $imgUser)
    {
        //Codigo de salvar imagem
        $imgUser = $this->salvaImgUser($imgUser, $email);
        // Fim do codigo

        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $emailVerify = LoginHandler::emailExist($email);

        if (empty($emailVerify)) {
            $pdo = Usuario::sqlSelect();

            $sql = "INSERT INTO usuarios (nome, sobrenome, email, senha, permissao, id_usuario_principal, img_user, id_usuario_cadastrou) VALUES (:nome, :sobrenome, :email, :senha, :permissao, $principal, :img_user, $secundario)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":sobrenome", $sobrenome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->bindValue(":permissao", $permissao);
            $sql->bindValue(":img_user", $imgUser);

            $sql->execute();

            if ($sql->rowCount() > 0) {
                $_SESSION['aviso'] = "Usuário adicionado com sucesso!";
                $_SESSION['color'] = "lightgreen";
            } else {
                $_SESSION['aviso'] = "Error: Algo deu errado!";
                $_SESSION['color'] = "lightcoral";
            }
        } else {
            $_SESSION['aviso'] = "Error: E-mail já cadastrado!";
            $_SESSION['color'] = "lightcoral";
        }
    }

    public function editarUsuario($id, $nome, $sobrenome, $email, $senha, $permissao, $imgUser) {
        $pdo = Usuario::sqlSelect();

        if (!empty($imgUser)) {
            //Codigo de salvar imagem
            $imgUser = $this->salvaImgUser($imgUser, $email);
            // Fim do codigo
            $sql = "UPDATE usuarios SET img_user = '$imgUser' WHERE id = $id";
            $pdo->query($sql);
        }
       

        if (!empty($senha)) {
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET senha = '$senha' WHERE id = $id";
            $pdo->query($sql);
        }        

        $emailVerify = LoginHandler::emailExist($email);

        if (empty($emailVerify) || $emailVerify['email'] == $email) {

            $sql = "UPDATE usuarios SET nome = :nome, sobrenome = :sobrenome, email = :email, permissao = :permissao WHERE id = $id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":sobrenome", $sobrenome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":permissao", $permissao);

            $sql->execute();

        } else {
            $_SESSION['aviso'] = "Error: E-mail já cadastrado!";
            $_SESSION['color'] = "lightcoral";
        }
    }

    public function getUsuario($id) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $sql = $pdo->query($sql);

        if ($sql->rowCount() > 0) {
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        return array();
    }

    public function getUsuarios($id_user_secundario) {
        $pdo = Usuario::sqlSelect();

        $sql = "SELECT * FROM usuarios WHERE id_usuario_principal = $id_user_secundario AND ativo = 1";
        $sql = $pdo->query($sql);

        if ($sql->rowCount() > 0) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }

        return $resultado;
    }

    public function updateEmpresa($id_usuario_principal, $id_usuario_secundario, $email, $dados = array(), $imgs = array()) {
        
        $pdo = Conection::sqlSelect();        

        foreach ($dados as $key => $value) {
            $comando[] = "$key = '$value'";
            $chavesBind[] = ':' . $key;
            $chavesExec[] = $key;
            $valores[] = $value;
        }

        $sql = 'UPDATE usuarios SET ' . implode(', ', $comando) . " WHERE id = $id_usuario_principal";
        
        $sql = $pdo->query($sql);


        if (!empty($imgs['tmp_name']) && isset($imgs['tmp_name'])) {
            if (isset($imgs['tmp_name']) && !empty($imgs['tmp_name'])) {
                move_uploaded_file($imgs['tmp_name'], '../public/imgLogo/'.$email.'.png');
                $logo = $email.'.png'; 
            }
        }

        if ($sql->rowCount() > 0) {
            return $sql->rowCount();
        }
    }

    public function excluirUsuario($id) {
        $pdo = Conection::sqlSelect();
        $sql = "UPDATE usuarios SET ativo = 0 WHERE id = $id";
        $sql = $pdo->query($sql);
    }

    private function salvaImgUser($imgUser, $email) {
        if (isset($imgUser['tmp_name']) && !empty($imgUser['tmp_name'])) {
            move_uploaded_file($imgUser['tmp_name'], '../public/imgUser/'.$email.'.jpg');
            return $imgUser = $email.'.jpg';                       
        } else {
            return $imgUser = 'padrao.png';            
        }
    }
}
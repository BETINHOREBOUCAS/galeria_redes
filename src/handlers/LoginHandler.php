<?php

namespace src\handlers;

use src\models\Usuario;

class LoginHandler
{

    public static function VerifyLogin($email, $senha) {     

        $usuario = Usuario::select()->where('email', $email)->one();
        
        if ($usuario) {
            if (password_verify($senha, $usuario['senha'])) {
                $token = md5(time() . rand(0, 9999) . time());

                Usuario::update()->set('token', $token)->where('email', $email)->execute();
                return $token;
            } else {
                echo 'senha não confere';
            }
        } else {
            echo "não";
        }
    }

    public static function chekinLogin()
    {
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = Usuario::select()->where('token', $token)->one();

            if ($data) {

                return $data;
            }
        }
        return false;
    }

    public static function emailExist($email)
    {
        $resp = Usuario::select()->where('email', $email)->one();
        return $resp;
    }

    public static function addUser($nome, $sobrenome, $email, $imgUser, $nomeExibicao, $senha, $endereco, $bairro, $cidade, $estado, $zap, $tel, $uso, $logo)
    {

        $senha = password_hash($senha, PASSWORD_DEFAULT);

        //Codigo de salvar imagem
        if (isset($imgUser['tmp_name']) && !empty($imgUser['tmp_name'])) {
            move_uploaded_file($imgUser['tmp_name'], '../public/imgUser/'.$email.'.jpg');
            $imgUser = $email.'.jpg';                       
        } else {
            $imgUser = 'padrao.jpg';            
        }

        if (isset($logo['tmp_name']) && !empty($logo['tmp_name'])) {
            move_uploaded_file($logo['tmp_name'], '../public/imgLogo/'.$email.'.png');
            $logo = $email.'.png'; 
        } else {
            $logo = 'padrao.jpg';
        }
        // Fim do codigo

        Usuario::insert([
            'nome' => $nome,
            'sobrenome' => $sobrenome,
            'email' => $email,
            'senha' => $senha,
            'img_user' =>$imgUser,
            'nome_exibicao' => $nomeExibicao,            
            'endereco' => $endereco,
            'bairro' => $bairro,
            'cidade' => $cidade,
            'estado' => $estado,
            'zap' => $zap,
            'tel' => $tel,
            'uso' => $uso,
            'logo' => $logo
        ])->execute();
    }

    public static function userPrincipal($id) {
        $data = Usuario::select()->where('id', $id)->one();

            if ($data) {

                return $data;
            }
    }
}
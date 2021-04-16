<?php

namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;

class LoginController extends Controller
{

    public function login()
    {
        $aviso = '';
        $error = '';
        if (!empty($_SESSION['aviso'])) {
            $aviso = $_SESSION['aviso'];
            $_SESSION = [];
        }
        $this->render('login', ['aviso' => $aviso]);
    }

    public function loginAction()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');

        if (!empty($email) && !empty($senha)) {
            $token = LoginHandler::VerifyLogin($email, $senha);
            if ($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/admin');
            } else {
                $_SESSION = ['aviso' => 'E-mail ou senha não confere!', 'error' => 'error'];
                $this->redirect('/login');
            }
        } else {
            $_SESSION = ['aviso' => 'Prencha todos os campos!', 'error' => 'error'];
            $this->redirect('/login');
        }
    }

    public function cadastrar()
    {
        $aviso = '';
        $error = '';
        if (!empty($_SESSION)) {
            $aviso = $_SESSION['aviso'];
            $_SESSION = [];
        }
        $this->render('cadastroInicial', ['aviso' => $aviso]);
    }

    public function cadastrarAction()
    {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $email2 = filter_input(INPUT_POST, 'email2', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');
        $senha2 = filter_input(INPUT_POST, 'senha2');
        $nomeExibicao = filter_input(INPUT_POST, 'exibicao', FILTER_SANITIZE_STRING);
        $zap = filter_input(INPUT_POST, 'zap', FILTER_SANITIZE_STRING);

        $imgUser = $_FILES['img_user'];        
        $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
        $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
        $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
        $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);        
        $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
        $uso = filter_input(INPUT_POST, 'uso', FILTER_SANITIZE_STRING);
        $logo = $_FILES['img_logo'];

        if ($nome && $sobrenome && $email && $email2 && $senha && $senha2 && $nomeExibicao && $zap) {
            $_SESSION = [];
            if ($senha === $senha2) {

                if (LoginHandler::emailExist($email)) {
                    echo "<input type='hidden' id='emailexist' value='true'>";
                } else {
                    LoginHandler::addUser($nome, $sobrenome, $email, $imgUser, $nomeExibicao, $senha, $endereco, $bairro, $cidade, $estado, $zap, $tel, $uso, $logo);

                    $_SESSION = ['aviso' => 'Cadastro realizado com sucesso!', "error" => "sucesso"];
                }
            } else {
                $_SESSION = ['aviso' => "Senhas não conferem!", 'error' => "error"];
            }
        } else {
            $_SESSION = ['aviso' => "Todos os campos devem ser preenchidos!", 'error' => "error"];
        }
    }

    public function verificarEmail()
    {

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (LoginHandler::emailExist($email)) {
            echo "<input type='hidden' id='emailexist' value='true'>";
        } else {
            echo "<input type='hidden' id='emailexist' value='false'>";
        }
    }

    public function sair()
    {
        $_SESSION = [];
        $this->redirect('/login');
    }
}

<?php
namespace src\controllers;

use core\Controller;
use src\handlers\LoginHandler;
use src\handlers\UsuarioHandler;

class UsuariosController extends Controller {

    private $usuario;

    public function __construct() {
        $this->usuario['principal'] = "";
        $this->usuario['secundario']['id'] = null;
        $verifyUser = LoginHandler::chekinLogin();

        if (!$verifyUser['id_usuario_principal']) {
            $this->usuario['principal'] = $verifyUser;
            $this->usuario['secundario']['id'] = $this->usuario['principal']['id'];
        } else {
            $this->usuario['principal'] = LoginHandler::userPrincipal($verifyUser['id_usuario_principal']);
            $this->usuario['secundario'] = $verifyUser;
        }
        
        if ($verifyUser === false) {
            $this->redirect('/login');
        }
    }

    public function addusuarios() {
        $dados['user'] = $this->usuario;

        $this->render('addUsuario', $dados);
    }

    public function addUsuariosAction() {
        $imgUser = $_FILES['fotos'];
        $principal = $this->usuario['principal']['id'];
        $secundario = $this->usuario['secundario']['id'];
        $addUsuario = new UsuarioHandler();

        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');
        $permissao = filter_input(INPUT_POST, 'permissao', FILTER_SANITIZE_STRING);

        if ($nome && $sobrenome && $email && $senha && $permissao) {
            $addUsuario->addUsuario($principal, $secundario, $nome, $sobrenome, $email, $senha, $permissao, $imgUser);
        }

    }

    public function usuariosEditar($attr) {
        $array['user'] = $this->usuario;
        $array['id'] = $attr['id'];

        $usuario_object = new UsuarioHandler();
        $array['usuario'] = $usuario_object->getUsuario($attr['id']);


        $this->render('editarUsuario', $array);
    }

    public function usuariosEditarAction($attr) {
        $id = $attr['id'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $permissao = $_POST['permissao'];
        $imgUser = $_FILES['fotos'];

        $usuario_object = new UsuarioHandler();

        $usuario = $usuario_object->editarUsuario($id, $nome, $sobrenome, $email, $senha, $permissao, $imgUser);
        
    }

    public function usuariosExcluir() {
        $id = $_POST['id_usuario'];
        $usuario = new UsuarioHandler();
        $usuario->excluirUsuario($id);
    }

    public function usuarios() {
        $id_user_principal = $this->usuario['principal']['id'];
        $id_user_secundario = $this->usuario['secundario']['id'];

        $usuario_object = new UsuarioHandler();
        $usuario = $usuario_object->getUsuarios($id_user_secundario);

        $this->render('usuarios', ['usuarios' => $usuario, 'user' => $this->usuario]);
    }

    
}
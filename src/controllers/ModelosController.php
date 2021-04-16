<?php
namespace src\controllers;

use core\Controller;
use src\handlers\LoginHandler;
use src\handlers\ModeloHandler;

class ModelosController extends Controller {

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

    public function modelos() {
        $dados = array('user' => $this->usuario);
        $id_user_principal = $this->usuario['principal']['id'];

        $dados['aviso'] = "";
        $dados['color'] = "";
        if (!empty($_SESSION['aviso']) && isset($_SESSION['aviso'])) {
            $dados['aviso'] = $_SESSION['aviso'];
            $dados['color'] = $_SESSION['color'];
            $_SESSION['aviso'] = [];
            $_SESSION['color'] = [];
        }

        $modelo = new ModeloHandler();

        $dados['modelos'] = $modelo->getModelo($id_user_principal);

        $this->render('modelos', $dados);
    }

    public function modelosAction() {
        $id_user_principal = $this->usuario;

        $acao = filter_input(INPUT_POST, 'checar', FILTER_SANITIZE_STRING);
        $editar = filter_input(INPUT_POST, 'modelos', FILTER_SANITIZE_STRING);
        $novo = filter_input(INPUT_POST, 'nModelo', FILTER_SANITIZE_STRING);
        
        $gerenciar = new ModeloHandler();

        if (!empty($novo)) {
            if (!empty($editar)) {               
                $gerenciar->gerenciarModelo($acao, $id_user_principal, $novo, $editar);
            } else {
                $gerenciar->gerenciarModelo($acao, $id_user_principal, $novo);
            }
        } else {
            $gerenciar->gerenciarModelo($acao, $id_user_principal, $novo, $editar);
        }

        $this->redirect('/admin/modelos');
        
    }
}
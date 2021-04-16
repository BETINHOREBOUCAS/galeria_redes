<?php
namespace src\controllers;

use core\Controller;
use src\handlers\LoginHandler;

class AdminController extends Controller {

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
      

    public function index() {
        $array = array('user' => $this->usuario);

        $array['aviso'] = "";
        $array['color'] = "";
        if (!empty($_SESSION['aviso']) && isset($_SESSION['aviso'])) {
            $array['aviso'] = $_SESSION['aviso'];
            $array['color'] = $_SESSION['color'];
            $_SESSION['aviso'] = [];
            $_SESSION['color'] = [];
        }
            
        $this->render('admin', $array);
    }
}
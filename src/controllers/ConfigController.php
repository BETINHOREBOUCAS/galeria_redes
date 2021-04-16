<?php
namespace src\controllers;

use core\Controller;
use src\handlers\ConfigHandler;
use src\handlers\LoginHandler;
use src\handlers\UsuarioHandler;

class ConfigController extends Controller {

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

    public function config() {
        $array = ['user' => $this->usuario];
        $id_user_principal = $this->usuario['principal']['id'];
        $id_user_secundario = $this->usuario['secundario']['id'];

        $config_object = new ConfigHandler();
        $array['empresa'] = $config_object->getDataEmpresa($id_user_principal);

        $this->render('config', $array);
    }

    public function configAction() {
        
        $dados = array(); 
        
        if (isset($_POST['nome_exibicao']) && !empty($_POST['nome_exibicao'])) {
            
            $id_user_principal = $this->usuario['principal']['id'];
            $id_user_secundario = $this->usuario['secundario']['id'];
            $email = $this->usuario['principal']['email'];

            if ($this->usuario['secundario']['id']) {
                $id_user_secundario = $this->usuario['secundario']['id'];
            }

            foreach ($_POST as $key => $value) {
                if ($key != 'fotos') {
                    $dados[$key] = $value;
                }                
            }

            $empresa = new UsuarioHandler();
            $resp = $empresa->updateEmpresa($id_user_principal, $id_user_secundario, $email, $dados, $_FILES['logo']);

            if ($resp) {
                $_SESSION['aviso'] = "Usuário alterado com sucesso!";
                $_SESSION['color'] = "lightgreen";
                $this->redirect("/admin");
            } else {
                $_SESSION['aviso'] = "Erro ao alterar o usuário!";
                $_SESSION['color'] = "lightcoral";
                $this->redirect("/admin");
            }
        } else {
            $this->redirect("/admin");
        }
    
    }
}
<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\AdminHandler;
use src\handlers\ModeloHandler;
use src\handlers\ProdutoHandler;

class HomeController extends Controller {

    private $usuario;

    public function index($attr) {
        $modelo = '';
        if (isset($_GET['modelo']) && !empty($_GET['modelo'])) {
            $modelo = filter_input(INPUT_GET, 'modelo', FILTER_SANITIZE_STRING);
        }

        $user = new AdminHandler();
        $modelos = new ModeloHandler();

        $this->usuario['principal'] = $user->getUrl($attr['url']);

        if ($this->usuario['principal']) {
            $id_user = $this->usuario['principal']['id'];
            
            $dados = $user->getItens($id_user, $modelo);

            if (!empty($dados)) {
                for ($i=0; $i < count($dados['produtos']); $i++) { 
    
                    foreach ($dados['images'] as $images) {
        
                        if ($images['id_produto'] == $dados['produtos'][$i]['id']) {
                            $dados['produtos'][$i]['images'][] = $images;
                        }
                    }
                    
                }
            }
            $dados['user'] = $this->usuario;
            $dados['url'] = $attr['url'];
            $dados['modelos'] = $modelos->getModelo($id_user);

            $this->render('home', $dados);
        } else {
            $this->render('404');
        }

    }

}
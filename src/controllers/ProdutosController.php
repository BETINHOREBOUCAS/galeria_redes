<?php
namespace src\controllers;

use core\Controller;
use src\handlers\AdminHandler;
use src\handlers\LoginHandler;
use src\handlers\ModeloHandler;
use src\handlers\ProdutoHandler;

class ProdutosController extends Controller {

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

    public function addProduto()  {
        $id_user_principal = $this->usuario['principal']['id'];
        $modelos = new ModeloHandler();
        $modelo = $modelos->getModelo($id_user_principal);
        $this->render('addProduto', ['modelo' => $modelo, 'user' => $this->usuario]);
    }

    public function addProdutoAction() {
        
        $dados = array(); 
        
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $id_user_principal = $this->usuario['principal']['id'];
            $id_user_secundario = $this->usuario['secundario']['id'];

            if ($this->usuario['secundario']['id']) {
                $id_user_secundario = $this->usuario['secundario']['id'];
            }

            foreach ($_POST as $key => $value) {
                if ($key != 'fotos') {
                    $dados[$key] = $value;
                }                
            }

            $dados['id_usuario'] = $id_user_principal;
            $dados['id_usuario_cadastrou'] = $id_user_secundario;

            $produto = new ProdutoHandler();
            $resp = $produto->addProduto($dados, $_FILES['img_produto']);

            if ($resp) {
                $_SESSION['aviso'] = "Produto adicionado com sucesso!";
                $_SESSION['color'] = "lightgreen";
                $this->redirect("/admin");
            } else {
                $_SESSION['aviso'] = "Erro ao inserir o produto!";
                $_SESSION['color'] = "lightcoral";
                $this->redirect("/admin");
            }
        } else {
            $this->redirect("/admin/addProduto");
        }                

    }

    public function editarProduto($attr) {
        $id_user_principal = $this->usuario['principal']['id'];
        $array = ['user' => $this->usuario];
        
        $modelos_object = new ModeloHandler();
        $produto_object = new ProdutoHandler();

        $array['modelos'] = $modelos_object->getModelo($id_user_principal);

        $array['itens'] = $produto_object->getProduto($attr['id']);

        $this->render('editarProduto', $array);
    }

    public function editarProdutoAction($attr) {
        $dados = array(); 
        
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
           
            foreach ($_POST as $key => $value) {
                if ($key != 'fotos') {
                    $dados[$key] = $value;
                }                
            }

            $dados['id'] = $attr['id'];

            $produto = new ProdutoHandler();
            $resp = $produto->editarProduto($dados, $_FILES['img_produto']);
        }

        $this->redirect('/admin/gerenciadorProduto');
    }

    public function excluirProduto() {
        $id = $_POST['id_produto'];
        $produto = new ProdutoHandler();
        $produto->excluirProduto($id);
    }

    public function gerenciarProduto() {  
        $modelo = '';
        if (isset($_GET['modelo']) && !empty($_GET['modelo'])) {
            $modelo = filter_input(INPUT_GET, 'modelo', FILTER_SANITIZE_STRING);
        }
        $gerenciar = new AdminHandler();
        $modelos = new ModeloHandler();
        $dados = $gerenciar->getItens($this->usuario['principal']['id'], $modelo);
        
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
        $dados['modelos'] = $modelos->getModelo($this->usuario['principal']['id']);  
        
        $this->render('gerenciarProdutos', $dados);
    }

    public function gerenciarProdutoAction()  {
        print_r($_POST);
    }
}
<?php
use core\Router;

$router = new Router();



$router->get('/login', 'LoginController@login');
$router->post('/login', 'LoginController@loginAction');

$router->get('/cadastro', 'LoginController@cadastrar');
$router->post('/cadastro', 'LoginController@cadastrarAction');

$router->post('/verificarEmail', 'LoginController@verificarEmail');

$router->get('/admin/sair', 'LoginController@sair');

$router->get('/admin', 'AdminController@index');

$router->get('/admin/addProduto', 'ProdutosController@addProduto');
$router->post('/admin/addProduto', 'ProdutosController@addProdutoAction');

$router->get('/admin/gerenciadorProduto/editar/{id}', 'ProdutosController@editarProduto');
$router->post('/admin/gerenciadorProduto/editar/{id}', 'ProdutosController@editarProdutoAction');
$router->post('/admin/gerenciadorProduto/excluir', 'ProdutosController@excluirProduto');
$router->get('/admin/gerenciadorProduto', 'ProdutosController@gerenciarProduto');
$router->post('/admin/gerenciadorProduto', 'ProdutosController@gerenciarProdutoAction');

$router->get('/admin/addUsuarios', 'UsuariosController@addusuarios');
$router->post('/admin/addUsuarios', 'UsuariosController@addusuariosAction');

$router->get('/admin/usuarios/editar/{id}', 'UsuariosController@usuariosEditar');
$router->post('/admin/usuarios/editar/{id}', 'UsuariosController@usuariosEditarAction');
$router->post('/admin/usuarios/excluir', 'UsuariosController@usuariosExcluir');
$router->get('/admin/usuarios', 'UsuariosController@usuarios');


$router->get('/admin/modelos', 'ModelosController@modelos');
$router->post('/admin/modelos', 'ModelosController@modelosAction');

$router->get('/admin/config', 'ConfigController@config');
$router->post('/admin/config', 'ConfigController@configAction');

$router->get('/{url}', 'HomeController@index');
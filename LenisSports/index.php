<?php
require_once "Controllers/cadastroControllers.php";
require_once "Controllers/categoriaControllers.php";
require_once "Controllers/pedidoControllers.php";
require_once "repositories/cadastroRepository.php";
require_once "repositories/categoriaRepository.php";
require_once "repositories/pedidoRepository.php";
require_once "Config/db.php";
require_once "Router.php";

$router = new Router();

// Cadastro routes
$cadastroRepository = new CadastroRepository();
$controllerCadastro = new CadastroController($cadastroRepository);
$router->add('GET', '/cadastro', [$controllerCadastro, 'list']);
$router->add('POST', '/cadastro', [$controllerCadastro, 'criaCadastro']);
$router->add('GET', '/cadastro/{id}', [$controllerCadastro, 'cadastroPorId']);
$router->add('PUT', '/cadastro/{id}', [$controllerCadastro, 'atualizaCadastro']);
$router->add('DELETE', '/cadastro/{id}', [$controllerCadastro, 'removeCadastro']);

// Categoria routes
$categoriaRepository = new categoriaRepository();
$controllerCategoria = new categoriaController($categoriaRepository);
$router->add('GET', '/categoria', [$controllerCategoria, 'list']);
$router->add('POST', '/categoria', [$controllerCategoria, 'criaCategoria']);
$router->add('GET', '/categoria/{id}', [$controllerCategoria, 'categoriaPorId']);
$router->add('PUT', '/categoria/{id}', [$controllerCategoria, 'atualizaCategoria']);
$router->add('DELETE', '/categoria/{id}', [$controllerCategoria, 'removeCategoria']);

// Pedido routes
$pedidoRepository = new pedidoRepository();
$controllerPedido = new pedidoController($pedidoRepository);
$router->add('GET', '/pedido', [$controllerPedido, 'list']);
$router->add('POST', '/pedido', [$controllerPedido, 'criaPedido']);
$router->add('GET', '/pedido/{id}', [$controllerPedido, 'pedidoPorId']);
$router->add('PUT', '/pedido/{id}', [$controllerPedido, 'atualizaPedido']);
$router->add('DELETE', '/pedido/{id}', [$controllerPedido, 'removePedido']);

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($requestPath);

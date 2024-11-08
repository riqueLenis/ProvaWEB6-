<?php
require_once "Router.php";
require_once "Controllers/cadastroControllers.php";
require_once "repositories/cadastroRepository.php";
require_once "config/db.php";

$router = new Router();
$cadastroRepository = new CadastroRepository();
$controller = new CadastroController($cadastroRepository);

$router->add('GET', '/cadastro', [$controller, 'list']);

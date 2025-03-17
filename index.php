<?php
//define o caminho dos arquivos do projeto

require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\MainController;
use App\Model\BancoDeDados;

define("BASE_PATH", $_SERVER['DOCUMENT_ROOT']);

//inicia o banco de dados
$bancoDeDados = new BancoDeDados();

//inicia o controlador principal da aplicação
$controladorPrincipal = new MainController();

//tratar a rota
$controladorPrincipal->trataRequisicao();
<?php
//define o caminho dos arquivos do projeto
define("BASE_PATH", $_SERVER['DOCUMENT_ROOT'] . "/mvc/");

//inicia o banco de dados
require_once BASE_PATH . "modelo/bancoDeDados.php";
bancoDeDados::conectar();

//inicia o controlador principal da aplicação
require_once BASE_PATH . 'controle/controladorPrincipal.php';
$controladorPrincipal = new ControladorPrincipal();

//tratar a rota
$controladorPrincipal->trataRequisicao();
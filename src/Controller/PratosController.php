<?php

namespace App\Controller;

use App\Model\CategoriaModel;
use App\Model\PratoModel;

class PratosController
{
    //objeto modelo
    private $modeloPratos;

    //contrutor
    public function __construct(){
        $this->modeloPratos = new PratoModel();
    }

    public function novo(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //se for POST, adiciona um novo prato
            $adicionou = $this->modeloPratos->adicionar($_POST['nome'], $_POST['categoria']);
            if($adicionou == "ok"){
                $mensagem = "Prato " . $_POST['nome'] . " adicionado com sucesso.";
            }else{
                $mensagem = $adicionou;
            }
        }
        $modeloCategorias = new CategoriaModel();
        $categorias = $modeloCategorias->listarTodos();

        include_once BASE_PATH . '/src/View/pratos/novo.php';
    }

    public function listar(){
        $pratos = $this->modeloPratos->listarTodos();
        include_once BASE_PATH . '/src/View/pratos/listar.php';
    }

    public function exibir(){
        $prato = $this->modeloPratos->buscar($_GET['id']);
        if(is_array($prato)){
            include_once BASE_PATH . '/src/View/pratos/exibir.php';
        }else{
            exit($prato);
        }

    }

    public function editar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //se for POST, edita o prato
            $editou = $this->modeloPratos->editar($_POST['id'], $_POST['nome'], $_POST['categoria']);
            if($editou == "ok"){
                $mensagem = "Prato " . $_POST['nome'] . " editado com sucesso.";
            }else{
                $mensagem = $editou;
            }
        }

        //buscar as categorias
        include_once BASE_PATH . 'modelo/modeloCategorias.php';
        $modeloCategorias = new CategoriaModel();
        $categorias = $modeloCategorias->listarTodos();

        $prato = $this->modeloPratos->buscar($_GET['id']);
        include_once BASE_PATH . '/src/View/pratos/editar.php';
    }

    public function deletar(){
        $deletou = $this->modeloPratos->deletar($_GET['id']);
        if($deletou){
            $mensagem = "Prato deletado com sucesso.";
        }else{
            $mensagem = "Não foi possível deletar o prato.";
        }

        //lista os pratos
        $pratos = $this->modeloPratos->listarTodos();
        include_once BASE_PATH . '/src/View/pratos/listar.php';
    }

}
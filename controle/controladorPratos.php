<?php

class ControladorPratos {

    //objeto modelo
    private $modeloPratos;

    //contrutor
    public function __construct(){
        include_once BASE_PATH . 'modelo/modeloPratos.php';
        $this->modeloPratos = new ModeloPratos();
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
        //buscar as categorias
        include_once BASE_PATH . 'modelo/modeloCategorias.php';
        $modeloCategorias = new ModeloCategorias();
        $categorias = $modeloCategorias->listarTodos();

        include_once BASE_PATH . 'visao/pratos/novo.php';
    }

    public function listar(){
        $pratos = $this->modeloPratos->listarTodos();
        include_once BASE_PATH . 'visao/pratos/listar.php';
    }

    public function exibir(){
        $prato = $this->modeloPratos->buscar($_GET['id']);
        if(is_array($prato)){
            include_once BASE_PATH . 'visao/pratos/exibir.php';
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
        $modeloCategorias = new ModeloCategorias();
        $categorias = $modeloCategorias->listarTodos();

        $prato = $this->modeloPratos->buscar($_GET['id']);
        include_once BASE_PATH . 'visao/pratos/editar.php';
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
        include_once BASE_PATH . 'visao/pratos/listar.php';
    }

}
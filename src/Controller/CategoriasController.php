<?php

class CategoriasController
{

    //objeto modelo
    private $modeloCategorias;

    //contrutor
    public function __construct(){
        include_once BASE_PATH . 'modelo/modeloCategorias.php';
        $this->modeloCategorias = new ModeloCategorias();
    }

    public function novo(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //se for POST, adiciona uma nova categoria
            $adicionou = $this->modeloCategorias->adicionar($_POST['nome']);
            if($adicionou == "ok"){
                $mensagem = "Categorias " . $_POST['nome'] . " adicionada com sucesso.";
            }else{
                $mensagem = $adicionou;
            }
        }
        include_once BASE_PATH . 'visao/categorias/novo.php';
    }

    public function listar(){
        $categorias = $this->modeloCategorias->listarTodos();
        include_once BASE_PATH . 'visao/categorias/listar.php';
    }

    public function exibir(){
        $categoria = $this->modeloCategorias->buscar($_GET['id']);
        if(is_array($categoria)){
            include_once BASE_PATH . 'visao/categorias/exibir.php';
        }else{
            exit($categoria);
        }

    }

    public function editar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //se for POST, edita a categoria
            $editou = $this->modeloCategorias->editar($_POST['id'], $_POST['nome']);
            if($editou == "ok"){
                $mensagem = "Categoria " . $_POST['nome'] . " editada com sucesso.";
            }else{
                $mensagem = $editou;
            }
        }

        $categoria = $this->modeloCategorias->buscar($_GET['id']);
        include_once BASE_PATH . 'visao/categorias/editar.php';
    }

    public function deletar(){
        $deletou = $this->modeloCategorias->deletar($_GET['id']);
        if($deletou){
            $mensagem = "Categoria deletada com sucesso.";
        }else{
            $mensagem = "Não foi possível deletar a categoria.";
        }

        //lista as categorias
        $categorias = $this->modeloCategorias->listarTodos();
        include_once BASE_PATH . 'visao/categorias/listar.php';
    }

}
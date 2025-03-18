<?php

namespace App\Controller;

use App\Model\ModeloUsuarios;
use App\Model\UserModel;

class UserController
{
    //objeto modelo
    private $modeloUsuarios;

    //contrutor
    public function __construct(){
        $this->modeloUsuarios = new UserModel();
    }

    public function novo(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //se for POST, adiciona um novo usuario
            $adicionou = $this->modeloUsuarios->adicionar($_POST['nome'], $_POST['email'], $_POST['senha']);
            if($adicionou == "ok"){
                $mensagem = "Usuário " . $_POST['nome'] . " adicionado com sucesso.";
            }else{
                $mensagem = $adicionou;
            }
        }
        include_once BASE_PATH . '/src/View/usuarios/novo.php';
    }

    public function listar(){
        $usuarios = $this->modeloUsuarios->listarTodos();
        include_once BASE_PATH . '/src/View/usuarios/listar.php';
    }

    public function exibir(){
        $usuario = $this->modeloUsuarios->buscar($_GET['id']);
        if(is_array($usuario)){
            include_once BASE_PATH . '/src/View/usuarios/exibir.php';
        }else{
            exit($usuario);
        }

    }

    public function editar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //se for POST, edita o usuario
            $editou = $this->modeloUsuarios->editar($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['senha']);
            if($editou == "ok"){
                $mensagem = "Usuário " . $_POST['nome'] . " editado com sucesso.";
            }else{
                $mensagem = $editou;
            }
        }

        $usuario = $this->modeloUsuarios->buscar($_GET['id']);
        include_once BASE_PATH . '/src/View/usuarios/editar.php';
    }

    public function deletar(){
        $deletou = $this->modeloUsuarios->deletar($_GET['id']);
        if($deletou){
            $mensagem = "Usuário deletado com sucesso.";
        }else{
            $mensagem = "Não foi possível deletar o usuário.";
        }

        //lista os usuarios
        $usuarios = $this->modeloUsuarios->listarTodos();
        include_once BASE_PATH . '/src/View/usuarios/listar.php';
    }
}
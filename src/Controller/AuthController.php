<?php

namespace App\Controller;

use App\Model\ModeloAuth;

class AuthController
{
    //objeto modelo
    private $modeloAuth;

    //contrutor
    public function __construct(){
        $this->modeloAuth = new ModeloAuth();
        session_start();
    }

    public function estaLogado(){
        if(isset($_SESSION['email'])){
            return true;
        }else{
            return false;
        }
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //se for POST, executa o login
            $logou = $this->modeloAuth->login($_POST['email'], $_POST['senha']);
            if(is_array($logou)){

                $_SESSION['nome'] = $logou['nome'];
                $_SESSION['email'] = $logou['email'];

                //redirecionar para "área restrita"
                header('Location: index.php');

            }else{
                $mensagem = $logou;
            }
        }
        include_once BASE_PATH . 'visao/auth/login.php';
    }

    public function logout(){
        //deleta a sessão
        session_destroy();

        //redirecionar para a pagina inicial
        header('Location: index.php');
    }

}
<?php

class ControladorPrincipal {

    //objeto controladorAuth
    private $controladorAuth;
    private $logado = false;

    //construtor
    public function __construct(){
        include_once BASE_PATH . 'controle/controladorAuth.php';
        $this->controladorAuth = new ControladorAuth();
        $this->logado = $this->controladorAuth->estaLogado();
    }

    public function trataRequisicao(){

        //tratando a rota (controlador)
        $rota = isset($_GET['rota']) ? $_GET['rota'] : null;

        if(!$rota){
            //chama a home do sistema
            $this->home();
            return;
        } else if($rota == 'login'){
            $this->telaDeLogin();
            return;
        }else if($rota == 'logout'){
            $this->telaDelogout();
            return;
        } else if($rota == 'categorias'){

            //protege a rota de categorias para que apenas usuários logados possam acessar
            $this->apenasLogado();

            //controlador = categorias
            include_once BASE_PATH . 'controle/controladorCategorias.php';
            $controlador = new ControladorCategorias();
        } else if($rota == 'pratos'){

            //protege a rota de pratos para que apenas usuários logados possam acessar
            $this->apenasLogado();

            //controlador = pratos
            include_once BASE_PATH . 'controle/controladorPratos.php';
            $controlador = new ControladorPratos();
        } else if($rota == 'usuarios'){

            //protege a rota de usuarios para que apenas usuários logados possam acessar
            $this->apenasLogado();

            //controlador = usuarios
            include_once BASE_PATH . 'controle/controladorUsuarios.php';
            $controlador = new ControladorUsuarios();
        }else{
           //chama a pagina de 404
           $this->notFound();
           return;
        }

        //tratando a operação
        $operacao = isset($_GET['op']) ? $_GET['op'] : null;

        if(!$operacao || $operacao == 'listar'){
            $controlador->listar();
        }else if($operacao == 'exibir'){
            $controlador->exibir();
        }else if($operacao == 'novo'){
            $controlador->novo();
        }else if($operacao == 'editar'){
            $controlador->editar();
        }else if($operacao == 'deletar'){
            $controlador->deletar();
        }else{
            //chama a pagina de 404
           $this->notFound();
           return;
        }

    }

    public function apenasLogado(){
        if(!$this->logado){
            $this->telaDeLogin();
            exit();
        }
    }

    public function telaDeLogin(){
        $this->controladorAuth->login();
    }

    public function telaDeLogout(){
        $this->controladorAuth->logout();
    }

    public function home(){
        include_once BASE_PATH . 'visao/index.php';
    }

    public function notFound(){
        http_response_code(404);
        include_once BASE_PATH . 'visao/pagina_nao_encontrada.html';
    }
}
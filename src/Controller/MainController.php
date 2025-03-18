<?php
namespace App\Controller;

class MainController
{
    //objeto controladorAuth
    private $controladorAuth;
    private $logado = false;

    //construtor
    public function __construct(){
        $this->controladorAuth = new AuthController();
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

            $controlador = new CategoriasController();
        } else if($rota == 'pratos'){

            //protege a rota de pratos para que apenas usuários logados possam acessar
            $this->apenasLogado();

            $controlador = new PratosController();
        } else if($rota == 'usuarios'){

            //protege a rota de usuarios para que apenas usuários logados possam acessar
            //$this->apenasLogado();

            $controlador = new UserController();
        }else {
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
        include_once BASE_PATH . '/src/View/index.php';
    }

    public function notFound(){
        http_response_code(404);
        include_once BASE_PATH . '/src/View/pagina_nao_encontrada.html';
    }
}
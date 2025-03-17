<?php

namespace App\Model;

class ModeloUsuarios
{

    function listarTodos(){
        $query = "SELECT id, nome FROM usuarios order by nome";
        $result = pg_query($query)
                    or die("Não foi possível executar a query: " . pg_last_error());
        return pg_fetch_all($result);
    }

    function buscar($id){
         //validação para buscar
         $id = intval($id);
         if(is_null($id) || $id == 0){
             return "Não foi possível buscar o usuario.";
         }

         $query = "SELECT id, nome, email FROM usuarios WHERE id = $1";
         $result = pg_query_params($query, array($id))
                    or die("Não foi possível executar a query: " . pg_last_error());

         if(pg_num_rows($result) > 0){
             return pg_fetch_assoc($result, 0);
         }else{
             return false;
         }
    }

    function adicionar($nome, $email, $senha){
        //validações ao adicionar
        if(is_null($nome) || $nome == ''){
            return "O nome do Usuario não pode estar em branco.";
        }

        //TODO

         //"criptografia" - hash da senha com salt (concatenando o e-mail)
         $emailEsenha = $email . $senha;
         $senhaHash = hash('sha256', $emailEsenha);

        $query = "INSERT INTO usuarios (nome, email, senha) VALUES ($1, $2, $3)";
        $result = pg_query_params($query, array($nome, $email, $senhaHash))
                    or die("Não foi possível executar a query: " . pg_last_error());

        $adicionou = false;
        if(pg_affected_rows($result) > 0){
            $adicionou = "ok";
        }
        return $adicionou;
    }

    function deletar($id){
        //validação para deletar
        $id = intval($id);
        if(is_null($id) ){
            return "Não foi possível deletar o Usuário.";
        }
        $query = "DELETE FROM usuarios WHERE id = $1";
        $result = pg_query_params($query, array($id))
            or die("Não foi possível executar a query: " . pg_last_error());

        $deletou = false;
        if(pg_affected_rows($result) > 0){
            $deletou = true;
        }
        return $deletou;
    }

    function editar($id, $nome, $email, $senha){
        //validações para editar
        $id = intval($id);
        if(is_null($id) ){
            return "Não foi possível editar o Usuario.";
        }
        if(is_null($nome) || $nome == ''){
            return "O nome do Usuario não pode estar em branco.";
        }

        //TODO validacoes

        //"criptografia" - hash da senha com salt (concatenando o e-mail)
        $emailEsenha = $email . $senha;
        $senhaHash = hash('sha256', $emailEsenha);


        $query = "UPDATE usuarios SET nome = $2, email = $3, senha = $4 WHERE id = $1";
        $result = pg_query_params($query, array($id, $nome, $email, $senhaHash))
                or die("Não foi possível executar a query: " . pg_last_error());

        if(pg_affected_rows($result) > 0){
            return "ok";
        }else{
            return false;
        }
    }
}
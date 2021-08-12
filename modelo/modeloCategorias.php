<?php

class ModeloCategorias{

    function listarTodos(){
        $query = "SELECT id, nome FROM categorias order by nome";
        $result = pg_query($query)
                    or die("Não foi possível executar a query: " . pg_last_error());
        return pg_fetch_all($result);
    }

    function buscar($id){
         //validação para buscar
         $id = intval($id);
         if(is_null($id) || $id == 0){
             return "Não foi possível buscar a categoria.";
         }

         $query = "SELECT * FROM categorias WHERE id = $1";
         $result = pg_query_params($query, array($id))
                    or die("Não foi possível executar a query: " . pg_last_error());
 
         if(pg_num_rows($result) > 0){
             return pg_fetch_assoc($result, 0);
         }else{
             return false;
         }
    }

    function adicionar($nome){
        //validações ao adicionar
        if(is_null($nome) || $nome == ''){
            return "O nome da categoria não pode estar em branco.";
        }

        $query = "INSERT INTO categorias (nome) VALUES ($1)";
        $result = pg_query_params($query, array($nome))
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
            return "Não foi possível deletar a categoria.";
        }
        $query = "DELETE FROM categorias WHERE id = $1";
        $result = pg_query_params($query, array($id)) 
            or die("Não foi possível executar a query: " . pg_last_error());

        $deletou = false;
        if(pg_affected_rows($result) > 0){
            $deletou = true;
        }
        return $deletou;
    }

    function editar($id, $nome){
        //validações para editar
        $id = intval($id);
        if(is_null($id) ){
            return "Não foi possível editar a categoria.";
        }
        if(is_null($nome) || $nome == ''){
            return "O nome da categoria não pode estar em branco.";
        }

        $query = "UPDATE categorias SET nome = $1 WHERE id = $2";
        $result = pg_query_params($query, array($nome, $id))
                or die("Não foi possível executar a query: " . pg_last_error());

        if(pg_affected_rows($result) > 0){
            return "ok";
        }else{
            return false;
        }
    }
}
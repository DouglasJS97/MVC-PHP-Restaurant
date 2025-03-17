<?php

namespace App\Model;

class ModeloPratos
{

    function listarTodos(){
        $query = "SELECT id, nome FROM pratos order by nome";
        $result = pg_query($query)
                    or die("Não foi possível executar a query: " . pg_last_error());
        return pg_fetch_all($result);
    }

    function buscar($id){
         //validação para buscar
         $id = intval($id);
         if(is_null($id) || $id == 0){
             return "Não foi possível buscar o prato.";
         }

         $query = "SELECT p.id, p.nome, p.categoria_id, c.nome as categoria_nome FROM pratos p
                    JOIN categorias c on p.categoria_id = c.id
                    WHERE p.id = $1";
         $result = pg_query_params($query, array($id))
                    or die("Não foi possível executar a query: " . pg_last_error());

         if(pg_num_rows($result) > 0){
             return pg_fetch_assoc($result, 0);
         }else{
             return false;
         }
    }

    function adicionar($nome, $categoria_id){
        //validações ao adicionar
        if(is_null($nome) || $nome == ''){
            return "O nome do prato não pode estar em branco.";
        }
        if(is_null($categoria_id) || $categoria_id == ''){
            return "O nome da categoria não pode estar em branco.";
        }

        $query = "INSERT INTO pratos (nome, categoria_id) VALUES ($1, $2)";
        $result = pg_query_params($query, array($nome, $categoria_id))
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
            return "Não foi possível deletar o prato.";
        }
        $query = "DELETE FROM pratos WHERE id = $1";
        $result = pg_query_params($query, array($id))
            or die("Não foi possível executar a query: " . pg_last_error());

        $deletou = false;
        if(pg_affected_rows($result) > 0){
            $deletou = true;
        }
        return $deletou;
    }

    function editar($id, $nome, $categoria_id){
        //validações para editar
        $id = intval($id);
        if(is_null($id) ){
            return "Não foi possível editar o prato.";
        }
        if(is_null($nome) || $nome == ''){
            return "O nome do prato não pode estar em branco.";
        }
        if(is_null($categoria_id) || $categoria_id == ''){
            return "O nome da categoria não pode estar em branco.";
        }

        $query = "UPDATE pratos SET nome = $2, categoria_id = $3 WHERE id = $1";
        $result = pg_query_params($query, array($id, $nome, $categoria_id))
                or die("Não foi possível executar a query: " . pg_last_error());

        if(pg_affected_rows($result) > 0){
            return "ok";
        }else{
            return false;
        }
    }
}
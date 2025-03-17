<?php

namespace App\Model;

class ModeloAuth
{

    function login($email, $senha){
        //validar os inputs email e senha

        //"criptografia" - hash da senha com salt (concatenando o e-mail)
        $emailEsenha = $email . $senha;
        $senhaHash = hash('sha256', $emailEsenha);

        $query = "SELECT * FROM usuarios WHERE email = $1 and senha = $2";
        $result = pg_query_params($query, array($email, $senhaHash))
                    or die("Não foi possível executar a query: " . pg_last_error());

        if(pg_num_rows($result) > 0){
            return pg_fetch_assoc($result, 0);
        }else{
            return "Usuário ou senha inválidos";
        }
    }
}
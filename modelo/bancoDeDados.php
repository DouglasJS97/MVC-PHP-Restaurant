<?php

class BancoDeDados {

    private static $dbNome = "aula";
    private static $dbHost = '192.168.45.5'; //127.0.0.1
    private static $dbPorta = '5432';
    private static $dbUsuario = 'postgres';
    private static $dbSenha = '123';
    private static $conn = null;

    public static function conectar(){
        //apenas uma conexão para toda a aplicação
        if(self::$conn == null){
            $con_string = "host=" . self::$dbHost . 
                " port=" . self::$dbPorta .
                " dbname=" . self::$dbNome . 
                " user=" . self::$dbUsuario . 
                " password=" . self::$dbSenha;

            self::$conn = pg_connect($con_string)
            or die("Não foi possível conectar com o banco de dados.");
        }
        //retorna a conexão
        return self::$conn;
    }

}

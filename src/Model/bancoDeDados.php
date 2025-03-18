<?php

namespace App\Model;

use Exception;
use PDO;

class BancoDeDados
{
    public function __construct(
        public readonly string $dbNome = "restaurante",
        public readonly string $dbHost = 'localhost',
        public readonly string $dbPorta = '4040',
        public readonly string $dbUsuario = 'root',
        public readonly string $dbSenha = 'root',
        public ?PDO $conn = null
    ) {
        try {
            $this->conn = new PDO("mysql:host={$this->dbHost};port={$this->dbPorta};dbname={$this->dbNome};user={$this->dbUsuario};password={$this->dbSenha}");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       } catch (Exception $e) {
        throw new Exception("Erro ao conectar ao banco de dados: " . $e->getMessage());
       }
    }

    /** Método responsável por retornar a conexão com o banco de dados MySQL. */
    public function getConnection(): PDO
    {
        return $this->conn;
    }
}

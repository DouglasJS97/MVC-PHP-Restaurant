<?php

namespace App\Model;

use PDO;

class AuthModel extends BancoDeDados
{
    public function __construct(private readonly ?PDO $conn = null)
    {
        $this->conn = $this->getConnection();
    }

    function login(string $email, string $senha): array
    {
        $emailEsenha = $email . $senha;
        $senhaHash = hash('sha256', $emailEsenha);

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaHash);

        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        return $usuario;
    }
}
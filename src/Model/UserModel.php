<?php

namespace App\Model;

use PDO;

class UserModel extends BancoDeDados
{
    function listarTodos(): array
    {
        $sql = "SELECT id, nome FROM user order by nome";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $user ?? [];
    }

    function buscar(int $id): array
    {
        $sql = "SELECT id, nome, email FROM user WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        return $usuario ?? [];
    }

    function adicionar(string $nome, string $email, string $senha): bool
    {
         $emailEsenha = $email . $senha;
         $senhaHash = hash('sha256', $emailEsenha);

        $sql = "INSERT INTO user (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaHash);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    function deletar(int $id): bool
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    function editar(int $id, string $nome, string $email, string $senha): bool
    {
        $emailEsenha = $email . $senha;
        $senhaHash = hash('sha256', $emailEsenha);

        $sql = "UPDATE user SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaHash);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
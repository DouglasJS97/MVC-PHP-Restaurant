<?php

namespace App\Model;

use PDO;

class CategoriaModel extends BancoDeDados
{
    function listarTodos(): array
    {
        $sql = "SELECT * FROM categoria";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $categorias ?? [];
    }

    function buscar(int $id){
        $sql = "SELECT * FROM categoria WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $categoria = $stmt->fetch(PDO::FETCH_ASSOC);

        return $categoria ?? [];
    }

    function adicionar(string $nome): bool
    {
        $sql = "INSERT INTO categoria (nome) VALUES (:nome)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    function deletar(int $id): bool
    {
        $sql = "DELETE FROM categoria WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    function editar(int $id, string $nome): bool
    {
        $sql = "UPDATE categoria SET nome = :nome WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
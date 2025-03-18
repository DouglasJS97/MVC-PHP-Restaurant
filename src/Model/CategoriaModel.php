<?php

namespace App\Model;

use PDO;

class CategoriaModel extends BancoDeDados
{
    public function __construct(private readonly ?PDO $conn = null)
    {
        $this->conn = $this->getConnection();
    }

    function listarTodos(): array
    {
        $sql = "SELECT * FROM categorias";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $categorias ?? [];
    }

    function buscar(int $id){
        $sql = "SELECT * FROM categorias WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $categoria = $stmt->fetch(PDO::FETCH_ASSOC);

        return $categoria ?? [];
    }

    function adicionar(string $nome): bool
    {
        $sql = "INSERT INTO categorias (nome) VALUES (:nome)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    function deletar(int $id): bool
    {
        $sql = "DELETE FROM categorias WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    function editar(int $id, string $nome): bool
    {
        $sql = "UPDATE categorias SET nome = :nome WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
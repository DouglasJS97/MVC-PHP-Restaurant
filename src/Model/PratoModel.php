<?php

namespace App\Model;

use PDO;

class PratoModel extends BancoDeDados
{
    function listarTodos(): array
    {
        $sql = "SELECT id, nome FROM prato order by nome";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $pratos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $pratos ?? [];
    }

    function buscar(int $id): array
    {
        $sql = "SELECT p.id, p.nome, p.categoria_id, c.nome as categoria_nome FROM prato p
                    JOIN categoria c on p.categoria_id = c.id
                    WHERE p.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $prato = $stmt->fetch(PDO::FETCH_ASSOC);

        return $prato ?? [];
    }

    function adicionar(string $nome, int $categoria_id): bool
    {
        $sql = "INSERT INTO prato (nome, categoria_id) VALUES (:nome, :categoria_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':categoria_id', $categoria_id);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    function deletar(int $id): bool
    {
        $sql = "DELETE FROM prato WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    function editar(int $id, string $nome, int $categoria_id): bool
    {
        $sql = "UPDATE prato SET nome = :nome, categoria_id = :categoria_id WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':categoria_id', $categoria_id);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
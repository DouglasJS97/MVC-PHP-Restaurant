<?php

namespace App\Model;

use PDO;

class PratoModel extends BancoDeDados
{
    public function __construct(private readonly ?PDO $conn = null)
    {
        $this->conn = $this->getConnection();
    }

    function listarTodos(): array
    {
        $sql = "SELECT id, nome FROM pratos order by nome";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $pratos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $pratos ?? [];
    }

    function buscar(int $id): array
    {
        $sql = "SELECT p.id, p.nome, p.categoria_id, c.nome as categoria_nome FROM pratos p
                    JOIN categorias c on p.categoria_id = c.id
                    WHERE p.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $prato = $stmt->fetch(PDO::FETCH_ASSOC);

        return $prato ?? [];
    }

    function adicionar(string $nome, int $categoria_id): bool
    {
        $sql = "INSERT INTO pratos (nome, categoria_id) VALUES (:nome, :categoria_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':categoria_id', $categoria_id);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    function deletar(int $id): bool
    {
        $sql = "DELETE FROM pratos WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    function editar(int $id, string $nome, int $categoria_id): bool
    {
        $sql = "UPDATE pratos SET nome = :nome, categoria_id = :categoria_id WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':categoria_id', $categoria_id);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
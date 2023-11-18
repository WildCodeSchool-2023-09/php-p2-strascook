<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class ProduitsManager extends AbstractManager
{
    public const TABLE = 'produits';

    public function insert(array $produit): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . "(`nom`, `type`, `sous_type`) 
        VALUES (:nom, :type, :sous_type)");
        $statement->bindValue(':nom', $produit['nom'], PDO::PARAM_STR);
        $statement->bindValue(':type', $produit['type'], PDO::PARAM_STR);
        $statement->bindValue(':sous_type', $produit['sous-type'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function update(array $produit)
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . "
        SET nom=:nom, type=:type, sous_type=:sous_type WHERE id=:id");
        $statement->bindValue('nom', $produit['nom'], PDO::PARAM_STR);
        $statement->bindValue('type', $produit['type'], PDO::PARAM_STR);
        $statement->bindValue('sous_type', $produit['sous-type'], PDO::PARAM_STR);
        $statement->bindValue('id', $produit['id'], PDO::PARAM_INT);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function delete(int $id): void
    {
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . "
        WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }
}

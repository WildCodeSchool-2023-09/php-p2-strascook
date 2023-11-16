<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class ProduitsManager extends AbstractManager
{
    public const TABLE = 'produits';

    public function insert(array $produit): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . "(nom, type, sous-type) 
        VALUES (:nom, :type, :sous-type)");
        $statement->bindValue('nom', $produit['nom'], PDO::PARAM_STR);
        $statement->bindValue('type', $produit['type'], PDO::PARAM_STR);
        $statement->bindValue('sous-type', $produit['sous-type'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}

<?php

// Le Manager (ici MenusManager) permet de faire une requete sur la BDD avant de faire
// la boucler pour afficher les données sur les cards.

namespace App\Model;

// La classe MenusManager hérite des propriétés/methodes de AbstractManager,
// nottament (selectAll, selectOneById, delete).
class MenusAdmManager extends AbstractManager
{
    public const TABLE = 'menus';

    public function update(array $menu): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
         " SET nom=:nom, description=:description, prix=:prix, photo=:photo  WHERE id=:id");

        $statement->bindValue('nom', $menu['nom'], \PDO::PARAM_STR);
        $statement->bindValue('description', $menu['description'], \PDO::PARAM_STR);
        $statement->bindValue('prix', $menu['prix'], \PDO::PARAM_INT);
        $statement->bindValue('photo', $menu['photo'], \PDO::PARAM_STR);
        $statement->bindValue('id', $menu['id'], \PDO::PARAM_INT);
        return $statement->execute();
    }

    public function insert(array $menu, string $fileName): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
        " (nom, description, photo, prix) VALUES  (:nom, :description, :photo, :prix)");
        $statement->bindValue('nom', $menu['nom'], \PDO::PARAM_STR);
        $statement->bindValue('description', $menu['description'], \PDO::PARAM_STR);
        $statement->bindValue('prix', $menu['prix'], \PDO::PARAM_INT);
        $statement->bindValue('photo', $fileName, \PDO::PARAM_STR);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
        //return $statement->execute();
    }
}

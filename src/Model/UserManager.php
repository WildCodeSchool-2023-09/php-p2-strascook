<?php

namespace App\Model;

use PDO;
use App\Model\AbstractManager;

class UserManager extends AbstractManager
{
    public const TABLE = 'user';

    public function userLogin(array $users)
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE identifiant=:username 
        AND mot_de_passe=:password");
        $statement->bindValue(':username', $users['username'], \PDO::PARAM_STR);
        $statement->bindValue(':password', $users['password'], \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }

    public function numberCustomers()
    {
        $statement = $this->pdo->query("SELECT * FROM " . static::TABLE . " WHERE isAdmin=false");
        return $statement->fetchAll();
    }

    public function insert(array $users): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`nom`,`prenom`,`adresse`,`tel`,`email`,
        `identifiant`,`mot_de_passe`) 
        VALUES (:nom, :prenom, :adresse, :telephone, :email, :identifiant, :mot_de_passe)");
        $statement->bindValue('nom', $users['name'], PDO::PARAM_STR);
        $statement->bindValue('prenom', $users['surname'], PDO::PARAM_STR);
        $statement->bindValue('adresse', $users['adress'], PDO::PARAM_STR);
        $statement->bindValue('telephone', $users['phone'], PDO::PARAM_STR);
        $statement->bindValue('email', $users['email'], PDO::PARAM_STR);
        $statement->bindValue('identifiant', $users['username'], PDO::PARAM_STR);
        $statement->bindValue('mot_de_passe', $users['password'], PDO::PARAM_STR);


        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}

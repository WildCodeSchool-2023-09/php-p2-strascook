<?php

namespace App\Model;

use PDO;
use App\Model\AbstractManager;

class InscriptionManager extends AbstractManager
{
    public const TABLE = 'user';

    public function insert(array $users): int
    {
            $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`nom`,`prenom`,`adresse`,`tel`,`email`,
            `identifiant`,`mot_de_passe`) 
            VALUES (:nom, :prenom, :adresse, :tel, :email, :identifiant, :mot_de_passe)");
            $statement->bindValue('nom', $users['lastname'], PDO::PARAM_STR);
            $statement->bindValue('prenom', $users['firstname'], PDO::PARAM_STR);
            $statement->bindValue('adresse', $users['adress'], PDO::PARAM_STR);
            $statement->bindValue('tel', $users['phone'], PDO::PARAM_STR);
            $statement->bindValue('email', $users['email'], PDO::PARAM_STR);
            $statement->bindValue('identifiant', $users['username'], PDO::PARAM_STR);
            $statement->bindValue('mot_de_passe', $users['password'], PDO::PARAM_STR);


            $statement->execute();
            return (int)$this->pdo->lastInsertId();
    }
}

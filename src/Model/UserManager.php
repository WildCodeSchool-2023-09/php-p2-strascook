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
}

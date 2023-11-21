<?php

namespace App\Model;

use PDO;

class ContactManager extends AbstractManager
{
    public const TABLE = 'contact';

    /**
     * Insert new item in database
     */
    public function insert(array $contact)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
            " (`nomcontact`, `prenomcontact`, `emailcontact`, `telcontact`, `messagecontact`)
        VALUES (:nomcontact, :prenomcontact, :emailcontact, :telcontact, :messagecontact)");
        $statement->bindValue('nomcontact', $contact['nomcontact'], PDO::PARAM_STR);
        $statement->bindValue('prenomcontact', $contact['prenomcontact'], PDO::PARAM_STR);
        $statement->bindValue('emailcontact', $contact['emailcontact'], PDO::PARAM_STR);
        $statement->bindValue('telcontact', $contact['telcontact'], PDO::PARAM_STR);
        $statement->bindValue('messagecontact', $contact['messagecontact'], PDO::PARAM_STR);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}

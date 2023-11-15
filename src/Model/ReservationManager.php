<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class ReservationManager extends AbstractManager
{
    public const TABLE = "reservation";
    public function insert(array $reservation)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " VALUES (:menus_id,:client_id, :date)");
        $statement->bindValue('menus_id', $reservation['menus_id'], PDO::PARAM_INT);
        $statement->bindValue('client_id', $reservation['client_id'], PDO::PARAM_INT);
        $statement->bindValue('date', $reservation['date'], PDO::PARAM_INT);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}

<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;
use App\Model\MenusAdmManager;


class ReservationManager extends AbstractManager
{
    public const TABLE = "menus";
    public function index(array $choix)
    {
        $query = "SELECT*FROM " . self::TABLE;
        return $this->pdo->query($query)->fetchAll();
    }
}

<?php

namespace App\Model;

use PDO;
use App\Model\AbstractManager;

class ReservationAdmManager extends AbstractManager
{
    public const TABLE = 'reservation';
    public const TABLE2 = 'menus';
    public const TABLE3 = 'user';

    /**
     * Récupérations des données liées à la table de jointure
     */
    public function selectAllJoin()
    {
        $query = 'SELECT *, m.nom AS menu_nom FROM ' . static::TABLE . ' AS r 
        INNER JOIN ' . static::TABLE2 . ' AS m ON m.id = r.menus_id
        INNER JOIN ' . static::TABLE3 . ' AS u ON u.id = r.client_id';


        return $this->pdo->query($query)->fetchAll();
    }
}

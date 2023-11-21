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

    /**
     * Insertion en BDD des données d'ajout de réservation depuis la page administrateur
     */

    public function insert(array $reservations): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " 
        (`menus_id`,`client_id`,`date`, `nombrepersonnes`, `remarques`)
         VALUES (:menus_id, :client_id, :date, :nombrepersonnes, :remarques)");
        $statement->bindValue('menus_id', $reservations['menus_id'], PDO::PARAM_INT);
        $statement->bindValue('client_id', $reservations['client_id'], PDO::PARAM_INT);
        $statement->bindValue('date', $reservations['date'], PDO::PARAM_STR);
        $statement->bindValue('nombrepersonnes', $reservations['nombrepersonnes'], PDO::PARAM_INT);
        $statement->bindValue('remarques', $reservations['remarques'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}

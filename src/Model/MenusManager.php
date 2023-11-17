<?php

// Le Manager (ici MenusManager) permet de faire une requete sur la BDD avant de faire
// la boucler pour afficher les données sur les cards.

namespace App\Model;

// La classe MenusManager hérite des propriétés/methodes de AbstractManager,
// nottament (selectAll, selectOneById, delete).
class MenusManager extends AbstractManager
{
    public const TABLE = 'menus';
}

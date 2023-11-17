<?php

return [
    '' => ['HomeController', 'index',],
    'items' => ['ItemController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
    'menus' => ['MenusController', 'index',],
    'reservation' => ['ReservationController', 'index',],
    'connexion' => ['ConnexionController', 'login',],
    'logout' => ['ConnexionController', 'logout',],
    'contact' => ['ContactController', 'index',],
    'inscription' => ['InscriptionController', 'index',],
    'mentionslegales' => ['MentionsLegalesController', 'index',],
    'admin/user' => ['UserController', 'index',],
    'admin/user/new' => ['UserController', 'new',],
    'produits' => ['ProduitsController', 'index'],
    'produits/add' => ['ProduitsController', 'add'],
    'produits/edit' => ['ProduitsController', 'edit', ['id']],
    'produits/delete' => ['ProduitsController', 'delete', ['id']],
];

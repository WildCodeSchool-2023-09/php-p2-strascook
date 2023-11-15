<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\MenusAdmManager;

class MenusAdmController extends AbstractController
{
    // Liste les éléments de la BDD
    public function index()
    {
        $menusAdmManager = new MenusAdmManager();
        $allMenus = $menusAdmManager->selectAll();
        // La page se trouve dans :
        return $this->twig->render('Admin/menus/index.html.twig', ['menus' => $allMenus]);
    }


    // Ajout d'un nouveau menu
    public function add()
    {
        return $this->twig->render('Admin/menus/new.html.twig');
    }
}

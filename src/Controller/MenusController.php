<?php

// namespace actuel
namespace App\Controller;

// On va avoir besoin du AbstractController pour hériter de ses methodes.
use App\Controller\AbstractController;
// On va avoir besoin du Model MenuManager pour instancier l'objet.
use App\Model\MenusManager;

class MenusController extends AbstractController
{
    public function index()
    {
        $menuManager = new MenusManager(); // On crée une instance de MenuManager.
        $menus = $menuManager->selectAll(); // Tous les elements du selectAll se retrouvent dans $menu.
        // On passe en parametre $menu (je ne sait pas pourquoi...)
        return $this->twig->render('menus/menus.html.twig', ['menus' => $menus]);
    }
}

<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\ReservationManager;
use App\Model\MenusManager;

class ReservationController extends AbstractController
{
    public function index()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['choix'] === '') {
                $errors['choix'] = 'Veuillez saisir votre choix de menu';
            }
            if ($_POST['count-person'] === '') {
                $errors['count-person'] = 'Veuillez saisir le nombre de personnes';
            }
            if ($_POST['date'] === '') {
                $errors['date'] = 'Veuillez saisir la date de votre soirée';
            }
            if (!$errors) {
                $reservationManager = new ReservationManager();
                $reservationManager->index($_POST);
            }
        }
        $menusManager = new MenusManager();
        $menus = $menusManager->selectAll();
        return $this->twig->render('reservation/reservation.html.twig', ['errors' => $errors, 'menus' => $menus]);
    }
}

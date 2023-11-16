<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\ReservationManager;
use App\Model\MenusManager;
use App\Controller\ConnexionController;

class ReservationController extends AbstractController
{
    public function index()
    {
        $menusManager = new MenusManager();
        $menus = $menusManager->selectAll();
        return $this->twig->render('Reservation/reservation.html.twig', ['menus' => $menus]);
    }

    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['menu_id'] === '') {
                $errors['menu_id'] = 'Veuillez saisir votre choix de menu';
            }
            if ($_POST['count-person'] === '') {
                $errors['count-person'] = 'Veuillez saisir le nombre de personnes';
            }
            if ($_POST['date'] === '') {
                $errors['date'] = 'Veuillez saisir la date de votre soirée';
            }
            if (!$errors) {
                $reservationManager = new ReservationManager();
                $reservationManager->insert($_POST);
            }
        }
        return $this->twig->render('Reservation/reservation.html.twig', ['errors' => $errors]);
    }
}

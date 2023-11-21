<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\ReservationManager;
use App\Controller\ConnexionController;
use App\Model\MenusManager;

class ReservationController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Reservation/reservation.html.twig');
    }

    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['menus_id'] === '') {
                $errors['menus_id'] = 'Veuillez saisir votre choix de menu';
            }
            if ($_POST['nombredepersonnes'] === '') {
                $errors['nombredepersonnes'] = 'Veuillez saisir le nombre de personnes';
            }
            if ($_POST['date'] === '') {
                $errors['date'] = 'Veuillez saisir la date de votre soirée';
            }
            if (!$errors) {
                $_POST['client_id'] = $_SESSION['id'];
                $reservationManager = new ReservationManager();
                $reservationManager->insert($_POST);
                header('Location: /');
            }
        }
        $menusManager = new MenusManager();
        $menus = $menusManager->selectAll();
        return $this->twig->render('Reservation/reservation.html.twig', ['errors' => $errors, 'menus' => $menus]);
    }
}

<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\ReservationAdmManager;

class ReservationAdmController extends AbstractController
{
    public function index()
    {
        $reservationsManager = new ReservationAdmManager();
        $reservations = $reservationsManager->selectAllJoin();

        return $this->twig->render('Admin/Reservation/resaR.html.twig', ['reservations' => $reservations]);
    }

    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['client_id'] === '') {
                $errors['client_id'] = 'Veuillez renseigner le client';
            }
            if ($_POST['menus_id'] === '') {
                $errors['menus_id'] = 'Veuillez renseigner le menu';
            }
            /*if($_POST['nb_pers'] === '')
            {
                $errors['nb_pers'] = 'Veuillez renseigner le nombre de personnes';
            }*/
            if ($_POST['date'] === '') {
                $errors['date'] = 'Veuillez renseigner la date';
            }

            if (!$errors) {
                $reservationManager = new ReservationAdmManager();
                $reservationManager->insert($_POST);
                header('Location: /admin/resa');
            }
        }
        return $this->twig->render('Admin/Reservation/add.html.twig', ['errors' => $errors]);
    }
}

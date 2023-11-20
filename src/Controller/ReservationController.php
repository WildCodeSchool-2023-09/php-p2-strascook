<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\ReservationManager;
use App\Controller\ConnexionController;

class ReservationController extends AbstractController
{
    public function index()
    {
        if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === true) {
            $reservationManager = new ReservationManager();
            $reservation = $reservationManager->selectAll();
            /* $_SESSION['isAdmin'] = $user['isAdmin'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['adresse'] = $user['adresse'];
            $_SESSION['tel'] = $user['tel'];
            $_SESSION['email'] = $user['email'];*/
            return $this->twig->render('Reservation/reservation.html.twig', ['reservation' => $reservation]);
        }
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

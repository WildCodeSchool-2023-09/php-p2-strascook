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
        return $this->twig->render('Admin/Reservation/add.html.twig');
    }
}

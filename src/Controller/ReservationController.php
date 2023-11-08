<?php

namespace App\Controller;

use App\Controller\AbstractController;

class ReservationController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('reservation/reservation.html.twig');
    }
}

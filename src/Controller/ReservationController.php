<?php

namespace App\Controller;

use App\Controller\AbstractController;

class ReservationController extends AbstractController
{

    public function reservation()
    {
        return $this->twig->render('reservation/reservation.html.twig');
    }
}

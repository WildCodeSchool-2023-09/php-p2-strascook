<?php

namespace App\Controller;

class ReservationController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Reservation/index.html.twig');
    }
}

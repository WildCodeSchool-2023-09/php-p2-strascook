<?php

namespace App\Controller;

use App\Controller\AbstractController;

class ReservationController extends AbstractController
{
    public function add()
    {

        return $this->twig->render('reservation/add.html.twig');
    }
}

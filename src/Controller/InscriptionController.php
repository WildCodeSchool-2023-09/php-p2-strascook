<?php

namespace App\Controller;

use App\Controller\AbstractController;

class InscriptionController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('inscription/inscription.html.twig');

    }
}

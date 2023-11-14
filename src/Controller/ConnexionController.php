<?php

namespace App\Controller;

use App\Controller\AbstractController;

class ConnexionController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Connexion/connexion.html.twig');
    }
}

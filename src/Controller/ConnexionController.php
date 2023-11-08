<?php

namespace App\Controller;

use App\Controller\AbstractController;

class ConnexionController extends AbstractController
{

    public function connexion()
    {
        return $this->twig->render('connexion/connexion.html.twig');
    }
}

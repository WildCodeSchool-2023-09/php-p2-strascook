<?php

namespace App\Controller;

use App\Controller\AbstractController;

class AccueilController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('accueil/accueil.html.twig');
    }
}

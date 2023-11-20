<?php

namespace App\Controller;

use App\Controller\AbstractController;

class MentionsLegalesController extends AbstractController
{
    public function index()
    {

        return $this->twig->render('MentionsLegales/mentionslegales.html.twig');
    }
}

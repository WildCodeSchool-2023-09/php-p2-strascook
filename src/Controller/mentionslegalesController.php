<?php

namespace App\Controller;

use App\Controller\AbstractController;

class MentionlegalesController extends AbstractController
{
    public function index()
    {

        return $this->twig->render('Mentionslegales/index.html.twig');
    }
}

<?php

namespace App\Controller;

use App\Controller\AbstractController;

class ContactController extends AbstractController
{
    public function add()
    {

        return $this->twig->render('contact/add.html.twig');
    }
}

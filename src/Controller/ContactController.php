<?php

namespace App\Controller;

use App\Controller\AbstractController;

class ContactController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('contact/contact.html.twig');
    }
}

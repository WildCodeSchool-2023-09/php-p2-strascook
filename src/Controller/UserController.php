<?php

namespace App\Controller;

use App\Controller\AbstractController;

class UserController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Admin/User/user.html.twig');
    }
}

<?php

namespace App\Controller;

use App\Controller\AbstractController;

class MenusController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('menus/menus.html.twig');
    }
}

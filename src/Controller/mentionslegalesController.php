<?php

namespace App\Controller;

use App\Controller\AbstractController;

class MentionlegalesController extends AbstractController
{
    public function add()
    {

        return $this->twig->render('mentionslegales/add.html.twig');
    }
}

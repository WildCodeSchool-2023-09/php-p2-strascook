<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\UserManager;

class UserController extends AbstractController
{
    public function index()
    {
        $userManager = new UserManager();
        $allUsers = $userManager->selectAll();
        return $this->twig->render('Admin/User/user.html.twig', ['users' => $allUsers]);
    }

    public function new()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userManager = new UserManager();
            $userManager->insert($_POST);
            header('Location: /admin/user');
        }
        return $this->twig->render('Admin/User/new.html.twig');
    }
}

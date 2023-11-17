<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\UserManager;

class DashboardController extends AbstractController
{
    public function index()
    {
        $userManager = new UserManager();
        $customers = $userManager->numberCustomers();

        return $this->twig->render('Admin/index.html.twig', ['customers' => $customers]);
    }
}

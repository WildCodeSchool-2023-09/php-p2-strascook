<?php

namespace App\Controller;

use App\Model\ContactAdminManager;

class ContactAdminController extends AbstractController
{
    /**
     * List items
     */
    public function index(): string
    {
        $contactAdminManager = new ContactAdminManager();
        $contactAdmins = $contactAdminManager->selectAll();

        return $this->twig->render('Admin/ContactAdmin/contactadmin.html.twig', ['contactAdmins' =>  $contactAdmins]);
    }

    /**
     * Delete a specific item
     */
    public function delete(int $id): void
    {
        $contactAdminManager = new ContactAdminManager();
        $contactAdminManager->delete((int)$id);
        header('Location: /admin/contactAdmin');
    }
}

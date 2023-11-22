<?php

namespace App\Controller;

use App\Model\ContactManager;
use App\Controller\AbstractController;

class ContactController extends AbstractController
{
    /* Ajout contact */
    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['nomcontact'] === '') {
                $errors['nomcontact'] = 'Veuillez renseigner votre nom';
            }
            if ($_POST['prenomcontact'] === '') {
                $errors['prenomcontact'] = 'Veuillez renseigner votre prénom';
            }
            if ($_POST['telcontact'] === '') {
                $errors['telcontact'] = 'Veuillez renseigner votre numéro de téléphone';
            }
            if ($_POST['emailcontact'] === '') {
                $errors['emailcontact'] = 'Veuillez renseigner votre email';
            }
            if ($_POST['messagecontact'] === '') {
                $errors['messagecontact'] = 'Veuillez renseigner votre message';
            }
            if (!$errors) {
                $contactManager = new ContactManager();
                $contactManager->insert($_POST);
                header('Location: /');
            }
        }
        return $this->twig->render('Contact/contact.html.twig', ['errors' => $errors]);
    }
}

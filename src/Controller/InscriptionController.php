<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\InscriptionManager;

class InscriptionController extends AbstractController
{
    public function index()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['lastname'] === '') {
                $errors['lastname'] = 'Veuillez renseigner le nom';
            }
            if ($_POST['firstname'] === '') {
                $errors['firstname'] = 'Veuillez renseigner le prénom';
            }
            if ($_POST['adress'] === '') {
                $errors['adress'] = 'Veuillez renseigner l\'adresse';
            }
            if ($_POST['phone'] === '') {
                $errors['phone'] = 'Veuillez renseigner le numéro de téléphone';
            }
            if ($_POST['email'] === '') {
                $errors['email'] = 'Veuillez renseigner l\'email';
            }
            if ($_POST['username'] === '') {
                $errors['username'] = 'Veuillez renseigner un identifiant différent de votre nom';
            }
            if ($_POST['password'] === '') {
                $errors['password'] = 'Veuillez renseigner un mot de passe';
            }
            if (!$errors) {
                $inscriptionManager = new InscriptionManager();
                $inscriptionManager->insert($_POST);
                header('Location: /connexion');
            }
        }

        return $this->twig->render('Connexion/inscription.html.twig', ['errors' => $errors]);
    }

    public function new()
    {

        return $this->twig->render('Admin/User/new.html.twig');
    }
}

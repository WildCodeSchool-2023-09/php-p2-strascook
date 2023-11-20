<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\UserManager;

class ConnexionController extends AbstractController
{
    public function login()
    {
        $errors = [];

        if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === true) {
            header('Location: /');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['username'] === '') {
                $errors['username'] = 'Veuillez saisir votre identifiant';
            }

            if ($_POST['password'] === '') {
                $errors['password'] = 'Veuillez saisir votre mot de passe';
            }

            if (!$errors) {
                $userManager = new UserManager();
                $user = $userManager->userLogin($_POST);
                if ($user) {
                    $_SESSION['isLogin'] = true;
                    $_SESSION['isAdmin'] = $user['isAdmin'];
                    $_SESSION['nom'] = $user['nom'];
                    $_SESSION['prenom'] = $user['prenom'];
                    $_SESSION['adresse'] = $user['adresse'];
                    $_SESSION['tel'] = $user['tel'];
                    $_SESSION['email'] = $user['email'];
                    header('Location: /');
                }
            }
        }

        return $this->twig->render('Connexion/connexion.html.twig', ['errors' => $errors]);
    }

    public function logout()
    {
        unset($_SESSION['isLogin']);
        unset($_SESSION['isAdmin']);
        header('Location: /connexion');
    }
}

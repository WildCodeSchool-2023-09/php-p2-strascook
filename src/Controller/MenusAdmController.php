<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\MenusAdmManager;

class MenusAdmController extends AbstractController
{
    // READ les éléments de la BDD
    public function read()
    {
        $menusAdmManager = new MenusAdmManager();
        $allMenus = $menusAdmManager->selectAll();
        // La page se trouve dans :
        return $this->twig->render('Admin/Menus/menuR.html.twig', ['menus' => $allMenus]);
    }


    // CREATE D'UN ITEM
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // DEBUG: Affiche le path courant.
            // $currentPath = $_SERVER['REQUEST_URI'];
            // echo "Current Path: $currentPath";

            // ------------ GESTION UPLOAD IMAGE --------------------------
            // Si le dossier UPLOAD n'existe pas, on le créée.
            $uploadDir = __DIR__ . '/../../public/upload/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir);
            }
            var_dump($_FILES);
            // Recupere le nom et le nom temporaire de l'image selectionnée
            $photoName = $_FILES['photo']['name'];
            $photoTmpName = $_FILES['photo']['tmp_name'];
            //Et on le déplace dans le dossier UPLOAD.
            $uniqueFile = time() . '_' . basename($photoName);
            move_uploaded_file($photoTmpName, $uploadDir . $uniqueFile);
            // -------------------------------------------------------------

            // On interroge la BDD.
            $menusAdmManager = new MenusAdmManager();
            $menusAdmManager->insert($_POST, $uniqueFile);
            // redirection sur la 1ere page du dashboard.
            header('Location: /admin/menus/read');
        }
        return $this->twig->render('Admin/Menus/menuC.html.twig');
    }

    // UPDATE D'UN ITEM
    public function update(int $id)
    {
        $menusAdmManager = new MenusAdmManager();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $menusAdmManager->update($_POST);
            header('Location: /admin/menus/read');
        }

        $menus = $menusAdmManager->selectOneById($id);
        return $this->twig->render('Admin/Menus/menuU.html.twig', ['menu' => $menus]);
    }

    // DELETE D'UN ITEM
    public function delete(int $id)
    {
        $menusAdmManager = new MenusAdmManager();
        $menusAdmManager->delete($id);
        header('Location: /admin/menus/read');
    }
}

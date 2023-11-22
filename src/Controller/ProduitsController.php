<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\ProduitsManager;

class ProduitsController extends AbstractController
{
    /* Liste produits */
    public function index()
    {
        $produitsManager = new ProduitsManager();
        $produits = $produitsManager->selectAll();

        return $this->twig->render('Admin/Produits/produits.html.twig', ['produits' => $produits]);
    }

    /* Ajout produits */
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produitsManager = new ProduitsManager();
            $produitsManager->insert($_POST);

            header('Location: /produits');
        }
        return $this->twig->render('Admin/Produits/add.html.twig');
    }

    /* Modification de la BDD */
    public function edit(int $id)
    {
        $produitsManager = new ProduitsManager();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produitsManager->update($_POST);

            header('Location: /produits');
        }
        $produit = $produitsManager->selectOneById($id);
        return $this->twig->render('Admin/Produits/edit.html.twig', ['produit' => $produit]);
    }

    /* Suppression produit */
    public function delete(int $id)
    {
        $produitsManager = new ProduitsManager();
        $produitsManager->delete($id);
        header('Location: /produits');
        ;
    }
}

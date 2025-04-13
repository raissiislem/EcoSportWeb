<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/client', name: 'accueil_client')]
    public function accueilClient(): Response
    {
        return $this->render('/client/accueil.html.twig');
    }

    #[Route('/admin', name: 'accueil_admin')]
    public function accueilAdmin(): Response
    {
        return $this->render('/admin/accueil.html.twig');
    }

    #[Route('/client/evenements', name: 'evenements_client')]
    public function evenementsClient(): Response
    {
        return $this->render('/client/evenements.html.twig');
    }

    #[Route('/client/equipements', name: 'equipements_client')]
    public function equipementsClient(): Response
    {
        return $this->render('/client/equipements.html.twig');
    }

    #[Route('/client/reclamations', name: 'reclamations_client')]
    public function reclamationsClient(): Response
    {
        return $this->render('reclamation_client/index.html.twig');
    }

    #[Route('/admin/evenements', name: 'evenements_admin')]
    public function evenementsAdmin(): Response
    {
        return $this->render('/admin/evenements.html.twig');
    }

    #[Route('/admin/equipements', name: 'equipements_admin')]
    public function equipementsAdmin(): Response
    {
        return $this->render('/admin/equipements.html.twig');
    }

    #[Route('/admin/reclamations', name: 'reclamations_admin')]
    public function reclamationsAdmin(): Response
    {
        return $this->render('reclamation_admin/index.html.twig');
    }

    #[Route('/admin/utilisateurs', name: 'utilisateurs_admin')]
    public function utilisateursAdmin(): Response
    {
        return $this->render('/admin/utilisateurs.html.twig');
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(): Response
    {
        return $this->render('main/accueil.html.twig');
    }

    #[Route('/evenements', name: 'evenements')]
    public function evenements(): Response
    {
        return $this->render('main/evenements.html.twig');
    }

    #[Route('/equipements', name: 'equipements')]
    public function equipements(): Response
    {
        return $this->render('main/equipements.html.twig');
    }

    #[Route('/reclamations', name: 'reclamations')]
    public function reclamations(): Response
    {
        return $this->render('reclamation/index.html.twig');
    }
}

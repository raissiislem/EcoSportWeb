<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Reclamation;
use App\Form\ReclamationType;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;


class ReclamationController extends AbstractController
{
    #[Route('/reclamations', name: 'reclamations')]
    public function index(ReclamationRepository $reclamationRepository): Response
    {
        $reclamations = $reclamationRepository->findAll();
        return $this->render('reclamation/index.html.twig', [
            'reclamations' => $reclamations,
        ]);
    }

    #[Route('/reclamations/new', name: 'reclamation_new')]
    public function new(ManagerRegistry $mr, Request $req): Response
    {
        $reclamation = new Reclamation();
        $user = $mr->getRepository(User::class)->find(1);

        $reclamation->setUser($user);
        $reclamation->setStatus('EN_ATTENTE');



        // Create the form
        $form = $this->createForm(ReclamationType::class, $reclamation);

        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            $em=$mr->getManager();
            $em->persist($user);
            $em->persist($reclamation);
            $em->flush();


            // Redirect or return a response
            return $this->redirectToRoute('reclamations');
        }

        return $this->render('reclamation/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }






    #[Route('/reclamations/{id}/edit', name: 'reclamation_edit')]
    public function edit(Request $request, Reclamation $reclamation, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('reclamations');
        }

        return $this->render('reclamation/edit.html.twig', [
            'form' => $form->createView(),
            'reclamation' => $reclamation
        ]);
    }

    #[Route('/reclamations/{id}/delete', name: 'reclamation_delete')]
    public function delete(Reclamation $reclamation, EntityManagerInterface $em): Response
    {
        $em->remove($reclamation);
        $em->flush();
        return $this->redirectToRoute('reclamations');
    }

    #[Route('/reclamations/{id}', name: 'reclamation_show')]
    public function show(Reclamation $reclamation): Response
    {
        return $this->render('reclamation/show.html.twig', [
            'reclamation' => $reclamation
        ]);
    }
}

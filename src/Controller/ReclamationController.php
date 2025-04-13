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
    #[Route('/admin/reclamations', name: 'reclamations_admin')]
    public function index_admin(ReclamationRepository $reclamationRepository): Response
    {
        $reclamations = $reclamationRepository->findAll();
        return $this->render('reclamation_admin/index.html.twig', [
            'reclamations' => $reclamations,
        ]);
    }

    #[Route('/client/reclamations', name: 'reclamations_client')]
    public function index_client(ReclamationRepository $reclamationRepository): Response
    {
        $reclamations = $reclamationRepository->findByUserId(1);
        return $this->render('reclamation_client/index.html.twig', [
            'reclamations' => $reclamations,
        ]);
    }

    #[Route('/client/reclamations/new', name: 'reclamation_new')]
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


            return $this->redirectToRoute('reclamations_client');
        }



        return $this->render('reclamation_client/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/reclamations/{id}/suivre', name: 'reclamation_suivre')]
    public function suivre(Reclamation $reclamation, Request $request, ManagerRegistry $mr): Response
    {
        if ($request->isMethod('POST')) {
            $answer = $request->request->get('answer');
            $reclamation->setAnswer($answer);
            $reclamation->setStatus('RESOLU');

            $em = $mr->getManager();
            $em->persist($reclamation);
            $em->flush();

            return $this->redirectToRoute('reclamations');
        }

        return $this->render('reclamation_admin/suivre.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }

    #[Route('/admin/reclamations/{id}/en-cours', name: 'reclamation_encours')]
    public function markEnCours(Reclamation $reclamation, ManagerRegistry $mr): Response
    {
        $reclamation->setStatus('EN_COURS');

        $em = $mr->getManager();
        $em->persist($reclamation);
        $em->flush();

        return $this->redirectToRoute('reclamations_admin');
    }







    #[Route('/client/reclamations/{id}/edit', name: 'reclamation_edit')]
    public function edit(Request $request, Reclamation $reclamation, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('reclamations');
        }

        return $this->render('reclamation_client/edit.html.twig', [
            'form' => $form->createView(),
            'reclamation' => $reclamation
        ]);
    }

    #[Route('/client/reclamations/{id}/delete', name: 'reclamation_delete')]
    public function delete(Reclamation $reclamation, EntityManagerInterface $em): Response
    {
        $em->remove($reclamation);
        $em->flush();
        return $this->redirectToRoute('reclamations');
    }

    #[Route('/client/reclamations/{id}', name: 'reclamation_show_client')]
    public function showClient(Reclamation $reclamation): Response
    {
        return $this->render('reclamation_client/show.html.twig', [
            'reclamation' => $reclamation
        ]);
    }

    #[Route('/admin/reclamations/{id}', name: 'reclamation_show_admin')]
    public function showAdmin(Reclamation $reclamation): Response
    {
        return $this->render('reclamation_admin/show.html.twig', [
            'reclamation' => $reclamation
        ]);
    }
}

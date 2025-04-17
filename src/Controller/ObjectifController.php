<?php

namespace App\Controller;

use App\Entity\Objectif;
use App\Form\ObjectifType;
use App\Repository\ObjectifRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/objectif')]
final class ObjectifController extends AbstractController{
    #[Route(name: 'app_objectif_index', methods: ['GET'])]
    public function index(ObjectifRepository $objectifRepository): Response
    {
        return $this->render('objectif/back/index.html.twig', [
            'objectifs' => $objectifRepository->findAll(),
        ]);
    }




    #[Route('/new', name: 'app_objectif_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {    
        $objectif = new Objectif();
        $form = $this->createForm(ObjectifType::class, $objectif);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
           
            $file = $form->get('image')->getData();
    
            if ($file) {
                $filename = uniqid() . '.' . $file->guessExtension();
                $file->move($this->getParameter('images_directory'), $filename);

                $objectif->setImage($filename);
            }
    
           
            $entityManager->persist($objectif);
            $entityManager->flush();
            return $this->redirectToRoute('app_objectif_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('objectif/back/new.html.twig', [
            'objectif' => $objectif,
            'form' => $form,
        ]);
    }


    




    #[Route('/{id}', name: 'app_objectif_show', methods: ['GET'])]
    public function show(Objectif $objectif): Response
    {
        return $this->render('objectif/back/show.html.twig', [
            'objectif' => $objectif,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_objectif_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Objectif $objectif, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ObjectifType::class, $objectif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_objectif_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('objectif/back/edit.html.twig', [
            'objectif' => $objectif,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_objectif_delete', methods: ['POST'])]
    public function delete(Request $request, Objectif $objectif, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$objectif->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($objectif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_objectif_index', [], Response::HTTP_SEE_OTHER);
    }
}

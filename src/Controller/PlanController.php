<?php

namespace App\Controller;

use App\Entity\Plan;
use App\Entity\Objectif;
use App\Repository\ObjectifRepository;
use App\Form\PlanType;
use App\Repository\PlanRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/plan')]
final class PlanController extends AbstractController{
    #[Route('/all/{id}', name: 'app_plan_by_objectif', methods: ['GET'])]
    public function plansByObjectif(int $id, PlanRepository $planRepository, ObjectifRepository $objectifRepository): Response
    {
        $plans = $planRepository->findByObjectifId($id);
        $objectif = $objectifRepository->find($id); // on récupère l'objectif aussi
    
        return $this->render('plan/index.html.twig', [
            'plans' => $plans,
            'objectif' => $objectif, // on envoie l'objectif
        ]);
    }
    #[Route('/all1/{id}', name: 'app_plan_by_objectif1', methods: ['GET'])]
    public function plansByObjectif1(int $id, PlanRepository $planRepository, ObjectifRepository $objectifRepository): Response
    {
        $plans = $planRepository->findByObjectifId($id);
        $objectif = $objectifRepository->find($id); // on récupère l'objectif aussi
    
        return $this->render('objectif/front/plan.html.twig', [
            'plans' => $plans,
            'objectif' => $objectif, // on envoie l'objectif
        ]);
    }
    #[Route('/new/{id}', name: 'app_plan_new', methods: ['GET', 'POST'])]
    public function new(int $id, Request $request, EntityManagerInterface $entityManager, ObjectifRepository $objectifRepository): Response
    {
        $objectif = $objectifRepository->find($id);
    
        if (!$objectif) {
            throw $this->createNotFoundException('Objectif non trouvé');
        }
    
        $plan = new Plan();
        $plan->setIdObj($objectif); 
    
        $form = $this->createForm(PlanType::class, $plan);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($plan);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_plan_by_objectif', ['id' => $objectif->getId()]);
        }
    
        return $this->render('plan/new.html.twig', [
            'plan' => $plan,
            'form' => $form,
        ]);
    }
    
    #[Route('/{id}', name: 'app_plan_show', methods: ['GET'])]
    public function show(Plan $plan): Response
    {
        return $this->render('plan/show.html.twig', [
            'plan' => $plan,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_plan_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Plan $plan, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PlanType::class, $plan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_objectif_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('plan/edit.html.twig', [
            'plan' => $plan,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_plan_delete', methods: ['POST'])]
    public function delete(Request $request, Plan $plan, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$plan->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($plan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_objectif_index', [], Response::HTTP_SEE_OTHER);
    }
}

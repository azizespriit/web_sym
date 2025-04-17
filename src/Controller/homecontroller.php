<?php

namespace App\Controller;
use App\Repository\ObjectifRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class homecontroller extends AbstractController{
    #[Route('/fnt', name: 'app_objectif_font', methods: ['GET'])]
    public function front(ObjectifRepository $objectifRepository): Response
    {
        return $this->render('objectif/front/front.html.twig', [
            'objectifs' => $objectifRepository->findAll(),
        ]);
    }
}

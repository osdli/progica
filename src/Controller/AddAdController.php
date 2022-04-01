<?php

namespace App\Controller;

use App\Entity\Lodge;
use App\Form\DescriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddAdController extends AbstractController
{
    #[Route('/ajouter-annonce', name: 'app_add_ad')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ad = new Lodge();
        $form = $this->createForm(DescriptionType::class, $ad);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $ad = $form->getData();

            $entityManager->persist($ad);
            $entityManager->flush();

        }

        return $this->render('add_ad/index.html.twig',  [
            'form'=>$form->createView()
        ]);
    }
}

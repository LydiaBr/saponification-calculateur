<?php

namespace App\Controller;

use App\Entity\Huile;
use App\Entity\Savon;
use App\Form\SavonType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SavonController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * @Route("/", name="savons_accueil")
     */
    public function home(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render("savons/accueil.html.twig");
    }

    /**
     * @Route("/creation", name="savons_creation")
     */
    public function creation(Request $request,
                             EntityManagerInterface $entityManager):Response
    {
        $savon = new Savon();
        $savon->setDateCreation(new \DateTime());

        $savonForm = $this->createForm(SavonType::class, $savon);
        $savonForm->handleRequest($request);

        if($savonForm->isSubmitted() && $savonForm->isValid()){
            $entityManager->persist($savon);
            $entityManager->flush();

            $this->addFlash('success', 'Savon ajouté avec succès.');

            return $this->redirectToRoute("savons_accueil");
        }

        return $this->render("savons/creation.html.twig",[
            "savonForm"=>$savonForm->createView()
        ]);
    }

}
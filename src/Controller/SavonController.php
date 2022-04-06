<?php

namespace App\Controller;

use App\Entity\Huile;
use App\Entity\Savon;
use App\Form\SavonType;
use App\Repository\HuileRepository;
use App\Repository\SavonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/savons")
 */
class SavonController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    /**
     * @Route("/creation", name="savons_creation")
     */
    public function creation(Request                $request,
                             EntityManagerInterface $entityManager,
                             HuileRepository        $huileRepository): Response
    {
        $huiles = $huileRepository->findAll();


        $savon = new Savon();
        $savon->setDateCreation(new \DateTime());


        $savonForm = $this->createForm(SavonType::class, $savon);
        $savonForm->handleRequest($request);


        if ($savonForm->isSubmitted() && $savonForm->isValid()) {
            $entityManager->persist($savon);
            $entityManager->flush();

            $this->addFlash('success', 'Savon ajouté avec succès.');

            return $this->redirectToRoute("main_accueil");
        }

        return $this->render("savons/creation.html.twig", [
            "savonForm" => $savonForm->createView(),
            "huiles" => $huiles,
            "savon"=>$savon
        ]);
    }

    /**
     * @Route("/detail/{id}", name="savons_detail")
     */
    public function detail(int $id, SavonRepository $savonRepository): Response
    {
        $savon = $savonRepository->find($id);
        return $this->render("savons/detail.html.twig", [
            "savon" => $savon
        ]);
    }

    /**
     * @Route("/liste", name="savons_liste")
     */
    public function liste(SavonRepository $savonRepository): Response
    {
        $savons = $savonRepository->findAll();
        return $this->render("savons/liste.html.twig", [
            "savons" => $savons
        ]);
    }

    /**
     * @Route("/creation/calcul", name="savons_calculSoude")
     */
    public function calculSoude(Request                $request,
                                EntityManagerInterface $entityManager,
                                HuileRepository        $huileRepository): Response
    {
        $huiles = $huileRepository->findAll();


        $savon = new Savon();
        $savon->setDateCreation(new \DateTime());


        $savonForm = $this->createForm(SavonType::class, $savon);
        $savonForm->handleRequest($request);


        if ($savonForm->isSubmitted() && $savonForm->isValid()) {
            $masseSoude = 50;


            $savon->setMasseSoude($masseSoude);

            return $this->redirectToRoute("savons_calculSoude");
        }
        return $this->render("savons/calculerSoude.html.twig", [
            "savonForm" => $savonForm->createView(),
            "huiles" => $huiles,
            "savon"=>$savon
        ]);


    }
}
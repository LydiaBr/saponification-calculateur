<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class SavonController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * @Route("/savons", name="savons_accueil")
     */
    public function home(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render("savons/accueil.html.twig");
    }

}
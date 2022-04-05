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

class MainController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * @Route("/", name="main_accueil")
     */
    public function home(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render("main/accueil.html.twig");
    }


}
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    /**
     * @Route("/", name="main")
     */
    public function main()
    {
        return $this->render('main/index.html.twig', [


        ]);
    }
    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        return $this->render('main/home.html.twig' );
    }


}

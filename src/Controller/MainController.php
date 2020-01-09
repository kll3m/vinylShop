<?php

namespace App\Controller;

use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    /**
     * @Route("/", name="main")
     */
    public function main(AlbumRepository $albumRepository)
    {
        return $this->render('album/index.html.twig', [
        'albums' => $albumRepository->findAll(),
    ]);

    }

}

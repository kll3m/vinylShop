<?php

namespace App\Controller;

use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    protected $commandeRepository;

    public function __construct(commandeRepository $commandeRepository)
    {
        $this->commandeRepository=$commandeRepository;
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        $nbCommande = $this->commandeRepository->count(['etatCommande'=>'1']);
        $commandesEnCours = $this->commandeRepository->count(['etatCommande'=>'2']);
        $commandesLivrees = $this->commandeRepository->count(['etatCommande'=>'3']);
        return $this->render('admin/index.html.twig', [
            'commandePassee'=>$nbCommande,
            'commandeEnCours'=>$commandesEnCours,
            'commandeLivree'=>$commandesLivrees,
            'total'=>$nbCommande+$commandesEnCours+$commandesLivrees
        ]);
    }
}

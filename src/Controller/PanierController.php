<?php

namespace App\Controller;

use App\Repository\AlbumRepository;
use App\Service\Panier\ServicePanier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(ServicePanier $servicePanier)
    {
        return $this->render('panier/index.html.twig', [
            'items'=>$servicePanier->getFullPanier(),
            'total'=>$servicePanier->getTotal()
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="panier_add")
     */
    public function add($id, ServicePanier $servicePanier){

        $servicePanier->add($id);
        return $this->redirectToRoute('panier');
    }

    /**
     * @Route("/panier/remove/{id}", name="panier_remove")
     */
    public function remove($id, ServicePanier $servicePanier){

        $servicePanier->remove($id);
        return $this->redirectToRoute('panier');
    }

    public function sizePanier(ServicePanier $servicePanier){
        $res = $servicePanier->getPanierSize();
        return $res;
    }
}

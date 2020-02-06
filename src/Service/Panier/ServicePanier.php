<?php

namespace App\Service\Panier;

use App\Repository\AlbumRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ServicePanier{

    protected $albumRepository;
    protected  $session;

    public function __construct(SessionInterface $session, AlbumRepository $albumRepository)
    {
        $this->session = $session;
        $this->albumRepository = $albumRepository;
    }

    public function add(int $id) {
        $panier=$this->session->get('panier',[]);

        if(!empty($panier[$id])){
            $panier[$id]++;
        }else {
            $panier[$id] = 1;
        }

        $this->session->set('panier', $panier);
    }

    public function remove(int $id) {
        $panier = $this->session->get('panier', []);

        if(!empty($panier[$id])){
            unset($panier[$id]);
        }

        $this->session->set('panier',$panier);
    }

    public function getFullPanier() : array {
        $panier = $this->session->get('panier', []);

        $panierWithData=[];

        foreach ($panier as $id => $quantity) {
            $panierWithData[] = [
                'album' => $this->albumRepository->find($id),
                'quantity' => $quantity
            ];
        }

        return $panierWithData;
    }

    public function getTotal() : float {
        $total = 0;

        foreach ($this->getFullPanier() as $item) {
            $total+=$item['album']->getPrixAlbum() * $item['quantity'];
        }
        return $total;
    }

}
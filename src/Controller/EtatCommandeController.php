<?php

namespace App\Controller;

use App\Entity\EtatCommande;
use App\Form\EtatCommandeType;
use App\Repository\EtatCommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/etat/commande")
 */
class EtatCommandeController extends AbstractController
{
    /**
     * @Route("/", name="etat_commande_index", methods={"GET"})
     */
    public function index(EtatCommandeRepository $etatCommandeRepository): Response
    {
        return $this->render('etat_commande/index.html.twig', [
            'etat_commandes' => $etatCommandeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="etat_commande_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $etatCommande = new EtatCommande();
        $form = $this->createForm(EtatCommandeType::class, $etatCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($etatCommande);
            $entityManager->flush();

            return $this->redirectToRoute('etat_commande_index');
        }

        return $this->render('etat_commande/new.html.twig', [
            'etat_commande' => $etatCommande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="etat_commande_show", methods={"GET"})
     */
    public function show(EtatCommande $etatCommande): Response
    {
        return $this->render('etat_commande/show.html.twig', [
            'etat_commande' => $etatCommande,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="etat_commande_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EtatCommande $etatCommande): Response
    {
        $form = $this->createForm(EtatCommandeType::class, $etatCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etat_commande_index');
        }

        return $this->render('etat_commande/edit.html.twig', [
            'etat_commande' => $etatCommande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="etat_commande_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EtatCommande $etatCommande): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etatCommande->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($etatCommande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('etat_commande_index');
    }
}

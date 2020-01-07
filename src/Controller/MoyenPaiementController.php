<?php

namespace App\Controller;

use App\Entity\MoyenPaiement;
use App\Form\MoyenPaiementType;
use App\Repository\MoyenPaiementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/moyen/paiement")
 */
class MoyenPaiementController extends AbstractController
{
    /**
     * @Route("/", name="moyen_paiement_index", methods={"GET"})
     */
    public function index(MoyenPaiementRepository $moyenPaiementRepository): Response
    {
        return $this->render('moyen_paiement/index.html.twig', [
            'moyen_paiements' => $moyenPaiementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="moyen_paiement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $moyenPaiement = new MoyenPaiement();
        $form = $this->createForm(MoyenPaiementType::class, $moyenPaiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($moyenPaiement);
            $entityManager->flush();

            return $this->redirectToRoute('moyen_paiement_index');
        }

        return $this->render('moyen_paiement/new.html.twig', [
            'moyen_paiement' => $moyenPaiement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="moyen_paiement_show", methods={"GET"})
     */
    public function show(MoyenPaiement $moyenPaiement): Response
    {
        return $this->render('moyen_paiement/show.html.twig', [
            'moyen_paiement' => $moyenPaiement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="moyen_paiement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MoyenPaiement $moyenPaiement): Response
    {
        $form = $this->createForm(MoyenPaiementType::class, $moyenPaiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('moyen_paiement_index');
        }

        return $this->render('moyen_paiement/edit.html.twig', [
            'moyen_paiement' => $moyenPaiement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="moyen_paiement_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MoyenPaiement $moyenPaiement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$moyenPaiement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($moyenPaiement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('moyen_paiement_index');
    }
}

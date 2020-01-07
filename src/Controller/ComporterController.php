<?php

namespace App\Controller;

use App\Entity\Comporter;
use App\Form\ComporterType;
use App\Repository\ComporterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comporter")
 */
class ComporterController extends AbstractController
{
    /**
     * @Route("/", name="comporter_index", methods={"GET"})
     */
    public function index(ComporterRepository $comporterRepository): Response
    {
        return $this->render('comporter/index.html.twig', [
            'comporters' => $comporterRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="comporter_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $comporter = new Comporter();
        $form = $this->createForm(ComporterType::class, $comporter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comporter);
            $entityManager->flush();

            return $this->redirectToRoute('comporter_index');
        }

        return $this->render('comporter/new.html.twig', [
            'comporter' => $comporter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comporter_show", methods={"GET"})
     */
    public function show(Comporter $comporter): Response
    {
        return $this->render('comporter/show.html.twig', [
            'comporter' => $comporter,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="comporter_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Comporter $comporter): Response
    {
        $form = $this->createForm(ComporterType::class, $comporter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comporter_index');
        }

        return $this->render('comporter/edit.html.twig', [
            'comporter' => $comporter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comporter_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Comporter $comporter): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comporter->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comporter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('comporter_index');
    }
}

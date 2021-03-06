<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Artiste;
use App\Form\AlbumType;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/album")
 */
class AlbumController extends AbstractController
{
    /**
     * @Route("/", name="album_index", methods={"GET"})
     */
    public function index(AlbumRepository $albumRepository): Response
    {
        return $this->render('album/index.html.twig', [
            'albums' => $albumRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nouveau", name="nouveau", methods={"GET"})
     * @param AlbumRepository $albumRepository
     * @return Response
     */

    public function nouveautes(AlbumRepository $albumRepository): Response
    {
        return $this->render('album/index.html.twig', [
            'albums' => $albumRepository->findBy([],['anneeAlbum'=>'ASC'] )
        ]);
    }

    /**
     * @Route("/recherche", name="recherche", methods={"GET"})
     */

    public function recherche(AlbumRepository $albumRepository, Request $request): Response
    {
        return $this->render('album/index.html.twig', [
            'albums' => $albumRepository->findBy([ 'nomAlbum'=>$request->get('search')],['nomAlbum'=>'ASC'])
        ]);
    }

    /**
     * @Route("/new", name="album_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $album = new Album();
        $form = $this->createForm(AlbumType::class, $album);
        $form->handleRequest($request);
/** test for cynthia */
        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form['imgAlbum']->getData();
            $nomAlbum = $form['nomAlbum']->getData();

            $image->move(
                $this->getParameter('images_directory'),
                $nomAlbum . '.' . $image->guessExtension()
            );

            // je peux te taper dessus?

            $album->setImgAlbum("album");
            $album->setCreationAlbum("05-02-2020");


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($album);
            $entityManager->flush();

            return $this->redirectToRoute('album_index');
        }

        return $this->render('album/new.html.twig', [
            'album' => $album,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}", name="album_show", methods={"GET"})
     */
    public function show(Album $album): Response
    {
        return $this->render('album/show.html.twig', [
            'album' => $album,
        ]);
    }



    /**
     * @Route("/{id}/edit", name="album_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Album $album): Response
    {
        $form = $this->createForm(AlbumType::class, $album);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('album_index');
        }

        return $this->render('album/edit.html.twig', [
            'album' => $album,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="album_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Album $album): Response
    {
        if ($this->isCsrfTokenValid('delete'.$album->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($album);
            $entityManager->flush();
        }

        return $this->redirectToRoute('album_index');
    }
}

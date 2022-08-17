<?php

namespace App\Controller;

use App\Entity\Mouvement;
use App\Form\MouvementType;
use App\Repository\MouvementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mouvement")
 */
class MouvementController extends AbstractController
{
    /**
     * @Route("/", name="mouvement_index", methods={"GET"})
     */
    public function index(MouvementRepository $mouvementRepository): Response
    {
        return $this->render('mouvement/index.html.twig', [
            'mouvements' => $mouvementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="mouvement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mouvement = new Mouvement();
        $form = $this->createForm(MouvementType::class, $mouvement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mouvement);
            $entityManager->flush();

            return $this->redirectToRoute('mouvement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mouvement/new.html.twig', [
            'mouvement' => $mouvement,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="mouvement_show", methods={"GET"})
     */
    public function show(Mouvement $mouvement): Response
    {
        return $this->render('mouvement/show.html.twig', [
            'mouvement' => $mouvement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="mouvement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Mouvement $mouvement): Response
    {
        $form = $this->createForm(MouvementType::class, $mouvement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mouvement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mouvement/edit.html.twig', [
            'mouvement' => $mouvement,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="mouvement_delete", methods={"POST"})
     */
    public function delete(Request $request, Mouvement $mouvement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mouvement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mouvement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mouvement_index', [], Response::HTTP_SEE_OTHER);
    }
}

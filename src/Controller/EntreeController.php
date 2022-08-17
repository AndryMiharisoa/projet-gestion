<?php

namespace App\Controller;

use App\Entity\Entree;
use App\Entity\Fournisseur;
use App\Entity\Produit;
use App\Form\EntreeType;
use App\Repository\EntreeRepository;
use App\Repository\FournisseurRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/entree")
 */
class EntreeController extends AbstractController
{
    /**
     * @Route("/", name="entree_index", methods={"GET"})
     */
    public function index(EntreeRepository $entreeRepository, FournisseurRepository $fournisseurRepository, ProduitRepository $produitRepository): Response
    {
        return $this->render('entree/index.html.twig', [
            'entrees' => $entreeRepository->findAll(),
            'fournisseurs' => $fournisseurRepository->findAll(),
            'produits' => $produitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="entree_new", methods={"GET","POST"})
     */
    public function new(Request $request,EntityManagerInterface $entityManager, EntreeRepository $entreeRepository, FournisseurRepository $fournisseurRepository, ProduitRepository $produitRepository): Response
    {
        $response = new JsonResponse();
        $post = $request->request;
        $formData = $post->get('dataEntree');
        //dd($formData);
        //foreach($data as $item) {
        foreach($formData as $item) {
            $entree = new Entree();
            $entree->setFournisseur($fournisseurRepository->find($item['fournisseur']));
            $entree->setProduit($produitRepository->find($item['produit']));
            $entree->setEntrDate(new \DateTime());
            $entree->setEntrPrix($item['prix']);
            $entree->setEntrQuantite($item['quantite']);

            $entityManager->persist($entree);
        }
        $entityManager->flush();

        // recupérer list
        $listeA = $entreeRepository->findAll();
        $template = $this->renderView('entree/_list.html.twig', [
            'entrees' => $entreeRepository->findAll(),
        ]);        
        
        $result = ['templateList' => $template];

        $response->setData($result);

        return $response;
    }

    /**
     * @Route("/{id}", name="entree_show", methods={"GET"})
     */
    public function show(Entree $entree): Response
    {
        return $this->render('entree/show.html.twig', [
            'entree' => $entree,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="entree_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Entree $entree): Response
    {
        $form = $this->createForm(EntreeType::class, $entree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entree_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('entree/edit.html.twig', [
            'entree' => $entree,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="entree_delete", methods={"POST"})
     */
    public function delete(Request $request, Entree $entree): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entree->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entree);
            $entityManager->flush();
        }

        return $this->redirectToRoute('entree_index', [], Response::HTTP_SEE_OTHER);
    }
}

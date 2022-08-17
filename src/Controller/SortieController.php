<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Sortie;
use App\Form\SortieType;
use App\Repository\ClientRepository;
use App\Repository\ProduitRepository;
use App\Repository\SortieRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/sortie")
 */
class SortieController extends AbstractController
{
    /**
     * @Route("/", name="sortie_index", methods={"GET"})
     */

   
    public function index(SortieRepository $sortieRepository,ClientRepository $clientRepository,ProduitRepository $produitRepository): Response
        {
            return $this->render('sortie/index.html.twig', [
                'sorties' => $sortieRepository->findAll(),
                'clients'=>$clientRepository->findAll(),
                'produits'=>$produitRepository->findAll(),

            ]);
        }
    /**
     * @Route("/facture")
     */
    public function facture()
        {
            return $this->render('sortie/facture.html.twig');
        }

    /**
     * @Route("/new", name="sortie_new", methods={"GET","POST"})
     */
    public function new(Request $request,EntityManagerInterface $entityManager,SortieRepository $sortieRepository,ClientRepository $clientRepository,ProduitRepository $produitRepository): Response
       {
                $response= new JsonResponse();
                $post = $request->request;
                $formData = $post->get('dataSortie');
                foreach ($formData as $item) {
                    $sortie = new sortie();
                    $sortie->setClient($clientRepository->find($item['client']));
                    $sortie->setProduit($produitRepository->find($item['produit']));
                    $sortie->setSortDate(new \DateTime());
                    $sortie->setSortPrix($item['prix']);
                    $sortie->setSortQuantite($item['quantite']);

                    $entityManager->persist($sortie);
        }
        $entityManager->flush();
          // recupérer list
            $listeA = $sortieRepository->findAll();
            $template = $this->renderView('sortie/_liste_sortie.html.twig', [
                'sorties' => $sortieRepository->findAll(),
            ]);        
            
            $result = ['templateList' => $template];

            $response->setData($result);

            return $response;
        }

    /**
     * @Route("/{id}", name="sortie_show", methods={"GET"})
     */
    public function show(Sortie $sortie): Response
       {
            return $this->render('sortie/show.html.twig', [
                'sortie' => $sortie,
            ]);
       }

    /**
     * @Route("/{id}/edit", name="sortie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sortie $sortie): Response
       {
            $form = $this->createForm(SortieType::class, $sortie);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('sortie_index', [], Response::HTTP_SEE_OTHER);
            }

        return $this->renderForm('sortie/edit.html.twig', [
            'sortie' => $sortie,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="sortie_delete", methods={"POST"})
     */
    public function delete(Request $request, Sortie $sortie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sortie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sortie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sortie_index', [], Response::HTTP_SEE_OTHER);
    }
}

<?php

namespace App\Controller;

use App\Entity\Institue;
use App\Form\InstitueType;
use App\Repository\InstitueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/institue')]
class InstitueController extends AbstractController
{
    #[Route('/', name: 'app_institue_index', methods: ['GET'])]
    public function index(InstitueRepository $institueRepository): Response
    {
        return $this->render('institue/index.html.twig', [
            'institues' => $institueRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_institue_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $institue = new Institue();
        $form = $this->createForm(InstitueType::class, $institue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($institue);
            $entityManager->flush();

            return $this->redirectToRoute('app_institue_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('institue/new.html.twig', [
            'institue' => $institue,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_institue_show', methods: ['GET'])]
    public function show(Institue $institue): Response
    {
        return $this->render('institue/show.html.twig', [
            'institue' => $institue,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_institue_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Institue $institue, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(InstitueType::class, $institue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_institue_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('institue/edit.html.twig', [
            'institue' => $institue,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_institue_delete', methods: ['POST'])]
    public function delete(Request $request, Institue $institue, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$institue->getId(), $request->request->get('_token'))) {
            $entityManager->remove($institue);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_institue_index', [], Response::HTTP_SEE_OTHER);
    }
}

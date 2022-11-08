<?php

namespace App\Controller;

use App\Entity\Performances;
use App\Form\PerformancesType;
use App\Repository\PerformancesRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

#[Route('/performances')]
class PerformancesController extends AbstractController
{
    #[Route('/', name: 'app_performances_index', methods: ['GET'])]
    public function index(PerformancesRepository $performancesRepository): Response
    {
        return $this->render('performances/index.html.twig', [
            'performances' => $performancesRepository->findAll(),
        ]);
    }

    #[Route('/dashboard-Perf', name: 'dashboardPerf', methods: ['GET'])]
    public function dashboard(PerformancesRepository $performancesRepository): Response
    {
        return $this->render('performances/dashboard.html.twig', [
            'performances' => $performancesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_performances_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PerformancesRepository $performancesRepository): Response
    {

        $performance = new Performances();
        $form = $this->createForm(PerformancesType::class, $performance);
        $form->handleRequest($request);
        $performance->setDate(new \DateTime());



        if ($form->isSubmitted() && $form->isValid()) {
            $performancesRepository->save($performance, true);

            return $this->redirectToRoute('app_performances_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('performances/new.html.twig', [
            'performance' => $performance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_performances_show', methods: ['GET'])]
    public function show(Performances $performance): Response
    {
        return $this->render('performances/show.html.twig', [
            'performance' => $performance,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_performances_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Performances $performance, PerformancesRepository $performancesRepository): Response
    {
        $form = $this->createForm(PerformancesType::class, $performance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $performancesRepository->save($performance, true);

            return $this->redirectToRoute('app_performances_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('performances/edit.html.twig', [
            'performance' => $performance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_performances_delete', methods: ['POST'])]
    public function delete(Request $request, Performances $performance, PerformancesRepository $performancesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $performance->getId(), $request->request->get('_token'))) {
            $performancesRepository->remove($performance, true);
        }

        return $this->redirectToRoute('app_performances_index', [], Response::HTTP_SEE_OTHER);
    }
}

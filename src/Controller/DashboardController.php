<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('admin/dashboard', name: 'dashboard')]
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    #[Route('co/dashboard', name: 'dashboardUser')]
    public function dashboardUser(): Response
    {
        return $this->render('dashboard/dashboardUser.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}

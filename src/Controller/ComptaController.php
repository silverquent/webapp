<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ComptaController extends AbstractController
{
    #[Route('admin/compta', name: 'compta')]
    public function index(): Response
    {
        return $this->render('compta/index.html.twig', [
            'controller_name' => 'ComptaController',
        ]);
    }
}

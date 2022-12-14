<?php

namespace App\Controller;

use App\Entity\Exercices;
use App\Entity\Images;

use App\Form\ExercicesType;
use App\Repository\ExercicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('co/exercices')]
class ExercicesController extends AbstractController
{
    #[Route('/', name: 'app_exercices_index', methods: ['GET'])]
    public function index(ExercicesRepository $exercicesRepository): Response
    {
        return $this->render('exercices/index.html.twig', [
            'exercices' => $exercicesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_exercices_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ExercicesRepository $exercicesRepository): Response
    {
        $exercice = new Exercices();
        $form = $this->createForm(ExercicesType::class, $exercice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $exercicesRepository->save($exercice, true);

            return $this->redirectToRoute('app_exercices_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('exercices/new.html.twig', [
            'exercice' => $exercice,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_exercices_show', methods: ['GET'])]
    public function show(Exercices $exercice ,ExercicesRepository $exercicesRepository): Response
    {

        return $this->render('exercices/show.html.twig', [
            'exercice' => $exercice,
            'exercices' => $exercicesRepository->findOneBy([
                "id" => $exercice->getId()]
            ),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_exercices_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Exercices $exercice, ExercicesRepository $exercicesRepository): Response
    {
        $form = $this->createForm(ExercicesType::class, $exercice);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
          
            
            // On r??cup??re les images transmises
            $images = $form->get('images')->getData();

            // On boucle sur les images
            foreach ($images as $image) {
                // On g??n??re un nouveau nom de fichier
                $fichier = md5(uniqid()) . '.' . $image->guessExtension();
                $extension= $image->guessExtension();
                // On copie le fichier dans le dossier uploads
                $image->move(
                    $this->getParameter('file_exercices_directory'),
                    $fichier
                );
                
                // On cr??e l'image dans la base de donn??es
                $img = new Images();
                $img->setName($fichier);
                $img->setExtension($extension);
                $exercice->addImage($img);

               

                
            }
            $this->addFlash('success', 'L\'??cercice est bien modifi?? !');

            $exercicesRepository->save($exercice, true);

            return $this->redirectToRoute('app_exercices_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('exercices/edit.html.twig', [
            'exercice' => $exercice,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_exercices_delete', methods: ['POST'])]
    public function delete(Request $request, Exercices $exercice, ExercicesRepository $exercicesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $exercice->getId(), $request->request->get('_token'))) {
            $exercicesRepository->remove($exercice, true);
        }

        return $this->redirectToRoute('app_exercices_index', [], Response::HTTP_SEE_OTHER);
    }
}

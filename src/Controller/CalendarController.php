<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CalendarRepository;

class CalendarController extends AbstractController
{
    #[Route('/calendar', name: 'app_calendar')]
    public function index(CalendarRepository $CalendarRepository): Response
    {

        $events = $CalendarRepository->findAll();
        $rdvs=[];
        foreach ($events as $event ) {
            $rdvs[]=
            [
                'id'=> $event->getId(),
                'start'=> $event->getStart()->format("Y-m-d H:i:s"),
                'end'=> $event->getEnd()->format("Y-m-d H:i:s"),
                'backgroundColor'=> $event->getCours()->getColor(),
                'title'=> $event->getCours()->getTitle(),
                
            ];
        }
        $data = json_encode($rdvs);
       
        return $this->render('calendar/index.html.twig',compact('data'));
    }
}

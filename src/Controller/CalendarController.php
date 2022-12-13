<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CalendarRepository;
use App\Form\CalendarType;
use App\Entity\Calendar;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


class CalendarController extends AbstractController
{
    #[Route('admin/calendar', name: 'app_calendar')]
    public function index(Request $request, CalendarRepository $CalendarRepository): Response
    {

        $inputFileName = "/home/oihan/Dev/webApp/public/uploads/test.xls";

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);


        $spreadsheet->getActiveSheet()->getStyle('B3:B7')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFF0000');
  

        $calendar = new Calendar();
        $form = $this->createForm(CalendarType::class, $calendar);
        $form->handleRequest($request);

        if ($request->get('ajax')) {

            dd("test");
        }

        if ($form->isSubmitted() && $form->isValid()) {


            return $this->redirectToRoute('app_exercices_index', [], Response::HTTP_SEE_OTHER);
        }


        return $this->renderForm('calendar/index.html.twig', ['form' => $form,]);
    }


    #[Route('/testAjax', name: 'testAjax')]
    public function testAjax(Request $request, CalendarRepository $CalendarRepository): Response
    {


        $events = $CalendarRepository->findAll();
        $rdvs = [];
        foreach ($events as $event) {
            $rdvs[] =
                [
                    'id' => $event->getId(),
                    'start' => $event->getStart()->format("Y-m-d H:i:s"),
                    'end' => $event->getEnd()->format("Y-m-d H:i:s"),
                    'backgroundColor' => $event->getCours()->getColor(),
                    'title' => $event->getText(),
                ];
        }


        return new JsonResponse($rdvs);
    }


    #[Route('/new', name: 'new_date', methods: ['GET', 'POST'])]
    public function new(Request $request, CalendarRepository $calendarRepository): Response
    {
        $calendar = new Calendar();
        $form = $this->createForm(CalendarType::class, $calendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $calendarRepository->save($calendar, true);

            return $this->redirectToRoute('app_calendar', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('calendar_c/new.html.twig', [
            'calendar' => $calendar,
            'form' => $form,
        ]);
    }



    #[Route('/newAjjax', name: 'newDate', methods: ['POST'])]
    public function newAjax(Request $request, CalendarRepository $calendarRepository): Response
    {
        $calendar = new Calendar();
        $form = $this->createForm(CalendarType::class, $calendar);
        $form->handleRequest($request);
        if ($request->isXmlHttpRequest()) {
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $calendarRepository->save($calendar, true);

            return $this->redirectToRoute('app_calendar_c_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('calendar_c/new.html.twig', [
            'calendar' => $calendar,
            'form' => $form,
        ]);
    }
}

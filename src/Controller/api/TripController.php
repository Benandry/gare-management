<?php

namespace App\Controller\Api;

use App\Entity\Trips;
use App\Helpers\FormattedData;
use App\Repository\TripsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api/trip")]
class TripController extends AbstractController
{


    #[Route("/index", name: "app_api_trip_index", methods: ["GET", "POST"])]
    public function index(EntityManagerInterface $entityManager, TripsRepository $repository): Response
    {
        return $this->json([
            "message" => "Api triprs gare management.",
            "data" => $repository->findAll()
        ]);
    }

    #[Route("/create", name: "app_api_trip_create", methods: ["POST"])]
    public function create(Request $request, TripsRepository $repository, FormattedData $format): Response
    {
        try {
            $trips = new trips();
            $result = json_decode($request->getContent(), true);
            $trips = $format->formattedTripsData($result);
            $repository->update($trips);

            $repository->save($trips);
            return $this->json([$trips]);
        } catch (\Throwable $th) {
            return $this->json(['error' => "Error: " . $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route("/edit/{id<\d+>}", name: "app_api_trips_edit", methods: ["PATCH", "PUT"])]
    public function edit(Trips $trips, Request $request, TripsRepository $repository, FormattedData $format): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $trips = $format->formattedTripsData($data, $trips);
            $repository->update($trips);
            return $this->json($trips);
        } catch (\Throwable $th) {
            return $this->json(['error' => "Error: " . $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    #[Route("/show/{id<\d+>}", name: "app_api_trips_show", methods: ["GET"])]
    public function show(Trips $trips): Response
    {
        return $this->json([
            "message" => "Show travel information",
            "data" => $trips
        ]);
    }

    #[Route("/remove/{id<\d+>}", name: "app_api_trips_delete", methods: ["DELETE"])]
    public function delete(Trips $trips, TripsRepository $repository): Response
    {
        $repository->remove($trips);
        return $this->json([
            "message" => "Remove sucessfully",
            "status" => "OK",
        ]);
    }
}

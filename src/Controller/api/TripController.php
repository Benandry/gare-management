<?php

namespace App\Controller\Api;

use App\Entity\Trips;
use App\Helpers\FormattedData;
use App\Repository\TripsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api/trip")]
class TripController extends AbstractController
{


    #[Route("/index", name: "app_api_trip_index", methods: ["GET", "POST"])]
    public function index(TripsRepository $repository, FormattedData $format): Response
    {
        return $this->json([
            "message" => "Api trips gare management.",
            "data" => $repository->findAll()
        ]);
    }

    #[Route("/create", name: "app_api_trip_create", methods: ["POST"])]
    public function create(Request $request, TripsRepository $repository, FormattedData $format): Response
    {
        try {

            $result = json_decode($request->getContent(), true);
            $trips = $format->formattedTripsData($result, new trips());
            $trips = $repository->save($trips);
            return $this->json([
                "message" => "Create trip with success",
                "data" => $trips
            ]);
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
            $trips = $repository->update($trips);
            return $this->json(["message" => "Update trip with success", "data" => $trips]);
        } catch (\Throwable $th) {
            return $this->json(['error' => "Error: " . $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    #[Route("/show/{id<\d+>}", name: "app_api_trips_show", methods: ["GET"])]
    public function show(int $id, TripsRepository $repository): Response
    {
        try {
            $trip = $repository->find($id);
            if (!$trip) {
                return $this->json([
                    "message" => "Show trips not found",
                ]);
            }
            return $this->json([
                "message" => "Show trips information",
                "data" =>   $trip
            ]);
        } catch (\Throwable $e) {
            return $this->json([
                "message" => "error $e->getMessage()",
                "status" => "error",
            ]);
        }
    }


    #[Route("/remove/{id<\d+>}", name: "app_api_trips_delete", methods: ["DELETE"])]
    public function delete(int $id, TripsRepository $repository): Response
    {
        try {
            $trips = $repository->find($id);
            $repository->remove($trips);
            return $this->json([
                "message" => "Remove sucessfully",
                "status" => "OK",
            ]);
        } catch (\Throwable $th) {
            return $this->json([
                "message" => "Trip not found , impossible to remove",
                "status" => "error",
            ]);
        }
    }
}

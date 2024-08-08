<?php

namespace App\Controller\Api;

use App\Entity\Traveler;
use App\Helpers\FormattedData;
use App\Repository\TravelerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api/traveler")]
class TravelerController extends AbstractController
{
    #[Route("/index", name: "app_api_traveler_index", methods: ["GET", "POST"])]
    public function index(TravelerRepository $repository): Response
    {
        return $this->json([
            "message" => "Api travelers gare management.",
            "data" => $repository->findAll()
        ]);
    }

    #[Route("/create", name: "app_api_traveler_create", methods: ["POST"])]
    public function create(Request $request, TravelerRepository $repository, FormattedData $format): Response
    {
        try {
            $traveler = new Traveler();
            $result = json_decode($request->getContent(), true);
            $traveler = $format->formattedTravelData($result);
            $repository->save($traveler);
            return $this->json([$traveler]);
        } catch (\Throwable $th) {
            return $this->json(['error' => "Error: " . $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route("/edit/{id<\d+>}", name: "app_api_traveler_edit", methods: ["PATCH", "PUT"])]
    public function edit(Traveler $traveler, Request $request, FormattedData $format, TravelerRepository $repository): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $traveler = $format->formattedTravelData($data, $traveler);
            $repository->update($traveler);
            return $this->json($traveler);
        } catch (\Throwable $th) {
            return $this->json(['error' => "Error: " . $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    #[Route("/show/{id<\d+>}", name: "app_api_traveler_show", methods: ["GET"])]
    public function show(Traveler $traveler): Response
    {
        return $this->json([
            "message" => "Show travel information",
            "data" => $traveler
        ]);
    }

    #[Route("/remove/{id<\d+>}", name: "app_api_traveler_delete", methods: ["DELETE"])]
    public function delete(Traveler $traveler, TravelerRepository $repository): Response
    {
        $repository->remove($traveler);
        return $this->json([
            "message" => "Remove sucessfully",
            "status" => "OK",
        ]);
    }
}

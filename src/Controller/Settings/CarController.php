<?php

namespace App\Controller\Settings;

use App\Entity\Car;
use App\Helpers\FormatData;
use App\Helpers\FormatJsonApi;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api/settings/car")]
class CarController extends AbstractController
{

    #[Route("/index", name: "app_api_index_car", methods: ["GET", "POST"])]
    public function index(
        Request $request,
        CarRepository $repository,
        FormatJsonApi $formatJson
    ): Response {
        $result = $formatJson->formatJson($request, $repository);
        $result["message"] = "Api cars gare management.";
        return $this->json($result, 200, [], ["groups" => "car:read"]);
    }

    #[Route("/create", name: "app_api_car_create", methods: ["POST"])]
    public function create(Request $request, CarRepository $repository, FormatData $format): Response
    {
        try {
            $car = new Car();
            $result = json_decode($request->getContent(), true);
            $car = $format->formatCarData($result, $car);
            $repository->save($car);
            return $this->json(["message" => "Create car is successfuly", "data" => $car]);
        } catch (\Throwable $th) {
            return $this->json(['error' => "Error: " . $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route("/edit/{id<\d+>}", name: "app_api_car_edit", methods: ["PATCH", "PUT"])]
    public function edit(Car $car, Request $request, FormatData $format, CarRepository $repository): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $car = $format->formatCarData($data, $car);
            $repository->update();
            return $this->json($car);
        } catch (\Throwable $th) {
            return $this->json(['error' => "Error: " . $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route("/show/{id<\d+>}", name: "app_api_car_show", methods: ["GET"])]
    public function show(Car $car): Response
    {
        return $this->json([
            "message" => "Show car information",
            "data" => $car
        ], 200, [], ["groups" => "car:read"]);
    }


    #[Route("/remove/{id<\d+>}", name: "app_api_car_delete", methods: ["DELETE"])]
    public function delete(Car $car, CarRepository $repository): Response
    {
        $repository->remove($car);
        return $this->json([
            "message" => "Remove sucessfully",
            "status" => "OK",
        ]);
    }
}

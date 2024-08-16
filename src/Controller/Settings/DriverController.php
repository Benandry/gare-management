<?php

namespace App\Controller\Settings;

use App\Entity\Driver;
use App\Helpers\FormatData;
use App\Helpers\FormatJsonApi;
use App\Repository\DriverRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api/settings/driver")]
class DriverController extends AbstractController
{

    #[Route("/index", name: "app_api_index_diver", methods: ["GET", "POST"])]
    public function index(
        Request $request,
        DriverRepository $repository,
        FormatJsonApi $formatJson
    ): Response {
        $result = $formatJson->formatJson($request, $repository);
        $result["message"] = "Api drivers gare management.";
        return $this->json($result, 200, [], ["groups" => "driver:read"]);
    }

    #[Route("/create", name: "app_api_driver_create", methods: ["POST"])]
    public function create(Request $request, DriverRepository $repository, FormatData $format): Response
    {
        try {
            $driver = new Driver();
            $result = json_decode($request->getContent(), true);
            $driver = $format->formatDriverData($result, $driver);
            $repository->save($driver);
            return $this->json(["message" => "insert drvier is successfuly", "data" => $driver]);
        } catch (\Throwable $th) {
            return $this->json(['error' => "Error: " . $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route("/edit/{id<\d+>}", name: "app_api_driver_edit", methods: ["PATCH", "PUT"])]
    public function edit(Driver $driver, Request $request, FormatData $format, DriverRepository $repository): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $driver = $format->formatDriverData($data, $driver);
            $repository->update();
            return $this->json(["message" => "insert drvier is successfuly", "data" => $driver]);
        } catch (\Throwable $th) {
            return $this->json(['error' => "Error: " . $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route("/show/{id<\d+>}", name: "app_api_driver_show", methods: ["GET"])]
    public function show(Driver $driver): Response
    {
        return $this->json([
            "message" => "Show driver information",
            "data" => $driver
        ], 200, [], ["groups" => "driver:read"]);
    }


    #[Route("/remove/{id<\d+>}", name: "app_api_driver_delete", methods: ["DELETE"])]
    public function delete(Driver $driver, DriverRepository $repository): Response
    {
        $repository->remove($driver);
        return $this->json([
            "message" => "Remove sucessfully",
            "status" => "OK",
        ]);
    }
}

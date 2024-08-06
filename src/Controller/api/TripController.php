<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api/trip")]
class TripController extends AbstractController
{
    #[Route("/index", name: "app_api_trip_index", methods: ["GET", "POST"])]
    public function index(): Response
    {
        return $this->json([
            "message" => "Api trips gare management.",
        ]);
    }
}

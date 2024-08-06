<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api/traveler")]
class TravelerController extends AbstractController
{
    #[Route("/index",name: "app_api_traveler_index",methods: ["GET","POST"]) ]
    public function index(): Response
    {
        return $this->json([
            "message" => "Api travelers gare management.",
        ])
    }
}
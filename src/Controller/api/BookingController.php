<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api/booking")]
class BookingController extends AbstractController
{
    #[Route("/index",name: "app_api_booking_index",methods: ["GET","POST"]) ]
    public function index(): Response
    {
        return $this->json([
            "message" => "Api Bookings gare management.",
        ])
    }
}
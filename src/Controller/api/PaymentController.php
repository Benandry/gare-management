<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api/payment")]
class PaymentController extends AbstractController
{
    #[Route("/index",name: "app_api_payment_index",methods: ["GET","POST"]) ]
    public function index(): Response
    {
        return $this->json([
            "message" => "Api payments gare management.",
        ])
    }
}
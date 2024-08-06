<?php

namespace App\Controller\Api;

use App\Entity\Payment;
use App\Helpers\FormattedData;
use App\Repository\PaymentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api/payment")]
class PaymentController extends AbstractController
{


    #[Route("/index", name: "app_api_payment_index", methods: ["GET", "POST"])]
    public function index(PaymentRepository $repository): Response
    {
        return $this->json([
            "message" => "Api payments gare management.",
            "data" => $repository->findAll()
        ]);
    }

    #[Route("/create", name: "app_api_payment_create", methods: ["POST"])]
    public function create(Request $request, FormattedData $format, PaymentRepository $repository): Response
    {
        try {
            $payment = new Payment();
            $result = json_decode($request->getContent(), true);
            $payment = $format->formattedPaymentData($result);
            $repository->save($payment);
            return $this->json([$payment]);
        } catch (\Throwable $th) {
            return $this->json(['error' => "Error: " . $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route("/edit/{id<\d+>}", name: "app_api_payment_edit", methods: ["PATCH", "PUT"])]
    public function edit(Payment $payment, Request $request, FormattedData $format, PaymentRepository $repository): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $payment = $format->formattedpaymentData($data, $payment);
            $repository->update($payment);
            return $this->json($payment);
        } catch (\Throwable $th) {
            return $this->json(['error' => "Error: " . $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    #[Route("/show/{id<\d+>}", name: "app_api_payment_show", methods: ["GET"])]
    public function show(Payment $payment): Response
    {
        return $this->json([
            "message" => "Show travel information",
            "data" => $payment
        ]);
    }

    #[Route("/remove/{id<\d+>}", name: "app_api_payment_delete", methods: ["DELETE"])]
    public function delete(Payment $payment, PaymentRepository $repository): Response
    {
        $repository->remove($payment);
        return $this->json([
            "message" => "Remove sucessfully",
            "status" => "OK",
        ]);
    }
}

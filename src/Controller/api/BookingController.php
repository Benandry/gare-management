<?php

namespace App\Controller\Api;

use App\Entity\Bookings;
use App\Helpers\FormattedData;
use App\Repository\BookingsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

#[Route("/api/booking")]
class BookingController extends AbstractController
{

    #[Route("/index", name: "app_api_booking_index", methods: ["GET", "POST"])]
    public function index(BookingsRepository $repository): Response
    {
        return $this->json([
            "message" => "Api bookings gare management.",
            "data" => $repository->findAll()
        ], 200, [], ['groups' => 'booking:read']);
    }

    #[Route("/create", name: "app_api_booking_create", methods: ["POST"])]
    public function create(Request $request, FormattedData $format, BookingsRepository $repository): Response
    {
        try {
            $result = json_decode($request->getContent(), true);
            $booking = $format->formattedBookingData($result, new Bookings());
            $booking = $repository->save($booking);
            return $this->json([$booking]);
        } catch (\Throwable $th) {
            return $this->json(['error' => "Error: " . $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route("/edit/{id<\d+>}", name: "app_api_booking_edit", methods: ["PATCH", "PUT"])]
    public function edit(Bookings $booking, Request $request, FormattedData $format, BookingsRepository $repository): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $booking = $format->formattedBookingData($data, $booking);
            $booking = $repository->update($booking);
            return $this->json(
                ["message" => "Updated bookings is successfully", "data" => $booking],
                200,
                ['Content-Type' => 'application/json'],
                ['groups' => 'booking:read']
            );
        } catch (\Throwable $th) {
            return $this->json(['error' => "Error: " . $th->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    #[Route("/show/{id<\d+>}", name: "app_api_booking_show", methods: ["GET"])]
    public function show(Bookings $booking): Response
    {
        return $this->json([
            "message" => "Show travel information",
            "data" => $booking
        ], 200, ['Content-Type' => 'application/json'], ["groups" => "booking:read"]);
    }

    #[Route("/remove/{id<\d+>}", name: "app_api_booking_delete", methods: ["DELETE"])]
    public function delete(Bookings $booking, BookingsRepository $repository): Response
    {
        $repository->remove($booking);
        return $this->json([
            "message" => "Remove sucessfully",
            "status" => "OK",
        ]);
    }
}

<?php

namespace App\Helpers;

use App\Entity\Bookings;
use App\Entity\Car;
use App\Entity\Driver;
use App\Entity\Payment;
use App\Entity\Traveler;
use App\Entity\Trips;
use App\Repository\DriverRepository;
use App\Repository\TravelerRepository;
use App\Repository\TripsRepository;
use DateTime;

class FormatData
{
    public function __construct(
        private TravelerRepository $travelerRepository,
        private TripsRepository $tripsRepository,
        private DriverRepository $driverRepository
    ) {}

    public function formattedBookingData(array $result, Bookings $booking): Bookings
    {
        $traveler = $this->travelerRepository->find($result['traveler_id']);
        $trip = $this->tripsRepository->find($result['trip_id']);
        return $booking->setTravelerId($traveler)
            ->setTripId($trip)
            ->setBookingDate(new DateTime($result['booking_date']))
            ->setStatut($result['statut']);
    }

    public function formattedTravelData(array $result, Traveler $traveler): Traveler
    {
        return $traveler->setFirstName($result['firstName'])
            ->setLastName($result['lastName'])
            ->setEmail($result['email'])
            ->setPhone($result['phone'])
            ->setAdresse($result['adresse'])
            ->setTravelHistory("travel_story");
    }

    public function formatCarData(array $result, Car $car): Car
    {
        $driver = $this->driverRepository->find($result['driver']);
        return $car->setName($result['name'])
            ->setMarks($result['marks'])
            ->setNumber($result['number'])
            ->setNumberOfPlace($result['number_of_place'])
            ->setType($result['type'])
            ->setDriver($driver);
    }

    public function formatDriverData(array $result, Driver $driver): Driver
    {
        return $driver->setName($result["name"])
            ->setLastName($result["lastName"])
            ->setPhone($result["phone"])
            ->setPermis($result["permis"]);
    }

    public function formattedTripsData(array $result, Trips $trips): Trips
    {
        return $trips->setDepartLocation($result['depart_location'])
            ->setArrivalLocation($result['arrival_location'])
            ->setDepartTime(new DateTime($result['depart_time']))
            ->setArrivalTime(new DateTime($result['arrival_time']))
            ->setPrice($result['price']);
    }

    public function formattedPaymentData(array $result, Payment $payment = null): Payment
    {
        if (!$payment) {
            $payment = new Payment();
        }

        return $payment->setAmount($result['amount'])
            ->setPaymentDate($result['payment_date'])
            ->setPaymentMethod($result['payment_method']);
    }
}

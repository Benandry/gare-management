<?php

namespace App\Helpers;

use App\Entity\Bookings;
use App\Entity\Payment;
use App\Entity\Traveler;
use App\Entity\Trips;
use App\Repository\TravelerRepository;
use App\Repository\TripsRepository;
use DateTime;

class FormattedData
{
    public function __construct(private TravelerRepository $travelerRepository, private TripsRepository $tripsRepository) {}

    /**
     * formatted data for booking
     * @param array $result
     * @param \App\Entity\Bookings $booking
     * @return \App\Entity\Bookings
     */
    public function formattedBookingData(array $result, Bookings $booking): Bookings
    {
        $traveler = $this->travelerRepository->find($result['traveler_id']);
        $trip = $this->tripsRepository->find($result['trip_id']);
        return $booking->setTravelerId($traveler)
            ->setTripId($trip)
            ->setBookingDate(new DateTime($result['booking_date']))
            ->setStatut($result['statut']);
    }

    public function formattedTravelData(array $result, Traveler $traveler = null): Traveler
    {
        if (!$traveler) {
            $traveler = new Traveler();
        }

        return $traveler->setFirstName($result['firstName'])
            ->setLastName($result['lastName'])
            ->setEmail($result['email'])
            ->setPhone($result['phone'])
            ->setAdresse($result['adresse'])
            ->setTravelHistory("travel");
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

<?php

namespace App\Helpers;

use App\Entity\Bookings;
use App\Entity\Payment;
use App\Entity\Traveler;
use App\Entity\Trips;

class FormattedData
{

    public function formattedBookingData(array $result, Bookings $booking = null): Bookings
    {
        if (!$booking) {
            $booking = new Bookings();
        }
        return $booking->setTravelerId($result['traveler_id'])
            ->setTripId($result['trip_id'])
            ->setBookingDate($result['booking_date'])
            ->setStatut($result['adresse']);
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

    public function formattedTripsData(array $result, Trips $trips = null): Trips
    {
        if (!$trips) {
            $trips = new Trips();
        }

        return $trips->setDepartLocation($result['depart_location'])
            ->setArrivalLocation($result['arrival_location'])
            ->setDepartTime($result['depart_time'])
            ->setArrivalTime($result['arrival_time'])
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

<?php
namespace App\Repositories;

use App\Models\BookingTransaction;
use App\Repositories\Contracts\BookingRepositoryInterface;

class BookingRepository implements BookingRepositoryInterface{
    public function createBooking(array $data)
    {
        // Logic to create a booking
        // For example, you might use Eloquent to create a new booking record in the database
        return BookingTransaction::create($data);
    }
    public function findTrxIdAndPhoneNumber($bookingTrxId, $phoneNumber)
    {
        // Logic to find a booking by transaction ID and phone number
        return BookingTransaction::where('booking_trx_id', $bookingTrxId)
            ->where('phone_number', $phoneNumber)
            ->first();
    }
}
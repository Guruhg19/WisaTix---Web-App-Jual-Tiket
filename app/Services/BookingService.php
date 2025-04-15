<?php
namespace App\Services;

use App\Models\BookingTransaction;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\TicketRepositoryInterface;
use App\Repositories\Contracts\BookingRepositoryInterface;

class BookingService{

    protected $ticketRepository;
    protected $bookingRepository;

    public function __construct(TicketRepositoryInterface $ticketRepository, BookingRepositoryInterface $bookingRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $this->bookingRepository = $bookingRepository;
    }

    public function calculateTotals($ticketId, $totalParticipant)
    {
        $ppn = 0.11;
        $price = $this->ticketRepository->getPrice($ticketId);

        $subTotal = $totalParticipant * $price;
        $totalPpn = $ppn * $subTotal;
        $totalAmount = $subTotal + $totalPpn;

        return [
            'sub_total' => $subTotal,
            'total_ppn' => $totalPpn,
            'total_amount' => $totalAmount
        ];
    }

    public function storeBookingInSession($ticket,$validatedData, $totals)
    {  
        session()->put('booking',[
            'ticket_id' => $ticket->id,
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'started_at' => $validatedData['started_at'],
            'total_participant' => $validatedData['total_participant'],
            'sub_total' => $totals['sub_total'],
            'total_ppn' => $totals['total_ppn'],
            'total_amount' => $totals['total_amount']
        ]);
    }

    public function payment()
    {
        $booking = session('booking');
        $ticket = $this->ticketRepository->find($booking['ticket_id']);
        return compact('booking','ticket');
    }

    // public function paymentStore(array $validated)
    // {
    //     $booking = session('booking');
    //     $bookingTransactionId = null;

    //     DB::transaction(function($validated, &$bookingTransactionId, $booking){
    //         if(isset($validated['proof'])){
    //             $proofPath = $validated['proof']->store('proofs','public');
    //             $validated['proof'] = $proofPath;
    //         }

    //         $validated['name'] = $booking['name'];
    //         $validated['email'] = $booking['email'];
    //         $validated['phone_number'] = $booking['phone_number'];
    //         $validated['total_participant'] = $booking['total_participant'];
    //         $validated['started_at'] = $booking['started_at'];
    //         $validated['total_amount'] = $booking['total_amount'];
    //         $validated['ticket_id'] = $booking['ticket_id'];
    //         $validated['is_paid'] = false;
    //         $validated['booking_trx_id'] = BookingTransaction::generateUnixTrxId();

    //         $newBooking = $this->bookingRepository->createBooking($validated);
    //         $bookingTransactionId = $newBooking->id;
            
    //     });
    //     return $bookingTransactionId;
    // }

    public function paymentStore(array $validated)
{
    $booking = session('booking');
    $bookingTransactionId = null;

    DB::transaction(function () use (&$bookingTransactionId, $validated, $booking) {
        if (isset($validated['proof'])) {
            $proofPath = $validated['proof']->store('proofs', 'public');
            $validated['proof'] = $proofPath;
        }

        $validated['name'] = $booking['name'];
        $validated['email'] = $booking['email'];
        $validated['phone_number'] = $booking['phone_number'];
        $validated['total_participant'] = $booking['total_participant'];
        $validated['started_at'] = $booking['started_at'];
        $validated['total_amount'] = $booking['total_amount'];
        $validated['ticket_id'] = $booking['ticket_id'];
        $validated['is_paid'] = false;
        $validated['booking_trx_id'] = BookingTransaction::generateUnixTrxId();

        $newBooking = $this->bookingRepository->createBooking($validated);
        $bookingTransactionId = $newBooking->id;
    });

    return $bookingTransactionId;
}




}
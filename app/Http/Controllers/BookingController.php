<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Services\BookingService;
use App\Http\Requests\StoreBookingRequest;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function booking(Ticket $ticket)
    {
        dd($ticket);
        // return view('front.booking',compact('ticket'));
    }

    public function bookingStore(Ticket $ticket, StoreBookingRequest $request)
    {
        $validated = $request->validated();
        $totals = $this->bookingService->calculateTotals($ticket->id,$validated['total_participant']);
        $this->bookingService->storeBookingInSession($ticket,$validated,$totals);
        
        return redirect()->route('front.payment');
    }



}

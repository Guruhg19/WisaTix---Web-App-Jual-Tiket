<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected $frontService;

    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }

    // Konsep Service Repository Pattern
    public function index()
    {
        $data = $this->frontService->getFrontPageData();

        return view('welcome', compact('data'));
    }
    

    // Konsep MVC
    // public function index(){
    //     $categories = Category::latest()->get();
    //     $popuparTickets = Ticket::where('is_popular', true)->latest()->take(10)->get();
    //     $newTickets = Ticket::latest()->take(10)->get();
    //     return view('welcome', compact('categories', 'popuparTickets', 'newTickets'));
    // }
}

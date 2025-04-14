<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\FrontService;

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
        // dd($data);
        return view('front.index', $data);
    }

    public function details(Ticket $ticket){
        dd($ticket);
        // return view('front.details', compact('ticket'));
    }

    public function category(Category $category){
        dd($category);
        // return view('front.category',compact('category'));
    }


}

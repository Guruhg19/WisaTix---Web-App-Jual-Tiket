<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\TicketRepositoryInterface;

class FrontService
{
    protected $categoryRepository;
    protected $ticketRepository;

    public function __construct(TicketRepositoryInterface $ticketRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $this->categoryRepository = $categoryRepository;
    }

    // Get Front Data
    public function getFrontData()
    {
        $categories = $this->categoryRepository->getAllCategories();
        $popularTickets = $this->ticketRepository->getPopularTickets(4);
        $newTickets = $this->ticketRepository->getAllNewTickets();

        return compact('categories', 'popularTickets', 'newTickets');
    }

    


}
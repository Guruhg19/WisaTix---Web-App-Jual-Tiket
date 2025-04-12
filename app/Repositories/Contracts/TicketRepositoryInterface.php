<?php
namespace App\Repositories\Contracts;

interface TicketRepositoryInterface{
    public function getPopularTickets($limit);
    public function getAllNewTickets();
    public function find($id);
    public function getPrice($ticketId);
}
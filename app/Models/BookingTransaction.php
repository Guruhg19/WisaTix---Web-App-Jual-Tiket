<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingTransaction extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'total_amount',
        'is_paid',
        'total_participant',
        'ticket_id',
        'started_at',
        'proof',
        'booking_trx_id'
    ];

    public function ticket(){
        return $this->belongsTo(Ticket::class,'ticket_id');
    }
    
}

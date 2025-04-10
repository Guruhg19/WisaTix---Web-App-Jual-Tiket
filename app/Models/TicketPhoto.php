<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketPhoto extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'photo',
        'ticket_id'
    ];

    public function ticket(){
        return $this->belongsTo(Ticket::class,'ticket_id');
    }
}

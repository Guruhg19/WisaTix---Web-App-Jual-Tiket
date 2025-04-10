<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
        use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'path_video',
        'about',
        'price',
        'category_id',
        'seller_id',
        'open_time_at',
        'close_time_at',
        'is_popular',
        'address'
    ];

    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function seller(){
        return $this->belongsTo(Seller::class,'seller_id');
    }

    public function photos(){
        return $this->hasMany(TicketPhoto::class);
    }

    public function bookingTransactions(){
        return $this->hasMany(BookingTransaction::class);
    }

}

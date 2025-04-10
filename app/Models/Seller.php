<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'name',
        'telephone',
        'location',
        'slug',
        'photo'
    ];

    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

}

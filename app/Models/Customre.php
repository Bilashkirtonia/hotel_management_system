<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customre extends Model
{
    use HasFactory;
    
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    function booking(){
        return $this->hasMany(Booking::class);
    }
}

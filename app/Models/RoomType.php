<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    function roomtypeimage(){
        return $this->hasMany(Roomtypeimages::class,'room_type_id');
    }
}

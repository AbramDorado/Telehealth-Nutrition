<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $table = 'meetings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 
        'room_name', 
        'start_time', 
        'end_time'
    ];

}

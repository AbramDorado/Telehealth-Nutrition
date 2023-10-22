<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeBlueActivation extends Model
{
    use HasFactory;
    protected $table = 'code_blue_activations'; // Make sure this matches your actual table name
    protected $primaryKey = 'code_number'; // Change this if your primary key column has a different name

    protected $fillable = [
        'code_number',
        'code_start_dt',
        'arrest_dt',
        'reason_for_activation',
        'initial_reporter',
        'code_team_arrival_dt',
        'e-cart_arrival_dt',
        'witnessed',
    ];
    

}

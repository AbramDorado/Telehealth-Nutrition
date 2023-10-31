<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeBlueActivation extends Model
{
    use HasFactory;
    protected $table = 'code_blue_activations'; 
    protected $primaryKey = 'code_number'; 

    protected $fillable = [
        'code_number',
        'code_start_dt',
        'arrest_dt',
        'reason_for_activation',
        'initial_reporter',
        'code_team_arrival_dt',
        'e-cart_arrival_dt',
        'witnessed',
        'patient_pin'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_pin', 'patient_pin');
    }

    public function initialResuscitation()
    {
    return $this->hasOne(InitialResuscitation::class, 'code_number', 'code_number');
    }



    

}

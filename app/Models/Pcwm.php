<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pcwm extends Model
{
    use HasFactory;
    protected $table = 'pcwms';
    protected $primaryKey = 'pcwm_id';

    protected $fillable = [
        'target_weight_2',
        'target_date',
        'starting_weight',
        'starting_date',
        'weighing_day',
        'weighing_time',
        'pcwm2_dt',
        'actual_weekly_weight',
        'loss',
        'gain',
        'is_archived',
        'patient_number',
    ];
    public $timestamps = true;

    public function patient()
    {
        return $this->belongsTo(PatientInformation::class, 'patient_number', 'patient_number');
    }
}
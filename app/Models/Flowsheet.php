<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flowsheet extends Model
{
    use HasFactory;
    protected $table = 'flowsheets';
    protected $primaryKey = 'flowsheet_id';

    protected $fillable = [
        'log_time',
        'last_edited_time',
        'breathing',
        'pulse',
        'bp_systolic',
        'bp_diastolic',
        'rhythm_on_check',
        'rhythm_with_pulse',
        'rhythm_intervention',
        'joules',
        'epinephrine_dose',
        'epinephrine_route',
        'amiodarone_dose',
        'amiodarone_route',
        'lidocaine_dose',
        'lidocaine_route',
        'free1_label',
        'free1_dose',
        'free1_route',
        'free2_label',
        'free2_dose',
        'free2_route',
        'comments',
    ];

    public function codeBlueActivation()
    {
        return $this->belongsTo(codeBlueActivation::class, 'code_number', 'code_number');
    }
}

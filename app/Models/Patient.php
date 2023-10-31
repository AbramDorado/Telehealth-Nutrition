<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
    protected $primaryKey = 'patient_pin';

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'suffix',
        'patient_pin',
        'visit_number',
        'birthday',
        'age',
        'sex',
        'height',
        'weight',
        'allergies',
        'location',
    ];

    public function codeBlueActivation()
    {
    return $this->hasMany(codeBlueActivation::class, 'code_number', 'code_number');
    }


}

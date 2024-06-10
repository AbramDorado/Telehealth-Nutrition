<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soap extends Model
{
    use HasFactory;
    protected $table = 'soap';
    protected $primaryKey = 'soap_id';

    protected $fillable = [
        'soap_dt',
        'subjective',
        'bp',
        'pr',
        'rr',
        'temp',
        'height',
        'weight',
        'bmi_1',
        'ecg',
        'cxr',
        'cbc',
        'ua',
        'crea',
        'bun',
        'bua',
        'lipid_profile',
        'sgot',
        'sgpt',
        'fbs',
        'nak',
        'hbaic',
        'hepabs',
        'others',
        'assessment',
        'plan',
        'patient_number',  
    ];

    public function patient()
    {
        return $this->belongsTo(PatientInformation::class, 'patient_number', 'patient_number');
    }
}
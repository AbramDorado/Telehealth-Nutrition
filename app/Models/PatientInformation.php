<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientInformation extends Model
{
    use HasFactory;
    protected $table = 'patient_infomration'; 
    protected $primaryKey = 'patient_number'; 

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'sex',
        'civil staus',
        'birthday',
        'age_1',
        'allergies',
        'position',
        'unit_assignment',
        'home_address',
        'bachelor_degree',
        'date_entered_service',
        'blood_type',
        'religion',
        'contact_number',
        'referral_control_num',
        'general_appearance',
        'skin',
        'heent',
        'neck',
        'chest',
        'heart',
        'breast',
        'abdomen',
        'musculoskeletal',
        'neurologic',
        'past_medical_history',
        'operations',
        'previous_hospitalization',
        'current_medication',
        'family_history',
        'psychosocial_history',
        'obstetric_score',
        'lmp',
        'menarche',
        'is_archived',
        'is_finalized',
    ];

    public function soap()
    {
        return $this->hasOne(Soap::class, 'patient_number', 'patient_number');
    }

    public function labRequest()
    {
        return $this->hasOne(LabRequest::class, 'patient_number', 'patient_number');
    }
    
    public function dietHistory()
    {
        return $this->hasOne(DietHistory::class, 'patient_number', 'patient_number');
    }
    
    public function pcwm()
    {
        return $this->hasOne(Pcwm::class, 'patient_number', 'patient_number');
    }
}

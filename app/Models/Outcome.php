<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    use HasFactory;

    protected $table = 'outcomes';
    protected $primaryKey = 'outcome_id';

    public function codeBlueActivation()
    {
        return $this->belongsTo(codeBlueActivation::class);
    }
}

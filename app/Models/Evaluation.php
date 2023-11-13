<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $table = 'evaluations';
    protected $primaryKey = 'evaluation_id';

    protected $fillable = ['question2', 'question2_1'];
    public $timestamps = true;

    public function codeBlueActivation()
    {
        return $this->belongsTo(codeBlueActivation::class);
    }
}

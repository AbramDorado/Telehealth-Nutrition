<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeTeam extends Model
{
    use HasFactory;

    protected $table = 'code_teams';
    protected $primaryKey = 'code_team_id';

    protected $fillable = [
        'code_team_leader',
        'code_team_co_leader',
        'recorder',
        'code_team_member',
        'intubated_by',
    ];


    public function codeBlueActivation()
    {
        return $this->belongsTo(codeBlueActivation::class, 'code_number', 'code_number');
    }
}

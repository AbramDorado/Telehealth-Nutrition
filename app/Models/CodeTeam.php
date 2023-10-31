<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeTeam extends Model
{
    use HasFactory;

    protected $table = 'code_teams';
    protected $primaryKey = 'code_team_id';

    public function codeBlueActivation()
    {
        return $this->belongsTo(codeBlueActivation::class);
    }
}

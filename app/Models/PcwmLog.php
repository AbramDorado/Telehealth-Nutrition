<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PcwmLog extends Model
{
    use HasFactory;
    protected $table = 'pcwm_logs';

    protected $primaryKey = 'pcwm_logs_id';

    protected $fillable = [
        'pcwm_id',
        'pcwm2_dt',
        'actual_weekly_weight',
        'loss',
        'gain',
    ];

    public $timestamps = true;

    public function pcwm()
    {
        return $this->belongsTo(Pcwm::class, 'pcwm_id', 'pcwm_id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Microclimate extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'observation_id',
        'temperature',
        'humidity',
        'pressure'
    ];

    /**
     * Get the observation that owns the microclimate.
     */
    public function observation()
    {
        return $this->belongsTo(Observation::class);
    }
}

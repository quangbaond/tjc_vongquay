<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrizeWheelUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'prize',
        'full_name',
        'address',
        'facebook',
        'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(PrizeWheelEvent::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrizeWheel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'fill_color',
        'text_color',
        'image',
        'probability',
        'is_win',
        'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(PrizeWheelEvent::class);
    }
}

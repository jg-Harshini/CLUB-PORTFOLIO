<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'club_id',
        'event_name',
        'description',
        'image_path',
        'winner_name', 'winner_photo', 'gallery',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'participants',
        'coordinators',
        'best_performance',
        'chief_guest'
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}

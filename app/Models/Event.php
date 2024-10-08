<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'date', 
        'start_time' => 'datetime:H:i:s', 
    ];

    protected $fillable = ['organizer_id', 'event_category_id', 'title', 'venue', 'date', 'start_time', 'description', 'booking_url', 'tags'];

    public function categoryEvent(): BelongsTo {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function organizer(): BelongsTo {
        return $this->belongsTo(Organizer::class, 'organizer_id');
    }
}

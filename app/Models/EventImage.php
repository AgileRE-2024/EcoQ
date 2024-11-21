<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    //
    protected $table = "event_images";

    protected $fillable = [
        "image_url",
        "event_id",
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

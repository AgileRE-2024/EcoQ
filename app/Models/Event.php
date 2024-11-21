<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'time',
        'date',
        'location',
        'image',
        'garden_id',
    ];

    /**
     * Get the garden that owns the event.
     */
    public function garden(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Garden::class);
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(EventImage::class);
    }
}

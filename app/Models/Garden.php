<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garden extends Model
{
    use HasFactory;

    protected $table = 'gardens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'location',
        'description',
        'image',
        'user_id',
        'phone_number',
        'open_time',
        'close_time',

    ];

    /**
     * Get the user that owns the garden.
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the plants for the garden.
     */
    public function plants(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Plant::class);
    }

    /**
     * Get the events for the garden.
     */
    public function events(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(GardenImage::class);
    }
}

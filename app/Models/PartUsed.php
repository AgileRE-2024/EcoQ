<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartUsed extends Model
{
    /** @use HasFactory<\Database\Factories\PartUsedFactory> */
    use HasFactory;

    protected $table = 'part_useds';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'part',
        'usage',
        'plant_id',
    ];

    /**
     * Get the plant that owns the part used.
     */
    public function plant(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Plant::class);
    }
}

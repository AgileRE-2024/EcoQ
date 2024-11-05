<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    /** @use HasFactory<\Database\Factories\ClassificationFactory> */
    use HasFactory;

    protected $table = 'classifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kingdom',
        'phylum',
        'class',
        'order',
        'family',
        'genus',
        'species',
        'plant_id',
    ];

    /**
     * Get the plant that owns the classification.
     */
    public function plant(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Plant::class);
    }
}

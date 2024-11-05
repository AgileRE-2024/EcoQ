<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PharmocologyAspect extends Model
{
    /** @use HasFactory<\Database\Factories\PharmocologyAspectFactory> */
    use HasFactory;

    protected $table = 'pharmocology_aspects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'toxicity',
        'contraindications',
        'warnings',
        'precautions',
        'side_effects',
        'plant_id',
    ];

    /**
     * Get the plant that owns the pharmocology aspect.
     */
    public function plant(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Plant::class);
    }
}

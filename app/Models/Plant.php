<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Plant extends Model
{
    /** @use HasFactory<\Database\Factories\PlantFactory> */
    use HasFactory, Searchable;

    protected $table = 'plants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'common_name',
        'scientific_name',
        'description',
        'habitat',
        'chemical_compounds',
        'qr_image',
        'image',
        'garden_id',
        'species_id',
    ];

    /**
     * Get the garden that owns the plant.
     */
    public function garden(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Garden::class);
    }

    /**
     * Get the comments for the plant.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the part used for the plant.
     */
    public function partUseds(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PartUsed::class);
    }

    /**
     * Get the pharmocology aspect for the plant.
     */
    public function pharmacologyAspect(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PharmocologyAspect::class);
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PlantImage::class);
    }

    public function species(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Species::class);
    }

    public function genus()
    {
        return $this->species->genus();
    }

    public function family()
    {
        return $this->genus->family();
    }

    public function order()
    {
        return $this->family->order();
    }

    public function class()
    {
        return $this->order->class();
    }

    public function phylum()
    {
        return $this->class->phylum();
    }

    public function kingdom()
    {
        return $this->phylum->kingdom();
    }

    public function PlantTags()
    {
        return $this->hasMany(PlantTag::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'plant_tags', 'plant_id', 'tag_id');
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'common_name' => $this->common_name,
            'scientific_name' => $this->scientific_name,
            'description' => $this->description,
            'habitat' => $this->habitat,
            'chemical_compounds' => $this->chemical_compounds,
        ];
    }

    protected $with = ['tags'];
}

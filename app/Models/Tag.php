<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = "tags";

    protected $fillable = [
        "name",
    ];

    public function plantTags()
    {
        return $this->hasMany(PlantTag::class);
    }

    public function plants()
    {
        return $this->belongsToMany(Plant::class, 'plant_tags', 'tag_id', 'plant_id');
    }
}

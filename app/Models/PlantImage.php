<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlantImage extends Model
{
    //
    protected $table = "plant_images";

    protected $fillable = [
        "plant_id",
        "image_url",
    ];

    public function image()
    {
        return $this->belongsTo(Plant::class);
    }
}

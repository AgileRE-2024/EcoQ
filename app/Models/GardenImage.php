<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GardenImage extends Model
{
    //

    protected $table = "garden_images";

    protected $fillable = [
        "image_url",
        "garden_id",
    ];


    public function image()
    {
        return $this->belongsTo(Garden::class);
    }
}

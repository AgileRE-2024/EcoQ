<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phylum extends Model
{
    //

    protected $table = "phylums";

    protected $fillable = ["name", "kingdom_id", "description"];

    public $timestamps = false;

    public function kingdom()
    {
        return $this->belongsTo(Kingdom::class);
    }

    public function classes()
    {
        return $this->hasMany(PlantClass::class);
    }
}

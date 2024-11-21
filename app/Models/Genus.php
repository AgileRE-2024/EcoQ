<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genus extends Model
{
    //

    protected $table = "genera";

    protected $fillable = [
        "name",
        "description",
        "family_id"
    ];
    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function species()
    {
        return $this->hasMany(Species::class);
    }
}

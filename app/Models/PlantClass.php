<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlantClass extends Model
{
    //

    protected $table = "classes";

    protected $fillable = [
        "name",
        "phylum_id",
        "description"
    ];

    public $timestamps = false;

    public function phylum()
    {
        return $this->belongsTo(Phylum::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

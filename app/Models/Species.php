<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    //

    protected $table = "species";
    protected $fillable = [
        "name",
        "genus_id",
        "description"
    ];

    public $timestamps = false;

    public function genus()
    {
        return $this->belongsTo(Genus::class);
    }

    public function plants()
    {
        return $this->hasMany(Plant::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //'

    protected $table = "orders";
    protected $fillable = [
        "name",
        "description",
        "class_id"
    ];

    public function class()
    {
        return $this->belongsTo(PlantClass::class);
    }

    public function families()
    {
        return $this->hasMany(Family::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    //

    protected $table = "families";

    protected $fillable = [
        "name",
        "description",
        "order_id"
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function genera()
    {
        return $this->hasMany(Genus::class);
    }
}

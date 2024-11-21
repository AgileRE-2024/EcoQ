<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kingdom extends Model
{
    //
    protected $table = "kingdoms";
    protected $fillable = ["name", "description"];

    public $timestamps = false;

    public function phylums()
    {
        return $this->hasMany(Phylum::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomsType extends Model
{
    public $fillable = [
        'id',
        'name',
    ];

    public function rooms()
    {
        return $this->hasMany(Rooms::class);
    }
}

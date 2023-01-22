<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JoinForm extends Model
{
    public $fillable=[
        'name',
        'email',
        'phone',
        'city',
        'cv'
    ];
}

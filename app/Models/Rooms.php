<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Laravelista\Comments\Commentable;
use willvincent\Rateable\Rateable;

class Rooms extends Model
{

    public $table = 'rooms';

    public $fillable = [
        'id',
        'rooms_type_id',
        'name',
        'price',
        'description',
        'embeded_code',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'id' => 'integer',
    //     'rooms_type_id' => 'integer',
    //     'name' => 'string',
    //     'price' => 'integer',
    //     'description' => 'string',
    //     'embeded_code' => 'string',
    // ];

}

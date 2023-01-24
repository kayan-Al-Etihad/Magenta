<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable=['title','title_ar','slug','description','description_ar','photo','status'];
}

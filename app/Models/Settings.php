<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable=['short_des','short_des_ar','description','description_ar','photo','address','address_ar','phone','email','logo'];
}

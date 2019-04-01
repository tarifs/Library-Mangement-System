<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function getImageAttribute($value)
    {
    	return asset('uploads/staff/'. $value);
    }
}

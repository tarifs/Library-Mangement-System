<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BookManagement extends Model
{


    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function sub_category()
    {
        return $this->belongsTo('App\SubCategory');
    }

    public function shelf()
    {
        return $this->belongsTo('App\Shelf');
    }
    public function issues()
    {
        return $this->hasMany('App\IssueBook','book_id')->where('status', 0);
    }
    public function getImageAttribute($value)
    {
        return asset('uploads/bookImages/'.$value);
    }

}

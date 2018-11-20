<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function allImages()
    {
        return $this->hasMany('App\Image');
    }

    public function thumbnail()
    {
        return $this->allImages()->where('thumbnail', TRUE)->first();
    }

    public function mini()
    {
        return $this->allImages()->where('mini', TRUE)->first();
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order')->withPivot('qty');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
}

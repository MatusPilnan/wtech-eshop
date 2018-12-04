<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['subcategory_id', 'name', 'short_desc', 'long_desc', 'price', 'manufacturer_id'];

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
        return $this->belongsToMany('App\Order')->withTimestamps()->withPivot('qty');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
}

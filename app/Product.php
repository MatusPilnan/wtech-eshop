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

    public function image()
    {
        $img = $this->allImages()->where('thumbnail', false)->where('mini', false)->first();
        if (!isset($img))
        {
            $img = new Image(['file' => 'img/logo.png', 'product_id' => $this->id, 'thumbnail' => TRUE]);
        }
        return $img;
    }

    public function thumbnail()
    {
        $img = $this->allImages()->where('thumbnail', TRUE)->first();
        if (!isset($img))
        {
            $img = new Image(['file' => 'img/logo.png', 'product_id' => $this->id, 'thumbnail' => TRUE]);
        }
        return $img;
    }

    public function mini()
    {
        $img = $this->allImages()->where('mini', TRUE)->first();
        if (!isset($img))
        {
            $img = new Image(['file' => 'img/logo.png', 'product_id' => $this->id, 'mini' => TRUE]);
        }
        return $img;
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

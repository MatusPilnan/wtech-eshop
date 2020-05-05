<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['file', 'product_id', 'mini', 'thumbnail'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}

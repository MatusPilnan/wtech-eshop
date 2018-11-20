<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'completed', 'town', 'street', 'zip'];

    public function products()
    {
        return $this->belongsToMany('App\Product')->withTimestamps()->withPivot('qty');
    }

    public function sum()
    {
        $sum = 0;
        foreach($this->products as $product)
        {
            $sum += $product->price * $product->pivot->qty;
        }
        return $sum;
    }
}

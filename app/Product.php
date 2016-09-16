<?php

namespace codecommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'price', 'featured', 'recommend'];

    public function category()
    {
        return $this->belongsTo('codecommerce\Category');
    }

    public function images()
    {
        return $this->hasMany('codecommerce\ProductImage');
    }
}

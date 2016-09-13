<?php

namespace market;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'img', 'description', 'price'];

    public function categoryProduct()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

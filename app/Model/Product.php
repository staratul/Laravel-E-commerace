<?php

namespace App\Model;

use App\Model\Unit;
use App\Model\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const AVAILABLE_PRODUCT = 'available';
    const UNAVAILABLE_PRODUCT = 'unavailable';

    protected $fillable = [
        'title',
        'sub_title',
        'category_id',
        'brand',
        'unit_id',
        'quantity',
        'mrp_price',
        'price',
        'unit_in_stock',
        'in_stock',
        'about_product',
        'uses',
        'benefits',
        'image_id',
        'status',
        'isAvailable'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}

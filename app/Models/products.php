<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = ['name','model_no', 'cost_price', 'about_the_product','sell_price','lowest_selling_price','discount_percentage','stock_quantity','foreignkey_product_genre_iD','foreignkey_product_type_iD','foreignkey_subcategory_iD','foreignkey_productsegment_iD','foreignkey_brand_iD','image1', 'image2','image3','image4','image5','image6','image7'];
protected $casts = [
    'foreignkey_brand_iD' => 'integer',
    'foreignkey_product_genre_iD' => 'array',
    'foreignkey_product_type_iD' => 'array',
    'foreignkey_subcategory_iD' => 'array',
    'foreignkey_productsegment_iD' => 'array',
        ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class subcategories extends Model
{
    use HasRoles;
    protected $fillable = [
        'name',      // Example field: brand name
        'foreignkey_productsegment_iD',
        'image' // Example field: description of the brand
    ];
    protected $casts = [
        'foreignkey_productsegment_iD' => 'array',
            ];

}

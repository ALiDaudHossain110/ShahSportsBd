<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Brand extends Model
{
    use HasRoles;
    protected $fillable = [
        'name',      // Example field: brand name
        'email',      // Example field: unique slug for SEO
        'about_the_brand',    // Example field: brand status (active, inactive)
        'image' // Example field: description of the brand
    ];


}

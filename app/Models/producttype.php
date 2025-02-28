<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class producttype extends Model
{
    protected $fillable = ['name','image','foreignkey_subcategory_iD'];
    protected $casts = [
        'foreignkey_subcategory_iD' => 'array',
            ];
    
}

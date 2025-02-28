<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurClients extends Model
{
    protected $fillable = [
        'client_name',      // Example field: brand name
        'client_logo',      // Example field: unique slug for SEO
        'email',    // Example field: brand status (active, inactive)
        'contact_number' // Example field: description of the brand
    ];
}

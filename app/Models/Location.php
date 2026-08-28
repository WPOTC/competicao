<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'Street',
        'Neighborhood',
        'Number',
        'CEP',
        'City',
        'State',
        'Country'
    ];
}

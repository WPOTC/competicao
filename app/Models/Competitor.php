<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    protected $fillable = [
        'Name',
        'Age',
        'Height',
        'Weight',
        'Gender',
        'CPF',
        'RG',
        'Team'
    ];
}

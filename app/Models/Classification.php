<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    protected $fillable = [
        'Position',
        'Competitor_name',
        'Trainer_name'
    ];
}

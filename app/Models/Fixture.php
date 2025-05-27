<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
     protected $fillable = [
        'competition',
        'date',
        'opponent',
        'opponent_logo',
        'location',
    ];
}

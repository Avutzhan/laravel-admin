<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $table = 'calls';

    protected $fillable = [
        'name',
        'number',
    ];
}

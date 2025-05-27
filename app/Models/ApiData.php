<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiData extends Model
{
    protected $fillable = [
        'rg',
        'name',
        'iok',
        'ref',
        'amount',
        'fcer',
        'datecer',
    ];
}

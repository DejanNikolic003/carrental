<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'imagePath',
    ];

    protected function serializeDate(Object $date): string
    {
        return $date->format('Y.m.d. H:i:s');
    }

}

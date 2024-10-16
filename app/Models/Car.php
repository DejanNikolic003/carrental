<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Car extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'manufacturer',
        'model',
        'year',
        'color',
        'mileage',
        'vin',
        'transmission',
        'engine',
        'fuel_type',
        'price',
        'status',
        'description'
    ];


    protected function serializeDate(Object $date): string
    {
        return $date->format('Y.m.d. H:i:s');
    }


}

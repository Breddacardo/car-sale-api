<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addcars extends Model
{
    use HasFactory;

    protected $fillable =[
        'car_name',
        'car_info',
        'car_price',
        'car_photo',
    ];
}
